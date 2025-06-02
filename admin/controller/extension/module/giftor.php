<?php
class ControllerExtensionModuleGiftor extends Controller {

	private $error = array();
	private $token_var;
	private $extension_var;
	private $prefix;

	public function __construct($registry) {
		parent::__construct($registry);
		$this->token_var = (version_compare(VERSION, '3.0', '>=')) ? 'user_token' : 'token';
		$this->extension_var = (version_compare(VERSION, '3.0', '>=')) ? 'marketplace' : 'extension';
		$this->prefix = (version_compare(VERSION, '3.0', '>=')) ? 'module_' : '';
	}

	public function install() {
		$this->load->model('extension/module/giftor');
		$this->model_extension_module_giftor->install();
	}

	public function uninstall() {
		$this->load->model('extension/module/giftor');
		$this->model_extension_module_giftor->uninstall();
	}

	public function index() {
		$data = $this->load->language('extension/module/giftor');

		$heading_title = $this->language->get('heading_title');
		$this->document->setTitle($heading_title);

		$this->document->addStyle('view/javascript/summernote/summernote.css');
		$this->document->addScript('view/javascript/summernote/summernote.js');
		$this->document->addScript('view/javascript/summernote/opencart.js');

		$this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			
			$this->model_setting_setting->editSetting($this->prefix . 'giftor', $this->request->post);
			$this->session->data['success'] = $this->language->get('text_success');

			if (isset($this->request->post['apply'])) {
				$this->response->redirect($this->url->link('extension/module/giftor', $this->token_var . '=' . $this->session->data[$this->token_var], true));
			} else {
				$this->response->redirect($this->url->link($this->extension_var . '/extension', $this->token_var . '=' . $this->session->data[$this->token_var] . '&type=module', true));
			}
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

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', $this->token_var . '=' . $this->session->data[$this->token_var], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_extension'),
			'href' => $this->url->link($this->extension_var . '/extension', $this->token_var . '=' . $this->session->data[$this->token_var] . '&type=module', true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $heading_title,
			'href' => $this->url->link('extension/module/giftor', $this->token_var . '=' . $this->session->data[$this->token_var], true)
		);

		$this->load->model('extension/module/giftor');

		$data['prefix'] = $this->prefix;
		$data['token_var'] = $this->token_var;
		$data[$this->token_var] = $this->session->data[$this->token_var];
		$data['action'] = $this->url->link('extension/module/giftor', $this->token_var . '=' . $this->session->data[$this->token_var], true);
		$data['cancel'] = $this->url->link($this->extension_var . '/extension', $this->token_var . '=' . $this->session->data[$this->token_var] . '&type=module', true);

		if (isset($this->request->post[$this->prefix . 'giftor_status'])) {
			$data[$this->prefix . 'giftor_status'] = $this->request->post[$this->prefix . 'giftor_status'];
		} else {
			$data[$this->prefix . 'giftor_status'] = $this->config->get($this->prefix . 'giftor_status');
		}

		if (isset($this->request->post[$this->prefix . 'giftor_quantity'])) {
			$data[$this->prefix . 'giftor_quantity'] = $this->request->post[$this->prefix . 'giftor_quantity'];
		} else {
			$data[$this->prefix . 'giftor_quantity'] = $this->config->get($this->prefix . 'giftor_quantity');
		}

		if (isset($this->request->post[$this->prefix . 'giftor_label'])) {
			$data[$this->prefix . 'giftor_label'] = $this->request->post[$this->prefix . 'giftor_label'];
		} else {
			$data[$this->prefix . 'giftor_label'] = $this->config->get($this->prefix . 'giftor_label');
		}

		if (isset($this->request->post[$this->prefix . 'giftor_position'])) {
			$data[$this->prefix . 'giftor_position'] = $this->request->post[$this->prefix . 'giftor_position'];
		} else {
			$data[$this->prefix . 'giftor_position'] = $this->config->get($this->prefix . 'giftor_position');
		}

		if (isset($this->request->post[$this->prefix . 'giftor_css'])) {
			$data[$this->prefix . 'giftor_css'] = $this->request->post[$this->prefix . 'giftor_css'];
		} else {
			$data[$this->prefix . 'giftor_css'] = $this->config->get($this->prefix . 'giftor_css');
		}

