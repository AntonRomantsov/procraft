<?php

require_once(DIR_SYSTEM . '/engine/neoseo_controller.php');

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
		$data = $this->load->language($this->_route . '/' . $this->_moduleSysName());

		$this->load->model($this->_route . '/' . $this->_moduleSysName());
		$this->load->model($this->_route . '/' . $this->_moduleSysName . '_author');
		$this->load->model($this->_route . '/' . $this->_moduleSysName . '_category');
		$this->load->model($this->_route . '/' . $this->_moduleSysName . '_comment');

		$this->load->model('tool/image');

		if (!file_exists(DIR_TEMPLATE . $this->config->get('config_theme') . '/stylesheet/' . $this->_moduleSysName() . '.scss')) {
			if (file_exists(DIR_TEMPLATE . $this->config->get('config_theme') . '/stylesheet/' . $this->_moduleSysName . '.css')) {
				$this->document->addStyle('catalog/view/theme/' . $this->config->get('config_theme') . '/stylesheet/' . $this->_moduleSysName . '.css');
			} else {
				$this->document->addStyle('catalog/view/theme/default/stylesheet/' . $this->_moduleSysName . '.css');
			}
		}

		// jsSocials
		$this->document->addStyle('catalog/view/theme/' . $this->config->get('config_theme') . '/stylesheet/jssocials.css');
		$this->document->addScript('catalog/view/theme/' . $this->config->get('config_theme') . '/javascript/jssocials.js');
		// ---------

		$config_language = $this->config->get('blog_language');
		if (!empty($config_language[$this->config->get('config_language_id')])) {
			$config_language = $config_language[$this->config->get('config_language_id')];
		} else {
			$config_language = array();
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/home')
		);

		if (isset($this->request->get['article_id'])) {
			$article_id = (int) $this->request->get['article_id'];
		} else {
			$article_id = 0;
		}

		$url = '';

		if (isset($this->request->get['blog_search'])) {
			$url .= '&blog_search=' . $this->request->get['blog_search'];
		}

		if (isset($this->request->get['blog_category_id'])) {
			$url .= '&blog_category_id=' . $this->request->get['blog_category_id'];
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

		if (isset($this->request->get['limit'])) {
			$url .= '&limit=' . $this->request->get['limit'];
		}
		$data['text_author'] = $this->language->get('text_author');
		$article_info = $this->{"model_" . $this->_route . "_" . $this->_moduleSysName()}->getArticle($article_id);

		if ($article_info) {
			if ($article_info['meta_title']) {
				$this->document->setTitle($article_info['meta_title']);
			} else {
				$this->document->setTitle($article_info['name']);
			}

			$this->document->setDescription($article_info['meta_description']);
			$this->document->setKeywords($article_info['meta_keyword']);

			$this->document->addScript('catalog/view/javascript/jquery/magnific/jquery.magnific-popup.min.js');
			$this->document->addStyle('catalog/view/javascript/jquery/magnific/magnific-popup.css');

			$data['heading_title'] = $article_info['name'];

			$data['article_id'] = (int) $article_id;

			$data['description'] = html_entity_decode($article_info['description'], ENT_QUOTES, 'UTF-8');
			$data['date_modified'] = $article_info['date_modified'];
			$data['href'] = $this->url->link($this->_route . '/' . $this->_moduleSysName(), $url . '&article_id=' . $article_id);

			$width = $this->config->get($this->_moduleSysName . '_image_article_block_width');
			$height = $this->config->get($this->_moduleSysName . '_image_article_block_height');

			$results = $this->{"model_" . $this->_route . "_" . $this->_moduleSysName()}->getRelatedArticles($article_id);
			$data['related_articles'] = array();
			foreach ($results as $result) {

				if ($result['image']) {
					$image = $this->model_tool_image->resize($result['image'], $width, $height);
				} else {
					$image = $this->model_tool_image->resize('placeholder.png', $width, $height);
				}
				$rating = $this->{"model_" . $this->_route . "_" . $this->_moduleSysName()}->getRating($result['article_id']);
				if (!empty($result['teaser'])) {
					$description = strip_tags(html_entity_decode($result['teaser']));
				} else {
					$description = strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8'));
					if (strlen($description) > 300) {
						$description = utf8_substr($description, 0, 300) . '..';
					}
				}

				if ($result['total_comments'] == 1) {
					$total_comments = $result['total_comments'] . $this->language->get('text_comment');
				} elseif ($result['total_comments'] > 1) {
					$total_comments = $result['total_comments'] . $this->language->get('text_comments');
				} else {
					$total_comments = '';
				}

				$category = $this->{"model_" . $this->_route . "_" . $this->_moduleSysName()}->getMainCategory($result['article_id']);
				if ($category) {
					$category['href'] = $this->url->link($this->_route . '/' . $this->_moduleSysName . '_category', 'blog_category_id=' . $category['category_id'], 'SSL');
				}

				$author = array(
					'author_id' => $result['author_id'],
					'name' => $result['author_name'],
					'href' => $this->url->link($this->_route . '/' . $this->_moduleSysName . '_author', 'author_id=' . $result['author_id'], 'SSL'),
				);

				$viewed = $result['viewed'] ? $result['viewed'] : 0;

				$data['related_articles'][] = array(
					'article_id' => $result['article_id'],
					'thumb' => $image,
					'name' => $result['name'],
					'rating' => $rating,
					'description' => $description,
					'date_modified' => $result['date_modified'],
					'viewed' => sprintf($this->language->get('text_viewed'), $viewed),
					'total_comments' => $total_comments,
					'category' => $category,
					'author' => $author,
					'href' => $this->url->link($this->_route . '/' . $this->_moduleSysName(), $url . '&article_id=' . $result['article_id'])
				);
			}

			if ($article_info['image']) {
				$data['thumb'] = $this->model_tool_image->resize($article_info['image'], $width, $height);
				$data['image'] = HTTP_SERVER . 'image/' . $article_info['image'];
			} else {
				$data['thumb'] = '';
				$data['image'] = '';
			}

			if (!empty($config_language['gallery_heading'])) {
				$data['gallery_heading'] = $config_language['gallery_heading'];
			}


			if ($article_info['total_comments'] == 1) {
				$data['total_comments'] = $article_info['total_comments'] . $this->language->get('text_comment');
			} elseif ($article_info['total_comments'] > 1) {
				$data['total_comments'] = $article_info['total_comments'] . $this->language->get('text_comments');
			} else {
				$data['total_comments'] = '';
			}

			$data['category'] = $this->{"model_" . $this->_route . "_" . $this->_moduleSysName()}->getMainCategory($article_info['article_id']);
			if ($data['category']) {

				$parentIds = $this->{"model_" . $this->_route . "_" . $this->_moduleSysName . "_category"}->getParentIds($data['category']['category_id']);
				foreach ($parentIds as $parent_id) {
					$parent = $this->{"model_" . $this->_route . "_" . $this->_moduleSysName . "_category"}->getCategory($parent_id);
					$data['breadcrumbs'][] = array(
						'text' => $parent['name'],
						'href' => $this->url->link($this->_route . '/' . $this->_moduleSysName . '_category', $url . '&blog_category_id=' . $parent['category_id'])
					);
				}
				$data['breadcrumbs'][] = array(
					'text' => $data['category']['name'],
					'href' => $this->url->link($this->_route . '/' . $this->_moduleSysName . '_category', $url . '&blog_category_id=' . $data['category']['category_id'])
				);

				$data['category']['href'] = $this->url->link($this->_route . '/' . $this->_moduleSysName . '_category', $url . '&blog_category_id=' . $data['category']['category_id'], 'SSL');
			}

			if (isset($data['category']['category_id'])) {
				$category_info = $this->{"model_" . $this->_route . "_" . $this->_moduleSysName . "_category"}->getCategory($data['category']['category_id']);
				$filter_data = array(
					'filter_category_id' => $data['category']['category_id'],
					'limit' => 30,
					'start' => 0,
				);
				$category_articles = $this->{"model_" . $this->_route . "_" . $this->_moduleSysName()}->getArticles($filter_data);

				foreach ($category_articles as $article) {
					$data['category_articles'][] = array(
						'name' => $article['name'],
						'href' => $this->url->link($this->_route . '/' . $this->_moduleSysName(), 'article_id=' . $article['article_id'])
					);
				}

				$data['more_category_articles'] = $this->url->link($this->_route . '/' . $this->_moduleSysName . '_category', $url . '&blog_category_id=' . $data['category']['category_id']);
			} else {
				$data['more_category_articles'] = '';
				$data['category_articles'] = array();
			}

			$data['breadcrumbs'][] = array(
				'text' => $article_info['name'],
				'href' => $this->url->link($this->_route . '/' . $this->_moduleSysName(), 'article_id=' . $article_id, 'SSL'),
			);

			$data['author'] = array(
				'author_id' => $article_info['author_id'],
				'name' => $article_info['author_name'],
				'href' => $this->url->link($this->_route . '/' . $this->_moduleSysName . '_author', 'author_id=' . $article_info['author_id'], 'SSL'),
			);

			$viewed = $article_info['viewed'] ? $article_info['viewed'] : 0;

			$data['viewed'] = sprintf($this->language->get('text_viewed'), $viewed);


			if ($article_info['allow_comment']) {
				$data['comments_block'] = $this->getCommentsBlock($article_id);
			}

			$data['href_login'] = $this->url->link('account/login');

			$this->{"model_" . $this->_route . "_" . $this->_moduleSysName()}->updateViewed($article_id);

			$data['column_left'] = $this->load->controller('common/column_left');
			$data['column_right'] = $this->load->controller('common/column_right');
			$data['content_top'] = $this->load->controller('common/content_top');
			$data['content_bottom'] = $this->load->controller('common/content_bottom');
			$data['footer'] = $this->load->controller('common/footer');
			$data['header'] = $this->load->controller('common/header');

			$this->response->setOutput($this->load->view($this->_route . '/' . $this->_moduleSysName(), $data));
		} else {
			$url = '';

			if (isset($this->request->get['author_id'])) {
				$url .= '&author_id=' . $this->request->get['author_id'];
			}

			if (isset($this->request->get['blog_search'])) {
				$url .= '&blog_search=' . $this->request->get['blog_search'];
			}

			if (isset($this->request->get['blog_category_id'])) {
				$url .= '&blog_category_id=' . $this->request->get['blog_category_id'];
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

			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}

			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('text_error'),
				'href' => $this->url->link($this->_route . '/' . $this->_moduleSysName(), $url . '&article_id=' . $article_id)
			);

			$text_error = $this->language->get('text_article_error');

			$this->document->setTitle($text_error);

			$data['heading_title'] = $text_error;

			$data['text_error'] = $text_error;

			$data['button_continue'] = $this->language->get('button_continue');

			$data['continue'] = $this->url->link('common/home');

			$this->response->addHeader($this->request->server['SERVER_PROTOCOL'] . ' 404 Not Found');

			$data['column_left'] = $this->load->controller('common/column_left');
			$data['column_right'] = $this->load->controller('common/column_right');
			$data['content_top'] = $this->load->controller('common/content_top');
			$data['content_bottom'] = $this->load->controller('common/content_bottom');
			$data['footer'] = $this->load->controller('common/footer');
			$data['header'] = $this->load->controller('common/header');

			$this->response->setOutput($this->load->view('error/not_found', $data));
		}
	}

	public function getCommentsBlock($article_id)
	{

		$data = $this->load->language($this->_route . '/' . $this->_moduleSysName . '_comment');

		$data['article_id'] = $article_id;
		$data['reviews'] = $this->load->controller($this->_route . '/' . $this->_moduleSysName . '_comment/page');

		$config_language = $this->config->get('blog_language');
		if (!empty($config_language[$this->config->get('config_language_id')]['comments_block_heading'])) {
			$data['heading_title'] = $config_language[$this->config->get('config_language_id')]['comments_block_heading'];
		}

		// Captcha
		if ($this->config->get($this->config->get('config_captcha') . '_status')) {
			$data['captcha'] = $this->load->controller('captcha/' . $this->config->get('config_captcha'), $this->error);
		} else {
			$data['captcha'] = '';
		}


		return $this->load->view($this->_route . '/' . $this->_moduleSysName . '_comment_form', $data);
	}

}
