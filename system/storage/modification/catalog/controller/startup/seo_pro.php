<?php
class ControllerStartupSeoPro extends Controller {
	private $cache_data = null;

	public function __construct($registry) {
		parent::__construct($registry);
		/* Фикс переключения языка с редиректом BEGIN */
		if (isset($this->request->post['code']) && isset($this->request->get['route']) && $this->request->get['route'] == 'common/language/language') {
			//echo "SeoProWork!";
			$this->load->model('localisation/language');
			$this->session->data['language'] = $this->request->post['code'];
			$languages = $this->model_localisation_language->getLanguages();
			if (isset($languages[$this->request->post['code']])) {
				$this->config->set('config_language_id', $languages[$this->request->post['code']]['language_id']);
			}
		}
		/* Фикс переключения языка с редиректом END */
		$this->detectLanguage(); // Детектим язык для тех, кто перешел по сеоУРЛ
		$this->cache_data = $this->cache->get('seo_pro.'.(int)$this->config->get('config_store_id').".".(int)$this->config->get('config_language_id'));
		if (!$this->cache_data) {
			$query = $this->db->query("SELECT LOWER(`keyword`) as 'keyword', `query` FROM " . DB_PREFIX . "seo_url WHERE store_id='".(int)$this->config->get('config_store_id')."' AND language_id = '".(int)$this->config->get('config_language_id')."' ORDER BY seo_url_id");
			$this->cache_data = array();
			foreach ($query->rows as $row) {
				if (isset($this->cache_data['keywords'][$row['keyword']])){
					$this->cache_data['keywords'][$row['query']] = $this->cache_data['keywords'][$row['keyword']];
					continue;
				}
				$this->cache_data['keywords'][$row['keyword']] = $row['query'];
				$this->cache_data['queries'][$row['query']] = $row['keyword'];
			}
			$this->cache->set('seo_pro.'.(int)$this->config->get('config_store_id').".".(int)$this->config->get('config_language_id'), $this->cache_data);
		}
	}

	public function index() {

		if (isset($this->request->get['_route_'])) {
			$current_url = HTTPS_SERVER . substr($this->session->data['language'], -2, 2) . '/' . $this->request->get['_route_'];
			$query = $this->db->query("SELECT url_to FROM " . DB_PREFIX . "url_redirect WHERE url_from = '" . $current_url . "'");
			if ($query->row) {
				$this->response->redirect($query->row['url_to']);
			}
			$current_url = HTTPS_SERVER . $this->request->get['_route_'];
			$query = $this->db->query("SELECT url_to FROM " . DB_PREFIX . "url_redirect WHERE url_from = '" . $current_url . "'");
			if ($query->row) {
				$this->response->redirect($query->row['url_to']);
			}
		}

		// Add rewrite to url class
		if ($this->config->get('config_seo_url')) {
			$this->url->addRewrite($this);

      // OCFilter start
      if ($this->registry->get('ocfilter')) {
        $this->url->addRewrite($this->ocfilter->seo);
      }
      // OCFilter end
      
		} else {
			return;
		}

		// Decode URL
		if (!isset($this->request->get['_route_'])) {
			$this->validate();
		} else {
			$route_ = $route = $this->request->get['_route_'];
			unset($this->request->get['_route_']);
			$parts = explode('/', trim(utf8_strtolower($route), '/'));
			list($last_part) = explode('.', array_pop($parts));
			array_push($parts, $last_part);

			foreach ($parts as $p_id => $p_val){
				if(strpos($p_val,'page-') === 0){
					$page = str_replace('page-','',$p_val);
					unset($parts[$p_id]);
					$this->request->get['page'] = intval($page);
				}
			}

			if (isset($this->request->get['page'])) {
				if((int)$this->request->get['page'] < 1) {
					unset($this->request->get['page']);
				}
			}

			$rows = array();
			foreach ($parts as $keyword) {
				if (isset($this->cache_data['keywords'][$keyword])) {
					$rows[] = array('keyword' => $keyword, 'query' => $this->cache_data['keywords'][$keyword]);
				}
			}

			if (isset($this->cache_data['keywords'][$route])){
				$keyword = $route;
				$parts = array($keyword);
				$rows = array(array('keyword' => $keyword, 'query' => $this->cache_data['keywords'][$keyword]));
			}

			if (count($rows) == sizeof($parts)) {
				$queries = array();
				foreach ($rows as $row) {
					$queries[utf8_strtolower($row['keyword'])] = $row['query'];
				}

				reset($parts);
				foreach ($parts as $part) {
					if(!isset($queries[$part])) return false;
					$url = explode('=', $queries[$part], 2);

					if ($url[0] == 'category_id') {
						if (!isset($this->request->get['path'])) {
							$this->request->get['path'] = $url[1];
						} else {
							$this->request->get['path'] .= '_' . $url[1];
						}
					} elseif (count($url) > 1) {
						$this->request->get[$url[0]] = $url[1];
					}
				}
			} else {
				$this->request->get['route'] = 'error/not_found';
			}


			/* NeoSeo Blog - begin */
			if (isset($this->request->get['article_id'])) {
				$this->request->get['route'] = 'blog/neoseo_blog_article';
			} elseif (isset($this->request->get['blog_category_id'])) {
				$this->request->get['route'] = 'blog/neoseo_blog_category';
			} else if (isset($this->request->get['author_id'])) {
				$this->request->get['route'] = 'blog/neoseo_blog_author';
			} else
			/* NeoSeo Blog - end */
			
			if (isset($this->request->get['product_id'])) {
				$this->request->get['route'] = 'product/product';
				if (!isset($this->request->get['path'])) {
					$path = $this->getPathByProduct($this->request->get['product_id']);
					if ($path) $this->request->get['path'] = $path;
				}
			} elseif (isset($this->request->get['tab'])) {
				$this->request->get['route'] = 'product/product';	
			} elseif (isset($this->request->get['ocf'])) {
				$this->request->get['route'] = 'product/category';	
			} elseif (isset($this->request->get['path'])) {
				$this->request->get['route'] = 'product/category';
			} elseif (isset($this->request->get['manufacturer_id'])) {
				$this->request->get['route'] = 'product/manufacturer/info';
			} elseif (isset($this->request->get['information_id'])) {
				$this->request->get['route'] = 'information/information';
			} elseif(isset($this->cache_data['queries'][$route_])) {
					header($this->request->server['SERVER_PROTOCOL'] . ' 301 Moved Permanently');
					$this->response->redirect($this->cache_data['queries'][$route_]);
			} else {
				if (isset($queries[$parts[0]])) {
					$this->request->get['route'] = $queries[$parts[0]];
				}
			}

			$this->validate();

			if (isset($this->request->get['route'])) {
				return new Action($this->request->get['route']);
			}
		}
	}

