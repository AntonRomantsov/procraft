<?php
class ControllerCommonMobMenu extends Controller {
	public function index() {
		$data['contact'] = $this->url->link('information/contact');
		// Menu
		$this->load->model('catalog/category');

		$this->load->model('catalog/product');

		$data['categories'] = array();

		$categories = $this->model_catalog_category->getCategories(0);

		foreach ($categories as $category) {
			if ($category['top']) {
				// Level 2
				$children_data = array();
				$children = $this->model_catalog_category->getCategories($category['category_id']);

				foreach ($children as $child) {
					$children_data2 = array();
					$children2 = $this->model_catalog_category->getCategories($child['category_id']);

					foreach ($children2 as $child2) {
						// Level 3
						$children_data2[] = array(
							'name' => $child2['name'],
							'href' => $this->url->link('product/category', 'path=' . $category['category_id'] . '_' . $child['category_id'] . '_' . $child2['category_id'])
						);
					}

					// Level 2
					$children_data[] = array(
						'name'  => $child['name'],
						'href'  => $this->url->link('product/category', 'path=' . $category['category_id'] . '_' . $child['category_id']),
						'children' => $children_data2,
					);
				}

				// Level 1
				$data['categories'][] = array(
					'name'     => $category['name'],
					'category_id'     => $category['category_id'],
					'children' => $children_data,
					'column'   => $category['column'] ? $category['column'] : 1,
					'href'     => $this->url->link('product/category', 'path=' . $category['category_id'])
				);
			}
		}

		$this->load->model('catalog/information');

		$data['informations'] = array();

		foreach ($this->model_catalog_information->getInformations() as $result) {
			$data['informations'][] = array(
				'title' => $result['title'],
				'href'  => $this->url->link('information/information', 'information_id=' . $result['information_id'])
			);
		}

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

		$data['home'] = $this->url->link('common/home');
		$data['language'] = $this->load->controller('common/language');

		$this->load->language('common/header');
		$this->load->language('common/menu');

		$data['telephone'] = $this->config->get('config_telephone');
		$data['email'] = $this->config->get('config_email');

		$data['link_register'] = $this->url->link('information&information_id=9');
		$data['link_delivery'] = $this->url->link('information&information_id=6');
		$data['link_services'] = $this->url->link('information&information_id=10');
		$data['link_black_list'] = $this->url->link('information&information_id=11');
		$data['link_partner'] = $this->url->link('information&information_id=8');
		$data['link_about'] = $this->url->link('information&information_id=4');
		$data['link_bestseller'] = substr($this->session->data['language'], 3, 2) . '/xity-prodazh';
		$data['link_special'] = substr($this->session->data['language'], 3, 2) . '/aktsii';
		$data['link_news'] = substr($this->session->data['language'], 3, 2) . '/news';
		$data['link_store'] = $this->url->link('information/information&information_id=7');

		$data['href_acum'] = $this->url->link('common/presentation');

		return $this->load->view('common/mob_menu', $data);
	}
}
