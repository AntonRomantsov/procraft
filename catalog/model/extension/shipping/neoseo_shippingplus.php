<?php

require_once( DIR_SYSTEM . "/engine/neoseo_model.php");

class ModelExtensionShippingNeoSeoShippingPlus extends NeoSeoModel
{

	public function __construct($registry)
	{
		parent::__construct($registry);
		$this->_moduleSysName = "neoseo_shippingplus";
				$this->_modulePostfix = ""; // Постфикс для разных типов модуля, поэтому переходим на испольлзование $this->_moduleSysName()
		$this->_logFile = $this->_moduleSysName() . '.log';
		$this->debug = $this->config->get($this->_moduleSysName() . '_debug') == 1;

		
	}

	function getQuote($address)
	{
		$this->load->language('extension/shipping/' . $this->_moduleSysName());
		$shippings = $this->getShippings();
		if ($shippings) {
			$quote_data = array();
			foreach ($shippings as $shipping) {

				// для какого магазина актуальна доставка
				$stores = empty($shipping['stores']) ? array() : json_decode($shipping['stores'], true);
				if (!isset($stores[$this->config->get('config_store_id')])) {
					continue;
				}

				// получаем список гео зон
				$geo_zones_id_list = unserialize($shipping['geo_zones_id']);
				if ($geo_zones_id_list != 0) {
					$geo_zones_id = implode('\',\'', $geo_zones_id_list);
				} else {
					$geo_zones_id = 0;
				}

				$cost = 0;
				$get_zone = '';
				$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "zone_to_geo_zone WHERE geo_zone_id IN ('" . $geo_zones_id . "') AND country_id = '" . (int) $address['country_id'] . "' AND (zone_id = '" . (int) $address['zone_id'] . "' OR zone_id = '0')");

				if (!$geo_zones_id) {
					$status = true;
				} elseif ($query->num_rows) {
					$status = true;
				} else {
					$status = false;
				}

				if ($query->num_rows) {
					$get_zone = $query->row['geo_zone_id'];
				} else {
					$query_zone = $this->db->query("SELECT * FROM " . DB_PREFIX . "zone_to_geo_zone WHERE country_id = '" . (int) $address['country_id'] . "' AND (zone_id = '" . (int) $address['zone_id'] . "' OR zone_id = '0')");
					if ($query_zone->num_rows) {
						$get_zone = $query_zone->row['geo_zone_id'];
					}
				}

				if ($shipping['zone_status']) {
					$query = $this->db->query("SELECT shippingplus_zone FROM " . DB_PREFIX . "country WHERE country_id = '" . (int)$address['country_id'] . "'");
					$country_ship_zone = 0;
					if($query->row['shippingplus_zone']){
						$country_ship_zone = $query->row['shippingplus_zone'];
					}

					if($country_ship_zone){
						$weight = $this->cart->getWeight();

						$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "shippingplus_zones WHERE `zone` = '" . (int)$country_ship_zone . "' AND (`weight` >= " . $weight . ") ORDER BY `weight` ASC LIMIT 1 ");
						if($query->row['price']){
							$cost = $query->row['price'];
						}
					}
				}

				// проверяем соотношение цены и веса
				if ($shipping['weight_price']) {

					$weight = $this->cart->getWeight();
					$rates = unserialize($shipping['weight_price']);

					foreach ($rates as $rate) {
						if ($rate['geo_zone_id'] == $get_zone || $rate['geo_zone_id'] == 0) {
							$addit_list = explode(";", $rate['weight_price_params']);

							$clear_addit_list = array();
							// перебираем
							foreach ($addit_list as $addition) {
								$addit_weight = array_map('trim', explode("=", $addition));

								if ($addit_weight[0] != '' && isset($addit_weight[1]) && $addit_weight[1] != '') {
									$clear_addit_list[$addit_weight[0]] = $addit_weight[1];
								}
							}

							if (count($clear_addit_list) > 0) {
								// сортируем по весу
								ksort($clear_addit_list);
								foreach ($clear_addit_list as $addit_weight_key => $addit_price) {
									if (strpos($addit_price, '+')) {
										$price_with_plus_weight = array_map('trim', explode("+", $addit_price));

										if ($price_with_plus_weight[0] != '' && isset($price_with_plus_weight[1]) && $price_with_plus_weight[1] != '') {
											$addit_price = $price_with_plus_weight[0];

											$price_by_plus_weight = array_map('trim', explode(":", $price_with_plus_weight[1]));

											//$price_by_plus_weight[0] = Одиницу веса за которую добавляется цена
											//$price_by_plus_weight[1] = единица цены, сколько прибавлять за одну единицу веса
											//Пример: 0=250;1000=300;5000=350;10000=300+1000:10
											//1000 = $price_by_plus_weight[0], 10 = $price_by_plus_weight[1]. За каждые 1000 веса, добавляем 10 цены;

											if ($price_by_plus_weight[0] != '' && isset($price_by_plus_weight[1]) && $price_by_plus_weight[1] != '' && $weight > $addit_weight_key) {
												$over_weight = $weight - $addit_weight_key;
												$addit_price += ($over_weight / $price_by_plus_weight[0]) * $price_by_plus_weight[1];
											}
										}
									}

									if ($addit_weight_key <= $weight) {
										$cost = $addit_price;
									}
								}
							}
						}
					}
				}

				if ($shipping['fix_payment'] > 0) {
					$cost = $shipping['fix_payment'];
				}

				if ($shipping['price_max']) {
					if ($this->cart->getSubTotal() > $shipping['price_max']) {
						$status = false;
					}
				}

				if ($shipping['price_min']) {
					if ($this->cart->getSubTotal() < $shipping['price_min']) {
						$status = false;
					}
				}

				if ($shipping['cities']) {
					$cities = array_map('trim', explode(';', $shipping['cities']));
					$cities_low = array_map('mb_strtolower', $cities); // @todo: подумать, возможно объеденить в одну функцию или переводить в нижний регистр при добавлении
					if (isset($address['city']) && $address['city']) {
						if (!(in_array(mb_strtolower($address['city']), $cities_low))) {
							$status = false;
						}
					}
				}

				if ($status) {
					$quote_data[$this->_moduleSysName() . $shipping['shipping_id']] = array(
						'code' => $this->_moduleSysName() . '.' . $this->_moduleSysName() . $shipping['shipping_id'],
						'title' => $shipping['name'],
						'description' => html_entity_decode($shipping['description']),
						'cost' => $cost,
						'tax_class_id' => $this->config->get('config_tax'),
						'text' => $this->currency->format($this->tax->calculate($cost, $this->config->get('flat_tax_class_id'), $this->config->get('config_tax')), $this->session->data['currency'])
					);
				}
			}

