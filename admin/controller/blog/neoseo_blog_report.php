<?php

require_once(DIR_SYSTEM . '/engine/neoseo_controller.php');

class ControllerBlogNeoSeoBlogReport extends NeoSeoController
{

	private $error = array();

	public function __construct($registry)
	{
		parent::__construct($registry);
		$this->_moduleSysName = 'neoseo_blog';
				$this->_modulePostfix = "_report";
		$this->_logFile = $this->_moduleSysName . '.log';
		$this->debug = $this->config->get($this->_moduleSysName . '_status') == 1;
	}

	public function index()
	{

		$this->language->load($this->_route . '/' . $this->_moduleSysName());

		$this->document->setTitle($this->language->get('heading_title_raw'));

		$this->load->model($this->_route . '/' . $this->_moduleSysName . '_article');

		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'bv.view';
		}

		if (isset($this->request->get['order'])) {
			$order = $this->request->get['order'];
		} else {
			$order = 'DESC';
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

		$filter_data = array(
			'filter_viewed' => true,
			'sort' => $sort,
			'order' => $order,
			'start' => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit' => $this->config->get('config_limit_admin')
		);

		$total = $this->{"model_" . $this->_route . "_" . $this->_moduleSysName . '_article'}->getTotalArticle($filter_data);

		$views_total = $this->{"model_" . $this->_route . "_" . $this->_moduleSysName . '_article'}->getTotalViews();

		$data['blog_views'] = array();

		$results = $this->{"model_" . $this->_route . "_" . $this->_moduleSysName . '_article'}->getArticles($filter_data);

		foreach ($results as $result) {

			if ($result['viewed']) {
				$percent = round($result['viewed'] / $views_total * 100, 2);
			} else {
				$percent = 0;
			}

			$data['blog_views'][] = array(
				'article_name' => $result['name'],
				'author_name' => $result['author_name'],
				'viewed' => $result['viewed'],
				'percent' => $percent . '%'
			);
		}

		$data['user_token'] = $this->session->data['user_token'];

		$url = '';

		if ($order == 'ASC') {
			$url .= '&order=DESC';
		} else {
			$url .= '&order=ASC';
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['sort_article_name'] = $this->url->link($this->_route . '/' . $this->_moduleSysName(), 'user_token=' . $this->session->data['user_token'] . '&sort=bad.name' . $url, 'SSL');
		$data['sort_author_name'] = $this->url->link($this->_route . '/' . $this->_moduleSysName(), 'user_token=' . $this->session->data['user_token'] . '&sort=bau.name' . $url, 'SSL');
		$data['sort_view'] = $this->url->link($this->_route . '/' . $this->_moduleSysName(), 'user_token=' . $this->session->data['user_token'] . '&sort=ba.viewed' . $url, 'SSL');

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		$pagination = new Pagination();
		$pagination->total = $total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_limit_admin');
		$pagination->text = $this->language->get('text_pagination');
		$pagination->url = $this->url->link($this->_route . '/' . $this->_moduleSysName(), 'user_token=' . $this->session->data['user_token'] . '&page={page}', 'SSL');

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($total - $this->config->get('config_limit_admin'))) ? $total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $total, ceil($total / $this->config->get('config_limit_admin')));

		$data['sort'] = $sort;
		$data['order'] = $order;

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view($this->_route . '/' . $this->_moduleSysName(), $data));
	}

}
