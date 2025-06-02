<?php

require_once( DIR_SYSTEM . '/engine/neoseo_controller.php');
require_once( DIR_SYSTEM . '/engine/neoseo_view.php' );

class ControllerExtensionShippingNeoSeoShippingPlus extends NeoSeoController
{

	private $error = array();

	public function __construct($registry)
	{
		parent::__construct($registry);
		$this->_moduleSysName = "neoseo_shippingplus";
				$this->_moduleType = 'shipping';
		$this->_modulePostfix = ""; // Постфикс для разных типов модуля, поэтому переходим на испольлзование $this->_moduleSysName()
		$this->_logFile = $this->_moduleSysName() . ".log";
		$this->debug = $this->config->get($this->_moduleSysName() . "_debug") == 1;
	}

	public function index()
	{
		$this->upgrade();

		$data = $this->language->load('extension/' . $this->_route . '/' . $this->_moduleSysName());

		$this->document->setTitle($this->language->get('heading_title_raw'));

		$this->load->model('setting/setting');
		$this->load->model('extension/' . $this->_route . "/" . $this->_moduleSysName());

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {

			$this->model_setting_setting->editSetting($this->_moduleSysName(), $this->request->post);

			//Это нужно чтобы при нажатии кнопки "сохранить и закрыть" был правильный статус
			$this->model_extension_shipping_neoseo_shippingplus->setModuleStatus($this->request->post[$this->_moduleSysName() . "_status"]);

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
		$this->language->load('extension/' . $this->_route . '/' . $this->_moduleSysName());

		$this->document->setTitle($this->language->get('heading_title_raw'));

		$this->load->model('extension/' . $this->_route . "/" . $this->_moduleSysName());
		$this->load->model('tool/' . $this->_moduleSysName());

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			if (empty($this->request->post['shipping_stores'])) {
				$this->request->post['shipping_stores'] = array();
			}

			$shipping_id = $this->{'model_tool_' . $this->_moduleSysName()}->addShipping($this->request->post);
			$this->session->data['success'] = $this->language->get('text_success');
			$url = '';
			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			if ($this->request->post['action'] == 'save') {
				$this->response->redirect($this->url->link('extension/' . $this->_route . '/' . $this->_moduleSysName() . '/edit', 'shipping_id=' . $shipping_id . '&user_token=' . $this->session->data['user_token'] . $url, true));
			} else {
				$this->response->redirect($this->url->link('extension/' . $this->_route . '/' . $this->_moduleSysName(), 'user_token=' . $this->session->data['user_token'] . $url . "#tab-methods", true));
			}
		}

		$this->getForm();
	}

	public function addZone()
	{
		$this->language->load('extension/' . $this->_route . '/' . $this->_moduleSysName());

		$this->document->setTitle($this->language->get('heading_title_raw'));

		$this->load->model('tool/' . $this->_moduleSysName());

		if (($this->request->server['REQUEST_METHOD'] == 'POST')) {

			$zone_id = $this->{'model_tool_' . $this->_moduleSysName()}->addZone($this->request->post);
			$this->session->data['success'] = $this->language->get('text_success');
			$url = '';
			if (isset($this->request->get['page_zone'])) {
				$url .= '&page_zone=' . $this->request->get['page_zone'];
			}

			if ($this->request->post['action'] == 'save_zone') {
				$this->response->redirect($this->url->link('extension/' . $this->_route.'/' . $this->_moduleSysName() . '/edit_zone', 'zone_id=' . $zone_id . '&user_token=' . $this->session->data['user_token'] . $url, 'SSL'));
			} else {
				$this->response->redirect($this->url->link('extension/' . $this->_route.'/' . $this->_moduleSysName(), 'user_token=' . $this->session->data['user_token'] . $url."#tab-zone", 'SSL'));
			}

		}

		$this->getZoneForm();
	}

