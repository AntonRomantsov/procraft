<?php

require_once( DIR_SYSTEM . "/engine/neoseo_controller.php");
require_once( DIR_SYSTEM . '/engine/neoseo_view.php' );

class ControllerExtensionPaymentNeoSeoPaymentPlus extends NeoSeoController
{

	private $error = array();

	public function __construct($registry)
	{
		parent::__construct($registry);
		$this->_moduleSysName = "neoseo_paymentplus";
				$this->_modulePostfix = ""; // Постфикс для разных типов модуля, поэтому переходим на испольлзование $this->_moduleSysName()
		$this->_moduleType = 'payment';
		$this->_logFile = $this->_moduleSysName() . ".log";
		$this->debug = $this->config->get($this->_moduleSysName() . "_debug") == 1;
	}

	public function index()
	{
		$this->upgrade();

		$data = $this->language->load('extension/' . $this->_route . '/' . $this->_moduleSysName());
		$this->document->setTitle($this->language->get('heading_title_raw'));

		$this->load->model('setting/setting');
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting($this->_moduleSysName(), $this->request->post);

			//Это нужно чтобы при нажатии кнопки "сохранить и закрыть" был правильный статус
			$this->model_extension_payment_neoseo_paymentplus->setModuleStatus($this->request->post[$this->_moduleSysName() . "_status"]);

			$this->session->data['success'] = $this->language->get('text_success');

			if ($this->request->post['action'] == "save") {
				$this->response->redirect($this->url->link('extension/' . $this->_route . '/' . $this->_moduleSysName(), 'user_token=' . $this->session->data['user_token'], true));
			} else {
				$this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=' . $this->_moduleType, true));
			}
		}

