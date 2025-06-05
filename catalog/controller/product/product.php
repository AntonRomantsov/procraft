<?php
class ControllerProductProduct extends Controller
{
	const QUESTION_FORM_ID = 4;

	private $error = array();

	public function index(){
		$this->load->language('product/product');

		$this->document->addStyle('catalog/view/javascript/jquery/slick/slick.css');
		$this->document->addScript('catalog/view/javascript/jquery/slick/slick.min.js', 'footer');

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/home')
		);

		if (isset($this->request->get['tab'])) {
			$tab = (int)$this->request->get['tab'];
		} else {
			$tab = 0;
		}

		$data['url'] = str_replace(['?tab=' . $tab, '&tab=' . $tab], '', $_SERVER['REQUEST_URI']);

		$data['tab'] = $tab;

		$this->load->model('catalog/category');

		$product_path = $this->getPathByProductPATH($this->request->get['product_id']);

		if ($product_path) {
			$path = '';

			$parts = explode('_', (string)$product_path);

			$category_id = (int)array_pop($parts);

			foreach ($parts as $path_id) {
				if (!$path) {
					$path = $path_id;
				} else {
					$path .= '_' . $path_id;
				}

				$category_info = $this->model_catalog_category->getCategory($path_id);

				if ($category_info) {
					$data['breadcrumbs'][] = array(
						'text' => $category_info['name'],
						'href' => $this->url->link('product/category', 'path=' . $path)
					);
				}
			}

			// Set the last category breadcrumb
			$category_info = $this->model_catalog_category->getCategory($category_id);

			if ($category_info) {
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

				$data['breadcrumbs'][] = array(
					'text' => $category_info['name'],
					'href' => $this->url->link('product/category', 'path=' . $this->request->get['path'] . $url)
				);
			}
		}

		if (isset($this->request->get['path'])) {
			$path = '';

			$parts = explode('_', (string)$this->request->get['path']);

			$category_id = (int)array_pop($parts);

			foreach ($parts as $path_id) {
				if (!$path) {
					$path = $path_id;
				} else {
					$path .= '_' . $path_id;
				}

				$category_info = $this->model_catalog_category->getCategory($path_id);

				if ($category_info) {
					// $data['breadcrumbs'][] = array(
					// 	'text' => $category_info['name'],
					// 	'href' => $this->url->link('product/category', 'path=' . $path)
					// );
				}
			}

			// Set the last category breadcrumb
			$category_info = $this->model_catalog_category->getCategory($category_id);

			if ($category_info) {
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

				// $data['breadcrumbs'][] = array(
				// 	'text' => $category_info['name'],
				// 	'href' => $this->url->link('product/category', 'path=' . $this->request->get['path'] . $url)
				// );
			}
		}

		$this->load->model('catalog/manufacturer');

		if (isset($this->request->get['manufacturer_id'])) {
			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('text_brand'),
				'href' => $this->url->link('product/manufacturer')
			);

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

			$manufacturer_info = $this->model_catalog_manufacturer->getManufacturer($this->request->get['manufacturer_id']);

