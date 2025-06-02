<?php
class ControllerApiKeycrmShipping extends Controller {
	public function methods() {
		$this->load->language('api/shipping');

		$json = array();

		if (!$json) {
			// Shipping Methods
			$json['shipping_methods'] = array();

			if (version_compare(VERSION, '3.0', '<')) {
				$this->load->model('extension/extension');

				$results = $this->model_extension_extension->getExtensions('shipping');
			} else {
				$this->load->model('setting/extension');

				$results = $this->model_setting_extension->getExtensions('shipping');
			}

			foreach ($results as $result) {
				if ($this->config->get($result['code'] . '_status') || $this->config->get('shipping_' . $result['code'] . '_status')) {
					$this->load->model('extension/shipping/' . $result['code']);

					$quote = $this->{'model_extension_shipping_' . $result['code']}->getQuote([
						'country_id' => 0,
						'zone_id' => 0,
					]);

					if ($quote) {
						$json['shipping_methods'][$result['code']] = array(
							'title'      => $quote['title'],
							'quote'      => $quote['quote'],
							'sort_order' => $quote['sort_order'],
							'error'      => $quote['error']
						);
					} else {
						$this->load->language('extension/shipping/' . $result['code']);

						$title = strip_tags($this->language->get('text_title'));
						$description = !empty($this->language->get('text_description')) ? $this->language->get('text_description') : $title;

						$json['shipping_methods'][$result['code']] = array(
							'title'      => $title,
							'quote'      => [
								$result['code'] => [
									'code'         => $result['code'] . '.' . $result['code'],
									'title'        => $description,
									'cost'         => 0.00,
									'tax_class_id' => 0,
									'text'         => 0
								]
							],
							'sort_order' => 0,
							'error'      => false
						);
					}
				}
			}

			$sort_order = array();

			foreach ($json['shipping_methods'] as $key => $value) {
				$sort_order[$key] = $value['sort_order'];
			}

			array_multisort($sort_order, SORT_ASC, $json['shipping_methods']);
		}

		if (isset($this->request->server['HTTP_ORIGIN'])) {
			$this->response->addHeader('Access-Control-Allow-Origin: ' . $this->request->server['HTTP_ORIGIN']);
			$this->response->addHeader('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
			$this->response->addHeader('Access-Control-Max-Age: 1000');
			$this->response->addHeader('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
}
