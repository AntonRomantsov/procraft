<?php 
class ControllerExtensionAccountGooglelogin extends Controller {
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
	
	public function __construct($registry){
		parent::__construct($registry);
		$this->load->config('isenselabs/googlelogin');
		$this->moduleName = $this->config->get('googlelogin_name');
		$this->call_model = $this->config->get('googlelogin_model');
		$this->module_path = $this->config->get('googlelogin_path');
		
    	$this->language_variables = $this->load->language($this->module_path, $this->moduleName);
    	$this->language_variables = $this->language_variables[$this->moduleName]->all();

    	//Loading framework models
		$this->load->model('setting/setting');
        $this->load->model('localisation/language');
        $this->load->model('localisation/country');
		$this->load->model('setting/module');     

		$this->data['module_path']     = $this->module_path;
		$this->data['moduleName']      = $this->moduleName;
		$this->data['moduleNameSmall'] = $this->moduleName;	
		$this->moduleData_module = 'googlelogin_module';    
	}
	
  	public function index() {
		unset($this->session->data['google_login_details']);
		
		if ($this->customer->isLogged()) {
	  		$this->closeAndNavigateTo('account/account');
    	}
		
		if (!empty($this->request->get['redirect'])) {
			$this->session->data['googlelogin_redirect'] = base64_decode($this->request->get['redirect']);
		}
		
		if(isset($this->session->data['module_id']) && !empty($this->session->data['module_id'])) {
			$googleLoginConfig = $this->model_setting_module->getModule($this->session->data['module_id']);
			
		}
		
		
		if(!isset($this->googlelogin)){
			if (!class_exists('Google_Client')) {		
				require_once(DIR_SYSTEM . 'config/isenselabs/google-api/Google_Client.php');
				require_once(DIR_SYSTEM . 'config/isenselabs/google-api/contrib/Google_Oauth2Service.php');
			}
			
			$this->googlelogin = new Google_Client();
			$this->googlelogin->setClientId($googleLoginConfig['APIKey']);
			$this->googlelogin->setClientSecret($googleLoginConfig['APISecret']);

			$this->googlelogin->setApprovalPrompt('auto');
			$this->googlelogin->setRedirectUri($this->url->link('extension/account/googlelogin', '',true));
			$this->googlelogin->setScopes(array('https://www.googleapis.com/auth/userinfo.profile', 'https://www.googleapis.com/auth/userinfo.email'));
			$oauth2 = new Google_Oauth2Service($this->googlelogin);
		}
		
		if (isset($this->request->get['code'])) {
  			$this->googlelogin->authenticate($this->request->get['code']);
			$token = $this->googlelogin->getAccessToken();			
		}
		
		if (!empty($token) && !empty($oauth2)) {
			$this->googlelogin->setAccessToken($token);
			$user = $oauth2->userinfo->get();
			
			if (!empty($user['error'])) $this->closeAndNavigateTo();
			
			$this->load->model('account/customer');

			$email = $user['email'];
			$email_query = $this->db->query("SELECT `email`, `status` FROM " . DB_PREFIX . "customer WHERE LOWER(email) = '" . $this->db->escape(strtolower($email)) . "'");

			if ($email_query->num_rows) {
				if (!(int)$email_query->row['status']) $this->closeAndNavigateTo();
				if ($this->customer->login($email, '', true)) $this->closeAndNavigateTo();
			} else {
				if (defined('VERSION')) {
					if (strcmp(VERSION, '1.5.3') >= 0) {
						$this->load->model('account/customer_group');
					}
				}
				// Create a new customer
				$setting = $googleLoginConfig;
				$noextra = true;
				
				foreach ($setting as $index => $value) {
					if (strpos($index, 'Extra') === 0) { $noextra = false; break; }
				}
				
				$customer_group_id = !empty($setting['UseDefaultCustomerGroups']) ? $this->config->get('config_customer_group_id') : $setting['CustomerGroup'];
				
				if (defined('VERSION') && $noextra) {
					if (strcmp(VERSION, '1.5.3') >= 0) {
						if (!empty($setting['UseDefaultCustomerGroups']) && is_array($this->config->get('config_customer_group_display'))) {
							$customer_groups = $this->model_account_customer_group->getCustomerGroups();
							foreach ($customer_groups  as $customer_group) {
								if (((isset($customer_group['company_id_display']) && !empty($setting['ExtraCompanyId'])) || (isset($customer_group['tax_id_display']) && !empty($setting['ExtraTaxId']))) && in_array($customer_group['customer_group_id'], $this->config->get('config_customer_group_display'))) {
									$noextra = false;
									break;
								}
							}
						} else {
							$customer_group = $this->model_account_customer_group->getCustomerGroup($customer_group_id);
							if ((isset($customer_group['company_id_display']) && !empty($setting['ExtraCompanyId'])) || (isset($customer_group['tax_id_display']) && !empty($setting['ExtraTaxId']))) {
								$noextra = false;
							}
						}
					}
				}
				
				if ($noextra) { // we know for certain that the countries are disabled
					
					$country_info = $this->model_localisation_country->getCountry($this->config->get('config_country_id'));
		
					if (!empty($country_info['postcode_required']) && !empty($setting['ExtraPostcode'])) {
						$noextra = false;
					}
				}
				
				$password = substr(md5(uniqid(rand(), true)), 0, 9);
				
				if ($noextra) {
					$newUserData = $this->getBasicUserData();
					$newUserData['customer_group_id'] = $customer_group_id;
					$newUserData['firstname'] = isset($user['given_name']) ? $user['given_name'] : '';
					$newUserData['lastname'] = isset($user['family_name']) ? $user['family_name'] : '';
					$newUserData['email'] = $user['email'];
					$newUserData['password'] = $password;
					
					$old_customer_group = $this->config->get('config_customer_group_id');
					$this->config->set('config_customer_group_id', $customer_group_id);
					$this->model_account_customer->addCustomer($newUserData);
					$this->config->set('config_customer_group_id', $old_customer_group);
					
					if (defined('VERSION')) {
						if (strcmp(VERSION, '1.5.3') >= 0) {
							$customer_group = $this->model_account_customer_group->getCustomerGroup($customer_group_id);
							if (!empty($customer_group['approval'])) $this->closeAndNavigateTo('account/success');
						} else {
							$approval = $this->config->get('config_customer_approval');
							if (!empty($approval)) $this->closeAndNavigateTo('account/success');	
						}
					}
					
					if($this->customer->login($email, $password)){
						unset($this->session->data['guest']);
						unset($this->session->data['google_login_details']);
						$this->closeAndNavigateTo(); //$this->closeAndNavigateTo('account/success');
					}
				} else {
					$this->session->data['google_login_details'] = array_merge($user, array('password' => $password));
					$this->response->redirect($this->url->link('extension/account/googlelogin/userdetails', 'module_id=' . $googleLoginConfig['module_id'], 'SSL'));
				}
			}
		}
		
		$this->closeAndNavigateTo(); //$this->closeAndNavigateTo('account/login');
	}
	