	public function rewrite($link) {
		if (!$this->config->get('config_seo_url')) return $link;

		$seo_url = '';

		$component = parse_url(str_replace('&amp;', '&', $link));

		$data = array();
		parse_str($component['query'], $data);

		$route = $data['route'];
		unset($data['route']);

		if(isset($data['path']) && isset($data['ocf']) && $route != 'product/product'){
			$new_data['path'] = $data['path'];
			unset($data['path']);
			$new_data['ocf'] = $data['ocf'];
			unset($data['ocf']);
			array_unshift($data, $new_data);
			$data = $new_data;
		}

		switch ($route) {

			/* NeoSeo Blog - begin */
			case 'blog/neoseo_blog_article':
				if (isset($data['article_id'])) {
					if ($this->config->get('config_seo_url_include_path')) {
						$this->load->model('blog/neoseo_blog_article');
						$article_category = $this->model_blog_neoseo_blog_article->getMainCategory($data['article_id']);
						if ($article_category) {
							$data = array_merge(array('blog_category_id' => $article_category['category_id']), $data);
						}
					}
				}
				break;
			case 'blog/neoseo_blog_category':
				if (isset($data['blog_category_id'])) {
						$this->load->model('blog/neoseo_blog_category');
						$blog_parent_categories = $this->model_blog_neoseo_blog_category->getParentIds($data['blog_category_id']);
						if ($blog_parent_categories) {
							$data['blog_categories'] = $blog_parent_categories;
							$data['blog_categories'][] = $data['blog_category_id'];
							unset($data['blog_category_id']);
						}
				}
				break;
			/* NeoSeo Blog - end */
			
			case 'product/product':
				if (isset($data['product_id'])) {
					$tmp = $data;
					$data = array();
					if ($this->config->get('config_seo_url_include_path')) {
						$data['path'] = $this->getPathByProduct($tmp['product_id']);
						if (!$data['path']) return $link;
					}
					$data['product_id'] = $tmp['product_id'];
					$allowed_parameters = array(
						'product_id', 'tracking',
						'uri', 'list_type',
						'gclid', 'utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content',
						'type', 'source', 'block', 'position', 'keyword',
						'yclid', 'ymclid', 'openstat', 'frommarket',
						'openstat_service', 'openstat_campaign', 'openstat_ad', 'openstat_source', 'tab'
						);
					foreach($allowed_parameters as $ap) {
						if (isset($tmp[$ap])) {
							$data[$ap] = $tmp[$ap];
						}
					}
				}
				break;		

			case 'product/category':
				if (isset($data['path'])) {
					$category = explode('_', $data['path']);
					$category = end($category);
					$data['path'] = $this->getPathByCategory($category);
					if (!$data['path']) return $link;
				}
				break;

			// case 'product/spec_filter':
			// 	if (isset($data['path'])) {
			// 		$category = explode('_', $data['path']);
			// 		$category = end($category);
			// 		$data['path'] = $this->getPathByCategory($category);
			// 		if (!$data['path']) return $link;
			// 	}
			// 	break;	

			case 'product/product/review':
			case 'information/information/info':
			case 'information/information/agree':
			case 'checkout/cart/remove':
			case 'common/cart/info':
				return $link;
				break;

			default:
				break;
		}

		if ($component['scheme'] == 'https') {
			$link = $this->config->get('config_ssl');
		} else {
			$link = $this->config->get('config_url');
		}

		$link .= 'index.php?route=' . $route;

		if (count($data)) {
			$link .= '&amp;' . urldecode(http_build_query($data, '', '&amp;'));
		}

		$queries = array();
		if(!in_array($route, array('product/search'))) {
			foreach($data as $key => $value) {
				switch($key) {

					/* NeoSeo Blog - begin */
					case 'article_id':
					case 'author_id':
						$queries[] = $key . '=' . $value;
					case 'blog_category_id':
						if ($route == 'blog/neoseo_blog_category' ) {
							$queries[] = $key . '=' . $value;
						}
						unset($data[$key]);
						$postfix = 1;
						break;
					case 'blog_categories':
						foreach ($value as $category_id) {
							$queries[] = 'blog_category_id=' . $category_id;
						}
						unset($data[$key]);
						break;
					/* NeoSeo Blog - end */
			
					case 'product_id':
					case 'manufacturer_id':
					case 'category_id':
					case 'information_id':
					case 'order_id':
						$queries[] = $key . '=' . $value;
						unset($data[$key]);
						$postfix = 1;
						break;

					case 'path':
						$categories = explode('_', $value);
						foreach($categories as $category) {
							$queries[] = 'category_id=' . $category;
						}
						unset($data[$key]);
						break;

					case 'ocf':
						$queries[] = 'ocf=' . $value;
						unset($data[$key]);
						$postfix = 1;
						break;	

					default:
						break;
				}
			}
		}

		if(empty($queries)) {
			$queries[] = $route;
		}

		$rows = array();
		foreach($queries as $query) {
			if(isset($this->cache_data['queries'][$query])) {
				$rows[] = array('query' => $query, 'keyword' => $this->cache_data['queries'][$query]);
			}elseif(isset($new_data['ocf']) && substr($query, 0, 6) == 'ocf=FV'){
				$rows[] = array('query' => $query, 'keyword' => '');
				$spec_filter_exists = true;
			}
		}

		if(count($rows) == count($queries)) {
			$aliases = array();
			foreach($rows as $row) {
				if($row['keyword']){
					$aliases[$row['query']] = $row['keyword'];
				}
			}
			foreach($queries as $query) {
				if(isset($aliases[$query])){
                    $seo_url .= '/' . rawurlencode($aliases[$query]);
				}
			}
		}

		if ($seo_url == '') return $link;

		$seo_url = trim($seo_url, '/');

		if ($component['scheme'] == 'https') {
			$seo_url = $this->config->get('config_ssl') . $seo_url;
		} else {
			$seo_url = $this->config->get('config_url') . $seo_url;
		}

		if (isset($postfix)) {
			$seo_url .= trim($this->config->get('config_seo_url_postfix'));
		} else {
			$seo_url .= '/';
		}

		if(substr($seo_url, -2) == '//') {
			$seo_url = substr($seo_url, 0, -1);
		}

		if (count($data)) {
			$seo_url .= '?' . urldecode(http_build_query($data, '', '&amp;'));
			$del = '&';
		}else{
			$del = '?';
		}

        if (isset($spec_filter_exists) && $spec_filter_exists) {
			$seo_url .= $del . 'ocf=' . $new_data['ocf'];
		}

		return $seo_url;
	}

