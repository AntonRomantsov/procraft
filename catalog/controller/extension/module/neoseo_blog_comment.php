<?php

require_once(DIR_SYSTEM . '/engine/neoseo_controller.php');

class ControllerExtensionModuleNeoSeoBlogComment extends NeoSeoController
{

	public function __construct($registry)
	{
		parent::__construct($registry);
		$this->_moduleSysName = 'neoseo_blog';
				$this->_modulePostfix = "_comment";
		$this->_logFile = $this->_moduleSysName . '.log';
		$this->debug = $this->config->get($this->_moduleSysName . '_status') == 1;
	}

	public function index($setting)
	{

		$data = $this->load->language('extension/' . 'module' . '/' . $this->_moduleSysName());

		$this->load->model('blog/' . $this->_moduleSysName . '_article');
		$this->load->model('blog/' . $this->_moduleSysName());
		$this->load->model('blog/' . $this->_moduleSysName . '_category');
		$this->load->model('tool/image');

		$data['articles'] = array();

		$data['blog_category_id'] = '';
		if (isset($this->request->get['blog_category_id'])) {
			$data['blog_category_id'] = $this->request->get['blog_category_id'];
		}
		if ($setting['root_category_id']) {
			$parents = $this->{"model_blog_" . $this->_moduleSysName . '_category'}->getParentIds($data['blog_category_id']);
			if ($setting['root_category_id'] != $data['blog_category_id'] && !in_array($setting['root_category_id'], $parents)) {
				return '';
			}
		}
		if (!file_exists(DIR_TEMPLATE . $this->config->get('config_theme') . '/stylesheet/' . $this->_moduleSysName() . '.scss')) {
			if (file_exists(DIR_TEMPLATE . $this->config->get('config_theme') . '/stylesheet/' . $this->_moduleSysName . '.css')) {
				$this->document->addStyle('catalog/view/theme/' . $this->config->get('config_theme') . '/stylesheet/' . $this->_moduleSysName . '.css');
			} else {
				$this->document->addStyle('catalog/view/theme/default/stylesheet/' . $this->_moduleSysName . '.css');
			}
		}

		if (empty($setting['limit'])) {
			$setting['limit'] = 4;
		}

		if (!empty($setting['title'][$this->config->get('config_language_id')])) {
			$data['heading_title'] = $setting['title'][$this->config->get('config_language_id')];
		} else {
			$data['heading_title'] = '';
		}

		$filter_data = array(
			'start' => 0,
			'limit' => $setting['limit']
		);
		if (isset($setting['blog_category_id'])) {
			$filter_data['filter_category_id'] = $setting['blog_category_id'];
		}


		if (!empty($setting['type'])) {
			if ($setting['type'] == 'popular') {
				$filter_data['sort'] = 'ba.date_added'; // todo: тут какой-то рейтинг надо
				$filter_data['order'] = 'DESC';
			}
			if ($setting['type'] == 'latest') {
				$filter_data['sort'] = 'ba.date_added';
				$filter_data['order'] = 'DESC';
			}
		}

		$results = $this->{"model_blog_" . $this->_moduleSysName() }->getComments($filter_data);
		foreach ($results as $result) {

			$article = $this->{"model_blog_" . $this->_moduleSysName . "_article"}->getArticle($result['article_id']);
			if (!$article)
				continue;

			$description = strip_tags(html_entity_decode($result['comment'], ENT_QUOTES, 'UTF-8'));
			if (strlen($description) > 60) {
				$description = utf8_substr($description, 0, 60) . '..';
			}

			if (isset($article['image'])) {
				$image = $this->model_tool_image->resize($article['image'], $setting['width'], $setting['height']);
			} else {
				$image = $this->model_tool_image->resize('placeholder.png', $setting['width'], $setting['height']);
			}

			$data['comments'][] = array(
				'comment_id' => $result['comment_id'],
				'thumb' => $image,
				'description' => $description,
				'date_modified' => $result['date_modified'],
				'href' => $this->url->link('blog/' . $this->_moduleSysName . '_article', 'article_id=' . $result['article_id'])
			);
		}

		if (empty($data['comments']))
			return '';

		$template = $setting['template'];
		return $this->load->view('extension/module/' . $template, $data);
	}

}
