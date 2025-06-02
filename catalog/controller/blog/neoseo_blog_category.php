<?php

require_once(DIR_SYSTEM . '/engine/neoseo_controller.php');

class ControllerBlogNeoSeoBlogCategory extends NeoSeoController
{

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
		$data = $this->load->language($this->_route . '/' . $this->_moduleSysName());

		$this->load->model($this->_route . '/' . $this->_moduleSysName . '_article');
		$this->load->model($this->_route . '/' . $this->_moduleSysName . '_author');
		$this->load->model($this->_route . '/' . $this->_moduleSysName());

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
		// Readmore.js
		$this->document->addScript('catalog/view/theme/' . $this->config->get('config_theme') . '/javascript/readmore.js');
		// -----------

		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'bc.sort_order';
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

		if (isset($this->request->get['limit'])) {
			$limit = (int) $this->request->get['limit'];
		} else {
			$limit = $this->config->get('blog_product_limit');
		}
		if (!$limit) {
			$limit = 15;
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/home')
		);

		if (isset($this->request->get['blog_category_id'])) {
			$category_id = $this->request->get['blog_category_id'];
		} else {
			$category_id = 0;
		}

		$category_info = $this->{"model_" . $this->_route . "_" . $this->_moduleSysName()}->getCategory($category_id);

		if ($category_info) {

			$parent_ids = $this->{"model_" . $this->_route . "_" . $this->_moduleSysName()}->getParentIds($category_id);

			foreach ($parent_ids as $parent_id) {
				$parent = $this->{"model_" . $this->_route . "_" . $this->_moduleSysName()}->getCategory($parent_id);
				$data['breadcrumbs'][] = array(
					'text' => $parent['name'],
					'href' => $this->url->link($this->_route . '/' . $this->_moduleSysName(), 'blog_category_id=' . $parent['category_id'])
				);
			}

			$data['breadcrumbs'][] = array(
				'text' => $category_info['name'],
				'href' => $this->url->link($this->_route . '/' . $this->_moduleSysName(), 'blog_category_id=' . $category_id, 'SSL'),
			);

			if ($category_info['meta_title']) {
				if ($page > 1) {
					$meta_title = sprintf($this->language->get("blog_category_meta_title"), $category_info['meta_title'], $page);
					$this->document->setTitle($meta_title);
				} else {
					$this->document->setTitle($category_info['meta_title']);
				}
			} else {
				if ($page > 1) {
					$meta_title = sprintf($this->language->get("blog_category_meta_title"), $category_info['name'], $page);
					$this->document->setTitle($meta_title);
				} else {
					$this->document->setTitle($category_info['name']);
				}
			}

			if ($page > 1 && trim($category_info['meta_description'])) {
				$meta_description = sprintf($this->language->get("blog_category_meta_description"), $category_info['meta_description'], $page);
				$this->document->setDescription($meta_description);
			} else {
				$this->document->setDescription($category_info['meta_description']);
			}

			if ($page > 1 && trim($category_info['meta_keyword'])) {
				$meta_keywords = sprintf($this->language->get("blog_category_meta_keywords"), $category_info['meta_keyword'], $page);
				$this->document->setKeywords($meta_keywords);
			} else {
				$this->document->setKeywords($category_info['meta_keyword']);
			}

			if ($page > 1) {
				$data['heading_title'] = sprintf($this->language->get("blog_category_meta_h1"), $category_info['name'], $page);
			} else {
				$data['heading_title'] = $category_info['name'];
			}

			$width = $this->config->get($this->_moduleSysName . '_image_category_block_width');
			$height = $this->config->get($this->_moduleSysName . '_image_category_block_height');

			if ($category_info['image'] && file_exists(DIR_IMAGE . $category_info['image'])) {
				$data['thumb'] = $this->model_tool_image->resize($category_info['image'], $width, $height);
			} else {
				$data['thumb'] = '';
			}

			if ($page > 1 && trim($data['description'])) {
				$description = sprintf($this->language->get("blog_category_description"), $data['description'], $page);
				$data['description'] = $description;
			} else {
				$data['description'] = html_entity_decode($category_info['description'], ENT_QUOTES, 'UTF-8');
			}

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}