	private function getPathByProduct($product_id) {
		$product_id = (int)$product_id;
		if ($product_id < 1) return false;

		static $path = null;
		if (!isset($path)) {
			$path = $this->cache->get('product.seopath');
			if (!isset($path)) $path = array();
		}

		if (!isset($path[$product_id])) {
			$query = $this->db->query("SELECT category_id FROM " . DB_PREFIX . "product_to_category WHERE product_id = '" . $product_id . "' ORDER BY main_category DESC LIMIT 1");

			$path[$product_id] = $this->getPathByCategory($query->num_rows ? (int)$query->row['category_id'] : 0);

			$this->cache->set('product.seopath', $path);
		}

		return $path[$product_id];
	}

	private function getPathByCategory($category_id) {
		$category_id = (int)$category_id;
		if ($category_id < 1) return false;

		static $path = null;
		if (!isset($path)) {
			$path = $this->cache->get('category.seopath');
			if (!isset($path)) $path = array();
		}

		if (!isset($path[$category_id])) {
			$max_level = 10;

			$sql = "SELECT CONCAT_WS('_'";
			for ($i = $max_level-1; $i >= 0; --$i) {
				$sql .= ",t$i.category_id";
			}
			$sql .= ") AS path FROM " . DB_PREFIX . "category t0";
			for ($i = 1; $i < $max_level; ++$i) {
				$sql .= " LEFT JOIN " . DB_PREFIX . "category t$i ON (t$i.category_id = t" . ($i-1) . ".parent_id)";
			}
			$sql .= " WHERE t0.category_id = '" . $category_id . "'";

			$query = $this->db->query($sql);

			$path[$category_id] = $query->num_rows ? $query->row['path'] : false;

			$this->cache->set('category.seopath', $path);
		}

		return $path[$category_id];
	}

