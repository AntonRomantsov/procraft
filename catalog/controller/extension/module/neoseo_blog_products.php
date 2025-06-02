<?php

require_once(DIR_SYSTEM . '/engine/neoseo_controller.php');

class ControllerExtensionModuleNeoSeoBlogProducts extends NeoSeoController
{

	public function __construct($registry)
	{
		parent::__construct($registry);
		$this->_moduleSysName = 'neoseo_blog';
				$this->_modulePostfix = "_products";
		$this->_logFile = $this->_moduleSysName . '.log';
		$this->debug = $this->config->get($this->_moduleSysName . '_status') == 1;
	}

	public function index($setting)
	{

		$data = $this->load->language('extension/' . 'module' . '/' . $this->_moduleSysName());

		$this->load->model('blog/' . $this->_moduleSysName . '_article');
		$this->load->model('blog/' . $this->_moduleSysName . '_category');
		$this->load->model('tool/image');

		$data['article_id'] = '';
		if (isset($this->request->get['article_id'])) {
			$data['article_id'] = $this->request->get['article_id'];
		}



		if (!file_exists(DIR_TEMPLATE . $this->config->get('config_theme') . '/stylesheet/' . $this->_moduleSysName() . '.scss')) {
			if (file_exists(DIR_TEMPLATE . $this->config->get('config_theme') . '/stylesheet/' . $this->_moduleSysName . '.css')) {
				$this->document->addStyle('catalog/view/theme/' . $this->config->get('config_theme') . '/stylesheet/' . $this->_moduleSysName . '.css');
			} else {
				$this->document->addStyle('catalog/view/theme/default/stylesheet/' . $this->_moduleSysName . '.css');
			}
		}

		if (empty($setting['limit'])) {
			$setting['limit'] = 4;
		}

		if (!empty($setting['title'][$this->config->get('config_language_id')])) {
			$data['heading_title'] = $setting['title'][$this->config->get('config_language_id')];
		} else {
			$data['heading_title'] = '';
		}

		if ($setting['type'] == 'column') {
			
		} elseif ($setting['type'] == 'Grid') {
			
		} else {
			
		}

		$filter_data = array(
			'start' => 0,
			'limit' => $setting['limit']
		);

		$data['neoseo_quick_order_status'] = $this->config->get('neoseo_quick_order_status') || $this->config->get('neoseo_quickorder_status');

		$data['text_one_click_buy'] = $this->language->get('text_one_click_buy');
		$data['divider'] = $this->config->get('neoseo_unistor_product_selected_attributes_custom_divider');

		/* NeoSeo Product Labels - begin */
		if ($this->config->get('neoseo_product_labels_status') == 1) {
			$this->load->model("extension/module/neoseo_product_labels");
		}
		/* NeoSeo Product Labels - end */

		/* NeoSeo Notify When Available - begin */
		if ($this->config->get("neoseo_notify_when_available_status")) {
			$this->load->language("extension/module/neoseo_notify_when_available");
			$this->load->model('extension/module/neoseo_notify_when_available');
			$notify_when_available_status = $this->config->get("neoseo_notify_when_available_status");
			$notify_when_available_stock_statuses = $this->config->get("neoseo_notify_when_available_stock_statuses");
			$data['button_snwa_subscribe'] = $this->language->get('button_subscribe');
			$data['button_snwa_unsubscribe'] = $this->language->get('button_unsubscribe');
			if (isset($this->request->cookie['neoseo_notify_when_available_email'])) {
				$snwa_email = $this->request->cookie['neoseo_notify_when_available_email'];
			}
		}
		/* NeoSeo Notify When Available - end */

		$data['related_products'] = array();

		$results = $this->{"model_blog_" . $this->_moduleSysName . "_article"}->getRelatedProductsFiltered($data['article_id'], $filter_data);

		foreach ($results as $result) {

			$this->load->model('catalog/product');

			$product_info = $this->model_catalog_product->getProduct($result['product_id']);

			// �� ���������� ����������� ������
			if (empty($product_info['status'])) {
				continue;
			}

			$data['button_wishlist'] = $this->language->get('button_wishlist');
			$data['button_compare'] = $this->language->get('button_compare');
			$product_images = $this->model_catalog_product->getProductImages($result['product_id']);
			if (isset($product_images[0]) and isset($product_images[0]['image'])) {
				$product_image = $this->model_tool_image->resize($product_images[0]['image'], $setting['width'], $setting['height']);
			} else {
				$product_image = false;
			}

			if ($product_info['image']) {
				$image = $this->model_tool_image->resize($product_info['image'], $setting['width'], $setting['height']);
			} else {
				$image = $this->model_tool_image->resize('placeholder.png', $setting['width'], $setting['height']);
			}

			if (!$this->config->get('config_customer_price') && !$this->customer->isLogged()) {
				$price = $this->currency->format($this->tax->calculate($product_info['price'], $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
				$price_argo = $this->currency->format($this->tax->calculate($product_info['price'] - ($product_info['price'] / 100 * 20), $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
			} elseif ($this->customer->isLogged()) {
				$price = $this->currency->format($this->tax->calculate($product_info['price'] - ($product_info['price'] / 100 * 20), $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
				$price_argo = false;
			} else {
				$price = false;
				$price_argo = false;
			}
			$description_length = $this->config->get('neoseo_unistor_product_short_desription_length');
			if (!$description_length) {
				$description_length = 300;
			}

			if ((float) $product_info['special']) {
				$special = $this->currency->format($this->tax->calculate($product_info['special'], $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
				$price_argo = $this->currency->format($this->tax->calculate($product_info['special'] - ($product_info['special'] / 100 * 20), $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
			} else {
				$special = false;
			}

			if ($this->customer->isLogged()) {
				$reward = $product_info['reward'];
				$points = $product_info['points'];
			} else {
				$reward = false;
				$points = false;
			}
			if ($this->config->get('config_tax')) {
				$tax = $this->currency->format((float) $product_info['special'] ? $product_info['special'] : $product_info['price'], $this->session->data['currency']);
			} else {
				$tax = false;
			}

			if ($this->config->get('config_review_status')) {
				$rating = (int) $product_info['rating'];
			} else {
				$rating = false;
			}
			if ($this->config->get('neoseo_unistor_product_attributes_status')) {
				$additional_attributes = array();
				if ($this->config->get('neoseo_unistor_product_show_manufacturer') && isset($result['manufacturer']) && $result['manufacturer']) {
					$additional_attributes[] = array(
						'name' => $this->language->get('text_manufacturer'),
						'text' => $result['manufacturer']);
				}
				if ($this->config->get('neoseo_unistor_product_show_model') && isset($result['model']) && $result['model']) {
					$additional_attributes[] = array(
						'name' => $this->language->get('text_model'),
						'text' => $result['model']);
				}
				if ($this->config->get('neoseo_unistor_product_show_sku') && isset($result['sku']) && $result['sku']) {
					$additional_attributes[] = array(
						'name' => $this->language->get('text_sku'),
						'text' => $result['sku']);
				}
				if ($this->config->get('neoseo_unistor_product_show_weight') && isset($result['weight']) && $result['weight']) {
					$additional_attributes[] = array(
						'name' => $this->language->get('text_weight'),
						'text' => $result['weight']);
				}
				$attribute_groups = $this->model_catalog_product->getProductAttributes($result['product_id']);

				if ($attribute_groups) {
					foreach ($attribute_groups as $attribute_group) {
						foreach ($attribute_group['attribute'] as $attribute) {
							if (in_array($attribute['attribute_id'], $this->config->get('neoseo_unistor_product_selected_attributes'))) {
								$additional_attributes[] = array(
									'name' => $attribute['name'] . ":",
									'text' => $attribute['text']
								);
							}
						}
					}
				}
			} else {
				$additional_attributes = array();
			}
			/* NeoSeo Notify When Available - begin */
			$snwa_status = false;
			$snwa_requested = false;
			if ($product_info['quantity'] <= 0 && isset($notify_when_available_status) && $notify_when_available_status && in_array($product_info['stock_status_id'], $notify_when_available_stock_statuses)) {
				$snwa_status = true;
				if (isset($snwa_email)) {
					$snwa_request = $this->model_extension_module_neoseo_notify_when_available->getRequest($snwa_email, $product_info['product_id']);
					$snwa_requested = ($snwa_request && $snwa_request['status'] );
				}
			}
			/* NeoSeo Notify When Available - end */

			$discounts = $this->model_catalog_product->getProductDiscounts($product_info['product_id']);
			$product_discounts = array();
			foreach ($discounts as $discount) {
				$product_discounts[] = array(
					'quantity' => $discount['quantity'],
					'price' => $this->currency->format($this->tax->calculate($discount['price'], $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency'])
				);
			}
			if ($product_info['quantity'] <= 0) {
				$stock = $product_info['stock_status'];
			} elseif ($this->config->get('config_stock_display')) {
				$stock = $product_info['quantity'];
			} else {
				$stock = $this->language->get('text_instock');
			}

			$data['related_products'][] = array(
				/* NeoSeo Product Labels - begin */
				'labels' => $this->model_extension_module_neoseo_product_labels ? $this->model_extension_module_neoseo_product_labels->getLabel($product_info) : false,
				/* NeoSeo Product Labels - end */
				'product_id' => $product_info['product_id'],
				'thumb' => $image,
				'thumb1' => $product_image,
				'name' => $product_info['name'],
				'description' => utf8_substr(strip_tags(html_entity_decode($product_info['description'], ENT_QUOTES, 'UTF-8')), 0, $this->config->get('config_product_description_length')) . '..',
				'short_description' => utf8_substr(strip_tags(html_entity_decode($product_info['description'], ENT_QUOTES, 'UTF-8')), 0, $description_length) . '..',
				'price' => $price,
				'price_argo' => $price_argo,
				'special' => $special,
				'reward' => $reward,
				'points' => $points,
				'tax' => $tax,
				'minimum' => $product_info['minimum'] > 0 ? $product_info['minimum'] : 1,
				'rating' => $product_info['rating'],
				'additional_attributes' => $additional_attributes,
				'total_attributes' => count($additional_attributes),
				'stock_status_id' => ( $product_info['quantity'] > 0 ? 0 : $product_info['stock_status_id'] ),
				'stock_status' => $stock,
				/* NeoSeo Notify When Available - begin */
				'snwa_status' => $snwa_status,
				'snwa_requested' => $snwa_requested,
				/* NeoSeo Notify When Available - end */
				'discounts' => $product_discounts,
				'mpn' => $product_info['mpn'],
				'upc' => $product_info['upc'],
				'ean' => $product_info['ean'],
				'jan' => $product_info['ean'],
				'isbn' => $product_info['isbn'],
				'weight' => $product_info['weight'],
				'weight_unit' => $this->weight->getUnit($product_info['weight_class_id']),
				'href' => $this->url->link('product/product', '&product_id=' . $product_info['product_id'])
			);
		}

		if (empty($data['related_products']))
			return '';

		$template = $setting['template'];

		return $this->load->view('extension/module/' . $template, $data);
	}

}
