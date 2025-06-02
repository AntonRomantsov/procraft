<?php
class ControllerProductCatalog extends Controller {
	public function index() {

        $this->load->model('catalog/category');

        $this->load->model('catalog/product');

        $this->load->language('product/catalog');

        $data = array();

        $data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/home')
		);

        $data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_catalog'),
			'href' => $this->url->link('product/catalog')
		);

        $categories = $this->model_catalog_category->getCategories(0);

        $data['categories'] = array();

        foreach($categories as $category){
            $subcategory_ids = $this->model_catalog_category->getAllSubCategories($category['category_id']);

            $count_products = $subcategory_ids ? $this->model_catalog_product->countProducts($subcategory_ids) : 0;

            if($count_products == 0){
                continue;
            }

            $data['categories'][] = array(
                'category_id' => $category['category_id'],
                'name' => $category['name'],
                'href' => $this->url->link('product/category', 'path=' . $category['category_id']),
                'count_products' => $count_products  
            );
        }

        $data['https'] = HTTPS_SERVER;
        
        $data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
        $data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');
            
		$this->response->setOutput($this->load->view('product/catalog', $data));
	}
}
