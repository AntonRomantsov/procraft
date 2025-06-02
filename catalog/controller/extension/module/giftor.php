<?php
class ControllerExtensionModuleGiftor extends Controller {

	private $prefix;

	public function __construct($registry) {
		parent::__construct($registry);
		$this->prefix = (version_compare(VERSION, '3.0', '>=')) ? 'module_' : '';
	}

	public function index($product_id = 0) {
		if ($this->config->get($this->prefix . 'giftor_status')) {
			if ($product_id && !$this->config->get($this->prefix . 'giftor_position')) return;

			if (!$product_id && !empty($this->request->get['product_id'])) {
				$product_id = (int) $this->request->get['product_id'];
			}

			$this->load->language('extension/module/giftor');
			$this->load->model('extension/module/giftor');
			$product_gifts = $this->model_extension_module_giftor->getGiftsByProduct($product_id);
			
			if (!empty($product_gifts)) {

				$this->load->model('tool/image');
				$this->load->model('catalog/product');

				$product_current = $this->model_catalog_product->getProduct($product_id);
				$data['product_name'] = $product_current['name'];

				$data['position'] = $this->config->get($this->prefix . 'giftor_position');
				$data['css'] = $this->config->get($this->prefix . 'giftor_css');
				$data['product_id'] = $product_id;

				$data['product_gifts'] = array();
				
				foreach ($product_gifts as $product_gift) {
					$product_info = $this->model_catalog_product->getProduct($product_gift['product_id']);
					if ($product_info['image']) {
						$image = $this->model_tool_image->resize($product_info['image'], $this->config->get($this->prefix . 'giftor_width'), $this->config->get($this->prefix . 'giftor_height'));
					} else {
						$image = $this->model_tool_image->resize('placeholder.png', $this->config->get($this->prefix . 'giftor_width'), $this->config->get($this->prefix . 'giftor_height'));
					}

					if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
						$price = $this->currency->format($this->tax->calculate($product_info['price'], $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
					} else {
						$price = false;
					}

					if (!is_null($product_info['special']) && (float)$product_info['special'] >= 0) {
						$special = $this->currency->format($this->tax->calculate($product_info['special'], $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
					} else {
						$special = false;
					}
						

					$data['product_gifts'][$product_gift['product_id']] = array(
						'product_id' => $product_info['product_id'],
						'name' => $product_info['name'],
						'thumb' => $image,
						'price' => $price,
						'special' => $special,
						'quantity' => $product_info['quantity'],
						'min_total' => $product_gift['min_total'],
						'max_total' => $product_gift['max_total'],
						'date_start' => date($this->language->get('date_format_short'), strtotime($product_gift['date_start'])),
						'date_end' => date($this->language->get('date_format_short'), strtotime($product_gift['date_end'])),
						'href' => $this->url->link('product/product', 'product_id=' . $product_gift['product_id'], true)
					);
					
				}

				if (!empty($data['product_gifts'])) {

					$insert = array_values($data['product_gifts'])[0];

					$input = array('{product_name}', '{gift_name}', '{gift_price}', '{gift_quantity}', '{min_order_total}', '{max_order_total}', '{date_start}', '{date_end}');
					$output = array($data['product_name'], $insert['name'], $insert['price'], $insert['quantity'], $insert['min_total'], $insert['max_total'], $insert['date_start'], $insert['date_end']);

					$title = $this->config->get($this->prefix . 'giftor_description')[$this->config->get('config_language_id')]['title'];
					if ($title) {
						$data['title'] = str_replace($input, $output, $title);
					} else {
						$data['title'] = '';
					}

					$description = $this->config->get($this->prefix . 'giftor_description')[$this->config->get('config_language_id')]['description'];
					if ($description) {
						$data['description'] = html_entity_decode(str_replace($input, $output, $description), ENT_QUOTES, 'UTF-8');
					} else {
						$data['description'] = '';
					}

					return $this->load->view('extension/module/giftor', $data);

				}
			}
		}
	}

}