			$data['categories'] = array();

			$results = $this->{"model_" . $this->_route . "_" . $this->_moduleSysName()}->getCategories($category_id);

			foreach ($results as $result) {
				$data['categories'][] = array(
					'name' => $result['name'],
					'href' => $this->url->link($this->_route . '/' . $this->_moduleSysName(), $url . '&blog_category_id=' . $result['category_id'])
				);
			}

			if (isset($this->request->get['blog_category_id'])) {
				$url .= '&blog_category_id=' . $this->request->get['blog_category_id'];
			}

			$data['articles'] = array();

			$filter_data = array(
				'filter_category_id' => $category_id,
				'sort' => $sort,
				'order' => $order,
				'start' => ($page - 1) * $limit,
				'limit' => $limit
			);
			$data['desc_position'] = $this->config->get('neoseo_unistor_cat_desc_position');
			$article_total = $this->{"model_" . $this->_route . "_" . $this->_moduleSysName . "_article"}->getTotalArticles($filter_data);

			$results = $this->{"model_" . $this->_route . "_" . $this->_moduleSysName . "_article"}->getArticles($filter_data);
			foreach ($results as $result) {
				$width = $this->config->get($this->_moduleSysName . '_image_article_list_width');
				if (!$width) {
					$width = 200;
				}
				$height = $this->config->get($this->_moduleSysName . '_image_article_list_height');
				if (!$height) {
					$height = 200;
				}

				if ($result['image'] && file_exists(DIR_IMAGE . $result['image'])) {
					$image = $this->model_tool_image->resize($result['image'], $width, $height);
				} else {
					$image = $this->model_tool_image->resize('placeholder.png', $width, $height);
				}

				if (!empty($result['teaser'])) {
					$description = strip_tags(html_entity_decode($result['teaser']));
				} else {
					$description = strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8'));
					if (strlen($description) > 300) {
						$description = utf8_substr($description, 0, 300) . '..';
					}
				}

				if ($result['total_comments'] > 0) {
					$total_comments = $result['total_comments'];
				} else {
					$total_comments = '';
				}

				$category = $this->{"model_" . $this->_route . "_" . $this->_moduleSysName . "_article"}->getMainCategory($result['article_id']);
				if ($category) {
					$category['href'] = $this->url->link($this->_route . '/' . $this->_moduleSysName(), 'blog_category_id=' . $category['category_id'], 'SSL');
				}

				$author = array(
					'author_id' => $result['author_id'],
					'name' => $result['author_name'],
					'href' => $this->url->link($this->_route . '/' . $this->_moduleSysName . '_author', 'author_id=' . $result['author_id'], 'SSL'),
				);

				$viewed = $result['viewed'] ? $result['viewed'] : 0;
				$rating = $this->{"model_" . $this->_route . "_" . $this->_moduleSysName . "_article"}->getRating($result['article_id']);

				$data['articles'][] = array(
					'article_id' => $result['article_id'],
					'thumb' => $image,
					'name' => $result['name'],
					'description' => $description,
					'viewed' => $viewed,
					'date_modified' => $result['date_modified'],
					'date_add' => $result['date_added'],
					'total_comments' => $total_comments,
					'rating' => $rating,
					'category' => $category,
					'author' => $author,
					'href' => $this->url->link($this->_route . '/' . $this->_moduleSysName . '_article', $url . '&article_id=' . $result['article_id'])
				);
			}