	private function validate() {
		if (isset($this->request->get['route']) && $this->request->get['route'] == 'error/not_found') {
			return;
		}
		if (ltrim($this->request->server['REQUEST_URI'], '/') =='sitemap.xml') {
			$this->request->get['route'] = 'extension/feed/google_sitemap';
			return;
		}

		if(empty($this->request->get['route'])) {
			$this->request->get['route'] = 'common/home';
		}

		if (isset($this->request->server['HTTP_X_REQUESTED_WITH']) && strtolower($this->request->server['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
			return;
		}

		if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
			$config_ssl = substr($this->config->get('config_ssl'), 0, $this->strpos_offset('/', $this->config->get('config_ssl'), 3) + 1);
			$url = str_replace('&amp;', '&', $config_ssl . ltrim($this->request->server['REQUEST_URI'], '/'));
			$seo = str_replace('&amp;', '&', $this->url->link($this->request->get['route'], $this->getQueryString(array('route')), true));
		} else {
			$config_url = substr($this->config->get('config_url'), 0, $this->strpos_offset('/', $this->config->get('config_url'), 3) + 1);
			$url = str_replace('&amp;', '&', $config_url . ltrim($this->request->server['REQUEST_URI'], '/'));
			$seo = str_replace('&amp;', '&', $this->url->link($this->request->get['route'], $this->getQueryString(array('route')), false));
		}

		if (rawurldecode($url) != rawurldecode($seo)) {
			header($this->request->server['SERVER_PROTOCOL'] . ' 301 Moved Permanently');

			$this->response->redirect($seo);
		}
	}

	private function strpos_offset($needle, $haystack, $occurrence) {
		// explode the haystack
		$arr = explode($needle, $haystack);
		// check the needle is not out of bounds
		switch($occurrence) {
			case $occurrence == 0:
				return false;
			case $occurrence > max(array_keys($arr)):
				return false;
			default:
				return strlen(implode($needle, array_slice($arr, 0, $occurrence)));
		}
	}

	private function getQueryString($exclude = array()) {
		if (!is_array($exclude)) {
			$exclude = array();
			}

		return urldecode(http_build_query(array_diff_key($this->request->get, array_flip($exclude))));
		}

	private function detectLanguage() {
		$request_language_id = null;
		$request_language_code = '';
		$current_language_id = $this->config->get('config_language_id');

		if (isset($this->request->get['_route_'])) {
			$parts = explode('/', $this->request->get['_route_']);
			$keyword = end($parts);
		} 	else {
			$keyword = '';
		}

		if ($keyword || $this->request->server['REQUEST_URI'] == '/') {
			$query = $this->db->query("SELECT language_id  FROM " . DB_PREFIX . "seo_url WHERE keyword = '" . $this->db->escape($keyword) . "' AND store_id = '" . (int)$this->config->get('config_store_id') . "' AND language_id = '" . (int)$request_language_id . "' LIMIT 1");
			if ($query->row) {
				$request_language_id = (int)$query->row['language_id'];
				$query = $this->db->query("SELECT code FROM " . DB_PREFIX . "language WHERE language_id = '" . (int)$request_language_id . "' AND status = '1' LIMIT 1");
				if ($query->row) {
					$request_language_code = $query->row['code'];
					$this->session->data['language'] = $request_language_code;
				}
			}
		}

		if (isset($this->session->data['language'])) {
			$query = $this->db->query("SELECT language_id FROM " . DB_PREFIX . "language WHERE code = '" . (int)$this->session->data['language'] . "' AND status = '1' LIMIT 1");
			if ($query->num_rows) {
				$current_language_id = (int)$query->row['language_id'];
			}
		}

		if($request_language_id  && $request_language_code && $current_language_id != $request_language_id) {
			$language = new Language($request_language_code);
			$language->load($request_language_code);
			$this->registry->set('language', $language);
			$this->config->set('config_language_id', $request_language_id);
			$this->registry->set('language', $language);
		}
	}
}