		if (isset($this->request->post[$this->prefix . 'giftor_width'])) {
			$data[$this->prefix . 'giftor_width'] = $this->request->post[$this->prefix . 'giftor_width'];
		} elseif ($this->config->get($this->prefix . 'giftor_width')) {
			$data[$this->prefix . 'giftor_width'] = $this->config->get($this->prefix . 'giftor_width');
		} else {
			$data[$this->prefix . 'giftor_width'] = 100;
		}

		if (isset($this->request->post[$this->prefix . 'giftor_height'])) {
			$data[$this->prefix . 'giftor_height'] = $this->request->post[$this->prefix . 'giftor_height'];
		} elseif ($this->config->get($this->prefix . 'giftor_height')) {
			$data[$this->prefix . 'giftor_height'] = $this->config->get($this->prefix . 'giftor_height');
		} else {
			$data[$this->prefix . 'giftor_height'] = 100;
		}

		if (isset($this->request->post[$this->prefix . 'giftor_description'])) {
			$data[$this->prefix . 'giftor_description'] = $this->request->post[$this->prefix . 'giftor_description'];
		} else {
			$data[$this->prefix . 'giftor_description'] = $this->config->get($this->prefix . 'giftor_description');
		}

		$this->load->model('localisation/language');
		$data['languages'] = $this->model_localisation_language->getLanguages();

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/module/giftor/giftor', $data));
	}

	public function add() {
		$this->load->language('extension/module/giftor');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('extension/module/giftor');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_extension_module_giftor->addGift($this->request->post);

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

			$this->response->redirect($this->url->link('extension/module/giftor/listing', 'user_token=' . $this->session->data['user_token'] . $url, true));
		}

		$this->getForm();
	}

	public function edit() {
		$this->load->language('extension/module/giftor');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('extension/module/giftor');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_extension_module_giftor->editGift($this->request->get['gift_id'], $this->request->post);

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

			$this->response->redirect($this->url->link('extension/module/giftor/listing', 'user_token=' . $this->session->data['user_token'] . $url, true));
		}

		$this->getForm();
	}

	public function delete() {
		$this->load->language('extension/module/giftor');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('extension/module/giftor');

		if (isset($this->request->post['selected'])&&$this->user->hasPermission('modify', 'extension/module/giftor')) {
			foreach ($this->request->post['selected'] as $gift_id) {
				$this->model_extension_module_giftor->deleteGift($gift_id);
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

			$this->response->redirect($this->url->link('extension/module/giftor/listing', 'user_token=' . $this->session->data['user_token'] . $url, true));
		}

		$this->getList();
	}

	public function listing() {
		$this->load->language('extension/module/giftor');
		$this->document->setTitle($this->language->get('heading_title'));
		$this->load->model('extension/module/giftor');
		$this->getList();
	}

	protected function getList() {
		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'gift_id';
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
			'text' => $this->language->get('text_extension'),
			'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('extension/module/giftor/listing', 'user_token=' . $this->session->data['user_token'] . $url, true)
		);

		$data['add'] = $this->url->link('extension/module/giftor/add', 'user_token=' . $this->session->data['user_token'] . $url, true);
		$data['delete'] = $this->url->link('extension/module/giftor/delete', 'user_token=' . $this->session->data['user_token'] . $url, true);

		$data['gifts'] = array();

		$filter_data = array(
			'sort'  => $sort,
			'order' => $order,
			'start' => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit' => $this->config->get('config_limit_admin')
		);

		$giftor_total = $this->model_extension_module_giftor->getTotalGifts($filter_data);

		$results = $this->model_extension_module_giftor->getGifts($filter_data);

		$this->load->model('catalog/product');

		foreach ($results as $result) {
			$gift_product_info = $this->model_catalog_product->getProduct($result['gift_product_id']);
			$data['gifts'][] = array(
				'gift_id'     => $result['gift_id'],
				'name'        => $gift_product_info['name'],
				'edit'        => $this->url->link('extension/module/giftor/edit', 'user_token=' . $this->session->data['user_token'] . '&gift_id=' . $result['gift_id'] . $url, true),
				'delete'      => $this->url->link('extension/module/giftor/delete', 'user_token=' . $this->session->data['user_token'] . '&gift_id=' . $result['gift_id'] . $url, true)
			);
		}

		$data['heading_title'] = $this->language->get('heading_title');

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

		if (isset($this->request->get['filter_name'])) {
			$url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_status'])) {
			$url .= '&filter_status=' . $this->request->get['filter_status'];
		}

		if ($order == 'ASC') {
			$url .= '&order=DESC';
		} else {
			$url .= '&order=ASC';
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['sort_name'] = $this->url->link('extension/module/giftor/listing', 'user_token=' . $this->session->data['user_token'] . '&sort=name' . $url, true);

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		$pagination = new Pagination();
		$pagination->total = $giftor_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_limit_admin');
		$pagination->url = $this->url->link('extension/module/giftor/listing', 'user_token=' . $this->session->data['user_token'] . $url . '&page={page}', true);

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($giftor_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($giftor_total - $this->config->get('config_limit_admin'))) ? $giftor_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $giftor_total, ceil($giftor_total / $this->config->get('config_limit_admin')));

		$data['sort'] = $sort;
		$data['order'] = $order;

		$data['user_token'] = $this->session->data['user_token'];

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/module/giftor/list', $data));
	}

	protected function getForm() {
		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->error['gift'])) {
			$data['error_gift'] = $this->error['gift'];
		} else {
			$data['error_gift'] = '';
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
			'text' => $this->language->get('text_extension'),
			'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('extension/module/giftor/listing', 'user_token=' . $this->session->data['user_token'] . $url, true)
		);

		if (!isset($this->request->get['gift_id'])) {
			$data['action'] = $this->url->link('extension/module/giftor/add', 'user_token=' . $this->session->data['user_token'] . $url, true);
		} else {
			$data['action'] = $this->url->link('extension/module/giftor/edit', 'user_token=' . $this->session->data['user_token'] . '&gift_id=' . $this->request->get['gift_id'] . $url, true);
		}

		$data['cancel'] = $this->url->link('extension/module/giftor/listing', 'user_token=' . $this->session->data['user_token'] . $url, true);

		if (isset($this->request->get['gift_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$gift_info = $this->model_extension_module_giftor->getGift($this->request->get['gift_id']);
		}

		$data['user_token'] = $this->session->data['user_token'];

		$this->load->model('localisation/language');
		$data['languages'] = $this->model_localisation_language->getLanguages();

		$data['heading_title'] = !isset($this->request->get['gift_id']) ? $this->language->get('text_add_gift') : $this->language->get('text_edit_gift');
		$data['text_form'] = !isset($this->request->get['gift_id']) ? $this->language->get('text_add_gift') : $this->language->get('text_edit_gift');

		$this->load->model('catalog/product');

		if (isset($this->request->post['status'])) {
			$data['status'] = $this->request->post['status'];
		} elseif (!empty($gift_info)) {
			$data['status'] = $gift_info['status'];
		} else {
			$data['status'] = true;
		}

		if (isset($this->request->post['product_id'])) {
			$data['product_id'] = $this->request->post['product_id'];
		} elseif (!empty($gift_info)) {
			$data['product_id'] = $gift_info['gift_product_id'];
		} else {
			$data['product_id'] = 0;
		}

		if (isset($this->request->post['product_gift'])) {
			$data['product_gift'] = $this->request->post['product_gift'];
		} elseif (!empty($gift_info)) {
			$gift_product_info = $this->model_catalog_product->getProduct($gift_info['gift_product_id']);
			$data['product_gift'] = $gift_product_info['name'];
		} else {
			$data['product_gift'] = '';
		}

		if (isset($this->request->post['customer_group'])) {
			$data['customer_group'] = $this->request->post['customer_group'];
		} elseif (!empty($gift_info)) {
			$data['customer_group'] = json_decode($gift_info['customer_group']);
		} else {
			$data['customer_group'] = array();
		}

		if (isset($this->request->post['based'])) {
			$data['based'] = $this->request->post['based'];
		} elseif (!empty($gift_info)) {
			$data['based'] = $gift_info['based'];
		} else {
			$data['based'] = 0;
		}

		if (isset($this->request->post['condition1'])) {
			$data['condition1'] = $this->request->post['condition1'];
		} elseif (!empty($gift_info)) {
			$data['condition1'] = $gift_info['condition'];
		} else {
			$data['condition1'] = 0;
		}

		if (isset($this->request->post['condition2'])) {
			$data['condition2'] = $this->request->post['condition2'];
		} elseif (!empty($gift_info)) {
			$data['condition2'] = $gift_info['condition'];
		} else {
			$data['condition2'] = 0;
		}

		if (isset($this->request->post['condition3'])) {
			$data['condition3'] = $this->request->post['condition3'];
		} elseif (!empty($gift_info)) {
			$data['condition3'] = $gift_info['condition'];
		} else {
			$data['condition3'] = 0;
		}

		if (isset($this->request->post['min_total'])) {
			$data['min_total'] = $this->request->post['min_total'];
		} elseif (!empty($gift_info)) {
			$data['min_total'] = $gift_info['min_total'];
		} else {
			$data['min_total'] = 0;
		}

		if (isset($this->request->post['max_total'])) {
			$data['max_total'] = $this->request->post['max_total'];
		} elseif (!empty($gift_info)) {
			$data['max_total'] = $gift_info['max_total'];
		} else {
			$data['max_total'] = 0;
		}

		if (isset($this->request->post['date_start'])) {
			$data['date_start'] = $this->request->post['date_start'];
		} elseif (!empty($gift_info)&&$gift_info['date_start']!='0000-00-00') {
			$data['date_start'] = $gift_info['date_start'];
		} else {
			$data['date_start'] = '';
		}

		if (isset($this->request->post['date_end'])) {
			$data['date_end'] = $this->request->post['date_end'];
		} elseif (!empty($gift_info)&&$gift_info['date_end']!='0000-00-00') {
			$data['date_end'] = $gift_info['date_end'];
		} else {
			$data['date_end'] = '';
		}

		$data['datepicker'] = $this->language->get('code');

		// Customer Groups
		$this->load->model('customer/customer_group');
		$data['customer_groups'] = $this->model_customer_customer_group->getCustomerGroups();

		$this->load->model('catalog/category');
		$this->load->model('catalog/manufacturer');

		// Products
		$data['products'] = array();

		if (isset($this->request->post['product'])) {
			$products = $this->request->post['product'];
		} elseif (isset($this->request->get['gift_id'])) {
			$products = $this->model_extension_module_giftor->getGiftProducts($this->request->get['gift_id']);
		} else {
			$products = array();
		}

		if ($products) {
			foreach ($products as $product_id) {
				$product_info = $this->model_catalog_product->getProduct($product_id);

				if ($product_info) {
					$data['products'][] = array(
						'product_id' => $product_info['product_id'],
						'name'       => $product_info['name']
					);
				}
			}
		}
		
		// Categories
		$data['categories'] = array();

		if (isset($this->request->post['category'])) {
			$categories = $this->request->post['category'];
		} elseif (isset($this->request->get['gift_id'])) {
			$categories = $this->model_extension_module_giftor->getGiftCategories($this->request->get['gift_id']);
		} else {
			$categories = array();
		}

		if ($categories) {
			foreach ($categories as $category_id) {
				$category_info = $this->model_catalog_category->getCategory($category_id);

				if ($category_info) {
					$data['categories'][] = array(
						'category_id'    => $category_info['category_id'],
						'name'           => ($category_info['path']) ? $category_info['path'] . ' &gt; ' . $category_info['name'] : $category_info['name']
					);
				}
			}
		}

		// Manufacturers
		$data['manufacturers'] = array();

		if (isset($this->request->post['manufacturer'])) {
			$manufacturers = $this->request->post['manufacturer'];
		} elseif (isset($this->request->get['gift_id'])) {
			$manufacturers = $this->model_extension_module_giftor->getGiftManufacturers($this->request->get['gift_id']);
		} else {
			$manufacturers = array();
		}

		if ($manufacturers) {
			foreach ($manufacturers as $manufacturer_id) {
				$manufacturer_info = $this->model_catalog_manufacturer->getManufacturer($manufacturer_id);

				if ($manufacturer_info) {
					$data['manufacturers'][] = array(
						'manufacturer_id'    => $manufacturer_info['manufacturer_id'],
						'name'               => $manufacturer_info['name']
					);
				}
			}
		}

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/module/giftor/form', $data));
	}

	protected function validate() {
		if (!$this->user->hasPermission('modify', 'extension/module/giftor')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if ($this->error && !isset($this->error['warning'])) {
			$this->error['warning'] = $this->language->get('error_warning');
		}

		return !$this->error;
	}

	protected function validateForm() {
		if (!$this->user->hasPermission('modify', 'extension/module/giftor')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if (empty($this->request->post['product_id'])) {
			$this->error['warning'] = $this->language->get('error_gift');
		}

		if (empty($this->request->post['customer_group'])) {
			$this->error['warning'] = $this->language->get('error_customer_group');
		}

		if ($this->error && !isset($this->error['warning'])) {
			$this->error['warning'] = $this->language->get('error_warning');
		}

		return !$this->error;
	}
}
