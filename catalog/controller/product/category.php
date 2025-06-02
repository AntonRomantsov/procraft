<?php
class ControllerProductCategory extends Controller
{
	public function index()
	{
		$this->load->language('product/category');

		$this->load->model('catalog/category');

		$this->load->model('catalog/product');

		$this->load->model('catalog/spec_filter');

		$this->load->model('tool/image');

		if (isset($this->request->get['filter'])) {
			$filter = $this->request->get['filter'];
		} else {
			$filter = '';
		}

		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'p.price';
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

		if (isset($this->request->get['limit'])) {
			$limit = (int)$this->request->get['limit'];
		} else {
			$limit = $this->config->get('theme_' . $this->config->get('config_theme') . '_product_limit');
		}

		if (isset($this->request->get['ocf'])) {
			$ocf = explode('FV', $this->request->get['ocf']);
			$spec_filter_id = (int)$ocf[1];
		} else {
			$spec_filter_id = 0;
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/home')
		);

		if (isset($this->request->get['path'])) {
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

			$path = '';

			$parts = explode('_', (string)$this->request->get['path']);

			$category_id = (int)array_pop($parts);

			foreach ($parts as $path_id) {
				if (!$path) {
					$path = (int)$path_id;
				} else {
					$path .= '_' . (int)$path_id;
				}

				$category_info = $this->model_catalog_category->getCategory($path_id);

				if ($category_info) {
					$data['breadcrumbs'][] = array(
						'text' => $category_info['name'],
						'href' => $this->url->link('product/category', 'path=' . $path . $url)
					);
				}
			}
		} else {
			$category_id = 0;
		}

		$category_info = $this->model_catalog_category->getCategory($category_id);

		if ($category_info) {
			$this->document->setTitle($category_info['meta_title']);
			$this->document->setDescription($category_info['meta_description']);
			$this->document->setKeywords($category_info['meta_keyword']);

			$data['text_compare'] = sprintf($this->language->get('text_compare'), (isset($this->session->data['compare']) ? count($this->session->data['compare']) : 0));

			// Set the last category breadcrumb
			$data['breadcrumbs'][] = array(
				'text' => $category_info['name'],
				'href' => $this->url->link('product/category', 'path=' . $this->request->get['path'])
			);

			if (isset($this->request->get['ocf'])) {
				$spec_filter_info = $this->model_catalog_spec_filter->getSpecFilter($spec_filter_id);

				$url .= '&ocf=' . $this->request->get['ocf'];

				if ($spec_filter_info) {
					$data['breadcrumbs'][] = array(
						'text' => $spec_filter_info['name'],
						'href' => $this->url->link('product/spec_filter', 'path=' . $this->request->get['path'] . $url)
					);
				}

				$spec_filter_description = html_entity_decode($spec_filter_info['description'], ENT_QUOTES, 'UTF-8');

				if ($spec_filter_info['redirect_category_id']) {
					$this->response->redirect($this->url->link('product/category_id', 'category_id=' .  $spec_filter_info['redirect_category_id'], true));
				}
			}

			$data['heading_title'] = $spec_filter_id ? $spec_filter_info['name'] : $category_info['name'];

			if ($category_info['image']) {
				$data['thumb'] = $this->model_tool_image->resize($category_info['image'], $this->config->get('theme_' . $this->config->get('config_theme') . '_image_category_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_category_height'));
			} else {
				$data['thumb'] = '';
			}

			$data['description'] = $spec_filter_id ? $spec_filter_description : html_entity_decode($category_info['description'], ENT_QUOTES, 'UTF-8');
			$data['compare'] = $this->url->link('product/compare');

			if($category_info['video']){

				$data['video'] = [];

			    require 'system/library/ytchannel/autoload.php'; 
			    $youtube = new Madcoda\Youtube\Youtube(['key' => $this->config->get('module_ytchannel_apikey'), 'referer' => HTTPS_SERVER]);

				$video = $youtube->getVideoInfo($category_info['video']);

			    if (!empty($video->id)) {
                    $data['video'] = [
					    'id' => $category_info['video'],
					    'thumb' => isset($video->snippet->thumbnails->standard->url) ? $video->snippet->thumbnails->standard->url : '',
					    'title' => $video->snippet->title,
					    'views' => $video->statistics->viewCount,
					    'date'  => date($this->language->get('date_format_short'), strtotime($video->snippet->publishedAt))
				    ];
			    }

			}

			$url = '';

			if (isset($this->request->get['filter'])) {
				$url .= '&filter=' . $this->request->get['filter'];
			}

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}

			if (isset($this->request->get['ocf'])) {
				$url .= '&ocf=' . $this->request->get['ocf'];
			}

			$data['categories'] = array();

			$results = $this->model_catalog_category->getCategories($category_id);

			foreach ($results as $result) {
				$filter_data = array(
					'filter_category_id'  => $result['category_id'],
					'filter_sub_category' => true
				);

				if ($result['image']) {
					$image = $this->model_tool_image->resize($result['image'], 180, 180);
				} else {
					$image = $this->model_tool_image->resize('placeholder.png', 180, 180);
				}

				$data['categories'][] = array(
					'name' => $result['name'] . ($this->config->get('config_product_count') ? ' (' . $this->model_catalog_product->getTotalProducts($filter_data) . ')' : ''),
					'href' => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '_' . $result['category_id'] . $url),
					'image' => $image,
				);
			}


