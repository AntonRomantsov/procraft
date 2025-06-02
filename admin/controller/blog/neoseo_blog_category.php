<?php

require_once(DIR_SYSTEM . '/engine/neoseo_controller.php');

class ControllerBlogNeoSeoBlogCategory extends NeoSeoController
{

	private $error = array();

	public function __construct($registry)
	{
		parent::__construct($registry);
		$this->_moduleSysName = 'neoseo_blog';
				$this->_modulePostfix = "_category";
		$this->_logFile = $this->_moduleSysName . '.log';
		$this->debug = $this->config->get($this->_moduleSysName . '_status') == 1;
	}

	public function index()
	{
		$this->language->load($this->_route . '/' . $this->_moduleSysName());

		$this->document->setTitle($this->language->get('heading_title_raw'));

		$this->load->model($this->_route . '/' . $this->_moduleSysName());

		$this->getList();
	}

	public function insert()
	{
		$this->language->load($this->_route . '/' . $this->_moduleSysName());

		$this->document->setTitle($this->language->get('heading_title_raw'));

		$this->load->model($this->_route . '/' . $this->_moduleSysName());

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && ($this->validateForm())) {
			$this->{"model_" . $this->_route . "_" . $this->_moduleSysName()}->addCategory($this->request->post);

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

			$this->response->redirect($this->url->link($this->_route . '/' . $this->_moduleSysName(), 'user_token=' . $this->session->data['user_token'] . $url, 'SSL'));
		}

