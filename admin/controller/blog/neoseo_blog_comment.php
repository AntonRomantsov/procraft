<?php

require_once(DIR_SYSTEM . '/engine/neoseo_controller.php');

class ControllerBlogNeoSeoBlogComment extends NeoSeoController
{

	private $error = array();

	public function __construct($registry)
	{
		parent::__construct($registry);
		$this->_moduleSysName = 'neoseo_blog';
				$this->_modulePostfix = "_comment";
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
			$this->{"model_" . $this->_route . "_" . $this->_moduleSysName()}->addArticleComment($this->request->post);

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
			$this->{"model_" . $this->_route . "_" . $this->_moduleSysName()}->editArticleComment($this->request->get['comment_id'], $this->request->post);

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

			foreach ($this->request->post['selected'] as $comment_id) {
				$this->{"model_" . $this->_route . "_" . $this->_moduleSysName()}->deleteArticleComment($comment_id);
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

	public function getList()
	{

		$data = $this->language->load($this->_route . '/' . $this->_moduleSysName());

		if (isset($this->request->get['filter_article'])) {
			$filter_article = $this->request->get['filter_article'];
		} else {
			$filter_article = null;
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
		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}
		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'bc.date_added';
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

		if (isset($this->request->get['filter_article'])) {
			$url .= '&filter_article=' . urlencode(html_entity_decode($this->request->get['filter_article'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_author'])) {
			$url .= '&filter_author=' . urlencode(html_entity_decode($this->request->get['filter_author'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_date_added'])) {
			$url .= '&filter_date_added=' . $this->request->get['filter_date_added'];
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
		$data['delete'] = $this->url->link($this->_route . '/' . $this->_moduleSysName() . '/delete', 'user_token=' . $this->session->data['user_token'] . $url, 'SSL');

		$data['comments'] = array();

		$filter_data = array(
			'filter_article' => $filter_article,
			'filter_author' => $filter_author,
			'filter_date_added' => $filter_date_added,
			'filter_status' => $filter_status,
			'sort' => $sort,
			'order' => $order,
			'start' => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit' => $this->config->get('config_limit_admin')
		);

		$comment_total = $this->{"model_" . $this->_route . "_" . $this->_moduleSysName()}->getTotalArticleComment($filter_data);

		$results = $this->{"model_" . $this->_route . "_" . $this->_moduleSysName()}->getArticleComments($filter_data);

		foreach ($results as $result) {
			$comment_body = mb_substr($result['comment'], 0, 100, 'UTF-8');
			if (mb_strlen($result['comment'], 'UTF-8') > 100) {
				$comment_body .= '...';
			}
			$data['comments'][] = array(
				'comment_id' => $result['comment_id'],
				'comment' => $comment_body,
				'article_id' => $result['article_id'],
				'name' => $result['article_name'],
				'author_name' => $result['author'],
				'status' => ($result['status'] ? $this->language->get('text_enabled') : $this->language->get('text_disabled')),
				'date_added' => date($this->language->get('date_format_short'), strtotime($result['date_added'])),
				'selected' => isset($this->request->post['selected']) && in_array($result['comment_id'], $this->request->post['selected']),
				'edit' => $this->url->link($this->_route . '/' . $this->_moduleSysName() . '/update', 'user_token=' . $this->session->data['user_token'] . '&comment_id=' . $result['comment_id'] . $url, 'SSL')
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

		if (isset($this->request->get['filter_article'])) {
			$url .= '&filter_article=' . urlencode(html_entity_decode($this->request->get['filter_article'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_author'])) {
			$url .= '&filter_author=' . urlencode(html_entity_decode($this->request->get['filter_author'], ENT_QUOTES, 'UTF-8'));
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

		$data['sort_article_name'] = $this->url->link($this->_route . '/' . $this->_moduleSysName(), 'user_token=' . $this->session->data['user_token'] . '&sort=bad.name' . $url, 'SSL');
		$data['sort_author_name'] = $this->url->link($this->_route . '/' . $this->_moduleSysName(), 'user_token=' . $this->session->data['user_token'] . '&sort=bc.name' . $url, 'SSL');
		$data['sort_status'] = $this->url->link($this->_route . '/' . $this->_moduleSysName(), 'user_token=' . $this->session->data['user_token'] . '&sort=bc.status' . $url, 'SSL');
		$data['sort_date_added'] = $this->url->link($this->_route . '/' . $this->_moduleSysName(), 'user_token=' . $this->session->data['user_token'] . '&sort=bc.date_added' . $url, 'SSL');

		$url = '';

		if (isset($this->request->get['filter_article'])) {
			$url .= '&filter_article=' . urlencode(html_entity_decode($this->request->get['filter_article'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_author'])) {
			$url .= '&filter_author=' . urlencode(html_entity_decode($this->request->get['filter_author'], ENT_QUOTES, 'UTF-8'));
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
		$pagination->total = $comment_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_limit_admin');
		$pagination->text = $this->language->get('text_pagination');
		$pagination->url = $this->url->link($this->_route . '/' . $this->_moduleSysName(), 'user_token=' . $this->session->data['user_token'] . $url . '&page={page}', 'SSL');

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($comment_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($comment_total - $this->config->get('config_limit_admin'))) ? $comment_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $comment_total, ceil($comment_total / $this->config->get('config_limit_admin')));

		$data['filter_article'] = $filter_article;
		$data['filter_author'] = $filter_author;
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

		$data['text_form'] = isset($this->request->get['comment_id']) ? $this->language->get('text_edit') : $this->language->get('text_add');

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

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->error['article_name'])) {
			$data['error_article_name'] = $this->error['article_name'];
		} else {
			$data['error_article_name'] = '';
		}

		if (isset($this->error['author'])) {
			$data['error_author'] = $this->error['author'];
		} else {
			$data['error_author'] = '';
		}

		if (isset($this->error['comment'])) {
			$data['error_comment'] = $this->error['comment'];
		} else {
			$data['error_comment'] = '';
		}

		if (isset($this->error['rating'])) {
			$data['error_rating'] = $this->error['rating'];
		} else {
			$data['error_rating'] = '';
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

		$comment_reply_id = 0;
		if (isset($this->request->get['parent_id']) || isset($this->request->post['parent_id'])) {
			if (isset($this->request->get['parent_id'])) {
				$comment_reply_id = $this->request->get['parent_id'];
			} else {
				$comment_reply_id = $this->request->post['parent_id'];
			}
			$parent_comment_info = $this->{"model_" . $this->_route . "_" . $this->_moduleSysName()}->getArticleComment($comment_reply_id);
			if (!$parent_comment_info) {
				$comment_reply_id = 0;
			}
		} else {
			$comment_reply_id = 0;
			$parent_comment_info = null;
		}

		$data['comment_id'] = 0;
		if ((isset($this->request->get['comment_id'])) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$comment_info = $this->{"model_" . $this->_route . "_" . $this->_moduleSysName()}->getArticleComment($this->request->get['comment_id']);
			if ($comment_info) {
				$data['comment_id'] = $comment_info['comment_id'];
				$comment_reply_id = (int) $comment_info['comment_reply_id'];
			}
		} else {
			$comment_info = null;
		}
		$data['comment_reply_id'] = $comment_reply_id;

		if (!isset($this->request->get['comment_id'])) {
			if ($comment_reply_id > 0) {
				$data['action'] = $this->url->link($this->_route . '/' . $this->_moduleSysName() . '/insert', 'parent_id=' . (int) $comment_reply_id . '&user_token=' . $this->session->data['user_token'] . $url, 'SSL');
			} else {
				$data['action'] = $this->url->link($this->_route . '/' . $this->_moduleSysName() . '/insert', 'user_token=' . $this->session->data['user_token'] . $url, 'SSL');
			}
		} else {
			$data['action'] = $this->url->link($this->_route . '/' . $this->_moduleSysName() . '/update', 'user_token=' . $this->session->data['user_token'] . '&comment_id=' . $this->request->get['comment_id'] . $url, 'SSL');
		}

		$data['cancel'] = $this->url->link($this->_route . '/' . $this->_moduleSysName(), 'user_token=' . $this->session->data['user_token'] . $url, 'SSL');



		if ($parent_comment_info) {
			$data['comment_reply_author_name'] = $parent_comment_info['author'];
			$data['comment_reply_comment'] = $parent_comment_info['comment'];
			$data['comment_reply_date'] = $parent_comment_info['date_modified'];

			$data['comment_reply_url'] = $this->url->link($this->_route . '/' . $this->_moduleSysName() . '/update', 'comment_id=' . (int) $comment_reply_id . '&user_token=' . $this->session->data['user_token'] . $url, 'SSL');

			$data['comment_reply_rating'] = (int) $parent_comment_info['rating'];
			if ($data['comment_reply_rating'] < 1) {
				$data['comment_reply_rating'] = 1;
			} else if ($data['comment_reply_rating'] > 5) {
				$data['comment_reply_rating'] = 5;
			}
		}


		if ($parent_comment_info) {
			$data['article_name'] = $parent_comment_info['article_name'];
		} elseif (isset($this->request->post['article_name'])) {
			$data['article_name'] = $this->request->post['article_name'];
		} elseif (isset($comment_info)) {
			$data['article_name'] = $comment_info['article_name'];
		} else {
			$data['article_name'] = '';
		}

		if ($parent_comment_info) {
			$data['article_id'] = $parent_comment_info['article_id'];
		} elseif (isset($this->request->post['article_id'])) {
			$data['article_id'] = $this->request->post['article_id'];
		} elseif (isset($comment_info)) {
			$data['article_id'] = $comment_info['article_id'];
		} else {
			$data['article_id'] = '';
		}

		if (isset($this->request->post['author_name'])) {
			$data['author_name'] = $this->request->post['author_name'];
		} elseif (isset($comment_info)) {
			$data['author_name'] = $comment_info['author'];
		} else {
			$data['author_name'] = '';
		}

		if (isset($this->request->post['rating'])) {
			$data['rating'] = $this->request->post['rating'];
		} elseif (isset($comment_info)) {
			$data['rating'] = $comment_info['rating'];
		} else {
			$data['rating'] = 1;
		}
		$data['rating'] = (int) $data['rating'];
		if ($data['rating'] < 1) {
			$data['rating'] = 1;
		} else if ($data['rating'] > 5) {
			$data['rating'] = 5;
		}


		if (isset($comment_info)) {
			$data['add_comment'] = $data['comment_reply_url'] = $this->url->link($this->_route . '/' . $this->_moduleSysName() . '/insert', 'parent_id=' . (int) $comment_info['comment_id'] . '&user_token=' . $this->session->data['user_token'] . $url, 'SSL');

			if ($comment_info['comment_reply_id'] > 0) {

				$comment_reply_info = $this->{"model_" . $this->_route . "_" . $this->_moduleSysName()}->getArticleComment($comment_info['comment_reply_id']);

				$data['comment_reply_author_name'] = $comment_reply_info['author'];
				$data['comment_reply_comment'] = $comment_reply_info['comment'];
				$data['comment_reply_date'] = $comment_reply_info['date_modified'];

				$data['comment_reply_url'] = $this->url->link($this->_route . '/' . $this->_moduleSysName() . '/update', 'comment_id=' . (int) $comment_info['comment_reply_id'] . '&user_token=' . $this->session->data['user_token'] . $url, 'SSL');

				$data['comment_reply_rating'] = (int) $comment_reply_info['rating'];
				if ($data['comment_reply_rating'] < 1) {
					$data['comment_reply_rating'] = 1;
				} else if ($data['comment_reply_rating'] > 5) {
					$data['comment_reply_rating'] = 5;
				}
			} else {
				$filter = array("comment_reply_id" => $comment_info['comment_id']);
				$children = $this->{"model_" . $this->_route . "_" . $this->_moduleSysName()}->getArticleComments($filter);

				$child_comments = array();
				foreach ($children as $child) {

					$child_comment['author_name'] = $child['author'];
					$child_comment['comment'] = $child['comment'];
					$child_comment['date'] = $child['date_modified'];

					$child_comment['url'] = $this->url->link($this->_route . '/' . $this->_moduleSysName() . '/update', 'comment_id=' . (int) $child['comment_id'] . '&user_token=' . $this->session->data['user_token'] . $url, 'SSL');

					$child_comment['rating'] = (int) $child['rating'];
					if ($child_comment['rating'] < 1) {
						$child_comment['rating'] = 1;
					} else if ($child_comment['rating'] > 5) {
						$child_comment['rating'] = 5;
					}

					$child_comments[] = $child_comment;
				}

				$data['child_comments'] = $child_comments;
			}
		}

		if (isset($this->request->post['status'])) {
			$data['status'] = $this->request->post['status'];
		} elseif (isset($comment_info)) {
			$data['status'] = $comment_info['status'];
		} else {
			$data['status'] = 1;
		}

		if (isset($this->request->post['comment'])) {
			$data['comment'] = $this->request->post['comment'];
		} elseif (isset($comment_info)) {
			$data['comment'] = $comment_info['comment'];
		} else {
			$data['comment'] = '';
		}


		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view($this->_route . '/' . $this->_moduleSysName() . '_form', $data));
	}

	public function validateForm()
	{

		if (!$this->user->hasPermission('modify', $this->_route . '/' . $this->_moduleSysName())) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if (utf8_strlen($this->request->post['author_name']) < 3 || utf8_strlen($this->request->post['author_name']) > 64) {
			$this->error['author'] = $this->language->get('error_author');
		}

		if ($this->request->post['article_name'] == '') {
			$this->error['article_name'] = $this->language->get('error_article_name');
		}

		if (utf8_strlen($this->request->post['comment']) < 3) {
			$this->error['comment'] = $this->language->get('error_comment');
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

		return !$this->error;
	}

}