			$url = '';

			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}

			$data['sorts'] = array();

			$data['sorts'][] = array(
				'text' => $this->language->get('text_date_modified_desc'),
				'value' => 'ba.date_modified-DESC',
				'href' => $this->url->link($this->_route . '/' . $this->_moduleSysName(), $url . '&blog_category_id=' . $category_id . '&sort=ba.date_modified&order=DESC')
			);

			$data['sorts'][] = array(
				'text' => $this->language->get('text_name_asc'),
				'value' => 'bad.name-ASC',
				'href' => $this->url->link($this->_route . '/' . $this->_moduleSysName(), $url . '&blog_category_id=' . $category_id . '&sort=bad.name&order=ASC')
			);

			$data['sorts'][] = array(
				'text' => $this->language->get('text_name_desc'),
				'value' => 'bad.name-DESC',
				'href' => $this->url->link($this->_route . '/' . $this->_moduleSysName(), $url . '&blog_category_id=' . $category_id . '&sort=bad.name&order=DESC')
			);

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			$data['limits'] = array();

			$limits = array(10, 25, 50);

			foreach ($limits as $value) {
				$data['limits'][] = array(
					'text' => $value,
					'value' => $value,
					'href' => $this->url->link($this->_route . '/' . $this->_moduleSysName(), $url . '&blog_category_id=' . $category_id . '&limit=' . $value)
				);
			}

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}

			$pagination = new Pagination();
			$pagination->total = $article_total;
			$pagination->page = $page;
			$pagination->limit = $limit;
			$pagination->url = $this->url->link($this->_route . '/' . $this->_moduleSysName(), $url . '&blog_category_id=' . $category_id . '&page={page}');

			$data['pagination'] = $pagination->render();

			$data['results'] = sprintf($this->language->get('text_pagination'), ($article_total) ? (($page - 1) * $limit) + 1 : 0, ((($page - 1) * $limit) > ($article_total - $limit)) ? $article_total : ((($page - 1) * $limit) + $limit), $article_total, ceil($article_total / $limit));

			// http://googlewebmastercentral.blogspot.com/2011/09/pagination-with-relnext-and-relprev.html
			if ($page == 1) {
				$this->document->addLink($this->url->link($this->_route . '/' . $this->_moduleSysName(), 'blog_category_id=' . $category_id, 'SSL'), 'canonical');
			} elseif ($page == 2) {
				$this->document->addLink($this->url->link($this->_route . '/' . $this->_moduleSysName(), 'blog_category_id=' . $category_id, 'SSL'), 'prev');
			} else {
				$this->document->addLink($this->url->link($this->_route . '/' . $this->_moduleSysName(), 'blog_category_id=' . $category_id . '&page=' . ($page - 1), 'SSL'), 'prev');
			}

			if ($limit && ceil($article_total / $limit) > $page) {
				$this->document->addLink($this->url->link($this->_route . '/' . $this->_moduleSysName(), 'blog_category_id=' . $category_id . '&page=' . ($page + 1), 'SSL'), 'next');
			}

			$data['sort'] = $sort;
			$data['order'] = $order;
			$data['limit'] = $limit;

			$data['column_left'] = $this->load->controller('common/column_left');
			$data['column_right'] = $this->load->controller('common/column_right');
			$data['content_top'] = $this->load->controller('common/content_top');
			$data['content_bottom'] = $this->load->controller('common/content_bottom');
			$data['footer'] = $this->load->controller('common/footer');
			$data['header'] = $this->load->controller('common/header');

			$this->response->setOutput($this->load->view($this->_route . '/' . $this->_moduleSysName(), $data));
		} else {
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

			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}

			$text_error = $this->language->get('text_category_error');
			$data['text_author'] = $this->language->get('text_author');
			$data['show_more_before'] = $this->language->get('show_more_before');
			$data['show_more_after'] = $this->language->get('show_more_after');

			$this->document->setTitle($text_error);

			$data['heading_title'] = $text_error;

			$data['text_error'] = $text_error;

			$data['button_continue'] = $this->language->get('button_continue');

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

}
