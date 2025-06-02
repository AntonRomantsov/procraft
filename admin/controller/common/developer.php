<?php
class ControllerCommonDeveloper extends Controller {
	public function index() {
		$this->load->language('common/developer');

		$data['user_token'] = $this->session->data['user_token'];

		$data['developer_theme'] = $this->config->get('developer_theme');
		$data['developer_sass'] = $this->config->get('developer_sass');

		$eval = false;

		$eval = '$eval = true;';

		eval($eval);

		if ($eval === true) {
			$data['eval'] = true;
		} else {
			$this->load->model('setting/setting');

			$this->model_setting_setting->editSetting('developer', array('developer_theme' => 1), 0);

			$data['eval'] = false;
		}

		$this->response->setOutput($this->load->view('common/developer', $data));
	}

	public function edit() {
		$this->load->language('common/developer');

		$json = array();

		if (!$this->user->hasPermission('modify', 'common/developer')) {
			$json['error'] = $this->language->get('error_permission');
		} else {
			$this->load->model('setting/setting');

			$this->model_setting_setting->editSetting('developer', $this->request->post, 0);

			$json['success'] = $this->language->get('text_success');
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	public function theme($silent = false) {
		$this->load->language('common/developer');

		$json = array();

		if (!$this->user->hasPermission('modify', 'common/developer')) {
			$json['error'] = $this->language->get('error_permission');
		} else {
			$directories = glob(DIR_CACHE . '/template/*', GLOB_ONLYDIR);

			if ($directories) {
				foreach ($directories as $directory) {
					$files = glob($directory . '/*');

					foreach ($files as $file) { 
						if (is_file($file)) {
							unlink($file);
						}
					}

					if (is_dir($directory)) {
						rmdir($directory);
					}
				}
			}

			$json['success'] = sprintf($this->language->get('text_cache'), $this->language->get('text_theme'));
		}
		if(!$silent){
			$this->response->addHeader('Content-Type: application/json');
			$this->response->setOutput(json_encode($json));
		}
	}

	public function sass($silent = false) {
		$this->load->language('common/developer');

		$json = array();

		if (!$this->user->hasPermission('modify', 'common/developer')) {
			$json['error'] = $this->language->get('error_permission');
		} else {
			// Before we delete we need to make sure there is a sass file to regenerate the css
			$file = DIR_APPLICATION  . 'view/stylesheet/bootstrap.css';

			if (is_file($file) && is_file(DIR_APPLICATION . 'view/stylesheet/sass/_bootstrap.scss')) {
				unlink($file);
			}
			 
			$files = glob(DIR_CATALOG  . 'view/theme/*/stylesheet/sass/_bootstrap.scss');
			 
			foreach ($files as $file) {
				$file = substr($file, 0, -21) . '/bootstrap.css';

				if (is_file($file)) {
					unlink($file);
				}
			}

			$json['success'] = sprintf($this->language->get('text_cache'), $this->language->get('text_sass'));
		}

		if(!$silent){
			$this->response->addHeader('Content-Type: application/json');
			$this->response->setOutput(json_encode($json));
		}
	}

	public function sysCache($silent = false) {
		$this->load->language('common/developer');
		$json = array();
		if (!$this->user->hasPermission('modify', 'common/developer')) {
			$json['error'] = $this->language->get('error_permission');
		} else {
			$files = glob(DIR_CACHE . 'cache.*');
			if (!empty($files)) {
				foreach($files as $file){
					if(is_dir($file)){
						$this->delTree($file);
					} else {
						@unlink($file);
					}
				}
			}

			$json['success'] = sprintf($this->language->get('text_cache'), $this->language->get('text_sys_cache'));
		}
		if(!$silent){
			$this->response->addHeader('Content-Type: application/json');
			$this->response->setOutput(json_encode($json));
		}
	}

	public function imgCache($silent = false) {
		$this->load->language('common/developer');
		$json = array();
		if (!$this->user->hasPermission('modify', 'common/developer')) {
			$json['error'] = $this->language->get('error_permission');
		} else {
			$imgfiles = glob(DIR_IMAGE . 'cache/*');

			if (!empty($files)) {
				foreach($files as $file){
					if(is_dir($file)){
						$this->delTree($file);
					} else {
						@unlink($file);
					}
				}
			}
			$json['success'] = sprintf($this->language->get('text_cache'), $this->language->get('text_img_cache'));
		}

		if(!$silent){
			$this->response->addHeader('Content-Type: application/json');
			$this->response->setOutput(json_encode($json));
		}
	}

	public function clearAllCaches()
	{
		$this->load->language('common/developer');
		$json = array();
		if (!$this->user->hasPermission('modify', 'common/developer')) {
			$json['error'] = $this->language->get('error_permission');
		} else {
			$this->theme(true);
			$this->sass(true);
			$this->sysCache(true);
			$this->imgCache(true);
			$json['success'] = $this->language->get('text_all_cache');
		}
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	/* ДЛя совместимости с модулями под OcStore BEGIN */
	public function system()
	{
		$this->sysCache();
	}

	public function image()
	{
		$this->imgCache();
	}


	private function delTree($dir) {
		if(!is_dir($dir)) return;
		$files = array_diff(scandir($dir), array('.','..'));
		foreach ($files as $file) {
			(is_dir("$dir/$file")) ? $this->delTree("$dir/$file") : unlink("$dir/$file");
		}
		return rmdir($dir);
	}

	public function clearDemoData()
	{
		if (!$this->user->hasPermission('modify', 'common/developer') &&  $this->config->get('demo_data_is_removed') != 1) { return false;}
		$this->load->model('tool/developer');
		$this->model_tool_developer->clearDemoData();
		$this->delTree(DIR_IMAGE . "catalog");
		@mkdir(DIR_IMAGE . "catalog");
		@file_put_contents(DIR_IMAGE . "catalog/index.html",":)");
		$this->clearAllCaches();
		$this->load->model('setting/setting');
		$this->model_setting_setting->editSetting('demo_data',['demo_data_is_removed' => 1]);
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode(['result' => 'ok']));
	}

	public function leaveDemoData()
	{
		if (!$this->user->hasPermission('modify', 'common/developer')) { return false;}
		$this->load->model('setting/setting');
		$this->model_setting_setting->editSetting('demo_data',['demo_data_is_removed' => 1]);
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode(['result' => 'ok']));

	}

}