	private function getBasicUserData() {
		return array(
			'address_1' => '',
			'address_2' => '',
			'city' => '',
			'postcode' => '',
			'telephone' => '',
			'country_id' => $this->config->get('config_country_id'),
			'tax_id' => '',
			'company_id' => '',
			'company' => '',
			'zone_id' => $this->config->get('config_zone_id'),
			'firstname' => '',
			'lastname' => '',
			'email' => '',
			'password' => '',
			'customer_group_id' => $this->config->get('config_customer_group_id')
		);	
	}
	
	public function userdetails() {
		$this->load->model('setting/module');
		
		if (empty($this->session->data['google_login_details'])) {
			$this->closeAndNavigateTo(); //$this->closeAndNavigateTo('account/login');
		}
		
		if (defined('VERSION')) {
			if (strcmp(VERSION, '1.5.3') >= 0) {
				$this->load->model('account/customer_group');
			}
		}

		$this->document->addScript('catalog/view/javascript/googlelogin/moment.min.js');
		$this->document->addScript('catalog/view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.js');
		$this->document->addStyle('catalog/view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.css');
		
		if(isset($this->request->get['module_id']) && !empty($this->request->get['module_id'])) {
			$setting= $this->model_setting_module->getModule($this->request->get['module_id']);
		}

		$this->load->model('account/customer');

		foreach ($this->language_variables as $key => $localized) {
			$this->data[$key] = $localized;
		}

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			if (empty($this->session->data['google_login_details'])) $this->closeAndNavigateTo();

			$data = array_merge($this->getBasicUserData(), $this->request->post, array(
				'firstname' => isset($this->session->data['google_login_details']['given_name']) ? $this->session->data['google_login_details']['given_name'] : '',
				'lastname' => isset($this->session->data['google_login_details']['family_name']) ? $this->session->data['google_login_details']['family_name'] : '',
				'email' => isset($this->session->data['google_login_details']['email']) ? $this->session->data['google_login_details']['email'] : '',
				'password' => isset($this->session->data['google_login_details']['password']) ? $this->session->data['google_login_details']['password'] : ''
			));
			
			$this->load->model('account/customer');
			$this->load->model('account/address');
			
			$customer_group = $this->config->get('config_customer_group_id');
			$this->config->set('config_customer_group_id', $data['customer_group_id']);

			$customer_id = $this->model_account_customer->addCustomer($data);
			$address_id = $this->model_account_address->addAddress($customer_id, $data);
			$this->model_account_customer->editAddressId($customer_id, $address_id);
			$this->model_account_customer->deleteLoginAttempts($data['email']);
			
			if(isset($this->session->data['google_login_details']['birthday'])) {
				$userBirthday = explode("/",$this->session->data['google_login_details']['birthday']);
				$data['birthday'] = $userBirthday[2]."-".$userBirthday[1]."-".$userBirthday[0];

				$birthday_table = $this->db->query("SHOW TABLES LIKE '" . DB_PREFIX . "customer_birthday'");

				if($birthday_table->rows) {
					$newUserData['id'] = $this->db->query("SELECT customer_id FROM `" . DB_PREFIX . "customer` ORDER BY customer_id DESC LIMIT 1")->row['customer_id'];
					$this->db->query("INSERT INTO `" . DB_PREFIX . "customer_birthday` SET customer_id=". $newUserData['id'] .", birthday_date='" . $this->db->escape($data['birthday']) ."'");
				}
			}
			
			$this->config->set('config_customer_group_id', $customer_group);
			
			$this->load->model('account/customer_group');
			$customer_group = $this->model_account_customer_group->getCustomerGroup($data['customer_group_id']);
			if (!empty($customer_group['approval'])) $this->closeAndNavigateTo('account/success');
			
			$this->customer->login($data['email'], $data['password']);
			
			unset($this->session->data['guest']);
			unset($this->session->data['google_login_details']);

			// Add to activity log
			$this->load->model('account/activity');

			$activity_data = array(
				'customer_id' => $customer_id,
				'name'        => $data['firstname'] . ' ' . $data['lastname']
			);

			$this->model_account_activity->addActivity('register', $activity_data);
			
			// Default Shipping Address
			if ($this->config->get('config_tax_customer') == 'shipping') {
				$this->session->data['shipping_country_id'] = $data['country_id'];
				$this->session->data['shipping_zone_id'] = $data['zone_id'];
				$this->session->data['shipping_postcode'] = $data['postcode'];				
			}
			
			// Default Payment Address
			if ($this->config->get('config_tax_customer') == 'payment') {
				$this->session->data['payment_country_id'] = $data['country_id'];
				$this->session->data['payment_zone_id'] = $data['zone_id'];			
			}					  	  
			
	  		$this->closeAndNavigateTo();
		}
		
