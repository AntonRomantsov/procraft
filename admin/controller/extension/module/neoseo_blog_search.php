<?php

require_once(DIR_SYSTEM . '/engine/neoseo_controller.php');
require_once( DIR_SYSTEM . '/engine/neoseo_view.php' );

class ControllerExtensionModuleNeoSeoBlogSearch extends NeoSeoController
{

	private $error = array();

	public function __construct($registry)
	{
		parent::__construct($registry);
		$this->_moduleSysName = 'neoseo_blog';
				$this->_modulePostfix = "_search";
		$this->_logFile = $this->_moduleSysName . '.log';
		$this->debug = $this->config->get($this->_moduleSysName . '_status') == 1;
	}

	public function index()
	{
		$data = $this->load->language('extension/' . $this->_route . '/' . $this->_moduleSysName());

		$this->document->setTitle($this->language->get('heading_title_raw'));

		$this->load->model('setting/module');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			if (!isset($this->request->get['module_id'])) {
				$this->model_setting_module->addModule($this->_moduleSysName(), $this->request->post);
			} else {
				$this->model_setting_module->editModule($this->request->get['module_id'], $this->request->post);
			}

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'], true));
		}

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->error['name'])) {
			$data['error_name'] = $this->error['name'];
		} else {
			$data['error_name'] = '';
		}

		$data['breadcrumbs'] = array();

		$data = $this->initBreadcrumbs(array(
			array('marketplace/extension', 'text_module'),
			array('extension/' . $this->_route . '/' . $this->_moduleSysName(), "heading_title_raw")
				), $data);

		if (!isset($this->request->get['module_id'])) {
			$data['action'] = $this->url->link('extension/' . $this->_route . '/' . $this->_moduleSysName(), 'user_token=' . $this->session->data['user_token'], 'SSL');
		} else {
			$data['action'] = $this->url->link('extension/' . $this->_route . '/' . $this->_moduleSysName(), 'user_token=' . $this->session->data['user_token'] . '&module_id=' . $this->request->get['module_id'], 'SSL');
		}

		$data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'], 'SSL');

		if (isset($this->request->get['module_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$module_info = $this->model_setting_module->getModule($this->request->get['module_id']);
		}

		if (isset($this->request->post['name'])) {
			$data['name'] = $this->request->post['name'];
		} elseif (!empty($module_info) && isset($module_info['name'])) {
			$data['name'] = $module_info['name'];
		} else {
			$data['name'] = '';
		}

		$this->load->model('localisation/language');

		$data['languages'] = $this->model_localisation_language->getLanguages();

		foreach ($data['languages'] as $language) {
			if (isset($this->request->post['title'][$language['language_id']])) {
				$data['title'][$language['language_id']] = $this->request->post['title'][$language['language_id']];
			} elseif (!empty($module_info)) {
				$data['title'][$language['language_id']] = $module_info['title'][$language['language_id']];
			} else {
				$data['title'][$language['language_id']] = '';
			}
		}

		$this->load->model('blog/' . $this->_moduleSysName . '_category');
		$data['categories'] = $this->model_blog_neoseo_blog_category->getCategories(array('parent_id' => 0));

		if (isset($this->request->post['root_category_id'])) {
			$data['root_category_id'] = $this->request->post['root_category_id'];
		} elseif (!empty($module_info) && isset($module_info['root_category_id'])) {
			$data['root_category_id'] = $module_info['root_category_id'];
		} else {
			$data['root_category_id'] = 0;
		}

		$data['templates'] = array();
		if (file_exists(DIR_CATALOG . 'view/theme/' . $this->config->get('config_theme') . '/template/extension/' . $this->_route . '/' . $this->_moduleSysName() . '.twig')) {
			$files = glob(DIR_CATALOG . 'view/theme/' . $this->config->get('config_theme') . '/template/extension/' . $this->_route . '/' . $this->_moduleSysName() . '*');
		} else {
			$files = glob(DIR_CATALOG . 'view/theme/default/template/extension/' . $this->_route . '/' . $this->_moduleSysName() . '*');
		}
		if ($files) {
			foreach ($files as $file) {
				$template_file_name = str_replace(".twig", '', basename($file, '.twig'));
				$data['templates'][] = $template_file_name;
			}
		}

		if (isset($this->request->post['template'])) {
			$data['template'] = $this->request->post['template'];
		} elseif (!empty($module_info) && isset($module_info['template'])) {
			$data['template'] = $module_info['template'];
		} else {
			$data['template'] = '';
		}

		if (isset($this->request->post['status'])) {
			$data['status'] = $this->request->post['status'];
		} elseif (!empty($module_info) && isset($module_info['status'])) {
			$data['status'] = $module_info['status'];
		} else {
			$data['status'] = $this->config->get('status');
		}

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/' . $this->_route . '/' . $this->_moduleSysName(), $data));
	}

	protected function validate()
	{
		if (!$this->user->hasPermission('modify', 'extension/' . $this->_route . '/' . $this->_moduleSysName())) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		return !$this->error;
	}

}
