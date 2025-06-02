<?php
class ControllerExtensionModuleYtchannel extends Controller {

	private $error = [];
	private $token_var;
	private $extension_var;
	private $prefix;
	private $model_place;
	private $confirm;

	public function __construct($registry) {
		parent::__construct($registry);
		$this->token_var = (version_compare(VERSION, '3.0', '>=')) ? 'user_token' : 'token';
		$this->extension_var = (version_compare(VERSION, '3.0', '>=')) ? 'marketplace' : 'extension';
		$this->prefix = (version_compare(VERSION, '3.0', '>=')) ? 'module_' : '';
		$this->model_place = (version_compare(VERSION, '3.0', '>=')) ? 'setting' : 'extension';
	}

	public function install() {
		$this->load->model('extension/module/ytchannel');
		$this->model_extension_module_ytchannel->install();
	}

	public function index() {
		$data = $this->load->language('extension/module/ytchannel');

		$heading_title = $this->language->get('heading_title');
		$this->document->setTitle($heading_title);

		$this->load->model($this->model_place . '/module');
		$this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			if ($this->confirm) {
				if (!isset($this->request->get['module_id'])) {
					$module_id = $this->{'model_' . $this->model_place . '_module'}->addModule('ytchannel', $this->request->post);
				} else {
					$this->{'model_' . $this->model_place . '_module'}->editModule($this->request->get['module_id'], $this->request->post);
					$module_id = $this->request->get['module_id'];
				}
				if (!$module_id) $module_id = $this->db->getLastId();
				$this->request->post['module_id'] = $module_id;
				$this->{'model_' . $this->model_place . '_module'}->editModule($module_id, $this->request->post);
				$this->model_setting_setting->editSetting($this->prefix . 'ytchannel', [$this->prefix . 'ytchannel_apikey' => $this->request->post['apikey'], $this->prefix . 'ytchannel_license' => $this->request->post['license']]);
				$this->session->data['success'] = $this->language->get('text_success');
			}
			if (isset($this->request->post['apply']) && $module_id) {
				$this->response->redirect($this->url->link('extension/module/ytchannel', $this->token_var . '=' . $this->session->data[$this->token_var] . '&module_id=' . $module_id, true));
			} else {
				$this->response->redirect($this->url->link($this->extension_var . '/extension', $this->token_var . '=' . $this->session->data[$this->token_var] . '&type=module', true));
			}
		}

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}
		if (isset($this->error['name'])) {
			$data['error_name'] = $this->error['name'];
		} else {
			$data['error_name'] = '';
		}

		if (isset($this->session->data['success'])) {
			$data['success'] = $this->session->data['success'];
			unset($this->session->data['success']);
		} else {
			$data['success'] = '';
		}

		$data['breadcrumbs'] = [];

		$data['breadcrumbs'][] = [
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', $this->token_var . '=' . $this->session->data[$this->token_var], true)
		];

		$data['breadcrumbs'][] = [
			'text' => $this->language->get('text_extension'),
			'href' => $this->url->link($this->extension_var . '/extension', $this->token_var . '=' . $this->session->data[$this->token_var] . '&type=module', true)
		];

		if (!isset($this->request->get['module_id'])) {
			$data['breadcrumbs'][] = [
				'text' => $heading_title,
				'href' => $this->url->link('extension/module/ytchannel', $this->token_var . '=' . $this->session->data[$this->token_var], true)
			];
		} else {
			$data['breadcrumbs'][] = [
				'text' => $heading_title,
				'href' => $this->url->link('extension/module/ytchannel', $this->token_var . '=' . $this->session->data[$this->token_var] . '&module_id=' . $this->request->get['module_id'], true)
			];
		}

		$this->load->model('extension/module/ytchannel');

		$data['prefix'] = $this->prefix;
		$data['token_var'] = $this->token_var;
		$data[$this->token_var] = $this->session->data[$this->token_var];
		if (!isset($this->request->get['module_id'])) {
			$data['action'] = $this->url->link('extension/module/ytchannel', $this->token_var . '=' . $this->session->data[$this->token_var], true);
		} else {
			$data['action'] = $this->url->link('extension/module/ytchannel', $this->token_var . '=' . $this->session->data[$this->token_var] . '&module_id=' . $this->request->get['module_id'], true);
		}
		$data['cancel'] = $this->url->link($this->extension_var . '/extension', $this->token_var . '=' . $this->session->data[$this->token_var] . '&type=module', true);

		$this->load->model('localisation/language');
		$languages = $this->model_localisation_language->getLanguages();
		$data['languages'] = $languages;

		if (isset($this->request->get['module_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$module_info = $this->{'model_' . $this->model_place . '_module'}->getModule($this->request->get['module_id']);
		}

		if (isset($this->request->post['name'])) {
			$data['name'] = $this->request->post['name'];
		} elseif (isset($module_info['name'])) {
			$data['name'] = $module_info['name'];
		} else {
			$data['name'] = '';
		}
		if (isset($this->request->post['title'])) {
			$data['title'] = $this->request->post['title'];
		} elseif (isset($module_info['title'])) {
			$data['title'] = $module_info['title'];
		} else {
			$data['title'] = [];
		}
		if (isset($this->request->post['status'])) {
			$data['status'] = $this->request->post['status'];
		} elseif (isset($module_info['status'])) {
			$data['status'] = $module_info['status'];
		} else {
			$data['status'] = '1';
		}
		if (isset($this->request->post['limit'])) {
			$data['limit'] = $this->request->post['limit'];
		} elseif (isset($module_info['limit'])) {
			$data['limit'] = $module_info['limit'];
		} else {
			$data['limit'] = '8';
		}
		if (isset($this->request->post['columns'])) {
			$data['columns'] = $this->request->post['columns'];
		} elseif (isset($module_info['columns'])) {
			$data['columns'] = $module_info['columns'];
		} else {
			$data['columns'] = '4';
		}
		if (isset($this->request->post['image'])) {
			$data['image'] = $this->request->post['image'];
		} elseif (isset($module_info['image'])) {
			$data['image'] = $module_info['image'];
		} else {
			$data['image'] = 'medium';
		}
		if (isset($this->request->post['apikey'])) {
			$data['apikey'] = $this->request->post['apikey'];
		} elseif (isset($module_info['apikey'])) {
			$data['apikey'] = $module_info['apikey'];
		} elseif ($this->config->get('module_ytchannel_apikey')) {
			$data['apikey'] = $this->config->get('module_ytchannel_apikey');
		} else {
			$data['apikey'] = '';
		}
		if (isset($this->request->post['channel'])) {
			$data['channel'] = $this->request->post['channel'];
		} elseif (isset($module_info['channel'])) {
			$data['channel'] = $module_info['channel'];
		} else {
			$data['channel'] = '';
		}
		if (isset($this->request->post['playlist'])) {
			$data['playlist'] = $this->request->post['playlist'];
		} elseif (isset($module_info['playlist'])) {
			$data['playlist'] = $module_info['playlist'];
		} else {
			$data['playlist'] = '';
		}
		if (isset($this->request->post['video'])) {
			$data['video'] = $this->request->post['video'];
		} elseif (isset($module_info['video'])) {
			$data['video'] = $module_info['video'];
		} else {
			$data['video'] = '';
		}
		if (isset($this->request->post['layout'])) {
			$data['layout'] = $this->request->post['layout'];
		} elseif (isset($module_info['layout'])) {
			$data['layout'] = $module_info['layout'];
		} else {
			$data['layout'] = '';
		}
		if (isset($this->request->post['sort'])) {
			$data['sort'] = $this->request->post['sort'];
		} elseif (isset($module_info['sort'])) {
			$data['sort'] = $module_info['sort'];
		} else {
			$data['sort'] = '';
		}
		if (isset($this->request->post['video_setting'])) {
			$data['video_setting'] = $this->request->post['video_setting'];
		} elseif (isset($module_info['video_setting'])) {
			$data['video_setting'] = $module_info['video_setting'];
		} else {
			$data['video_setting'] = [];
		}
		if (isset($this->request->post['header_setting'])) {
			$data['header_setting'] = $this->request->post['header_setting'];
		} elseif (isset($module_info['header_setting'])) {
			$data['header_setting'] = $module_info['header_setting'];
		} else {
			$data['header_setting'] = [];
		}
		if (isset($this->request->post['source'])) {
			$data['source'] = $this->request->post['source'];
		} elseif (isset($module_info['source'])) {
			$data['source'] = $module_info['source'];
		} else {
			$data['source'] = 'channel';
		}
		if (isset($this->request->post['loadmore'])) {
			$data['loadmore'] = $this->request->post['loadmore'];
		} elseif (isset($module_info['loadmore'])) {
			$data['loadmore'] = $module_info['loadmore'];
		} else {
			$data['loadmore'] = '';
		}
		if (isset($this->request->post['fullscreen'])) {
			$data['fullscreen'] = $this->request->post['fullscreen'];
		} elseif (isset($module_info['fullscreen'])) {
			$data['fullscreen'] = $module_info['fullscreen'];
		} else {
			$data['fullscreen'] = '';
		}
		if (isset($this->request->post['branding'])) {
			$data['branding'] = $this->request->post['branding'];
		} elseif (isset($module_info['branding'])) {
			$data['branding'] = $module_info['branding'];
		} else {
			$data['branding'] = '';
		}
		if (isset($this->request->post['license'])) {
			$data['license'] = $this->request->post['license'];
		} elseif (isset($module_info['license'])) {
			$data['license'] = $module_info['license'];
		} else {
			$data['license'] = $this->config->get($this->prefix . 'ytchannel_license');
		}

		$data['cron'] = HTTPS_CATALOG . 'index.php?route=extension/module/ytchannel/update&key='.$data['apikey'].'&source='.$data['source'].'&source_id='.$data[$data['source']];

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/module/ytchannel', $data));
	}

	protected function validate() {
		if (!$this->user->hasPermission('modify', 'extension/module/ytchannel')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if (empty($this->request->post['name'])) {
			$this->error['name'] = $this->language->get('error_name');
		}

		if (!empty($this->request->post['license']) && !empty($_SERVER['SERVER_NAME'])) {   
			$domain = preg_replace('/^www\./', '', $_SERVER['SERVER_NAME']);
			if ($this->request->server['HTTPS']) {
				$server = HTTPS_SERVER;
			} else {
				$server = HTTP_SERVER;
			}
			$parse_domain = parse_url($server);
			$config_domain = preg_replace('/^www\./', '', $parse_domain['host']);
			if ($domain == $config_domain) {
				if (filter_input(INPUT_POST, 'license', FILTER_SANITIZE_SPECIAL_CHARS)!=hash('sha256', 'ytchannel'.$domain.base64_decode('RGFSeU5hMw=='))) {
					$this->error['warning'] = $this->language->get('error_license3');
				} else {
					$this->confirm = true;
				}
			} else {
				$this->error['warning'] = $this->language->get('error_license2') . ' '.$domain.' ('.$config_domain.')';
			}
		} else {
			$this->error['warning'] = $this->language->get('error_license1');
		}

		if ($this->error && !isset($this->error['warning'])) {
			$this->error['warning'] = $this->language->get('error_warning');
		}

		return !$this->error;
	}
}