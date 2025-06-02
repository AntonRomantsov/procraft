<?php

require_once( DIR_SYSTEM . "/engine/neoseo_model.php");

class ModelExtensionPaymentNeoSeoPaymentPlus extends NeoSeoModel
{

	public function __construct($registry)
	{
		parent::__construct($registry);
		$this->_moduleSysName = "neoseo_paymentplus";
				$this->_modulePostfix = ""; // Постфикс для разных типов модуля, поэтому переходим на испольлзование $this->_moduleSysName()
		$this->_logFile = $this->_moduleSysName() . '.log';
		$this->debug = $this->config->get($this->_moduleSysName() . '_debug') == 1;

		
	}

	function getMethod($address, $total)
	{
		$this->load->language('extension/payment/' . $this->_moduleSysName());

		if (isset($address['zone_id'])) {
			$geo_zone = $this->db->query("SELECT geo_zone_id FROM " . DB_PREFIX . "zone_to_geo_zone WHERE zone_id = '" . (int) $address['zone_id'] . "'");
			if ($geo_zone->num_rows) {
				$geo_zone_id = $geo_zone->row['geo_zone_id'];
			} else {
				$geo_zone_id = 0;
			}
		} else {
			return false;
		}

		$payments = $this->getPayments($geo_zone_id);
		if ($payments) {

			$methods_data = array();
			foreach ($payments as $payment) {

				// для какого магазина актуальна доставка
				$stores = empty($payment['stores']) ? array() : json_decode($payment['stores'], true);
				if (!isset($stores[$this->config->get('config_store_id')])) {
					continue;
				}

				$status = true;

				if ($payment['price_max']) {
					if ($total > $payment['price_max']) {
						$status = false;
					}
				}

				if ($payment['price_min']) {
					if ($total < $payment['price_min']) {
						$status = false;
					}
				}

				if ($payment['cities']) {
					$cities = array_map('trim', explode(';', $payment['cities']));
					$cities_low = array_map('mb_strtolower', $cities); // @todo: подумать, возможно объеденить в одну функцию или переводить в нижний регистр при добавлении
					if ($address['city']) {
						if (!(in_array(mb_strtolower($address['city']), $cities_low))) {
							$status = false;
						}
					}
				}


				if ($status) {
					$methods_data['neoseo_paymentplus' . $payment['payment_id']] = array(
						'code' => 'neoseo_paymentplus.neoseo_paymentplus' . $payment['payment_id'],
						'title' => $payment['name'],
						'parent' => 'neoseo_paymentplus',
						'description' => html_entity_decode($payment['description']),
						'terms' => '',
						'sort_order' => $payment['sort_order']
					);
				}
			}
			if ($methods_data) {
				$method_data = array(
					'code' => 'neoseo_paymentplus',
					'title' => $this->language->get('text_title'),
					'terms' => '',
					'quote' => $methods_data,
					'sort_order' => $this->config->get('neoseo_paymentplus_sort_order')
				);
				return $method_data;
			}
		} else {
			return false;
		}
	}

	function getPayments($geo_zone_id)
	{
		$sql = "SELECT s.payment_id AS payment_id, sd.name AS name, sd.description AS description, s.sort_order, s.status, s.price_min as price_min, s.price_max as price_max, s.cities as cities, s.stores as stores FROM " . DB_PREFIX . "paymentplus s LEFT JOIN " . DB_PREFIX . "paymentplus_description sd ON (s.payment_id = sd.payment_id) WHERE sd.language_id = '" . (int) $this->config->get('config_language_id') . "' AND (s.geo_zone_id = '" . (int) $geo_zone_id . "' OR s.geo_zone_id = '0') AND s.status = 1";
		$query = $this->db->query($sql);

		if ($query->rows) {
			return $query->rows;
		} else {
			return false;
		}
	}

	function getPayment($payment_id)
	{
		$query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "paymentplus s LEFT JOIN " . DB_PREFIX . "paymentplus_description sd ON (s.payment_id = sd.payment_id) WHERE sd.language_id = '" . (int) $this->config->get('config_language_id') . "' AND s.payment_id = '" . (int) $payment_id . "'");

		return $query->row;
	}

	

}
