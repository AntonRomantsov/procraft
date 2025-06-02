<?php

require_once( DIR_SYSTEM . "/engine/neoseo_controller.php");

class ControllerCheckoutNeoSeoDroppedCart extends NeoSeoController
{

	public function __construct($registry)
	{
		parent::__construct($registry);
		$this->_moduleName = "neoseo_dropped_cart";
		$this->_moduleSysName = "neoseo_checkout";
		$this->_modulePostfix = "";
		$this->_logFile = $this->_moduleSysName() . ".log";
		$this->debug = $this->config->get($this->_moduleSysName() . "_debug");
	}

	public function restore($data = array())
	{
		if ($this->request->get['user_token']) {
			$this->load->model($this->_route . '/' . $this->_moduleName);
			$this->{"model_" . $this->_route . "_" . $this->_moduleName}->load($this->request->get['user_token']);
			$products = $this->cart->getProducts();
			$this->{"model_" . $this->_route . "_" . $this->_moduleName}->setProducts($products, false);
			$this->{"model_" . $this->_route . "_" . $this->_moduleName}->updateCart(true);
			$this->response->redirect($this->url->link($this->_route . '/cart', '', 'SSL'));
		}
	}

	public function sync($data = array())
	{
		//$this->log('sync');
		if (isset($this->session->data['dropped_cart_update_process']) && $this->session->data['dropped_cart_update_process'])
			return;
		$this->load->model($this->_route . '/' . $this->_moduleName);
		if (!$this->{"model_" . $this->_route . "_" . $this->_moduleName}->getEmail())
			return;

		$products = $this->cart->getProducts();

		if (is_array($data) && count($data) > 0) {
			$this->{"model_" . $this->_route . "_" . $this->_moduleName}->setProducts($products);
			$this->{"model_" . $this->_route . "_" . $this->_moduleName}->updateCart();
		} else {
			$this->{"model_" . $this->_route . "_" . $this->_moduleName}->clear();
		}
	}

	public function merge($data = array())
	{
		//$this->log('merge');
		if (isset($this->session->data['dropped_cart_update_process']) && $this->session->data['dropped_cart_update_process'])
			return;
		$this->load->model($this->_route . '/' . $this->_moduleName);
		$products = $this->cart->getProducts();
		$this->{"model_" . $this->_route . "_" . $this->_moduleName}->setProducts($products, false);
		$this->{"model_" . $this->_route . "_" . $this->_moduleName}->updateCart();
	}

	public function clear($data = null)
	{
		//$this->log('clear');
		$this->load->model($this->_route . '/' . $this->_moduleName);
		$this->{"model_" . $this->_route . "_" . $this->_moduleName}->clear();
	}

}