		$this->getForm();
	}

	public function update()
	{
		$this->language->load($this->_route . '/' . $this->_moduleSysName());

		$this->document->setTitle($this->language->get('heading_title_raw'));

		$this->load->model($this->_route . '/' . $this->_moduleSysName());

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->{"model_" . $this->_route . "_" . $this->_moduleSysName()}->editCategory($this->request->get['category_id'], $this->request->post);

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

			$this->response->redirect($this->url->link($this->_route . '/' . $this->_moduleSysName(), 'user_token=' . $this->session->data['user_token'] . $url, 'SSL'));
		}

		$this->getForm();
	}

	public function delete()
	{
		$this->language->load($this->_route . '/' . $this->_moduleSysName());

		$this->document->setTitle($this->language->get('heading_title_raw'));

		$this->load->model($this->_route . '/' . $this->_moduleSysName());

		if (isset($this->request->post['selected']) && $this->validateDelete()) {
			foreach ($this->request->post['selected'] as $category_id) {
				$this->{"model_" . $this->_route . "_" . $this->_moduleSysName()}->deleteCategory($category_id);
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

			$this->response->redirect($this->url->link($this->_route . '/' . $this->_moduleSysName(), 'user_token=' . $this->session->data['user_token'] . $url, 'SSL'));
		}

		$this->getList();
	}

	public function copy()
	{
		$this->language->load($this->_route . '/' . $this->_moduleSysName());

		$this->document->setTitle($this->language->get('heading_title_raw'));

		$this->load->model($this->_route . '/' . $this->_moduleSysName());

		if (isset($this->request->post['selected']) && $this->validateCopy()) {
			foreach ($this->request->post['selected'] as $product_id) {
				$this->{"model_" . $this->_route . "_" . $this->_moduleSysName()}->copyCategory($product_id);
			}

			$this->session->data['success'] = $this->language->get('text_success');
		}

		$url = '';

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		$this->response->redirect($this->url->link($this->_route . '/' . $this->_moduleSysName(), 'user_token=' . $this->session->data['user_token'] . $url, 'SSL'));
	}

	public function getList()
	{

		$data = $this->language->load($this->_route . '/' . $this->_moduleSysName());

		if (isset($this->request->get['filter_name'])) {
			$filter_name = $this->request->get['filter_name'];
		} else {
			$filter_name = null;
		}

		if (isset($this->request->get['filter_status'])) {
			$filter_status = $this->request->get['filter_status'];
		} else {
			$filter_status = null;
		}

		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'bcd.name';
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

		if (isset($this->request->post['selected'])) {
			$data['selected'] = (array) $this->request->post['selected'];
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

		$data = $this->initBreadcrumbs(array(
			array($this->_route . '/' . $this->_moduleSysName(), "heading_title_raw")
				), $data);

		$data['insert'] = $this->url->link($this->_route . '/' . $this->_moduleSysName() . '/insert', 'user_token=' . $this->session->data['user_token'] . $url, 'SSL');
		$data['repair'] = $this->url->link($this->_route . '/' . $this->_moduleSysName() . '/repair', 'user_token=' . $this->session->data['user_token'] . $url, 'SSL');
		$data['copy'] = $this->url->link($this->_route . '/' . $this->_moduleSysName() . '/copy', 'user_token=' . $this->session->data['user_token'] . $url, 'SSL');
		$data['delete'] = $this->url->link($this->_route . '/' . $this->_moduleSysName() . '/delete', 'user_token=' . $this->session->data['user_token'] . $url, 'SSL');

		$data['categories'] = array();

		$filter_data = array(
			'filter_name' => $filter_name,
			'filter_status' => $filter_status,
			'sort' => $sort,
			'order' => $order,
			'start' => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit' => $this->config->get('config_limit_admin')
		);

		$category_total = $this->{"model_" . $this->_route . "_" . $this->_moduleSysName()}->getTotalCategories($filter_data);

		$results = $this->{"model_" . $this->_route . "_" . $this->_moduleSysName()}->getCategories($filter_data);
		foreach ($results as $result) {
			$data['categories'][] = array(
				'category_id' => $result['category_id'],
				'name' => $result['name'],
				'sort_order' => $result['sort_order'],
				'status' => ($result['status'] ? $this->language->get('text_enabled') : $this->language->get('text_disabled')),
				'selected' => isset($this->request->post['selected']) && in_array($result['category_id'], $this->request->post['selected']),
				'edit' => $this->url->link($this->_route . '/' . $this->_moduleSysName() . '/update', 'user_token=' . $this->session->data['user_token'] . '&category_id=' . $result['category_id'] . $url, 'SSL')
			);
		}

		$data['user_token'] = $this->session->data['user_token'];

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

		$data['sort_name'] = $this->url->link($this->_route . '/' . $this->_moduleSysName(), 'user_token=' . $this->session->data['user_token'] . '&sort=bcd.name' . $url, 'SSL');
		$data['sort_status'] = $this->url->link($this->_route . '/' . $this->_moduleSysName(), 'user_token=' . $this->session->data['user_token'] . '&sort=bc.status' . $url, 'SSL');
		$data['sort_sortorder'] = $this->url->link($this->_route . '/' . $this->_moduleSysName(), 'user_token=' . $this->session->data['user_token'] . '&sort=bc.sort_order' . $url, 'SSL');

		$url = '';

		if (isset($this->request->get['filter_name'])) {
			$url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_status'])) {
			$url .= '&filter_status=' . $this->request->get['filter_status'];
		}

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		$pagination = new Pagination();
		$pagination->total = $category_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_limit_admin');
		$pagination->text = $this->language->get('text_pagination');
		$pagination->url = $this->url->link($this->_route . '/' . $this->_moduleSysName(), 'user_token=' . $this->session->data['user_token'] . $url . '&page={page}', 'SSL');

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($category_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($category_total - $this->config->get('config_limit_admin'))) ? $category_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $category_total, ceil($category_total / $this->config->get('config_limit_admin')));

		$data['filter_name'] = $filter_name;
		$data['filter_status'] = $filter_status;

		$data['sort'] = $sort;
		$data['order'] = $order;

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view($this->_route . '/' . $this->_moduleSysName() . '_list', $data));
	}

	public function repair()
	{
		$this->language->load($this->_route . '/' . $this->_moduleSysName());

		$this->document->setTitle($this->language->get('heading_title_raw'));

		$this->load->model($this->_route . '/' . $this->_moduleSysName());

		if ($this->validateRepair()) {
			$this->{"model_" . $this->_route . "_" . $this->_moduleSysName()}->repairCategories();

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link($this->_route . '/' . $this->_moduleSysName(), 'user_token=' . $this->session->data['user_token'], 'SSL'));
		}

		$this->getList();
	}

	public function getForm()
	{

		$data = $this->language->load($this->_route . '/' . $this->_moduleSysName());

		$data['text_form'] = isset($this->request->get['category_id']) ? $this->language->get('text_edit') : $this->language->get('text_add');

		$data['user_token'] = $this->session->data['user_token'];

		//CKEditor
		if ($this->config->get('config_editor_default')) {
			$this->document->addScript('view/javascript/ckeditor/ckeditor.js');
			$this->document->addScript('view/javascript/ckeditor/ckeditor_init.js');
		} else {
			$this->document->addScript('view/javascript/summernote/summernote.js');
			$this->document->addScript('view/javascript/summernote/lang/summernote-' . $this->config->get('config_admin_language') . '.js');
			$this->document->addScript('view/javascript/summernote/opencart.js');
			$this->document->addStyle('view/javascript/summernote/summernote.css');
		}

		if (isset($this->request->get['category_id'])) {
			$data['category_id'] = $this->request->get['category_id'];
		} else {
			$data['category_id'] = 0;
		}

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

		if (isset($this->error['seo_url'])) {
			$data['error_seo_url'] = $this->error['seo_url'];
		} else {
			$data['error_seo_url'] = '';
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

		$data = $this->initBreadcrumbs(array(
			array($this->_route . '/' . $this->_moduleSysName(), "heading_title_raw")
				), $data);

		if (!$data['category_id']) {
			$data['action'] = $this->url->link($this->_route . '/' . $this->_moduleSysName() . '/insert', 'user_token=' . $this->session->data['user_token'] . $url, 'SSL');
		} else {
			$data['action'] = $this->url->link($this->_route . '/' . $this->_moduleSysName() . '/update', 'user_token=' . $this->session->data['user_token'] . '&category_id=' . $data['category_id'] . $url, 'SSL');
		}

		$data['cancel'] = $this->url->link($this->_route . '/' . $this->_moduleSysName(), 'user_token=' . $this->session->data['user_token'] . $url, 'SSL');

		if ($data['category_id'] && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$category_info = $this->{"model_" . $this->_route . "_" . $this->_moduleSysName()}->getCategory($data['category_id']);
		}

		$this->load->model('localisation/language');

		$data['languages'] = $this->model_localisation_language->getLanguages();

		if (isset($this->request->post['category_description'])) {
			$data['category_description'] = $this->request->post['category_description'];
		} elseif ($data['category_id']) {
			$data['category_description'] = $this->{"model_" . $this->_route . "_" . $this->_moduleSysName()}->getCategoryDescriptions($data['category_id']);
		} else {
			$data['category_description'] = array();
		}

		$categories = $this->{"model_" . $this->_route . "_" . $this->_moduleSysName()}->getCategories(array('parent_id' => 0));

		// Remove own id from list
		if (!empty($category_info)) {
			foreach ($categories as $key => $category) {
				if ($category['category_id'] == $category_info['category_id']) {
					unset($categories[$key]);
				}
			}
		}

		$data['categories'] = $categories;

		if (isset($this->request->post['parent_id'])) {
			$data['parent_id'] = $this->request->post['parent_id'];
		} elseif (!empty($category_info)) {
			$data['parent_id'] = $category_info['parent_id'];
		} else {
			$data['parent_id'] = 0;
		}

		$this->load->model('setting/store');

		$data['stores'] = $this->model_setting_store->getStores();

		if (isset($this->request->post['category_store'])) {
			$data['category_store'] = $this->request->post['category_store'];
		} elseif ($data['category_id']) {
			$data['category_store'] = $this->{"model_" . $this->_route . "_" . $this->_moduleSysName()}->getCategoryStores($data['category_id']);
		} else {
			$data['category_store'] = array(0);
		}



		if (isset($this->request->get['category_id'])) {
			$blog_category_seo_url = $this->{"model_" . $this->_route . "_" . $this->_moduleSysName()}->getCategorySeoUrls($this->request->get['category_id']);
		}
		foreach ($data['languages'] as $language) {
			if (isset($this->request->post['seo_url'][$language['language_id']])) {
				$data['seo_url'][$language['language_id']] = $this->request->post['seo_url'][$language['language_id']];
			} elseif (!empty($blog_category_seo_url)) {
				$data['seo_url'][$language['language_id']] = $blog_category_seo_url[$language['language_id']];
			} else {
				$data['seo_url'][$language['language_id']] = '';
			}
		}

		if (isset($this->request->post['image'])) {
			$data['image'] = $this->request->post['image'];
		} elseif (!empty($category_info['image'])) {
			$data['image'] = $category_info['image'];
		} else {
			$data['image'] = '';
		}

		$this->load->model('tool/image');

		if ($data['image'] && file_exists(DIR_IMAGE . $data['image'])) {
			$data['thumb'] = $this->model_tool_image->resize($data['image'], 100, 100);
		} else {
			$data['thumb'] = $this->model_tool_image->resize('no_image.png', 100, 100);
		}

		$data['no_image'] = $this->model_tool_image->resize('no_image.png', 100, 100);

		if (isset($this->request->post['sort_order'])) {
			$data['sort_order'] = $this->request->post['sort_order'];
		} elseif (!empty($category_info['sort_order'])) {
			$data['sort_order'] = $category_info['sort_order'];
		} else {
			$data['sort_order'] = 0;
		}

		if (isset($this->request->post['status'])) {
			$data['status'] = $this->request->post['status'];
		} elseif (!empty($category_info['status'])) {
			$data['status'] = $category_info['status'];
		} else {
			$data['status'] = 1;
		}

		if (isset($this->request->post['category_layout'])) {
			$data['category_layout'] = $this->request->post['category_layout'];
		} elseif ($data['category_id']) {
			$data['category_layout'] = $this->{"model_" . $this->_route . "_" . $this->_moduleSysName()}->getCategoryLayouts($data['category_id']);
		} else {
			$data['category_layout'] = array();
		}

		$this->load->model('design/layout');

		$data['layouts'] = $this->model_design_layout->getLayouts();
		$data['href_shop'] = HTTP_CATALOG;
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view($this->_route . '/' . $this->_moduleSysName() . '_form', $data));
	}

	private function validateForm()
	{
		if (!$this->user->hasPermission('modify', $this->_route . '/' . $this->_moduleSysName())) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		foreach ($this->request->post['category_description'] as $language_id => $value) {
			if ((utf8_strlen($value['name']) < 2) || (utf8_strlen($value['name']) > 255)) {
				$this->error['name'][$language_id] = $this->language->get('error_name');
			}
		}

		if ($this->request->post['seo_url']) {
			$post_seo_url = $this->request->post['seo_url'];

			$this->load->model('design/seo_url');
			$this->load->model('localisation/language');

			$languages = $this->model_localisation_language->getLanguages();
			foreach ($languages as $language) {
				$seo_urls = $this->model_design_seo_url->getSeoUrlsByKeyword($post_seo_url[$language['language_id']]);

				foreach ($seo_urls as $seo_url) {
					if (isset($this->request->get['category_id']) && $seo_url['query'] != 'blog_category_id=' . $this->request->get['category_id']) {
						$this->error['seo_url'][$language['language_id']] = sprintf($this->language->get('error_seo_url'));
					}
				}

				foreach ($seo_urls as $seo_url) {
					if ($seo_url && !isset($this->request->get['category_id'])) {
						$this->error['seo_url'][$language['language_id']] = sprintf($this->language->get('error_seo_url'));
					}
				}
			}
		}

		if ($this->error && !isset($this->error['warning'])) {
			$this->error['warning'] = $this->language->get('error_warning');
		}

		return !$this->error;
	}

	protected function validateRepair()
	{
		if (!$this->user->hasPermission('modify', $this->_route . '/' . $this->_moduleSysName())) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		return !$this->error;
	}

	protected function validateCopy()
	{
		if (!$this->user->hasPermission('modify', $this->_route . '/' . $this->_moduleSysName())) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		return !$this->error;
	}

	private function validateDelete()
	{
		if (!$this->user->hasPermission('modify', $this->_route . '/' . $this->_moduleSysName())) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		$this->load->model($this->_route . '/' . $this->_moduleSysName());

		foreach ($this->request->post['selected'] as $blog_category_id) {
			$article_total = $this->{"model_" . $this->_route . "_" . $this->_moduleSysName()}->getTotalArticleCategoryWise($blog_category_id);

			if ($article_total) {
				$this->error['warning'] = sprintf($this->language->get('error_article'), $article_total);
				break;
			}
		}

		return !$this->error;
	}

}
