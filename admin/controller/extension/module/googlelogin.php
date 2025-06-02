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
	private $isenseWrapper;
	private $moduleData_module;
	private $eventGroup;

	public function __construct($registry){
		parent::__construct($registry);
		$this->load->config('isenselabs/googlelogin');
		$this->moduleName = $this->config->get('googlelogin_name');
		$this->call_model = $this->config->get('googlelogin_model');
		$this->module_path = $this->config->get('googlelogin_path');
		$this->eventGroup = $this->config->get('googlelogin_event_group');

		$this->extensions_link = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'].'&type=module', 'SSL');

		$this->load->model($this->module_path);
		$this->moduleModel = $this->{$this->call_model};
    	$this->language_variables = $this->load->language($this->module_path, $this->moduleName);
    	$this->language_variables = $this->language_variables[$this->moduleName]->all();

    	//Loading framework models
	 	$this->load->model('setting/store');
		$this->load->model('setting/setting');
        $this->load->model('localisation/language');
        $this->load->model('design/layout');
		$this->load->model('setting/module');
		$this->load->model('customer/customer_group');

		$this->data['module_path']     = $this->module_path;
		$this->data['moduleName']      = $this->moduleName;
		$this->data['moduleNameSmall'] = $this->moduleName;
		$this->moduleData_module = 'googlelogin_module';
	}

	public function index() {
		foreach ($this->language_variables as $code => $languageVariable) {
		    $this->data[$code] = $languageVariable;
		}
		$this->document->setTitle($this->language_variables['heading_title']);
		$this->data['moduleTitle'] = $this->language_variables['module_title'] .' '. $this->version;


		$catalogURL = $this->getCatalogURL();

		if(!isset($this->request->get['store_id'])) {
           $this->request->get['store_id'] = 0;
        }

        $store = $this->getCurrentStore($this->request->get['store_id']);

		$this->document->addStyle('view/stylesheet/googlelogin/googlelogin.css');
		$this->data['error_warning'] = '';
		if ($this->request->server['REQUEST_METHOD'] == 'POST' && $this->validateForm()) {

			if (!empty($_POST['OaXRyb1BhY2sgLSBDb21'])) {
				$this->request->post['googlelogin_license']['LicensedOn'] = $_POST['OaXRyb1BhY2sgLSBDb21'];
			}
			if (!empty($_POST['cHRpbWl6YXRpb24ef4fe'])) {
				$this->request->post['googlelogin_license']['License'] = json_decode(base64_decode($_POST['cHRpbWl6YXRpb24ef4fe']),true);
			}

			if (!isset($this->request->post[$this->moduleName]['module_id']) || empty($this->request->post[$this->moduleName]['module_id'])) { // Creating a new module
				if(!empty($this->request->post[$this->moduleName]['name'])) {
					if($this->moduleModel->duplicatedModuleName($this->request->post[$this->moduleName]['name'])) {
						$this->model_setting_module->addModule('googlelogin', $this->request->post[$this->moduleName]);
						$lastModuleID = $this->moduleModel->getLastModuleByCode($this->moduleName);
						$this->request->post[$this->moduleName]['module_id'] = $lastModuleID[0]['module_id'];
						$this->model_setting_module->editModule($lastModuleID[0]['module_id'], $this->request->post[$this->moduleName]);
						$this->session->data['success'] = $this->language_variables['text_success_module_creation'];
						$this->response->redirect($this->url->link($this->module_path,  'user_token=' . $this->session->data['user_token'] . '&module_id=' . $lastModuleID[0]['module_id'], 'SSL'));
					} else {
						$this->session->data['warning'] = $this->language_variables['text_error_duplicated_module_name'];
						$this->response->redirect($this->url->link($this->module_path,  'user_token=' . $this->session->data['user_token'], 'SSL'));
					}
				}

			} else if(!empty($this->request->post[$this->moduleName]['module_id'])) { // Edit existing module
				if(!empty($this->request->post[$this->moduleName]['name'])) {

					if($this->moduleModel->duplicatedModuleName($this->request->post[$this->moduleName]['name'], $this->request->post[$this->moduleName]['module_id'])) {
						$this->model_setting_module->editModule($this->request->post[$this->moduleName]['module_id'], $this->request->post[$this->moduleName]);
						$this->session->data['success'] = $this->language_variables['text_success'];
						$this->response->redirect($this->url->link($this->module_path,  'user_token=' . $this->session->data['user_token'] . '&module_id=' . $this->request->post[$this->moduleName]['module_id'], 'SSL'));
					} else {
						$this->session->data['warning'] = $this->language_variables['text_error_duplicated_module_name'];
						$this->response->redirect($this->url->link($this->module_path,  'user_token=' . $this->session->data['user_token'] . '&module_id=' . $this->request->post[$this->moduleName]['module_id'], 'SSL'));
					}
				} else {
					$this->session->data['warning'] = $this->language_variables['text_error_module_name'];
					$this->response->redirect($this->url->link($this->module_path,  'user_token=' . $this->session->data['user_token'] . '&module_id=' . $this->request->post[$this->moduleName]['module_id'], 'SSL'));
				}
			}

			$store = $this->getCurrentStore($this->request->post['store_id']);
			$this->model_setting_setting->editSetting($this->moduleName, $this->request->post, $store['store_id']);

			$success_message = $this->language_variables['text_success'];

			if (!empty($this->request->get['activate'])) {
				$success_message = $this->language_variables['text_success_activation'];
			}

			$this->session->data['success'] = $success_message;
			$this->response->redirect($this->url->link($this->module_path,  'user_token=' . $this->session->data['user_token'], 'SSL'));
		}

		if (isset($this->session->data['success'])) {
			$this->data['success'] = $this->session->data['success'];
			unset($this->session->data['success']);
		} else {
			$this->data['success'] = '';
		}

		if (isset($this->error['name'])) {
			$this->data['error_name'] = $this->error['name'];
		} else {
			$this->data['error_name'] = '';
		}

		if (isset($this->session->data['warning'])) {
			$this->data['error_warning'] = $this->session->data['warning'];
			unset($this->session->data['warning']);
		} else {
			$this->data['error_warning'] = '';
		}

		if (isset($this->error['code'])) {
			$data['error_code'] = $this->error['code'];
		} else {
			$data['error_code'] = '';
		}

		$this->load->model('localisation/language');

		$languages = $this->model_localisation_language->getLanguages();;
		$this->data['languages'] = $languages;

		foreach ($this->data['languages'] as $key => $value) {
			if(version_compare(VERSION, '2.2.0.0', "<")) {
				$this->data['languages'][$key]['flag_url'] = 'view/image/flags/'.$this->data['languages'][$key]['image'];
			} else {
				$this->data['languages'][$key]['flag_url'] = 'language/'.$this->data['languages'][$key]['code'].'/'.$this->data['languages'][$key]['code'].'.png"';
			}
		}


		$firstLanguage = array_shift($languages);
		$this->data['firstLanguageCode'] = $firstLanguage['code'];

		$this->data['has_customer_group'] = false;
		if (defined('VERSION')) {
			if (strcmp(VERSION, '1.5.3') >= 0) {
				$this->data['has_customer_group'] = true;
			}
		}

		if (VERSION >= '2.1.0.1'){
			$this->data['customer_groups'] = $this->model_customer_customer_group->getCustomerGroups();
		} else {
			$this->data['customer_groups'] = $this->model_sale_customer_group->getCustomerGroups();
		}

		$this->data['more_user_details'] = array(
			array(
				'name' => 'ExtraTelephone',
				'default_checked' => false,
				'text' => $this->language_variables['extra_telephone']
			),
			array(
				'name' => 'ExtraCompany',
				'default_checked' => false,
				'text' => $this->language_variables['extra_company']
			),
			array(
				'name' => 'ExtraAddress',
				'default_checked' => false,
				'text' => $this->language_variables['extra_address']
			),
			array(
				'name' => 'ExtraCountry',
				'default_checked' => false,
				'text' => $this->language_variables['extra_country']
			),
			array(
				'name' => 'ExtraRegion',
				'default_checked' => false,
				'text' => $this->language_variables['extra_region']
			),
			array(
				'name' => 'ExtraCity',
				'default_checked' => false,
				'text' => $this->language_variables['extra_city']
			),
			array(
				'name' => 'ExtraPostcode',
				'default_checked' => false,
				'text' => $this->language_variables['extra_postcode']
			),
			array(
				'name' => 'ExtraNewsletter',
				'default_checked' => false,
				'text' => $this->language_variables['extra_newsletter']
			),
			array(
				'name' => 'ExtraPrivacy',
				'default_checked' => false,
				'text' => $this->language_variables['extra_privacy']
			)
		);

		if (defined('VERSION')) {
			if (strcmp(VERSION, '1.5.3') <= 0) {

				$this->data['more_user_details'][] = array(
					'name' => 'ExtraCompanyId',
					'default_checked' => false,
					'text' => $this->language_variables['extra_company_id']
				);

				$this->data['more_user_details'][] = array(
					'name' => 'ExtraTaxId',
					'default_checked' => false,
					'text' => $this->language_variables['extra_tax_id']
				);
			}
		}

  		$this->data['breadcrumbs'] = array();

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'user_token=' . $this->session->data['user_token'], 'SSL'),
      		'separator' => false
   		);

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language_variables['text_module'],
			'href'      => $this->extensions_link
   		);

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language_variables['heading_title'],
			'href'      => $this->url->link($this->module_path, 'user_token=' . $this->session->data['user_token'], 'SSL'),
      		'separator' => ' :: '
   		);

   		if (isset($this->request->get['module_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$this->data['googlelogin'] = $this->model_setting_module->getModule($this->request->get['module_id']);
			$this->data['module_id'] = $this->request->get['module_id'];
		}


		$this->data['stores'] = array_merge(array(0 => array('store_id' => '0', 'name' => $this->config->get('config_name') . ' (' . $this->data['text_default'].')', 'url' => HTTP_SERVER, 'ssl' => HTTPS_SERVER)), $this->model_setting_store->getStores());
		$this->data['store']                  = $store;
		$this->data['token']                  = $this->session->data['user_token'];
		$this->data['action'] = $this->url->link($this->module_path, 'user_token=' . $this->session->data['user_token'], 'SSL');
		$this->data['cancel'] = $this->extensions_link;
		$this->data['data']                   = $this->model_setting_setting->getSetting($this->moduleName);

		$this->data['layouts']                = $this->model_design_layout->getLayouts();
        $this->data['catalog_url']			  = $catalogURL;

        if(isset($this->data['data']['googlelogin_license']))
        	$this->data['moduleData'] = $this->data['data']['googlelogin_license'];

		$this->data['entry_callback'] = array();

		$login_url = $store['url'] . 'index.php?route=account/login';
		$is_https = $this->moduleModel->is_https($login_url);

		$redirect_url = $this->url->link('extension/account/googlelogin', '', 'SSL');

		$redirect_url = str_replace(
			array('/' . IMODULE_ADMIN_FOLDER, '&amp;', '%2F'),
			array('', '&', '/'),
			$redirect_url
		);

		$this->data['entry_callback'] = $redirect_url;
		$this->data['url_duplicate_module'] = urldecode(html_entity_decode($this->url->link($this->module_path.'/duplicateModule', 'user_token=' . $this->session->data['user_token'], 'SSL')));

		$this->data['header']  					 = $this->load->controller('common/header');
		$this->data['column_left']				= $this->load->controller('common/column_left');
		$this->data['footer']					 = $this->load->controller('common/footer');

		if (!empty($this->data['data']['googlelogin_license']['License']['licensedOn'])) {
			$this->data['cHRpbWl6YXRpb24ef4fe'] = base64_encode(json_encode($this->data['data']['googlelogin_license']['License']));
			$this->data['expiresOn'] = date("F j, Y",strtotime($this->data['data']['googlelogin_license']['License']['licenseExpireDate']));
		}

		$this->data['supportUrl'] = 'http://isenselabs.com/tickets/open/' . base64_encode('Support Request').'/'.base64_encode('52').'/'. base64_encode($_SERVER['SERVER_NAME']);
		$this->data['b64'] = (empty($this->data['moduleData']['LicensedOn'])) ? base64_decode('ICAgIDxkaXYgY2xhc3M9ImFsZXJ0IGFsZXJ0LWRhbmdlciBmYWRlIGluIj4NCiAgICAgICAgPGJ1dHRvbiB0eXBlPSJidXR0b24iIGNsYXNzPSJjbG9zZSIgZGF0YS1kaXNtaXNzPSJhbGVydCIgYXJpYS1oaWRkZW49InRydWUiPsOXPC9idXR0b24+DQogICAgICAgIDxoND5XYXJuaW5nISBVbmxpY2Vuc2VkIHZlcnNpb24gb2YgdGhlIG1vZHVsZSE8L2g0Pg0KICAgICAgICA8cD5Zb3UgYXJlIHJ1bm5pbmcgYW4gdW5saWNlbnNlZCB2ZXJzaW9uIG9mIHRoaXMgbW9kdWxlISBZb3UgbmVlZCB0byBlbnRlciB5b3VyIGxpY2Vuc2UgY29kZSB0byBlbnN1cmUgcHJvcGVyIGZ1bmN0aW9uaW5nLCBhY2Nlc3MgdG8gc3VwcG9ydCBhbmQgdXBkYXRlcy48L3A+PGRpdiBzdHlsZT0iaGVpZ2h0OjVweDsiPjwvZGl2Pg0KICAgICAgICA8YSBjbGFzcz0iYnRuIGJ0bi1kYW5nZXIiIGhyZWY9ImphdmFzY3JpcHQ6dm9pZCgwKSIgb25jbGljaz0iJCgnYVtocmVmPSNpc2Vuc2Utc3VwcG9ydF0nKS50cmlnZ2VyKCdjbGljaycpIj5FbnRlciB5b3VyIGxpY2Vuc2UgY29kZTwvYT4NCiAgICA8L2Rpdj4=') : '';

		$this->data['tabs'] = array(
			'google_settings' => $this->load->view($this->data['module_path'] . '/tab_google_settings', $this->data),
			'support' => $this->load->view($this->data['module_path'] . '/tab_support', $this->data)
		);

        $this->response->setOutput($this->load->view($this->module_path, $this->data));
	}

	public function duplicateModule() {
		$this->load->model('setting/module');
		if(isset($this->request->get['module_id']) && !empty($this->request->get['module_id'])) {
			$module_id = $this->request->get['module_id'];
			$data['googlelogin'] = $this->model_setting_module->getModule($module_id);
			if($this->moduleModel->duplicatedModuleName($this->request->get['name'])) {
				$data['googlelogin']['name'] = $this->request->get['name'];
				$this->model_setting_module->addModule('googlelogin', $data['googlelogin']);
				$lastModuleID = $this->moduleModel->getLastModuleByCode($this->moduleName);
				$this->session->data['success'] = $this->language_variables['text_success_module_duplication'];
				$json = html_entity_decode($this->url->link($this->module_path,  'user_token=' . $this->session->data['user_token'] . '&module_id=' . $lastModuleID[0]['module_id'], 'SSL'));
			} else {
				$json = 'This module name already exists!';
			}
		} else {
			$json = 'Error!';
		}

		$this->response->setOutput(json_encode($json));
	}

	public function install() {
		if (!$this->user->hasPermission('modify', $this->module_path)) {
			$this->language->load($this->module_path);
			$this->session->data['error'] = $this->language->get('error_permission');
			$this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', 'SSL'));
		}
		$this->registerEventHandlers();
	}

	public function uninstall() {
		if (!$this->user->hasPermission('modify', $this->module_path)) {
			$this->session->data['error'] = $this->language->get('error_permission');
			$this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', 'SSL'));
		} else {
			$this->unregisterEventHandlers();
			$this->model_setting_setting->deleteSetting($this->moduleName,0);
			$this->model_setting_setting->deleteSetting($this->moduleData_module,0);
			$stores=$this->model_setting_store->getStores();
			foreach ($stores as $store) {
				$this->model_setting_setting->deleteSetting($this->moduleName, $store['store_id']);
				$this->model_setting_setting->deleteSetting($this->moduleData_module, $store['store_id']);
			}
		}
	}

	private function registerEventHandlers() {
		$this->unregisterEventHandlers();
		$eventHandlers = array( // trigger => handler method
			'catalog/view/account/login/before' => 'account/googlelogin/viewAccountLoginBefore'
		);
		foreach ($eventHandlers as $trigger => $handler) {
			$this->model_setting_event->addEvent($this->eventGroup, $trigger, $handler, 1, 0);
		}
	}

	private function unregisterEventHandlers() {
		$this->load->model('setting/event');
		$this->model_setting_event->deleteEventByCode($this->eventGroup);
	}

	private function getCatalogURL() {
        if (isset($_SERVER['HTTPS']) && (($_SERVER['HTTPS'] == 'on') || ($_SERVER['HTTPS'] == '1'))) {
            $storeURL = HTTPS_CATALOG;
        } else {
            $storeURL = HTTP_CATALOG;
        }
        return $storeURL;
    }

    private function getServerURL() {
        if (isset($_SERVER['HTTPS']) && (($_SERVER['HTTPS'] == 'on') || ($_SERVER['HTTPS'] == '1'))) {
            $storeURL = HTTPS_SERVER;
        } else {
            $storeURL = HTTP_SERVER;
        }
        return $storeURL;
    }

    private function getCurrentStore($store_id) {
        if($store_id && $store_id != 0) {
            $store = $this->model_setting_store->getStore($store_id);
        } else {
            $store['store_id'] = 0;
            $store['name'] = $this->config->get('config_name');
            $store['url'] = $this->getCatalogURL();
        }
        return $store;
    }

	protected function validateForm() {
		if (!$this->user->hasPermission('modify', $this->module_path)) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		return !$this->error;
	}

}
?>
