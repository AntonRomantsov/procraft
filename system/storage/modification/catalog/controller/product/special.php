<?php
class ControllerProductSpecial extends Controller
{
	public function index()
	{
		$this->load->language('product/special');

		$this->load->model('catalog/product');

		$this->load->model('tool/image');

		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'p.sort_order';
		}

		if (isset($this->request->get['order'])) {
			$order = $this->request->get['order'];
		} else {
			$order = 'ASC';
		}

		if (isset($this->request->get['page'])) {
			$page = (int)$this->request->get['page'];
		} else {
			$page = 1;
		}

		if (isset($this->request->get['limit'])) {
			$limit = (int)$this->request->get['limit'];
		} else {
			$limit = $this->config->get('theme_' . $this->config->get('config_theme') . '_product_limit');
		}

		$this->document->setTitle($this->language->get('heading_title'));

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/home')
		);

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		if (isset($this->request->get['limit'])) {
			$url .= '&limit=' . $this->request->get['limit'];
		}

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('product/special', $url)
		);

		$data['text_compare'] = sprintf($this->language->get('text_compare'), (isset($this->session->data['compare']) ? count($this->session->data['compare']) : 0));

		$data['compare'] = $this->url->link('product/compare');

		$data['products'] = array();

		$filter_data = array(
			'sort'  => $sort,
			'order' => $order,
			'start' => ($page - 1) * $limit,
			'limit' => $limit
		);

		$product_total = $this->model_catalog_product->getTotalProductSpecials();

		$results = $this->model_catalog_product->getProductSpecials($filter_data);

		foreach ($results as $result) {
			$attribute_groups = $this->model_catalog_product->getProductAttributes($result['product_id']);
			if ($result['image']) {
				$image = $this->model_tool_image->resize($result['image'], $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_height'));
			} else {
				$image = $this->model_tool_image->resize('placeholder.png', $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_height'));
			}

			if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
				$price = $this->currency->format($this->tax->calculate($result['price'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
			} else {
				$price = false;
			}

			if (!is_null($result['special']) && (float)$result['special'] >= 0) {
				$special = $this->currency->format($this->tax->calculate($result['special'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
				$tax_price = (float)$result['special'];
			} else {
				$special = false;
				$tax_price = (float)$result['price'];
			}

			if ($this->config->get('config_tax')) {
				$tax = $this->currency->format($tax_price, $this->session->data['currency']);
			} else {
				$tax = false;
			}

			if ($this->config->get('config_review_status')) {
				$rating = (int)$result['rating'];
			} else {
				$rating = false;
			}

			// XD Stickers start
			$this->load->model('setting/setting');
			$xdstickers = $this->config->get('xdstickers');
			$current_language_id = $this->config->get('config_language_id');
			$product_xdstickers = array();
			$product_xdstickers_custom = array();
			$data['xdstickers_position'] = ($xdstickers['position'] == '0') ? ' position_upleft' : ' position_upright';
			$data['xdstickers_status'] = $this->config->get('module_xdstickers_status');
			if ($data['xdstickers_status']) {
				if ($xdstickers['sale']['status'] == '1' && $special) {
					if ($xdstickers['sale']['discount_status'] == '1') {
						$sale_value = ceil(((float)$result['price'] - (float)$result['special']) / ((float)$result['price'] * 0.01));
						$sale_text = $xdstickers['sale']['text'][$current_language_id] . ' -' . strval($sale_value) . '%';
					} else {
						$sale_text = $xdstickers['sale']['text'][$current_language_id];
					}
					$product_xdstickers[] = array(
						'id'            => 'xdsticker_sale',
						'text'          => $sale_text
					);
				}
				if ($xdstickers['bestseller']['status'] == '1') {
					$bestsellers = $this->model_catalog_product->getBestSellerProducts((int)$xdstickers['bestseller']['property']);
					foreach ($bestsellers as $bestseller) {
						if ($bestseller['product_id'] == $result['product_id']) {
							$product_xdstickers[] = array(
								'id'            => 'xdsticker_bestseller',
								'text'          => $xdstickers['bestseller']['text'][$current_language_id]
							);
						}
					}
				}
				if ($xdstickers['novelty']['status'] == '1') {
					if ((strtotime($result['date_added']) + intval($xdstickers['novelty']['property']) * 24 * 3600) > time()) {
						$product_xdstickers[] = array(
							'id'            => 'xdsticker_novelty',
							'text'          => $xdstickers['novelty']['text'][$current_language_id]
						);
					}
				}
				if ($xdstickers['last']['status'] == '1') {
					if ($result['quantity'] <= intval($xdstickers['last']['property']) && $result['quantity'] > 0) {
						$product_xdstickers[] = array(
							'id'            => 'xdsticker_last',
							'text'          => $xdstickers['last']['text'][$current_language_id]
						);
					}
				}
				if ($xdstickers['freeshipping']['status'] == '1') {
					if ((float)$result['special'] >= intval($xdstickers['freeshipping']['property'])) {
						$product_xdstickers[] = array(
							'id'            => 'xdsticker_freeshipping',
							'text'          => $xdstickers['freeshipping']['text'][$current_language_id]
						);
					} else if ((float)$result['price'] >= intval($xdstickers['freeshipping']['property'])) {
						$product_xdstickers[] = array(
							'id'            => 'xdsticker_freeshipping',
							'text'          => $xdstickers['freeshipping']['text'][$current_language_id]
						);
					}
				}

				// STOCK stickers
				if (isset($xdstickers['stock']) && !empty($xdstickers['stock'])) {
					foreach ($xdstickers['stock'] as $key => $value) {
						if (isset($value['status']) && $value['status'] == '1' && $key == $result['stock_status_id'] && $result['quantity'] <= 0) {
							$product_xdstickers[] = array(
								'id'            => 'xdsticker_stock_' . $key,
								'text'          => $result['stock_status']
							);
						}
					}
				}

				// CUSTOM stickers
				$this->load->model('extension/module/xdstickers');
				$custom_xdstickers_id = $this->model_extension_module_xdstickers->getCustomXDStickersProduct($result['product_id']);
				if (!empty($custom_xdstickers_id)) {
					foreach ($custom_xdstickers_id as $custom_xdsticker_id) {
						$custom_xdsticker = $this->model_extension_module_xdstickers->getCustomXDSticker($custom_xdsticker_id['xdsticker_id']);
						$custom_xdsticker_text = json_decode($custom_xdsticker['text'], true);
						// var_dump($custom_xdsticker);
						if ($custom_xdsticker['status'] == '1') {
							$custom_sticker_class = 'xdsticker_' . $custom_xdsticker_id['xdsticker_id'];
							$product_xdstickers_custom[] = array(
								'id'            => $custom_sticker_class,
								'text'          => $custom_xdsticker_text[$current_language_id]
							);
						}
					}
				}
			}
			// XD Stickers end

			$attributes = $this->model_catalog_product->getProductAttributes($result['product_id']);

			$w_list = array_column($this->customer->getWishlist(), 'product_id');

			if (in_array($result['product_id'], $w_list)) {
				$wl_class = 'wl-add';
			} else {
				$wl_class = '';
			}

			if ((strtotime($result['date_added']) + intval($xdstickers['novelty']['property']) * 24 * 3600) > time()) {
				$is_new = true;
			} else {
				$is_new = false;
			}

			$is_rotate = $this->model_catalog_product->has360($result['product_id']);

			$this->load->model('extension/module/giftor');

			$gifts = $this->model_extension_module_giftor->getGiftsByProduct($result['product_id']);

			$percent = ($result['price'] - $result['special']) / $result['price'] * 100;


					// XD Stickers start
						$this->load->model('setting/setting');
						$xdstickers = $this->config->get('xdstickers');
						$current_language_id = $this->config->get('config_language_id');
						$product_xdstickers = array();
						$product_xdstickers_custom = array();
						$data['xdstickers_position'] = ($xdstickers['position'] == '0') ? ' position_upleft' : ' position_upright';
						$data['xdstickers_status'] = $this->config->get('module_xdstickers_status');
						if ($data['xdstickers_status']) {
							if ($xdstickers['sale']['status'] == '1' && $special) {
								if ($xdstickers['sale']['discount_status'] == '1') {
									$sale_value = ceil(((float)$result['price'] - (float)$result['special']) / ((float)$result['price'] * 0.01));
									$sale_text = $xdstickers['sale']['text'][$current_language_id] . ' -' . strval($sale_value) . '%';
								} else {
									$sale_text = $xdstickers['sale']['text'][$current_language_id];
								}								
								$product_xdstickers[] = array(
									'id'			=> 'xdsticker_sale',
									'text'			=> $sale_text
								);
							}
							if ($xdstickers['bestseller']['status'] == '1') {
								$bestsellers = $this->model_catalog_product->getBestSellerProducts((int)$xdstickers['bestseller']['property']);
								foreach ($bestsellers as $bestseller) {
									if ($bestseller['product_id'] == $result['product_id']) {
										$product_xdstickers[] = array(
											'id'			=> 'xdsticker_bestseller',
											'text'			=> $xdstickers['bestseller']['text'][$current_language_id]
										);
									}
								}
							}
							if ($xdstickers['novelty']['status'] == '1') {
								if ((strtotime($result['date_added']) + intval($xdstickers['novelty']['property']) * 24 * 3600) > time()) {
									$product_xdstickers[] = array(
										'id'			=> 'xdsticker_novelty',
										'text'			=> $xdstickers['novelty']['text'][$current_language_id]
									);
								}
							}
							if ($xdstickers['last']['status'] == '1') {
								if ($result['quantity'] <= intval($xdstickers['last']['property']) && $result['quantity'] > 0) {
									$product_xdstickers[] = array(
										'id'			=> 'xdsticker_last',
										'text'			=> $xdstickers['last']['text'][$current_language_id]
									);
								}
							}
							if ($xdstickers['freeshipping']['status'] == '1') {
								if ((float)$result['special'] >= intval($xdstickers['freeshipping']['property'])) {
									$product_xdstickers[] = array(
										'id'			=> 'xdsticker_freeshipping',
										'text'			=> $xdstickers['freeshipping']['text'][$current_language_id]
									);
								} else if ((float)$result['price'] >= intval($xdstickers['freeshipping']['property'])) {
									$product_xdstickers[] = array(
										'id'			=> 'xdsticker_freeshipping',
										'text'			=> $xdstickers['freeshipping']['text'][$current_language_id]
									);
								}
							}

							// STOCK stickers
							if (isset($xdstickers['stock']) && !empty($xdstickers['stock'])) {
								foreach($xdstickers['stock'] as $key => $value) {
									if (isset($value['status']) && $value['status'] == '1' && $key == $result['stock_status_id'] && $result['quantity'] <= 0) {
										$product_xdstickers[] = array(
											'id'			=> 'xdsticker_stock_' . $key,
											'text'			=> $result['stock_status']
										);
									}
								}
							}

							// CUSTOM stickers
							$this->load->model('extension/module/xdstickers');
							$custom_xdstickers_id = $this->model_extension_module_xdstickers->getCustomXDStickersProduct($result['product_id']);
							if (!empty($custom_xdstickers_id)) {
								foreach ($custom_xdstickers_id as $custom_xdsticker_id) {
									$custom_xdsticker = $this->model_extension_module_xdstickers->getCustomXDSticker($custom_xdsticker_id['xdsticker_id']);
									$custom_xdsticker_text = json_decode($custom_xdsticker['text'], true);
									// var_dump($custom_xdsticker);
									if ($custom_xdsticker['status'] == '1') {
										$custom_sticker_class = 'xdsticker_' . $custom_xdsticker_id['xdsticker_id'];
										$product_xdstickers_custom[] = array(
											'id'			=> $custom_sticker_class,
											'text'			=> $custom_xdsticker_text[$current_language_id]
										);
									}
								}
							}
						}
					// XD Stickers end
				
			$data['products'][] = array(

					'product_xdstickers'  => $product_xdstickers,
					'product_xdstickers_custom'  => $product_xdstickers_custom,
				
				'product_id'  => $result['product_id'],
				'thumb'       => $image,
				'name'        => $result['name'],
				// apsite
				'attributes'  => $attributes ? array_slice($attributes[0]['attribute'], 0, 4) : array(),
				'reviews'     => sprintf($this->language->get('text_reviews'), $result['reviews']),
				'wl_class'    => $wl_class,
				'quantity'    => $result['quantity'],
				// apsite
				'description' => utf8_substr(trim(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8'))), 0, $this->config->get('theme_' . $this->config->get('config_theme') . '_product_description_length')) . '..',
				'price'       => $price,
				'special'     => $special,
				'percent'     => (int)$percent,
				'tax'         => $tax,
				'stock_id'    => $result['stock_status_id'],
				'minimum'     => $result['minimum'] > 0 ? $result['minimum'] : 1,
				'rating'      => $rating,
				'is_rotate'   => $is_rotate,
				'is_new'      => $is_new,
				'gifts'       => $gifts ? true : false,
				'href'        => $this->url->link('product/product', 'path=' . $this->request->get['path'] . '&product_id=' . $result['product_id'] . $url)
			);
		}

		$product_total = $this->model_catalog_product->getTotalProductWithGifts();

		$results = $this->model_catalog_product->getProductWithGifts($filter_data);

		foreach ($results as $result) {
			$attribute_groups = $this->model_catalog_product->getProductAttributes($result['product_id']);
			if ($result['image']) {
				$image = $this->model_tool_image->resize($result['image'], $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_height'));
			} else {
				$image = $this->model_tool_image->resize('placeholder.png', $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_height'));
			}

			if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
				$price = $this->currency->format($this->tax->calculate($result['price'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
			} else {
				$price = false;
			}

			if (!is_null($result['special']) && (float)$result['special'] >= 0) {
				$special = $this->currency->format($this->tax->calculate($result['special'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
				$tax_price = (float)$result['special'];
			} else {
				$special = false;
				$tax_price = (float)$result['price'];
			}

			if ($this->config->get('config_tax')) {
				$tax = $this->currency->format($tax_price, $this->session->data['currency']);
			} else {
				$tax = false;
			}

			if ($this->config->get('config_review_status')) {
				$rating = (int)$result['rating'];
			} else {
				$rating = false;
			}

			// XD Stickers start
			$this->load->model('setting/setting');
			$xdstickers = $this->config->get('xdstickers');
			$current_language_id = $this->config->get('config_language_id');
			$product_xdstickers = array();
			$product_xdstickers_custom = array();
			$data['xdstickers_position'] = ($xdstickers['position'] == '0') ? ' position_upleft' : ' position_upright';
			$data['xdstickers_status'] = $this->config->get('module_xdstickers_status');
			if ($data['xdstickers_status']) {
				if ($xdstickers['sale']['status'] == '1' && $special) {
					if ($xdstickers['sale']['discount_status'] == '1') {
						$sale_value = ceil(((float)$result['price'] - (float)$result['special']) / ((float)$result['price'] * 0.01));
						$sale_text = $xdstickers['sale']['text'][$current_language_id] . ' -' . strval($sale_value) . '%';
					} else {
						$sale_text = $xdstickers['sale']['text'][$current_language_id];
					}
					$product_xdstickers[] = array(
						'id'            => 'xdsticker_sale',
						'text'          => $sale_text
					);
				}
				if ($xdstickers['bestseller']['status'] == '1') {
					$bestsellers = $this->model_catalog_product->getBestSellerProducts((int)$xdstickers['bestseller']['property']);
					foreach ($bestsellers as $bestseller) {
						if ($bestseller['product_id'] == $result['product_id']) {
							$product_xdstickers[] = array(
								'id'            => 'xdsticker_bestseller',
								'text'          => $xdstickers['bestseller']['text'][$current_language_id]
							);
						}
					}
				}
				if ($xdstickers['novelty']['status'] == '1') {
					if ((strtotime($result['date_added']) + intval($xdstickers['novelty']['property']) * 24 * 3600) > time()) {
						$product_xdstickers[] = array(
							'id'            => 'xdsticker_novelty',
							'text'          => $xdstickers['novelty']['text'][$current_language_id]
						);
					}
				}
				if ($xdstickers['last']['status'] == '1') {
					if ($result['quantity'] <= intval($xdstickers['last']['property']) && $result['quantity'] > 0) {
						$product_xdstickers[] = array(
							'id'            => 'xdsticker_last',
							'text'          => $xdstickers['last']['text'][$current_language_id]
						);
					}
				}
				if ($xdstickers['freeshipping']['status'] == '1') {
					if ((float)$result['special'] >= intval($xdstickers['freeshipping']['property'])) {
						$product_xdstickers[] = array(
							'id'            => 'xdsticker_freeshipping',
							'text'          => $xdstickers['freeshipping']['text'][$current_language_id]
						);
					} else if ((float)$result['price'] >= intval($xdstickers['freeshipping']['property'])) {
						$product_xdstickers[] = array(
							'id'            => 'xdsticker_freeshipping',
							'text'          => $xdstickers['freeshipping']['text'][$current_language_id]
						);
					}
				}

				// STOCK stickers
				if (isset($xdstickers['stock']) && !empty($xdstickers['stock'])) {
					foreach ($xdstickers['stock'] as $key => $value) {
						if (isset($value['status']) && $value['status'] == '1' && $key == $result['stock_status_id'] && $result['quantity'] <= 0) {
							$product_xdstickers[] = array(
								'id'            => 'xdsticker_stock_' . $key,
								'text'          => $result['stock_status']
							);
						}
					}
				}

				// CUSTOM stickers
				$this->load->model('extension/module/xdstickers');
				$custom_xdstickers_id = $this->model_extension_module_xdstickers->getCustomXDStickersProduct($result['product_id']);
				if (!empty($custom_xdstickers_id)) {
					foreach ($custom_xdstickers_id as $custom_xdsticker_id) {
						$custom_xdsticker = $this->model_extension_module_xdstickers->getCustomXDSticker($custom_xdsticker_id['xdsticker_id']);
						$custom_xdsticker_text = json_decode($custom_xdsticker['text'], true);
						// var_dump($custom_xdsticker);
						if ($custom_xdsticker['status'] == '1') {
							$custom_sticker_class = 'xdsticker_' . $custom_xdsticker_id['xdsticker_id'];
							$product_xdstickers_custom[] = array(
								'id'            => $custom_sticker_class,
								'text'          => $custom_xdsticker_text[$current_language_id]
							);
						}
					}
				}
			}
			// XD Stickers end

			$w_list = array_column($this->customer->getWishlist(), 'product_id');

			if (in_array($result['product_id'], $w_list)) {
				$wl_class = 'wl-add';
			} else {
				$wl_class = '';
			}

			if ((strtotime($result['date_added']) + intval($xdstickers['novelty']['property']) * 24 * 3600) > time()) {
				$is_new = true;
			} else {
				$is_new = false;
			}

			$is_rotate = $this->model_catalog_product->has360($result['product_id']);

			$this->load->model('extension/module/giftor');

			$gifts = $this->model_extension_module_giftor->getGiftsByProduct($result['product_id']);

			$percent = ($result['price'] - $result['special']) / $result['price'] * 100;

			$data['products_with_gifts'][] = array(
				'product_id'  => $result['product_id'],
				'thumb'       => $image,
				'name'        => $result['name'],
				// apsite
				'attributes'  => $attributes ? array_slice($attributes[0]['attribute'], 0, 4) : array(),
				'reviews'     => sprintf($this->language->get('text_reviews'), $result['reviews']),
				'wl_class'    => $wl_class,
				'quantity'    => $result['quantity'],
				// apsite
				'description' => utf8_substr(trim(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8'))), 0, $this->config->get('theme_' . $this->config->get('config_theme') . '_product_description_length')) . '..',
				'price'       => $price,
				'special'     => $special,
				'percent'     => (int)$percent,
				'tax'         => $tax,
				'stock_id'    => $result['stock_status_id'],
				'minimum'     => $result['minimum'] > 0 ? $result['minimum'] : 1,
				'rating'      => $rating,
				'is_rotate'   => $is_rotate,
				'is_new'      => $is_new,
				'gifts'       => $gifts ? true : false,
				'href'        => $this->url->link('product/product', 'path=' . $this->request->get['path'] . '&product_id=' . $result['product_id'] . $url)
			);
		} 

		$url = '';

		if (isset($this->request->get['limit'])) {
			$url .= '&limit=' . $this->request->get['limit'];
		}


      // OCFilter start
      if (isset($url) && $this->registry->get('ocfilter') && $this->ocfilter->startup() && $this->ocfilter->api->isSelected()) {
        $url .= '&' . $this->ocfilter->api->getParamsIndex() . '=' . $this->ocfilter->api->getParamsString();
        
        if (isset($this->request->get['ocfilter_placement'])) {
          $url .= '&ocfilter_placement=' . $this->request->get['ocfilter_placement'];
        }
      }
      // OCFilter end
      
		$data['sorts'] = array();

		$data['sorts'][] = array(
			'text'  => $this->language->get('text_default'),
			'value' => 'p.sort_order-ASC',
			'href'  => $this->url->link('product/special', 'sort=p.sort_order&order=ASC' . $url)
		);

		$data['sorts'][] = array(
			'text'  => $this->language->get('text_name_asc'),
			'value' => 'pd.name-ASC',
			'href'  => $this->url->link('product/special', 'sort=pd.name&order=ASC' . $url)
		);

		$data['sorts'][] = array(
			'text'  => $this->language->get('text_name_desc'),
			'value' => 'pd.name-DESC',
			'href'  => $this->url->link('product/special', 'sort=pd.name&order=DESC' . $url)
		);

		$data['sorts'][] = array(
			'text'  => $this->language->get('text_price_asc'),
			'value' => 'ps.price-ASC',
			'href'  => $this->url->link('product/special', 'sort=ps.price&order=ASC' . $url)
		);

		$data['sorts'][] = array(
			'text'  => $this->language->get('text_price_desc'),
			'value' => 'ps.price-DESC',
			'href'  => $this->url->link('product/special', 'sort=ps.price&order=DESC' . $url)
		);

		if ($this->config->get('config_review_status')) {
			$data['sorts'][] = array(
				'text'  => $this->language->get('text_rating_desc'),
				'value' => 'rating-DESC',
				'href'  => $this->url->link('product/special', 'sort=rating&order=DESC' . $url)
			);

			$data['sorts'][] = array(
				'text'  => $this->language->get('text_rating_asc'),
				'value' => 'rating-ASC',
				'href'  => $this->url->link('product/special', 'sort=rating&order=ASC' . $url)
			);
		}

		$data['sorts'][] = array(
			'text'  => $this->language->get('text_model_asc'),
			'value' => 'p.model-ASC',
			'href'  => $this->url->link('product/special', 'sort=p.model&order=ASC' . $url)
		);

		$data['sorts'][] = array(
			'text'  => $this->language->get('text_model_desc'),
			'value' => 'p.model-DESC',
			'href'  => $this->url->link('product/special', 'sort=p.model&order=DESC' . $url)
		);

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}


      // OCFilter start
      if (isset($url) && $this->registry->get('ocfilter') && $this->ocfilter->startup() && $this->ocfilter->api->isSelected()) {
        $url .= '&' . $this->ocfilter->api->getParamsIndex() . '=' . $this->ocfilter->api->getParamsString();
        
        if (isset($this->request->get['ocfilter_placement'])) {
          $url .= '&ocfilter_placement=' . $this->request->get['ocfilter_placement'];
        }        
      }
      // OCFilter end
      
		$data['limits'] = array();

		$limits = array_unique(array($this->config->get('theme_' . $this->config->get('config_theme') . '_product_limit'), 25, 50, 75, 100));

		sort($limits);

		foreach ($limits as $value) {
			$data['limits'][] = array(
				'text'  => $value,
				'value' => $value,
				'href'  => $this->url->link('product/special', $url . '&limit=' . $value)
			);
		}

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['limit'])) {
			$url .= '&limit=' . $this->request->get['limit'];
		}


      // OCFilter start
      if (isset($url) && $this->registry->get('ocfilter') && $this->ocfilter->startup() && $this->ocfilter->api->isSelected()) {
        $url .= '&' . $this->ocfilter->api->getParamsIndex() . '=' . $this->ocfilter->api->getParamsString();
        
        if (isset($this->request->get['ocfilter_placement'])) {
          $url .= '&ocfilter_placement=' . $this->request->get['ocfilter_placement'];
        }        
      }
      // OCFilter end
      
		$pagination = new Pagination();
		$pagination->total = $product_total;
		$pagination->page = $page;
		$pagination->limit = $limit;
		$pagination->url = $this->url->link('product/special', $url . '&page={page}');

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($product_total) ? (($page - 1) * $limit) + 1 : 0, ((($page - 1) * $limit) > ($product_total - $limit)) ? $product_total : ((($page - 1) * $limit) + $limit), $product_total, ceil($product_total / $limit));

		// http://googlewebmastercentral.blogspot.com/2011/09/pagination-with-relnext-and-relprev.html
		if ($page == 1) {
			$this->document->addLink($this->url->link('product/special', '', true), 'canonical');
		} else {
			$this->document->addLink($this->url->link('product/special', 'page=' . $page, true), 'canonical');
		}

		if ($page > 1) {
			$this->document->addLink($this->url->link('product/special', (($page - 2) ? '&page=' . ($page - 1) : ''), true), 'prev');
		}

		if ($limit && ceil($product_total / $limit) > $page) {
			$this->document->addLink($this->url->link('product/special', 'page=' . ($page + 1), true), 'next');
		}

		$data['sort'] = $sort;
		$data['order'] = $order;
		$data['limit'] = $limit;

      // OCFilter Start
      if ($this->registry->get('ocfilter') && $this->ocfilter->startup()) {
        $this->ocfilter->api->setProductListControllerData($data, (isset($product_total) ? $product_total : null));
      }
      // OCFilter End
      

		$data['continue'] = $this->url->link('common/home');

		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');

		$this->response->setOutput($this->load->view('product/special', $data));
	}
}