	public function editZone()
	{
		$this->document->setTitle($this->language->get('heading_title_raw'));

		$this->load->model('tool/' .  $this->_moduleSysName());

		if (($this->request->server['REQUEST_METHOD'] == 'POST')) {

			$this->{'model_tool_' .	 $this->_moduleSysName()}->editZone($this->request->get['zone_id'], $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['page_zone'])) {
				$url .= '&page_zone=' . $this->request->get['page_zone'];
			}

			if ($this->request->post['action'] == 'save_zone') {
				$this->response->redirect($this->url->link('extension/' . $this->_route.'/' . $this->_moduleSysName() . '/editZone', 'shipping_id=' . $this->request->get['zone_id'] . '&user_token=' . $this->session->data['user_token'] . $url, 'SSL'));
			} else {
				$this->response->redirect($this->url->link('extension/' . $this->_route.'/' . $this->_moduleSysName(), 'user_token=' . $this->session->data['user_token'] . $url."#tab-zone", 'SSL'));
			}
		}

		$this->getZoneForm();
	}

	protected function getZoneForm()
	{

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
		$data = $this->initBreadcrumbs(array(
			array('extension/' . 'extension/' . $this->_route, "text_zone"),
			array($this->_route . '/' . $this->_moduleSysName(), "heading_title_raw", "#tab-zone")
		), $data);

		if (isset($this->request->get['zone_id'])) {
			$data['save_zone'] = $this->url->link('extension/' . $this->_route . '/' . $this->_moduleSysName() . '/editZone', 'zone_id=' . $this->request->get['zone_id'] . '&user_token=' . $this->session->data['user_token'], 'SSL');
			$data['save_and_close_zone'] = $this->url->link('extension/' . $this->_route . '/' . $this->_moduleSysName() . '/addZone', 'zone_id=' . $this->request->get['zone_id'] . '&user_token=' . $this->session->data['user_token'] . "&close=1"."#tab-zone", 'SSL');
		} else {
			$data['save_zone'] = $this->url->link('extension/' . $this->_route . '/' . $this->_moduleSysName() . '/addZone', 'user_token=' . $this->session->data['user_token'], 'SSL');
			$data['save_and_close_zone'] = $this->url->link('extension/' . $this->_route . '/' . $this->_moduleSysName() . '/addZone', 'user_token=' . $this->session->data['user_token'] . "&close=1"."#tab-zone", 'SSL');
		}

		$data['close'] = $this->url->link('extension/' . $this->_route . '/' . $this->_moduleSysName(), 'user_token=' . $this->session->data['user_token']."#tab-zone", 'SSL');

		$this->load->model('tool/' . $this->_moduleSysName());
		if (isset($this->request->get['zone_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$zone_info = $this->{'model_tool_' . $this->_moduleSysName()}->getZone($this->request->get['zone_id']);
		}

		$data['user_token'] = $this->session->data['user_token'];
		$data['ckeditor'] = $this->config->get('config_editor_default');

		if (isset($this->request->post['zone'])) {
			$data['zone'] = $this->request->post['zone'];
		} elseif (!empty($zone_info['zone'])) {
			$data['zone'] = $zone_info['zone'];
		} else {
			$data['zone'] = '';
		}

		if (isset($this->request->post['weight'])) {
			$data['weight'] = $this->request->post['weight'];
		} elseif (!empty($zone_info['weight'])) {
			$data['weight'] = $zone_info['weight'];
		} else {
			$data['weight'] = '';
		}

		if (isset($this->request->post['price'])) {
			$data['price'] = $this->request->post['price'];
		} elseif (!empty($zone_info['price'])) {
			$data['price'] = $zone_info['price'];
		} else {
			$data['price'] = '';
		}


		$data["user_token"] = $this->session->data['user_token'];
		$data['config_language_id'] = $this->config->get('config_language_id');
		$data['params'] = $data;

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/' . $this->_route . '/' . $this->_moduleSysName() . '_zone_form', $data));
	}

	public function deleteZone()
	{

		$this->language->load('extension/' . $this->_route . '/' . $this->_moduleSysName());

		$this->document->setTitle($this->language->get('heading_title_raw'));

		$this->load->model('tool/' . $this->_moduleSysName());

		if ((isset($this->request->post['selected']) or isset($this->request->get['zone_id']))) {
			if (isset($this->request->post['selected'])) {
				foreach($this->request->post['selected'] as $zone_id) {
					$this->{'model_tool_' . $this->_moduleSysName()}->deleteZone($zone_id);
				}
			} else {
				$this->{'model_tool_' . $this->_moduleSysName()}->deleteZone($this->request->get['zone_id']);
			}

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';


			if (isset($this->request->get['page_zone'])) {
				$url .= '&page_zone=' . $this->request->get['page_zone'];
			}

			$this->response->redirect($this->url->link('extension/' . $this->_route . '/' . $this->_moduleSysName(), 'user_token=' . $this->session->data['user_token'] . $url."#tab-zone", 'SSL'));
		}

		$this->getList();
	}

	public function copy()
	{
		$data = $this->language->load('extension/' . $this->_route . '/' . $this->_moduleSysName());

		$this->document->setTitle($this->language->get('heading_title_raw'));

		$this->load->model('extension/' . $this->_route . "/" . $this->_moduleSysName());
		$this->load->model('tool/' . $this->_moduleSysName());

		if (isset($this->request->post['selected']) && $this->validateCopy()) {
			foreach ($this->request->post['selected'] as $shipping_id) {
				$this->{'model_tool_' . $this->_moduleSysName()}->copyShipping($shipping_id);
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

		$data = $this->initParamsListEx($this->{"model_extension_" . $this->_route . "_" . $this->_moduleSysName()}->getParams(), $data);

		$url = '';
		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
			$url .= '&page=' . $this->request->get['page'];
		} else {
			$page = 1;
		}

		if (isset($this->request->get['page_zone'])) {
			$page_zone = $this->request->get['page_zone'];
			$url .= '&page_zone=' . $this->request->get['page_zone'];
		} else {
			$page_zone = 1;
		}

		$data = $this->initBreadcrumbs(array(
			array('marketplace/extension&type=' . $this->_moduleType, 'tab_module'),
			array('extension/' . $this->_route . '/' . $this->_moduleSysName() . '&type=' . $this->_moduleType, "heading_title_raw")
				), $data);

		$data = $this->initButtons($data, $this->_moduleType);

		$data['add'] = $this->url->link('extension/' . $this->_route . '/' . $this->_moduleSysName() . '/add', 'user_token=' . $this->session->data['user_token'] . $url, true);
		$data['delete'] = $this->url->link('extension/' . $this->_route . '/' . $this->_moduleSysName() . '/delete', 'user_token=' . $this->session->data['user_token'] . $url . "#tab-methods", true);
		$data['clone'] = $this->url->link('extension/' . $this->_route . '/' . $this->_moduleSysName() . '/copy', 'user_token=' . $this->session->data['user_token'] . $url . "#tab-methods", true);

		$data['shippings'] = array();

		$filter_data = array(
			'start' => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit' => $this->config->get('config_limit_admin')
		);

		$this->load->model('tool/' . $this->_moduleSysName());

		$shipping_total = $this->{'model_tool_' . $this->_moduleSysName()}->getTotalShippings();

		$results = $this->{'model_tool_' . $this->_moduleSysName()}->getShippings($filter_data);

		if ($results) {
			foreach ($results as $result) {
				$data['shippings'][] = array(
					'shipping_id' => $result['shipping_id'],
					'name' => $result['name'],
					'sort_order' => $result['sort_order'],
					'status' => $result['status'],
					'edit' => $this->url->link('extension/' . $this->_route . '/' . $this->_moduleSysName() . '/edit', 'user_token=' . $this->session->data['user_token'] . '&shipping_id=' . $result['shipping_id'] . $url . "#tab-methods", true),
					'delete' => $this->url->link('extension/' . $this->_route . '/' . $this->_moduleSysName() . '/delete', 'user_token=' . $this->session->data['user_token'] . '&shipping_id=' . $result['shipping_id'] . $url . "#tab-methods", true),
					'clone' => $this->url->link('extension/' . $this->_route . '/' . $this->_moduleSysName() . '/copy', 'user_token=' . $this->session->data['user_token'] . '&shipping_id=' . $result['shipping_id'] . $url . "#tab-methods", true)
				);
			}
		}

		//zones
		$data['add_zone'] = $this->url->link('extension/' . $this->_route . '/' . $this->_moduleSysName() . '/addZone', 'user_token=' . $this->session->data['user_token'] . $url."#tab-zone", 'SSL');
		$data['delete_zone'] = $this->url->link('extension/' . $this->_route . '/' . $this->_moduleSysName() . '/deleteZone', 'user_token=' . $this->session->data['user_token'] . $url."#tab-zone", 'SSL');
		$data['clone_zone'] = $this->url->link('extension/' . $this->_route . '/' . $this->_moduleSysName() . '/copyZone', 'user_token=' . $this->session->data['user_token'] . $url."#tab-zone", 'SSL');

		$data['zones'] = array();

		$this->load->model('tool/' . $this->_moduleSysName());

		$zone_total = $this->{'model_tool_' . $this->_moduleSysName()}->getTotalZones();

		$filter_data_zone = array(
			'start' => ($page_zone - 1) * $this->config->get('config_limit_admin'),
			'limit' => $this->config->get('config_limit_admin')
		);

		$zone_results = $this->{'model_tool_' . $this->_moduleSysName()}->getZones($filter_data_zone);
		if($zone_results){
			foreach($zone_results as $result) {
				$data['zones'][] = array(
					'zone_id' => $result['zone_id'],
					'zone' => $result['zone'],
					'weight' => $result['weight'],
					'price' => $result['price'],
					'edit_zone' => $this->url->link('extension/' . $this->_route . '/' . $this->_moduleSysName() . '/editZone', 'user_token=' . $this->session->data['user_token'] . '&zone_id=' . $result['zone_id'] . $url."#tab-zone", 'SSL'),
					'delete_zone' => $this->url->link('extension/' . $this->_route . '/' . $this->_moduleSysName() . '/deleteZone', 'user_token=' . $this->session->data['user_token'] . '&zone_id=' . $result['zone_id'] . $url."#tab-zone", 'SSL'),
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

		$pagination->total = $shipping_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_limit_admin');
		$pagination->url = $this->url->link('extension/' . $this->_route . '/' . $this->_moduleSysName(), 'user_token=' . $this->session->data['user_token'] . '&page={page}' . "#tab-methods", true);

		$data['pagination'] = $pagination->render();
		$pagination_zone = new Pagination();

		$pagination_zone->total = $zone_total;
		$pagination_zone->page = $page_zone;
		$pagination_zone->limit = $this->config->get('config_limit_admin');
		$pagination_zone->url = $this->url->link('extension/' . $this->_route . '/' . $this->_moduleSysName(), 'user_token=' . $this->session->data['user_token'] . '&page_zone={page}'."#tab-zone", 'SSL');

		$data['pagination_zone'] = $pagination_zone->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($shipping_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($shipping_total - $this->config->get('config_limit_admin'))) ? $shipping_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $shipping_total, ceil($shipping_total / $this->config->get('config_limit_admin')));
		$data['zone_results'] = sprintf($this->language->get('text_pagination'), ($zone_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page_zone - 1) * $this->config->get('config_limit_admin')) > ($zone_total - $this->config->get('config_limit_admin'))) ? $zone_total : ((($page_zone - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $zone_total, ceil($zone_total / $this->config->get('config_limit_admin')));
		
		$data['results'] = sprintf($this->language->get('text_pagination'), ($shipping_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($shipping_total - $this->config->get('config_limit_admin'))) ? $shipping_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $shipping_total, ceil($shipping_total / $this->config->get('config_limit_admin')));

		$data["user_token"] = $this->session->data['user_token'];
		$data['config_language_id'] = $this->config->get('config_language_id');
		$data['params'] = $data;

		$data['statuses'] = array(
			'0' => $this->language->get('text_disabled'),
			'1' => $this->language->get('text_enabled')
		);
		$data["logs"] = $this->getLogs();

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
		$this->language->load('extension/' . $this->_route . '/' . $this->_moduleSysName());

		$this->document->setTitle($this->language->get('heading_title_raw'));

		$this->load->model('extension/' . $this->_route . "/" . $this->_moduleSysName());
		$this->load->model('tool/' . $this->_moduleSysName());

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			if (empty($this->request->post['shipping_stores'])) {
				$this->request->post['shipping_stores'] = array();
			}

			$this->{'model_tool_' . $this->_moduleSysName()}->editShipping($this->request->get['shipping_id'], $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			if ($this->request->post['action'] == 'save') {
				$this->response->redirect($this->url->link('extension/' . $this->_route . '/' . $this->_moduleSysName() . '/edit', 'shipping_id=' . $this->request->get['shipping_id'] . '&user_token=' . $this->session->data['user_token'] . $url, true));
			} else {
				$this->response->redirect($this->url->link('extension/' . $this->_route . '/' . $this->_moduleSysName(), 'user_token=' . $this->session->data['user_token'] . $url . "#tab-methods", true));
			}
		}

		$this->getForm();
	}

	public function delete()
	{

		$this->language->load('extension/' . $this->_route . '/' . $this->_moduleSysName());

		$this->document->setTitle($this->language->get('heading_title_raw'));

		$this->load->model('tool/' . $this->_moduleSysName());

		if ((isset($this->request->post['selected']) or isset($this->request->get['shipping_id'])) && $this->validateDelete()) {
			if (isset($this->request->post['selected'])) {
				foreach ($this->request->post['selected'] as $shipping_id) {
					$this->{'model_tool_' . $this->_moduleSysName()}->deleteShipping($shipping_id);
				}
			} else {
				$this->{'model_tool_' . $this->_moduleSysName()}->deleteShipping($this->request->get['shipping_id']);
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
			array('marketplace/extension&type=' . $this->_moduleType, "text_shipping"),
			array('extension/' . $this->_route . '/' . $this->_moduleSysName() . '&type=' . $this->_moduleType, "heading_title_raw", "#tab-methods")
				), $data);

		if (isset($this->request->get['shipping_id'])) {
			$data['save'] = $this->url->link('extension/' . $this->_route . '/' . $this->_moduleSysName() . '/edit', 'shipping_id=' . $this->request->get['shipping_id'] . '&user_token=' . $this->session->data['user_token'], true);
			$data['save_and_close'] = $this->url->link('extension/' . $this->_route . '/' . $this->_moduleSysName() . '/add', 'shipping_id=' . $this->request->get['shipping_id'] . '&user_token=' . $this->session->data['user_token'] . "&close=1" . "#tab-methods", true);
		} else {
			$data['save'] = $this->url->link('extension/' . $this->_route . '/' . $this->_moduleSysName() . '/add', 'user_token=' . $this->session->data['user_token'], true);
			$data['save_and_close'] = $this->url->link($this->_route . '/' . $this->_moduleSysName() . '/add', 'user_token=' . $this->session->data['user_token'] . "&close=1" . "#tab-methods", true);
		}

		$data['close'] = $this->url->link('extension/' . $this->_route . '/' . $this->_moduleSysName(), 'user_token=' . $this->session->data['user_token'] . "#tab-methods", true);

		$this->load->model('tool/' . $this->_moduleSysName());
		if (isset($this->request->get['shipping_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$shipping_info = $this->{'model_tool_' . $this->_moduleSysName()}->getShipping($this->request->get['shipping_id']);
		}

		$data["user_token"] = $this->session->data['user_token'];
		$data['ckeditor'] = $this->config->get('config_editor_default');

		$this->load->model('localisation/language');

		$data['languages'] = $this->model_localisation_language->getLanguages();

		$data['lang'] = $this->language->get('lang');

		if (isset($this->request->post['shipping_description'])) {
			$data['shipping_description'] = $this->request->post['shipping_description'];
		} elseif (isset($this->request->get['shipping_id'])) {
			$data['shipping_description'] = $this->{'model_tool_' . $this->_moduleSysName()}->getShippingDescriptions($this->request->get['shipping_id']);
		} else {
			$data['shipping_description'] = array();
		}

		$this->load->model('localisation/geo_zone');
		$data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();

		foreach ($data['geo_zones'] as $geo_zone) {
			$geo_zones_list[$geo_zone['geo_zone_id']] = $geo_zone['name'];
		}
		$data['geo_zones_list'] = $geo_zones_list;

		if (isset($this->request->post['price_min'])) {
			$data['price_min'] = $this->request->post['price_min'];
		} elseif (!empty($shipping_info)) {
			$data['price_min'] = $shipping_info['price_min'];
		} else {
			$data['price_min'] = '';
		}

		if (isset($this->request->post['price_max'])) {
			$data['price_max'] = $this->request->post['price_max'];
		} elseif (!empty($shipping_info)) {
			$data['price_max'] = $shipping_info['price_max'];
		} else {
			$data['price_max'] = '';
		}

		if (isset($this->request->post['fix_payment'])) {
			$data['fix_payment'] = $this->request->post['fix_payment'];
		} elseif (!empty($shipping_info)) {
			$data['fix_payment'] = $shipping_info['fix_payment'];
		} else {
			$data['fix_payment'] = '';
		}

		if (isset($this->request->post['geo_zone_id']) && $this->request->post['geo_zone_id'] != 0) {
			$data['geo_zone_id'] = $this->request->post['geo_zone_id'];
		} elseif (!empty($shipping_info) && unserialize($shipping_info['geo_zones_id'])) {
			$data['geo_zone_id'] = unserialize($shipping_info['geo_zones_id']);
		} else {
			$data['geo_zone_id'] = array(0);
		}

		if (isset($this->request->post['cities'])) {
			$data['cities'] = $this->request->post['cities'];
		} elseif (!empty($shipping_info)) {
			$data['cities'] = $shipping_info['cities'];
		} else {
			$data['cities'] = '';
		}

		if (isset($this->request->post['sort_order'])) {
			$data['sort_order'] = $this->request->post['sort_order'];
		} elseif (!empty($shipping_info)) {
			$data['sort_order'] = $shipping_info['sort_order'];
		} else {
			$data['sort_order'] = 0;
		}

		if (isset($this->request->post['status'])) {
			$data['status'] = $this->request->post['status'];
		} elseif (!empty($shipping_info)) {
			$data['status'] = $shipping_info['status'];
		} else {
			$data['status'] = true;
		}

		if (isset($this->request->post['zone_status'])) {
			$data['zone_status'] = $this->request->post['zone_status'];
		} elseif (!empty($shipping_info)) {
			$data['zone_status'] = $shipping_info['zone_status'];
		} else {
			$data['zone_status'] = false;
		}

		if (isset($this->request->post['shipping_weight_price'])) {
			$data['shipping_weight_price'] = $this->request->post['shipping_weight_price'];
		} elseif (!empty($shipping_info)) {
			$data['shipping_weight_price'] = unserialize($shipping_info['weight_price']);
		} else {
			$data['shipping_weight_price'] = 0;
		}

		$this->load->model('extension/' . $this->_route . '/' . $this->_moduleSysName());
		$data['stores'] = $this->{'model_extension_' . $this->_route . '_' . $this->_moduleSysName()}->getStores();
		$data['entry_stores'] = $this->language->get('entry_stores');

		$payments = $this->{'model_tool_' . $this->_moduleSysName()}->getAllShippings();
		$data['shipping_stores'] = array();
		if (isset($this->request->get['shipping_id']) && isset($payments[$this->request->get['shipping_id']]) && !empty($payments[$this->request->get['shipping_id']]['stores'])) {
			$data['shipping_stores'] = json_decode($payments[$this->request->get['shipping_id']]['stores'], true);
		}

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

		foreach ($this->request->post['shipping_description'] as $language_id => $value) {
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
