<?php
class ControllerExtensionModuleOwlCarousel extends Controller
{
    protected $path = array();

    public function index($setting)
    {
        static $module = 0;
        $modules = array();

        if ($setting['show_tabs'] && !empty($setting['display_with']) && is_array($setting['display_with'])) {
            $this->load->model('setting/module');

            $modules[] = $setting;

            foreach ($setting['display_with'] as $id => $checked) {
                $setting_info = $this->model_setting_module->getModule($id);

                if ($setting_info && $setting_info['status']) {
                    $modules[] = $setting_info;
                }
            }
        } else {
            $modules[] = $setting;
        }

        $data['modules'] = array();

        $this->language->load('extension/module/owlcarousel');
        $data['text_form_stock'] = $this->language->get('text_form_stock');

        $this->load->model('catalog/product');
        $this->load->model('extension/module/giftor');

        if (!((isset($this->request->get['route']) && $this->request->get['route'] == 'product/product') && ($setting['category_id'] == 'viewed' && $setting['hide_module'] == 1))) {
            $this->document->addStyle('catalog/view/javascript/jquery/owl-carousel/owl.carousel.css');
            $this->document->addScript('catalog/view/javascript/jquery/owl-carousel/owl.carousel.min.js');
        }

        foreach ($modules as $mid => $setting) {
            $vars = array();

            if ($setting['title']) {
                $vars['heading_title'] = $setting['title'][$this->config->get('config_language_id')];
            } else {
                $category = $this->model_catalog_category->getCategory($setting['category_id']);
                if (isset($category['name'])) {
                    $vars['heading_title'] = $category['name'];
                } else {
                    $vars['heading_title'] = $this->language->get('heading_title');
                }
            }

            $vars['visible']            = $setting['visible'];
            $vars['visible_1000']       = $setting['visible_1000'];
            $vars['visible_900']        = $setting['visible_900'];
            $vars['visible_600']        = $setting['visible_600'];
            $vars['visible_479']        = $setting['visible_479'];
            $vars['add_class_name']     = $setting['add_class_name'];
            $vars['sort']               = $setting['sort'];
            $vars['show_title']         = $setting['show_title'];
            $vars['show_name']          = $setting['show_name'];
            $vars['show_desc']          = $setting['show_desc'];
            $vars['show_price']         = $setting['show_price'];
            $vars['show_rate']          = $setting['show_rate'];
            $vars['show_cart']          = $setting['show_cart'];
            $vars['show_wishlist']      = $setting['show_wishlist'];
            $vars['show_compare']       = $setting['show_compare'];
            $vars['show_stop_on_hover'] = $setting['show_stop_on_hover'];
            $vars['show_tabs']          = $setting['show_tabs'];
            $vars['show_page']          = $setting['show_page'];
            $vars['show_nav']           = $setting['show_nav'];
            $vars['show_lazy_load']     = $setting['show_lazy_load'];
            $vars['show_mouse_drag']    = $setting['show_mouse_drag'];
            $vars['show_touch_drag']    = $setting['show_touch_drag'];
            $vars['show_per_page']      = $setting['show_per_page'];
            $vars['show_random_item']   = $setting['show_random_item'];

            if ($setting['slide_speed'] > 0) {
                $vars['slide_speed'] = $setting['slide_speed'];
            } else {
                $vars['slide_speed'] = 0;
            }

            if ($setting['pagination_speed'] > 0) {
                $vars['pagination_speed'] = $setting['pagination_speed'];
            } else {
                $vars['pagination_speed'] = 0;
            }

            if ($setting['autoscroll'] > 0) {
                $vars['autoscroll'] = $setting['autoscroll'];
            } else {
                $vars['autoscroll'] = 0;
            }

            if ($setting['item_prev_next'] > 0) {
                $vars['item_prev_next'] = $setting['item_prev_next'];
            } else {
                $vars['item_prev_next'] = 0;
            }

            if (isset($setting['rewind_speed']) && $setting['rewind_speed'] > 0) {
                $vars['rewind_speed'] = $setting['rewind_speed'];
            } else {
                $vars['rewind_speed'] = 0;
            }

            $this->load->model('extension/module/owlcarousel');
            $this->load->model('tool/image');

            if (isset($setting['use_cache'])) {
                $this->model_extension_module_owlcarousel->setCache($setting['use_cache'] ? 1 : 0);
            }

            if (isset($this->request->get['path'])) {
                $this->path = explode('_', $this->request->get['path']);
                $this->category_id = end($this->path);
            }

            $url = '';

            $vars['products'] = array();

            if ($setting['category_id'] == 'featured' || $setting['category_id'] == 'viewed' || $setting['category_id'] == 'bestseller' || $setting['category_id'] == 'news' || $setting['category_id'] == 'special') {
                $vars['products'] = $this->getCurrentProducts($setting);
            } else {
                $vars['products'] = $this->getCategoryProducts($setting);
            }

            if ($setting['category_id'] == 'bestseller') {
                $data['link'] = substr($this->session->data['language'], 3, 2) . '/xity-prodazh';
            } elseif ($setting['category_id'] == 'news') {
                $data['link'] = substr($this->session->data['language'], 3, 2) . '/news';
            } elseif ($setting['category_id'] == 'special') {
                $data['link'] = substr($this->session->data['language'], 3, 2) . '/aktsii';
            } elseif ($setting['category_id'] == 'featured' || $setting['category_id'] == 'viewed') {
                $data['link'] = false;
            } else {
                $data['link'] = $this->url->link('product/category', 'path=' . $setting['category_id']);
            }

            $vars['module'] = $module;
            $module++;

            $data['modules'][$mid] = $vars;

            $data['module'] = $module++;
        }

        $sort_order = array();

        if (!((isset($this->request->get['route']) && $this->request->get['route'] == 'product/product') && ($setting['category_id'] == 'viewed' && $setting['hide_module'] == 1))) {
            return $this->load->view('extension/module/owlcarousel', $data);
        }
    }

