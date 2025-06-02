<?php
class ControllerCatalogGaranty extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('catalog/garanty');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/garanty');

		$this->getList();
	}

	public function add() {
		$this->load->language('catalog/garanty');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/garanty');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_catalog_garanty->addGaranty($this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link('catalog/garanty', 'user_token=' . $this->session->data['user_token'] . $url, true));
		}

		$this->getForm();
	}

	public function edit() {
		$this->load->language('catalog/garanty');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/garanty');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {

			$this->model_catalog_garanty->editGaranty($this->request->get['garanty_id'], $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link('catalog/garanty', 'user_token=' . $this->session->data['user_token'] . $url, true));
		}

		$this->getForm();
	}

	public function delete() {
		$this->load->language('catalog/garanty');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/garanty');

		if (isset($this->request->post['selected']) && $this->validateDelete()) {
			foreach ($this->request->post['selected'] as $garanty_id) {
				$this->model_catalog_garanty->deleteGaranty($garanty_id);
			}

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link('catalog/garanty', 'user_token=' . $this->session->data['user_token'] . $url, true));
		}

		$this->getList();
	}

	protected function getList() {
		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'ad.name';
		}

		if (isset($this->request->get['order'])) {
			$order = $this->request->get['order'];
		} else {
			$order = 'ASC';
		}

		if (isset($this->request->get['page'])) {
			$page = (int)$this->request->get['page'];
		} else {
			$page = 1;
		}

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('catalog/garanty', 'user_token=' . $this->session->data['user_token'] . $url, true)
		);

		$data['add'] = $this->url->link('catalog/garanty/add', 'user_token=' . $this->session->data['user_token'] . $url, true);
		$data['delete'] = $this->url->link('catalog/garanty/delete', 'user_token=' . $this->session->data['user_token'] . $url, true);

		$data['garanties'] = array();

		$filter_data = array(
			'sort'  => $sort,
			'order' => $order,
			'start' => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit' => $this->config->get('config_limit_admin')
		);

		$garanty_total = $this->model_catalog_garanty->getTotalGaranties();

		$results = $this->model_catalog_garanty->getGaranties($filter_data);

		foreach ($results as $result) {
			$data['garanties'][] = array(
				'garanty_id'    => $result['garanty_id'],
				'name'            => $result['name'],
				'edit'            => $this->url->link('catalog/garanty/edit', 'user_token=' . $this->session->data['user_token'] . '&garanty_id=' . $result['garanty_id'] . $url, true)
			);
		}

		if (isset($this->error['warning'])) {
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
			$data['selected'] = (array)$this->request->post['selected'];
		} else {
			$data['selected'] = array();
		}

		$url = '';

		if ($order == 'ASC') {
			$url .= '&order=DESC';
		} else {
			$url .= '&order=ASC';
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['sort_name'] = $this->url->link('catalog/garanty', 'user_token=' . $this->session->data['user_token'] . '&sort=gd.name' . $url, true);

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

	    $data['column_name'] = $this->language->get('column_name');
	    $data['column_action'] = $this->language->get('column_action');

		$pagination = new Pagination();
		$pagination->total = $garanty_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_limit_admin');
		$pagination->url = $this->url->link('catalog/garanty', 'user_token=' . $this->session->data['user_token'] . $url . '&page={page}', true);

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($garanty_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($garanty_total - $this->config->get('config_limit_admin'))) ? $garanty_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $garanty_total, ceil($garanty_total / $this->config->get('config_limit_admin')));

		$data['sort'] = $sort;
		$data['order'] = $order;

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('catalog/garanty_list', $data));
	}

	protected function getForm() {
		$data['text_form'] = !isset($this->request->get['garanty_id']) ? $this->language->get('text_add') : $this->language->get('text_edit');

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->error['name'])) {
			$data['error_name'] = $this->error['name'];
		} else {
			$data['error_name'] = array();
		}

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('catalog/garanty', 'user_token=' . $this->session->data['user_token'] . $url, true)
		);

		if (!isset($this->request->get['garanty_id'])) {
			$data['action'] = $this->url->link('catalog/garanty/add', 'user_token=' . $this->session->data['user_token'] . $url, true);
		} else {
			$data['action'] = $this->url->link('catalog/garanty/edit', 'user_token=' . $this->session->data['user_token'] . '&garanty_id=' . $this->request->get['garanty_id'] . $url, true);
		}

		$data['cancel'] = $this->url->link('catalog/garanty', 'user_token=' . $this->session->data['user_token'] . $url, true);

		if (isset($this->request->get['garanty_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$garanty_info = $this->model_catalog_garanty->getGaranty($this->request->get['garanty_id']);
		}

		$this->load->model('localisation/language');

		$data['languages'] = $this->model_localisation_language->getLanguages();

		if (isset($this->request->post['garanty_description'])) {
			$data['garanty_description'] = $this->request->post['garanty_description'];
		} elseif (isset($this->request->get['garanty_id'])) {
			$data['garanty_description'] = $this->model_catalog_garanty->getGarantyDescriptions($this->request->get['garanty_id']);
		} else {
			$data['garanty_description'] = array();
		}

		if (isset($this->request->post['name'])) {
			$data['name'] = $this->request->post['name'];
		} elseif (!empty($garanty_info)) {
			$data['name'] = $garanty_info['name'];
		} else {
			$data['name'] = '';
		}

		if (isset($this->request->post['type'])) {
			$data['type'] = $this->request->post['type'];
		} elseif (!empty($garanty_info)) {
			$data['type'] = $garanty_info['type'];
		} else {
			$data['type'] = 'manufacturer';
		}

		if (isset($this->request->post['period'])) {
			$data['period'] = $this->request->post['period'];
		} elseif (!empty($garanty_info)) {
			$data['period'] = $garanty_info['period'];
		} else {
			$data['period'] = 0;
		}

		$data['entry_name'] = $this->language->get('entry_name');
		$data['entry_description'] = $this->language->get('entry_description');
		$data['entry_type'] = $this->language->get('entry_type');
		$data['entry_period'] = $this->language->get('entry_period');
		$data['text_manufacturer_garanty'] = $this->language->get('text_manufacturer_garanty');
		$data['text_shop_garanty'] = $this->language->get('text_shop_garanty');

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('catalog/garanty_form', $data));
	}

	protected function validateForm() {
		if (!$this->user->hasPermission('modify', 'catalog/garanty')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		foreach ($this->request->post['garanty_description'] as $language_id => $value) {
			if ((utf8_strlen($value['description']) < 1) || (utf8_strlen($value['description']) > 2048)) {
				$this->error['description'][$language_id] = $this->language->get('error_description');
			}
		}

		return !$this->error;
	}

	protected function validateDelete() {
		if (!$this->user->hasPermission('modify', 'catalog/garanty')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		$this->load->model('catalog/product');

		foreach ($this->request->post['selected'] as $garanty_id) {
			$product_total = $this->model_catalog_product->getTotalProductsByGarantyId($garanty_id);

			if ($product_total) {
				$this->error['warning'] = sprintf($this->language->get('error_product'), $product_total);
			}
		}

		return !$this->error;
	}
}
