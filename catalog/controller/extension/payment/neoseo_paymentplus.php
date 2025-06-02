<?php

require_once( DIR_SYSTEM . "/engine/neoseo_controller.php");

class ControllerExtensionPaymentNeoSeoPaymentPlus extends NeoSeoController
{

	public function __construct($registry)
	{
		parent::__construct($registry);
		$this->_moduleSysName = "neoseo_paymentplus";
				$this->_modulePostfix = ""; // Постфикс для разных типов модуля, поэтому переходим на испольлзование $this->_moduleSysName()
		$this->_logFile = $this->_moduleSysName() . ".log";
		$this->debug = $this->config->get($this->_moduleSysName() . "_debug") == 1;
	}

	public function index()
	{
		$data = $this->load->language('extension/payment/' . $this->_moduleSysName());
		$data['continue'] = $this->url->link('checkout/success');

		return $this->load->view('extension/payment/' . $this->_moduleSysName(), $data);
	}

	public function confirm()
	{
		if ($this->session->data['payment_method']['code']) {
			$payment_method = explode(".", $this->session->data['payment_method']['code']);

			if ($payment_method[0] == 'neoseo_paymentplus') {
				$this->load->language('extension/payment/' . $this->_moduleSysName());
				$this->load->model('checkout/order');
				$this->load->model('extension/payment/' . $this->_moduleSysName());
				//Если переименовать оплату в "paymentplus.1" то строку ниже можно удалить
				$payment_id = str_replace("neoseo_paymentplus", "", $payment_method[1]);
				$payment_data = $this->{'model_extension_payment_' . $this->_moduleSysName()}->getPayment((int) $payment_id);
				$comment = $this->language->get('text_instruction') . "\n\n";
				$comment .= $payment_data['name'] . "\n\n";
				$comment .= html_entity_decode($payment_data['description']);

				$this->model_checkout_order->addOrderHistory($this->session->data['order_id'], $payment_data['order_status_id'], $comment, true);
			}
		}
	}

}