    public function getCategoryProducts($setting)
    {
        $result = array();

        if (isset($this->request->get['route']) && isset($this->request->get['path']) && ($this->request->get['route'] == 'product/category' || isset($this->request->get['route']) && $this->request->get['route'] == 'product/product') && $setting['show_current_category'] == 1) {
            $parts = explode('_', (string)$this->request->get['path']);
            $category_id = (int)array_pop($parts);
        } elseif (isset($this->request->get['route']) && !isset($this->request->get['path']) && $this->request->get['route'] == 'product/product' && $setting['show_current_category'] == 1) {
            $current_product_id = isset($this->request->get['product_id']) ? $this->request->get['product_id'] : 0;
            $category_id = $this->model_extension_module_owlcarousel->getCategoriesByProductId($current_product_id);
        } else {
            $category_id = $setting['category_id'];
        }

        $data = array(
            'filter_category_id'     => $category_id,
            'filter_manufacturer_id' => $setting['manufacturer_id'],
            'filter_sub_category'    => true,
            'show_stock'             => $setting['show_stock'],
            'show_current_category'  => $setting['show_current_category'],
            'show_current_product'   => $setting['show_current_product'],
            'sort'                   => $setting['sort'],
            'order'                  => 'DESC',
            'start'                  => '0',
            'limit'                  => $setting['count']
        );

        $products = $this->model_extension_module_owlcarousel->getProducts($data);

        foreach ($products as $product) {
            if ($product['image']) {
                $image = $product['image'];
            } else {
                $image = 'placeholder.png';
            }

            if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
                $price = $this->currency->format($this->tax->calculate($product['price'], $product['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
            } else {
                $price = false;
            }

            if ((float)$product['special']) {
                $special = $this->currency->format($this->tax->calculate($product['special'], $product['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
            } else {
                $special = false;
            }

            if ($this->config->get('config_tax')) {
                $tax = $this->currency->format((float)$product['special'] ? $product['special'] : $product['price'], $this->session->data['currency']);
            } else {
                $tax = false;
            }

            if ($this->config->get('config_review_status')) {
                $rating = (int)$product['rating'];
            } else {
                $rating = false;
            }

            if (isset($this->request->get['route']) && isset($this->request->get['path']) && ($this->request->get['route'] == 'product/category' || isset($this->request->get['route']) && $this->request->get['route'] == 'product/product') && $setting['show_current_category'] == 1) {
                $url = $this->url->link('product/product', 'path=' . $this->request->get['path'] . '&product_id=' . $product['product_id']);
            } else {
                $url = $this->url->link('product/product', 'product_id=' . $product['product_id']);
            }

            $this->load->model('catalog/product');

            $is_rotate = $this->model_catalog_product->has360($product['product_id']);

            $attributes = $this->model_catalog_product->getProductAttributes($product['product_id']);

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
                        $sale_value = ceil(((float)$product['price'] - (float)$product['special']) / ((float)$product['price'] * 0.01));
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
                        if ($bestseller['product_id'] == $product['product_id']) {
                            $product_xdstickers[] = array(
                                'id'            => 'xdsticker_bestseller',
                                'text'          => $xdstickers['bestseller']['text'][$current_language_id]
                            );
                        }
                    }
                }
                if ($xdstickers['novelty']['status'] == '1') {
                    if ((strtotime($product['date_added']) + intval($xdstickers['novelty']['property']) * 24 * 3600) > time()) {
                        $product_xdstickers[] = array(
                            'id'            => 'xdsticker_novelty',
                            'text'          => $xdstickers['novelty']['text'][$current_language_id]
                        );
                    }
                }
                if ($xdstickers['last']['status'] == '1') {
                    if ($product['quantity'] <= intval($xdstickers['last']['property']) && $product['quantity'] > 0) {
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
                        if (isset($value['status']) && $value['status'] == '1' && $key == $product['stock_status_id'] && $product['quantity'] <= 0) {
                            $product_xdstickers[] = array(
                                'id'            => 'xdsticker_stock_' . $key,
                                'text'          => $product['stock_status']
                            );
                        }
                    }
                }

                // CUSTOM stickers
                $this->load->model('extension/module/xdstickers');
                $custom_xdstickers_id = $this->model_extension_module_xdstickers->getCustomXDStickersProduct($product['product_id']);
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

            $percent = ($product['price'] - $product['special']) / $product['price'] * 100;

            //$attributes = $this->model_catalog_product->getProductAttributes($product['product_id']);

            $w_list = array_column($this->customer->getWishlist(), 'product_id');

            if (in_array($product['product_id'], $w_list)) {
                $wl_class = true;
            } else {
                $wl_class = false;
            }

            if ((strtotime($result['date_added']) + intval($xdstickers['novelty']['property']) * 24 * 3600) > time()) {
                $is_new = true;
            } else {
                $is_new = false;
            }

            $gifts = $this->model_extension_module_giftor->getGiftsByProduct($result['product_id']);

            $result[] = array(
                'product_id'    => $product['product_id'],
                'thumb'         => $this->model_tool_image->resize($image, $setting['image_width'], $setting['image_height']),
                'name'          => $product['name'],
                'description'   => utf8_substr(trim(strip_tags(html_entity_decode($product['description'], ENT_QUOTES, 'UTF-8'))), 0, $setting['description']) . '..',
                'href'          => $url,
                'price'         => $price,
                'special'       => $special,
                'tax'           => $tax,
                'rating'        => $rating,
                'quantity'      => $product['quantity'],
                'stock_id'      => $product['stock_status_id'],
                'is_rotate'     => $is_rotate,
                'percent'       => (int)$percent,
                'wl_class'      => $wl_class,
                'is_new'        => $is_new,
                'gifts'       => $gifts ? true : false,
                'attributes'    => $attributes ? array_slice($attributes[0]['attribute'], 0, 4) : array(),
                'reviews'       => sprintf($this->language->get('text_reviews'), (int)$product['reviews']),
                'product_xdstickers'  => $product_xdstickers,
                'product_xdstickers_custom'  => $product_xdstickers_custom,
            );
        }
        return $result;
    }

    public function getCurrentProducts($setting)
    {
        $result = array();

        if ($setting['category_id'] == 'news') {
            $results = $this->model_catalog_product->getProductNews(['limit' => $this->config->get('theme_' . $this->config->get('config_theme') . '_product_limit')]);

            if (count($results) < 20) {
                $data['last15'] = true;

                $results = $this->model_catalog_product->getProductLast(['limit' => 20]);
            }

            foreach ($results as $result) {
                //$attribute_groups = $this->model_catalog_product->getProductAttributes($result['product_id']);
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

                $percent = ($result['price'] - $result['special']) / $result['price'] * 100;

                $attributes = $this->model_catalog_product->getProductAttributes($result['product_id']);

                $w_list = array_column($this->customer->getWishlist(), 'product_id');

                if (in_array($result['product_id'], $w_list)) {
                    $wl_class = true;
                } else {
                    $wl_class = false;
                }

                $is_rotate = $this->model_catalog_product->has360($result['product_id']);

                if ((strtotime($result['date_added']) + intval($xdstickers['novelty']['property']) * 24 * 3600) > time()) {
                    $is_new = true;
                } else {
                    $is_new = false;
                }

                $gifts = $this->model_extension_module_giftor->getGiftsByProduct($result['product_id']);

                $prod[] = array(
                    'product_id'  => $result['product_id'],
                    'thumb'       => $image,
                    'name'        => $result['name'],
                    'description' => utf8_substr(trim(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8'))), 0, $this->config->get('theme_' . $this->config->get('config_theme') . '_product_description_length')) . '..',
                    'reviews'     => sprintf($this->language->get('text_reviews'), $result['reviews']),
                    'price'       => $price,
                    'special'     => $special,
                    //'news'     => $news,
                    'quantity'    => $result['quantity'],
                    'stock_id'    => $result['stock_status_id'],
                    'is_rotate'   => $is_rotate,
                    'percent'     => (int)$percent,
                    'wl_class'      => $wl_class,
                    'attributes'    => array_slice($attributes[0]['attribute'], 0, 4),
                    'tax'         => $tax,
                    'minimum'     => $result['minimum'] > 0 ? $result['minimum'] : 1,
                    'rating'      => $result['rating'],
                    'is_new'      => $is_new,
                    'gifts'       => $gifts ? true : false,
                    'href'        => $this->url->link('product/product', 'product_id=' . $result['product_id']),
                    'product_xdstickers'  => $product_xdstickers,
                    'product_xdstickers_custom'  => $product_xdstickers_custom,
                );
            }
            return $prod;
        }

        if ($setting['category_id'] == 'special') {
            $results = $this->model_catalog_product->getProductSpecials(['limit' => 10]);
            $results2 = $this->model_catalog_product->getProductWithGifts(['limit' => 10]);

            $products = array_merge($results, $results2);

            if ($products) {
                foreach ($products as $result) {
                    //$attribute_groups = $this->model_catalog_product->getProductAttributes($result['product_id']);

                    if ($result['image']) {
                        $image = $this->model_tool_image->resize($result['image'], 200, 200);
                    } else {
                        $image = $this->model_tool_image->resize('placeholder.png', 200, 200);
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

                    $gifts = $this->model_extension_module_giftor->getGiftsByProduct($result['product_id']);

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

                    if ($this->config->get('config_review_status')) {
                        $rating = $result['rating'];
                    } else {
                        $rating = false;
                    }

                    $is_rotate = $this->model_catalog_product->has360($result['product_id']);

                    $attributes = $this->model_catalog_product->getProductAttributes($result['product_id']);

                    $percent = ($result['price'] - $result['special']) / $result['price'] * 100;

                    $w_list = array_column($this->customer->getWishlist(), 'product_id');

                    if (in_array($result['product_id'], $w_list)) {
                        $wl_class = true;
                    } else {
                        $wl_class = false;
                    }

                    if ((strtotime($result['date_added']) + intval($xdstickers['novelty']['property']) * 24 * 3600) > time()) {
                        $is_new = true;
                    } else {
                        $is_new = false;
                    }

                    $prod[] = array(
                        'product_id'  => $result['product_id'],
                        'thumb'       => $image,
                        'name'        => $result['name'],
                        'description' => utf8_substr(trim(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8'))), 0, $this->config->get('theme_' . $this->config->get('config_theme') . '_product_description_length')) . '..',
                        'reviews'     => sprintf($this->language->get('text_reviews'), $result['reviews']),
                        'price'       => $price,
                        'special'     => $special,
                        'quantity'    => $result['quantity'],
                        'tax'         => $tax,
                        'stock_id'    => $result['stock_status_id'],
                        'minimum'     => $result['minimum'] > 0 ? $result['minimum'] : 1,
                        'is_rotate'   => $is_rotate,
                        'percent'     => (int)$percent,
                        'wl_class'      => $wl_class,
                        'is_new'      => $is_new,
                        'gifts'       => $gifts ? true : false,
                        'attributes'    => array_slice($attributes[0]['attribute'], 0, 4),
                        'rating'      => $rating,
                        'href'        => $this->url->link('product/product', 'product_id=' . $result['product_id']),
                        'product_xdstickers'  => $product_xdstickers,
                        'product_xdstickers_custom'  => $product_xdstickers_custom,
                    );
                }
                return $prod;
            }
        }

        if ($setting['category_id'] == 'bestseller') {
            $results = $this->model_catalog_product->getBestSellerProducts(10);

            if ($results) {
                foreach ($results as $result) {
                    //$attribute_groups = $this->model_catalog_product->getProductAttributes($result['product_id']);

                    if ($result['image']) {
                        $image = $this->model_tool_image->resize($result['image'], 200, 200);
                    } else {
                        $image = $this->model_tool_image->resize('placeholder.png', 200, 200);
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

                    if ($this->config->get('config_review_status')) {
                        $rating = $result['rating'];
                    } else {
                        $rating = false;
                    }

                    $is_rotate = $this->model_catalog_product->has360($result['product_id']);

                    $attributes = $this->model_catalog_product->getProductAttributes($result['product_id']);

                    $percent = ($result['price'] - $result['special']) / $result['price'] * 100;

                    $w_list = array_column($this->customer->getWishlist(), 'product_id');

                    if (in_array($result['product_id'], $w_list)) {
                        $wl_class = true;
                    } else {
                        $wl_class = false;
                    }

                    if ((strtotime($result['date_added']) + intval($xdstickers['novelty']['property']) * 24 * 3600) > time()) {
                        $is_new = true;
                    } else {
                        $is_new = false;
                    }

                    $gifts = $this->model_extension_module_giftor->getGiftsByProduct($result['product_id']);

                    $prod[] = array(
                        'product_id'  => $result['product_id'],
                        'thumb'       => $image,
                        'name'        => $result['name'],
                        'description' => utf8_substr(trim(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8'))), 0, $this->config->get('theme_' . $this->config->get('config_theme') . '_product_description_length')) . '..',
                        'reviews'     => sprintf($this->language->get('text_reviews'), $result['reviews']),
                        'price'       => $price,
                        'special'     => $special,
                        'quantity'    => $result['quantity'],
                        'tax'         => $tax,
                        'stock_id'    => $result['stock_status_id'],
                        'minimum'     => $result['minimum'] > 0 ? $result['minimum'] : 1,
                        'is_rotate'   => $is_rotate,
                        'percent'     => (int)$percent,
                        'wl_class'      => $wl_class,
                        'is_new'        => $is_new,
                        'gifts'       => $gifts ? true : false,
                        'attributes'    => array_slice($attributes[0]['attribute'], 0, 4),
                        'rating'      => $rating,
                        'href'        => $this->url->link('product/product', 'product_id=' . $result['product_id']),
                        'product_xdstickers'  => $product_xdstickers,
                        'product_xdstickers_custom'  => $product_xdstickers_custom,
                    );
                }
                return $prod;
            }
        }

        if ($setting['category_id'] == 'featured') {
            $products = explode(',', $setting['featured']);
        }

        if ($setting['category_id'] == 'viewed') {
            $products = array();

            if (isset($this->request->cookie['viewed'])) {
                $products = explode(',', $this->request->cookie['viewed']);
            } else if (isset($this->session->data['viewed'])) {
                $products = $this->session->data['viewed'];
            }

            if (isset($this->request->get['route']) && $this->request->get['route'] == 'product/product') {
                $product_id = $this->request->get['product_id'];
                $products = array_diff($products, array($product_id));
                array_unshift($products, $product_id);

                setcookie('viewed', implode(',', $products), time() + 60 * 60 * 24 * 30, '/', $this->request->server['HTTP_HOST']);

                if (!isset($this->session->data['viewed']) || $this->session->data['viewed'] != $products) {
                    $this->session->data['viewed'] = $products;
                }
            }
        }

        if (empty($setting['count'])) {
            $setting['count'] = 5;
        }

        $data = array(
            'show_stock'             => $setting['show_stock'],
            'show_current_product'   => $setting['show_current_product'],
            'limit'                  => $setting['count']
        );

        $products = array_slice($products, 0, (int)$setting['count']);

        foreach ($products as $product_id) {
            $product_info = $this->model_extension_module_owlcarousel->getProduct($product_id, $data);

            if ($product_info) {
                if ($product_info['image']) {
                    $image = $product_info['image'];
                } else {
                    $image = 'placeholder.png';
                }

                if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
                    $price = $this->currency->format($this->tax->calculate($product_info['price'], $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
                } else {
                    $price = false;
                }

                if ((float)$product_info['special']) {
                    $special = $this->currency->format($this->tax->calculate($product_info['special'], $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
                } else {
                    $special = false;
                }

                if ($this->config->get('config_tax')) {
                    $tax = $this->currency->format((float)$product_info['special'] ? $product_info['special'] : $product_info['price'], $this->session->data['currency']);
                } else {
                    $tax = false;
                }

                if ($this->config->get('config_review_status')) {
                    $rating = $product_info['rating'];
                } else {
                    $rating = false;
                }

                $this->load->model('catalog/product');

                $is_rotate = $this->model_catalog_product->has360($product_info['product_id']);

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
                            if ($bestseller['product_id'] == $product_info['product_id']) {
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
                            if (isset($value['status']) && $value['status'] == '1' && $key == $product_info['stock_status_id'] && $result['quantity'] <= 0) {
                                $product_xdstickers[] = array(
                                    'id'            => 'xdsticker_stock_' . $key,
                                    'text'          => $product_info['stock_status']
                                );
                            }
                        }
                    }

                    // CUSTOM stickers
                    $this->load->model('extension/module/xdstickers');
                    $custom_xdstickers_id = $this->model_extension_module_xdstickers->getCustomXDStickersProduct($product_info['product_id']);
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
                $percent = ($product_info['price'] - $product_info['special']) / $product_info['price'] * 100;

                $w_list = array_column($this->customer->getWishlist(), 'product_id');

                if (in_array($result['product_id'], $w_list)) {
                    $wl_class = true;
                } else {
                    $wl_class = false;
                }

                if((strtotime($result['date_added']) + intval($xdstickers['novelty']['property']) * 24 * 3600) > time()){
                    $is_new = true;
                }else{
                    $is_new = false;
                }

                $gifts = $this->model_extension_module_giftor->getGiftsByProduct($result['product_id']);

                $result[] = array(
                    'product_id'    => $product_info['product_id'],
                    'thumb'         => $this->model_tool_image->resize($image, $setting['image_width'], $setting['image_height']),
                    'name'          => $product_info['name'],
                    'description'   => utf8_substr(trim(strip_tags(html_entity_decode($product_info['description'], ENT_QUOTES, 'UTF-8'))), 0, $setting['description']) . '..',
                    'href'          => $this->url->link('product/product', 'product_id=' . $product_info['product_id']),
                    'price'         => $price,
                    'special'       => $special,
                    'percent'       => (int)$percent,
                    'tax'           => $tax,
                    'rating'        => $rating,
                    'quantity'      => $product_info['quantity'],
                    'stock_id'      => $product_info['stock_status_id'],
                    'is_rotate'     => $is_rotate,
                    'wl_class'      => $wl_class,
                    'is_new'        => $is_new,
                    'gifts'       => $gifts ? true : false,
                    'reviews'       => sprintf($this->language->get('text_reviews'), (int)$product_info['reviews']),
                    'product_xdstickers'  => $product_xdstickers,
                    'product_xdstickers_custom'  => $product_xdstickers_custom,
                );
            }
        }
        return $result;
    }
}
