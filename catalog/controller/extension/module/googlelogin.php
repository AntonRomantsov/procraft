<?php
class ControllerExtensionModuleGooglelogin extends Controller {
	private $data = array();
	private $error = array();
	private $version;
	private $module_path;
	private $extensions_link;
	private $language_variables;
	private $moduleModel;
	private $moduleName;
	private $call_model;
	private $module_library;

	public function __construct($registry){
		parent::__construct($registry);
		$this->load->config('isenselabs/googlelogin');
		$this->moduleName = $this->config->get('googlelogin_name');
		$this->call_model = $this->config->get('googlelogin_model');
		$this->module_path = $this->config->get('googlelogin_path');


		$this->language_variables = $this->load->language($this->module_path, $this->moduleName);
	 	$this->language_variables = $this->language_variables[$this->moduleName]->all();

    	//Loading framework models
	 	$this->load->model('setting/store');
		$this->load->model('setting/setting');
        $this->load->model('localisation/language');

		$this->data['module_path']     = $this->module_path;
		$this->data['moduleName']      = $this->moduleName;
		$this->data['moduleNameSmall'] = $this->moduleName;
	}
	public function index($config) {
		$this->data['heading_title'] = $this->language->get('heading_title');

		$login_ssl = isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'));

			if(!$this->customer->isLogged()) {
				if ($login_ssl) {
					$configuration = str_replace('http', 'https', $config);
					$server = HTTPS_SERVER;
				} else {
					$configuration = $config;
					$server = HTTP_SERVER;
				}

				$this->data['data']['GoogleLogin'] = $config;
				if (!empty($this->data['data']['GoogleLogin']['status']) && $this->data['data']['GoogleLogin']['status'] == '1') {
					$this->data['url_login'] = htmlspecialchars_decode($this->url->link($this->module_path.'/display', 'module_id='.$this->data['data']['GoogleLogin']['module_id'], $login_ssl ? 'SSL' : 'NONSSL'));

					if (file_exists('catalog/view/theme/' . $this->getConfigTemplate() . '/css/googlelogin/googlelogin.css')) {
						$this->document->addStyle('catalog/view/theme/' . $this->getConfigTemplate() . '/css/googlelogin/googlelogin.css');
					} else {
						$this->document->addStyle('catalog/view/theme/default/stylesheet/googlelogin/googlelogin.css');
					}

					if(!isset($this->data['data']['GoogleLogin']['ButtonName_'.$this->config->get('config_language')])){
						$this->data['data']['GoogleLogin']['ButtonLabel'] = 'Login with Google';
					} else {
						$this->data['data']['GoogleLogin']['ButtonLabel'] = $this->data['data']['GoogleLogin']['ButtonName_'.$this->config->get('config_language')];
					}

					if(!isset($this->data['data']['GoogleLogin']['WrapperTitle_'.$this->config->get('config_language')])){
						$this->data['data']['GoogleLogin']['WrapperTitle'] = 'Login';
					} else {
						$this->data['data']['GoogleLogin']['WrapperTitle'] = $this->data['data']['GoogleLogin']['WrapperTitle_'.$this->config->get('config_language')];
					}

					$this->data['data']['GoogleLogin']['CustomCSS'] = htmlspecialchars_decode($this->data['data']['GoogleLogin']['CustomCSS']);

					return $this->load->view($this->module_path.'/googlelogin', $this->data);
				}
			}
		}

		public function display() {
			$this->load->model('setting/module');
			$login_ssl = isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'));

			if ($login_ssl) {
				$configuration = str_replace('http', 'https', $this->config->get('googlelogin'));
				$server = HTTPS_SERVER;
			} else {
				$configuration = $this->config->get('googlelogin');
				$server = HTTP_SERVER;
			}

			if(isset($this->request->get['module_id']) && !empty($this->request->get['module_id']))
				$configuration = $this->model_setting_module->getModule($this->request->get['module_id']);
			else
				$configuration = array();

			if (!empty($this->session->data['googlelogin_redirect'])) {
				$redirect_url = $this->session->data['googlelogin_redirect'];
			} else if (!empty($this->request->server['HTTP_REFERER'])) {
				$redirect_url = $this->request->server['HTTP_REFERER'];
			} else {
				$redirect_url = '';
			}

			if (!empty($redirect_url)) {
				$this->session->data['googlelogin_redirect'] = $redirect_url;
			} else {
				unset($this->session->data['googlelogin_redirect']);
			}
			$this->session->data['module_id'] = $configuration['module_id'];
			$redirect = htmlspecialchars_decode($this->url->link('extension/account/googlelogin', '', $login_ssl ? 'SSL' : 'NONSSL'));

			if(!isset($this->googleObject)) {
				if (!class_exists('Google_Client')) {
					require_once(DIR_SYSTEM . 'config/isenselabs/google-api/Google_Client.php');
				}
				$this->googleObject = new Google_Client();
				$this->googleObject->setClientId($configuration['APIKey']);
				$this->googleObject->setClientSecret($configuration['APISecret']);
				$this->googleObject->setApprovalPrompt('auto');
				$this->googleObject->setRedirectUri($redirect);
				$this->googleObject->setScopes(array('https://www.googleapis.com/auth/userinfo.profile', 'https://www.googleapis.com/auth/userinfo.email'));
			}

			echo $this->googleObject->createAuthUrl(); exit;
	}

	private function getConfigTemplate(){
		return  $this->config->get('config_template');
	}
}
?>
