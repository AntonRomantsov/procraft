<?php
class ControllerExtensionModuleOwlCarouselP extends Controller {
    protected $path = array();

    public function index($setting) {
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
                $vars['slide_speed'] = $setting['slide_speed'];}
                else {$vars['slide_speed'] = 0;
            }

            if ($setting['pagination_speed'] > 0) {
                $vars['pagination_speed'] = $setting['pagination_speed'];}
                else {$vars['pagination_speed'] = 0;
            }

            if ($setting['autoscroll'] > 0) {
                $vars['autoscroll'] = $setting['autoscroll'];}
                else {$vars['autoscroll'] = 0;
            }

            if ($setting['item_prev_next'] > 0) {
                $vars['item_prev_next'] = $setting['item_prev_next'];}
                else {$vars['item_prev_next'] = 0;
            }

            if (isset($setting['rewind_speed']) && $setting['rewind_speed'] > 0) {
                $vars['rewind_speed'] = $setting['rewind_speed'];}
                else {$vars['rewind_speed'] = 0;
            }

            $this->load->model('extension/module/owlcarousel_p');
            $this->load->model('tool/image');

            if (isset($setting['use_cache'])) {
                $this->model_extension_module_owlcarousel_p->setCache($setting['use_cache'] ? 1 : 0);
            }

            if (isset($this->request->get['path'])) {
                $this->path = explode('_', $this->request->get['path']);
                $this->category_id = end($this->path);
            }

            $url = '';

            //$vars['products'] = array();
            $cats_id = array();
            if(isset($this->request->get['subcats' . $setting['module_id']])){
                $subcats = explode('_', $this->request->get['subcats' . $setting['module_id']]);
                $cats_ids = $subcats;
                $data['cats_ids'] = implode('_', $cats_ids);
                $data['cats_ids_array'] = $cats_ids;
            }else{
                $cats_ids = $setting['category_id'];
            }
            
            $products_array = array();
            foreach($cats_ids as $cat_id){
                if ($cat_id == 'featured' || $cat_id == 'viewed') {
                    $products_array = array_merge($products_array, $this->getCurrentProducts($cat_id, $setting));
                } else {
                    $products_array = array_merge($products_array, $this->getCategoryProducts($cat_id, $setting));
                    $cats_id[] = $cat_id;
                }
            }

            $pars_id = array();
            foreach($setting['category_id'] as $par_id){
                if ($par_id != 'featured' && $par_id != 'viewed') {
                    $pars_id[] = $par_id;
                }
            }
            $products_array = array_unique($products_array, SORT_REGULAR);

            $action_products = array();
            foreach($products_array as $product){
                if(($product['special']) && (($product['stock_id'] != 5) && ($product['stock_id'] >= 1))){
                    $action_products[] = $product;
                }
            }

            usort($action_products, function($a, $b){
                if ($a['special'] == $b['special']) {
                    return 0;
                }
                return ($a['special'] < $b['special']) ? -1 : 1;
            }); 
            
            $main_products = array();
            foreach($products_array as $product){
                if((!in_array($product, $action_products)) && (($product['stock_id'] != 5) && ($product['stock_id'] >= 1))){
                    $main_products[] = $product;
                }
            }

            usort($main_products, function($a, $b){
                if ($a['price'] == $b['price']) {
                    return 0;
                }
                return ($a['price'] < $b['price']) ? -1 : 1;
            });  

            $notstock_products = array();
            foreach($products_array as $product){
                if(($product['stock_id'] == 5) || ($product['stock_id'] < 1)){
                    $notstock_products[] = $product;
                }
            } 

            $products_array = array_merge($action_products, $main_products, $notstock_products);

