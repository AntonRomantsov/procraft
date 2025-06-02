<?php

require_once(DIR_SYSTEM . '/engine/neoseo_controller.php');

class ControllerBlogNeoSeoBlogComment extends NeoSeoController
{

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
		$this->response->setOutput($this->page());
	}

	public function page()
	{

		$data = $this->load->language($this->_route . '/' . $this->_moduleSysName());

		$this->load->model($this->_route . '/' . $this->_moduleSysName());
		if (!file_exists(DIR_TEMPLATE . $this->config->get('config_theme') . '/stylesheet/' . $this->_moduleSysName() . '.scss')) {
			if (file_exists(DIR_TEMPLATE . $this->config->get('config_theme') . '/stylesheet/' . $this->_moduleSysName . '.css')) {
				$this->document->addStyle('catalog/view/theme/' . $this->config->get('config_theme') . '/stylesheet/' . $this->_moduleSysName() . 'css');
			} else {
				$this->document->addStyle('catalog/view/theme/default/stylesheet/' . $this->_moduleSysName . '.css');
			}
		}

		$limit = $this->config->get('blog_comment_limit');
		if (!$limit) {
			$limit = 10;
		}

		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		if (isset($this->request->get['article_id'])) {
			$article_id = $this->request->get['article_id'];
		} elseif (isset($this->request->get['comment_article_id'])) {
			$article_id = $this->request->get['comment_article_id'];
		} else {
			$article_id = 0;
		}

		if (isset($this->request->get['comment_id'])) {
			$comment_id = $this->request->get['comment_id'];
		} else {
			$comment_id = 0;
		}

		$data['page'] = $page;

		$data['comments'] = array();

		$filter_data = array(
			'filter_article_id' => $article_id,
			'filter_comment_reply_id' => 0
		);

		$comment_total = $this->{"model_" . $this->_route . "_" . $this->_moduleSysName()}->getTotalComments($filter_data);

		$filter_data = array(
			'filter_article_id' => $article_id,
			'filter_comment_reply_id' => 0,
			'start' => ($page - 1) * $limit,
			'limit' => $limit
		);

		$results = $this->{"model_" . $this->_route . "_" . $this->_moduleSysName()}->getComments($filter_data);

		foreach ($results as $result) {
			$comment_replies = array();

			$filter_data = array(
				'filter_article_id' => $result['article_id'],
				'filter_comment_reply_id' => $result['comment_id'],
				'order' => "ASC"
			);

			$reply_results = $this->{"model_" . $this->_route . "_" . $this->_moduleSysName()}->getComments($filter_data);

			foreach ($reply_results as $comment) {
				$comment_replies[] = $comment;
			}

			$result['comment_reply'] = $comment_replies;

			$data['comments'][] = $result;
		}

		$pagination = new Pagination();
		$pagination->total = $comment_total;
		$pagination->page = $page;
		$pagination->limit = $limit;
		$pagination->text = $this->language->get('text_pagination');
		$pagination->url = $this->url->link($this->_route . '/' . $this->_moduleSysName . '_article', 'article_id=' . $article_id . '&page={page}');

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($comment_total) ? (($page - 1) * $limit) + 1 : 0, ((($page - 1) * $limit) > ($comment_total - $limit)) ? $comment_total : ((($page - 1) * $limit) + $limit), $comment_total, ceil($comment_total / $limit));

		return $this->load->view($this->_route . '/' . $this->_moduleSysName(), $data);
	}

	public function write()
	{
		$this->load->model($this->_route . '/' . $this->_moduleSysName());

		$data = $this->load->language($this->_route . '/' . $this->_moduleSysName());

		$json = array();

		if ($this->request->server['REQUEST_METHOD'] == 'POST') {
			if ((utf8_strlen($this->request->post['name']) < 3) || (utf8_strlen($this->request->post['name']) > 25)) {
				$json['error'] = $this->language->get('error_name');
			}

			if ((utf8_strlen($this->request->post['text']) < 3)) {
				$json['error'] = $this->language->get('error_text');
			}

			// Captcha
			if ($this->config->get($this->config->get('config_captcha') . '_status') && in_array('review', (array) $this->config->get('config_captcha_page'))) {
				$captcha = $this->load->controller('captcha/' . $this->config->get('config_captcha') . '/validate');

				if ($captcha) {
					$json['error'] = $captcha;
				}
			}

			if (!isset($json['error'])) {
				$post_data = $this->request->post;

				$post_data['status'] = (int) $this->config->get($this->_moduleSysName . '_comment_auto_approval');

				$this->{"model_" . $this->_route . "_" . $this->_moduleSysName()}->addComment($this->request->get['article_id'], $post_data);

				if ($this->config->get($this->_moduleSysName . '_comment_auto_approval')) {
					$json['success'] = $this->language->get('text_success');
				} else {
					$json['success'] = $this->language->get('text_success_approval');
				}
			}
		}

		$this->response->setOutput(json_encode($json));
	}

}
