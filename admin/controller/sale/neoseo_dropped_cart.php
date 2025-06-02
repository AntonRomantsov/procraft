<?php

require_once(DIR_SYSTEM . "/engine/neoseo_controller.php");
require_once( DIR_SYSTEM . '/engine/neoseo_view.php' );

class ControllerSaleNeoSeoDroppedCart extends NeoseoController
{

	public function __construct($registry)
	{
		parent::__construct($registry);
		$this->_moduleSysName = 'neoseo_checkout';
		$this->_moduleName = "neoseo_dropped_cart";
		$this->_modulePostfix = "";
		$this->_logFile = $this->_moduleSysName() . ".log";
		$this->debug = $this->config->get($this->_moduleSysName() . '_debug');
	}

	public function index()
	{
		$data = $this->language->load($this->_route . '/' . $this->_moduleName);
		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model($this->_route . '/' . $this->_moduleName);

		if (isset($this->request->get['filter_email'])) {
			$filter_email = $this->request->get['filter_email'];
		} else {
			$filter_email = null;
		}

		if (isset($this->request->get['filter_name'])) {
			$filter_name = $this->request->get['filter_name'];
		} else {
			$filter_name = null;
		}

		if (isset($this->request->get['filter_modified'])) {
			$filter_modified = $this->request->get['filter_modified'];
		} else {
			$filter_modified = null;
		}

		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'name';
		}

		if (isset($this->request->get['order'])) {
			$order = $this->request->get['order'];
		} else {
			$order = 'ASC';
		}

		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		$url = '';

		if (isset($this->request->get['filter_email'])) {
			$url .= '&filter_email=' . $this->request->get['filter_email'];
		}

		if (isset($this->request->get['filter_name'])) {
			$url .= '&filter_name=' . $this->request->get['filter_name'];
		}

		if (isset($this->request->get['filter_modified'])) {
			$url .= '&filter_modified=' . $this->request->get['filter_modified'];
		}

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['delete_url'] = $this->url->link($this->_route . '/' . $this->_moduleName . '/delete', 'user_token=' . $this->session->data['user_token'] . $url, 'SSL');
		$data['notify_url'] = $this->url->link($this->_route . '/' . $this->_moduleName . '/notify', 'user_token=' . $this->session->data['user_token'] . '&redirect_url=' . urlencode($this->url->link($this->_route . '/' . $this->_moduleName, 'user_token=' . $this->session->data['user_token'] . $url, 'SSL')), 'SSL');

		$data = $this->initBreadcrumbs(array(
			array($this->_route . '/' . $this->_moduleName, "heading_title")
				), $data);

		$data['carts'] = array();

		$filter_data = array(
			'filter' => array(
				'name' => $filter_name,
				'email' => $filter_email,
				'modified' => $filter_modified
			),
			'sort' => $sort,
			'order' => $order,
			'start' => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit' => $this->config->get('config_limit_admin')
		);

		$carts_total = $this->{'model_' . $this->_route . '_' . $this->_moduleName}->getTotalCarts($filter_data);

		$data['carts'] = $this->{'model_' . $this->_route . '_' . $this->_moduleName}->getCarts($filter_data);

		foreach ($data['carts'] as $k => $v) {
			$data['carts'][$k]['notify'] = $this->url->link($this->_route . '/' . $this->_moduleName . '/notify', 'user_token=' . $this->session->data['user_token'] . '&dropped_cart_id=' . $v['dropped_cart_id'] . $url, 'SSL');
			$data['carts'][$k]['view'] = $this->url->link($this->_route . '/' . $this->_moduleName . '/view', 'user_token=' . $this->session->data['user_token'] . '&dropped_cart_id=' . $v['dropped_cart_id'] . $url, 'SSL');
			$data['carts'][$k]['delete'] = $this->url->link($this->_route . '/' . $this->_moduleName . '/delete', 'user_token=' . $this->session->data['user_token'] . '&dropped_cart_id=' . $v['dropped_cart_id'] . $url, 'SSL');
		}

		$data['user_token'] = $this->session->data['user_token'];

