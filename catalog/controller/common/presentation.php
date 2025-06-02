<?php
class ControllerCommonPresentation extends Controller {
	public function index() {
		$this->document->setTitle($this->config->get('config_meta_title'));
		$this->document->setDescription($this->config->get('config_meta_description'));
		$this->document->setKeywords($this->config->get('config_meta_keyword'));

		if (isset($this->request->get['route'])) {
			$this->document->addLink($this->config->get('config_url'), 'canonical');
		}

		$this->load->model('design/layout');

		$this->load->model('setting/module');

		$layout_id = $this->model_design_layout->getLayout($this->request->get['route']);

		$modules = $this->model_design_layout->getLayoutAllModules($layout_id);

		$data['anchors'] = array();

		foreach ($modules as $module){
			$part = explode('.', $module['code']);
			$setting_info = $this->model_setting_module->getModule($part[1]);
			$result = [
                'title' => $setting_info['title'][(int)$this->config->get('config_language_id')],
                'href' => $this->url->link('common/presentation') . '#' . str_replace('.', '-', $module['code']),
                'code' => '#' . str_replace('.', '-', $module['code']),
			];

			$data['anchors'][] = $result;
		}

		$this->load->language('common/header');

		$data['text_navigation'] = $this->language->get('text_navigation');
		$data['button_modules'] = $this->language->get('button_modules');

		$data['content_full'] = $this->load->controller('common/content_full');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');

		if(!$data['column_left']){
			$data['column_left'] = true;
		}

		$this->response->setOutput($this->load->view('common/presentation', $data));
	}
}