<?php
class ControllerExtensionModuleFacebooklogin extends Controller {
	// Module Unifier
    private $moduleName;
    private $moduleNameSmall;
    private $modulePath;
    private $extensionsLink;
    private $callModel;
    private $moduleModel;
    private $moduleVersion;
    private $tokenString;
    private $data = array();
    private $error = array();
    // Module Unifier
	
	public function __construct($registry) {
		parent::__construct($registry);

		$this->config->load('isenselabs/facebooklogin');

		/* OC version-specific declarations - Begin */
        $this->moduleName      = $this->config->get('facebooklogin_name');
        $this->moduleNameSmall = $this->config->get('facebooklogin_name_small');
        $this->tokenString	   = $this->config->get('facebooklogin_token_string');
        $this->extensionsLink  = $this->url->link($this->config->get('facebooklogin_extensions_link'), $this->tokenString . '=' . $this->session->data[$this->tokenString] . $this->config->get('facebooklogin_extensions_link_params'), 'SSL');
        $this->modulePath      = $this->config->get('facebooklogin_path');

        /* OC version-specific declarations - End */

        /* Module-specific declarations - Begin */
        $this->load->language($this->modulePath);
        $this->load->model($this->modulePath);
        $this->callModel     = $this->config->get('facebooklogin_model_call');
        $this->moduleModel   = $this->{$this->callModel};
        $this->moduleVersion = $this->config->get('facebooklogin_version');
        /* Module-specific declarations - End */

        
        // Multi-Store
        $this->load->model('setting/store');
        // Settings
        $this->load->model('setting/setting');
        // Multi-Lingual
        $this->load->model('localisation/language');
        // Module
        $this->load->model('setting/module');
        
        // Variables
        $this->data['modulePath'] = $this->modulePath;
		$this->data['moduleName'] = $this->moduleName;
		$this->data['moduleNameSmall'] = $this->moduleNameSmall;
		$this->data['moduleModel'] = $this->moduleModel;
		$this->data['tokenString'] = $this->tokenString;
        /* Module-specific loaders - End */

	}