		if (isset($this->session->data['errors'])) {
			$data['error_warning'] = '';

			foreach ($this->session->data['errors'] as $error) {

				if ($data['error_warning']) {
					$data['error_warning'] += '<br>';
				}

				$data['error_warning'] += $error;
			}

			unset($this->session->data['errors']);
		} elseif (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
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

		$url = '';

		if (isset($this->request->get['filter_email'])) {
			$url .= '&filter_email=' . $this->request->get['filter_email'];
		}

		if (isset($this->request->get['filter_name'])) {
			$url .= '&filter_name=' . $this->request->get['filter_name'];
		}

		if (isset($this->request->get['filter_modified'])) {
			$url .= '&filter_modified=' . $this->request->get['filter_modified'];
		}

		if ($order == 'ASC') {
			$url .= '&order=DESC';
		} else {
			$url .= '&order=ASC';
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['sort_email'] = $this->url->link($this->_route . '/' . $this->_moduleName, 'user_token=' . $this->session->data['user_token'] . '&sort=email' . $url, 'SSL');
		$data['sort_name'] = $this->url->link($this->_route . '/' . $this->_moduleName, 'user_token=' . $this->session->data['user_token'] . '&sort=name' . $url, 'SSL');
		$data['sort_phone'] = $this->url->link($this->_route . '/' . $this->_moduleName, 'user_token=' . $this->session->data['user_token'] . '&sort=phone' . $url, 'SSL');
		$data['sort_notification_count'] = $this->url->link($this->_route . '/' . $this->_moduleName, 'user_token=' . $this->session->data['user_token'] . '&sort=notification_count' . $url, 'SSL');
		$data['sort_modified'] = $this->url->link($this->_route . '/' . $this->_moduleName, 'user_token=' . $this->session->data['user_token'] . '&sort=modified' . $url, 'SSL');
		$data['sort_total'] = $this->url->link($this->_route . '/' . $this->_moduleName, 'user_token=' . $this->session->data['user_token'] . '&sort=total' . $url, 'SSL');

		$url = '';

		if (isset($this->request->get['filter_email'])) {
			$url .= '&filter_email=' . $this->request->get['filter_email'];
		}

		if (isset($this->request->get['filter_name'])) {
			$url .= '&filter_name=' . $this->request->get['filter_name'];
		}

		if (isset($this->request->get['filter_modified'])) {
			$url .= '&filter_modified=' . $this->request->get['filter_modified'];
		}

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		$pagination = new Pagination();
		$pagination->total = $carts_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_limit_admin');
		$pagination->url = $this->url->link($this->_route . '/' . $this->_moduleName, 'user_token=' . $this->session->data['user_token'] . $url . '&page={page}', 'SSL');

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($carts_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($carts_total - $this->config->get('config_limit_admin'))) ? $carts_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $carts_total, ceil($carts_total / $this->config->get('config_limit_admin')));

		$data['filter_email'] = $filter_email;
		$data['filter_name'] = $filter_name;
		$data['filter_modified'] = $filter_modified;

		$data['sort'] = $sort;
		$data['order'] = $order;

		$data["logs"] = $this->getLogs();

		$widgets = new NeoSeoWidgets($this->_moduleSysName() . '_', $data);
		$widgets->text_select_all = $this->language->get('text_select_all');
		$widgets->text_unselect_all = $this->language->get('text_unselect_all');
		$data['widgets'] = $widgets;

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
		$this->response->setOutput($this->load->view($this->_route . '/' . $this->_moduleName . '_list', $data));
	}

