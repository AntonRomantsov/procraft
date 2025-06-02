<?php
class ControllerCatalogCategory extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('catalog/category');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/category');

		
//CategoryManager
			if (isset($this->request->get['filter_cm'])) {
				$this->getListCM();
			} else {
				$this->getList();
			}
//CategoryManager end
			
	}

	public function add() {
		$this->load->language('catalog/category');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/category');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_catalog_category->addCategory($this->request->post);

			/* NeoSeo Blog - begin */
			$this->load->model('blog/neoseo_blog_article');
			$articles_to_blog = isset($this->request->post['articles_to_blog']) ? $this->request->post['articles_to_blog'] : array();
			$this->model_blog_neoseo_blog_article->updateCategoryToBlogArticle($articles_to_blog);
			/* NeoSeo Blog - end */
		

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

		// CategoryManager
			if (isset($this->request->get['filter_cm'])) {
				$url .= '&filter_cm=' . $this->request->get['filter_cm'];
			}

			if (isset($this->request->get['filter_id'])) {
				$url .= '&filter_id=' . $this->request->get['filter_id'];
			}

			if (isset($this->request->get['filter_status'])) {
				$url .= '&filter_status=' . $this->request->get['filter_status'];
			}

			if (isset($this->request->get['filter_noindex'])) {
				$url .= '&filter_noindex=' . $this->request->get['filter_noindex'];
			}

			if (isset($this->request->get['filter_product'])) {
				$url .= '&filter_product=' . $this->request->get['filter_product'];
			}

			if (isset($this->request->get['filter_child'])) {
				$url .= '&filter_child=' . $this->request->get['filter_child'];
			}

			if (isset($this->request->get['filter_top'])) {
				$url .= '&filter_top=' . $this->request->get['filter_top'];
			}

			if (isset($this->request->get['filter_image'])) {
				$url .= '&filter_image=' . $this->request->get['filter_image'];
			}

			if (isset($this->request->get['filter_cat'])) {
				$url .= '&filter_cat=' . urlencode(html_entity_decode($this->request->get['filter_cat'], ENT_QUOTES, 'UTF-8'));
			}

			if (isset($this->request->get['filter_subcat'])) {
				$url .= '&filter_subcat=' . $this->request->get['filter_subcat'];
			}

			if (isset($this->request->get['filter_store'])) {
				$url .= '&filter_store=' . $this->request->get['filter_store'];
			}

			if (isset($this->request->get['filter_seo'])) {
				$url .= '&filter_seo=' . $this->request->get['filter_seo'];
			}

			if (isset($this->request->get['filter_dad'])) {
				$url .= '&filter_dad=' . $this->request->get['filter_dad'];
			}

			if (isset($this->request->get['filter_dade'])) {
				$url .= '&filter_dade=' . $this->request->get['filter_dade'];
			}

			if (isset($this->request->get['filter_dam'])) {
				$url .= '&filter_dam=' . $this->request->get['filter_dam'];
			}

			if (isset($this->request->get['filter_dame'])) {
				$url .= '&filter_dame=' . $this->request->get['filter_dame'];
			}

			if (isset($this->request->get['filter_lang'])) {
				$url .= '&filter_lang=' . $this->request->get['filter_lang'];
			}
		// CategoryManager end
			

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			
//CategoryManager
			if (isset($this->request->get['filter_cm'])) {
				$this->response->redirect($this->url->link('catalog/category', 'user_token=' . $this->session->data['user_token'] . $url . '&filter_cm=1', true));
			} else {
				$this->response->redirect($this->url->link('catalog/category', 'user_token=' . $this->session->data['user_token'] . $url, true));
			}
//CategoryManager end
			
		}

		$this->getForm();
	}

	public function edit() {
		$this->load->language('catalog/category');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/category');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {

			/* NeoSeo Blog - begin */
			$this->load->model('blog/neoseo_blog_article');
			$articles_to_blog = isset($this->request->post['articles_to_blog']) ? $this->request->post['articles_to_blog'] : array();
			$this->model_blog_neoseo_blog_article->updateCategoryToBlogArticle($articles_to_blog,$this->request->get['category_id']);
			/* NeoSeo Blog - end */
		
			$this->model_catalog_category->editCategory($this->request->get['category_id'], $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

		// CategoryManager
			if (isset($this->request->get['filter_cm'])) {
				$url .= '&filter_cm=' . $this->request->get['filter_cm'];
			}

			if (isset($this->request->get['filter_id'])) {
				$url .= '&filter_id=' . $this->request->get['filter_id'];
			}

			if (isset($this->request->get['filter_status'])) {
				$url .= '&filter_status=' . $this->request->get['filter_status'];
			}

			if (isset($this->request->get['filter_noindex'])) {
				$url .= '&filter_noindex=' . $this->request->get['filter_noindex'];
			}

			if (isset($this->request->get['filter_product'])) {
				$url .= '&filter_product=' . $this->request->get['filter_product'];
			}

			if (isset($this->request->get['filter_child'])) {
				$url .= '&filter_child=' . $this->request->get['filter_child'];
			}

			if (isset($this->request->get['filter_top'])) {
				$url .= '&filter_top=' . $this->request->get['filter_top'];
			}

			if (isset($this->request->get['filter_image'])) {
				$url .= '&filter_image=' . $this->request->get['filter_image'];
			}

			if (isset($this->request->get['filter_cat'])) {
				$url .= '&filter_cat=' . urlencode(html_entity_decode($this->request->get['filter_cat'], ENT_QUOTES, 'UTF-8'));
			}

			if (isset($this->request->get['filter_subcat'])) {
				$url .= '&filter_subcat=' . $this->request->get['filter_subcat'];
			}

			if (isset($this->request->get['filter_store'])) {
				$url .= '&filter_store=' . $this->request->get['filter_store'];
			}

			if (isset($this->request->get['filter_seo'])) {
				$url .= '&filter_seo=' . $this->request->get['filter_seo'];
			}

			if (isset($this->request->get['filter_dad'])) {
				$url .= '&filter_dad=' . $this->request->get['filter_dad'];
			}

			if (isset($this->request->get['filter_dade'])) {
				$url .= '&filter_dade=' . $this->request->get['filter_dade'];
			}

			if (isset($this->request->get['filter_dam'])) {
				$url .= '&filter_dam=' . $this->request->get['filter_dam'];
			}

			if (isset($this->request->get['filter_dame'])) {
				$url .= '&filter_dame=' . $this->request->get['filter_dame'];
			}

			if (isset($this->request->get['filter_lang'])) {
				$url .= '&filter_lang=' . $this->request->get['filter_lang'];
			}
		// CategoryManager end
			

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			
//CategoryManager
			if (isset($this->request->get['filter_cm'])) {
				$this->response->redirect($this->url->link('catalog/category', 'user_token=' . $this->session->data['user_token'] . $url . '&filter_cm=1', true));
			} else {
				$this->response->redirect($this->url->link('catalog/category', 'user_token=' . $this->session->data['user_token'] . $url, true));
			}
//CategoryManager end
			
		}

		$this->getForm();
	}

	public function delete() {
		$this->load->language('catalog/category');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/category');

		if (isset($this->request->post['selected']) && $this->validateDelete()) {
			foreach ($this->request->post['selected'] as $category_id) {
				$this->model_catalog_category->deleteCategory($category_id);
				/* NeoSeo Blog - begin */
				$this->load->model('blog/neoseo_blog_article');
				$this->model_blog_neoseo_blog_article->deleteCategoryToBlogArticle($category_id);
				/* NeoSeo Blog - end */
			}

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

		// CategoryManager
			if (isset($this->request->get['filter_cm'])) {
				$url .= '&filter_cm=' . $this->request->get['filter_cm'];
			}

			if (isset($this->request->get['filter_id'])) {
				$url .= '&filter_id=' . $this->request->get['filter_id'];
			}

			if (isset($this->request->get['filter_status'])) {
				$url .= '&filter_status=' . $this->request->get['filter_status'];
			}

			if (isset($this->request->get['filter_noindex'])) {
				$url .= '&filter_noindex=' . $this->request->get['filter_noindex'];
			}

			if (isset($this->request->get['filter_product'])) {
				$url .= '&filter_product=' . $this->request->get['filter_product'];
			}

			if (isset($this->request->get['filter_child'])) {
				$url .= '&filter_child=' . $this->request->get['filter_child'];
			}

			if (isset($this->request->get['filter_top'])) {
				$url .= '&filter_top=' . $this->request->get['filter_top'];
			}

			if (isset($this->request->get['filter_image'])) {
				$url .= '&filter_image=' . $this->request->get['filter_image'];
			}

			if (isset($this->request->get['filter_cat'])) {
				$url .= '&filter_cat=' . urlencode(html_entity_decode($this->request->get['filter_cat'], ENT_QUOTES, 'UTF-8'));
			}

			if (isset($this->request->get['filter_subcat'])) {
				$url .= '&filter_subcat=' . $this->request->get['filter_subcat'];
			}

			if (isset($this->request->get['filter_store'])) {
				$url .= '&filter_store=' . $this->request->get['filter_store'];
			}

			if (isset($this->request->get['filter_seo'])) {
				$url .= '&filter_seo=' . $this->request->get['filter_seo'];
			}

			if (isset($this->request->get['filter_dad'])) {
				$url .= '&filter_dad=' . $this->request->get['filter_dad'];
			}

			if (isset($this->request->get['filter_dade'])) {
				$url .= '&filter_dade=' . $this->request->get['filter_dade'];
			}

			if (isset($this->request->get['filter_dam'])) {
				$url .= '&filter_dam=' . $this->request->get['filter_dam'];
			}

			if (isset($this->request->get['filter_dame'])) {
				$url .= '&filter_dame=' . $this->request->get['filter_dame'];
			}

			if (isset($this->request->get['filter_lang'])) {
				$url .= '&filter_lang=' . $this->request->get['filter_lang'];
			}
		// CategoryManager end
			

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			
//CategoryManager
			if (isset($this->request->get['filter_cm'])) {
				$this->response->redirect($this->url->link('catalog/category', 'user_token=' . $this->session->data['user_token'] . $url . '&filter_cm=1', true));
			} else {
				$this->response->redirect($this->url->link('catalog/category', 'user_token=' . $this->session->data['user_token'] . $url, true));
			}
//CategoryManager end
			
		}

		
//CategoryManager
			if (isset($this->request->get['filter_cm'])) {
				$this->getListCM();
			} else {
				$this->getList();
			}
//CategoryManager end
			
	}

	public function repair() {
		$this->load->language('catalog/category');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/category');

		if ($this->validateRepair()) {
			$this->model_catalog_category->repairCategories();

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

		// CategoryManager
			if (isset($this->request->get['filter_cm'])) {
				$url .= '&filter_cm=' . $this->request->get['filter_cm'];
			}

			if (isset($this->request->get['filter_id'])) {
				$url .= '&filter_id=' . $this->request->get['filter_id'];
			}

			if (isset($this->request->get['filter_status'])) {
				$url .= '&filter_status=' . $this->request->get['filter_status'];
			}

			if (isset($this->request->get['filter_noindex'])) {
				$url .= '&filter_noindex=' . $this->request->get['filter_noindex'];
			}

			if (isset($this->request->get['filter_product'])) {
				$url .= '&filter_product=' . $this->request->get['filter_product'];
			}

			if (isset($this->request->get['filter_child'])) {
				$url .= '&filter_child=' . $this->request->get['filter_child'];
			}

			if (isset($this->request->get['filter_top'])) {
				$url .= '&filter_top=' . $this->request->get['filter_top'];
			}

			if (isset($this->request->get['filter_image'])) {
				$url .= '&filter_image=' . $this->request->get['filter_image'];
			}

			if (isset($this->request->get['filter_cat'])) {
				$url .= '&filter_cat=' . urlencode(html_entity_decode($this->request->get['filter_cat'], ENT_QUOTES, 'UTF-8'));
			}

			if (isset($this->request->get['filter_subcat'])) {
				$url .= '&filter_subcat=' . $this->request->get['filter_subcat'];
			}

			if (isset($this->request->get['filter_store'])) {
				$url .= '&filter_store=' . $this->request->get['filter_store'];
			}

			if (isset($this->request->get['filter_seo'])) {
				$url .= '&filter_seo=' . $this->request->get['filter_seo'];
			}

			if (isset($this->request->get['filter_dad'])) {
				$url .= '&filter_dad=' . $this->request->get['filter_dad'];
			}

			if (isset($this->request->get['filter_dade'])) {
				$url .= '&filter_dade=' . $this->request->get['filter_dade'];
			}

			if (isset($this->request->get['filter_dam'])) {
				$url .= '&filter_dam=' . $this->request->get['filter_dam'];
			}

			if (isset($this->request->get['filter_dame'])) {
				$url .= '&filter_dame=' . $this->request->get['filter_dame'];
			}

			if (isset($this->request->get['filter_lang'])) {
				$url .= '&filter_lang=' . $this->request->get['filter_lang'];
			}
		// CategoryManager end
			

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			
//CategoryManager
			if (isset($this->request->get['filter_cm'])) {
				$this->response->redirect($this->url->link('catalog/category', 'user_token=' . $this->session->data['user_token'] . $url . '&filter_cm=1', true));
			} else {
				$this->response->redirect($this->url->link('catalog/category', 'user_token=' . $this->session->data['user_token'] . $url, true));
			}
//CategoryManager end
			
		}

		
//CategoryManager
			if (isset($this->request->get['filter_cm'])) {
				$this->getListCM();
			} else {
				$this->getList();
			}
//CategoryManager end
			
	}

	protected function getList() {
		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'name';
		}

		if (isset($this->request->get['order'])) {
			$order = $this->request->get['order'];
		} else {
			$order = 'ASC';
		}

		if (isset($this->request->get['page'])) {
			$page = (int)$this->request->get['page'];
		} else {
			$page = 1;
		}

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		// CategoryManager
			if (isset($this->request->get['filter_cm'])) {
				$url .= '&filter_cm=' . $this->request->get['filter_cm'];
			}

			if (isset($this->request->get['filter_id'])) {
				$url .= '&filter_id=' . $this->request->get['filter_id'];
			}

			if (isset($this->request->get['filter_status'])) {
				$url .= '&filter_status=' . $this->request->get['filter_status'];
			}

			if (isset($this->request->get['filter_noindex'])) {
				$url .= '&filter_noindex=' . $this->request->get['filter_noindex'];
			}

			if (isset($this->request->get['filter_product'])) {
				$url .= '&filter_product=' . $this->request->get['filter_product'];
			}

			if (isset($this->request->get['filter_child'])) {
				$url .= '&filter_child=' . $this->request->get['filter_child'];
			}

			if (isset($this->request->get['filter_top'])) {
				$url .= '&filter_top=' . $this->request->get['filter_top'];
			}

			if (isset($this->request->get['filter_image'])) {
				$url .= '&filter_image=' . $this->request->get['filter_image'];
			}

			if (isset($this->request->get['filter_cat'])) {
				$url .= '&filter_cat=' . urlencode(html_entity_decode($this->request->get['filter_cat'], ENT_QUOTES, 'UTF-8'));
			}

			if (isset($this->request->get['filter_subcat'])) {
				$url .= '&filter_subcat=' . $this->request->get['filter_subcat'];
			}

			if (isset($this->request->get['filter_store'])) {
				$url .= '&filter_store=' . $this->request->get['filter_store'];
			}

			if (isset($this->request->get['filter_seo'])) {
				$url .= '&filter_seo=' . $this->request->get['filter_seo'];
			}

			if (isset($this->request->get['filter_dad'])) {
				$url .= '&filter_dad=' . $this->request->get['filter_dad'];
			}

			if (isset($this->request->get['filter_dade'])) {
				$url .= '&filter_dade=' . $this->request->get['filter_dade'];
			}

			if (isset($this->request->get['filter_dam'])) {
				$url .= '&filter_dam=' . $this->request->get['filter_dam'];
			}

			if (isset($this->request->get['filter_dame'])) {
				$url .= '&filter_dame=' . $this->request->get['filter_dame'];
			}

			if (isset($this->request->get['filter_lang'])) {
				$url .= '&filter_lang=' . $this->request->get['filter_lang'];
			}
		// CategoryManager end
			

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('catalog/category', 'user_token=' . $this->session->data['user_token'] . $url, true)
		);

		$data['add'] = $this->url->link('catalog/category/add', 'user_token=' . $this->session->data['user_token'] . $url, true);
		$data['delete'] = $this->url->link('catalog/category/delete', 'user_token=' . $this->session->data['user_token'] . $url, true);
		$data['repair'] = $this->url->link('catalog/category/repair', 'user_token=' . $this->session->data['user_token'] . $url, true);

		$data['categories'] = array();

		$filter_data = array(
			'sort'  => $sort,
			'order' => $order,
			'start' => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit' => $this->config->get('config_limit_admin')
		);

		$category_total = $this->model_catalog_category->getTotalCategories();


      // OCFilter start
      if (isset($filter_data['filter_name']) && isset($filter_data['limit']) && $filter_data['limit'] == 5) {
        $filter_data['limit'] = 15;
      }
      // OCFilter end
      
		$results = $this->model_catalog_category->getCategories($filter_data);

		foreach ($results as $result) {
			$data['categories'][] = array(
				'category_id' => $result['category_id'],
				'name'        => $result['name'],
				'sort_order'  => $result['sort_order'],
				'edit'        => $this->url->link('catalog/category/edit', 'user_token=' . $this->session->data['user_token'] . '&category_id=' . $result['category_id'] . $url, true),
				'delete'      => $this->url->link('catalog/category/delete', 'user_token=' . $this->session->data['user_token'] . '&category_id=' . $result['category_id'] . $url, true),
				'href_shop'   => HTTP_CATALOG . 'index.php?route=product/category&path=' . ($result['category_id']),
			);
		}

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

		if (isset($this->request->post['selected'])) {
			$data['selected'] = (array)$this->request->post['selected'];
		} else {
			$data['selected'] = array();
		}

		$url = '';

		if ($order == 'ASC') {
			$url .= '&order=DESC';
		} else {
			$url .= '&order=ASC';
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['sort_name'] = $this->url->link('catalog/category', 'user_token=' . $this->session->data['user_token'] . '&sort=name' . $url, true);
		$data['sort_sort_order'] = $this->url->link('catalog/category', 'user_token=' . $this->session->data['user_token'] . '&sort=sort_order' . $url, true);

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		// CategoryManager
			if (isset($this->request->get['filter_cm'])) {
				$url .= '&filter_cm=' . $this->request->get['filter_cm'];
			}

			if (isset($this->request->get['filter_id'])) {
				$url .= '&filter_id=' . $this->request->get['filter_id'];
			}

			if (isset($this->request->get['filter_status'])) {
				$url .= '&filter_status=' . $this->request->get['filter_status'];
			}

			if (isset($this->request->get['filter_noindex'])) {
				$url .= '&filter_noindex=' . $this->request->get['filter_noindex'];
			}

			if (isset($this->request->get['filter_product'])) {
				$url .= '&filter_product=' . $this->request->get['filter_product'];
			}

			if (isset($this->request->get['filter_child'])) {
				$url .= '&filter_child=' . $this->request->get['filter_child'];
			}

			if (isset($this->request->get['filter_top'])) {
				$url .= '&filter_top=' . $this->request->get['filter_top'];
			}

			if (isset($this->request->get['filter_image'])) {
				$url .= '&filter_image=' . $this->request->get['filter_image'];
			}

			if (isset($this->request->get['filter_cat'])) {
				$url .= '&filter_cat=' . urlencode(html_entity_decode($this->request->get['filter_cat'], ENT_QUOTES, 'UTF-8'));
			}

			if (isset($this->request->get['filter_subcat'])) {
				$url .= '&filter_subcat=' . $this->request->get['filter_subcat'];
			}

			if (isset($this->request->get['filter_store'])) {
				$url .= '&filter_store=' . $this->request->get['filter_store'];
			}

			if (isset($this->request->get['filter_seo'])) {
				$url .= '&filter_seo=' . $this->request->get['filter_seo'];
			}

			if (isset($this->request->get['filter_dad'])) {
				$url .= '&filter_dad=' . $this->request->get['filter_dad'];
			}

			if (isset($this->request->get['filter_dade'])) {
				$url .= '&filter_dade=' . $this->request->get['filter_dade'];
			}

			if (isset($this->request->get['filter_dam'])) {
				$url .= '&filter_dam=' . $this->request->get['filter_dam'];
			}

			if (isset($this->request->get['filter_dame'])) {
				$url .= '&filter_dame=' . $this->request->get['filter_dame'];
			}

			if (isset($this->request->get['filter_lang'])) {
				$url .= '&filter_lang=' . $this->request->get['filter_lang'];
			}
		// CategoryManager end
			

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		$pagination = new Pagination();
		$pagination->total = $category_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_limit_admin');
		$pagination->url = $this->url->link('catalog/category', 'user_token=' . $this->session->data['user_token'] . $url . '&page={page}', true);

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($category_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($category_total - $this->config->get('config_limit_admin'))) ? $category_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $category_total, ceil($category_total / $this->config->get('config_limit_admin')));

		$data['sort'] = $sort;

                $data['user_token'] = $this->session->data['user_token'];
            
		$data['order'] = $order;

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		
//CategoryManager
		if (isset($this->request->get['filter_cm'])) {
			$this->response->setOutput($this->load->view('extension/module/categorymanager_list', $data));
		} else {
			$this->response->setOutput($this->load->view('catalog/category_list', $data));
		}
