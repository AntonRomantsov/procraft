<?php
class ControllerCommonHome extends Controller {
	public function index() {
		$this->document->setTitle($this->config->get('config_meta_title'));
		$this->document->setDescription($this->config->get('config_meta_description'));
		$this->document->setKeywords($this->config->get('config_meta_keyword'));

		if (isset($this->request->get['route'])) {
			$this->document->addLink($this->config->get('config_url'), 'canonical');
		}

		$this->document->addScript('catalog/view/javascript/jquery/jquery.maskedinput.js');

		$this->load->language('common/header');

		if ($this->request->server['HTTPS']) {
			$server = $this->config->get('config_ssl');
		} else {
			$server = $this->config->get('config_url');
		}

		if (is_file(DIR_IMAGE . $this->config->get('config_logo'))) {
			$data['logo'] = $server . 'image/' . $this->config->get('config_logo');
		} else {
			$data['logo'] = '';
		}

		$data['logged'] = $this->customer->isLogged();
		$data['account'] = $this->url->link('account/account', '', true);
		$data['action'] = $this->url->link('account/login', '', true);

		if ($this->customer->isLogged() && $this->config->get('total_discount_status')) {
			$this->load->model('account/customer');

			$data['customer_order_total'] = $this->model_account_customer->getOrderTotals($this->customer->getId());

			$discounts = $this->config->get('config_discount');
			$discounts = explode('|', $discounts);
			$new_discounts = array();
			foreach ($discounts as $discount) {
				$tmp = explode(':', $discount);
				$new_discounts[$tmp[0]] = $tmp[1];
			}

			$new_discounts = array_reverse($new_discounts, true);

			foreach ($new_discounts as $discount_percent => $new_discount) {
				if ((float)$data['customer_order_total'] >= $new_discount) {
					$data['customer_percent'] = $discount_percent;
					break;
				}
			}
		}
		$data['login_name'] = $this->customer->getFirstName();

		$data['categories'] = array();

		$categories = $this->model_catalog_category->getCategories(0);

		foreach ($categories as $category) {
			if ($category['top']) {
				// Level 2
				$children_data = array();

				$children = $this->model_catalog_category->getCategories($category['category_id']);

				foreach ($children as $child) {
					$filter_data = array(
						'filter_category_id'  => $child['category_id'],
						'filter_sub_category' => true
					);

					if ($child['image']) {
						$image = $this->model_tool_image->resize($child['image'], 80, 80);
					} else {
						$image = $this->model_tool_image->resize('placeholder.png', 80, 80);
					}

					$children_data[] = array(
						'name'  => $child['name'] . ($this->config->get('config_product_count') ? ' (' . $this->model_catalog_product->getTotalProducts($filter_data) . ')' : ''),
						'image' => $image,
						'href'  => $this->url->link('product/category', 'path=' . $category['category_id'] . '_' . $child['category_id'])
					);
				}



				// Level 1
				$data['categories'][] = array(
					'category_id' => $category['category_id'],
					'name'     => $category['name'],
					'children' => $children_data,
					'column'   => $category['column'] ? $category['column'] : 1,
					'href'     => $this->url->link('product/category', 'path=' . $category['category_id'])
				);
			}
		}
		$data['href_acum'] = $this->url->link('common/presentation');

		$data['text_wishlist'] = $this->customer->getTotalWishlist();
		$data['cart'] = $this->load->controller('common/cart');
		//$data['menu'] = $this->load->controller('common/menu');
		$data['wishlist'] = $this->url->link('account/wishlist', '', true);
		$data['catalog'] = $this->url->link('product/catalog');

		$data['link_register'] = $this->url->link('account/instrument');
		$data['link_delivery'] = $this->url->link('information/information&information_id=6');
		$data['link_services'] = $this->url->link('information/information&information_id=10');
		$data['link_black_list'] = $this->url->link('information/information&information_id=11');
		$data['link_partner'] = $this->url->link('information/information&information_id=8');
		$data['link_about'] = $this->url->link('information/information&information_id=4');
		$data['link_bestseller'] = substr($this->session->data['language'], 3, 2) . '/xity-prodazh';
		$data['link_news'] = substr($this->session->data['language'], 3, 2) . '/news';
		$data['link_special'] = substr($this->session->data['language'], 3, 2) . '/aktsii';
		$data['link_blog'] = substr($this->session->data['language'], 3, 2) . '/blog';
	    $data['link_store'] = $this->url->link('information/information&information_id=7');
		$data['register'] = $this->url->link('account/register', '', true);

		$data['content_full'] = $this->load->controller('common/content_full');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');
		$data['language'] = $this->load->controller('common/language');

		$this->response->setOutput($this->load->view('common/home', $data));
	}
}