			$data['products'] = array();


			$filter_data = array(
				'filter_category_id' => $category_id,
				'filter_filter'      => $filter,
				'sort'               => $sort,
				'order'              => $order,
				'start'              => ($page - 1) * $limit,
				'limit'              => $limit,
				'spec_filter'        => $spec_filter_id
			);

			$product_total = $this->model_catalog_product->getTotalProducts($filter_data);

			$results = $this->model_catalog_product->getProducts($filter_data);
			// apsite
			if ($category_info['parent_id'] > 0) {
				// end apsite

				foreach ($results as $result) {
					$attribute_groups = $this->model_catalog_product->getProductAttributes($result['product_id']);

					if ($result['image']) {
						$image = $this->model_tool_image->resize($result['image'], $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_height'));
					} else {
						$image = $this->model_tool_image->resize('placeholder.png', $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_height'));
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
							if ((float)$product['special'] >= intval($xdstickers['freeshipping']['property'])) {
								$product_xdstickers[] = array(
									'id'            => 'xdsticker_freeshipping',
									'text'          => $xdstickers['freeshipping']['text'][$current_language_id]
								);
							} else if ((float)$product['price'] >= intval($xdstickers['freeshipping']['property'])) {
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

					$w_list = array_column($this->customer->getWishlist(), 'product_id');

					if (in_array($result['product_id'], $w_list)) {
						$wl_class = 'wl-add';
					} else {
						$wl_class = '';
					}

					$is_rotate = $this->model_catalog_product->has360($result['product_id']);

					$percent = ($result['price'] - $result['special']) / $result['price'] * 100;

					$attributes = $this->model_catalog_product->getProductAttributes($result['product_id']);

					if ((strtotime($result['date_added']) + intval($xdstickers['novelty']['property']) * 24 * 3600) > time()) {
						$is_new = true;
					} else {
						$is_new = false;
					}

					$this->load->model('extension/module/giftor');

					$gifts = $this->model_extension_module_giftor->getGiftsByProduct($result['product_id']);

					$data['products'][] = array(
						'product_id'  => $result['product_id'],
						'thumb'       => $image,
						'name'        => $result['name'],
						// apsite
						'attributes'  => $attributes ? array_slice($attributes[0]['attribute'], 0, 4) : array(),
						'reviews'     => sprintf($this->language->get('text_reviews'), $result['reviews']),
						'wl_class' => $wl_class,
						'quantity'    => $result['quantity'],
						// apsite
						'description' => utf8_substr(trim(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8'))), 0, $this->config->get('theme_' . $this->config->get('config_theme') . '_product_description_length')) . '..',
						'price'       => $price,
						'special'     => $special,
						'percent'     => (int)$percent,
						'tax'         => $tax,
						'stock_id'    => $result['stock_status_id'],
						'minimum'     => $result['minimum'] > 0 ? $result['minimum'] : 1,
						'rating'      => $result['rating'],
						'is_rotate'   => $is_rotate,
						'is_new'      => $is_new,
						'gifts'       => $gifts ? true : false,
						'href'        => $this->url->link('product/product', 'path=' . $this->request->get['path'] . '&product_id=' . $result['product_id'] . $url)
					);
				}
				// apsite
			}
			// end apsite

			$url = '';

			if (isset($this->request->get['filter'])) {
				$url .= '&filter=' . $this->request->get['filter'];
			}

			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}

			$data['text_form_stock'] = $this->language->get('text_form_stock');

			$data['sorts'] = array();

			$data['sorts'][] = array(
				'text'  => $this->language->get('text_default'),
				'value' => 'p.sort_order-ASC',
				'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=p.sort_order&order=ASC' . $url)
			);

			$data['sorts'][] = array(
				'text'  => $this->language->get('text_name_asc'),
				'value' => 'pd.name-ASC',
				'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=pd.name&order=ASC' . $url)
			);

			$data['sorts'][] = array(
				'text'  => $this->language->get('text_name_desc'),
				'value' => 'pd.name-DESC',
				'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=pd.name&order=DESC' . $url)
			);

			$data['sorts'][] = array(
				'text'  => $this->language->get('text_price_asc'),
				'value' => 'p.price-ASC',
				'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=p.price&order=ASC' . $url)
			);

			$data['sorts'][] = array(
				'text'  => $this->language->get('text_price_desc'),
				'value' => 'p.price-DESC',
				'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=p.price&order=DESC' . $url)
			);