//CategoryManager end
			
	}

	protected function getForm() {
		$data['text_form'] = !isset($this->request->get['category_id']) ? $this->language->get('text_add') : $this->language->get('text_edit');

		/* NeoSeo Blog - begin */
		$this->language->load('catalog/neoseo_blog_article');
		$data['entry_category_to_blog_article'] = $this->language->get('entry_category_to_blog_article');
		$data['text_article'] = $this->language->get('text_article');
		/* NeoSeo Blog - end */
		

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->error['name'])) {
			$data['error_name'] = $this->error['name'];
		} else {
			$data['error_name'] = array();
		}

		if (isset($this->error['meta_title'])) {
			$data['error_meta_title'] = $this->error['meta_title'];
		} else {
			$data['error_meta_title'] = array();
		}

		if (isset($this->error['keyword'])) {
			$data['error_keyword'] = $this->error['keyword'];
		} else {
			$data['error_keyword'] = '';
		}

		if (isset($this->error['parent'])) {
			$data['error_parent'] = $this->error['parent'];
		} else {
			$data['error_parent'] = '';
		}

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		// CategoryManager
			if (isset($this->request->get['filter_cm'])) {
				$url .= '&filter_cm=' . $this->request->get['filter_cm'];
			}

			if (isset($this->request->get['filter_id'])) {
				$url .= '&filter_id=' . $this->request->get['filter_id'];
			}

			if (isset($this->request->get['filter_status'])) {
				$url .= '&filter_status=' . $this->request->get['filter_status'];
			}

			if (isset($this->request->get['filter_noindex'])) {
				$url .= '&filter_noindex=' . $this->request->get['filter_noindex'];
			}

			if (isset($this->request->get['filter_product'])) {
				$url .= '&filter_product=' . $this->request->get['filter_product'];
			}

			if (isset($this->request->get['filter_child'])) {
				$url .= '&filter_child=' . $this->request->get['filter_child'];
			}

			if (isset($this->request->get['filter_top'])) {
				$url .= '&filter_top=' . $this->request->get['filter_top'];
			}

			if (isset($this->request->get['filter_image'])) {
				$url .= '&filter_image=' . $this->request->get['filter_image'];
			}

			if (isset($this->request->get['filter_cat'])) {
				$url .= '&filter_cat=' . urlencode(html_entity_decode($this->request->get['filter_cat'], ENT_QUOTES, 'UTF-8'));
			}

			if (isset($this->request->get['filter_subcat'])) {
				$url .= '&filter_subcat=' . $this->request->get['filter_subcat'];
			}

			if (isset($this->request->get['filter_store'])) {
				$url .= '&filter_store=' . $this->request->get['filter_store'];
			}

			if (isset($this->request->get['filter_seo'])) {
				$url .= '&filter_seo=' . $this->request->get['filter_seo'];
			}

			if (isset($this->request->get['filter_dad'])) {
				$url .= '&filter_dad=' . $this->request->get['filter_dad'];
			}

			if (isset($this->request->get['filter_dade'])) {
				$url .= '&filter_dade=' . $this->request->get['filter_dade'];
			}

			if (isset($this->request->get['filter_dam'])) {
				$url .= '&filter_dam=' . $this->request->get['filter_dam'];
			}

			if (isset($this->request->get['filter_dame'])) {
				$url .= '&filter_dame=' . $this->request->get['filter_dame'];
			}

			if (isset($this->request->get['filter_lang'])) {
				$url .= '&filter_lang=' . $this->request->get['filter_lang'];
			}
		// CategoryManager end
			

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('catalog/category', 'user_token=' . $this->session->data['user_token'] . $url, true)
		);

		if (!isset($this->request->get['category_id'])) {
			$data['action'] = $this->url->link('catalog/category/add', 'user_token=' . $this->session->data['user_token'] . $url, true);
		} else {
			$data['action'] = $this->url->link('catalog/category/edit', 'user_token=' . $this->session->data['user_token'] . '&category_id=' . $this->request->get['category_id'] . $url, true);
		}

		$data['cancel'] = $this->url->link('catalog/category', 'user_token=' . $this->session->data['user_token'] . $url, true);

		if (isset($this->request->get['category_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$category_info = $this->model_catalog_category->getCategory($this->request->get['category_id']);
		}

		$data['user_token'] = $this->session->data['user_token'];

		$this->load->model('localisation/language');

		$data['languages'] = $this->model_localisation_language->getLanguages();

		if (isset($this->request->post['category_description'])) {
			$data['category_description'] = $this->request->post['category_description'];
		} elseif (isset($this->request->get['category_id'])) {
			$data['category_description'] = $this->model_catalog_category->getCategoryDescriptions($this->request->get['category_id']);
		} else {
			$data['category_description'] = array();
		}

		if (isset($this->request->post['path'])) {
			$data['path'] = $this->request->post['path'];
		} elseif (!empty($category_info)) {
			$data['path'] = $category_info['path'];
		} else {
			$data['path'] = '';
		}

		if (isset($this->request->post['parent_id'])) {
			$data['parent_id'] = $this->request->post['parent_id'];
		} elseif (!empty($category_info)) {
			$data['parent_id'] = $category_info['parent_id'];
		} else {
			$data['parent_id'] = 0;
		}

		if (isset($this->request->post['video'])) {
			$data['video'] = $this->request->post['video'];
		} elseif (!empty($category_info)) {
			$data['video'] = $category_info['video'];
		} else {
			$data['video'] = 0;
		}

		$this->load->model('catalog/filter');

		if (isset($this->request->post['category_filter'])) {
			$filters = $this->request->post['category_filter'];
		} elseif (isset($this->request->get['category_id'])) {
			$filters = $this->model_catalog_category->getCategoryFilters($this->request->get['category_id']);
		} else {
			$filters = array();
		}

		$data['category_filters'] = array();

		foreach ($filters as $filter_id) {
			$filter_info = $this->model_catalog_filter->getFilter($filter_id);

			if ($filter_info) {
				$data['category_filters'][] = array(
					'filter_id' => $filter_info['filter_id'],
					'name'      => $filter_info['group'] . ' &gt; ' . $filter_info['name']
				);
			}
		}

		/* NeoSeo Blog - begin */
		$this->load->model('blog/neoseo_blog_article');

		if (isset($this->request->post['articles_to_blog'])) {
			$articles = $this->request->post['articles_to_blog'];
		} elseif (isset($this->request->get['category_id'])) {
			$articles = $this->model_blog_neoseo_blog_article->getCategoryToBlogArticle($this->request->get['category_id']);
		} else {
			$articles = array();
		}

		$data['category_to_blog_article'] = array();

		foreach ($articles as $article_id) {
			$article_info = $this->model_blog_neoseo_blog_article->getArticle($article_id);

			if ($article_info) {
				$data['category_to_blog_article'][] = array(
					'article_id' => $article_info['article_id'],
					'name'      => $article_info['name']
				);
			}
		}
		/* NeoSeo Blog - end */
		$this->load->model('setting/store');

		$data['stores'] = array();

		$data['stores'][] = array(
			'store_id' => 0,
			'name'     => $this->language->get('text_default')
		);

		$stores = $this->model_setting_store->getStores();

		foreach ($stores as $store) {
			$data['stores'][] = array(
				'store_id' => $store['store_id'],
				'name'     => $store['name']
			);
		}

		if (isset($this->request->post['category_store'])) {
			$data['category_store'] = $this->request->post['category_store'];
		} elseif (isset($this->request->get['category_id'])) {
			$data['category_store'] = $this->model_catalog_category->getCategoryStores($this->request->get['category_id']);
		} else {
			$data['category_store'] = array(0);
		}

		if (isset($this->request->post['image'])) {
			$data['image'] = $this->request->post['image'];
		} elseif (!empty($category_info)) {
			$data['image'] = $category_info['image'];
		} else {
			$data['image'] = '';
		}

		$this->load->model('tool/image');

		if (isset($this->request->post['image']) && is_file(DIR_IMAGE . $this->request->post['image'])) {
			$data['thumb'] = $this->model_tool_image->resize($this->request->post['image'], 100, 100);
		} elseif (!empty($category_info) && is_file(DIR_IMAGE . $category_info['image'])) {
			$data['thumb'] = $this->model_tool_image->resize($category_info['image'], 100, 100);
		} else {
			$data['thumb'] = $this->model_tool_image->resize('no_image.png', 100, 100);
		}

		$data['placeholder'] = $this->model_tool_image->resize('no_image.png', 100, 100);

		if (isset($this->request->post['top'])) {
			$data['top'] = $this->request->post['top'];
		} elseif (!empty($category_info)) {
			$data['top'] = $category_info['top'];
		} else {
			$data['top'] = 0;
		}

		if (isset($this->request->post['column'])) {
			$data['column'] = $this->request->post['column'];
		} elseif (!empty($category_info)) {
			$data['column'] = $category_info['column'];
		} else {
			$data['column'] = 1;
		}


    if (isset($this->request->post['code'])) {
			$data['code'] = $this->request->post['code'];
		} elseif (!empty($category_info['code'])) {
			$data['code'] = $category_info['code'];
		} else {
			$data['code'] = '';
		}
      
		if (isset($this->request->post['sort_order'])) {
			$data['sort_order'] = $this->request->post['sort_order'];
		} elseif (!empty($category_info)) {
			$data['sort_order'] = $category_info['sort_order'];
		} else {
			$data['sort_order'] = 0;
		}

		if (isset($this->request->post['garanty'])) {
			$data['garanty'] = $this->request->post['garanty'];
		} elseif (!empty($category_info)) {
			$data['garanty'] = $category_info['garanty'];
		} else {
			$data['garanty'] = true;
		}

		if (isset($this->request->post['status'])) {
			$data['status'] = $this->request->post['status'];
		} elseif (!empty($category_info)) {
			$data['status'] = $category_info['status'];
		} else {
			$data['status'] = true;
		}

		if (isset($this->request->post['category_seo_url'])) {
			$data['category_seo_url'] = $this->request->post['category_seo_url'];
		} elseif (isset($this->request->get['category_id'])) {
			$data['category_seo_url'] = $this->model_catalog_category->getCategorySeoUrls($this->request->get['category_id']);
		} else {
			$data['category_seo_url'] = array();
		}

		if (isset($this->request->post['category_layout'])) {
			$data['category_layout'] = $this->request->post['category_layout'];
		} elseif (isset($this->request->get['category_id'])) {
			$data['category_layout'] = $this->model_catalog_category->getCategoryLayouts($this->request->get['category_id']);
		} else {
			$data['category_layout'] = array();
		}

		$this->load->model('design/layout');

		$data['layouts'] = $this->model_design_layout->getLayouts();

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('catalog/category_form', $data));
	}


