<?php

require_once( DIR_SYSTEM . "/engine/neoseo_controller.php");

class ControllerExtensionModuleNeoSeoBlogArticle extends NeoSeoController
{

	public function __construct($registry)
	{
		parent::__construct($registry);
		$this->_moduleSysName = 'neoseo_blog';
		$this->_modulePostfix = "_article";
		$this->_logFile = $this->_moduleSysName . ".log";
		$this->debug = $this->config->get($this->_moduleSysName . "_debug") == 1;
	}

	public function index($setting)
	{
		static $module = 1;

		$data = $this->load->language('extension/' . 'module' . '/' . $this->_moduleSysName());

		$this->load->model('blog' . '/' . $this->_moduleSysName());
		$this->load->model('blog' . '/' . $this->_moduleSysName . '_category');
		$this->load->model('tool/image');

		$data['article_id'] = '';
		if (isset($this->request->get['article_id'])) {
			$data['article_id'] = $this->request->get['article_id'];
		}
		$data['blog_category_id'] = '';
		if (isset($this->request->get['blog_category_id'])) {
			$data['blog_category_id'] = $this->request->get['blog_category_id'];
		}

		if ($setting['root_category_id'] && $data['blog_category_id']) {
			$parents = $this->{"model_" . 'blog' . "_" . $this->_moduleSysName . '_category'}->getParentIds($data['blog_category_id']);
			if ($setting['root_category_id'] != $data['blog_category_id'] && !in_array($setting['root_category_id'], $parents)) {
				return '';
			}
		}

		$data['articles'] = array();
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

		if (isset($this->request->get['route']) && $this->request->get['route']) {
			$route = str_replace('/', '_', $this->request->get['route']);
		} else {
			$route = 'common_home';
		}

		$cache_key = $this->_moduleSysName() . '_' . $route . '_' . $module . '_' . $this->config->get('config_language_id');

		$data['articles'] = $this->cache->get($cache_key);
		if (!$data['articles']) {

			if ($setting['type'] == 'selected') {
				$results = array();
				if (isset($setting['selected_articles'])) {
					foreach ($setting['selected_articles'] as $article) {
						$article = $this->{"model_" . 'blog' . "_" . $this->_moduleSysName()}->getArticle($article['article_id']);
						if ($article) {
							$results[] = $article;
						}
					}
				}
			} elseif ($setting['type'] == 'featured' && isset($this->request->get['product_id'])) {
				$results = array();
				$featuredArticles = $this->{"model_" . 'blog' . "_" . $this->_moduleSysName()}->getFeaturedArticles($this->request->get['product_id']);
				if (count($featuredArticles) > 0) {
					foreach ($featuredArticles as $article_id) {
						$article = $this->{"model_" . 'blog' . "_" . $this->_moduleSysName()}->getArticle($article_id);
						if ($article) {
							$results[] = $article;
						}
					}
				}
			} else {
				$filter_data = array(
					'start' => 0,
					'limit' => $setting['limit']
				);

				if (!empty($setting['blog_category_id'])) {
					$filter_data['filter_category_id'] = $setting['blog_category_id'];
				}

				if ($setting['type'] == 'popular') {
					$filter_data['sort'] = 'ba.viewed';
					$filter_data['order'] = 'DESC';
				} else if ($setting['type'] == 'latest') {
					$filter_data['sort'] = 'ba.date_added';
					$filter_data['order'] = 'DESC';
				}

				$results = $this->{"model_" . 'blog' . "_" . $this->_moduleSysName()}->getArticles($filter_data);
			}

			foreach ($results as $result) {
				if ($result['image']) {
					$image = $this->model_tool_image->resize($result['image'], $setting['width'], $setting['height']);
				} else {
					$image = $this->model_tool_image->resize('placeholder.png', $setting['width'], $setting['height']);
				}

				if (!empty($result['teaser']) && strlen(trim($result['teaser'])) > 0) {
					$description = strip_tags(html_entity_decode($result['teaser']));
				} else {
					$description = strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8'));
					if (strlen($description) > 300) {
						$description = utf8_substr($description, 0, 300) . '..';
					}
				}

				if ($result['total_comments'] == 1) {
					$total_comments = $result['total_comments'];
				} elseif ($result['total_comments'] > 1) {
					$total_comments = $result['total_comments'];
				} else {
					$total_comments = 0;
				}

				$category = $this->{"model_" . 'blog' . "_" . $this->_moduleSysName()}->getMainCategory($result['article_id']);
				if ($category) {
					$category['href'] = $this->url->link('blog' . '/' . $this->_moduleSysName(), 'blog_category_id=' . $category['category_id'], 'SSL');
					$url = $this->url->link('blog' . '/' . $this->_moduleSysName(), 'blog_category_id=' . $category['category_id'] . '&article_id=' . $result['article_id']);
				} else {
					$url = $this->url->link('blog' . '/' . $this->_moduleSysName(), 'article_id=' . $result['article_id']);
				}

				$author = array(
					'author_id' => $result['author_id'],
					'name' => $result['author_name'],
					'href' => $this->url->link('blog' . '/' . $this->_moduleSysName . '_author', 'author_id=' . $result['author_id'], 'SSL'),
				);
				$rating = $this->{"model_" . 'blog' . "_" . $this->_moduleSysName()}->getRating($result['article_id']);

				$data['articles'][] = array(
					'article_id' => $result['article_id'],
					'thumb' => $image,
					'name' => $result['name'],
					'description' => $description,
					'date_modified' => $result['article_date_modified'],
					'rating' => $rating,
					'total_comments' => $total_comments,
					'category' => $category,
					'author' => $author,
					'viewed' => $result['viewed'],
					'href' => $url
				);
			}
			if ($data['articles']) {
				$this->cache->set($cache_key, $data['articles']);
			}
		}


		$data['module'] = $module++;

		if (empty($data['articles']))
			return '';

		$template = $setting['template'];

		return $this->load->view('extension/module/' . $template, $data);
	}

}