			if ($quote_data) {
				$method_data = array(
					'code' => $this->_moduleSysName(),
					'title' => $this->language->get('text_title'),
					'quote' => $quote_data,
					'sort_order' => $this->config->get($this->_moduleSysName() . '_sort_order'),
					'error' => false
				);
				return $method_data;
			} else {
				return false;
			}
		}
	}

	function getShippings()
	{
		$sql = "SELECT s.shipping_id AS shipping_id,
					   sd.name AS name,
					   sd.description,
					   s.sort_order,
					   s.status,
					   s.price_min as price_min,
					   s.price_max as price_max,
					   s.geo_zones_id as geo_zones_id,
					   s.cities as cities,
					   s.stores as stores,
					   s.weight_price as weight_price,
					   s.fix_payment as fix_payment,
					   s.zone_status as zone_status
				  FROM " . DB_PREFIX . "shippingplus s
					   LEFT JOIN " . DB_PREFIX . "shippingplus_description sd ON (s.shipping_id = sd.shipping_id)
				 WHERE sd.language_id = '" . (int) $this->config->get('config_language_id') . "'
				   AND s.status = 1
				 ORDER BY s.sort_order ASC";
		$query = $this->db->query($sql);
		if ($query->rows) {
			return $query->rows;
		} else {
			return false;
		};
	}

	

}
