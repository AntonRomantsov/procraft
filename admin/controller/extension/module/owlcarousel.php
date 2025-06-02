<?php
class ControllerExtensionModuleOwlCarousel extends Controller {
    private $error = array();

    public function index() {
        $this->load->language('extension/module/owlcarousel');

        $this->document->setTitle($this->language->get('heading_title'));

        $this->load->model('setting/module');
        $this->load->model('catalog/category');

        $module_version = '4.0.4';

        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
            if (!isset($this->request->get['module_id'])) {
                $this->model_setting_module->addModule('owlcarousel', $this->request->post['owlcarousel_module']);
            } else {
                $this->model_setting_module->editModule($this->request->get['module_id'], $this->request->post['owlcarousel_module']);
            }

            $this->session->data['success'] = $this->language->get('text_success');
            $this->cache->delete('owlcarousel');
            $this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true));
        }

        $data['heading_title']     = $this->language->get('heading_title') . ' v.' . $module_version;

        if (isset($this->error['warning'])) {
            $data['error_warning'] = $this->error['warning'];
        } else {
            $data['error_warning'] = '';
        }

        $data['breadcrumbs'] = array();

        $data['breadcrumbs'][] = array(
            'text'      => $this->language->get('text_home'),
            'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
        );

        $data['breadcrumbs'][] = array(
            'text'      => $this->language->get('text_module'),
            'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true)
        );

        if (!isset($this->request->get['module_id'])) {
            $data['breadcrumbs'][] = array(
                'text' => $this->language->get('heading_title'),
                'href' => $this->url->link('extension/module/owlcarousel', 'user_token=' . $this->session->data['user_token'], true)
            );
        } else {
            $data['breadcrumbs'][] = array(
                'text' => $this->language->get('heading_title'),
                'href' => $this->url->link('extension/module/owlcarousel', 'user_token=' . $this->session->data['user_token'] . '&module_id=' . $this->request->get['module_id'], true)
            );
        }

        if (!isset($this->request->get['module_id'])) {
            $data['action'] = $this->url->link('extension/module/owlcarousel', 'user_token=' . $this->session->data['user_token'], true);
        } else {
            $data['action'] = $this->url->link('extension/module/owlcarousel', 'user_token=' . $this->session->data['user_token'] . '&module_id=' . $this->request->get['module_id'], true);
        }

        $data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true);

        $data['user_token'] = $this->session->data['user_token']; 

        if (isset($this->request->get['module_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
            $data['module'] = $this->model_setting_module->getModule($this->request->get['module_id']);
        } elseif ($this->request->server['REQUEST_METHOD'] == 'POST') {
            $data['module'] = $this->request->post['owlcarousel_module'];
        } else {
            $data['module'] = array(
                'name'                  => '',
                'title'                 => array(),
                'add_block_name'        => '',
                'status'                => false,
                'sort_order'            => '0',
                'add_class_name'        => '',
                'rewind_speed'          => '',
                'autoscroll'            => '',
                'item_prev_next'        => '',
                'category_id'           => '',
                'featured'              => '',
                'viewed'                => '',
                'manufacturer_id'       => '',
                'sort'                  => '',
                'image_width'           => '200',
                'image_height'          => '200',
                'description'           => '100',
                'count'                 => '12',
                'visible'               => '4',
                'visible_1000'          => '4',
                'visible_900'           => '3',
                'visible_600'           => '2',
                'visible_479'           => '1',
                'slide_speed'           => '200',
                'pagination_speed'      => '800',
                'show_per_page'         => false,
                'show_random_item'      => false,
                'show_stock'            => false,
                'hide_module'           => false,
                'show_current_category' => false,
                'show_current_product'  => false,
                'show_title'            => true,
                'show_name'             => true,
                'show_desc'             => true,
                'show_price'            => true,
                'show_rate'             => true,
                'show_cart'             => true,
                'show_wishlist'         => true,
                'show_compare'          => true,
                'show_page'             => true,
                'show_nav'              => true,
                'show_lazy_load'        => true,
                'show_mouse_drag'       => true,
                'show_touch_drag'       => true,
                'show_stop_on_hover'    => true,
                'show_tabs'             => false,
                'display_with'          => array()
            );
        }

        $this->load->model('design/layout');
        $data['layouts'] = $this->model_design_layout->getLayouts();

        $this->load->model('catalog/manufacturer');
        $results = $this->model_catalog_manufacturer->getManufacturers();

        foreach ($results as $result) {
            $data['manufacturers'][] = array(
                'manufacturer_id' => $result['manufacturer_id'],
                'name'        => $result['name']
            );
        }

        $data['rootcats'] = $this->model_catalog_category->getCategories(0);

        $this->load->model('catalog/product');

        $data['products'] = array();

        $i = 1;

        $products = explode(',', $data['module']['featured']);

        foreach ($products as $product_id) {
            $product_info = $this->model_catalog_product->getProduct($product_id);

            if ($product_info) {
                $data['products'][] = array(
                    'module_id' => $i,
                    'product_id' => $product_info['product_id'],
                    'name'       => $product_info['name']
                );
            }
        }

        $this->load->model('localisation/language');

        $data['languages'] = $this->model_localisation_language->getLanguages();

        $this->load->model('setting/extension');
        $this->load->model('setting/module');
        $data['other_modules'] = array();

        $modules = $this->model_setting_module->getModulesByCode('owlcarousel');

        foreach ($modules as $module) {
            if (isset($this->request->get['module_id']) && $module['module_id'] == $this->request->get['module_id']) {
                continue;
            }

            $data['other_modules'][] = array(
                'id' => $module['module_id'],
                'name'      => strip_tags($module['name'])
            );
        }

        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        $this->response->setOutput($this->load->view('extension/module/owlcarousel', $data));
    }

    private function validate() {
        if (!$this->user->hasPermission('modify', 'extension/module/owlcarousel')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }

        if (!trim($this->request->post['owlcarousel_module']['name'])) {
            $this->error['warning'] = $this->language->get('error_name');
        }

        foreach($this->request->post['owlcarousel_module']['title'] as $title) {
            if(!trim($title)) {
                $this->error['warning'] = $this->language->get('error_title');
                break;
            }
        }

        if (!$this->request->post['owlcarousel_module']['count'] || $this->request->post['owlcarousel_module']['count'] < 1) {
            $this->error['warning'] = $this->language->get('error_count');
        }

        if ((!$this->request->post['owlcarousel_module']['image_width'] || !$this->request->post['owlcarousel_module']['image_height'])||(($this->request->post['owlcarousel_module']['image_height']< 1) || ($this->request->post['owlcarousel_module']['image_width'] < 1))) {
            $this->error['warning'] = $this->language->get('error_image');
        }

        if (!$this->request->post['owlcarousel_module']['description'] || $this->request->post['owlcarousel_module']['description'] < 1) {
            $this->error['warning'] = $this->language->get('error_description');
        }

        if (!$this->request->post['owlcarousel_module']['visible'] || $this->request->post['owlcarousel_module']['visible'] < 1) {
            $this->error['warning'] = $this->language->get('error_visible');
        }

        if (!$this->request->post['owlcarousel_module']['visible_1000'] || $this->request->post['owlcarousel_module']['visible_1000'] < 1) {
            $this->error['warning'] = $this->language->get('error_visible_1000');
        }

        if (!$this->request->post['owlcarousel_module']['visible_900'] || $this->request->post['owlcarousel_module']['visible_900'] < 1) {
            $this->error['warning'] = $this->language->get('error_visible_900');
        }

        if (!$this->request->post['owlcarousel_module']['visible_600'] || $this->request->post['owlcarousel_module']['visible_600'] < 1) {
            $this->error['warning'] = $this->language->get('error_visible_600');
        }

        if (!$this->request->post['owlcarousel_module']['visible_479'] || $this->request->post['owlcarousel_module']['visible_479'] < 1) {
            $this->error['warning'] = $this->language->get('error_visible_479');
        }

        if (!$this->error) {
            return true;
        } else {
            return false;
        }
    }
}
?>