		$this->getList();
	}

	public function add()
	{
		$data = $this->language->load('extension/' . $this->_route . '/' . $this->_moduleSysName());
		$this->document->setTitle($this->language->get('heading_title_raw'));
		$this->load->model('tool/' . $this->_moduleSysName());

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			if (empty($this->request->post['payment_stores'])) {
				$this->request->post['payment_stores'] = array();
			}

			$payment_id = $this->{'model_tool_' . $this->_moduleSysName()}->addPayment($this->request->post);
			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';
			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			if ($this->request->post['action'] == "save") {
				$this->response->redirect($this->url->link('extension/' . $this->_route . '/' . $this->_moduleSysName() . '/edit', 'payment_id=' . $payment_id . '&user_token=' . $this->session->data['user_token'] . $url, true));
			} else {
				$this->response->redirect($this->url->link('extension/' . $this->_route . '/' . $this->_moduleSysName(), 'user_token=' . $this->session->data['user_token'] . $url . "#tab-methods", true));
			}
		}

		$this->getForm();
	}

	public function copy()
	{
		$data = $this->language->load('extension/' . $this->_route . '/' . $this->_moduleSysName());

		$this->document->setTitle($this->language->get('heading_title_raw'));

		$this->load->model('tool/' . $this->_moduleSysName());

		if (isset($this->request->post['selected']) && $this->validateCopy()) {
			foreach ($this->request->post['selected'] as $payment_id) {
				$this->{'model_tool_' . $this->_moduleSysName()}->copyPayment($payment_id);
			}

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';
			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link('extension/' . $this->_route . '/' . $this->_moduleSysName(), 'user_token=' . $this->session->data['user_token'] . $url . "#tab-methods", true));
		}

		$this->getList();
	}

	protected function getList()
	{
		$data = $this->language->load('extension/' . $this->_route . '/' . $this->_moduleSysName());
		$this->load->model('tool/' . $this->_moduleSysName());

		$this->load->model('extension/' . $this->_route . "/" . $this->_moduleSysName());
		$data = $this->initParamsListEx($this->{"model_extension_" . $this->_route . "_" . $this->_moduleSysName()}->getParams(), $data);

		$url = '';
		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		$data = $this->initBreadcrumbs(array(
			array('marketplace/extension&type=' . $this->_moduleType, "text_payment"),
			array('extension/' . $this->_route . '/' . $this->_moduleSysName() . '&type=' . $this->_moduleType, "heading_title_raw")
				), $data);

		$data = $this->initButtons($data, $this->_moduleType);

		$data['add'] = $this->url->link('extension/' . $this->_route . '/' . $this->_moduleSysName() . '/add', 'user_token=' . $this->session->data['user_token'], true);
		$data['delete'] = $this->url->link('extension/' . $this->_route . '/' . $this->_moduleSysName() . '/delete', 'user_token=' . $this->session->data['user_token'] . $url . "#tab-methods", true);
		$data['clone'] = $this->url->link('extension/' . $this->_route . '/' . $this->_moduleSysName() . '/copy', 'user_token=' . $this->session->data['user_token'] . $url . "#tab-methods", true);


		$data['payments'] = array();

		$filter_data = array(
			'start' => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit' => $this->config->get('config_limit_admin')
		);

		$this->load->model('tool/' . $this->_moduleSysName());

		$payment_total = $this->{'model_tool_' . $this->_moduleSysName()}->getTotalPayments();

		$results = $this->{'model_tool_' . $this->_moduleSysName()}->getPayments($filter_data);

		if ($results) {
			foreach ($results as $result) {
				$data['payments'][] = array(
					'payment_id' => $result['payment_id'],
					'name' => $result['name'],
					'sort_order' => $result['sort_order'],
					'status' => $result['status'],
					'edit' => $this->url->link('extension/' . $this->_route . '/' . $this->_moduleSysName() . '/edit', 'user_token=' . $this->session->data['user_token'] . '&payment_id=' . $result['payment_id'] . $url, true),
					'delete' => $this->url->link('extension/' . $this->_route . '/' . $this->_moduleSysName() . '/delete', 'user_token=' . $this->session->data['user_token'] . '&payment_id=' . $result['payment_id'] . $url . "#tab-methods", true),
					'clone' => $this->url->link('extension/' . $this->_route . '/' . $this->_moduleSysName() . '/copy', 'user_token=' . $this->session->data['user_token'] . '&payment_id=' . $result['payment_id'] . $url . "#tab-methods", true)
				);
			}
		}

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else if (isset($this->session->data['error_warning'])) {
			$data['error_warning'] = $this->session->data['error_warning'];
			unset($this->session->data['error_warning']);
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->session->data['success'])) {
			$data['success'] = $this->session->data['success'];
			unset($this->session->data['success']);
		} else {
			$data['success'] = '';
		}

		if (isset($this->request->post['selected'])) {
			$data['selected'] = (array) $this->request->post['selected'];
		} else {
			$data['selected'] = array();
		}

		$pagination = new Pagination();
		$pagination->total = $payment_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_limit_admin');
		$pagination->url = $this->url->link('extension/' . $this->_route . '/' . $this->_moduleSysName(), 'user_token=' . $this->session->data['user_token'] . '&page={page}' . "#tab-methods", true);

		$data['pagination'] = $pagination->render();
		$data['results'] = sprintf($this->language->get('text_pagination'), ($payment_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($payment_total - $this->config->get('config_limit_admin'))) ? $payment_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $payment_total, ceil($payment_total / $this->config->get('config_limit_admin')));

		$data["user_token"] = $this->session->data['user_token'];
		$data['config_language_id'] = $this->config->get('config_language_id');
		$data['params'] = $data;

		$data['statuses'] = array(
			'0' => $this->language->get('text_disabled'),
			'1' => $this->language->get('text_enabled')
		);

		$data['logs'] = $this->getLogs();

		$widgets = new NeoSeoWidgets($this->_moduleSysName() . '_', $data);
		$widgets->text_select_all = $this->language->get('text_select_all');
		$widgets->text_unselect_all = $this->language->get('text_unselect_all');
		$data['widgets'] = $widgets;

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/' . $this->_route . '/' . $this->_moduleSysName(), $data));
	}

	public function edit()
	{
		$data = $this->language->load('extension/' . $this->_route . '/' . $this->_moduleSysName());

		$this->document->setTitle($this->language->get('heading_title_raw'));

		$this->load->model('tool/' . $this->_moduleSysName());

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			if (empty($this->request->post['payment_stores'])) {
				$this->request->post['payment_stores'] = array();
			}

			$this->{'model_tool_' . $this->_moduleSysName()}->editPayment($this->request->get['payment_id'], $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';
			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			if ($this->request->post['action'] == 'save') {
				$this->response->redirect($this->url->link('extension/' . $this->_route . '/' . $this->_moduleSysName() . '/edit', 'payment_id=' . $this->request->get['payment_id'] . '&user_token=' . $this->session->data['user_token'] . $url, true));
			} else {
				$this->response->redirect($this->url->link('extension/' . $this->_route . '/' . $this->_moduleSysName(), 'user_token=' . $this->session->data['user_token'] . $url . "#tab-methods", true));
			}
		}

		$this->getForm();
	}

	public function delete()
	{
		$data = $this->language->load('extension/' . $this->_route . '/' . $this->_moduleSysName());

		$this->document->setTitle($this->language->get('heading_title_raw'));

		$this->load->model('tool/' . $this->_moduleSysName());

		if ((isset($this->request->post['selected']) or isset($this->request->get['payment_id'])) && $this->validateDelete()) {
			if (isset($this->request->post['selected'])) {
				foreach ($this->request->post['selected'] as $payment_id) {
					$this->{'model_tool_' . $this->_moduleSysName()}->deletePayment($payment_id);
				}
			} else {
				$this->{'model_tool_' . $this->_moduleSysName()}->deletePayment($this->request->get['payment_id']);
			}

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';
			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link('extension/' . $this->_route . '/' . $this->_moduleSysName(), 'user_token=' . $this->session->data['user_token'] . $url . "#tab-methods", true));
		}

		$this->getList();
	}

	protected function getForm()
	{

		if ($this->config->get('config_editor_default')) {
			$this->document->addScript('view/javascript/ckeditor/ckeditor.js');
			$this->document->addScript('view/javascript/ckeditor/ckeditor_init.js');
		}

		$data = $this->language->load('extension/' . $this->_route . '/' . $this->_moduleSysName());

		$this->load->model('extension/' . $this->_route . "/" . $this->_moduleSysName());
		$data = $this->initParamsListEx($this->{"model_extension_" . $this->_route . "_" . $this->_moduleSysName()}->getParams(), $data);

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else if (isset($this->session->data['error_warning'])) {
			$data['error_warning'] = $this->session->data['error_warning'];
			unset($this->session->data['error_warning']);
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->error['name'])) {
			$data['error_name'] = $this->error['name'];
		} else {
			$data['error_name'] = array();
		}

		$data = $this->initBreadcrumbs(array(
			array('marketplace/extension&type=' . $this->_moduleType, "text_payment"),
			array('extension/' . $this->_route . '/' . $this->_moduleSysName() . '&type=' . $this->_moduleType, "heading_title_raw", "#tab-methods")
				), $data);


		if (isset($this->request->get['payment_id'])) {
			$data['save'] = $this->url->link('extension/' . $this->_route . '/' . $this->_moduleSysName() . '/edit', 'payment_id=' . $this->request->get['payment_id'] . '&user_token=' . $this->session->data['user_token'], true);
			$data['save_and_close'] = $this->url->link('extension/' . $this->_route . $this->_moduleSysName() . '/add', 'payment_id=' . $this->request->get['payment_id'] . '&user_token=' . $this->session->data['user_token'] . "&close=1" . "#tab-methods", 'SSL');
		} else {
			$data['save'] = $this->url->link('extension/' . $this->_route . '/' . $this->_moduleSysName() . '/add', 'user_token=' . $this->session->data['user_token'], true);
			$data['save_and_close'] = $this->url->link('extension/' . $this->_route . '/' . $this->_moduleSysName() . '/add', 'user_token=' . $this->session->data['user_token'] . "&close=1" . "#tab-methods", 'SSL');
		}

		$data['close'] = $this->url->link('extension/' . $this->_route . '/' . $this->_moduleSysName(), 'user_token=' . $this->session->data['user_token'] . "#tab-methods", 'SSL');

		$this->load->model('tool/' . $this->_moduleSysName());
		if (isset($this->request->get['payment_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$payment_info = $this->{'model_tool_' . $this->_moduleSysName()}->getPayment($this->request->get['payment_id']);
		}

		$data['user_token'] = $this->session->data['user_token'];
		$data['ckeditor'] = $this->config->get('config_editor_default');

		$this->load->model('localisation/language');

		$data['languages'] = $this->model_localisation_language->getLanguages();

		$data['lang'] = $this->language->get('lang');

		if (isset($this->request->post['payment_description'])) {
			$data['payment_description'] = $this->request->post['payment_description'];
		} elseif (isset($this->request->get['payment_id'])) {
			$data['payment_description'] = $this->{'model_tool_' . $this->_moduleSysName()}->getPaymentDescriptions($this->request->get['payment_id']);
		} else {
			$data['payment_description'] = array();
		}

		$this->load->model('localisation/geo_zone');
		$data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();

		if (isset($this->request->post['price_min'])) {
			$data['price_min'] = $this->request->post['price_min'];
		} elseif (!empty($payment_info)) {
			$data['price_min'] = $payment_info['price_min'];
		} else {
			$data['price_min'] = "";
		}

		if (isset($this->request->post['price_max'])) {
			$data['price_max'] = $this->request->post['price_max'];
		} elseif (!empty($payment_info)) {
			$data['price_max'] = $payment_info['price_max'];
		} else {
			$data['price_max'] = "";
		}

		if (isset($this->request->post['geo_zone_id'])) {
			$data['geo_zone_id'] = $this->request->post['geo_zone_id'];
		} elseif (!empty($payment_info)) {
			$data['geo_zone_id'] = $payment_info['geo_zone_id'];
		} else {
			$data['geo_zone_id'] = "";
		}

		if (isset($this->request->post['order_status_id'])) {
			$data['order_status_id'] = $this->request->post['order_status_id'];
		} elseif (!empty($payment_info)) {
			$data['order_status_id'] = $payment_info['order_status_id'];
		} else {
			$data['order_status_id'] = "";
		}

		$this->load->model('localisation/order_status');
		$data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();

		if (isset($this->request->post['cities'])) {
			$data['cities'] = $this->request->post['cities'];
		} elseif (!empty($payment_info)) {
			$data['cities'] = $payment_info['cities'];
		} else {
			$data['cities'] = "";
		}

		if (isset($this->request->post['sort_order'])) {
			$data['sort_order'] = $this->request->post['sort_order'];
		} elseif (!empty($payment_info)) {
			$data['sort_order'] = $payment_info['sort_order'];
		} else {
			$data['sort_order'] = 0;
		}

		if (isset($this->request->post['status'])) {
			$data['status'] = $this->request->post['status'];
		} elseif (!empty($payment_info)) {
			$data['status'] = $payment_info['status'];
		} else {
			$data['status'] = true;
		}

		$data['stores'] = $this->{'model_extension_' . $this->_route . '_' . $this->_moduleSysName()}->getStores();
		$data['entry_stores'] = $this->language->get('entry_stores');

		$data['payments'] = $this->{'model_tool_' . $this->_moduleSysName()}->getAllPayments();
		$data['payment_stores'] = array();
		if (isset($this->request->get['payment_id']) && isset($data['payments'][$this->request->get['payment_id']]) && !empty($data['payments'][$this->request->get['payment_id']]['stores'])) {
			$data['payment_stores'] = json_decode($data['payments'][$this->request->get['payment_id']]['stores'], true);
		}

		$data["user_token"] = $this->session->data['user_token'];
		$data['config_language_id'] = $this->config->get('config_language_id');
		$data['params'] = $data;

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/' . $this->_route . '/' . $this->_moduleSysName() . '_form', $data));
	}

	protected function validateForm()
	{
		if (!$this->user->hasPermission('modify', 'extension/' . $this->_route . '/' . $this->_moduleSysName())) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		foreach ($this->request->post['payment_description'] as $language_id => $value) {
			if ((utf8_strlen($value['name']) < 2) || (utf8_strlen($value['name']) > 255)) {
				$this->error['name'][$language_id] = $this->language->get('error_name');
			}
		}

		return !$this->error;
	}

	protected function validateDelete()
	{
		if (!$this->user->hasPermission('modify', 'extension/' . $this->_route . '/' . $this->_moduleSysName())) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		return !$this->error;
	}

	protected function validate()
	{
		if (!$this->user->hasPermission('modify', 'extension/' . $this->_route . '/' . $this->_moduleSysName())) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		return !$this->error;
	}

	protected function validateCopy()
	{
		if (!$this->user->hasPermission('modify', 'extension/' . $this->_route . '/' . $this->_moduleSysName())) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		return !$this->error;
	}

}