		$this->language->load('checkout/checkout');
		$this->load->language('account/register');

		$this->data['text_account_already'] = sprintf($this->language->get('text_account_already'), $this->url->link('account/login', '', 'SSL'));

		$this->data['enabled'] = $this->getEnabled($setting);	
		$this->data['submit_url'] = $this->url->link('extension/account/googlelogin/userdetails', 'module_id='.$this->request->get['module_id'], 'SSL');

		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}

		if (isset($this->error['firstname'])) {
			$this->data['error_firstname'] = $this->error['firstname'];
		} else {
			$this->data['error_firstname'] = '';
		}

		if (isset($this->error['lastname'])) {
			$this->data['error_lastname'] = $this->error['lastname'];
		} else {
			$this->data['error_lastname'] = '';
		}

		if (isset($this->error['email'])) {
			$this->data['error_email'] = $this->error['email'];
		} else {
			$this->data['error_email'] = '';
		}

		if (isset($this->error['telephone'])) {
			$this->data['error_telephone'] = $this->error['telephone'];
		} else {
			$this->data['error_telephone'] = '';
		}

		if (isset($this->error['address_1'])) {
			$this->data['error_address_1'] = $this->error['address_1'];
		} else {
			$this->data['error_address_1'] = '';
		}

		if (isset($this->error['city'])) {
			$this->data['error_city'] = $this->error['city'];
		} else {
			$this->data['error_city'] = '';
		}

		if (isset($this->error['postcode'])) {
			$this->data['error_postcode'] = $this->error['postcode'];
		} else {
			$this->data['error_postcode'] = '';
		}

		if (isset($this->error['country'])) {
			$this->data['error_country'] = $this->error['country'];
		} else {
			$this->data['error_country'] = '';
		}

		if (isset($this->error['zone'])) {
			$this->data['error_zone'] = $this->error['zone'];
		} else {
			$this->data['error_zone'] = '';
		}

		if (isset($this->error['custom_field'])) {
			$this->data['error_custom_field'] = $this->error['custom_field'];
		} else {
			$this->data['error_custom_field'] = array();
		}

		if (isset($this->error['password'])) {
			$this->data['error_password'] = $this->error['password'];
		} else {
			$this->data['error_password'] = '';
		}

		if (isset($this->error['confirm'])) {
			$this->data['error_confirm'] = $this->error['confirm'];
		} else {
			$this->data['error_confirm'] = '';
		}

		if (isset($this->request->post['newsletter'])) {
			$this->data['newsletter'] = $this->request->post['newsletter'];
		} else {
			$this->data['newsletter'] = '';
		}

		if (isset($this->request->post['agree'])) {
			$this->data['agree'] = $this->request->post['agree'];
		} else {
			$this->data['agree'] = false;
		}

		if (isset($this->request->post['telephone'])) {
			$this->data['telephone'] = $this->request->post['telephone'];
		} else {
			$this->data['telephone'] = '';
		}

		if (isset($this->request->post['company'])) {
			$this->data['company'] = $this->request->post['company'];
		} else {
			$this->data['company'] = '';
		}

		if (isset($this->request->post['address_1'])) {
			$this->data['address_1'] = $this->request->post['address_1'];
		} else {
			$this->data['address_1'] = '';
		}

		if (isset($this->request->post['address_2'])) {
			$this->data['address_2'] = $this->request->post['address_2'];
		} else {
			$this->data['address_2'] = '';
		}

		if (isset($this->request->post['postcode'])) {
			$this->data['postcode'] = $this->request->post['postcode'];
		} elseif (isset($this->session->data['shipping_address']['postcode'])) {
			$this->data['postcode'] = $this->session->data['shipping_address']['postcode'];
		} else {
			$this->data['postcode'] = '';
		}

		if (isset($this->request->post['city'])) {
			$this->data['city'] = $this->request->post['city'];
		} else {
			$this->data['city'] = '';
		}

		if (isset($this->request->post['country_id'])) {
			$this->data['country_id'] = $this->request->post['country_id'];
		} elseif (isset($this->session->data['shipping_address']['country_id'])) {
			$this->data['country_id'] = $this->session->data['shipping_address']['country_id'];
		} else {
			$this->data['country_id'] = $this->config->get('config_country_id');
		}

		if (isset($this->request->post['zone_id'])) {
			$this->data['zone_id'] = $this->request->post['zone_id'];
		} elseif (isset($this->session->data['shipping_address']['zone_id'])) {
			$this->data['zone_id'] = $this->session->data['shipping_address']['zone_id'];
		} else {
			$this->data['zone_id'] = '';
		}

		if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
			$server = $this->config->get('config_ssl');
		} else {
			$server = $this->config->get('config_url');
		}

		$this->data['base'] = $server;
		
		$this->data['has_customer_group'] = false;
		if (defined('VERSION')) {
			if (strcmp(VERSION, '1.5.3') >= 0) {
				$this->data['has_customer_group'] = true;
				$this->data['customer_group_id'] = !empty($setting['UseDefaultCustomerGroups']) ? $this->config->get('config_customer_group_id') : $setting['CustomerGroup'];
				$this->data['customer_groups'] = array();
		
				if (!empty($setting['UseDefaultCustomerGroups']) && is_array($this->config->get('config_customer_group_display'))) {
					
					$customer_groups = $this->model_account_customer_group->getCustomerGroups();
					
					foreach ($customer_groups  as $customer_group) {
						if (in_array($customer_group['customer_group_id'], $this->config->get('config_customer_group_display'))) {
							$this->data['customer_groups'][] = $customer_group;
						}
					}
				} else {
					$this->data['customer_groups'][] = 	$this->model_account_customer_group->getCustomerGroup($this->data['customer_group_id']);
				}

				// Custom Fields
				$this->load->model('account/custom_field');

				$this->data['custom_fields'] = $this->model_account_custom_field->getCustomFields($this->data['customer_groups'][0]);

				if (isset($this->request->post['custom_field'])) {
					if (isset($this->request->post['custom_field']['account'])) {
						$account_custom_field = $this->request->post['custom_field']['account'];
					} else {
						$account_custom_field = array();
					}
					
					if (isset($this->request->post['custom_field']['address'])) {
						$address_custom_field = $this->request->post['custom_field']['address'];
					} else {
						$address_custom_field = array();
					}			
					
					$this->data['register_custom_field'] = $account_custom_field + $address_custom_field;
				} else {
					$this->data['register_custom_field'] = array();
				}
				// End Custom Fields
			}
		}
		
		$this->load->model('localisation/country');
		$this->data['countries'] = $this->model_localisation_country->getCountries();
		
		$this->data['zone_id'] = $this->config->get('config_zone_id');
		
		if ($this->config->get('config_account_id')) {
			$this->load->model('catalog/information');
			
			$information_info = $this->model_catalog_information->getInformation($this->config->get('config_account_id'));
			
			if ($information_info) {
				$this->data['text_agree'] = sprintf($this->language->get('text_agree'), $this->url->link('information/information', 'information_id=' . $this->config->get('config_account_id'), 'SSL'), $information_info['title'], $information_info['title']);
			} else {
				$this->data['text_agree'] = '';
			}
		} else {
			$this->data['text_agree'] = '';
		}

		$this->data['breadcrumbs'] = array();

		$this->data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/home')
		);

		$this->data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_account'),
			'href' => $this->url->link('account/account', '', 'SSL')
		);

		$this->data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_register'),
			'href' => $this->url->link('account/register', '', 'SSL')
		);

		$this->data['column_left'] = $this->load->controller('common/column_left');
		$this->data['column_right'] = $this->load->controller('common/column_right');
		$this->data['content_top'] = $this->load->controller('common/content_top');
		$this->data['content_bottom'] = $this->load->controller('common/content_bottom');
		$this->data['footer'] = $this->load->controller('common/footer');
		$this->data['header'] = $this->load->controller('common/header');

		$this->response->setOutput($this->load->view($this->module_path . '/userdetails', $this->data));
	}
	
	public function validate($inline = false, $module_id=0) {		
		$this->load->model('setting/module');

		if(isset($this->request->get['module_id']) && !empty($this->request->get['module_id']))
			$setting= $this->model_setting_module->getModule($this->request->get['module_id']);
		else if(!empty($module_id)) 
			$setting= $this->model_setting_module->getModule($module_id);
		
		$enabled = $this->getEnabled($setting);

		$this->language->load('checkout/checkout');
		$this->language->load('account/register');
		
		if ($enabled['telephone']) {
			if ((utf8_strlen($this->request->post['telephone']) < 3) || (utf8_strlen($this->request->post['telephone']) > 32)) {
				$this->error['telephone'] = $this->language->get('error_telephone');
			}
		}

		if ($enabled['address']) {
			if ((utf8_strlen(trim($this->request->post['address_1'])) < 3) || (utf8_strlen(trim($this->request->post['address_1'])) > 128)) {
				$this->error['address_1'] = $this->language->get('error_address_1');
			}
		}

		if ($enabled['city']) {
			if ((utf8_strlen(trim($this->request->post['city'])) < 2) || (utf8_strlen(trim($this->request->post['city'])) > 128)) {
				$this->error['city'] = $this->language->get('error_city');
			}
		}

		$this->load->model('localisation/country');

		$country_info = $this->model_localisation_country->getCountry($this->request->post['country_id']);

		if ($country_info && $enabled['postcode'] && $country_info['postcode_required'] && (utf8_strlen(trim($this->request->post['postcode'])) < 2 || utf8_strlen(trim($this->request->post['postcode'])) > 10)) {
			$this->error['postcode'] = $this->language->get('error_postcode');
		}

		if ($enabled['country']) {
			if ($this->request->post['country_id'] == '') {
				$this->error['country'] = $this->language->get('error_country');
			}
		}

		if ($enabled['region']) {
			if (!isset($this->request->post['zone_id']) || $this->request->post['zone_id'] == '') {
				$this->error['zone'] = $this->language->get('error_zone');
			}
		}

		// Customer Group
		if (isset($this->request->post['customer_group_id']) && is_array($this->config->get('config_customer_group_display')) && in_array($this->request->post['customer_group_id'], $this->config->get('config_customer_group_display'))) {
			$customer_group_id = $this->request->post['customer_group_id'];
		} else {
			$customer_group_id = $this->config->get('config_customer_group_id');
		}

		// Custom field validation
		$this->load->model('account/custom_field');

		$custom_fields = $this->model_account_custom_field->getCustomFields($customer_group_id);

		foreach ($custom_fields as $custom_field) {
			if ($custom_field['required'] && empty($this->request->post['custom_field'][$custom_field['location']][$custom_field['custom_field_id']])) {
				$this->error['custom_field'][$custom_field['custom_field_id']] = sprintf($this->language->get('error_custom_field'), $custom_field['name']);
			}
		}
		


		if ($this->config->get('config_account_id') && $enabled['privacy']) {
			// Agree to terms
			if ($this->config->get('config_account_id')) {
				$this->load->model('catalog/information');

				$information_info = $this->model_catalog_information->getInformation($this->config->get('config_account_id'));

				if ($information_info && !isset($this->request->post['agree'])) {
					$this->error['warning'] = sprintf($this->language->get('error_agree'), $information_info['title']);
				}
			}
		}

		return !$this->error;
  	}
	
	function getEnabled($setting = array()) {
		
		return array(
			'telephone' => !empty($setting['ExtraTelephone']),
			'company' => !empty($setting['ExtraCompany']),
			'address' => !empty($setting['ExtraAddress']),
			'city' => !empty($setting['ExtraCity']),
			'postcode' => !empty($setting['ExtraPostcode']),
			'country' => !empty($setting['ExtraCountry']),
			'region' => !empty($setting['ExtraRegion']),
			'privacy' => !empty($setting['ExtraPrivacy']),
			'newsletter' => !empty($setting['ExtraNewsletter']),
			'company_id' => !empty($setting['ExtraCompanyId']),
			'tax_id' => !empty($setting['ExtraTaxId']),
		);
	}
	
	function closeAndNavigateTo($route = false) {
		if (!empty($this->session->data['googlelogin_redirect'])) {
			$route = '"'.str_replace('account/logout', 'account/account', html_entity_decode($this->session->data['googlelogin_redirect'])).'"';
			unset($this->session->data['googlelogin_redirect']);
		} else {
			$route = $route === false ? 'window.location.href.replace("account/logout", "account/account")' : '"'. $this->url->link(str_replace('account/logout', 'account/account', $route), '', 'SSL') .'"';
		}
		
		echo '<script> if(window.opener) { window.opener.parent.location = location; window.close(); } window.location.href = '.$route.'; </script>'; exit;
	}
	
	function htmlspecialcharsDecode($data) {
    	if (is_array($data)) {
	  		foreach ($data as $key => $value) {
				unset($data[$key]);
				$data[$this->htmlspecialcharsDecode($key)] = $this->htmlspecialcharsDecode($value);
	  		}
		} else { 
	  		$data = htmlspecialchars_decode($data, ENT_COMPAT);
		}

		return $data;
	}
	
	public function country() {
		$json = array();
		
		$this->load->model('localisation/country');

    	$country_info = $this->model_localisation_country->getCountry($this->request->get['country_id']);

		if ($country_info) {
			$this->load->model('localisation/zone');

			$json = array(
				'country_id'        => $country_info['country_id'],
				'name'              => $country_info['name'],
				'iso_code_2'        => $country_info['iso_code_2'],
				'iso_code_3'        => $country_info['iso_code_3'],
				'address_format'    => $country_info['address_format'],
				'postcode_required' => $country_info['postcode_required'],
				'zone'              => $this->model_localisation_zone->getZonesByCountryId($this->request->get['country_id']),
				'status'            => $country_info['status']		
			);
		}
		
		$this->response->setOutput(json_encode($json));
	}

	public function viewAccountLoginBefore(&$route, &$data, &$template) {
		if (isset($data['redirect'])) {
			$this->session->data['googlelogin_redirect'] = html_entity_decode($data['redirect']);
		}
	}
}
?>