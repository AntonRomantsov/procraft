<?php

require_once(DIR_SYSTEM . '/engine/neoseo_controller.php');

class ControllerExtensionModuleNeoSeoBlogSearch extends NeoSeoController
{

	public function __construct($registry)
	{
		parent::__construct($registry);
		$this->_moduleSysName = 'neoseo_blog';
				$this->_modulePostfix = "_search";
		$this->_logFile = $this->_moduleSysName . '.log';
		$this->debug = $this->config->get($this->_moduleSysName . '_status') == 1;
	}

	public function index($setting)
	{

		$data = $this->load->language('extension/' . 'module' . '/' . $this->_moduleSysName());

		if (!empty($setting['title'][$this->config->get('config_language_id')])) {
			$data['title'] = $setting['title'][$this->config->get('config_language_id')];
		} else {
			$data['title'] = '';
		}

		if (isset($this->request->get['blog_category_id'])) {
			$data['category_id'] = $this->request->get['blog_category_id'];
		} else {
			$data['category_id'] = 0;
		}

		$data['root_category_id'] = $setting['root_category_id'];
		if ($setting['root_category_id']) {
			$parents = $this->{"model_blog_" . $this->_moduleSysName . "_category"}->getParentIds($data['category_id']);
			if ($setting['root_category_id'] != $data['category_id'] && !in_array($setting['root_category_id'], $parents)) {
				return '';
			}
		}

		if (isset($this->request->get['blog_search'])) {
			$data['blog_search'] = $this->request->get['blog_search'];
		} else {
			$data['blog_search'] = '';
		}

		$template = $setting['template'];
		return $this->load->view('extension/module/' . $template, $data);
	}

}
