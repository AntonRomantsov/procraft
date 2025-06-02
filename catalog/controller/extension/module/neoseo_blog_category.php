<?php

require_once(DIR_SYSTEM . '/engine/neoseo_controller.php');

class ControllerExtensionModuleNeoSeoBlogCategory extends NeoSeoController
{

	public function __construct($registry)
	{
		parent::__construct($registry);
		$this->_moduleSysName = 'neoseo_blog';
				$this->_modulePostfix = "_category";
		$this->_logFile = $this->_moduleSysName . '.log';
		$this->debug = $this->config->get($this->_moduleSysName . '_status') == 1;
	}

	public function index($setting)
	{

		$data = $this->load->language('extension/' . 'module' . '/' . $this->_moduleSysName());

		if (isset($setting['title'][$this->config->get('config_language_id')])) {
			$data['title'] = $setting['title'][$this->config->get('config_language_id')];
		} else {
			$data['title'] = '';
		}

		$this->load->model('blog/' . $this->_moduleSysName . '_article');
		$this->load->model('blog/' . $this->_moduleSysName());

		$data['blog_category_id'] = '';
		if (isset($this->request->get['blog_category_id'])) {
			$data['blog_category_id'] = $this->request->get['blog_category_id'];
		}

		if ($setting['root_category_id']) {
			$parents = $this->{"model_blog_" . $this->_moduleSysName()}->getParentIds($data['blog_category_id']);
			if ($setting['root_category_id'] != $data['blog_category_id'] && !in_array($setting['root_category_id'], $parents)) {
				return '';
			}
		}

		$data['parent_id'] = '';
		$data['child_parent_id'] = '';

		$data['categories'] = array();

		$categories = $this->{"model_blog_" . $this->_moduleSysName()}->getCategories($setting['root_category_id']);

		foreach ($categories as $category) {

			$children_data = array();

			$children = $this->{"model_blog_" . $this->_moduleSysName()}->getCategories($category['category_id']);

			foreach ($children as $child) {

				if ($child['category_id'] == $data['blog_category_id']) {
					$data['parent_id'] = $child['parent_id'];
				}

				//Третий уровень вложенности
				$third_children_data = array();

				$third_children = $this->{"model_blog_" . $this->_moduleSysName()}->getCategories($child['category_id']);
				foreach ($third_children as $third_child) {

					if ($third_child['category_id'] == $data['blog_category_id']) {
						$data['parent_id'] = $child['parent_id'];
						$data['child_parent_id'] = $child['category_id'];
					}

					$third_children_data[] = array(
						'category_id' => $third_child['category_id'],
						'name' => $third_child['name'],
						'href' => $this->url->link('blog/' . $this->_moduleSysName(), 'blog_category_id=' . $third_child['category_id'])
					);
				}

				$children_data[] = array(
					'category_id' => $child['category_id'],
					'name' => $child['name'],
					'parent_id' => $child['parent_id'],
					'children' => $third_children_data,
					'href' => $this->url->link('blog/' . $this->_moduleSysName(), 'blog_category_id=' . $child['category_id'])
				);
			}

			$data['categories'][] = array(
				'category_id' => $category['category_id'],
				'name' => $category['name'],
				'children' => $children_data,
				'href' => $this->url->link('blog/' . $this->_moduleSysName(), 'blog_category_id=' . $category['category_id'])
			);
		}

		if (empty($data['categories']))
			return '';

		$template = $setting['template'];
		return $this->load->view('extension/module/' . $template, $data);
	}

}