			if ($manufacturer_info) {
				// $data['breadcrumbs'][] = array(
				// 	'text' => $manufacturer_info['name'],
				// 	'href' => $this->url->link('product/manufacturer/info', 'manufacturer_id=' . $this->request->get['manufacturer_id'] . $url)
				// );
			}
		}

		if (isset($this->request->get['search']) || isset($this->request->get['tag'])) {
			$url = '';

			if (isset($this->request->get['search'])) {
				$url .= '&search=' . $this->request->get['search'];
			}

			if (isset($this->request->get['tag'])) {
				$url .= '&tag=' . $this->request->get['tag'];
			}

			if (isset($this->request->get['description'])) {
				$url .= '&description=' . $this->request->get['description'];
			}

			if (isset($this->request->get['category_id'])) {
				$url .= '&category_id=' . $this->request->get['category_id'];
			}

			if (isset($this->request->get['sub_category'])) {
				$url .= '&sub_category=' . $this->request->get['sub_category'];
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

			// $data['breadcrumbs'][] = array(
			// 	'text' => $this->language->get('text_search'),
			// 	'href' => $this->url->link('product/search', $url)
			// );
		}

		if (isset($this->request->get['product_id'])) {
			$product_id = (int)$this->request->get['product_id'];
		} else {
			$product_id = 0;
		}

		$this->load->model('catalog/product');

		$product_info = $this->model_catalog_product->getProduct($product_id);

		if ($product_info) {
			$url = '';

			if (isset($this->request->get['path'])) {
				$url .= '&path=' . $this->request->get['path'];
			}

			if (isset($this->request->get['filter'])) {
				$url .= '&filter=' . $this->request->get['filter'];
			}

			if (isset($this->request->get['manufacturer_id'])) {
				$url .= '&manufacturer_id=' . $this->request->get['manufacturer_id'];
			}

			if (isset($this->request->get['search'])) {
				$url .= '&search=' . $this->request->get['search'];
			}

			if (isset($this->request->get['tag'])) {
				$url .= '&tag=' . $this->request->get['tag'];
			}

			if (isset($this->request->get['description'])) {
				$url .= '&description=' . $this->request->get['description'];
			}

			if (isset($this->request->get['category_id'])) {
				$url .= '&category_id=' . $this->request->get['category_id'];
			}

			if (isset($this->request->get['sub_category'])) {
				$url .= '&sub_category=' . $this->request->get['sub_category'];
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

			if (isset($this->request->get['tab'])) {
				$url .= '&tab=' . $this->request->get['tab'];
			}

			$data['url'] = $_SERVER['REQUEST_URI'];

			$data['breadcrumbs'][] = array(
				'text' => $product_info['name'],
				'href' => $this->url->link('product/product', $url . '&product_id=' . $this->request->get['product_id'])
			);

			$this->document->setTitle($product_info['meta_title']);
			$this->document->setDescription($product_info['meta_description']);
			$this->document->setKeywords($product_info['meta_keyword']);
			$this->document->addLink($this->url->link('product/product', 'product_id=' . $this->request->get['product_id']), 'canonical');
			$this->document->addScript('catalog/view/javascript/jquery/magnific/jquery.magnific-popup.min.js');
			$this->document->addStyle('catalog/view/javascript/jquery/magnific/magnific-popup.css');
			$this->document->addScript('catalog/view/javascript/jquery/datetimepicker/moment/moment.min.js');
			$this->document->addScript('catalog/view/javascript/jquery/datetimepicker/moment/moment-with-locales.min.js');
			$this->document->addScript('catalog/view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.js');
			$this->document->addStyle('catalog/view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.css');

			$data['heading_title'] = $product_info['name'];

			$data['text_minimum'] = sprintf($this->language->get('text_minimum'), $product_info['minimum']);
			$data['text_login'] = sprintf($this->language->get('text_login'), $this->url->link('account/login', '', true), $this->url->link('account/register', '', true));

			$this->load->model('catalog/review');

			$data['product_id'] = (int)$this->request->get['product_id'];
			$data['href_link'] = HTTPS_SERVER . 'image/' . $product_info['image'];
			$data['manufacturer'] = $product_info['manufacturer'];
			$data['manufacturers'] = $this->url->link('product/manufacturer/info', 'manufacturer_id=' . $product_info['manufacturer_id']);
			$data['model2'] = mb_strtoupper($product_info['model']);
			$data['model'] = $product_info['sku'];
			$data['reward'] = $product_info['reward'];
			$data['points'] = $product_info['points'];
			$data['description'] = html_entity_decode($product_info['description'], ENT_QUOTES, 'UTF-8');

			$data['materials_instruction'] = $product_info['materials_instruction'];
			$data['materials_draw'] = $product_info['materials_draw'];

			$garanties = explode("\r\n", $product_info['garanty']);

			$data['garanties'] = implode(' / ', $garanties);

			$w_list = array_column($this->customer->getWishlist(), 'product_id');

			if (in_array($product_info['product_id'], $w_list)) {
				$data['wl_class'] = 'wl-add';
				$data['wl_prefix'] = '';
			} else {
				$data['wl_class'] = '';
				$data['wl_prefix'] = '-o';
			}

			if ($product_info['quantity'] <= 0 && $product_info['stock_status_id'] != 7) {
				$data['stock'] = $this->language->get('text_notstock');
				$data['stock_class'] = '';
				$data['stock_pos'] = true;
			} else {
				$data['stock'] = $this->language->get('text_instock');
				$data['stock_class'] = 'instock';
				$data['stock_pos'] = false;
			}

			$this->load->model('tool/image');

			if ($product_info['image']) {
				$data['popup'] = $this->model_tool_image->resize($product_info['image'], $this->config->get('theme_' . $this->config->get('config_theme') . '_image_popup_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_popup_height'));
			} else {
				$data['popup'] = '';
			}

			if ($product_info['image']) {
				$data['thumb'] = $this->model_tool_image->resize($product_info['image'], $this->config->get('theme_' . $this->config->get('config_theme') . '_image_thumb_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_thumb_height'));
			} else {
				$data['thumb'] = '';
			}

			$data['images'] = array();

			$results = $this->model_catalog_product->getProductImages($this->request->get['product_id']);

			foreach ($results as $result) {
				if ($result['image']) {
					$data['images'][] = array(
						'popup' => $this->model_tool_image->resize($result['image'], $this->config->get('theme_' . $this->config->get('config_theme') . '_image_popup_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_popup_height')),
						'thumb' =>  $this->model_tool_image->resize($result['image'], $this->config->get('theme_' . $this->config->get('config_theme') . '_image_additional_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_additional_height')),
						'sort_order' => $result['sort_order']
					);
				} else {
					$data['images'][] = array(
						'thumb' => preg_replace('/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i', '//img.youtube.com/vi/$1/mqdefault.jpg', $result['video_url']),
						'video_url' => isset($result['video_url']) && $result['video_url'] ? preg_replace('/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i', '//www.youtube.com/embed/$1', $result['video_url']) : '',
						'sort_order' => $result['sort_order']
					);
				}
			}
			$video_arrs = $this->model_catalog_product->getProductImages($this->request->get['product_id']);

			$data['first_images'] = array_slice($data['images'], 0, 6);
			$data['last_images'] = array_slice($data['images'], 6);
			$data['count_last_images'] = count($data['last_images']);

			// XD Stickers start
			$this->load->model('setting/setting');
			$xdstickers = $this->config->get('xdstickers');
			$current_language_id = $this->config->get('config_language_id');
			$product_xdstickers = array();
			$product_xdstickers_custom = array();
			$data['xdstickers_position'] = ($xdstickers['position'] == '0') ? ' position_upleft' : ' position_upright';
			$data['xdstickers_status'] = $this->config->get('module_xdstickers_status');
			if ($data['xdstickers_status']) {
				if ($xdstickers['sale']['status'] == '1' && $product_info['special']) {
					if ($xdstickers['sale']['discount_status'] == '1') {
						$sale_value = ceil(((float)$product_info['price'] - (float)$product_info['special']) / ((float)$product_info['price'] * 0.01));
						$sale_text = $xdstickers['sale']['text'][$current_language_id] . ' -' . strval($sale_value) . '%';
					} else {
						$sale_text = $xdstickers['sale']['text'][$current_language_id];
					}
					$product_xdstickers[] = array(
						'id'            => 'xdsticker_sale',
						'text'          => $sale_text
					);
				}
				if ($xdstickers['bestseller']['status'] == '1') {
					$bestsellers = $this->model_catalog_product->getBestSellerProducts((int)$xdstickers['bestseller']['property']);
					foreach ($bestsellers as $bestseller) {
						if ($bestseller['product_id'] == $product_id) {
							$product_xdstickers[] = array(
								'id'            => 'xdsticker_bestseller',
								'text'          => $xdstickers['bestseller']['text'][$current_language_id]
							);
						}
					}
				}
				if ($xdstickers['novelty']['status'] == '1') {
					if ((strtotime($product_info['date_added']) + intval($xdstickers['novelty']['property']) * 24 * 3600) > time()) {
						$product_xdstickers[] = array(
							'id'            => 'xdsticker_novelty',
							'text'          => $xdstickers['novelty']['text'][$current_language_id]
						);
					}
				}
				if ($xdstickers['last']['status'] == '1') {
					if ($product_info['quantity'] <= intval($xdstickers['last']['property']) && $product_info['quantity'] > 0) {
						$product_xdstickers[] = array(
							'id'            => 'xdsticker_last',
							'text'          => $xdstickers['last']['text'][$current_language_id]
						);
					}
				}
				if ($xdstickers['freeshipping']['status'] == '1') {
					if ((float)$product_info['special'] >= intval($xdstickers['freeshipping']['property'])) {
						$product_xdstickers[] = array(
							'id'            => 'xdsticker_freeshipping',
							'text'          => $xdstickers['freeshipping']['text'][$current_language_id]
						);
					} else if ((float)$product_info['price'] >= intval($xdstickers['freeshipping']['property'])) {
						$product_xdstickers[] = array(
							'id'            => 'xdsticker_freeshipping',
							'text'          => $xdstickers['freeshipping']['text'][$current_language_id]
						);
					}
				}

				// STOCK stickers
				if (isset($xdstickers['stock']) && !empty($xdstickers['stock'])) {
					foreach ($xdstickers['stock'] as $key => $value) {
						if (isset($value['status']) && $value['status'] == '1' && $key == $product_info['stock_status_id'] && $product_info['quantity'] <= 0) {
							$product_xdstickers[] = array(
								'id'            => 'xdsticker_stock_' . $key,
								'text'          => $product_info['stock_status']
							);
						}
					}
				}

				// CUSTOM stickers
				$this->load->model('extension/module/xdstickers');
				$custom_xdstickers_id = $this->model_extension_module_xdstickers->getCustomXDStickersProduct($product_id);
				if (!empty($custom_xdstickers_id)) {
					foreach ($custom_xdstickers_id as $custom_xdsticker_id) {
						$custom_xdsticker = $this->model_extension_module_xdstickers->getCustomXDSticker($custom_xdsticker_id['xdsticker_id']);
						$custom_xdsticker_text = json_decode($custom_xdsticker['text'], true);
						// var_dump($custom_xdsticker);
						if ($custom_xdsticker['status'] == '1') {
							$custom_sticker_class = 'xdsticker_' . $custom_xdsticker_id['xdsticker_id'];
							$product_xdstickers_custom[] = array(
								'id'            => $custom_sticker_class,
								'text'          => $custom_xdsticker_text[$current_language_id]
							);
						}
					}
				}
			}
			// XD Stickers end

			if ((strtotime($product_info['date_added']) + intval($xdstickers['novelty']['property']) * 24 * 3600) > time()) {
				$data['is_new'] = true;
			} else {
				$data['is_new'] = false;
			}

			$this->load->model('extension/module/giftor');

			$product_gifts = $this->model_extension_module_giftor->getGiftsByProduct($product_id);

			if (!empty($product_gifts)) {

				$this->load->model('tool/image');
				$this->load->model('catalog/product');

				$product_current = $product_id;
				$data['product_name'] = $product_current['name'];

				$data['position'] = $this->config->get($this->prefix . 'giftor_position');
				$data['css'] = $this->config->get($this->prefix . 'giftor_css');

				$data['product_gifts'] = array();

				foreach ($product_gifts as $key => $product_gift) {
					$gift_product_info = $this->model_catalog_product->getProduct($product_gift['product_id']);
					if ($gift_product_info['image']) {
						$image = $this->model_tool_image->resize($gift_product_info['image'], $this->config->get('module_giftor_width'), $this->config->get('module_giftor_height'));
					} else {
						$image = $this->model_tool_image->resize('placeholder.png', $this->config->get('module_giftor_width'), $this->config->get('module_giftor_height'));
					}

					if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
						$price = $this->currency->format($this->tax->calculate($gift_product_info['price'], $gift_product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
					} else {
						$price = false;
					}

					if (!is_null($gift_product_info['special']) && (float)$gift_product_info['special'] >= 0) {
						$special = $this->currency->format($this->tax->calculate($gift_product_info['special'], $gift_product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
					} else {
						$special = false;
					}


					$data['product_gifts'][$product_gift['product_id']] = array(
						'product_id' => $gift_product_info['product_id'],
						'name' => $gift_product_info['name'],
						'thumb' => $image,
						'price' => $price,
						'special' => $special,
						'quantity' => $gift_product_info['quantity'],
						'min_total' => $product_gift['min_total'],
						'max_total' => $product_gift['max_total'],
						'date_start' => date($this->language->get('date_format_short'), strtotime($product_gift['date_start'])),
						'date_end' => date($this->language->get('date_format_short'), strtotime($product_gift['date_end'])),
						'href' => $this->url->link('product/product', 'product_id=' . $product_gift['product_id'], true),
						'i' => $key + 1,
						'last_price' => $special ? $special : $price
					);
				}

				$data['count_gifts'] = count($data['product_gifts']);

				if (!empty($data['product_gifts'])) {

					$insert = array_values($data['product_gifts'])[0];

					$input = array('{product_name}', '{gift_name}', '{gift_price}', '{gift_quantity}', '{min_order_total}', '{max_order_total}', '{date_start}', '{date_end}');
					$output = array($data['product_name'], $insert['name'], $insert['price'], $insert['quantity'], $insert['min_total'], $insert['max_total'], $insert['date_start'], $insert['date_end']);

					$title = $this->config->get($this->prefix . 'giftor_description')[$this->config->get('config_language_id')]['title'];
					if ($title) {
						$data['gift_title'] = str_replace($input, $output, $title);
					} else {
						$data['gift_title'] = '';
					}

					$description = $this->config->get($this->prefix . 'giftor_description')[$this->config->get('config_language_id')]['description'];
					if ($description) {
						$data['gift_description'] = html_entity_decode(str_replace($input, $output, $description), ENT_QUOTES, 'UTF-8');
					} else {
						$data['gift_description'] = '';
					}
				}
			}

			foreach ($video_arrs as $key => $video_arr) {
				$data['video_item'][$key] = array(
					'video_link' => isset($video_arr['video_url']) && $video_arr['video_url'] ? preg_replace('/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i', '//www.youtube.com/embed/$1', $video_arr['video_url']) : '',
					'video_img' => isset($video_arr['video_url']) && $video_arr['video_url'] ? preg_replace('/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i', '//img.youtube.com/vi/$1/mqdefault.jpg', $video_arr['video_url']) : ''
				);

				if (isset($video)) {
					continue;
				}

				if ($data['video_item'][$key]['video_link']) {
					$video_arr = explode('/', $data['video_item'][$key]['video_link']);
					$video = $video_arr[count($video_arr) - 1];
				}
			}

			if (isset($video)) {

				$data['video'] = [];

				require 'system/library/ytchannel/autoload.php';
				$youtube = new Madcoda\Youtube\Youtube(['key' => $this->config->get('module_ytchannel_apikey'), 'referer' => HTTPS_SERVER]);

				$video = $youtube->getVideoInfo($video);

				if (!empty($video->id)) {
					$data['video'] = [
						'id' => $video->id,
						'thumb' => isset($video->snippet->thumbnails->standard->url) ? $video->snippet->thumbnails->standard->url : '',
						'title' => $video->snippet->title,
						'views' => $video->statistics->viewCount,
						'date'  => date($this->language->get('date_format_short'), strtotime($video->snippet->publishedAt))
					];
				}
			}

			if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
				$data['price'] = $this->currency->format($this->tax->calculate($product_info['price'], $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
				$data['price_int'] = $this->tax->calculate($product_info['price'], $product_info['tax_class_id'], $this->config->get('config_tax'));
			} else {
				$data['price'] = false;
				$data['price_int'] = false;
			}

			if (!is_null($product_info['special']) && (float)$product_info['special'] >= 0) {
				$data['special'] = $this->currency->format($this->tax->calculate($product_info['special'], $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
				$data['special_int'] = $this->tax->calculate($product_info['special'], $product_info['tax_class_id'], $this->config->get('config_tax'));
				$tax_price = (float)$product_info['special'];
				$dis = $product_info['price'] - $product_info['special'];
				$data['dis'] = $this->currency->format($this->tax->calculate($dis, $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
				$data['percent'] = $dis / $product_info['price'] * 100;
				$data['percent'] = (int)$data['percent'];
			} else {
				$data['special'] = false;
				$data['special_int'] = false;
				$tax_price = (float)$product_info['price'];
				$data['dis'] = false;
			}

			$data['text_discount2'] = $this->language->get('text_discount2');

			$data['draw'] = $product_info['materials_draw'] ? 'image/' . $product_info['materials_draw'] : '';

			$data['text_draw'] = sprintf($this->language->get('text_draw'), $product_info['name']);

			$data['instruction'] = $product_info['materials_instruction'] ? 'image/' . $product_info['materials_instruction'] : '';

			if ($this->config->get('config_tax')) {
				$data['tax'] = $this->currency->format($tax_price, $this->session->data['currency']);
			} else {
				$data['tax'] = false;
			}

			$discounts = $this->model_catalog_product->getProductDiscounts($this->request->get['product_id']);

			$data['discounts'] = array();

			foreach ($discounts as $discount) {
				$data['discounts'][] = array(
					'quantity' => $discount['quantity'],
					'price'    => $this->currency->format($this->tax->calculate($discount['price'], $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency'])
				);
			}

			$data['options'] = array();

			foreach ($this->model_catalog_product->getProductOptions($this->request->get['product_id']) as $option) {
				$product_option_value_data = array();

				foreach ($option['product_option_value'] as $option_value) {
					if (!$option_value['subtract'] || ($option_value['quantity'] > 0)) {
						if ((($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) && (float)$option_value['price']) {
							$price = $this->currency->format($this->tax->calculate($option_value['price'], $product_info['tax_class_id'], $this->config->get('config_tax') ? 'P' : false), $this->session->data['currency']);
						} else {
							$price = false;
						}

						$product_option_value_data[] = array(
							'product_option_value_id' => $option_value['product_option_value_id'],
							'option_value_id'         => $option_value['option_value_id'],
							'name'                    => $option_value['name'],
							'image'                   => $this->model_tool_image->resize($option_value['image'], 50, 50),
							'price'                   => $price,
							'price_prefix'            => $option_value['price_prefix']
						);
					}
				}

				$data['options'][] = array(
					'product_option_id'    => $option['product_option_id'],
					'product_option_value' => $product_option_value_data,
					'option_id'            => $option['option_id'],
					'name'                 => $option['name'],
					'type'                 => $option['type'],
					'value'                => $option['value'],
					'required'             => $option['required']
				);
			}

			if ($product_info['minimum']) {
				$data['minimum'] = $product_info['minimum'];
			} else {
				$data['minimum'] = 1;
			}

			$data['review_status'] = $this->config->get('config_review_status');

			if ($this->config->get('config_review_guest') || $this->customer->isLogged()) {
				$data['review_guest'] = true;
			} else {
				$data['review_guest'] = false;
			}

			if ($this->customer->isLogged()) {
				$data['customer_name'] = $this->customer->getFirstName() . '&nbsp;' . $this->customer->getLastName();
			} else {
				$data['customer_name'] = '';
			}

			$data['reviews'] = sprintf($this->language->get('text_reviews'), (int)$product_info['reviews']);
			$data['rating'] = (int)$product_info['rating'];

			// Captcha
			if ($this->config->get('captcha_' . $this->config->get('config_captcha') . '_status') && in_array('review', (array)$this->config->get('config_captcha_page'))) {
				$data['captcha'] = $this->load->controller('extension/captcha/' . $this->config->get('config_captcha'));
			} else {
				$data['captcha'] = '';
			}

			$data['share'] = $this->url->link('product/product', 'product_id=' . (int)$this->request->get['product_id']);

			$data['attribute_groups'] = $this->model_catalog_product->getProductAttributes($this->request->get['product_id']);
			$data['parts_groups'] = $this->model_catalog_product->getProductAttributes($this->request->get['product_id'], true);

			$data['attributes'] = $data['attribute_groups'][0]['attribute'];

			$data['main_attributes'] = array_slice($data['attribute_groups'][0]['attribute'], 0, 4);

			$data['another_attributes'] = array_slice($data['attribute_groups'][0]['attribute'], 4);

			$data['complectation'] = $data['parts_groups'][0]['attribute'];

			$data['products'] = array();

			$results = $this->model_catalog_product->getProductRelated($this->request->get['product_id']);

			foreach ($results as $result) {
				if ($result['image']) {
					$image = $this->model_tool_image->resize($result['image'], $this->config->get('theme_' . $this->config->get('config_theme') . '_image_related_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_related_height'));
				} else {
					$image = $this->model_tool_image->resize('placeholder.png', $this->config->get('theme_' . $this->config->get('config_theme') . '_image_related_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_related_height'));
				}

				if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
					$price = $this->currency->format($this->tax->calculate($result['price'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
				} else {
					$price = false;
				}

				if (!is_null($result['special']) && (float)$result['special'] >= 0) {
					$special = $this->currency->format($this->tax->calculate($result['special'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
					$tax_price = (float)$result['special'];
				} else {
					$special = false;
					$tax_price = (float)$result['price'];
				}

				if ($this->config->get('config_tax')) {
					$tax = $this->currency->format($tax_price, $this->session->data['currency']);
				} else {
					$tax = false;
				}

				if ($this->config->get('config_review_status')) {
					$rating = (int)$result['rating'];
				} else {
					$rating = false;
				}

				// XD Stickers start
				$this->load->model('setting/setting');
				$xdstickers = $this->config->get('xdstickers');
				$current_language_id = $this->config->get('config_language_id');
				$product_xdstickers = array();
				$product_xdstickers_custom = array();
				$data['xdstickers_position'] = ($xdstickers['position'] == '0') ? ' position_upleft' : ' position_upright';
				$data['xdstickers_status'] = $this->config->get('module_xdstickers_status');
				if ($data['xdstickers_status']) {
					if ($xdstickers['sale']['status'] == '1' && $special) {
						if ($xdstickers['sale']['discount_status'] == '1') {
							$sale_value = ceil(((float)$result['price'] - (float)$result['special']) / ((float)$result['price'] * 0.01));
							$sale_text = $xdstickers['sale']['text'][$current_language_id] . ' -' . strval($sale_value) . '%';
						} else {
							$sale_text = $xdstickers['sale']['text'][$current_language_id];
						}
						$product_xdstickers[] = array(
							'id'            => 'xdsticker_sale',
							'text'          => $sale_text
						);
					}
					if ($xdstickers['bestseller']['status'] == '1') {
						$bestsellers = $this->model_catalog_product->getBestSellerProducts((int)$xdstickers['bestseller']['property']);
						foreach ($bestsellers as $bestseller) {
							if ($bestseller['product_id'] == $result['product_id']) {
								$product_xdstickers[] = array(
									'id'            => 'xdsticker_bestseller',
									'text'          => $xdstickers['bestseller']['text'][$current_language_id]
								);
							}
						}
					}
					if ($xdstickers['novelty']['status'] == '1') {
						if ((strtotime($result['date_added']) + intval($xdstickers['novelty']['property']) * 24 * 3600) > time()) {
							$product_xdstickers[] = array(
								'id'            => 'xdsticker_novelty',
								'text'          => $xdstickers['novelty']['text'][$current_language_id]
							);
						}
					}
					if ($xdstickers['last']['status'] == '1') {
						if ($result['quantity'] <= intval($xdstickers['last']['property']) && $result['quantity'] > 0) {
							$product_xdstickers[] = array(
								'id'            => 'xdsticker_last',
								'text'          => $xdstickers['last']['text'][$current_language_id]
							);
						}
					}
					if ($xdstickers['freeshipping']['status'] == '1') {
						if ((float)$result['special'] >= intval($xdstickers['freeshipping']['property'])) {
							$product_xdstickers[] = array(
								'id'            => 'xdsticker_freeshipping',
								'text'          => $xdstickers['freeshipping']['text'][$current_language_id]
							);
						} else if ((float)$result['price'] >= intval($xdstickers['freeshipping']['property'])) {
							$product_xdstickers[] = array(
								'id'            => 'xdsticker_freeshipping',
								'text'          => $xdstickers['freeshipping']['text'][$current_language_id]
							);
						}
					}

					// STOCK stickers
					if (isset($xdstickers['stock']) && !empty($xdstickers['stock'])) {
						foreach ($xdstickers['stock'] as $key => $value) {
							if (isset($value['status']) && $value['status'] == '1' && $key == $result['stock_status_id'] && $result['quantity'] <= 0) {
								$product_xdstickers[] = array(
									'id'            => 'xdsticker_stock_' . $key,
									'text'          => $result['stock_status']
								);
							}
						}
					}

					// CUSTOM stickers
					$this->load->model('extension/module/xdstickers');
					$custom_xdstickers_id = $this->model_extension_module_xdstickers->getCustomXDStickersProduct($result['product_id']);
					if (!empty($custom_xdstickers_id)) {
						foreach ($custom_xdstickers_id as $custom_xdsticker_id) {
							$custom_xdsticker = $this->model_extension_module_xdstickers->getCustomXDSticker($custom_xdsticker_id['xdsticker_id']);
							$custom_xdsticker_text = json_decode($custom_xdsticker['text'], true);
							// var_dump($custom_xdsticker);
							if ($custom_xdsticker['status'] == '1') {
								$custom_sticker_class = 'xdsticker_' . $custom_xdsticker_id['xdsticker_id'];
								$product_xdstickers_custom[] = array(
									'id'            => $custom_sticker_class,
									'text'          => $custom_xdsticker_text[$current_language_id]
								);
							}
						}
					}
				}
				// XD Stickers end

				if ((strtotime($result['date_added']) + intval($xdstickers['novelty']['property']) * 24 * 3600) > time()) {
					$is_new = true;
				} else {
					$is_new = false;
				}

				$gifts = $this->model_extension_module_giftor->getGiftsByProduct($result['product_id']);

				$percent = ($result['price'] - $result['special']) / $result['price'] * 100;

				$data['products'][] = array(
					'product_id'  => $result['product_id'],
					'thumb'       => $image,
					'name'        => $result['name'],
					'description' => utf8_substr(trim(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8'))), 0, $this->config->get('theme_' . $this->config->get('config_theme') . '_product_description_length')) . '..',
					'price'       => $price,
					'special'     => $special,
					'tax'         => $tax,
					'minimum'     => $result['minimum'] > 0 ? $result['minimum'] : 1,
					'rating'      => $rating,
					'is_new'      => $is_new,
					'percent'     => (int)$percent,
					'gifts'       => $gifts ? true : false,
					'href'        => $this->url->link('product/product', 'product_id=' . $result['product_id'])
				);
			}

			$results = $this->model_catalog_product->getKitPart($this->request->get['product_id']);

			$data['kit_part'] = array();

			foreach ($results as $result) {
				$attribute_groups = $this->model_catalog_product->getProductAttributes($result['product_id']);
				$parts_groups = $this->model_catalog_product->getProductAttributes($result['product_id'], true);
				$images_info = $this->model_catalog_product->getProductImages($result['product_id']);

				$images = array();

				foreach ($images_info as $image) {
					if ($image['image']) {
						$images[] = array(
							'popup' => $this->model_tool_image->resize($image['image'], $this->config->get('theme_' . $this->config->get('config_theme') . '_image_popup_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_popup_height')),
							'thumb' =>  $this->model_tool_image->resize($image['image'], $this->config->get('theme_' . $this->config->get('config_theme') . '_image_additional_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_additional_height')),
							'sort_order' => $image['sort_order']
						);
					} else {
						$images[] = array(
							'thumb' => preg_replace('/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i', '//img.youtube.com/vi/$1/mqdefault.jpg', $image['video_url']),
							'video_url' => isset($image['video_url']) && $image['video_url'] ? preg_replace('/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i', '//www.youtube.com/embed/$1', $image['video_url']) : '',
							'sort_order' => $image['sort_order']
						);
					}
				}

				$data['kit_part'][] = array(
					'product_id'  => $result['product_id'],
					'name'        => $result['name'],
					'href'        => $this->url->link('product/product', 'product_id=' . $result['product_id']),
					'thumb'       => $this->model_tool_image->resize($result['image'], $this->config->get('theme_' . $this->config->get('config_theme') . '_image_additional_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_additional_height')),
					'popup'       => $this->model_tool_image->resize($result['image'], $this->config->get('theme_' . $this->config->get('config_theme') . '_image_popup_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_popup_height')),
					'images'      => $images,
					'attribute_groups' => $attribute_groups,
					'parts_groups' => $parts_groups
				);
			}

			$data['text_kit_part_attr'] = $this->language->get('text_kit_part_attr');
			$data['text_kit_part_parts'] = $this->language->get('text_kit_part_parts');

			$data['tags'] = array();

			if ($product_info['tag']) {
				$tags = explode(',', $product_info['tag']);

				foreach ($tags as $tag) {
					$data['tags'][] = array(
						'tag'  => trim($tag),
						'href' => $this->url->link('product/search', 'tag=' . trim($tag))
					);
				}
			}

			$data['recurrings'] = $this->model_catalog_product->getProfiles($this->request->get['product_id']);

			$this->model_catalog_product->updateViewed($this->request->get['product_id']);

			$this->load->model('catalog/review');

			$reviews_data = $this->model_catalog_review->getReviewsByProductId($this->request->get['product_id']);

			foreach ($reviews_data as $result) {
				$data['all_reviews'][] = array(
					'id'         => $result['review_id'],
					'author'     => $result['author'],
					'text'       => nl2br($result['text']),
					'rating'     => (int)$result['rating'],
					'likes'      => $result['likes'],
					'dislikes'   => $result['dislikes'],
					'answers'    => $this->model_catalog_review->getCountAnswers($result['review_id']),
					'date_added' => date($this->language->get('date_format_short'), strtotime($result['date_added']))
				);
			}

			$reviews_count = $this->model_catalog_review->getTotalFeedbacks($this->request->get['product_id']);

			$data['reviews_count'] = $reviews_count['total'];

			$data['tab_review'] = sprintf($this->language->get('tab_review'), $data['reviews_count']);

			$feedbacks_info = $this->model_catalog_review->getFeedbacks($this->request->get['product_id']);

			$data['feedbacks'] = array();

			foreach ($feedbacks_info as $key => $feedback) {
				$data['feedbacks'][$key] = array(
					'id'         => $feedback['review_id'],
					'author'     => $feedback['author'],
					'text'       => nl2br($feedback['text']),
					'rating'     => (int)$feedback['rating'],
					'likes'      => $feedback['likes'],
					'dislikes'   => $feedback['dislikes'],
					'answers_count'    => $this->model_catalog_review->getCountAnswers($feedback['review_id']),
					'date_added' => date($this->language->get('date_format_short'), strtotime($feedback['date_added']))
				);

				$answers = $this->model_catalog_review->getAnswers($feedback['review_id'], 'start');

				$data['feedbacks'][$key]['answers'] = array();

				foreach ($answers as $answer) {
					$data['feedbacks'][$key]['answers'][] = array(
						'id'         => $answer['review_id'],
						'author'     => $answer['author'],
						'text'       => nl2br($answer['text']),
						'rating'     => (int)$answer['rating'],
						'likes'      => $answer['likes'],
						'dislikes'   => $answer['dislikes'],
						'date_added' => date($this->language->get('date_format_short'), strtotime($answer['date_added']))
					);
				}
			}

			$part_count = ($data['reviews_count'] <= 10) ? $data['reviews_count'] : 10;

			$data['part_count'] = $part_count;

			$percent_reviews = $part_count / $data['reviews_count'] * 100;

			$data['percent_reviews'] = (int)$percent_reviews;

			$data['text_show_reviews'] = sprintf($this->language->get('text_show_reviews'), $part_count, $data['reviews_count']);

			$data['to_wishlist'] = $this->url->link('account/wishlist/add');
			$data['from_wishlist'] = $this->url->link('account/wishlist/remove');

			$this->load->model('page/form');

			$form_info = $this->model_page_form->getPageForm(self::QUESTION_FORM_ID);

			$data['q_form'] = array(
				'id' => self::QUESTION_FORM_ID,
				'title' => $form_info['title'],
				'description' => html_entity_decode($form_info['description'], ENT_QUOTES, 'UTF-8'),
				'submit_button' => $form_info['submit_button']
			);

			$data['main_reviews'] = array_slice($data['all_reviews'], 0, 2);
			$data['another_reviews'] = array_slice($data['all_reviews'], 2);

			$data['column_left'] = $this->load->controller('common/column_left');
			$data['column_right'] = $this->load->controller('common/column_right');
			$data['content_top'] = $this->load->controller('common/content_top');
			$data['content_bottom'] = $this->load->controller('common/content_bottom');
			$data['footer'] = $this->load->controller('common/footer');
			$data['header'] = $this->load->controller('common/header');

			$this->response->setOutput($this->load->view('product/product', $data));
		} else {
			$url = '';

			if (isset($this->request->get['path'])) {
				$url .= '&path=' . $this->request->get['path'];
			}

			if (isset($this->request->get['filter'])) {
				$url .= '&filter=' . $this->request->get['filter'];
			}

			if (isset($this->request->get['manufacturer_id'])) {
				$url .= '&manufacturer_id=' . $this->request->get['manufacturer_id'];
			}

			if (isset($this->request->get['search'])) {
				$url .= '&search=' . $this->request->get['search'];
			}

			if (isset($this->request->get['tag'])) {
				$url .= '&tag=' . $this->request->get['tag'];
			}

			if (isset($this->request->get['description'])) {
				$url .= '&description=' . $this->request->get['description'];
			}

			if (isset($this->request->get['category_id'])) {
				$url .= '&category_id=' . $this->request->get['category_id'];
			}

			if (isset($this->request->get['sub_category'])) {
				$url .= '&sub_category=' . $this->request->get['sub_category'];
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
				'href' => $this->url->link('product/product', $url . '&product_id=' . $product_id)
			);

			$this->document->setTitle($this->language->get('text_error'));

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

	public function review()
	{
		$this->load->language('product/product');

		$this->load->model('catalog/review');

		if (isset($this->request->get['page'])) {
			$page = (int)$this->request->get['page'];
		} else {
			$page = 1;
		}

		$data['reviews'] = array();

		$review_total = $this->model_catalog_review->getTotalReviewsByProductId($this->request->get['product_id']);

		$results = $this->model_catalog_review->getReviewsByProductId($this->request->get['product_id'], ($page - 1) * 5, 5);

		foreach ($results as $result) {
			$data['reviews'][] = array(
				'id'         => $result['review_id'],
				'author'     => $result['author'],
				'text'       => nl2br($result['text']),
				'rating'     => (int)$result['rating'],
				'likes'      => $result['likes'],
				'dislikes'   => $result['dislikes'],
				'answers'    => $this->model_catalog_review->getCountAnswers($result['review_id']),
				'date_added' => date($this->language->get('date_format_short'), strtotime($result['date_added']))
			);
		}

		$pagination = new Pagination();
		$pagination->total = $review_total;
		$pagination->page = $page;
		$pagination->limit = 5;
		$pagination->url = $this->url->link('product/product/review', 'product_id=' . $this->request->get['product_id'] . '&page={page}');

		$data['pagination'] = $pagination->render();

		$data['set_answer'] = $this->language->get('set_answer');
		$data['count_answer'] = $this->language->get('count_answer');

		$data['results'] = sprintf($this->language->get('text_pagination'), ($review_total) ? (($page - 1) * 5) + 1 : 0, ((($page - 1) * 5) > ($review_total - 5)) ? $review_total : ((($page - 1) * 5) + 5), $review_total, ceil($review_total / 5));

		$this->response->setOutput($this->load->view('product/review', $data));
	}

	public function write()
	{
		$this->load->language('product/product');

		$json = array();

		if ($this->request->server['REQUEST_METHOD'] == 'POST') {
			if ((utf8_strlen($this->request->post['name']) < 3) || (utf8_strlen($this->request->post['name']) > 25)) {
				$json['error'] = $this->language->get('error_name');
			}

			if ((utf8_strlen($this->request->post['text']) < 25) || (utf8_strlen($this->request->post['text']) > 1000)) {
				$json['error'] = $this->language->get('error_text');
			}

			if (empty($this->request->post['rating']) || $this->request->post['rating'] < 0 || $this->request->post['rating'] > 5) {
				$json['error'] = $this->language->get('error_rating');
			}

			// Captcha
			if ($this->config->get('captcha_' . $this->config->get('config_captcha') . '_status') && in_array('review', (array)$this->config->get('config_captcha_page'))) {
				$captcha = $this->load->controller('extension/captcha/' . $this->config->get('config_captcha') . '/validate');

				if ($captcha) {
					$json['error'] = $captcha;
				}
			}

			if (!isset($json['error'])) {
				$this->load->model('catalog/review');

				$this->model_catalog_review->addReview($this->request->get['product_id'], $this->request->post);

				$json['success'] = $this->language->get('text_success');
			}
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	public function getRecurringDescription()
	{
		$this->load->language('product/product');
		$this->load->model('catalog/product');

		if (isset($this->request->post['product_id'])) {
			$product_id = $this->request->post['product_id'];
		} else {
			$product_id = 0;
		}

		if (isset($this->request->post['recurring_id'])) {
			$recurring_id = $this->request->post['recurring_id'];
		} else {
			$recurring_id = 0;
		}

		if (isset($this->request->post['quantity'])) {
			$quantity = $this->request->post['quantity'];
		} else {
			$quantity = 1;
		}

		$product_info = $this->model_catalog_product->getProduct($product_id);

		$recurring_info = $this->model_catalog_product->getProfile($product_id, $recurring_id);

		$json = array();

		if ($product_info && $recurring_info) {
			if (!$json) {
				$frequencies = array(
					'day'        => $this->language->get('text_day'),
					'week'       => $this->language->get('text_week'),
					'semi_month' => $this->language->get('text_semi_month'),
					'month'      => $this->language->get('text_month'),
					'year'       => $this->language->get('text_year'),
				);

				if ($recurring_info['trial_status'] == 1) {
					$price = $this->currency->format($this->tax->calculate($recurring_info['trial_price'] * $quantity, $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
					$trial_text = sprintf($this->language->get('text_trial_description'), $price, $recurring_info['trial_cycle'], $frequencies[$recurring_info['trial_frequency']], $recurring_info['trial_duration']) . ' ';
				} else {
					$trial_text = '';
				}

				$price = $this->currency->format($this->tax->calculate($recurring_info['price'] * $quantity, $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);

				if ($recurring_info['duration']) {
					$text = $trial_text . sprintf($this->language->get('text_payment_description'), $price, $recurring_info['cycle'], $frequencies[$recurring_info['frequency']], $recurring_info['duration']);
				} else {
					$text = $trial_text . sprintf($this->language->get('text_payment_cancel'), $price, $recurring_info['cycle'], $frequencies[$recurring_info['frequency']], $recurring_info['duration']);
				}

				$json['success'] = $text;
			}
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	private function getPathByProductPATH($product_id)
	{
		$product_id = (int)$product_id;
		if ($product_id < 1) return false;

		static $path = null;
		if (!isset($path)) {
			$path = $this->cache->get('product.seopath');
			if (!isset($path)) $path = array();
		}

		if (!isset($path[$product_id])) {
			$query = $this->db->query("SELECT category_id FROM " . DB_PREFIX . "product_to_category WHERE product_id = '" . $product_id . "' ORDER BY main_category DESC LIMIT 1");

			$path[$product_id] = $this->getPathByCategoryPATH($query->num_rows ? (int)$query->row['category_id'] : 0);

			$this->cache->set('product.seopath', $path);
		}

		return $path[$product_id];
	}

	private function getPathByCategoryPATH($category_id)
	{
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
			for ($i = $max_level - 1; $i >= 0; --$i) {
				$sql .= ",t$i.category_id";
			}
			$sql .= ") AS path FROM " . DB_PREFIX . "category t0";
			for ($i = 1; $i < $max_level; ++$i) {
				$sql .= " LEFT JOIN " . DB_PREFIX . "category t$i ON (t$i.category_id = t" . ($i - 1) . ".parent_id)";
			}
			$sql .= " WHERE t0.category_id = '" . $category_id . "'";

			$query = $this->db->query($sql);

			$path[$category_id] = $query->num_rows ? $query->row['path'] : false;

			$this->cache->set('category.seopath', $path);
		}

		return $path[$category_id];
	}

	public function more_reviews()
	{
		$offset = $this->request->get['count'];

		$this->load->model('catalog/review');

		$feedbacks = $this->model_catalog_review->getFeedbacks($this->request->get['product_id'], $offset);

		$data = array();

		foreach ($feedbacks as $key => $feedback) {
			$data['feedbacks'][$key] = array(
				'id'         => $feedback['review_id'],
				'author'     => $feedback['author'],
				'text'       => nl2br($feedback['text']),
				'rating'     => (int)$feedback['rating'],
				'likes'      => $feedback['likes'],
				'dislikes'   => $feedback['dislikes'],
				'answers_count'    => $this->model_catalog_review->getCountAnswers($feedback['review_id']),
				'date_added' => date($this->language->get('date_format_short'), strtotime($feedback['date_added']))
			);

			$answers = $this->model_catalog_review->getAnswers($feedback['review_id'], 'start');

			$data['feedbacks'][$key]['answers'] = array();

			foreach ($answers as $answer) {
				$data['feedbacks'][$key]['answers'][] = array(
					'id'         => $answer['review_id'],
					'author'     => $answer['author'],
					'text'       => nl2br($answer['text']),
					'rating'     => (int)$answer['rating'],
					'likes'      => $answer['likes'],
					'dislikes'   => $answer['dislikes'],
					'date_added' => date($this->language->get('date_format_short'), strtotime($answer['date_added']))
				);
			}
		}

		$data['offset'] = $this->request->get['count'];

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($data));
	}

	public function more_answers()
	{

		$this->load->model('catalog/review');

		$answers = $this->model_catalog_review->getAnswers($this->request->get['feedback_id'], 'all');

		$data = array();

		foreach ($answers as $answer) {
			$data['answers'][] = array(
				'id'         => $answer['review_id'],
				'author'     => $answer['author'],
				'text'       => nl2br($answer['text']),
				'rating'     => (int)$answer['rating'],
				'likes'      => $answer['likes'],
				'dislikes'   => $answer['dislikes'],
				'date_added' => date($this->language->get('date_format_short'), strtotime($answer['date_added']))
			);
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($data));
	}
}
