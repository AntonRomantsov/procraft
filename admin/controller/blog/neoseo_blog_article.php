<?php

require_once(DIR_SYSTEM . '/engine/neoseo_controller.php');
require_once( DIR_SYSTEM . '/engine/neoseo_view.php' );

class ControllerBlogNeoSeoBlogArticle extends NeoSeoController
{

	private $error = array();

	public function __construct($registry)
	{
		parent::__construct($registry);
		$this->_moduleSysName = 'neoseo_blog';
				$this->_modulePostfix = "_article";
		$this->_logFile = $this->_moduleSysName . '.log';
		$this->debug = $this->config->get($this->_moduleSysName . '_status') == 1;
	}

	public function index()
	{

		$data = $this->language->load($this->_route . '/' . $this->_moduleSysName());

		$this->document->setTitle($this->language->get('heading_title_raw'));

		$this->load->model('blog/' . $this->_moduleSysName());
		$this->load->model('blog/' . $this->_moduleSysName . '_category');
		$this->load->model('blog/' . $this->_moduleSysName . '_author');

		$this->getList();
	}

	public function insert()
	{

		$this->language->load($this->_route . '/' . $this->_moduleSysName());

		$this->document->setTitle($this->language->get('heading_title_raw'));

		$this->load->model('blog/' . $this->_moduleSysName());

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && ($this->validateForm())) {
			$this->{"model_" . $this->_route . "_" . $this->_moduleSysName()}->addArticle($this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

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

		$this->getForm();
	}

	public function update()
	{

		$this->language->load($this->_route . '/' . $this->_moduleSysName());

		$this->document->setTitle($this->language->get('heading_title_raw'));

		$this->load->model($this->_route . '/' . $this->_moduleSysName());

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && ($this->validateForm())) {
			$this->{"model_" . $this->_route . "_" . $this->_moduleSysName()}->editArticle($this->request->get['article_id'], $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

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

		$this->getForm();
	}

	public function delete()
	{

		$this->language->load($this->_route . '/' . $this->_moduleSysName());

		$this->document->setTitle($this->language->get('heading_title_raw'));

		$this->load->model($this->_route . '/' . $this->_moduleSysName());

		if (isset($this->request->post['selected']) && $this->validateDelete()) {

			foreach ($this->request->post['selected'] as $article_id) {
				$this->{"model_" . $this->_route . "_" . $this->_moduleSysName()}->deleteArticle($article_id);
			}

			$this->session->data['success'] = $this->language->get('text_success');

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

		$this->getList();
	}

	public function copy()
	{
		$this->language->load($this->_route . '/' . $this->_moduleSysName());

		$this->document->setTitle($this->language->get('heading_title_raw'));

		$this->load->model($this->_route . '/' . $this->_moduleSysName());

		if (isset($this->request->post['selected']) && $this->validateCopy()) {
			foreach ($this->request->post['selected'] as $product_id) {
				$this->{"model_" . $this->_route . "_" . $this->_moduleSysName()}->copyArticle($product_id);
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

		$this->language->load($this->_route . '/' . $this->_moduleSysName());

		if (isset($this->request->get['filter_name'])) {
			$filter_name = $this->request->get['filter_name'];
		} else {
			$filter_name = null;
		}

		if (isset($this->request->get['filter_author'])) {
			$filter_author = $this->request->get['filter_author'];
		} else {
			$filter_author = null;
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

		if (isset($this->request->get['filter_category'])) {
			$filter_category = $this->request->get['filter_category'];
		} else {
			$filter_category = NULL;
		}

		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'ba.date_added';
		}

		if (isset($this->request->get['order'])) {
			$order = $this->request->get['order'];
		} else {
			$order = 'DESC';
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

		if (isset($this->request->get['filter_author'])) {
			$url .= '&filter_author=' . urlencode(html_entity_decode($this->request->get['filter_author'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_date_added'])) {
			$url .= '&filter_date_added=' . $this->request->get['filter_date_added'];
		}

		if (isset($this->request->get['filter_category'])) {
			$url .= '&filter_category=' . $this->request->get['filter_category'];
		}

		if (isset($this->request->get['filter_status'])) {
			$url .= '&filter_status=' . $this->request->get['filter_status'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		$data['breadcrumbs'] = array();

		$data = $this->initBreadcrumbs(array(
			array($this->_route . '/' . $this->_moduleSysName(), "heading_title_raw")
				), $data);

		$data['insert'] = $this->url->link($this->_route . '/' . $this->_moduleSysName() . '/insert', 'user_token=' . $this->session->data['user_token'] . $url, 'SSL');
		$data['copy'] = $this->url->link($this->_route . '/' . $this->_moduleSysName() . '/copy', 'user_token=' . $this->session->data['user_token'] . $url, 'SSL');
		$data['delete'] = $this->url->link($this->_route . '/' . $this->_moduleSysName() . '/delete', 'user_token=' . $this->session->data['user_token'] . $url, 'SSL');

		$data['articles'] = array();

		$filter_data = array(
			'filter_name' => $filter_name,
			'filter_author' => $filter_author,
			'filter_date_added' => $filter_date_added,
			'filter_category' => $filter_category,
			'filter_status' => $filter_status,
			'sort' => $sort,
			'order' => $order,
			'start' => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit' => $this->config->get('config_limit_admin')
		);
		$this->load->model($this->_route . '/' . $this->_moduleSysName . '_category');
		$this->load->model($this->_route . '/' . $this->_moduleSysName . '_author');
		$data['categories'] = $this->{"model_" . $this->_route . "_" . $this->_moduleSysName . '_category'}->getCategories(array('parent_id' => 0));
		$data['authors'] = $this->{"model_" . $this->_route . "_" . $this->_moduleSysName . '_author'}->getAuthors();

		$article_limit = $this->{"model_" . $this->_route . "_" . $this->_moduleSysName()}->getTotalArticle($filter_data);

		$results = $this->{"model_" . $this->_route . "_" . $this->_moduleSysName()}->getArticles($filter_data);

		foreach ($results as $result) {
			$categories = $this->{"model_" . $this->_route . "_" . $this->_moduleSysName()}->getArticleCategories($result['article_id']);

			$data['articles'][] = array(
				'article_id' => $result['article_id'],
				'name' => $result['name'],
				'author_name' => $result['author_name'],
				'sort_order' => $result['sort_order'],
				'categories' => $categories,
				'status' => $result['status'] ? $this->language->get('text_enabled') : $this->language->get('text_disabled'),
				'date_added' => date($this->language->get('date_format_short'), strtotime($result['date_added'])),
				'selected' => isset($this->request->post['selected']) && in_array($result['article_id'], $this->request->post['selected']),
				'edit' => $this->url->link('blog/' . $this->_moduleSysName() . '/update', 'user_token=' . $this->session->data['user_token'] . '&article_id=' . $result['article_id'] . $url, 'SSL')
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

		if (isset($this->request->get['filter_author'])) {
			$url .= '&filter_author=' . urlencode(html_entity_decode($this->request->get['filter_author'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_date_added'])) {
			$url .= '&filter_date_added=' . $this->request->get['filter_date_added'];
		}

		if (isset($this->request->get['filter_category'])) {
			$url .= '&filter_category=' . $this->request->get['filter_category'];
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

		$data['sort_name'] = $this->url->link($this->_route . "_" . $this->_moduleSysName(), 'user_token=' . $this->session->data['user_token'] . '&sort=bad.name' . $url, 'SSL');
		$data['sort_author_name'] = $this->url->link($this->_route . "_" . $this->_moduleSysName(), 'user_token=' . $this->session->data['user_token'] . '&sort=bau.name' . $url, 'SSL');
		$data['sort_order'] = $this->url->link($this->_route . "_" . $this->_moduleSysName(), 'user_token=' . $this->session->data['user_token'] . '&sort=ba.sort_order' . $url, 'SSL');
		$data['sort_status'] = $this->url->link($this->_route . "_" . $this->_moduleSysName(), 'user_token=' . $this->session->data['user_token'] . '&sort=ba.status' . $url, 'SSL');
		$data['sort_date_added'] = $this->url->link($this->_route . "_" . $this->_moduleSysName(), 'user_token=' . $this->session->data['user_token'] . '&sort=ba.date_added' . $url, 'SSL');

		$url = '';

		if (isset($this->request->get['filter_name'])) {
			$url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_author'])) {
			$url .= '&filter_author=' . urlencode(html_entity_decode($this->request->get['filter_author'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_date_added'])) {
			$url .= '&filter_date_added=' . $this->request->get['filter_date_added'];
		}

		if (isset($this->request->get['filter_category'])) {
			$url .= '&filter_category=' . $this->request->get['filter_category'];
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
		$pagination->total = $article_limit;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_limit_admin');
		$pagination->text = $this->language->get('text_pagination');
		$pagination->url = $this->url->link($this->_route . "_" . $this->_moduleSysName(), 'user_token=' . $this->session->data['user_token'] . $url . '&page={page}', 'SSL');

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($article_limit) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($article_limit - $this->config->get('config_limit_admin'))) ? $article_limit : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $article_limit, ceil($article_limit / $this->config->get('config_limit_admin')));

		$data['filter_name'] = $filter_name;
		$data['filter_author'] = $filter_author;
		$data['filter_category'] = $filter_category;
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

		$data['text_form'] = isset($this->request->get['article_id']) ? $this->language->get('text_edit') : $this->language->get('text_add');

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

		if (isset($this->request->get['article_id'])) {
			$data['article_id'] = $this->request->get['article_id'];
		} else {
			$data['article_id'] = 0;
		}

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->error['article_name'])) {
			$data['error_article_name'] = $this->error['article_name'];
		} else {
			$data['error_article_name'] = array();
		}

		if (isset($this->error['description'])) {
			$data['error_description'] = $this->error['description'];
		} else {
			$data['error_description'] = array();
		}

		if (isset($this->error['author_name'])) {
			$data['error_author_name'] = $this->error['author_name'];
		} else {
			$data['error_author_name'] = '';
		}

		if (isset($this->error['seo_url'])) {
			$data['error_seo_url'] = $this->error['seo_url'];
		} else {
			$data['error_seo_url'] = '';
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

		$data['breadcrumbs'] = array();

		$data = $this->initBreadcrumbs(array(
			array($this->_route . '/' . $this->_moduleSysName(), "heading_title_raw")
				), $data);

		if (!$data['article_id']) {
			$data['action'] = $this->url->link($this->_route . '/' . $this->_moduleSysName() . '/insert', 'user_token=' . $this->session->data['user_token'] . $url, 'SSL');
		} else {
			$data['action'] = $this->url->link($this->_route . '/' . $this->_moduleSysName() . '/update', 'user_token=' . $this->session->data['user_token'] . '&article_id=' . $data['article_id'] . $url, 'SSL');
		}

		$data['cancel'] = $this->url->link($this->_route . '/' . $this->_moduleSysName(), 'user_token=' . $this->session->data['user_token'] . $url, 'SSL');

		if ($data['article_id'] && $this->request->server['REQUEST_METHOD'] != 'POST') {
			$article_info = $this->{"model_" . $this->_route . '_' . $this->_moduleSysName()}->getArticle($data['article_id']);
		}

		$this->load->model($this->_route . '/' . $this->_moduleSysName . '_author');
		$data['authors'] = array();
		$data['authors'] = $this->{"model_" . $this->_route . '_' . $this->_moduleSysName . '_author'}->getAuthors();

		$this->load->model('localisation/language');
		$data['languages'] = $this->model_localisation_language->getLanguages();

		if (isset($this->request->post['article_description'])) {
			$data['article_description'] = $this->request->post['article_description'];
		} elseif (isset($article_info['article_id'])) {
			$data['article_description'] = $this->{"model_" . $this->_route . '_' . $this->_moduleSysName()}->getArticleDescriptions($article_info['article_id']);
		} else {
			$data['article_description'] = array();
		}

		if (isset($this->request->post['article_teaser'])) {
			$data['article_teaser'] = $this->request->post['article_teaser'];
		} elseif (isset($article_info['article_id'])) {
			$data['article_teaser'] = $this->{"model_" . $this->_route . '_' . $this->_moduleSysName()}->getArticleDescriptions($article_info['article_id']);
		} else {
			$data['article_teaser'] = array();
		}

		if (isset($this->request->get['article_id'])) {
			$article_seo_url = $this->{"model_" . $this->_route . "_" . $this->_moduleSysName()}->getArticleSeoUrls($this->request->get['article_id']);
		}
		foreach ($data['languages'] as $language) {
			if (isset($this->request->post['seo_url'][$language['language_id']])) {
				$data['seo_url'][$language['language_id']] = $this->request->post['seo_url'][$language['language_id']];
			} elseif (!empty($article_seo_url[$language['language_id']])) {
				$data['seo_url'][$language['language_id']] = $article_seo_url[$language['language_id']];
			} else {
				$data['seo_url'][$language['language_id']] = '';
			}
		}

		if (isset($this->request->post['allow_comment'])) {
			$data['allow_comment'] = $this->request->post['allow_comment'];
		} elseif (isset($article_info['allow_comment'])) {
			$data['allow_comment'] = $article_info['allow_comment'];
		} else {
			$data['allow_comment'] = 0;
		}

		if (isset($this->request->post['author_id'])) {
			$data['author_name'] = $this->request->post['author_name'];
			$data['author_id'] = $this->request->post['author_id'];
		} elseif (isset($article_info['author_id'])) {
			$data['author_id'] = $article_info['author_id'];
			$data['author_name'] = $this->{"model_" . $this->_route . '_' . $this->_moduleSysName . '_author'}->getAuthorName($article_info['author_id']);
		} else {
			$data['author_name'] = '';
			$data['author_id'] = '';
		}

		if (isset($this->request->post['sort_order'])) {
			$data['sort_order'] = $this->request->post['sort_order'];
		} elseif (isset($article_info['sort_order'])) {
			$data['sort_order'] = $article_info['sort_order'];
		} else {
			$data['sort_order'] = '';
		}

		$this->load->model('tool/image');

		$data['no_image'] = $this->model_tool_image->resize('no_image.png', 100, 100);

		if (isset($this->request->post['image']) && file_exists(DIR_IMAGE . $this->request->post['image'])) {
			$data['thumb'] = $this->model_tool_image->resize($this->request->post['image'], 100, 100);
			$data['image'] = $this->request->post['image'];
		} elseif (!empty($article_info['image']) && file_exists(DIR_IMAGE . $article_info['image'])) {
			$data['thumb'] = $this->model_tool_image->resize($article_info['image'], 100, 100);
			$data['image'] = $article_info['image'];
		} else {
			$data['thumb'] = $this->model_tool_image->resize('no_image.png', 100, 100);
			$data['image'] = '';
		}


		$data['placeholder'] = $this->model_tool_image->resize('no_image.png', 100, 100);

		$this->load->model('setting/store');

		$data['stores'] = $this->model_setting_store->getStores();

		if (isset($this->request->post['article_store'])) {
			$data['article_store'] = $this->request->post['article_store'];
		} elseif (isset($article_info['article_id'])) {
			$data['article_store'] = $this->{"model_" . $this->_route . '_' . $this->_moduleSysName()}->getArticleStore($article_info['article_id']);
		} else {
			$data['article_store'] = array(0);
		}

		$data['categories'] = array();

		$this->load->model($this->_route . '/' . $this->_moduleSysName . '_category');

		$data['categories'] = $this->{"model_" . $this->_route . '_' . $this->_moduleSysName . '_category'}->getCategories(array('parent_id' => 0));

		if (isset($this->request->post['main_category_id'])) {
			$data['main_category_id'] = $this->request->post['main_category_id'];
		} elseif (isset($article_info['article_id'])) {
			$data['main_category_id'] = $this->{"model_" . $this->_route . '_' . $this->_moduleSysName()}->getArticleMainCategoryId($article_info['article_id']);
		} else {
			$data['main_category_id'] = 0;
		}

		if (isset($this->request->post['article_category'])) {
			$data['article_category'] = $this->request->post['article_category'];
		} elseif (isset($article_info['article_id'])) {
			$data['article_category'] = $this->{"model_" . $this->_route . '_' . $this->_moduleSysName()}->getArticleCategories($article_info['article_id']);
		} else {
			$data['article_category'] = array();
		}

		$this->load->model('catalog/category');
		$data['default_categories'] = $this->model_catalog_category->getCategories(array('parent_id' => 0));

		$this->load->model('catalog/manufacturer');
		$data['default_manufacturers'] = $this->model_catalog_manufacturer->getManufacturers(0);

		$this->load->model('catalog/product');

		$data['related_products'] = array();

		if (isset($this->request->post['related_products'])) {

			foreach ($this->request->post['related_products'] as $product_id) {
				$product_info = $this->model_catalog_product->getProduct($product_id);

				$data['related_products'][] = array(
					'product_id' => $product_info['product_id'],
					'name' => $product_info['name']
				);
			}
		} elseif (isset($article_info['article_id'])) {

			$products = $this->{"model_" . $this->_route . '_' . $this->_moduleSysName()}->getRelatedProducts($article_info['article_id']);

			foreach ($products as $product) {
				$product_info = $this->model_catalog_product->getProduct($product['product_id']);

				$data['related_products'][] = array(
					'product_id' => $product_info['product_id'],
					'name' => $product_info['name']
				);
			}
		}


		if (isset($this->request->post['related_articles'])) {
			$data['related_articles'] = $this->request->post['related_articles'];
		} elseif (isset($article_info['article_id'])) {
			$data['related_articles'] = $this->{"model_" . $this->_route . '_' . $this->_moduleSysName()}->getRelatedArticles($article_info['article_id']);
		} else {
			$data['related_articles'] = array();
		}

		if (isset($this->request->post['status'])) {
			$data['status'] = $this->request->post['status'];
		} elseif (isset($article_info['status'])) {
			$data['status'] = $article_info['status'];
		} else {
			$data['status'] = 0;
		}

		if (isset($this->request->post['date_added'])) {
			$data['date_added'] = $this->request->post['date_added'];
		} elseif (isset($article_info['date_added'])) {
			$data['date_added'] = ($article_info['date_added'] != '0000-00-00 00:00:00') ? $article_info['date_added'] : '';
		} else {
			$data['date_added'] = date('Y-m-d h:i:s');
		}

		if (isset($this->request->post['date_modified'])) {
			$data['date_modified'] = $this->request->post['date_modified'];
		} elseif (isset($article_info['date_modified'])) {
			$data['date_modified'] = ($article_info['date_modified'] != '0000-00-00 00:00:00') ? $article_info['date_modified'] : '';
		} else {
			$data['date_modified'] = date('Y-m-d h:i:s');
		}

		if (isset($this->request->post['article_layout'])) {
			$data['article_layout'] = $this->request->post['article_layout'];
		} elseif (isset($article_info['article_id'])) {
			$data['article_layout'] = $this->{"model_" . $this->_route . '_' . $this->_moduleSysName()}->getArticleLayouts($article_info['article_id']);
		} else {
			$data['article_layout'] = array();
		}

		$this->load->model('design/layout');
		$data['layouts'] = $this->model_design_layout->getLayouts();

		$data['href_shop'] = HTTP_CATALOG;
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view($this->_route . '/' . $this->_moduleSysName() . '_form', $data));
	}

	public function autocomplete()
	{

		$json = array();

		if (isset($this->request->get['article_name'])) {
			$article_name = $this->request->get['article_name'];
			if ($article_name) {
				$this->load->model($this->_route . '/' . $this->_moduleSysName());
				$filter_data = array(
					'filter_article' => $article_name
				);
				$results = $this->{"model_" . $this->_route . '_' . $this->_moduleSysName()}->getArticles($filter_data);

				foreach ($results as $result) {

					$json[] = array(
						'article_id' => $result['article_id'],
						'name' => strip_tags(html_entity_decode($result['name'], ENT_QUOTES, 'UTF-8'))
					);
				}
			}
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	private function validateForm()
	{

		if (!$this->user->hasPermission('modify', $this->_route . '/' . $this->_moduleSysName())) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		foreach ($this->request->post['article_description'] as $language_id => $value) {
			if ((strlen($value['name']) < 3) || (strlen($value['name']) > 255)) {
				$this->error['article_name'][$language_id] = $this->language->get('error_title');
			} else {
				if (!isset($this->request->get['article_id'])) {
					$found = $this->{"model_" . $this->_route . '_' . $this->_moduleSysName()}->checkArticleName($language_id, $value['name'], 0);

					if ($found) {
						$this->error['warning'] = $this->language->get('error_title_found');
						$this->error['article_name'][$language_id] = $this->language->get('error_title_found');
					}
				} else {
					$found = $this->{"model_" . $this->_route . '_' . $this->_moduleSysName()}->checkArticleName($language_id, $value['name'], $this->request->get['article_id']);
					if ($found) {
						$this->error['warning'] = $this->language->get('error_title_found');
						$this->error['article_name'][$language_id] = $this->language->get('error_title_found');
					}
				}
			}

			if (strlen(strip_tags(html_entity_decode($value['description'], ENT_QUOTES, 'UTF-8'))) < 3) {
				;
				$this->error['description'][$language_id] = $this->language->get('error_description');
			}
		}

		if (!$this->request->post['author_name']) {
			$this->error['author_name'] = $this->language->get('error_author_name');
		} else {
			if ($this->request->post['author_id']) {
				$found = $this->{"model_" . $this->_route . '_' . $this->_moduleSysName()}->checkAuthorName($this->request->post['author_name']);

				if (!$found) {
					$this->error['author_name'] = $this->language->get('error_author_not_found');
					$this->error['warning'] = $this->language->get('error_author_not_found');
				}
			} else {
				$this->error['author_name'] = $this->language->get('error_author_not_found');
				$this->error['warning'] = $this->language->get('error_author_not_found');
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
					if (isset($this->request->get['article_id']) && $seo_url['query'] != 'article_id=' . $this->request->get['article_id']) {
						$this->error['seo_url'][$language['language_id']] = sprintf($this->language->get('error_seo_url'));
					}
				}

				foreach ($seo_urls as $seo_url) {
					if ($seo_url && !isset($this->request->get['article_id'])) {
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

	private function validateDelete()
	{

		if (!$this->user->hasPermission('modify', $this->_route . '/' . $this->_moduleSysName())) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		foreach ($this->request->post['selected'] as $article_id) {
			$found = $this->{"model_" . $this->_route . '_' . $this->_moduleSysName()}->checkDeleteArticle($article_id);

			if ($found) {
				$this->error['warning'] = sprintf($this->language->get('error_article_related'), $found);
				break;
			}
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

	public function autocompleteArticles()
	{

		$json = array();

		if (isset($this->request->get['article_id'])) {

			$this->load->model($this->_route . '/' . $this->_moduleSysName());

			if (isset($this->request->get['filter_name'])) {
				$filter_name = $this->request->get['filter_name'];
			} else {
				$filter_name = '';
			}

			if ($filter_name) {
				$filter_data = array(
					'filter_name' => $filter_name
				);

				$results = $this->{"model_" . $this->_route . '_' . $this->_moduleSysName()}->getArticlesRelated($filter_data, $this->request->get['article_id']);

				foreach ($results as $result) {
					$json[] = array(
						'article_id' => $result['article_id'],
						'name' => strip_tags(html_entity_decode($result['name'], ENT_QUOTES, 'UTF-8'))
					);
				}
			}
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	public function autocompleteCategories()
	{
		$json = array();

		if (isset($this->request->get['filter_name']) || isset($this->request->get['article_store'])) {
			$this->load->model($this->_route . '/' . $this->_moduleSysName());

			if (isset($this->request->get['article_store'])) {
				$filter_store_id = implode(',', $this->request->get['article_store']);
			} else {
				$filter_store_id = false;
			}

			$filter_data = array(
				'filter_name' => $this->request->get['filter_name'],
				'filter_store_id' => $filter_store_id,
				'sort' => 'name',
				'order' => 'ASC',
				'start' => 0,
					//'limit'       => 5
			);

			$results = $this->{"model_" . $this->_route . '_' . $this->_moduleSysName()}->getCategories($filter_data);

			foreach ($results as $result) {
				$json[] = array(
					'category_id' => $result['category_id'],
					'name' => strip_tags(html_entity_decode($result['name'], ENT_QUOTES, 'UTF-8'))
				);
			}
		}

		$sort_order = array();

		foreach ($json as $key => $value) {
			$sort_order[$key] = $value['name'];
		}

		array_multisort($sort_order, SORT_ASC, $json);

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	public function autocompleteManufacturers()
	{
		$json = array();

		if (isset($this->request->get['filter_name']) || isset($this->request->get['article_store'])) {
			$this->load->model($this->_route . '/' . $this->_moduleSysName());

			if (isset($this->request->get['article_store'])) {
				$filter_store_id = implode(',', $this->request->get['article_store']);
			} else {
				$filter_store_id = false;
			}

			$filter_data = array(
				'filter_name' => $this->request->get['filter_name'],
				'filter_store_id' => $filter_store_id,
				'start' => 0,
					//'limit'       => 5
			);

			$results = $this->{"model_" . $this->_route . '_' . $this->_moduleSysName()}->getManufacturers($filter_data);

			foreach ($results as $result) {
				$json[] = array(
					'manufacturer_id' => $result['manufacturer_id'],
					'name' => strip_tags(html_entity_decode($result['name'], ENT_QUOTES, 'UTF-8'))
				);
			}
		}

		$sort_order = array();

		foreach ($json as $key => $value) {
			$sort_order[$key] = $value['name'];
		}

		array_multisort($sort_order, SORT_ASC, $json);

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	public function autocompleteProducts()
	{

		$json = array();

		if (isset($this->request->get['filter_category_id']) ||
				isset($this->request->get['filter_manufacturer_id']) ||
				isset($this->request->get['filter_name']) ||
				isset($this->request->get['article_store'])) {

			$this->load->model($this->_route . '/' . $this->_moduleSysName());

			if (isset($this->request->get['filter_category_id'])) {
				$filter_category_id = $this->request->get['filter_category_id'];
			} else {
				$filter_category_id = false;
			}

			if (isset($this->request->get['filter_manufacturer_id'])) {
				$filter_manufacturer_id = $this->request->get['filter_manufacturer_id'];
			} else {
				$filter_manufacturer_id = false;
			}

			if (isset($this->request->get['filter_name'])) {
				$filter_name = $this->request->get['filter_name'];
			} else {
				$filter_name = false;
			}


			if (isset($this->request->get['article_store'])) {
				$filter_store_id = implode(',', $this->request->get['article_store']);
			} else {
				$filter_store_id = false;
			}

			$data = array(
				'filter_category_id' => $filter_category_id,
				'filter_manufacturer_id' => $filter_manufacturer_id,
				'filter_name' => $filter_name,
				'filter_store_id' => $filter_store_id,
				'filter_status' => 1,
				'limit' => 10,
			);

			$results = $this->{"model_" . $this->_route . '_' . $this->_moduleSysName()}->getProducts($data);


			foreach ($results as $result) {

				$json[] = array(
					'product_id' => $result['product_id'],
					'name' => strip_tags(html_entity_decode($result['name'], ENT_QUOTES, 'UTF-8')),
				);
			}
		}

		$this->response->setOutput(json_encode($json));
	}

}