            $vars['products'] = [];
            foreach($products_array as $product){
                $product['price'] = $this->currency->format($this->tax->calculate($product['price'], $product['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
                if($product['special']){
                    $product['special'] = $this->currency->format($this->tax->calculate($product['special'], $product['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
                }
                $vars['products'][] = $product;
            }

            $vars['module'] = $module;
            $module++;

            $data['modules'][$mid] = $vars;

            $data['module'] = $module++;
        }

        $sort_order = array();

        $subcats = $this->model_extension_module_owlcarousel_p->getSubCategories($pars_id);

        $data['subcategories'] = array();

        foreach($subcats as $subcat){
            $result = [
                'name' => $subcat['name'],
                'href' => $this->url->link('product/category', 'category_id=' . $subcat['category_id']),
                'id'   => $subcat['category_id']
            ];

            $data['subcategories'][] = $result;
        }

        $params = array();
        foreach($this->request->get as $key => $param){
             if($key == 'route'){
                continue;
             }
             if($key == 'subcats' . $setting['module_id']){
                continue;
             }
             $params[$key] = $param;
        }

        $data['module_id'] = $setting['module_id'];
        $data['location'] = $this->url->link2('common/presentation', $params);

        //if (!((isset($this->request->get['route']) && $this->request->get['route'] == 'product/product') && ($setting['category_id'] == 'viewed' && $setting['hide_module'] == 1))) {    
            return $this->load->view('extension/module/owlcarousel_p', $data);
        //}
    }

    public function getCategoryProducts($cat_id, $setting) {
        $result = array();

        if (isset($this->request->get['route']) && isset($this->request->get['path']) && ($this->request->get['route'] == 'product/category' || isset($this->request->get['route']) && $this->request->get['route'] == 'product/product') && $setting['show_current_category'] == 1) {
            $parts = explode('_', (string)$this->request->get['path']);
            $category_id = (int)array_pop($parts);
        } elseif (isset($this->request->get['route']) && !isset($this->request->get['path']) && $this->request->get['route'] == 'product/product' && $setting['show_current_category'] == 1) {
            $current_product_id = isset($this->request->get['product_id']) ? $this->request->get['product_id'] : 0;
            $category_id = $this->model_extension_module_owlcarousel_p->getCategoriesByProductId($current_product_id);
        } else {
            $category_id = $cat_id;
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
            'limit'                  => $setting['count'],
            'white_list'             => isset($setting['white_list']) ? $setting['white_list'] : array(),
            'black_list'             => isset($setting['black_list']) ? $setting['black_list'] : array(),
        );

        $products = $this->model_extension_module_owlcarousel_p->getProducts($data);

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
                                foreach($xdstickers['stock'] as $key => $value) {
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

            $attributes = $this->model_catalog_product->getProductAttributes($product['product_id']);   

            $result[] = array(
                'product_id'    => $product['product_id'],
                'thumb'         => $this->model_tool_image->resize($image, $setting['image_width'], $setting['image_height']),
                'name'          => $product['name'],
                'description'   => utf8_substr(trim(strip_tags(html_entity_decode($product['description'], ENT_QUOTES, 'UTF-8'))), 0, $setting['description']) . '..',
                'href'          => $url,
                'price'         => $product['price'],
                'special'       => $product['special'],
                'tax'           => $tax,
                'tax_class_id'  => $product['tax_class_id'],
                'rating'        => $rating,
                'quantity'      => $product['quantity'],
                'stock_id'      => $product['stock_status_id'],
                'is_rotate'     => $is_rotate,
                'percent'       => (int)$percent,
                'attributes'    => $attributes ? array_slice($attributes[0]['attribute'], 0, 4) : array(),
                'reviews'       => sprintf($this->language->get('text_reviews'), (int)$product['reviews']),
                'product_xdstickers'  => $product_xdstickers,
                'product_xdstickers_custom'  => $product_xdstickers_custom,
            );
        }
        return $result;
    }

    public function getCurrentProducts($cat_id, $setting){
        $result = array();

        if ($cat_id == 'featured') {
            $products = explode(',', $setting['featured']);
        }

        if ($cat_id == 'viewed') {
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
                
                setcookie('viewed', implode(',',$products), time() + 60 * 60 * 24 * 30, '/', $this->request->server['HTTP_HOST']);
            
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
            if($setting['white_list'] && (!in_array($product_id, $setting['white_list']))){
                continue;
            }
            if(in_array($product_id, $setting['black_list'])){
                continue;
            }
            $product_info = $this->model_extension_module_owlcarousel_p->getProduct($product_id, $data);

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
                                foreach($xdstickers['stock'] as $key => $value) {
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

                        $percent = ($product['price'] - $product['special']) / $product['price'] * 100;   

                $result[] = array(
                    'product_id'    => $product_info['product_id'],
                    'thumb'         => $this->model_tool_image->resize($image, $setting['image_width'], $setting['image_height']),
                    'name'          => $product_info['name'],
                    'description'   => utf8_substr(trim(strip_tags(html_entity_decode($product_info['description'], ENT_QUOTES, 'UTF-8'))), 0, $setting['description']) . '..',
                    'href'          => $this->url->link('product/product', 'product_id=' . $product_info['product_id']),
                    'price'         => $product_info['price'],
                    'special'       => $product_info['special'],
                    'percent'       => (int)$percent,
                    'tax'           => $tax,
                    'tax_class_id'  => $product['tax_class_id'],
                    'rating'        => $rating,
                    'quantity'      => $product_info['quantity'],
                    'stock_id'      => $product_info['stock_status_id'],
                    'is_rotate'     => $is_rotate,
                    'reviews'       => sprintf($this->language->get('text_reviews'), (int)$product_info['reviews']),
                    'product_xdstickers'  => $product_xdstickers,
                    'product_xdstickers_custom'  => $product_xdstickers_custom,
                );
            }
        }
        return $result;
    }
}
?>