	public function index() {		
		
		$this->document->setTitle($this->language->get('heading_title'));
		$this->data['moduleTitle'] = $this->language->get('module_title');

		$this->load->model('design/layout');
		$catalogURL = $this->getCatalogURL();

		if(!isset($this->request->get['store_id'])) {
           $this->request->get['store_id'] = 0; 
        }

        $store = $this->getCurrentStore($this->request->get['store_id']);
		
		$this->document->addStyle('view/stylesheet/facebooklogin/facebooklogin.css');
		$this->data['error_warning'] = '';

		if ($this->request->server['REQUEST_METHOD'] == 'POST' && $this->validateForm()) {
			
			if (!empty($this->request->post['OaXRyb1BhY2sgLSBDb21'])) {
				$this->request->post['facebooklogin_license']['LicensedOn'] = $this->request->post['OaXRyb1BhY2sgLSBDb21'];
			}
			if (!empty($this->request->post['cHRpbWl6YXRpb24ef4fe'])) {
				$this->request->post['facebooklogin_license']['License'] = json_decode(base64_decode($this->request->post['cHRpbWl6YXRpb24ef4fe']),true);
			}
			
			if (!isset($this->request->post[$this->moduleNameSmall]['module_id']) || empty($this->request->post[$this->moduleNameSmall]['module_id'])) { // Creating a new module
				if(!empty($this->request->post[$this->moduleNameSmall]['name'])) {
					if($this->moduleModel->duplicatedModuleName($this->request->post[$this->moduleNameSmall]['name'])) {
						$this->model_setting_module->addModule('facebooklogin', $this->request->post[$this->moduleNameSmall]);
						$lastModuleID = $this->moduleModel->getLastModuleByCode($this->moduleNameSmall);
						$this->request->post[$this->moduleNameSmall]['module_id'] = $lastModuleID[0]['module_id'];
						$this->model_setting_module->editModule($lastModuleID[0]['module_id'], $this->request->post[$this->moduleNameSmall]);
						$this->session->data['success'] = $this->language->get('text_success_module_creation');
						$this->response->redirect($this->url->link($this->modulePath,  $this->tokenString . '=' . $this->session->data[$this->tokenString] . '&module_id=' . $lastModuleID[0]['module_id'], 'SSL'));
					} else {
						$this->session->data['warning'] = $this->language->get('text_error_duplicated_module_name');
						$this->response->redirect($this->url->link($this->modulePath,  $this->tokenString . '=' . $this->session->data[$this->tokenString], 'SSL'));
					}
				} 

			} else if(!empty($this->request->post[$this->moduleNameSmall]['module_id'])) { // Edit existing module
				if(!empty($this->request->post[$this->moduleNameSmall]['name'])) {
					if($this->moduleModel->duplicatedModuleName($this->request->post[$this->moduleNameSmall]['name'], $this->request->post[$this->moduleNameSmall]['module_id'])) {
						$this->model_setting_module->editModule($this->request->post[$this->moduleNameSmall]['module_id'], $this->request->post[$this->moduleNameSmall]);
						$this->session->data['success'] = $this->language->get('text_success');
						$this->response->redirect($this->url->link($this->modulePath,  $this->tokenString . '=' . $this->session->data[$this->tokenString] . '&module_id=' . $this->request->post[$this->moduleNameSmall]['module_id'], 'SSL'));
					} else {
						$this->session->data['warning'] = $this->language->get('text_error_duplicated_module_name');
						$this->response->redirect($this->url->link($this->modulePath,  $this->tokenString . '=' . $this->session->data[$this->tokenString] . '&module_id=' . $this->request->post[$this->moduleNameSmall]['module_id'], 'SSL'));
					} 
				} else {
					$this->session->data['warning'] = $this->language->get('text_error_module_name');
					$this->response->redirect($this->url->link($this->modulePath,  $this->tokenString . '=' . $this->session->data[$this->tokenString] . '&module_id=' . $this->request->post[$this->moduleNameSmall]['module_id'], 'SSL'));
				}
			} 

			$store = $this->getCurrentStore($this->request->post['store_id']);
			$this->model_setting_setting->editSetting($this->moduleNameSmall, $this->request->post, $store['store_id']);

			if (!empty($this->request->get['activate'])) {
				$success_message = $this->language->get('text_success_activation');
			}

			$this->session->data['success'] = $this->language->get('text_success');
			$this->response->redirect($this->url->link($this->modulePath,  $this->tokenString . '=' . $this->session->data[$this->tokenString], 'SSL'));
		}
			
		$this->data['heading_title'] = $this->language->get('heading_title') . " " . $this->moduleVersion;
		$this->data['text_enabled'] = $this->language->get('text_enabled');
		$this->data['text_disabled'] = $this->language->get('text_disabled');
		$this->data['text_content_top'] = $this->language->get('text_content_top');
		$this->data['text_content_bottom'] = $this->language->get('text_content_bottom');		
		$this->data['text_column_left'] = $this->language->get('text_column_left');
		$this->data['text_column_right'] = $this->language->get('text_column_right');
		$this->data['text_load_in_selector'] = $this->language->get('text_load_in_selector');
		$this->data['text_default'] = $this->language->get('text_default');
		$this->data['text_settings'] = $this->language->get('text_settings');
		$this->data['text_support'] = $this->language->get('text_support');
		$this->data['text_duplicate'] = $this->language->get('text_duplicate');
		$this->data['text_enter_new_name'] = $this->language->get('text_enter_new_name');
		$this->data['text_login_with_facebook'] = $this->language->get('text_login_with_facebook');
		$this->data['text_login'] = $this->language->get('text_login');
		$this->data['text_module_settings'] = $this->language->get('text_module_settings');
		$this->data['entry_module_name'] = $this->language->get('entry_module_name');
		$this->data['entry_module_name_help'] = $this->language->get('entry_module_name_help');
		$this->data['entry_selector'] = $this->language->get('entry_selector');
		$this->data['entry_selector_help'] = $this->language->get('entry_selector_help');
		$this->data['entry_layout'] = $this->language->get('entry_layout');
		$this->data['entry_position'] = $this->language->get('entry_position');
		$this->data['entry_status'] = $this->language->get('entry_status');
		$this->data['entry_status_help'] = $this->language->get('entry_status_help');
		$this->data['entry_sort_order'] = $this->language->get('entry_sort_order');
		$this->data['entry_layout_options'] = $this->language->get('entry_layout_options');
		$this->data['entry_position_options'] = $this->language->get('entry_position_options');
		$this->data['entry_code']	= $this->language->get('entry_code');
		$this->data['entry_code_help']	= $this->language->get('entry_code_help');
		$this->data['entry_api'] = $this->language->get('entry_api');
		$this->data['entry_secret'] = $this->language->get('entry_secret');
		$this->data['entry_redirect'] = $this->language->get('entry_redirect');
		$this->data['entry_redirect_help'] = $this->language->get('entry_redirect_help');
		$this->data['entry_callback_help'] = $this->language->get('entry_callback_help');
		$this->data['entry_preview'] = $this->language->get('entry_preview');
		$this->data['entry_design']	= $this->language->get('entry_design');
		$this->data['entry_no_design'] = $this->language->get('entry_no_design');
		$this->data['entry_wrap_into_widget'] = $this->language->get('entry_wrap_into_widget');
		$this->data['entry_yes'] = $this->language->get('entry_yes');
		$this->data['entry_no'] = $this->language->get('entry_no');
		$this->data['entry_wrapper_title'] = $this->language->get('entry_wrapper_title');
		$this->data['entry_button_name'] = $this->language->get('entry_button_name');
		$this->data['entry_use_oc_settings'] = $this->language->get('entry_use_oc_settings');
		$this->data['entry_use_oc_settings_help'] = $this->language->get('entry_use_oc_settings_help');
		$this->data['entry_assign_to_cg'] = $this->language->get('entry_assign_to_cg');
		$this->data['entry_assign_to_cg_help'] = $this->language->get('entry_assign_to_cg_help');
		$this->data['entry_new_user_details'] = $this->language->get('entry_new_user_details');
		$this->data['entry_new_user_details_help'] = $this->language->get('entry_new_user_details_help');
		$this->data['entry_custom_css'] = $this->language->get('entry_custom_css');
		$this->data['button_save'] = $this->language->get('button_save');
		$this->data['button_cancel'] = $this->language->get('button_cancel');
		$this->data['button_add_module'] = $this->language->get('button_add_module');
		$this->data['button_remove'] = $this->language->get('button_remove');
		$this->data['error_empty_name'] = $this->language->get('error_empty_name');
		$this->data['error_duplicate_name'] = $this->language->get('error_duplicate_name');
				
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

		$this->data['text_your_license'] = $this->language->get('text_your_license');
		$this->data['text_please_enter_code'] = $this->language->get('text_your_license');
		$this->data['text_activate_license'] = $this->language->get('text_activate_license');
		$this->data['text_dont_have_license'] = $this->language->get('text_activate_license');
		$this->data['text_registered_domains'] = $this->language->get('text_registered_domains');
		$this->data['text_valid_license'] = $this->language->get('text_valid_license');
		$this->data['text_manage'] = $this->language->get('text_manage');
		$this->data['text_get_support'] = $this->language->get('text_get_support');
		$this->data['text_community'] = $this->language->get('text_community');
		$this->data['text_community_help'] = $this->language->get('text_community_help');
		$this->data['text_browse_forums'] = $this->language->get('text_browse_forums');
		$this->data['text_tickets']	= $this->language->get('text_tickets');
		$this->data['text_tickets_help'] = $this->language->get('text_tickets_help');
		$this->data['text_open_ticket']	= $this->language->get('text_open_ticket');
		$this->data['text_presale']	= $this->language->get('text_presale');
		$this->data['text_presale_help'] = $this->language->get('text_presale_help');
		$this->data['text_bump_sales'] = $this->language->get('text_bump_sales');
		
		$languages = $this->model_localisation_language->getLanguages();;
		$this->data['languages'] = $languages;
		//2.2.0.0 language flag image fix
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
		
		$dirname =  DIR_APPLICATION.'view/template/' . $this->modulePath;
      	$tab_files = scandir($dirname); 
        $tabs = array();
        foreach ($tab_files as $key => $file) {
        	if (strpos($file,'tab_') !== false && !in_array($file, array('tab_design_settings.php'))) {
                $tabs[] = array(
                	'file' => $dirname . $file,
                	'name' => ucwords(str_replace('.php','',str_replace('_',' ',str_replace('tab_','',$file))))
                );
            } 
        }
		
		$this->data['tabs'] = $tabs;
		
			
		if(VERSION >= '2.1.0.1') {
			$this->load->model('customer/customer_group');
			$this->data['customer_groups'] = $this->model_customer_customer_group->getCustomerGroups();
		} else {
			$this->load->model('sale/customer_group');
			$this->data['customer_groups'] = $this->model_sale_customer_group->getCustomerGroups();
		}		
			
		
		$this->data['more_user_details'] = array(
			array(
				'name' => 'ExtraTelephone',
				'default_checked' => false,
				'text' => $this->language->get('extra_telephone')
			),
			array(
				'name' => 'ExtraCompany',
				'default_checked' => false,
				'text' => $this->language->get('extra_company')
			),
			array(
				'name' => 'ExtraAddress',
				'default_checked' => false,
				'text' => $this->language->get('extra_address')
			),
			array(
				'name' => 'ExtraCountry',
				'default_checked' => false,
				'text' => $this->language->get('extra_country')
			),
			array(
				'name' => 'ExtraRegion',
				'default_checked' => false,
				'text' => $this->language->get('extra_region')
			),
			array(
				'name' => 'ExtraCity',
				'default_checked' => false,
				'text' => $this->language->get('extra_city')
			),
			array(
				'name' => 'ExtraPostcode',
				'default_checked' => false,
				'text' => $this->language->get('extra_postcode')
			),
			array(
				'name' => 'ExtraNewsletter',
				'default_checked' => false,
				'text' => $this->language->get('extra_newsletter')
			),
			array(
				'name' => 'ExtraPrivacy',
				'default_checked' => false,
				'text' => $this->language->get('extra_privacy')
			)
		);
		
  		$this->data['breadcrumbs'] = array();

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', $this->tokenString . '=' . $this->session->data[$this->tokenString], 'SSL'),
      		'separator' => false
   		);

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_module'),
			'href'      => $this->extensionsLink,
      		'separator' => ' :: '
   		);
		
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link($this->modulePath, $this->tokenString . '=' . $this->session->data[$this->tokenString], 'SSL'),
      		'separator' => ' :: '
   		);


   		if (isset($this->request->get['module_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$this->data['facebooklogin'] = $this->model_setting_module->getModule($this->request->get['module_id']);
			$this->data['module_id'] = $this->request->get['module_id'];
		}

		$this->data['stores'] = array_merge(array(0 => array('store_id' => '0', 'name' => $this->config->get('config_name') . ' (' . $this->data['text_default'].')', 'url' => HTTP_SERVER, 'ssl' => HTTPS_SERVER)), $this->model_setting_store->getStores());
		$this->data['store']                  = $store;

		$this->data['action'] 				  = $this->url->link($this->modulePath, $this->tokenString . '=' . $this->session->data[$this->tokenString], 'SSL');
		$this->data['cancel'] 				  = $this->extensionsLink;
		$this->data[$this->tokenString]       = $this->session->data[$this->tokenString];
		$this->data['data']                   = $this->model_setting_setting->getSetting($this->moduleNameSmall, $store['store_id']);
        $this->data['layouts']                = $this->model_design_layout->getLayouts();
        $this->data['catalog_url']			  = $catalogURL;		

		if (isset($this->data['data']['facebooklogin_license'])) {
	        $this->data['moduleData'] = $this->data['data']['facebooklogin_license'];
	    } else {
        	$this->data['licenseMessage'] = empty($this->data['moduleData']['LicensedOn']) ? base64_decode('PGRpdiBjbGFzcz0iYWxlcnQgYWxlcnQtZGFuZ2VyIGZhZGUgaW4iPg0KICAgICAgICA8YnV0dG9uIHR5cGU9ImJ1dHRvbiIgY2xhc3M9ImNsb3NlIiBkYXRhLWRpc21pc3M9ImFsZXJ0IiBhcmlhLWhpZGRlbj0idHJ1ZSI+w5c8L2J1dHRvbj4NCiAgICAgICAgPGg0Pldhcm5pbmchIFVubGljZW5zZWQgdmVyc2lvbiBvZiB0aGUgbW9kdWxlITwvaDQ+DQogICAgICAgIDxwPllvdSBhcmUgcnVubmluZyBhbiB1bmxpY2Vuc2VkIHZlcnNpb24gb2YgdGhpcyBtb2R1bGUhIFlvdSBuZWVkIHRvIGVudGVyIHlvdXIgbGljZW5zZSBjb2RlIHRvIGVuc3VyZSBwcm9wZXIgZnVuY3Rpb25pbmcsIGFjY2VzcyB0byBzdXBwb3J0IGFuZCB1cGRhdGVzLjwvcD48ZGl2IHN0eWxlPSJoZWlnaHQ6NXB4OyI+PC9kaXY+DQogICAgICAgIDxhIGNsYXNzPSJidG4gYnRuLWRhbmdlciIgaHJlZj0iamF2YXNjcmlwdDp2b2lkKDApIiBvbmNsaWNrPSJlbnRlckxpY2Vuc2UoKSI+RW50ZXIgeW91ciBsaWNlbnNlIGNvZGU8L2E+DQogICAgPC9kaXY+') : '';
        }

		$this->data['entry_callback'] = array();

		$login_url = $store['url'] . 'index.php?route=account/login';
		$is_https = $this->moduleModel->is_https($login_url);

		$redirect_url = $this->url->link('extension/module/facebooklogin/account', '', 'SSL');

		$redirect_url = str_replace(
			array('/' . IMODULE_ADMIN_FOLDER, '&amp;', '%2F'),
			array('', '&', '/'),
			$redirect_url
		);

		$this->data['entry_callback'][$store['store_id']] = $redirect_url;
		
		$this->data['url_duplicate_module'] = html_entity_decode($this->url->link($this->modulePath . '/duplicateModule', $this->tokenString . '=' . $this->session->data[$this->tokenString], 'SSL'));
		$this->data['url_duplicate_module_decoded'] = urldecode($this->data['url_duplicate_module']);
		$this->data['get_module_id'] = isset($_GET['module_id'])?$_GET['module_id']:'';
		
		$this->data['header']  					 = $this->load->controller('common/header');
		$this->data['column_left']				= $this->load->controller('common/column_left');
		$this->data['footer']					 = $this->load->controller('common/footer');

		if (empty($this->data['data']['facebooklogin_license']['License']['licensedOn'])) {
			$hostname = (!empty($_SERVER['HTTP_HOST'])) ? $_SERVER['HTTP_HOST'] : '' ;
			$hostname = (strstr($hostname,'http://') === false) ? 'http://'.$hostname: $hostname;

			$this->data['hostname'] = $hostname;
			$this->data['domain'] = base64_encode($hostname);
			$this->data['timenow'] = time();
		}
		if (!empty($this->data['moduleData']['LicensedOn'])) {
			$this->data['b64'] = base64_encode(json_encode($this->data['data']['facebooklogin_license']['License']));
			$this->data['licenseExpiresOn'] = date("F j, Y",strtotime($this->data['data']['facebooklogin_license']['License']['licenseExpireDate']));
		}

		$this->data['openTicketUrl'] = 'http://isenselabs.com/tickets/open/' . base64_encode('Support Request').'/'.base64_encode('117').'/'. base64_encode($_SERVER['SERVER_NAME']);

        $this->response->setOutput($this->load->view($this->modulePath, $this->data));		
		
	}

	public function duplicateModule() {
		if(isset($this->request->get['module_id']) && !empty($this->request->get['module_id'])) {
			$module_id = $this->request->get['module_id'];
			$data['facebooklogin'] = $this->model_setting_module->getModule($module_id);
			if($this->moduleModel->duplicatedModuleName($this->request->get['name'])) {
				$data['facebooklogin']['name'] = $this->request->get['name'];
				$this->model_setting_module->addModule('facebooklogin', $data['facebooklogin']);
				$lastModuleID = $this->moduleModel->getLastModuleByCode($this->moduleNameSmall);
				$this->session->data['success'] = $this->language->get('text_success_module_duplication');
				$json = html_entity_decode($this->url->link($this->modulePath, $this->tokenString . '=' . $this->session->data[$this->tokenString] . '&module_id=' . $lastModuleID[0]['module_id'], 'SSL'));
			} else {
				$json = 'This module name already exists!';
			}
		} else {
			$json = 'Error!';
		}

		$this->response->setOutput(json_encode($json));
	}
	
	public function install() {
		$this->load->model('setting/event');
		// Catalog events
		$this->model_setting_event->addEvent('isenselabs_facebooklogin', 'catalog/controller/account/login/before', 'extension/module/facebooklogin/accountLoginBeforeEventHandler');
	}
	
	public function uninstall() {
		if (!$this->user->hasPermission('modify', $this->modulePath)) {
			$this->session->data['error'] = $this->language->get('error_permission');
			$this->redirect($this->url->link($this->modulePath, $this->tokenString . '=' . $this->session->data[$this->tokenString], 'SSL'));
		} else {
			$this->model_setting_setting->deleteSetting($this->moduleNameSmall,0);
			$this->model_setting_setting->deleteSetting($this->moduleData_module,0);
			$stores=$this->model_setting_store->getStores();
			foreach ($stores as $store) {
				$this->model_setting_setting->deleteSetting($this->moduleNameSmall, $store['store_id']);
				$this->model_setting_setting->deleteSetting($this->moduleData_module, $store['store_id']);
			}
			$this->load->model("setting/event");
			$this->model_setting_event->deleteEventByCode('isenselabs_facebooklogin');
		}
	
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
		if (!$this->user->hasPermission('modify', $this->modulePath)) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		return !$this->error;
	}
	
}
