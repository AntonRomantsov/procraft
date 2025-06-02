<?php
namespace Cart;
class Cart {
	private $data = array();

	public function __construct($registry) {
		$this->config = $registry->get('config');
		$this->customer = $registry->get('customer');
		$this->session = $registry->get('session');
		$this->db = $registry->get('db');
		$this->tax = $registry->get('tax');
		$this->weight = $registry->get('weight');

		// Remove all the expired carts with no customer ID
		$this->db->query("DELETE FROM " . DB_PREFIX . "cart WHERE (api_id > '0' OR customer_id = '0') AND date_added < DATE_SUB(NOW(), INTERVAL 1 HOUR)");

				$this->checkGifts();
			

		if ($this->customer->getId()) {
			// We want to change the session ID on all the old items in the customers cart
			$this->db->query("UPDATE " . DB_PREFIX . "cart SET session_id = '" . $this->db->escape($this->session->getId()) . "' WHERE api_id = '0' AND customer_id = '" . (int)$this->customer->getId() . "'");

				$this->checkGifts();
			

			// Once the customer is logged in we want to update the customers cart
			$cart_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "cart WHERE api_id = '0' AND customer_id = '0' AND session_id = '" . $this->db->escape($this->session->getId()) . "'");

			foreach ($cart_query->rows as $cart) {
				$this->db->query("DELETE FROM " . DB_PREFIX . "cart WHERE cart_id = '" . (int)$cart['cart_id'] . "'");

				$this->checkGifts();
			

				// The advantage of using $this->add is that it will check if the products already exist and increaser the quantity if necessary.
				$this->add($cart['product_id'], $cart['quantity'], json_decode($cart['option']), $cart['recurring_id']);
			}
		}
	}

	public function getProducts() {

				$type = version_compare(VERSION,'3.0','>=') ? 'payment_' : '';
				$typetotal = version_compare(VERSION,'3.0','>=') ? 'total_' : '';
				$setting = $this->config->get($type.'ukrcredits_settings');
			
		$product_data = array();

		$cart_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "cart WHERE api_id = '" . (isset($this->session->data['api_id']) ? (int)$this->session->data['api_id'] : 0) . "' AND customer_id = '" . (int)$this->customer->getId() . "' AND session_id = '" . $this->db->escape($this->session->getId()) . "' ORDER BY gift ASC"); 

		foreach ($cart_query->rows as $cart) {
			$stock = true;

			$product_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_to_store p2s LEFT JOIN " . DB_PREFIX . "product p ON (p2s.product_id = p.product_id) LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id) WHERE p2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND p2s.product_id = '" . (int)$cart['product_id'] . "' AND pd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND p.date_available <= NOW() AND p.status = '1'");

			if ($product_query->num_rows && ($cart['quantity'] > 0)) {
				$option_price = 0;
				$option_points = 0;
				$option_weight = 0;

				$option_data = array();

				foreach (json_decode($cart['option']) as $product_option_id => $value) {
					$option_query = $this->db->query("SELECT po.product_option_id, po.option_id, od.name, o.type FROM " . DB_PREFIX . "product_option po LEFT JOIN `" . DB_PREFIX . "option` o ON (po.option_id = o.option_id) LEFT JOIN " . DB_PREFIX . "option_description od ON (o.option_id = od.option_id) WHERE po.product_option_id = '" . (int)$product_option_id . "' AND po.product_id = '" . (int)$cart['product_id'] . "' AND od.language_id = '" . (int)$this->config->get('config_language_id') . "'");

					if ($option_query->num_rows) {
						if ($option_query->row['type'] == 'select' || $option_query->row['type'] == 'radio') {
							$option_value_query = $this->db->query("SELECT pov.option_value_id, ovd.name, pov.quantity, pov.subtract, pov.price, pov.price_prefix, pov.points, pov.points_prefix, pov.weight, pov.weight_prefix FROM " . DB_PREFIX . "product_option_value pov LEFT JOIN " . DB_PREFIX . "option_value ov ON (pov.option_value_id = ov.option_value_id) LEFT JOIN " . DB_PREFIX . "option_value_description ovd ON (ov.option_value_id = ovd.option_value_id) WHERE pov.product_option_value_id = '" . (int)$value . "' AND pov.product_option_id = '" . (int)$product_option_id . "' AND ovd.language_id = '" . (int)$this->config->get('config_language_id') . "'");

							if ($option_value_query->num_rows) {
								if ($option_value_query->row['price_prefix'] == '+') {
									$option_price += $option_value_query->row['price'];
								} elseif ($option_value_query->row['price_prefix'] == '-') {
									$option_price -= $option_value_query->row['price'];
								}

								if ($option_value_query->row['points_prefix'] == '+') {
									$option_points += $option_value_query->row['points'];
								} elseif ($option_value_query->row['points_prefix'] == '-') {
									$option_points -= $option_value_query->row['points'];
								}

								if ($option_value_query->row['weight_prefix'] == '+') {
									$option_weight += $option_value_query->row['weight'];
								} elseif ($option_value_query->row['weight_prefix'] == '-') {
									$option_weight -= $option_value_query->row['weight'];
								}

								if ($option_value_query->row['subtract'] && (!$option_value_query->row['quantity'] || ($option_value_query->row['quantity'] < $cart['quantity']))) {
									$stock = false;
								}

								$option_data[] = array(
									'product_option_id'       => $product_option_id,
									'product_option_value_id' => $value,
									'option_id'               => $option_query->row['option_id'],
									'option_value_id'         => $option_value_query->row['option_value_id'],
									'name'                    => $option_query->row['name'],
									'value'                   => $option_value_query->row['name'],
									'type'                    => $option_query->row['type'],
									'quantity'                => $option_value_query->row['quantity'],
									'subtract'                => $option_value_query->row['subtract'],
									'price'                   => $option_value_query->row['price'],
									'price_prefix'            => $option_value_query->row['price_prefix'],
									'points'                  => $option_value_query->row['points'],
									'points_prefix'           => $option_value_query->row['points_prefix'],
									'weight'                  => $option_value_query->row['weight'],
									'weight_prefix'           => $option_value_query->row['weight_prefix']
								);
							}
						} elseif ($option_query->row['type'] == 'checkbox' && is_array($value)) {
							foreach ($value as $product_option_value_id) {
								$option_value_query = $this->db->query("SELECT pov.option_value_id, pov.quantity, pov.subtract, pov.price, pov.price_prefix, pov.points, pov.points_prefix, pov.weight, pov.weight_prefix, ovd.name FROM " . DB_PREFIX . "product_option_value pov LEFT JOIN " . DB_PREFIX . "option_value_description ovd ON (pov.option_value_id = ovd.option_value_id) WHERE pov.product_option_value_id = '" . (int)$product_option_value_id . "' AND pov.product_option_id = '" . (int)$product_option_id . "' AND ovd.language_id = '" . (int)$this->config->get('config_language_id') . "'");

								if ($option_value_query->num_rows) {
									if ($option_value_query->row['price_prefix'] == '+') {
										$option_price += $option_value_query->row['price'];
									} elseif ($option_value_query->row['price_prefix'] == '-') {
										$option_price -= $option_value_query->row['price'];
									}

									if ($option_value_query->row['points_prefix'] == '+') {
										$option_points += $option_value_query->row['points'];
									} elseif ($option_value_query->row['points_prefix'] == '-') {
										$option_points -= $option_value_query->row['points'];
									}

									if ($option_value_query->row['weight_prefix'] == '+') {
										$option_weight += $option_value_query->row['weight'];
									} elseif ($option_value_query->row['weight_prefix'] == '-') {
										$option_weight -= $option_value_query->row['weight'];
									}

									if ($option_value_query->row['subtract'] && (!$option_value_query->row['quantity'] || ($option_value_query->row['quantity'] < $cart['quantity']))) {
										$stock = false;
									}

									$option_data[] = array(
										'product_option_id'       => $product_option_id,
										'product_option_value_id' => $product_option_value_id,
										'option_id'               => $option_query->row['option_id'],
										'option_value_id'         => $option_value_query->row['option_value_id'],
										'name'                    => $option_query->row['name'],
										'value'                   => $option_value_query->row['name'],
										'type'                    => $option_query->row['type'],
										'quantity'                => $option_value_query->row['quantity'],
										'subtract'                => $option_value_query->row['subtract'],
										'price'                   => $option_value_query->row['price'],
										'price_prefix'            => $option_value_query->row['price_prefix'],
										'points'                  => $option_value_query->row['points'],
										'points_prefix'           => $option_value_query->row['points_prefix'],
										'weight'                  => $option_value_query->row['weight'],
										'weight_prefix'           => $option_value_query->row['weight_prefix']
									);
								}
							}
						} elseif ($option_query->row['type'] == 'text' || $option_query->row['type'] == 'textarea' || $option_query->row['type'] == 'file' || $option_query->row['type'] == 'date' || $option_query->row['type'] == 'datetime' || $option_query->row['type'] == 'time') {
							$option_data[] = array(
								'product_option_id'       => $product_option_id,
								'product_option_value_id' => '',
								'option_id'               => $option_query->row['option_id'],
								'option_value_id'         => '',
								'name'                    => $option_query->row['name'],
								'value'                   => $value,
								'type'                    => $option_query->row['type'],
								'quantity'                => '',
								'subtract'                => '',
								'price'                   => '',
								'price_prefix'            => '',
								'points'                  => '',
								'points_prefix'           => '',
								'weight'                  => '',
								'weight_prefix'           => ''
							);
						}
					}
				}

				$price = $product_query->row['price'];

				// Product Discounts
				$discount_quantity = 0;

				foreach ($cart_query->rows as $cart_2) {
					if ($cart_2['product_id'] == $cart['product_id']) {
						$discount_quantity += $cart_2['quantity'];
					}
				}

				$is_discount = false;

				$product_discount_query = $this->db->query("SELECT price FROM " . DB_PREFIX . "product_discount WHERE product_id = '" . (int)$cart['product_id'] . "' AND customer_group_id = '" . (int)$this->config->get('config_customer_group_id') . "' AND quantity <= '" . (int)$discount_quantity . "' AND ((date_start = '0000-00-00' OR date_start < NOW()) AND (date_end = '0000-00-00' OR date_end > NOW())) ORDER BY quantity DESC, priority ASC, price ASC LIMIT 1");

				if ($product_discount_query->num_rows) {
					
					if	(
							(	
								isset($this->session->data['payment_method']['code']) && 
								(
								($this->session->data['payment_method']['code'] == 'ukrcredits_pp' && !$setting['pp_special'])
								|| 
								($this->session->data['payment_method']['code'] == 'ukrcredits_ii' && !$setting['ii_special'])
								||
								($this->session->data['payment_method']['code'] == 'ukrcredits_mb' && !$setting['mb_special'])
								||
								($this->session->data['payment_method']['code'] == 'ukrcredits_ab' && !$setting['ab_special'])
								)
							)
							||
							(
								isset($this->session->data['payment_method']['code']) 
								&& 
								$this->session->data['payment_method']['code'] != 'ukrcredits_pp'
								&&
								$this->session->data['payment_method']['code'] != 'ukrcredits_ii'
								&&
								$this->session->data['payment_method']['code'] != 'ukrcredits_mb'
								&&
								$this->session->data['payment_method']['code'] != 'ukrcredits_ab'
							)
							||
							!isset($this->session->data['payment_method']['code'])
						)
					{
						$price = $product_discount_query->row['price'];
					}
			
					$is_discount = true;
				}

				// Product Specials
				$product_special_query = $this->db->query("SELECT price FROM " . DB_PREFIX . "product_special WHERE product_id = '" . (int)$cart['product_id'] . "' AND customer_group_id = '" . (int)$this->config->get('config_customer_group_id') . "' AND ((date_start = '0000-00-00' OR date_start < NOW()) AND (date_end = '0000-00-00' OR date_end > NOW())) ORDER BY priority ASC, price ASC LIMIT 1");

				if ($product_special_query->num_rows) {
					
					if	(
							(	
								isset($this->session->data['payment_method']['code']) && 
								(
								($this->session->data['payment_method']['code'] == 'ukrcredits_pp' && !$setting['pp_special'])
								|| 
								($this->session->data['payment_method']['code'] == 'ukrcredits_ii' && !$setting['ii_special'])
								||
								($this->session->data['payment_method']['code'] == 'ukrcredits_mb' && !$setting['mb_special'])
								||
								($this->session->data['payment_method']['code'] == 'ukrcredits_ab' && !$setting['ab_special'])
								)
							)
							||
							(
								isset($this->session->data['payment_method']['code']) 
								&& 
								$this->session->data['payment_method']['code'] != 'ukrcredits_pp'
								&&
								$this->session->data['payment_method']['code'] != 'ukrcredits_ii'
								&&
								$this->session->data['payment_method']['code'] != 'ukrcredits_mb'
								&&
								$this->session->data['payment_method']['code'] != 'ukrcredits_ab'
							)
							||
							!isset($this->session->data['payment_method']['code'])
						)
					{
						$price = $product_special_query->row['price'];
					}
			
					$is_discount = true;
				}

				// Reward Points
				$product_reward_query = $this->db->query("SELECT points FROM " . DB_PREFIX . "product_reward WHERE product_id = '" . (int)$cart['product_id'] . "' AND customer_group_id = '" . (int)$this->config->get('config_customer_group_id') . "'");

				if ($product_reward_query->num_rows) {
					$reward = $product_reward_query->row['points'];
				} else {
					$reward = 0;
				}

				// Downloads
				$download_data = array();

				$download_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_to_download p2d LEFT JOIN " . DB_PREFIX . "download d ON (p2d.download_id = d.download_id) LEFT JOIN " . DB_PREFIX . "download_description dd ON (d.download_id = dd.download_id) WHERE p2d.product_id = '" . (int)$cart['product_id'] . "' AND dd.language_id = '" . (int)$this->config->get('config_language_id') . "'");

				foreach ($download_query->rows as $download) {
					$download_data[] = array(
						'download_id' => $download['download_id'],
						'name'        => $download['name'],
						'filename'    => $download['filename'],
						'mask'        => $download['mask']
					);
				}

				// Stock
				if (!$product_query->row['quantity'] || ($product_query->row['quantity'] < $cart['quantity'])) {
					$stock = false;
				}

				$recurring_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "recurring r LEFT JOIN " . DB_PREFIX . "product_recurring pr ON (r.recurring_id = pr.recurring_id) LEFT JOIN " . DB_PREFIX . "recurring_description rd ON (r.recurring_id = rd.recurring_id) WHERE r.recurring_id = '" . (int)$cart['recurring_id'] . "' AND pr.product_id = '" . (int)$cart['product_id'] . "' AND rd.language_id = " . (int)$this->config->get('config_language_id') . " AND r.status = 1 AND pr.customer_group_id = '" . (int)$this->config->get('config_customer_group_id') . "'");

				if ($recurring_query->num_rows) {
					$recurring = array(
						'recurring_id'    => $cart['recurring_id'],
						'name'            => $recurring_query->row['name'],
						'frequency'       => $recurring_query->row['frequency'],
						'price'           => $recurring_query->row['price'],
						'cycle'           => $recurring_query->row['cycle'],
						'duration'        => $recurring_query->row['duration'],
						'trial'           => $recurring_query->row['trial_status'],
						'trial_frequency' => $recurring_query->row['trial_frequency'],
						'trial_price'     => $recurring_query->row['trial_price'],
						'trial_cycle'     => $recurring_query->row['trial_cycle'],
						'trial_duration'  => $recurring_query->row['trial_duration']
					);
				} else {
					$recurring = false;
				}


				$ucmarkup = 1;	
				if (!$this->config->get($typetotal.'totalukrcredits_status')) {
					if (isset($this->session->data['payment_method']['code'])) {
						if ($this->session->data['payment_method']['code'] == 'ukrcredits_pp') {
							$ukrcredits_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_ukrcredits WHERE product_id = '" . (int)$product_query->row['product_id'] . "'");
							if (isset($ukrcredits_query->row)) {
								if (isset($ukrcredits_query->row['markup_pp']) && $ukrcredits_query->row['markup_pp'] != 0) {
									$ucmarkup = $ukrcredits_query->row['markup_pp'];
								} else {
									$ucmarkup = $setting['pp_markup'];
								}
							}
							if ($setting['pp_markup_type'] == 'custom') {
								$ukrcredits_pp_sel = isset($this->session->data['ukrcredits_pp_sel'])?$this->session->data['ukrcredits_pp_sel']:1;
								$ucmarkup = ($setting['pp_markup_custom_PP'][$ukrcredits_pp_sel] + $setting['pp_markup_acquiring']) / 100 + 1;
							}
						}
						if ($this->session->data['payment_method']['code'] == 'ukrcredits_ii') {
							$ukrcredits_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_ukrcredits WHERE product_id = '" . (int)$product_query->row['product_id'] . "'");
							if (isset($ukrcredits_query->row)) {
								if (isset($ukrcredits_query->row['markup_ii']) && $ukrcredits_query->row['markup_ii'] != 0) {
									$ucmarkup = $ukrcredits_query->row['markup_ii'];
								} else {
									$ucmarkup = $setting['ii_markup'];
								}
							}
							if ($setting['ii_markup_type'] == 'custom') {
								$ukrcredits_ii_sel = isset($this->session->data['ukrcredits_ii_sel'])?$this->session->data['ukrcredits_ii_sel']:1;
								$ucmarkup = ($setting['ii_markup_custom_II'][$ukrcredits_ii_sel] + $setting['ii_markup_acquiring']) / 100 + 1;
							}
						}
						if ($this->session->data['payment_method']['code'] == 'ukrcredits_mb') {
							$ukrcredits_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_ukrcredits WHERE product_id = '" . (int)$product_query->row['product_id'] . "'");
							if (isset($ukrcredits_query->row)) {
								if (isset($ukrcredits_query->row['markup_mb']) && $ukrcredits_query->row['markup_mb'] != 0) {
									$ucmarkup = $ukrcredits_query->row['markup_mb'];
								} else {
									$ucmarkup = $setting['mb_markup'];
								}
							}
							if ($setting['mb_markup_type'] == 'custom') {
								$ukrcredits_mb_sel = isset($this->session->data['ukrcredits_mb_sel'])?$this->session->data['ukrcredits_mb_sel']:2;
								$ucmarkup = ($setting['mb_markup_custom_MB'][$ukrcredits_mb_sel] + $setting['mb_markup_acquiring']) / 100 + 1;
							}
						}
						if ($this->session->data['payment_method']['code'] == 'ukrcredits_ab') {
							$ukrcredits_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_ukrcredits WHERE product_id = '" . (int)$product_query->row['product_id'] . "'");
							if (isset($ukrcredits_query->row)) {
								if (isset($ukrcredits_query->row['markup_ab']) && $ukrcredits_query->row['markup_ab'] != 0) {
									$ucmarkup = $ukrcredits_query->row['markup_ab'];
								} else {
									$ucmarkup = $setting['ab_markup'];
								}
							}
							if ($setting['ab_markup_type'] == 'custom') {
								$ukrcredits_ab_sel = isset($this->session->data['ukrcredits_ab_sel'])?$this->session->data['ukrcredits_ab_sel']:3;
								$ucmarkup = ($setting['ab_markup_custom_AB'][$ukrcredits_ab_sel] + $setting['ab_markup_acquiring']) / 100 + 1;
							}
						}
					}
				}
			
				$product_data[] = array(
					'cart_id'         => $cart['cart_id'],
					'product_id'      => $product_query->row['product_id'],
					'name'            => $product_query->row['name'],
					'model'           => $product_query->row['model'],
					'sku'             => $product_query->row['sku'],
					'shipping'        => $product_query->row['shipping'],
					'image'           => $product_query->row['image'],
					'option'          => $option_data,
					'download'        => $download_data,
					'quantity'        => $cart['quantity'],
					'minimum'         => $product_query->row['minimum'],
					'subtract'        => $product_query->row['subtract'],
					'stock'           => $stock,
					
					'price'           => $cart['gift'] ? 0.01 : ($price + $option_price) * $ucmarkup,
			
					
					'total'           => $cart['gift'] ? 0.01 : ($price + $option_price) * $ucmarkup * $cart['quantity'],
					'old_price'       => $cart['gift'] ? ($price + $option_price) * $ucmarkup : false,
			
					'is_discount'     => $is_discount,
					'reward'          => $reward * $cart['quantity'],
					'points'          => ($product_query->row['points'] ? ($product_query->row['points'] + $option_points) * $cart['quantity'] : 0),
					'tax_class_id'    => $product_query->row['tax_class_id'],
					'weight'          => ($product_query->row['weight'] + $option_weight) * $cart['quantity'],
					'weight_class_id' => $product_query->row['weight_class_id'],
					'length'          => $product_query->row['length'],
					'width'           => $product_query->row['width'],
					'height'          => $product_query->row['height'],
					'length_class_id' => $product_query->row['length_class_id'],
					'recurring'       => $recurring
				);
			} else {
				$this->remove($cart['cart_id']);
			}
		}

		return $product_data;
	}

	public function add($product_id, $quantity = 1, $option = array(), $recurring_id = 0) {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "cart WHERE api_id = '" . (isset($this->session->data['api_id']) ? (int)$this->session->data['api_id'] : 0) . "' AND customer_id = '" . (int)$this->customer->getId() . "' AND session_id = '" . $this->db->escape($this->session->getId()) . "' AND product_id = '" . (int)$product_id . "' AND recurring_id = '" . (int)$recurring_id . "' AND `option` = '" . $this->db->escape(json_encode($option)) . "'");

		if (!$query->row['total']) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "cart SET api_id = '" . (isset($this->session->data['api_id']) ? (int)$this->session->data['api_id'] : 0) . "', customer_id = '" . (int)$this->customer->getId() . "', session_id = '" . $this->db->escape($this->session->getId()) . "', product_id = '" . (int)$product_id . "', recurring_id = '" . (int)$recurring_id . "', `option` = '" . $this->db->escape(json_encode($option)) . "', quantity = '" . (int)$quantity . "', date_added = NOW()");

				$this->checkGifts();
			
		} else {
			$this->db->query("UPDATE " . DB_PREFIX . "cart SET quantity = (quantity + " . (int)$quantity . ") WHERE api_id = '" . (isset($this->session->data['api_id']) ? (int)$this->session->data['api_id'] : 0) . "' AND customer_id = '" . (int)$this->customer->getId() . "' AND session_id = '" . $this->db->escape($this->session->getId()) . "' AND product_id = '" . (int)$product_id . "' AND recurring_id = '" . (int)$recurring_id . "' AND `option` = '" . $this->db->escape(json_encode($option)) . "'");

				$this->checkGifts();
			
		}
	}

	public function update($cart_id, $quantity) {
		$this->db->query("UPDATE " . DB_PREFIX . "cart SET quantity = '" . (int)$quantity . "' WHERE cart_id = '" . (int)$cart_id . "' AND api_id = '" . (isset($this->session->data['api_id']) ? (int)$this->session->data['api_id'] : 0) . "' AND customer_id = '" . (int)$this->customer->getId() . "' AND session_id = '" . $this->db->escape($this->session->getId()) . "'");

				$this->checkGifts();
			
	}

	public function remove($cart_id) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "cart WHERE cart_id = '" . (int)$cart_id . "' AND api_id = '" . (isset($this->session->data['api_id']) ? (int)$this->session->data['api_id'] : 0) . "' AND customer_id = '" . (int)$this->customer->getId() . "' AND session_id = '" . $this->db->escape($this->session->getId()) . "'");

				$this->checkGifts();
			
	}

	public function clear() {
		$this->db->query("DELETE FROM " . DB_PREFIX . "cart WHERE api_id = '" . (isset($this->session->data['api_id']) ? (int)$this->session->data['api_id'] : 0) . "' AND customer_id = '" . (int)$this->customer->getId() . "' AND session_id = '" . $this->db->escape($this->session->getId()) . "'");

				$this->checkGifts();
			
	}

	public function getRecurringProducts() {
		$product_data = array();

		foreach ($this->getProducts() as $value) {
			if ($value['recurring']) {
				$product_data[] = $value;
			}
		}

		return $product_data;
	}

	public function getWeight() {
		$weight = 0;

		foreach ($this->getProducts() as $product) {
			if ($product['shipping']) {
				$weight += $this->weight->convert($product['weight'], $product['weight_class_id'], $this->config->get('config_weight_class_id'));
			}
		}

		return $weight;
	}

	public function getSubTotal() {
		$total = 0;

		foreach ($this->getProducts() as $product) {
			$total += $product['total'];
		}

		return $total;
	}

	public function getTaxes() {
		$tax_data = array();

		foreach ($this->getProducts() as $product) {
			if ($product['tax_class_id']) {
				$tax_rates = $this->tax->getRates($product['price'], $product['tax_class_id']);

				foreach ($tax_rates as $tax_rate) {
					if (!isset($tax_data[$tax_rate['tax_rate_id']])) {
						$tax_data[$tax_rate['tax_rate_id']] = ($tax_rate['amount'] * $product['quantity']);
					} else {
						$tax_data[$tax_rate['tax_rate_id']] += ($tax_rate['amount'] * $product['quantity']);
					}
				}
			}
		}

		return $tax_data;
	}

	public function getTotal() {
		$total = 0;

		foreach ($this->getProducts() as $product) {
			$total += $this->tax->calculate($product['price'], $product['tax_class_id'], $this->config->get('config_tax')) * $product['quantity'];
		}

		return $total;
	}


	public function getAllGifts() {
		if(isset($this->session->data['customer_id'])) {
			$customer_group_id = $this->customer->getGroupId();
		} else {
			$customer_group_id = '0';
		}

		$cart_total = $this->getSubTotal();
		
		$sql = "SELECT * FROM " . DB_PREFIX . "giftor WHERE status = '1' AND ((date_start = '0000-00-00' OR date_start <= NOW()) AND (date_end = '0000-00-00' OR date_end >= NOW())) AND ((min_total = 0 OR min_total <= ".$cart_total.") AND (max_total = 0 OR max_total >= ".$cart_total.")) AND JSON_SEARCH(customer_group, 'one', '" . $customer_group_id . "') IS NOT NULL";
		$query = $this->db->query($sql);

		return $query->rows;
	}

	public function addGifts($product_id, $quantity = 1, $option = array(), $recurring_id = 0) {
		if ($this->config->get('module_giftor_quantity')) $quantity = 1;
		$this->db->query("INSERT INTO " . DB_PREFIX . "cart SET api_id = '" . (isset($this->session->data['api_id']) ? (int)$this->session->data['api_id'] : 0) . "', customer_id = '" . (int)$this->customer->getId() . "', session_id = '" . $this->db->escape($this->session->getId()) . "', product_id = '" . (int)$product_id . "', recurring_id = '" . (int)$recurring_id . "', `option` = '" . $this->db->escape(json_encode($option)) . "', quantity = '" . (int)$quantity . "', date_added = NOW(), gift = 1");
	}

	public function removeGifts() {
		$this->db->query("DELETE FROM " . DB_PREFIX . "cart WHERE customer_id = '" . (int)$this->customer->getId() . "' AND session_id = '" . $this->db->escape($this->session->getId()) . "' AND gift = 1");
	}

	public function checkGifts() {
		if ($this->config->get('module_giftor_status') && $this->hasProducts()) { 
			$this->removeGifts();

			$cart_products = array();
			$cart_quantity = array();
			$products_incart = $this->getProducts();
			foreach ($products_incart as $product) {
				$cart_products[] = $product['product_id'];
				$cart_quantity[$product['product_id']] = $product['quantity'];
			}

			$all_gifts = $this->getAllGifts();

			$cart_gifts = array();

			if (!empty($products_incart)) 
			foreach ($all_gifts as $gift) {

				switch ($gift['based']) {

					case '0' : {
						$cart_gifts[] = array(
							'gift_product_id' => $gift['gift_product_id'],
							'quantity' => 1
						);
					} break;

					case '1' : {
						$query = $this->db->query("SELECT product_id FROM " . DB_PREFIX . "giftor_to_product WHERE gift_id = '" . $gift['gift_id'] . "'");
						if (!empty($query->rows)) {
							$need_products = array();
							foreach ($query->rows as $row) {
								$need_products[] = $row['product_id'];

							}
							$compare_products = array_intersect($need_products, $cart_products);

							$quantity = 0;
							$quantity_arr = array();

							if ($gift['condition']) {
								if (!empty($compare_products)) {
									foreach ($compare_products as $cp) {
										$quantity += $cart_quantity[$cp];
									}
									$cart_gifts[] = array(
										'gift_product_id' => $gift['gift_product_id'],
										'quantity' => $quantity
									);
								}
							} else {
								if (array_values($compare_products) === array_values($need_products)) {
									foreach ($compare_products as $cp) {
										$quantity_arr[] = $cart_quantity[$cp];
									}
									$cart_gifts[] = array(
										'gift_product_id' => $gift['gift_product_id'],
										'quantity' => min($quantity_arr)
									);
								}
							}
						}
					} break;

					case '2' : {
						$query = $this->db->query("SELECT category_id FROM " . DB_PREFIX . "giftor_to_category WHERE gift_id = '" . $gift['gift_id'] . "'");
						if (!empty($query->rows)) {
							$need_categories = array();
							$quantity_arr = array();
							$quantity = 0;
							foreach ($query->rows as $row) {
								$need_categories[] = $row['category_id'];

								foreach ($products_incart as $product) {
									$product_categories = $this->getProductCategories($product['product_id']);
									if (in_array($row['category_id'], $product_categories)) {
										if (!empty($quantity_arr[$row['category_id']])) {
											$quantity_arr[$row['category_id']] += $product['quantity'];
										} else {
											$quantity_arr[$row['category_id']] = $product['quantity'];
										}
									}
								}
							}

							if ($gift['condition']) {
								if ($this->anyCategoriesInCart($need_categories, $cart_products)) {
									foreach($quantity_arr as $qty) {
										$quantity += $qty;
									}
									$cart_gifts[] = array(
										'gift_product_id' => $gift['gift_product_id'],
										'quantity' => $quantity
									);
								}
							} else {
								if ($this->allCategoriesInCart($need_categories, $cart_products)) {
									$cart_gifts[] = array(
										'gift_product_id' => $gift['gift_product_id'],
										'quantity' => min($quantity_arr)
									);
								}
							}
						}
					} break;

					case '3' : {
						$query = $this->db->query("SELECT manufacturer_id FROM " . DB_PREFIX . "giftor_to_manufacturer WHERE gift_id = '" . $gift['gift_id'] . "'");
						if (!empty($query->rows)) {
							$need_manufacturers = array();
							$quantity_arr = array();
							$quantity = 0;
							foreach ($query->rows as $row) {
								$need_manufacturers[] = $row['manufacturer_id'];

								foreach ($products_incart as $product) {
									$product_manufacturer = $this->getProductManufacturer($product['product_id']);
									if ($row['manufacturer_id'] == $product_manufacturer) {
										if (!empty($quantity_arr[$row['manufacturer_id']])) {
											$quantity_arr[$row['manufacturer_id']] += $product['quantity'];
										} else {
											$quantity_arr[$row['manufacturer_id']] = $product['quantity'];
										}
									}
								}
							}
							if ($gift['condition']) {
								if ($this->anyManufacturersInCart($need_manufacturers, $cart_products)) {
									foreach($quantity_arr as $qty) {
										$quantity += $qty;
									}
									$cart_gifts[] = array(
										'gift_product_id' => $gift['gift_product_id'],
										'quantity' => $quantity
									);
								}
							} else {
								if ($this->allManufacturersInCart($need_manufacturers, $cart_products)) {
									$cart_gifts[] = array(
										'gift_product_id' => $gift['gift_product_id'],
										'quantity' => min($quantity_arr)
									);
								}
							}
						}
					} break;

				}
				
			}

			$result_gifts = array();
			foreach ($cart_gifts as $gift) {
				$quantity_query = $this->db->query("SELECT quantity FROM " . DB_PREFIX . "product WHERE product_id = '" . (int)$gift['gift_product_id'] . "' AND status = '1' AND quantity > 0");
				if ($quantity_query->num_rows) {
					$result_gifts[] = $gift['gift_product_id'];
					if (in_array($gift['gift_product_id'], $cart_products)) { 
						$this->db->query("DELETE FROM " . DB_PREFIX . "cart WHERE customer_id = '" . (int)$this->customer->getId() . "' AND session_id = '" . $this->db->escape($this->session->getId()) . "' AND product_id= '". (int)$gift['gift_product_id'] . "'");
					}
					$this->addGifts($gift['gift_product_id'], $gift['quantity']);
				}
			}
			 
			return($result_gifts);

		} else {
			return false;
		}
	}

	public function anyCategoriesInCart($category_ids, $product_ids) {
		$sql = "SELECT COUNT(*) as count FROM `" . DB_PREFIX . "product_to_category` WHERE category_id IN (" . implode(',', $category_ids) . ") AND product_id IN (" . implode(',', $product_ids) . ")";
	
		$result = $this->db->query($sql);
	
		return (int)$result->row['count'] > 0;
	}

	public function anyManufacturersInCart($manufacturer_ids, $product_ids) {
		$sql = "SELECT COUNT(*) as count FROM `" . DB_PREFIX . "product` WHERE manufacturer_id IN (" . implode(',', $manufacturer_ids) . ") AND product_id IN (" . implode(',', $product_ids) . ")";
	
		$result = $this->db->query($sql);
		return (int)$result->row['count'] > 0;
	}

	public function allCategoriesInCart($category_ids, $product_ids) {
		$k = 0;
		foreach ($category_ids as $category_id) {
			$result = $this->db->query("SELECT * FROM `" . DB_PREFIX . "product_to_category` WHERE category_id = '".$category_id."' AND product_id IN (" . implode(',', $product_ids) . ")");
			if ($result->row) {
				$k++;
			}
		}
		if ($k == count($category_ids)) {
			return true;
		} else {
			return false;
		}
	}

	public function allManufacturersInCart($manufacturer_ids, $product_ids) {
		$k = 0;
		foreach ($manufacturer_ids as $manufacturer_id) {
			$result = $this->db->query("SELECT * FROM `" . DB_PREFIX . "product` WHERE manufacturer_id = '" . $manufacturer_id . "' AND product_id IN (" . implode(',', $product_ids) . ")");
			if ($result->row) {
				$k++;
			}
		}
		if ($k == count($manufacturer_ids)) {
			return true;
		} else {
			return false;
		}
	}

	public function getProductCategories($product_id) {
		$categories = array();
		
		$query = $this->db->query("SELECT category_id FROM `" . DB_PREFIX . "product_to_category` WHERE product_id = '".(int)$product_id."'");
		
		if ($query->num_rows) {
			foreach ($query->rows as $row) {
				$categories[] = $row['category_id'];
			}
		}
		
		return $categories;
	}

	public function getProductManufacturer($product_id) {
		$manufacturer_id = false;
		$query = $this->db->query("SELECT manufacturer_id FROM `" . DB_PREFIX . "product` WHERE product_id = '".(int)$product_id."'");
		
		if ($query->num_rows) {
			$manufacturer_id = $query->row['manufacturer_id'];
		}
		
		return $manufacturer_id;
	}
			
	public function countProducts() {
		$product_total = 0;

		$products = $this->getProducts();

		foreach ($products as $product) {
			$product_total += $product['quantity'];
		}

		return $product_total;
	}

	public function hasProducts() {
		return count($this->getProducts());
	}

	public function hasRecurringProducts() {
		return count($this->getRecurringProducts());
	}

	public function hasStock() {
		foreach ($this->getProducts() as $product) {
			if (!$product['stock']) {
				return false;
			}
		}

		return true;
	}

	public function hasShipping() {
		foreach ($this->getProducts() as $product) {
			if ($product['shipping']) {
				return true;
			}
		}

		return false;
	}

	public function hasDownload() {
		foreach ($this->getProducts() as $product) {
			if ($product['download']) {
				return true;
			}
		}

		return false;
	}
}
