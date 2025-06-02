<?php
class ControllerAccountPassword extends Controller {
	private $error = array();

	public function index() {
		if (!$this->customer->isLogged()) {
			$this->session->data['redirect'] = $this->url->link('account/password', '', true);

			$this->response->redirect($this->url->link('account/login', '', true));
		}

		$this->load->language('account/password');

		$this->document->setTitle($this->language->get('heading_title'));

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->load->model('account/customer');

			$this->model_account_customer->editPassword($this->customer->getEmail(), $this->request->post['password']);

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('account/password', '', true));
		}

		$this->load->model('account/customer');

		$customer_info = $this->model_account_customer->getCustomer($this->customer->getId());

		$data['newsletter'] = $customer_info['newsletter'];

		$data['customer_email'] = $this->customer->getEmail();

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/home')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_account'),
			'href' => $this->url->link('account/account', '', true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('account/password', '', true)
		);

		if (isset($this->error['password'])) {
			$data['error_password'] = $this->error['password'];
		} else {
			$data['error_password'] = '';
		}

		if (isset($this->error['confirm'])) {
			$data['error_confirm'] = $this->error['confirm'];
		} else {
			$data['error_confirm'] = '';
		}

		$data['action'] = $this->url->link('account/password', '', true);

		if (isset($this->request->post['password'])) {
			$data['password'] = $this->request->post['password'];
		} else {
			$data['password'] = '';
		}

		if (isset($this->request->post['confirm'])) {
			$data['confirm'] = $this->request->post['confirm'];
		} else {
			$data['confirm'] = '';
		}

		$data['account'] = $this->load->controller('extension/module/account');

		$data['lang'] = $this->session->data['language'];

		$data['back'] = $this->url->link('account/account', '', true);

		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');
		$data['account_discount'] = $this->load->controller('extension/module/account_discount');
		$data['account_sidebar'] = $this->load->controller('extension/module/account');

		$this->response->setOutput($this->load->view('account/password', $data));
	}

	protected function validate() {
		if ((utf8_strlen(html_entity_decode($this->request->post['password'], ENT_QUOTES, 'UTF-8')) < 4) || (utf8_strlen(html_entity_decode($this->request->post['password'], ENT_QUOTES, 'UTF-8')) > 40)) {
			$this->error['password'] = $this->language->get('error_password');
		}

		if ($this->request->post['confirm'] != $this->request->post['password']) {
			$this->error['confirm'] = $this->language->get('error_confirm');
		}

		return !$this->error;
	}

	public function subscribe() {
		$this->load->language('extension/module/newsletter');
		$this->session->data['language'] = $this->request->post['language'];
		$json = array();
		if (!isset($json['error'])) {
			$this->load->model('extension/module/newsletter'); 
			if($this->model_extension_module_newsletter->checkRegistered($this->request->post)){
				$this->model_extension_module_newsletter->UpdateRegistered($this->request->post,1);
				//$json['success'] = $this->language->get('message_subscribed');
				if($this->request->post['lang'] == 'ru-ru'){
					$json['success'] = 'Вы подписались на рассылку';
				}else{
					$json['success'] = 'Ви підписалися на розсилку';
				}
			} 
		}
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
	public function unsubscribe() {
		$this->load->language('extension/module/newsletter');
		$json = array();
		if (!isset($json['error'])) {
			$this->load->model('extension/module/newsletter'); 
			if($this->model_extension_module_newsletter->checkRegistered($this->request->post)){
				$this->model_extension_module_newsletter->UpdateRegistered($this->request->post, 0);
				//$json['success'] = $this->language->get('message_unsubscribed');
				if($this->request->post['lang'] == 'ru-ru'){
					$json['success'] = 'Вы отписались от рассылки';
				}else{
					$json['success'] = 'Ви відписались від розсилки';
				}
			}
		}
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
}