	public function view()
	{
		$data = $this->language->load($this->_route . '/' . $this->_moduleName);
		
		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model($this->_route . '/' . $this->_moduleName);

		$data['cart'] = $this->{'model_' . $this->_route . '_' . $this->_moduleName}->getCart($this->request->get['dropped_cart_id']);

		$data['products'] = $this->{'model_' . $this->_route . '_' . $this->_moduleName}->getCartProducts($this->request->get['dropped_cart_id']);

		$data['total'] = 0;

		foreach ($data['products'] as $k => $v) {
			$data['products'][$k]['view'] = $this->url->link('catalog/product/edit', 'user_token=' . $this->session->data['user_token'] . '&product_id=' . $v['product_id'], 'SSL');
		}

		$data['button_send_notification_url'] = $this->url->link($this->_route . '/neoseo_dropped_cart/notify', 'user_token=' . $this->session->data['user_token'] . '&dropped_cart_id=' . $data['cart']['dropped_cart_id'], 'SSL');

		$data['user_token'] = $this->session->data['user_token'];

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else if (isset($this->session->data['error_warning'])) {
			$data['error_warning'] = $this->session->data['error_warning'];
			unset($this->session->data['error_warning']);
		} else {
			$data['error_warning'] = '';
		}

		$data = $this->initBreadcrumbs(array(
			array($this->_route . '/' . $this->_moduleName, 'heading_title'),
			array($this->_route . '/' . $this->_moduleName . '/view' . '&dropped_cart_id=' . $data['cart']['dropped_cart_id'], "heading_title_info")
				), $data);

		$data["logs"] = $this->getLogs();

		$widgets = new NeoSeoWidgets($this->_moduleSysName() . '_', $data);
		$widgets->text_select_all = $this->language->get('text_select_all');
		$widgets->text_unselect_all = $this->language->get('text_unselect_all');
		$data['widgets'] = $widgets;

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$data['return'] = $this->url->link($this->_route . '/' . $this->_moduleName, 'user_token=' . $this->session->data['user_token'], 'SSL');
		$this->response->setOutput($this->load->view($this->_route . '/' . $this->_moduleName . '_info', $data));
	}

	public function notify()
	{

		if (empty($this->request->get['dropped_cart_id']) && empty($this->request->post['selected'])) {
			return;
		}

		$this->language->load($this->_route . '/' . $this->_moduleName);
		$this->load->model($this->_route . '/' . $this->_moduleName);

		$errors = array();

		$cart_ids = array();

		if (isset($this->request->get['dropped_cart_id'])) {
			$cart_ids[] = $this->request->get['dropped_cart_id'];
		} else {
			$cart_ids = $this->request->post['selected'];
		}

		foreach ($cart_ids as $id) {
			$result = $this->{'model_' . $this->_route . '_' . $this->_moduleName}->notify($id);
			//$this->log(print_r($result,true));
			if ($result['status'] == 'error') {
				$errors[] = $result['message'];
			}
		}

		if (isset($this->request->get['redirect_url']) && $this->request->get['redirect_url']) {
			if ($errors) {
				$this->session->data['errors'] = $errors;
			}

			$url = str_replace('&amp;', '&', urldecode($this->request->get['redirect_url']));

			$this->response->redirect($url);
		}

		if ($errors) {
			$json = array(
				array(
					'result' => 'error',
					'messages' => $errors
				)
			);
		} else {
			$carts = array();

			$_carts = $this->{'model_' . $this->_route . '_' . $this->_moduleName}->getCarts(array('filter' => array('dropped_cart_id' => $cart_ids)));

			foreach ($_carts as $k => $v) {
				$carts[] = array(
					'id' => $v['dropped_cart_id'],
					'notified' => $v['notification_count'],
				);
			}

			$json = array(
				'result' => 'success',
				'message' => $this->language->get('email_send_successfully'),
				'carts' => $carts
			);
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	public function delete()
	{
		if (isset($this->request->get['dropped_cart_id'])) {
			$cid = $this->request->get['dropped_cart_id'];
		} elseif (isset($this->request->post['selected'])) {
			$cid = $this->request->post['selected'];
		} else {
			$cid = array();
		}

		if (!is_array($cid))
			$cid = array($cid);
		$this->db->query('DELETE FROM `' . DB_PREFIX . 'dropped_cart_product` WHERE `dropped_cart_id` IN (' . implode(',', $cid) . ')');
		$this->db->query('DELETE FROM `' . DB_PREFIX . 'dropped_cart` WHERE `dropped_cart_id` IN (' . implode(',', $cid) . ')');
		$this->response->redirect($this->url->link($this->_route . '/' . $this->_moduleName, 'user_token=' . $this->session->data['user_token'], 'SSL'));
	}

}
