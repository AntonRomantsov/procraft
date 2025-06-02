<?php
class ControllerCommonHeader extends Controller {
	public function index() {

        $data['cp_setting']         = (array)$this->config->get('cart_popup_setting');
        $data['cp_customer_group_id'] = ($this->customer->isLogged()) ? (int)$this->customer->getGroupId() : (int)$this->config->get('config_customer_group_id');
        $data['cp_store_id']          = (int)$this->config->get('config_store_id');
      

					// XD Stickers start
						$this->load->model('setting/setting');
						$xdstickers = $this->config->get('xdstickers');
						$data['xdstickers_status'] = $this->config->get('module_xdstickers_status');
						if ($data['xdstickers_status']) {
							$data['xdstickers'] = array();
							$data['xdstickers_custom'] = array();
							$data['xdstickers_position'] = $xdstickers['position'];
							$data['xdstickers_inline_styles'] = $xdstickers['inline_styles'];
							$data['xdstickers'][] = array(
								'id'			=> 'xdsticker_sale',
								'bg'			=> $xdstickers['sale']['bg'],
								'color'			=> $xdstickers['sale']['color'],
								'status'		=> $xdstickers['sale']['status'],
							);
							$data['xdstickers'][] = array(
								'id'			=> 'xdsticker_bestseller',
								'bg'			=> $xdstickers['bestseller']['bg'],
								'color'			=> $xdstickers['bestseller']['color'],
								'status'		=> $xdstickers['bestseller']['status'],
							);
							$data['xdstickers'][] = array(
								'id'			=> 'xdsticker_novelty',
								'bg'			=> $xdstickers['novelty']['bg'],
								'color'			=> $xdstickers['novelty']['color'],
								'status'		=> $xdstickers['novelty']['status'],
							);
							$data['xdstickers'][] = array(
								'id'			=> 'xdsticker_last',
								'bg'			=> $xdstickers['last']['bg'],
								'color'			=> $xdstickers['last']['color'],
								'status'		=> $xdstickers['last']['status'],
							);
							$data['xdstickers'][] = array(
								'id'			=> 'xdsticker_freeshipping',
								'bg'			=> $xdstickers['freeshipping']['bg'],
								'color'			=> $xdstickers['freeshipping']['color'],
								'status'		=> $xdstickers['freeshipping']['status'],
							);

							if (isset($xdstickers['stock']) && !empty($xdstickers['stock'])) {
								foreach($xdstickers['stock'] as $key => $value) {
									if (isset($value['status']) && $value['status'] == '1') {
										$data['xdstickers'][] = array(
											'id'			=> 'xdsticker_stock_' . $key,
											'bg'			=> $value['bg'],
											'color'			=> $value['color'],
											'status'		=> $value['status'],
										);
									}
								}
							}

							// CUSTOM stickers
							$this->load->model('extension/module/xdstickers');
							$custom_xdstickers = $this->model_extension_module_xdstickers->getCustomXDStickers();
							if (!empty($custom_xdstickers)) {
								foreach ($custom_xdstickers as $custom_xdsticker) {
									$custom_sticker_id = 'xdsticker_' . $custom_xdsticker['xdsticker_id'];
									$data['xdstickers_custom'][] = array(
										'id'			=> $custom_sticker_id,
										'bg'			=> $custom_xdsticker['bg_color'],
										'color'			=> $custom_xdsticker['color_color'],
										'status'		=> $custom_xdsticker['status'],
									);
								}
							}
						}
					// XD Stickers end
				
// Clear Thinking: Redirect Manager
				$this->load->model('extension/module/redirect_manager');
				$this->model_extension_module_redirect_manager->redirect();
				// end

			// Datetime Picker
			if(VERSION >= '3.0.0.0') {
			$this->document->addScript('catalog/view/javascript/jquery/magnific/jquery.magnific-popup.min.js');
			$this->document->addStyle('catalog/view/javascript/jquery/magnific/magnific-popup.css');
			$this->document->addScript('catalog/view/javascript/jquery/datetimepicker/moment/moment.min.js');
			$this->document->addScript('catalog/view/javascript/jquery/datetimepicker/moment/moment-with-locales.min.js');
			$this->document->addScript('catalog/view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.js');
			$this->document->addStyle('catalog/view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.css');
			} else {
			$this->document->addScript('catalog/view/javascript/jquery/datetimepicker/moment.js');
			$this->document->addScript('catalog/view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.js');
			$this->document->addStyle('catalog/view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.css');
			}

			// Color Picker
			$this->document->addStyle('catalog/view/javascript/jquery/formbuilder/colorpicker/css/colorpicker.css');
			$this->document->addScript('catalog/view/javascript/jquery/formbuilder/colorpicker/js/colorpicker.js');

			// Dropzone
			$this->document->addStyle('catalog/view/javascript/jquery/formbuilder/dropzone/dist/dropzone.css');
			$this->document->addScript('catalog/view/javascript/jquery/formbuilder/dropzone/dist/dropzone.js');

			// Extension Script
			$this->document->addScript('catalog/view/javascript/jquery/formbuilder/formbuilder.js');

			// Extension Style
			$this->document->addStyle('catalog/view/theme/default/stylesheet/ciformbuilder/style.css');
			
		// Analytics
		$this->load->model('setting/extension');

		$data['analytics'] = array();

		$analytics = $this->model_setting_extension->getExtensions('analytics');

		foreach ($analytics as $analytic) {
			if ($this->config->get('analytics_' . $analytic['code'] . '_status')) {
				$data['analytics'][] = $this->load->controller('extension/analytics/' . $analytic['code'], $this->config->get('analytics_' . $analytic['code'] . '_status'));
			}
		}

		if ($this->request->server['HTTPS']) {
			$server = $this->config->get('config_ssl');
		} else {
			$server = $this->config->get('config_url');
		}

		if (is_file(DIR_IMAGE . $this->config->get('config_icon'))) {
			//$this->document->addLink($server . 'image/' . $this->config->get('config_icon'), 'icon');
			$data['favicon'] = '/image/' . $this->config->get('config_icon');
		}

		$this->document->addStyle('catalog/view/javascript/jquery/swiper/css/swiper.min.css');
		$this->document->addStyle('catalog/view/javascript/jquery/swiper/css/opencart.css');
		$this->document->addScript('catalog/view/javascript/jquery/swiper/js/swiper.jquery.js');
		$this->document->addStyle('catalog/view/javascript/jquery/fancybox/jquery.fancybox.min.css');
		$this->document->addScript('catalog/view/javascript/jquery/fancybox/jquery.fancybox.min.js');
		$this->document->addScript('catalog/view/javascript/jquery/jquery.maskedinput.js');

		$data['title'] = $this->document->getTitle();

		$data['base'] = $server;
		$data['description'] = $this->document->getDescription();
		$data['keywords'] = $this->document->getKeywords();
		$data['links'] = $this->document->getLinks();
		$data['styles'] = $this->document->getStyles();
		$data['scripts'] = $this->document->getScripts('header');
		$data['lang'] = $this->language->get('code');
		$data['direction'] = $this->language->get('direction');

		 if ($data['lang'] == 'ru') {
                    $data['hreflang'] = 'ru-UA';
                } else if ($data['lang'] == 'ua') {
                    $data['hreflang'] = 'uk-UA';
                } else {
                    $data['hreflang'] = $data['lang'];
                }

                $data['uri'] = $_SERVER['REQUEST_URI'];

		$data['name'] = $this->config->get('config_name');

		$this->load->model('localisation/language');

		$codes = $this->model_localisation_language->getCodes();

		// if((!in_array(substr($data['uri'], 1, 2), $codes)) && ((substr($data['uri'], -5, 5) != '.html'))){
		// 	header("Location: /ua" . $data['uri'],TRUE,301);
  //           exit();
		// }

		if (is_file(DIR_IMAGE . $this->config->get('config_logo'))) {
			$data['logo'] = $server . 'image/' . $this->config->get('config_logo');
		} else {
			$data['logo'] = '';
		}

		$this->load->language('common/header');

		// Wishlist
		// if ($this->customer->isLogged()) {
		// 	$this->load->model('account/wishlist');

		// 	$data['text_wishlist'] = sprintf($this->language->get('text_wishlist'), $this->model_account_wishlist->getTotalWishlist());
		// } else {
		// 	$data['text_wishlist'] = sprintf($this->language->get('text_wishlist'), (isset($this->session->data['wishlist']) ? count($this->session->data['wishlist']) : 0));
		// }
		$data['text_wishlist'] = sprintf($this->language->get('text_wishlist'), $this->customer->getTotalWishlist());

		$data['link'] = $_SERVER['REQUEST_URI'];
		$data['lg_code'] = substr($this->session->data['language'], -2, 2);

		$data['notmainpage'] = ($data['link'] != '/' . $data['lg_code']) ? true : false;
		
		$data['text_logged'] = sprintf($this->language->get('text_logged'), $this->url->link('account/account', '', true), $this->customer->getFirstName(), $this->url->link('account/logout', '', true));

		$data['text_show'] = $this->language->get('text_show');
		$data['text_call_receiving'] = $this->language->get('text_call_receiving');
		$data['text_schedule1'] = $this->language->get('text_schedule1');
		$data['text_schedule1'] = $this->language->get('text_schedule1');
		$data['text_callback'] = $this->language->get('text_callback');
		$data['text_message_sent'] = $this->language->get('text_message_sent');
		$data['text_wait'] = $this->language->get('text_wait');
		
		$data['home'] = $this->url->link('common/home');
		$data['wishlist'] = $this->url->link('account/wishlist', '', true);
		$data['logged'] = $this->customer->isLogged();
		$data['account'] = $this->url->link('account/account', '', true);
		$data['register'] = $this->url->link('account/register', '', true);
		$data['login'] = $this->url->link('account/login', '', true);
		$data['order'] = $this->url->link('account/order', '', true);
		$data['transaction'] = $this->url->link('account/transaction', '', true);
		$data['download'] = $this->url->link('account/download', '', true);
		$data['logout'] = $this->url->link('account/logout', '', true);
		$data['forgotten_link'] = $this->url->link('account/forgotten', '', true);
		$data['shopping_cart'] = $this->url->link('checkout/cart');
		$data['checkout'] = $this->url->link('checkout/checkout', '', true);
		$data['contact'] = $this->url->link('information/contact');
		$data['telephone'] = $this->config->get('config_telephone');
		$data['email'] = $this->config->get('config_email');

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
	
		
		$data['language'] = $this->load->controller('common/language');
		$data['currency'] = $this->load->controller('common/currency');
		$data['search'] = $this->load->controller('common/search');
		$data['cart'] = $this->load->controller('common/cart');
		$data['menu'] = $this->load->controller('common/menu');
		$data['mob_menu'] = $this->load->controller('common/mob_menu');

		$data['action_forgotten'] = $this->url->link('account/forgotten', '', true);
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
		// if(!isset($_COOKIE['holiday_popup']) || !$_COOKIE['holiday_popup'] ){
        // 	$data['holiday_popup'] = 1;
        // 	setcookie('holiday_popup', 1, time() + 60 * 60 * 24 * 2);
        // }else{
        // 	$data['holiday_popup'] = 0;
        // }
		$data['login_name'] = $this->customer->getFirstName();

		return $this->load->view('common/header3', $data);
	}
}
