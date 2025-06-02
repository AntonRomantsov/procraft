<?php

require_once(DIR_SYSTEM . '/engine/neoseo_controller.php');

class ControllerBlogNeoSeoBlogAuthor extends NeoSeoController
{

	private $error = array();

	public function __construct($registry)
	{
		parent::__construct($registry);
		$this->_moduleSysName = 'neoseo_blog';
				$this->_modulePostfix = "_author";
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

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->{"model_" . $this->_route . "_" . $this->_moduleSysName()}->addAuthor($this->request->post);

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
			$this->{"model_" . $this->_route . "_" . $this->_moduleSysName()}->editAuthor($this->request->get['author_id'], $this->request->post);

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
			foreach ($this->request->post['selected'] as $author_id) {
				$this->{"model_" . $this->_route . "_" . $this->_moduleSysName()}->deleteAuthor($author_id);
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

		if (isset($this->request->get['filter_date_added'])) {
			$filter_date_added = $this->request->get['filter_date_added'];
		} else {
			$filter_date_added = null;
		}

		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'ba.name';
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

		if (isset($this->request->get['filter_date_added'])) {
			$url .= '&filter_date_added=' . $this->request->get['filter_date_added'];
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
		$data['delete'] = $this->url->link($this->_route . '/' . $this->_moduleSysName() . '/delete', 'user_token=' . $this->session->data['user_token'] . $url, 'SSL');

		$data['authors'] = array();

		$filter_data = array(
			'filter_name' => $filter_name,
			'filter_date_added' => $filter_date_added,
			'filter_status' => $filter_status,
			'sort' => $sort,
			'order' => $order,
			'start' => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit' => $this->config->get('config_limit_admin')
		);

		$author_total = $this->{"model_" . $this->_route . "_" . $this->_moduleSysName()}->getTotalAuthors($filter_data);

		$results = $this->{"model_" . $this->_route . "_" . $this->_moduleSysName()}->getAuthors($filter_data);

		foreach ($results as $result) {

			$data['authors'][] = array(
				'author_id' => $result['author_id'],
				'name' => $result['name'],
				'status' => ($result['status'] ? $this->language->get('text_enabled') : $this->language->get('text_disabled')),
				'date_added' => date($this->language->get('date_format_short'), strtotime($result['date_added'])),
				'selected' => isset($this->request->post['selected']) && in_array($result['author_id'], $this->request->post['selected']),
				'edit' => $this->url->link($this->_route . '/' . $this->_moduleSysName() . '/update', 'user_token=' . $this->session->data['user_token'] . '&author_id=' . $result['author_id'] . $url, 'SSL')
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

		if (isset($this->request->get['filter_date_added'])) {
			$url .= '&filter_date_added=' . $this->request->get['filter_date_added'];
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

		$data['sort_name'] = $this->url->link($this->_route . '/' . $this->_moduleSysName(), 'user_token=' . $this->session->data['user_token'] . '&sort=ba.name' . $url, 'SSL');
		$data['sort_status'] = $this->url->link($this->_route . '/' . $this->_moduleSysName(), 'user_token=' . $this->session->data['user_token'] . '&sort=ba.status' . $url, 'SSL');
		$data['sort_date_added'] = $this->url->link($this->_route . '/' . $this->_moduleSysName(), 'user_token=' . $this->session->data['user_token'] . '&sort=ba.date_added' . $url, 'SSL');

		$url = '';

		if (isset($this->request->get['filter_name'])) {
			$url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_date_added'])) {
			$url .= '&filter_date_added=' . $this->request->get['filter_date_added'];
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
		$pagination->total = $author_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_limit_admin');
		$pagination->text = $this->language->get('text_pagination');
		$pagination->url = $this->url->link($this->_route . '/' . $this->_moduleSysName(), 'user_token=' . $this->session->data['user_token'] . $url . '&page={page}', 'SSL');

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($author_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($author_total - $this->config->get('config_limit_admin'))) ? $author_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $author_total, ceil($author_total / $this->config->get('config_limit_admin')));

		$data['filter_name'] = $filter_name;
		$data['filter_date_added'] = $filter_date_added;
		$data['filter_status'] = $filter_status;

		$data['sort'] = $sort;
		$data['order'] = $order;

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view($this->_route . '/' . $this->_moduleSysName() . '_list', $data));
	}

	public function getForm()
	{

		$data = $this->language->load($this->_route . '/' . $this->_moduleSysName());

		$data['text_form'] = isset($this->request->get['author_id']) ? $this->language->get('text_edit') : $this->language->get('text_add');

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

		$data['ckeditor'] = $this->config->get('config_editor_default');

		if (isset($this->request->get['author_id'])) {
			$data['author_id'] = $this->request->get['author_id'];
		} else {
			$data['author_id'] = 0;
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

		if (!isset($this->request->get['author_id'])) {
			$data['action'] = $this->url->link($this->_route . '/' . $this->_moduleSysName() . '/insert', 'user_token=' . $this->session->data['user_token'] . $url, 'SSL');
		} else {
			$data['action'] = $this->url->link($this->_route . '/' . $this->_moduleSysName() . '/update', 'user_token=' . $this->session->data['user_token'] . '&author_id=' . $this->request->get['author_id'] . $url, 'SSL');
		}

		$data['cancel'] = $this->url->link($this->_route . '/' . $this->_moduleSysName(), 'user_token=' . $this->session->data['user_token'] . $url, 'SSL');

		if (isset($this->request->get['author_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$author_info = $this->{"model_" . $this->_route . "_" . $this->_moduleSysName()}->getAuthor($this->request->get['author_id']);
		}

		$this->load->model('localisation/language');

		$data['languages'] = $this->model_localisation_language->getLanguages();

		if (isset($this->request->post['author_description'])) {
			$data['author_description'] = $this->request->post['author_description'];
		} elseif (isset($this->request->get['author_id'])) {
			$data['author_description'] = $this->{"model_" . $this->_route . "_" . $this->_moduleSysName()}->getAuthorDescriptions($this->request->get['author_id']);
		} else {
			$data['author_description'] = array();
		}

		if (isset($this->request->post['name'])) {
			$data['name'] = $this->request->post['name'];
		} elseif (!empty($author_info)) {
			$data['name'] = $author_info['name'];
		} else {
			$data['name'] = '';
		}

		if (isset($this->request->get['author_id'])) {
			$author_seo_url = $this->{"model_" . $this->_route . "_" . $this->_moduleSysName()}->getAuthorSeoUrls($this->request->get['author_id']);
		}
		foreach ($data['languages'] as $language) {
			if (isset($this->request->post['seo_url'][$language['language_id']])) {
				$data['seo_url'][$language['language_id']] = $this->request->post['seo_url'][$language['language_id']];
			} elseif (!empty($author_seo_url[$language['language_id']])) {
				$data['seo_url'][$language['language_id']] = $author_seo_url[$language['language_id']];
			} else {
				$data['seo_url'][$language['language_id']] = '';
			}
		}


		if (isset($this->request->post['image'])) {
			$data['image'] = $this->request->post['image'];
		} elseif (!empty($author_info)) {
			$data['image'] = $author_info['image'];
		} else {
			$data['image'] = '';
		}

		$this->load->model('tool/image');

		if (isset($this->request->post['image']) && is_file(DIR_IMAGE . $this->request->post['image'])) {
			$data['thumb'] = $this->model_tool_image->resize($this->request->post['image'], 100, 100);
		} elseif (!empty($author_info) && $author_info['image'] && is_file(DIR_IMAGE . $author_info['image'])) {
			$data['thumb'] = $this->model_tool_image->resize($author_info['image'], 100, 100);
		} else {
			$data['thumb'] = $this->model_tool_image->resize('no_image.png', 100, 100);
		}

		$data['no_image'] = $this->model_tool_image->resize('no_image.png', 100, 100);

		if (isset($this->request->post['status'])) {
			$data['status'] = $this->request->post['status'];
		} elseif (!empty($author_info)) {
			$data['status'] = $author_info['status'];
		} else {
			$data['status'] = 0;
		}

		$data['href_shop'] = HTTP_CATALOG;
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view($this->_route . '/' . $this->_moduleSysName() . '_form', $data));
	}

	protected function validateForm()
	{
		if (!$this->user->hasPermission('modify', $this->_route . '/' . $this->_moduleSysName())) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if ((utf8_strlen($this->request->post['name']) < 3) || (utf8_strlen($this->request->post['name']) > 255)) {
			$this->error['name'] = $this->language->get('error_name');
		} else {
			// check here whether duplicate name occur or not?
			if (!isset($this->request->get['author_id'])) {
				$found = $this->{"model_" . $this->_route . "_" . $this->_moduleSysName()}->checkAuthorName($this->request->post['name'], 0);

				if ($found) {
					$this->error['warning'] = $this->language->get('error_author_found');
					$this->error['name'] = $this->language->get('error_author_found');
				}
			} else {
				$found = $this->{"model_" . $this->_route . "_" . $this->_moduleSysName()}->checkAuthorName($this->request->post['name'], $this->request->get['author_id']);

				if ($found) {
					$this->error['warning'] = $this->language->get('error_author_found');
					$this->error['name'] = $this->language->get('error_author_found');
				}
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
					if (isset($this->request->get['author_id']) && $seo_url['query'] != 'author_id=' . $this->request->get['author_id']) {
						$this->error['seo_url'][$language['language_id']] = sprintf($this->language->get('error_seo_url'));
					}
				}

				foreach ($seo_urls as $seo_url) {
					if ($seo_url && !isset($this->request->get['author_id'])) {
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

	protected function validateDelete()
	{
		if (!$this->user->hasPermission('modify', $this->_route . '/' . $this->_moduleSysName())) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		$this->load->model($this->_route . '/' . $this->_moduleSysName());

		foreach ($this->request->post['selected'] as $author_id) {
			$article_total = $this->{"model_" . $this->_route . "_" . $this->_moduleSysName()}->getTotalArticleByAuthorId($author_id);

			if ($article_total) {
				$this->error['warning'] = sprintf($this->language->get('error_article'), $article_total);
			}
		}

		return !$this->error;
	}

	public function autocomplete()
	{
		$json = array();

		if (isset($this->request->get['author_name'])) {
			if (isset($this->request->get['author_name'])) {
				$author_name = $this->request->get['author_name'];
			} else {
				$author_name = '';
			}

			if ($author_name) {
				$this->load->model($this->_route . '/' . $this->_moduleSysName());
				$filter_data = array('filter_author' => $author_name);
				$results = $this->{"model_" . $this->_route . "_" . $this->_moduleSysName()}->getAuthors($filter_data);

				foreach ($results as $result) {

					$json[] = array(
						'author_id' => $result['author_id'],
						'name' => strip_tags(html_entity_decode($result['name'], ENT_QUOTES, 'UTF-8'))
					);
				}
			}
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

}
