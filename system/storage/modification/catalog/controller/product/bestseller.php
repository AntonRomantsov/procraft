<?php
class ControllerProductBestseller extends Controller {
	public function index() {
		$this->load->language('product/bestseller');

		$this->load->model('catalog/product');

		$this->load->model('tool/image');

		$this->document->setTitle($this->language->get('heading_title'));

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/home')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			// 'href' => $this->url->link('product/bestseller', $url)
		);

		$data['text_form_stock'] = $this->language->get('text_form_stock');

		$data['products'] = array();

		$setting = [
            'width' => 200,
            'height' => 200
		];

		$results = $this->model_catalog_product->getBestSellerProducts(30);

		if ($results) {
			foreach ($results as $result) {
                $attribute_groups = $this->model_catalog_product->getProductAttributes($result['product_id']);

				if ($result['image']) {
					$image = $this->model_tool_image->resize($result['image'], $setting['width'], $setting['height']);
				} else {
					$image = $this->model_tool_image->resize('placeholder.png', $setting['width'], $setting['height']);
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
					$rating = $result['rating'];
				} else {
					$rating = false;
				}

				$is_rotate = $this->model_catalog_product->has360($result['product_id']);

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
					'description' => utf8_substr(trim(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8'))), 0, $this->config->get('theme_' . $this->config->get('config_theme') . '_product_description_length')) . '..',
					'attributes'  => $attribute_groups,
					'reviews'     => sprintf($this->language->get('text_reviews'), $result['reviews']),
					'price'       => $price,
					'special'     => $special,
					'quantity'    => $result['quantity'],
					'tax'         => $tax,
					'stock_id'    => $result['stock_status_id'],
				    'minimum'     => $result['minimum'] > 0 ? $result['minimum'] : 1,
					'is_rotate'   => $is_rotate,
					'percent'     => (int)$percent,
					'rating'      => $rating,
					'href'        => $this->url->link('product/product', 'product_id=' . $result['product_id'])
				);
			}

		}
		$this->document->addLink($this->url->link('product/bestseller', '', true), 'canonical');

		$data['continue'] = $this->url->link('common/home');

		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['content_full'] = $this->load->controller('common/content_full');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');

		$this->response->setOutput($this->load->view('product/bestseller', $data));
	}
}