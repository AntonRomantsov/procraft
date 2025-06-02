<?php
class ControllerAccountInstrument extends Controller {
	public function index() {

		if (!$this->customer->isLogged()) {
		    $this->session->data['redirect'] = $this->url->link('account/instrument', '', 'SSL');

		    $this->response->redirect($this->url->link('account/login', '', 'SSL'));
		}

		$this->document->addStyle('catalog/view/javascript/jquery/slick/slick.css');
		$this->document->addScript('catalog/view/javascript/jquery/slick/slick.min.js');

		$this->load->model('catalog/product');

		$this->load->language('account/setting');
		$this->load->language('account/account');
		$this->load->language('account/instrument');

		$this->document->setTitle($this->language->get('heading_title'));

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
				'text' => $this->language->get('text_home'),
				'href' => $this->url->link('common/home')
		);

		$data['breadcrumbs'][] = array(
				'text' => $this->language->get('text_account'),
				'href' => $this->url->link('account/account', '', 'SSL')
		);

		$data['breadcrumbs'][] = array(
				'text' => $this->language->get('heading_title'),
				'href' => ''
		);

		if ($this->request->server['REQUEST_METHOD'] == 'POST' && $this->validate()){
            $this->model_catalog_product->addInstrument($this->request->post);
		}

		$data['account'] = $this->load->controller('extension/module/account');
		$data['action'] = $this->url->link('account/instrument');

		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');


		$this->load->model('setting/module');

		$setting_info = $this->model_setting_module->getModule(39);

		if ($setting_info && $setting_info['status']) {
			$output = $this->load->controller('extension/module/ciformbuilder', $setting_info);

			if ($output) {
				$data['form_instrument'] = $output;
			}
		}

		$data['instruments'] = $this->model_catalog_product->getInstruments($this->customer->getId());

		$data['customer_id'] = $this->customer->getId();

		$this->load->model('catalog/category');

		$categories = $this->model_catalog_category->getGarantedCategories(0);

		$data['categories'] = array();

		foreach($categories as $category){
			$data['categories'][] = array(
				'category_id' => $category['category_id'],
				'name' => $category['name']
			);
		}

		$data['lang'] = $this->session->data['language'];

		$data['account_discount'] = $this->load->controller('extension/module/account_discount');
		$data['account_sidebar'] = $this->load->controller('extension/module/account');


		$this->response->setOutput($this->load->view('account/instrument', $data));
	}

	public function get_subcategory(){
		$this->load->model('catalog/category');
		$this->load->model('localisation/language');

		$language_id = $this->model_localisation_language->getLanguageIdByCode($this->request->get['lang']);

		$categories = $this->model_catalog_category->getGarantedCategories($this->request->get['parent_id'], $language_id);

		$json['categories'] = array();

		foreach($categories as $category){
			$json['categories'][] = array(
				'category_id' => $category['category_id'],
				'name' => $category['name']
			);
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	public function get_product(){
		$this->load->model('catalog/product');

		$products = $this->model_catalog_product->getProducts(['filter_category_id' => $this->request->get['category_id'], 'filter_garanty' => true]);

		$json['products'] = array();

		foreach($products as $product){
			$json['products'][] = array(
				'product_id' => $product['product_id'],
				'name' => $product['name']
			);
		} 

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	private function validate(){
		if(!$this->request->post['product_id']){
			$this->error = true;
		}

		if(!$this->request->post['order_date']){
			$this->error = true;
		}

		if(!$this->request->post['serial_number']){
			$this->error = true;
		}

		return !$this->error;
	}
}
