<?php

require_once( DIR_SYSTEM . "/engine/neoseo_controller.php");

class ControllerCheckoutNeoSeoCart extends NeoSeoController
{

	public function __construct($registry)
	{
		parent::__construct($registry);
		$this->_moduleName = "neoseo_cart";
		$this->_moduleSysName = "neoseo_checkout";
		$this->_modulePostfix = "";
		$this->_logFile = $this->_moduleSysName() . ".log";
		$this->debug = $this->config->get($this->_moduleSysName() . "_debug");
	}

	public function index()
	{

		$data = $this->load->language($this->_route . '/' . $this->_moduleSysName());

		if (isset($this->request->get['remove'])) {
			$this->cart->remove($this->request->get['remove']);

			unset($this->session->data['vouchers'][$this->request->get['remove']]);
		}

		$data['voucher_status'] = $this->config->get('voucher_status');
		$data['coupon_status'] = $this->config->get('coupon_status');
		$data['reward_status'] = $this->config->get('reward_status');

		// Totals
		$this->load->model('setting/extension');

		$totals = array();
		$taxes = $this->cart->getTaxes();
		$total = 0;

		// Because __call can not keep var references so we put them into an array.
		$total_data = array(
			'totals' => &$totals,
			'taxes' => &$taxes,
			'total' => &$total
		);

		// Display prices
		if (($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) {
			$sort_order = array();

			$results = $this->model_setting_extension->getExtensions('total');


			foreach ($results as $key => $value) {
				$sort_order[$key] = $this->config->get('total_' . $value['code'] . '_sort_order');
			}

			array_multisort($sort_order, SORT_ASC, $results);

			foreach ($results as $result) {

				if ($this->config->get('total_' . $result['code'] . '_status')) {

					$this->load->model('extension/total/' . $result['code']);

					$this->{'model_extension_total_' . $result['code']}->getTotal($total_data);
				}
			}

			$sort_order = array();

			foreach ($totals as $key => $value) {
				$sort_order[$key] = $value['sort_order'];
			}

			array_multisort($sort_order, SORT_ASC, $totals);
		}

		$data['totals'] = array();
		/* free_delivery_min_amount */
		if (!empty($totals)) {
			$data['totals'][] = $this->getAmountToFreeDelivery($total);
			/* free_delivery_min_amount */

			foreach ($totals as $total) {
				$data['totals'][] = array('title' => $total['title'], 'text' => $this->currency->format($total['value'], $this->session->data['currency']), 'value' =>  $this->currency->format($total['value'], $this->session->data['currency'], '', false));
			}
		}


		$this->load->model('tool/image');

		$data['products'] = array();

		foreach ($this->cart->getProducts() as $product) {
			if ($product['image']) {
				$image = $this->model_tool_image->resize($product['image'], $this->config->get('theme_default_image_cart_width'), $this->config->get('theme_default_image_cart_height'));
			} else {
				$image = $this->model_tool_image->resize('placeholder.png', $this->config->get('theme_default_image_cart_width'), $this->config->get('theme_default_image_cart_heigh'));
			}

			$option_data = array();

			foreach ($product['option'] as $option) {
				if ($option['type'] != 'file') {
					$value = $option['value'];
				} else {
					$filename = $this->encryption->decrypt($this->config->get('config_encryption'), $option['value']);

					$value = utf8_substr($filename, 0, utf8_strrpos($filename, '.'));
				}

				$option_data[] = array(
					'name' => $option['name'],
					'value' => (utf8_strlen($value) > 20 ? utf8_substr($value, 0, 20) . '..' : $value),
					'type' => $option['type']
				);
			}

			// Display prices
			if (($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) {
				$price = $this->currency->format($this->tax->calculate($product['price'], $product['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
			} else {
				$price = false;
			}

			// Display prices
			if (($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) {
				$total = $this->currency->format($this->tax->calculate($product['price'], $product['tax_class_id'], $this->config->get('config_tax')) * $product['quantity'], $this->session->data['currency']);
			} else {
				$total = false;
			}

			$data['products'][] = array(
				'key' => $product['cart_id'],
				'thumb' => $image,
				'name' => $product['name'],
				'model' => $product['model'],
				'stock' => $product['stock'],
				'option' => $option_data,
				'quantity' => $product['quantity'],
				'price' => $price,
				'total' => $total,
				'href' => $this->url->link('product/product', 'product_id=' . $product['product_id'])
			);
		}

		// Gift Voucher
		$data['vouchers'] = array();

		if (!empty($this->session->data['vouchers'])) {
			foreach ($this->session->data['vouchers'] as $key => $voucher) {
				$data['vouchers'][] = array(
					'key' => $key,
					'description' => $voucher['description'],
					'amount' => $this->currency->format($voucher['amount'], $this->session->data['currency'])
				);
			}
		}

		$points_total = 0;
		foreach ($this->cart->getProducts() as $product) {
			if ($product['points']) {
				$points_total += $product['points'];
			}
		}

		if ($points_total && $this->customer->isLogged() && (int) $this->customer->getRewardPoints() > 0) {
			$data['reward'] = true;
			$data['entry_reward'] = sprintf($this->language->get('entry_reward'), $points_total, (int) $this->customer->getRewardPoints());
		} else {
			$data['reward'] = false;
		}

		$data['cart'] = $this->url->link($this->_route . '/cart', '', 'SSL');

		$this->response->setOutput($this->load->view($this->_route . '/' . $this->_moduleName, $data));
	}

	/* free_delivery_min_amount */

	private function getAmountToFreeDelivery($total, $init = False)
	{
		$amount_to_free_delivery = 0;
		$free_delivery_min_amount = $this->config->get($this->_moduleSysName() . '_free_delivery_min_amount');

		if ($free_delivery_min_amount >= 0 AND $total < $free_delivery_min_amount) {
			$amount_to_free_delivery = $free_delivery_min_amount - $total;
		}
		if ($init)
			$this->load->language($this->_route . '/' . $this->_moduleSysName());

		return array(
			'title' => $this->language->get('text_amount_to_free_delivery'),
			'text' => $this->currency->format($amount_to_free_delivery, $this->session->data['currency'])
		);
	}

	/* free_delivery_min_amount */

	public function getTotals($json)
	{
		$data = $this->load->language($this->_route . '/' . $this->_moduleSysName());

		// Totals
		$this->load->model('setting/extension');

		$totals = array();
		$taxes = $this->cart->getTaxes();
		$total = 0;

		// Because __call can not keep var references so we put them into an array.
		$total_data = array(
			'totals' => &$totals,
			'taxes' => &$taxes,
			'total' => &$total
		);

		// Display prices
		if (($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) {
			$sort_order = array();

			$results = $this->model_setting_extension->getExtensions('total');

			foreach ($results as $key => $value) {
				$sort_order[$key] = $this->config->get('total_' . $value['code'] . '_sort_order');
			}

			array_multisort($sort_order, SORT_ASC, $results);

			foreach ($results as $result) {
				if ($this->config->get('total_' . $result['code'] . '_status')) {
					$this->load->model('extension/total/' . $result['code']);

					$this->{'model_extension_total_' . $result['code']}->getTotal($total_data);
				}

				$sort_order = array();

				foreach ($totals as $key => $value) {
					$sort_order[$key] = $value['sort_order'];
				}

				array_multisort($sort_order, SORT_ASC, $totals);
			}
		}

		//$json['total'] = sprintf($this->language->get('text_items'), $this->cart->countProducts() + (isset($this->session->data['vouchers']) ? count($this->session->data['vouchers']) : 0), $this->currency->format($total));
		$json['total'] = sprintf($this->language->get('text_cart_items'), $this->currency->format($total, $this->session->data['currency']));
		$json['total_items'] = $this->cart->countProducts();

		return $json;
	}

	public function update()
	{
		$json = array();

		if (!empty($this->request->post['quantity'])) {
			foreach ($this->request->post['quantity'] as $key => $value) {
				$this->cart->update($key, $value);
			}

			unset($this->session->data['reward']);
		}

		if (isset($this->request->post['remove'])) {
			$this->cart->remove($this->request->post['remove']);

			unset($this->session->data['vouchers'][$this->request->post['remove']]);
			unset($this->session->data['reward']);
		}

		if (!$this->cart->hasProducts()) {
			$json['redirect'] = $this->url->link($this->_route . '/cart');
		}

		// Validate min amount
		$data['min_amount'] = $this->config->get($this->_moduleSysName() . "_min_amount");
		$data['subtotal'] = $this->cart->getSubTotal();
		if ($data['min_amount'] > 0 && $data['min_amount'] > $data['subtotal']) {
			$json['redirect'] = $this->url->link($this->_route . '/cart');
		}

		$json = $this->getTotals($json);

		$this->outputJson($json);
	}

	public function validateCoupon()
	{
		$this->load->language($this->_route . '/' . $this->_moduleSysName());
		$this->load->model('extension/total/coupon');

		$json = array();

		if (!isset($this->request->post['coupon']) || empty($this->request->post['coupon'])) {
			$this->request->post['coupon'] = '';
			$this->session->data['coupon'] = '';
		}

		$coupon_info = $this->model_extension_total_coupon->getCoupon($this->request->post['coupon']);

		if (!$coupon_info) {
			$json['error']['warning'] = $this->language->get('error_coupon');
		}

		if (!$json) {
			$this->session->data['coupon'] = $this->request->post['coupon'];

			$json['success'] = $this->language->get('text_coupon');
		}

		$this->response->setOutput(json_encode($json));
	}

	public function validateVoucher()
	{
		$this->load->language($this->_route . '/' . $this->_moduleSysName());
		$this->load->model('extension/total/voucher');

		$json = array();

		if (!isset($this->request->post['voucher']) || empty($this->request->post['voucher'])) {
			$this->request->post['voucher'] = '';
			$this->session->data['voucher'] = '';
		}

		$voucher_info = $this->model_extension_total_voucher->getVoucher($this->request->post['voucher']);

		if (!$voucher_info) {
			$json['error']['warning'] = $this->language->get('error_voucher');
		}

		if (!$json) {
			$this->session->data['voucher'] = $this->request->post['voucher'];

			$json['success'] = $this->language->get('text_coupon');
		}

		$this->response->setOutput(json_encode($json));
	}

	public function validateReward()
	{
		$this->load->language($this->_route . '/' . $this->_moduleSysName());

		$points = $this->customer->getRewardPoints();

		$points_total = 0;

		foreach ($this->cart->getProducts() as $product) {
			if ($product['points']) {
				$points_total += $product['points'];
			}
		}

		$json = array();

		if (empty($this->request->post['reward'])) {
			$json['error']['warning'] = $this->language->get('error_reward');
		}

		if ($this->request->post['reward'] > $points) {
			$json['error']['warning'] = sprintf($this->language->get('error_points'), $this->request->post['reward']);
		}

		/* if ($this->request->post['reward'] > $points_total) {
		  $json['error']['warning'] = sprintf($this->language->get('error_maximum'), $points_total);
		  } */

		if (!$json) {
			$this->session->data['reward'] = abs($this->request->post['reward']);

			$json['success'] = $this->language->get('text_reward');
		}

		$this->response->setOutput(json_encode($json));
	}

}

?>