// CategoryManager
	public function BMche() {
		$this->load->language( 'catalog/category');
		$json=array();

		if (!$this->user->hasPermission('modify', 'catalog/category')) {
			$this->error['warning'] = $this->language->get('error_permission');
			$json['error'] = $this->error;
		}

		$this->response->addHeader('Content-Type: application/json; charset=utf-8') ;
		$this->response->setOutput(json_encode($json)) ;
	}

	public function BMdeleteImage() {
		$this->load->language( 'catalog/category');
		$this->load->model('extension/module/categorymanager');
		$json=array();

		if ($this->BMvalidate()) {
			$this->model_extension_module_categorymanager->BMdeleteImage($this->request->get['mid']);
			$json['success'] = $this->language->get( 'text_success');
		} else {
			$json['error'] = $this->error;
		}

		$this->response->addHeader('Content-Type: application/json; charset=utf-8') ;
		$this->response->setOutput(json_encode($json)) ;
	}

	public function BMchangeImage() {
		$this->load->language( 'catalog/category');
		$this->load->model('extension/module/categorymanager');
		$json=array();
		
		if (isset($this->request->get['ipath'])) {
			$ipath = parse_url($this->request->get['ipath'], PHP_URL_PATH);
		}

		if ($this->BMvalidate()) {
			$this->model_extension_module_categorymanager->BMchangeImage($this->request->get['mid'], $ipath);
			$json['success'] = $this->language->get( 'text_success');
		} else {
			$json['error'] = $this->error;
		}

		$this->response->addHeader('Content-Type: application/json; charset=utf-8') ;
		$this->response->setOutput(json_encode($json)) ;
	}

	public function BMchangeData() {
		$this->load->language( 'catalog/category');
		$this->load->model('extension/module/categorymanager');
		$json=array();

		if ($this->BMvalidate()) {
			$this->model_extension_module_categorymanager->BMchangeData($this->request->get['mid'], $this->request->get['type'], $this->request->get['text'], $this->request->get['store'], $this->request->get['lang']);
			$json['success'] = $this->language->get( 'text_success');
		} else {
			$json['error'] = $this->error;
		}

		$this->response->addHeader('Content-Type: application/json; charset=utf-8') ;
		$this->response->setOutput(json_encode($json)) ;
	}

	protected function BMvalidate() {
		if (!$this->user->hasPermission('modify', 'catalog/category')) {
			$this->error['warning'] = $this->language->get('error_permission');
			return !$this->error;
		}

		if ($this->request->get['type'] == 'name' && utf8_strlen($this->request->get['text']) < 1) {
			$this->error['name'] = $this->language->get('error_name');
		}

		if ($this->request->get['type'] == 'keyword' && utf8_strlen($this->request->get['text']) > 0) {
			$this->load->model('design/seo_url');
			$seo_urls = $this->model_design_seo_url->getSeoUrlsByKeyword($this->request->get['text']);

			foreach ($seo_urls as $seo_url) {
				if (($seo_url['store_id'] == $this->request->get['store'] && $seo_url['language_id'] != $this->request->get['lang']) || ($seo_url['store_id'] == $this->request->get['store'] && $seo_url['language_id'] == $this->request->get['lang']) &&  $seo_url['query'] != 'category_id=' . $this->request->get['mid']) {
					$this->error['keyword'] = $this->language->get('error_keyword');
				}
			}
		}

		return !$this->error;
	}

	protected function getListCM() {
		
		
		$config_data = array("status", "limit", "hide", "hideck", "hidecs", "udate", "col", "code");
        foreach ($config_data as $conf) {
            $conf1 = "module_categorymanager_" . $conf;
            if (!empty($this->config->get($conf1))) {
                
                $config[$conf] = $this->config->get($conf1);
            }
        }
		
		$data['config'] = $config;
		
		$this->language->load('catalog/categorymanager');

		if (isset($this->request->get['filter_cm'])) {
			$filter_cm = $this->request->get['filter_cm'];
		} else {
			$filter_cm = null;
		}

		if (isset($this->request->get['filter_id'])) {
			$filter_id = $this->request->get['filter_id'];
		} else {
			$filter_id = null;
		}

		if (isset($this->request->get['filter_status'])) {
			$filter_status = $this->request->get['filter_status'];
		} else {
			$filter_status = null;
		}

		if (isset($this->request->get['filter_noindex'])) {
			$filter_noindex = $this->request->get['filter_noindex'];
		} else {
			$filter_noindex = null;
		}

		if (isset($this->request->get['filter_product'])) {
			$filter_product = $this->request->get['filter_product'];
		} else {
			$filter_product = null;
		}

		if (isset($this->request->get['filter_child'])) {
			$filter_child = $this->request->get['filter_child'];
		} else {
			$filter_child = null;
		}

		if (isset($this->request->get['filter_top'])) {
			$filter_top = $this->request->get['filter_top'];
		} else {
			$filter_top = null;
		}

		if (isset($this->request->get['filter_image'])) {
			$filter_image = $this->request->get['filter_image'];
		} else {
			$filter_image = null;
		}

		if (isset($this->request->get['filter_cat'])) {
			$filter_cat = $this->request->get['filter_cat'];
		} else {
			$filter_cat = null;
		}

		if (isset($this->request->get['filter_subcat'])) {
			$filter_subcat = $this->request->get['filter_subcat'];
		} else {
			$filter_subcat = null;
		}

		if (isset($this->request->get['filter_store'])) {
			$filter_store = $this->request->get['filter_store'];
		} else {
			$filter_store = null;
		}

		if (isset($this->request->get['filter_seo'])) {
			$filter_seo = $this->request->get['filter_seo'];
		} else {
			$filter_seo = null;
		}

		if (isset($this->request->get['filter_dad'])) {
			$filter_dad = $this->request->get['filter_dad'];
		} else {
			$filter_dad = null;
		}

		if (isset($this->request->get['filter_dade'])) {
			$filter_dade = $this->request->get['filter_dade'];
		} else {
			$filter_dade = null;
		}

		if (isset($this->request->get['filter_dam'])) {
			$filter_dam = $this->request->get['filter_dam'];
		} else {
			$filter_dam = null;
		}

		if (isset($this->request->get['filter_dame'])) {
			$filter_dame = $this->request->get['filter_dame'];
		} else {
			$filter_dame = null;
		}

		if (isset($this->request->get['filter_lang'])) {
			$filter_lang = $this->request->get['filter_lang'];
		} else {
			$filter_lang = null;
		}

		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'name';
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

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

			if (isset($this->request->get['filter_cm'])) {
				$url .= '&filter_cm=' . $this->request->get['filter_cm'];
			}

			if (isset($this->request->get['filter_id'])) {
				$url .= '&filter_id=' . $this->request->get['filter_id'];
			}

			if (isset($this->request->get['filter_status'])) {
				$url .= '&filter_status=' . $this->request->get['filter_status'];
			}

			if (isset($this->request->get['filter_noindex'])) {
				$url .= '&filter_noindex=' . $this->request->get['filter_noindex'];
			}

			if (isset($this->request->get['filter_product'])) {
				$url .= '&filter_product=' . $this->request->get['filter_product'];
			}

			if (isset($this->request->get['filter_child'])) {
				$url .= '&filter_child=' . $this->request->get['filter_child'];
			}

			if (isset($this->request->get['filter_top'])) {
				$url .= '&filter_top=' . $this->request->get['filter_top'];
			}

			if (isset($this->request->get['filter_image'])) {
				$url .= '&filter_image=' . $this->request->get['filter_image'];
			}

			if (isset($this->request->get['filter_cat'])) {
				$url .= '&filter_cat=' . urlencode(html_entity_decode($this->request->get['filter_cat'], ENT_QUOTES, 'UTF-8'));
			}

			if (isset($this->request->get['filter_subcat'])) {
				$url .= '&filter_subcat=' . $this->request->get['filter_subcat'];
			}

			if (isset($this->request->get['filter_store'])) {
				$url .= '&filter_store=' . $this->request->get['filter_store'];
			}

			if (isset($this->request->get['filter_seo'])) {
				$url .= '&filter_seo=' . $this->request->get['filter_seo'];
			}

			if (isset($this->request->get['filter_dad'])) {
				$url .= '&filter_dad=' . $this->request->get['filter_dad'];
			}

			if (isset($this->request->get['filter_dade'])) {
				$url .= '&filter_dade=' . $this->request->get['filter_dade'];
			}

			if (isset($this->request->get['filter_dam'])) {
				$url .= '&filter_dam=' . $this->request->get['filter_dam'];
			}

			if (isset($this->request->get['filter_dame'])) {
				$url .= '&filter_dame=' . $this->request->get['filter_dame'];
			}

			if (isset($this->request->get['filter_lang'])) {
				$url .= '&filter_lang=' . $this->request->get['filter_lang'];
			}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('catalog/category', 'user_token=' . $this->session->data['user_token'] . $url, true)
		);

		$data['add']= $this->url->link('catalog/category/add', 'user_token=' . $this->session->data['user_token'] . $url, true);
		$data['delete']= $this->url->link('catalog/category/delete', 'user_token=' . $this->session->data['user_token'] . $url, true);
		$data['stng'] = $this->url->link(((VERSION<'2.3')?'':'extension/'). 'module/categorymanager', 'user_token=' . $this->session->data['user_token'], true);
		$data['cat_col'] = $this->config->get('module_categorymanager_col')?(12/$this->config->get('module_categorymanager_col')):'3';
		$data['viewcols'] = array(
			'id' => 'ID',
			'image' => $this->language->get('entry_img'),
			'name' => $this->language->get('column_name'),
			'seourl' => $this->language->get('entry_keyword'),
			'store' => $this->language->get('entry_store'),
			'date_added' => $this->language->get('text_date_add'),
			'date_modified' => $this->language->get('text_date_mod'),
			'product' => $this->language->get('txt_product'),
			'order' => $this->language->get('column_sort_order'),
			'top' => $this->language->get('entry_top'),
			'status' => $this->language->get('entry_status')
		);

		$data['colspan'] = 13;
		$data['hideck'] = $this->config->get('module_categorymanager_hideck');
		$data['hidecs'] = $this->config->get('module_categorymanager_hidecs');
		$data['txt_product'] = $this->language->get('txt_product');
		$data['help_product'] = $this->language->get('help_product');
		$data['txt_subcat'] = $this->language->get('txt_subcat');
		$data['showhide'] = $this->language->get('showhide');
		$this->load->model('extension/module/categorymanager');

		$data['text_select_all'] = $this->language->get('text_select_all');
		$data['text_unselect_all'] = $this->language->get('text_unselect_all');

		$qu = $this->db->query("DESCRIBE " . DB_PREFIX . "category `noindex`");
		if ($qu->num_rows != 0) {
			$data['noindex']=!0;
			$data['entry_noindex'] = $this->language->get('entry_noindex');
			$tmp = array('noindex' => $this->language->get('entry_noindex'));
			$data['viewcols'] = array_merge($data['viewcols'], $tmp);
			$data['colspan'] +=1;
		}
		if (isset($config['hide']) && $config['hide']) {
		$data['enable_all'] = $this->url->link('catalog/category/enable_all', 'user_token=' . $this->session->data['user_token'] . $url, true);
		$data['disable_all'] = $this->url->link('catalog/category/disable_all', 'user_token=' . $this->session->data['user_token'] . $url, true);
		}
		$data['enable_cat'] = $this->url->link('catalog/category/enable_cat', 'user_token=' . $this->session->data['user_token'] . $url, true);
		$data['disable_cat'] = $this->url->link('catalog/category/disable_cat', 'user_token=' . $this->session->data['user_token'] . $url, true);
		$data['repair']= $this->url->link('catalog/category/repair', 'user_token=' . $this->session->data['user_token'] . $url, true);
		$limit = isset($config['limit']) && (int)$config['limit']>0? $config['limit'] : $this->config->get('config_limit_admin');

		$data['categories']= array();

		$filter_data= array(
			'filter_cm'			=> $filter_cm,
			'filter_id'			=> $filter_id,
			'filter_status'		=> $filter_status,
			'filter_noindex'	=> $filter_noindex,
			'filter_product'	=> $filter_product,
			'filter_child'		=> $filter_child,
			'filter_top'		=> $filter_top,
			'filter_cat'		=> $filter_cat,
			'filter_subcat'		=> $filter_subcat,
			'filter_store'		=> $filter_store,
			'filter_seo'		=> $filter_seo,
			'filter_dad'		=> $filter_dad,
			'filter_dade'		=> $filter_dade,
			'filter_dam'		=> $filter_dam,
			'filter_dame'		=> $filter_dame,
			'filter_lang'		=> $filter_lang,
			'filter_image'		=> $filter_image,
			'sort'  => $sort,
			'order' => $order,
			'start' =>($page - 1) * $limit,
			'limit' =>$limit
		);

		$this->load->model('setting/store');
		$data['stor'] = array();
		$data['stor'][] = array(
			'store_id' => 0,
			'name'     => $this->language->get('text_default')
		);
		$stor = $this->model_setting_store->getStores();
		foreach ($stor as $store) {
			$data['stor'][] = array(
				'store_id' => $store['store_id'],
				'name'     => $store['name']
			);
		}
		$data['stores'] = $this->model_setting_store->getStores();
		$this->load->model('localisation/language');
		$data['languages'] = $this->model_localisation_language->getLanguages();
		$category_total = $this->model_extension_module_categorymanager->getTotalCategoryManager($filter_data);
		$this->load->model('tool/image');
		$this->load->model('catalog/category' );

		$fildat = array('sort'  => 'name');
		$results = $this->model_catalog_category->getCategories($fildat);

		foreach ($results as $result) {
			$data['subcat'][] = array(
				'category_id' => $result['category_id'],
				'name'        => $result['name']
			);
		}

		$results = $this->model_extension_module_categorymanager->getCategoriesCM($filter_data);

		foreach ($results as $result) {

			$catman = $this->model_catalog_category->getCategory($result['category_id']);

			$data['categories'][]= array(
				'category_id' => $result['category_id'],

			'keyword' => $this->model_catalog_category->getCategorySeoUrls($result['category_id']),
			'stores' => $this->model_catalog_category->getCategoryStores($result['category_id']),
			'products' => $this->model_extension_module_categorymanager->getCMpro($result['category_id']),
			'clname' =>$catman['name'],
			'cpname' =>substr($result['name'], 0, - (strlen($catman['name']))),
			'top' => $catman['top'],
			'status' => $catman['status'],
			'image' => !empty($catman['image']) && is_file(DIR_IMAGE . $catman['image']) ? $this->model_tool_image->resize($catman['image'], 40, 40) : $this->model_tool_image->resize('no_image.png', 40, 40) ,
			'date_add' => date ("Y-m-d", strtotime($result['date_added'])),
			'date_mod' => date ("Y-m-d", strtotime($result['date_modified'])),

				'name'		=>$result['name'],
				'sort_order' =>$result['sort_order'],
				'view'		=>HTTP_CATALOG.'index.php?route=product/category&path=' . $result['category_id'],
				'edit' => $this->url->link('catalog/category/edit', 'user_token=' . $this->session->data['user_token'] . '&category_id=' . $result['category_id'] . $url, true),
				'noindex'	=> isset($catman['noindex']) ? $catman['noindex'] : 0,
				'copy'		=> $this->url->link('catalog/category/copycat', 'user_token=' . $this->session->data['user_token'] . '&category_id=' . $result['category_id'] . $url, true),
				'copycat'	=> $this->url->link('catalog/category/copycat', 'user_token=' . $this->session->data['user_token'] . '&copy=1&category_id=' . $result['category_id'] . $url, true),
				'delete' => $this->url->link('catalog/category/delete', 'user_token=' . $this->session->data['user_token'] . '&category_id=' . $result['category_id'] . $url, true)
			);
		}

		$data['user_token'] = $this->session->data['user_token'];
		$data['placeholder'] = $this->model_tool_image->resize('no_image.png', 40, 40);

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

		if (isset($this->request->post['selected'])) {
			$data['selected'] = (array)$this->request->post['selected'];
		} else {
			$data['selected'] = array();
		}

		$url = '';

			if (isset($this->request->get['filter_cm'])) {
				$url .= '&filter_cm=' . $this->request->get['filter_cm'];
			}

			if (isset($this->request->get['filter_id'])) {
				$url .= '&filter_id=' . $this->request->get['filter_id'];
			}

			if (isset($this->request->get['filter_status'])) {
				$url .= '&filter_status=' . $this->request->get['filter_status'];
			}

			if (isset($this->request->get['filter_noindex'])) {
				$url .= '&filter_noindex=' . $this->request->get['filter_noindex'];
			}

			if (isset($this->request->get['filter_product'])) {
				$url .= '&filter_product=' . $this->request->get['filter_product'];
			}

			if (isset($this->request->get['filter_child'])) {
				$url .= '&filter_child=' . $this->request->get['filter_child'];
			}

			if (isset($this->request->get['filter_top'])) {
				$url .= '&filter_top=' . $this->request->get['filter_top'];
			}

			if (isset($this->request->get['filter_image'])) {
				$url .= '&filter_image=' . $this->request->get['filter_image'];
			}

			if (isset($this->request->get['filter_cat'])) {
				$url .= '&filter_cat=' . urlencode(html_entity_decode($this->request->get['filter_cat'], ENT_QUOTES, 'UTF-8'));
			}

			if (isset($this->request->get['filter_subcat'])) {
				$url .= '&filter_subcat=' . $this->request->get['filter_subcat'];
			}

			if (isset($this->request->get['filter_store'])) {
				$url .= '&filter_store=' . $this->request->get['filter_store'];
			}

			if (isset($this->request->get['filter_seo'])) {
				$url .= '&filter_seo=' . $this->request->get['filter_seo'];
			}

			if (isset($this->request->get['filter_dad'])) {
				$url .= '&filter_dad=' . $this->request->get['filter_dad'];
			}

			if (isset($this->request->get['filter_dade'])) {
				$url .= '&filter_dade=' . $this->request->get['filter_dade'];
			}

			if (isset($this->request->get['filter_dam'])) {
				$url .= '&filter_dam=' . $this->request->get['filter_dam'];
			}

			if (isset($this->request->get['filter_dame'])) {
				$url .= '&filter_dame=' . $this->request->get['filter_dame'];
			}

			if (isset($this->request->get['filter_lang'])) {
				$url .= '&filter_lang=' . $this->request->get['filter_lang'];
			}

		if ($order == 'ASC') {
			$url .= '&order=DESC';
		} else {
			$url .= '&order=ASC';
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['sort_name'] = $this->url->link('catalog/category', 'user_token=' . $this->session->data['user_token'] . '&sort=name' . $url, true);
		$data['sort_id'] = $this->url->link('catalog/category', 'user_token=' . $this->session->data['user_token'] . '&sort=category_id' . $url, true);
		$data['sort_dadd'] = $this->url->link('catalog/category', 'user_token=' . $this->session->data['user_token'] . '&sort=date_added' . $url, true);
		$data['sort_dmod'] = $this->url->link('catalog/category', 'user_token=' . $this->session->data['user_token'] . '&sort=date_modified' . $url, true);
		$data['sort_sort_order'] = $this->url->link('catalog/category', 'user_token=' . $this->session->data['user_token'] . '&sort=sort_order' . $url, true);

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

			if (isset($this->request->get['filter_cm'])) {
				$url .= '&filter_cm=' . $this->request->get['filter_cm'];
			}

			if (isset($this->request->get['filter_id'])) {
				$url .= '&filter_id=' . $this->request->get['filter_id'];
			}

			if (isset($this->request->get['filter_status'])) {
				$url .= '&filter_status=' . $this->request->get['filter_status'];
			}

			if (isset($this->request->get['filter_noindex'])) {
				$url .= '&filter_noindex=' . $this->request->get['filter_noindex'];
			}

			if (isset($this->request->get['filter_product'])) {
				$url .= '&filter_product=' . $this->request->get['filter_product'];
			}

			if (isset($this->request->get['filter_child'])) {
				$url .= '&filter_child=' . $this->request->get['filter_child'];
			}

			if (isset($this->request->get['filter_top'])) {
				$url .= '&filter_top=' . $this->request->get['filter_top'];
			}

			if (isset($this->request->get['filter_image'])) {
				$url .= '&filter_image=' . $this->request->get['filter_image'];
			}

			if (isset($this->request->get['filter_cat'])) {
				$url .= '&filter_cat=' . urlencode(html_entity_decode($this->request->get['filter_cat'], ENT_QUOTES, 'UTF-8'));
			}

			if (isset($this->request->get['filter_subcat'])) {
				$url .= '&filter_subcat=' . $this->request->get['filter_subcat'];
			}

			if (isset($this->request->get['filter_store'])) {
				$url .= '&filter_store=' . $this->request->get['filter_store'];
			}

			if (isset($this->request->get['filter_seo'])) {
				$url .= '&filter_seo=' . $this->request->get['filter_seo'];
			}

			if (isset($this->request->get['filter_dad'])) {
				$url .= '&filter_dad=' . $this->request->get['filter_dad'];
			}

			if (isset($this->request->get['filter_dade'])) {
				$url .= '&filter_dade=' . $this->request->get['filter_dade'];
			}

			if (isset($this->request->get['filter_dam'])) {
				$url .= '&filter_dam=' . $this->request->get['filter_dam'];
			}

			if (isset($this->request->get['filter_dame'])) {
				$url .= '&filter_dame=' . $this->request->get['filter_dame'];
			}

			if (isset($this->request->get['filter_lang'])) {
				$url .= '&filter_lang=' . $this->request->get['filter_lang'];
			}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		$pagination = new Pagination();
		$pagination->total = $category_total;
		$pagination->page = $page;
		$pagination->limit = $limit;
		$pagination->url = $this->url->link('catalog/category', 'user_token=' . $this->session->data['user_token'] . $url . '&page={page}', true);

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($category_total) ? (($page - 1) * $limit) + 1 : 0, ((($page - 1) * $limit) > ($category_total - $limit)) ? $category_total : ((($page - 1) * $limit) + $limit), $category_total, ceil($category_total / $limit));

			$data['filter_cm']		= $filter_cm;
			$data['filter_id']		= $filter_id;
			$data['filter_status']	= $filter_status;
			$data['filter_noindex']	= $filter_noindex;
			$data['filter_product']	= $filter_product;
			$data['filter_child']	= $filter_child;
			$data['filter_top']		= $filter_top;
			$data['filter_cat']		= $filter_cat;
			$data['filter_subcat']	= $filter_subcat;
			$data['filter_store']	= $filter_store;
			$data['filter_seo']		= $filter_seo;
			$data['filter_dad']		= $filter_dad;
			$data['filter_dade']	= $filter_dade;
			$data['filter_dam']		= $filter_dam;
			$data['filter_dame']	= $filter_dame;
			$data['filter_lang']	= $filter_lang;
			$data['filter_image']	= $filter_image;

		$data['sort'] = $sort;
		$data['order'] = $order;

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/module/categorymanager_list', $data));

	}
		
	public function disable_all() {
		$this->language->load( 'catalog/category');
		$this->document->setTitle($this->language->get('heading_title'));
		$this->load->model('extension/module/categorymanager');

		if (!$this->user->hasPermission('modify', 'catalog/category')) {
			$this->error['warning'] = $this->language->get('error_permission');

		} else {
			
			$this->model_extension_module_categorymanager->disableAllCategory();

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '&filter_cm=1';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['filter_id'])) {
				$url .= '&filter_id=' . $this->request->get['filter_id'];
			}

			if (isset($this->request->get['filter_status'])) {
				$url .= '&filter_status=' . $this->request->get['filter_status'];
			}

			if (isset($this->request->get['filter_noindex'])) {
				$url .= '&filter_noindex=' . $this->request->get['filter_noindex'];
			}

			if (isset($this->request->get['filter_product'])) {
				$url .= '&filter_product=' . $this->request->get['filter_product'];
			}

			if (isset($this->request->get['filter_child'])) {
				$url .= '&filter_child=' . $this->request->get['filter_child'];
			}

			if (isset($this->request->get['filter_top'])) {
				$url .= '&filter_top=' . $this->request->get['filter_top'];
			}

			if (isset($this->request->get['filter_image'])) {
				$url .= '&filter_image=' . $this->request->get['filter_image'];
			}

			if (isset($this->request->get['filter_cat'])) {
				$url .= '&filter_cat=' . urlencode(html_entity_decode($this->request->get['filter_cat'], ENT_QUOTES, 'UTF-8'));
			}

			if (isset($this->request->get['filter_subcat'])) {
				$url .= '&filter_subcat=' . $this->request->get['filter_subcat'];
			}

			if (isset($this->request->get['filter_store'])) {
				$url .= '&filter_store=' . $this->request->get['filter_store'];
			}

			if (isset($this->request->get['filter_seo'])) {
				$url .= '&filter_seo=' . $this->request->get['filter_seo'];
			}

			if (isset($this->request->get['filter_dad'])) {
				$url .= '&filter_dad=' . $this->request->get['filter_dad'];
			}

			if (isset($this->request->get['filter_dade'])) {
				$url .= '&filter_dade=' . $this->request->get['filter_dade'];
			}

			if (isset($this->request->get['filter_dam'])) {
				$url .= '&filter_dam=' . $this->request->get['filter_dam'];
			}

			if (isset($this->request->get['filter_dame'])) {
				$url .= '&filter_dame=' . $this->request->get['filter_dame'];
			}

			if (isset($this->request->get['filter_lang'])) {
				$url .= '&filter_lang=' . $this->request->get['filter_lang'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link('catalog/category', 'user_token=' . $this->session->data['user_token'] . $url, true));
		}

		$this->getListCM();
	}

	public function enable_all() {
		$this->language->load( 'catalog/category');
 		$this->document->setTitle($this->language->get('heading_title'));
		$this->load->model('extension/module/categorymanager');

		if (!$this->user->hasPermission('modify', 'catalog/category')) {
			$this->error['warning'] = $this->language->get('error_permission');

		} else {

			$this->model_extension_module_categorymanager->enableAllCategory();

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '&filter_cm=1';
			
			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['filter_id'])) {
				$url .= '&filter_id=' . $this->request->get['filter_id'];
			}

			if (isset($this->request->get['filter_status'])) {
				$url .= '&filter_status=' . $this->request->get['filter_status'];
			}

			if (isset($this->request->get['filter_noindex'])) {
				$url .= '&filter_noindex=' . $this->request->get['filter_noindex'];
			}

			if (isset($this->request->get['filter_product'])) {
				$url .= '&filter_product=' . $this->request->get['filter_product'];
			}

			if (isset($this->request->get['filter_child'])) {
				$url .= '&filter_child=' . $this->request->get['filter_child'];
			}

			if (isset($this->request->get['filter_top'])) {
				$url .= '&filter_top=' . $this->request->get['filter_top'];
			}

			if (isset($this->request->get['filter_image'])) {
				$url .= '&filter_image=' . $this->request->get['filter_image'];
			}

			if (isset($this->request->get['filter_cat'])) {
				$url .= '&filter_cat=' . urlencode(html_entity_decode($this->request->get['filter_cat'], ENT_QUOTES, 'UTF-8'));
			}

			if (isset($this->request->get['filter_subcat'])) {
				$url .= '&filter_subcat=' . $this->request->get['filter_subcat'];
			}

			if (isset($this->request->get['filter_store'])) {
				$url .= '&filter_store=' . $this->request->get['filter_store'];
			}

			if (isset($this->request->get['filter_seo'])) {
				$url .= '&filter_seo=' . $this->request->get['filter_seo'];
			}

			if (isset($this->request->get['filter_dad'])) {
				$url .= '&filter_dad=' . $this->request->get['filter_dad'];
			}

			if (isset($this->request->get['filter_dade'])) {
				$url .= '&filter_dade=' . $this->request->get['filter_dade'];
			}

			if (isset($this->request->get['filter_dam'])) {
				$url .= '&filter_dam=' . $this->request->get['filter_dam'];
			}

			if (isset($this->request->get['filter_dame'])) {
				$url .= '&filter_dame=' . $this->request->get['filter_dame'];
			}

			if (isset($this->request->get['filter_lang'])) {
				$url .= '&filter_lang=' . $this->request->get['filter_lang'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link('catalog/category', 'user_token=' . $this->session->data['user_token'] . $url, true));
		}

		$this->getListCM();
	}

	public function copyCat() {
		$this->language->load( 'catalog/category');
 		$this->document->setTitle($this->language->get('heading_title'));
		$this->load->model('extension/module/categorymanager');

		if (isset($this->request->get['category_id']) && $this->validateDelete()) {
			$category_id=$this->request->get['category_id'];
			!empty($this->request->get['copy']) ? $this->model_extension_module_categorymanager->copyCat($category_id,1) : $this->model_extension_module_categorymanager->copyCat($category_id);

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '&filter_cm=1';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['filter_id'])) {
				$url .= '&filter_id=' . $this->request->get['filter_id'];
			}

			if (isset($this->request->get['filter_status'])) {
				$url .= '&filter_status=' . $this->request->get['filter_status'];
			}

			if (isset($this->request->get['filter_noindex'])) {
				$url .= '&filter_noindex=' . $this->request->get['filter_noindex'];
			}

			if (isset($this->request->get['filter_product'])) {
				$url .= '&filter_product=' . $this->request->get['filter_product'];
			}

			if (isset($this->request->get['filter_child'])) {
				$url .= '&filter_child=' . $this->request->get['filter_child'];
			}

			if (isset($this->request->get['filter_top'])) {
				$url .= '&filter_top=' . $this->request->get['filter_top'];
			}

			if (isset($this->request->get['filter_image'])) {
				$url .= '&filter_image=' . $this->request->get['filter_image'];
			}

			if (isset($this->request->get['filter_cat'])) {
				$url .= '&filter_cat=' . urlencode(html_entity_decode($this->request->get['filter_cat'], ENT_QUOTES, 'UTF-8'));
			}

			if (isset($this->request->get['filter_subcat'])) {
				$url .= '&filter_subcat=' . $this->request->get['filter_subcat'];
			}

			if (isset($this->request->get['filter_store'])) {
				$url .= '&filter_store=' . $this->request->get['filter_store'];
			}

			if (isset($this->request->get['filter_seo'])) {
				$url .= '&filter_seo=' . $this->request->get['filter_seo'];
			}

			if (isset($this->request->get['filter_dad'])) {
				$url .= '&filter_dad=' . $this->request->get['filter_dad'];
			}

			if (isset($this->request->get['filter_dade'])) {
				$url .= '&filter_dade=' . $this->request->get['filter_dade'];
			}

			if (isset($this->request->get['filter_dam'])) {
				$url .= '&filter_dam=' . $this->request->get['filter_dam'];
			}

			if (isset($this->request->get['filter_dame'])) {
				$url .= '&filter_dame=' . $this->request->get['filter_dame'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link('catalog/category', 'user_token=' . $this->session->data['user_token'] . $url, true));
		}

		$this->getListCM();
	}

	public function enable_cat() {
		$this->language->load( 'catalog/category');
		$this->document->setTitle($this->language->get('heading_title'));
		$this->load->model('extension/module/categorymanager');

		if (!$this->user->hasPermission('modify', 'catalog/category')) {
			$this->error['warning'] = $this->language->get('error_permission');

		} elseif (isset($this->request->post['selected'])) {

			foreach ($this->request->post['selected'] as $category_id) {
			$this->model_extension_module_categorymanager->enableCategoryCM($category_id);
			}

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '&filter_cm=1';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['filter_id'])) {
				$url .= '&filter_id=' . $this->request->get['filter_id'];
			}

			if (isset($this->request->get['filter_status'])) {
				$url .= '&filter_status=' . $this->request->get['filter_status'];
			}

			if (isset($this->request->get['filter_noindex'])) {
				$url .= '&filter_noindex=' . $this->request->get['filter_noindex'];
			}

			if (isset($this->request->get['filter_product'])) {
				$url .= '&filter_product=' . $this->request->get['filter_product'];
			}

			if (isset($this->request->get['filter_child'])) {
				$url .= '&filter_child=' . $this->request->get['filter_child'];
			}

			if (isset($this->request->get['filter_top'])) {
				$url .= '&filter_top=' . $this->request->get['filter_top'];
			}

			if (isset($this->request->get['filter_image'])) {
				$url .= '&filter_image=' . $this->request->get['filter_image'];
			}

			if (isset($this->request->get['filter_cat'])) {
				$url .= '&filter_cat=' . urlencode(html_entity_decode($this->request->get['filter_cat'], ENT_QUOTES, 'UTF-8'));
			}

			if (isset($this->request->get['filter_subcat'])) {
				$url .= '&filter_subcat=' . $this->request->get['filter_subcat'];
			}

			if (isset($this->request->get['filter_store'])) {
				$url .= '&filter_store=' . $this->request->get['filter_store'];
			}

			if (isset($this->request->get['filter_seo'])) {
				$url .= '&filter_seo=' . $this->request->get['filter_seo'];
			}

			if (isset($this->request->get['filter_dad'])) {
				$url .= '&filter_dad=' . $this->request->get['filter_dad'];
			}

			if (isset($this->request->get['filter_dade'])) {
				$url .= '&filter_dade=' . $this->request->get['filter_dade'];
			}

			if (isset($this->request->get['filter_dam'])) {
				$url .= '&filter_dam=' . $this->request->get['filter_dam'];
			}

			if (isset($this->request->get['filter_dame'])) {
				$url .= '&filter_dame=' . $this->request->get['filter_dame'];
			}

			if (isset($this->request->get['filter_lang'])) {
				$url .= '&filter_lang=' . $this->request->get['filter_lang'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link('catalog/category', 'user_token=' . $this->session->data['user_token'] . $url, true));
		}

		$this->getListCM();
	}

	public function disable_cat() {
		$this->language->load( 'catalog/category');
		$this->document->setTitle($this->language->get('heading_title'));
		$this->load->model('extension/module/categorymanager');

		if (!$this->user->hasPermission('modify', 'catalog/category')) {
			$this->error['warning'] = $this->language->get('error_permission');

		} elseif (isset($this->request->post['selected'])) {

			foreach ($this->request->post['selected'] as $category_id) {
			$this->model_extension_module_categorymanager->disableCategoryCM($category_id);
			}

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '&filter_cm=1';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['filter_id'])) {
				$url .= '&filter_id=' . $this->request->get['filter_id'];
			}

			if (isset($this->request->get['filter_status'])) {
				$url .= '&filter_status=' . $this->request->get['filter_status'];
			}

			if (isset($this->request->get['filter_noindex'])) {
				$url .= '&filter_noindex=' . $this->request->get['filter_noindex'];
			}

			if (isset($this->request->get['filter_product'])) {
				$url .= '&filter_product=' . $this->request->get['filter_product'];
			}

			if (isset($this->request->get['filter_child'])) {
				$url .= '&filter_child=' . $this->request->get['filter_child'];
			}

			if (isset($this->request->get['filter_top'])) {
				$url .= '&filter_top=' . $this->request->get['filter_top'];
			}

			if (isset($this->request->get['filter_image'])) {
				$url .= '&filter_image=' . $this->request->get['filter_image'];
			}

			if (isset($this->request->get['filter_cat'])) {
				$url .= '&filter_cat=' . urlencode(html_entity_decode($this->request->get['filter_cat'], ENT_QUOTES, 'UTF-8'));
			}

			if (isset($this->request->get['filter_subcat'])) {
				$url .= '&filter_subcat=' . $this->request->get['filter_subcat'];
			}

			if (isset($this->request->get['filter_store'])) {
				$url .= '&filter_store=' . $this->request->get['filter_store'];
			}

			if (isset($this->request->get['filter_seo'])) {
				$url .= '&filter_seo=' . $this->request->get['filter_seo'];
			}

			if (isset($this->request->get['filter_dad'])) {
				$url .= '&filter_dad=' . $this->request->get['filter_dad'];
			}

			if (isset($this->request->get['filter_dade'])) {
				$url .= '&filter_dade=' . $this->request->get['filter_dade'];
			}

			if (isset($this->request->get['filter_dam'])) {
				$url .= '&filter_dam=' . $this->request->get['filter_dam'];
			}

			if (isset($this->request->get['filter_dame'])) {
				$url .= '&filter_dame=' . $this->request->get['filter_dame'];
			}

			if (isset($this->request->get['filter_lang'])) {
				$url .= '&filter_lang=' . $this->request->get['filter_lang'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link('catalog/category', 'user_token=' . $this->session->data['user_token'] . $url, true));
		}

		$this->getListCM();
	}
		// CategoryManager end
			
	protected function validateForm() {
		if (!$this->user->hasPermission('modify', 'catalog/category')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		foreach ($this->request->post['category_description'] as $language_id => $value) {
			if ((utf8_strlen($value['name']) < 1) || (utf8_strlen($value['name']) > 255)) {
				$this->error['name'][$language_id] = $this->language->get('error_name');
			}

			// if ((utf8_strlen($value['meta_title']) < 1) || (utf8_strlen($value['meta_title']) > 255)) {
			// 	$this->error['meta_title'][$language_id] = $this->language->get('error_meta_title');
			// }
		}

		if (isset($this->request->get['category_id']) && $this->request->post['parent_id']) {
			$results = $this->model_catalog_category->getCategoryPath($this->request->post['parent_id']);

			foreach ($results as $result) {
				if ($result['path_id'] == $this->request->get['category_id']) {
					$this->error['parent'] = $this->language->get('error_parent');

					break;
				}
			}
		}

		if ($this->request->post['category_seo_url']) {
			$this->load->model('design/seo_url');

			foreach ($this->request->post['category_seo_url'] as $store_id => $language) {
				foreach ($language as $language_id => $keyword) {
					if (!empty($keyword)) {
						if (count(array_keys($language, $keyword)) > 1) {
							//$this->error['keyword'][$store_id][$language_id] = $this->language->get('error_unique');
						}

						$seo_urls = $this->model_design_seo_url->getSeoUrlsByKeyword($keyword);

						foreach ($seo_urls as $seo_url) {
							if (($seo_url['store_id'] == $store_id) && (!isset($this->request->get['category_id']) || ($seo_url['query'] != 'category_id=' . $this->request->get['category_id']))) {
								$this->error['keyword'][$store_id][$language_id] = $this->language->get('error_keyword');

								break;
							}
						}
					}
				}
			}
		}

		if ($this->error && !isset($this->error['warning'])) {
			$this->error['warning'] = $this->language->get('error_warning');
		}

		return !$this->error;
	}

	protected function validateDelete() {
		if (!$this->user->hasPermission('modify', 'catalog/category')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		return !$this->error;
	}

	protected function validateRepair() {
		if (!$this->user->hasPermission('modify', 'catalog/category')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		return !$this->error;
	}


	 public function productsAutocomplete(){
		 $json=array();
		 
		 if(isset($this->request->get['filter_name'])||isset($this->request->get['filter_model'])||isset($this->request->get['filter_category_id'])){
		 
			 $this->load->model('catalog/product');
			 
			 if(isset($this->request->get['filter_name'])){
				$filter_name=$this->request->get['filter_name'];
			 } else {
				$filter_name='';
			 }
			 
			 if(isset($this->request->get['filter_model'])){
				$filter_model=$this->request->get['filter_model'];
			 } else {
				$filter_model='';
			 }
			 if(isset($this->request->get['filter_category_id'])){
				$filter_category=$this->request->get['filter_category_id'];
			 } else {
				$filter_category='';
			 }
			 if(isset($this->request->get['limit'])){
				$limit=$this->request->get['limit'];
			 } else {
				$limit=5000;
			 }
			 
			 $filter_data=array(
				 'filter_category'=>$filter_category,
				 'filter_name'=>$filter_name,
				 'filter_model'=>$filter_model,
				 'start'=>0,
				 'limit'=>$limit
			 );
			 
			 $results = $this->model_catalog_product->getProducts($filter_data);
			 
			 foreach($results as $result){
				 $json[]=array(
					 'product_id'=>$result['product_id'],
					 'name'=>strip_tags(html_entity_decode($result['name'],ENT_QUOTES,'UTF-8')),
					 'model'=>$result['model'],
					 'price'=>$result['price']
				 );
			 }
		 }
		 $this->response->setOutput(json_encode($json));
	 }
			
	public function autocomplete() {
		$json = array();

		if (isset($this->request->get['filter_name'])) {
			$this->load->model('catalog/category');

			$filter_data = array(
				'filter_name' => $this->request->get['filter_name'],
				'sort'        => 'name',
				'order'       => 'ASC',
				'start'       => 0,
				'limit'       => 5
			);


      // OCFilter start
      if (isset($filter_data['filter_name']) && isset($filter_data['limit']) && $filter_data['limit'] == 5) {
        $filter_data['limit'] = 15;
      }
      // OCFilter end
      
			$results = $this->model_catalog_category->getCategories($filter_data);

			foreach ($results as $result) {
				$json[] = array(
					'category_id' => $result['category_id'],
					'name'        => strip_tags(html_entity_decode($result['name'], ENT_QUOTES, 'UTF-8'))
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
}