			if ($this->config->get('config_review_status')) {
				$data['sorts'][] = array(
					'text'  => $this->language->get('text_rating_desc'),
					'value' => 'rating-DESC',
					'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=rating&order=DESC' . $url)
				);

				$data['sorts'][] = array(
					'text'  => $this->language->get('text_rating_asc'),
					'value' => 'rating-ASC',
					'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=rating&order=ASC' . $url)
				);
			}

			$data['sorts'][] = array(
				'text'  => $this->language->get('text_model_asc'),
				'value' => 'p.model-ASC',
				'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=p.model&order=ASC' . $url)
			);

			$data['sorts'][] = array(
				'text'  => $this->language->get('text_model_desc'),
				'value' => 'p.model-DESC',
				'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=p.model&order=DESC' . $url)
			);

			$url = '';

			if (isset($this->request->get['filter'])) {
				$url .= '&filter=' . $this->request->get['filter'];
			}

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			$data['limits'] = array();

			$limits = array_unique(array($this->config->get('theme_' . $this->config->get('config_theme') . '_product_limit'), 25, 50, 75, 100));

			sort($limits);

			foreach ($limits as $value) {
				$data['limits'][] = array(
					'text'  => $value,
					'value' => $value,
					'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . $url . '&limit=' . $value)
				);
			}

			$results = $this->model_catalog_spec_filter->getCategoryFilters($category_id);

			foreach ($results as $result) {

				if ($result['image']) {
					$image = $this->model_tool_image->resize($result['image'], 100, 100);
				} else {
					$image = $this->model_tool_image->resize('placeholder.png', 100, 100);
				}

				$data['filters'][] = array(
					'value_id' => $result['spec_filter_id'],
					'name' => $result['name'],
					'image' => $image,
					'href' => $result['redirect_category_id'] ? $this->url->link('product/category', 'path=' . $result['redirect_category_id']) : $this->url->link('product/category', 'path=' . $category_id . '&spec_filter=OCF' . $result['spec_filter_id'])
				);
			}

			$url = '';

			if (isset($this->request->get['filter'])) {
				$url .= '&filter=' . $this->request->get['filter'];
			}

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}

			if (isset($this->request->get['ocf'])) {
				$url .= '&ocf=' . $this->request->get['ocf'];
			}

			$pagination = new Pagination();
			$pagination->total = $product_total;
			$pagination->page = $page;
			$pagination->limit = $limit;
			$pagination->url = $this->url->link('product/category', 'path=' . $this->request->get['path'] . $url . '&page={page}');

			$data['pagination'] = $pagination->render();

			$data['results'] = sprintf($this->language->get('text_pagination'), ($product_total) ? (($page - 1) * $limit) + 1 : 0, ((($page - 1) * $limit) > ($product_total - $limit)) ? $product_total : ((($page - 1) * $limit) + $limit), $product_total, ceil($product_total / $limit));

			// http://googlewebmastercentral.blogspot.com/2011/09/pagination-with-relnext-and-relprev.html
			if ($page == 1) {
				$this->document->addLink($this->url->link('product/category', 'path=' . $category_info['category_id']), 'canonical');
			} else {
				$this->document->addLink($this->url->link('product/category', 'path=' . $category_info['category_id'] . '&page=' . $page), 'canonical');
			}

			if ($page > 1) {
				$this->document->addLink($this->url->link('product/category', 'path=' . $category_info['category_id'] . (($page - 2) ? '&page=' . ($page - 1) : '')), 'prev');
			}

			if ($limit && ceil($product_total / $limit) > $page) {
				$this->document->addLink($this->url->link('product/category', 'path=' . $category_info['category_id'] . '&page=' . ($page + 1)), 'next');
			}

			$data['sort'] = $sort;
			$data['order'] = $order;
			$data['limit'] = $limit;

			$data['continue'] = $this->url->link('common/home');

			$data['column_left'] = $this->load->controller('common/column_left');
			$data['column_right'] = $this->load->controller('common/column_right');
			$data['content_top'] = $this->load->controller('common/content_top');
			$data['content_bottom'] = $this->load->controller('common/content_bottom');
			$data['footer'] = $this->load->controller('common/footer');
			$data['header'] = $this->load->controller('common/header');

			$this->response->setOutput($this->load->view('product/category', $data));
		} else {
			$url = '';

			if (isset($this->request->get['path'])) {
				$url .= '&path=' . $this->request->get['path'];
			}

			if (isset($this->request->get['filter'])) {
				$url .= '&filter=' . $this->request->get['filter'];
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
				'href' => $this->url->link('product/category', $url)
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
}
