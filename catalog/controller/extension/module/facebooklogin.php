<?php
class ControllerExtensionModuleFacebooklogin extends Controller {
    private $callModel;
    private $modulePath;
    private $moduleModel;
    private $extensionsLink;
    private $languageVars;
	private $data = array();
	private $error = array();

	public function __construct($registry) {
		parent::__construct($registry);
        $this->modulePath = 'extension/module/facebooklogin';
        $this->config->load('isenselabs/facebooklogin');
        $this->moduleNameSmall      = $this->config->get('facebooklogin_name_small');
        $this->moduleName      = $this->config->get('facebooklogin_name');

        /* Module-specific declarations - Begin */
        $this->languageVars = $this->load->language($this->modulePath, $this->moduleNameSmall);
        $this->languageVars = $this->languageVars[$this->moduleNameSmall];

        // Variables
        $this->data['moduleName'] 		= $this->moduleName;
        $this->data['modulePath']       = $this->modulePath;
        /* Module-specific loaders - End */



        $this->load->model($this->modulePath);
        $this->moduleModel = $this->{$this->callModel};
	}

	public function index($config = array()) {
		$this->load->model('localisation/language');

        $current_language = $this->model_localisation_language->getLanguage($this->config->get('config_language_id'));
      	$this->data['heading_title'] = $this->language->get('heading_title');

      	$login_ssl = isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'));

		if(!$this->customer->isLogged()) {
			if ($login_ssl) {
				$configuration = str_replace('http', 'https', $config);
			} else {
				$configuration = $config;
			}

			$this->data['data']['FacebookLogin'] = $config;
			if (!empty($this->data['data']['FacebookLogin']['CustomCSS'])) {
				$this->data['data']['FacebookLogin']['CustomCSS'] = htmlspecialchars_decode($this->data['data']['FacebookLogin']['CustomCSS']);
			}


			if (!empty($this->data['data']['FacebookLogin']['status']) && $this->data['data']['FacebookLogin']['status'] == '1') {
                $hasEmail = (!empty($fbUserProfile['email'])) ? $fbUserProfile['email'] : false;

                $this->load->model('account/customer');
                $customer_info = $this->model_account_customer->getCustomerByEmail($hasEmail);

                if ($customer_info && $customer_info['status'] == "0") {
                    $this->session->data['error'] = $this->languageVars->get('error_approved');
                }

				if (file_exists('catalog/view/theme/' . $this->getConfigTemplate() . '/stylesheet/facebooklogin.css')) {
					$this->document->addStyle('catalog/view/theme/' . $this->getConfigTemplate() . '/stylesheet/facebooklogin.css');
				} else {
					$this->document->addStyle('catalog/view/theme/default/stylesheet/facebooklogin.css');
				}

				if(!isset($this->data['data']['FacebookLogin']['ButtonName_'.$current_language['code']])){
					$this->data['data']['FacebookLogin']['ButtonLabel'] = 'Login with Facebook';
				} else {
					$this->data['data']['FacebookLogin']['ButtonLabel'] = $this->data['data']['FacebookLogin']['ButtonName_'.$current_language['code']];
				}

				if(!isset($this->data['data']['FacebookLogin']['WrapperTitle_'.$current_language['code']])){
					$this->data['data']['FacebookLogin']['WrapperTitle'] = 'Login';
				} else {
					$this->data['data']['FacebookLogin']['WrapperTitle'] = $this->data['data']['FacebookLogin']['WrapperTitle_'.$current_language['code']];
				}

				if (!empty($this->session->data['facebooklogin_redirect'])) {
					$redirect_url = htmlspecialchars_decode($this->session->data['facebooklogin_redirect']);
				} else if (!empty($this->request->server['HTTP_REFERER'])) {
					$add_protocol = $login_ssl ? 'https' : 'http';
					$redirect_url = htmlspecialchars_decode("//$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
				} else {
					$redirect_url = '';
				}

				$redirect_url = htmlspecialchars_decode($redirect_url);

				$this->data['redirect_url'] = htmlspecialchars_decode($this->url->link('extension/module/facebooklogin/account','&module_id='.$this->data['data']['FacebookLogin']['module_id'].'&redirect='.base64_encode($redirect_url),'SSL'));

				$birthday_table = $this->db->query("SHOW TABLES LIKE '" . DB_PREFIX . "customer_birthday'");

				if($birthday_table->rows) {
					$this->data['scope'] = "email,user_birthday";
				} else {
					$this->data['scope'] = "email";
				}

			   return $this->load->view($this->modulePath, $this->data);
			}
		}
	}

	private function getConfigTemplate() {
		if(version_compare(VERSION, '2.2.0.0', '<')) {
			return $this->config->get('config_template');
		} else {
			return  $this->config->get($this->config->get('config_theme') . '_directory');
		}
	}

	public function account() { // old catalog/controller/account/facebooklogin@index
  		$this->load->model('setting/module');

		unset($this->session->data['facebook_login_details']);

		if ($this->customer->isLogged()) {
	  		$this->closeAndNavigateTo('account/account');
    	}

		if (!empty($this->request->get['redirect'])) {
			$this->session->data['facebooklogin_redirect'] = base64_decode($this->request->get['redirect']);
		}

		if (!class_exists('Facebook\Facebook')) {
			require_once(DIR_SYSTEM . 'library/vendor/isenselabs/facebooklogin/facebook-sdk-v5/autoload.php');
		}

		if(isset($this->request->get['module_id']) && !empty($this->request->get['module_id'])) {
			$facebookLoginConfig = $this->model_setting_module->getModule($this->request->get['module_id']);
		} else {
			echo 'Missing module_id!';
			exit;
		}

		$fb = new Facebook\Facebook(array(
			'app_id' => $facebookLoginConfig['APIKey'],
			'app_secret' => $facebookLoginConfig['APISecret'],
			'default_graph_version' => 'v2.2',
		));

		$jsHelper = $fb->getJavaScriptHelper();
		// @TODO This is going away soon
		$facebookClient = $fb->getClient();

		try {
    		$accessToken = $jsHelper->getAccessToken($facebookClient);
		} catch(Facebook\Exceptions\FacebookResponseException $e) {
		    // When Graph returns an error
		    echo 'Graph returned an error: ' . $e->getMessage();
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
		    // When validation fails or other local issues
		    echo 'Facebook SDK returned an error: ' . $e->getMessage();
		}

		if (isset($accessToken)) {
		   	$this->session->data['facebook_access_token'] = (string) $accessToken;
		} else {
			$this->session->data['facebook_access_token'] = "";
		}

		try {
		  $response = $fb->get('/me?fields=id,first_name,last_name,email,verified', $this->session->data['facebook_access_token']);
		} catch(Facebook\Exceptions\FacebookResponseException $e) {
		  echo 'Graph returned an error: ' . $e->getMessage();
		  exit;
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
		  echo 'Facebook SDK returned an error: ' . $e->getMessage();
		  exit;
		}

		$fbUserProfile = $response->getGraphUser();

		$_SERVERORIG = $_SERVER;
		$_SERVER = $this->htmlspecialcharsDecode($_SERVER);

		$_SERVER = $_SERVERORIG;

		$hasId = (!empty($fbUserProfile['id'])) ? $fbUserProfile['id'] : false;
		$hasEmail = (!empty($fbUserProfile['email'])) ? $fbUserProfile['email'] : false;
		$verified = (!empty($fbUserProfile['verified'])) ? $fbUserProfile['verified'] : true;
        $this->load->model('account/customer');
        $customer_info = $this->model_account_customer->getCustomerByEmail($hasEmail);

        if ($customer_info && $customer_info['status'] == "0") {
            $this->session->data['error'] = $this->languageVars->get('error_approved');
        }

		if ($hasId && $hasEmail && $verified) {

			$email = $fbUserProfile['email'];
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
				$setting = $facebookLoginConfig;
				$noextra = true;

				foreach ($setting as $index => $value) {
					if (strpos($index, 'Extra') === 0) { $noextra = false; break; }
				}

				$customer_group_id = !empty($setting['UseDefaultCustomerGroups']) ? $this->config->get('config_customer_group_id') : $setting['CustomerGroup'];

				if ($noextra) { // we know for certain that the countries are disabled
					$this->load->model('localisation/country');
					$country_info = $this->model_localisation_country->getCountry($this->config->get('config_country_id'));

					if (!empty($country_info['postcode_required']) && !empty($setting['ExtraPostcode'])) {
						$noextra = false;
					}
				}

				$password = substr(md5(uniqid(rand(), true)), 0, 9);

				if ($noextra) {

					$newUserData = $this->getBasicUserData();
					$newUserData['customer_group_id'] = $customer_group_id;
					$newUserData['firstname'] = isset($fbUserProfile['first_name']) ? $fbUserProfile['first_name'] : '';
					$newUserData['lastname'] = isset($fbUserProfile['last_name']) ? $fbUserProfile['last_name'] : '';
					$newUserData['email'] = $fbUserProfile['email'];
					$newUserData['password'] = $password;

					$old_customer_group = $this->config->get('config_customer_group_id');
					$this->config->set('config_customer_group_id', $customer_group_id);
					$this->model_account_customer->addCustomer($newUserData);

					if(isset($fbUserProfile['birthday'])) {
						$userBirthday = explode("/",$fbUserProfile['birthday']);
						$newUserData['birthday'] = $userBirthday[2]."-".$userBirthday[1]."-".$userBirthday[0];

						$birthday_table = $this->db->query("SHOW TABLES LIKE '" . DB_PREFIX . "customer_birthday'");

						if($birthday_table->rows) {
							$newUserData['id'] = $this->db->query("SELECT customer_id FROM `" . DB_PREFIX . "customer` ORDER BY customer_id DESC LIMIT 1")->row['customer_id'];
							$this->db->query("INSERT INTO `" . DB_PREFIX . "customer_birthday` SET customer_id=". $newUserData['id'] .", birthday_date='" . $this->db->escape($newUserData['birthday']) ."'");
						}
					}

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
						unset($this->session->data['facebook_login_details']);
						$this->closeAndNavigateTo(); //$this->closeAndNavigateTo('account/success');
					}
				} else {
					foreach($fbUserProfile as $key=>$value) {
						$fbUserProfile[$key] = $value;
					}

					foreach($fbUserProfile as $k=>$v) {
						$this->session->data['facebook_login_details'][$k] = $v;
					}
					$this->session->data['facebook_login_details']['password'] = $password;
					$this->response->redirect($this->url->link('extension/module/facebooklogin/userdetails', 'module_id='.$facebookLoginConfig['module_id'], 'SSL'));
				}
			}
		} else {
			$this->response->redirect($this->url->link('extension/module/facebooklogin/notVerified', '', 'SSL'));
		}
		$this->closeAndNavigateTo(); //$this->closeAndNavigateTo('account/login');
	}

	private function getBasicUserData() {
		return array(
			'fax' => '',
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

		if (empty($this->session->data['facebook_login_details'])) {
			$this->closeAndNavigateTo('account/account'); //$this->closeAndNavigateTo('account/login');
		}

		if (defined('VERSION')) {
			if (strcmp(VERSION, '1.5.3') >= 0) {
				$this->load->model('account/customer_group');
			}
		}

		$this->document->addScript('catalog/view/javascript/jquery/datetimepicker/moment.js');
		$this->document->addScript('catalog/view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.js');
		$this->document->addStyle('catalog/view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.css');

		if(isset($this->request->get['module_id']) && !empty($this->request->get['module_id']))
			$setting= $this->model_setting_module->getModule($this->request->get['module_id']);

		$this->load->model('account/customer');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {

			if (empty($this->session->data['facebook_login_details'])) $this->closeAndNavigateTo('account/account');

			$data = array_merge($this->getBasicUserData(), $this->request->post, array(
				'firstname' => isset($this->session->data['facebook_login_details']['first_name']) ? $this->session->data['facebook_login_details']['first_name'] : '',
				'lastname' => isset($this->session->data['facebook_login_details']['last_name']) ? $this->session->data['facebook_login_details']['last_name'] : '',
				'email' => isset($this->session->data['facebook_login_details']['email']) ? $this->session->data['facebook_login_details']['email'] : '',
				'password' => isset($this->session->data['facebook_login_details']['password']) ? $this->session->data['facebook_login_details']['password'] : ''
			));

			$this->load->model('account/customer');
			$this->load->model('account/address');

			$customer_group = $this->config->get('config_customer_group_id');
			$this->config->set('config_customer_group_id', $data['customer_group_id']);

			$customer_id = $this->model_account_customer->addCustomer($data);
			$address_id = $this->model_account_address->addAddress($customer_id, $data);
			$this->model_account_customer->editAddressId($customer_id, $address_id);
			$this->model_account_customer->deleteLoginAttempts($data['email']);

			if(isset($this->session->data['facebook_login_details']['birthday'])) {
				$userBirthday = explode("/",$this->session->data['facebook_login_details']['birthday']);
				$data['birthday'] = $userBirthday[2]."-".$userBirthday[1]."-".$userBirthday[0];

				$birthday_table = $this->db->query("SHOW TABLES LIKE '" . DB_PREFIX . "customer_birthday'");

				if($birthday_table->rows) {
					$newUserData['id'] = $this->db->query("SELECT customer_id FROM `" . DB_PREFIX . "customer` ORDER BY customer_id DESC LIMIT 1")->row['customer_id'];
					$this->db->query("INSERT INTO `" . DB_PREFIX . "customer_birthday` SET customer_id=". $newUserData['id'] .", birthday_date='" . $this->db->escape($data['birthday']) ."'");
				}
			}

			$this->config->set('config_customer_group_id', $customer_group);

			$this->load->model('account/customer_group');
            $customer_info = $this->model_account_customer->getCustomerByEmail($data['email']);
			if ($customer_info && !$customer_info['status']) {
         	      $this->response->redirect($this->url->link('account/success', '', true));
             }

			$this->customer->login($data['email'], $data['password']);

			unset($this->session->data['guest']);
			unset($this->session->data['facebook_login_details']);

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

		$this->data['heading_title'] = $this->languageVars->get('heading_title_user_details');
		$this->data['additional_information'] = $this->languageVars->get('additional_information');
		$this->data['lang'] = $this->language->get('code');
		$this->data['text_your_details'] = $this->languageVars->get('text_your_details');
		$this->data['entry_customer_group'] = $this->language->get('entry_customer_group');
		$this->data['text_customer_group'] = $this->language->get('text_customer_group');
		$this->data['entry_telephone'] = $this->language->get('entry_telephone');
		$this->data['entry_company'] = $this->language->get('entry_company');
		$this->data['entry_company_id'] = $this->language->get('entry_company_id');
		$this->data['entry_tax_id'] = $this->language->get('entry_tax_id');
		$this->data['entry_address_1'] = $this->language->get('entry_address_1');
		$this->data['entry_address_2'] = $this->language->get('entry_address_2');
		$this->data['text_select'] = $this->language->get('text_select');
		$this->data['text_none'] = $this->language->get('text_none');
		$this->data['entry_country'] = $this->language->get('entry_country');
		$this->data['entry_zone'] = $this->language->get('entry_zone');
		$this->data['entry_postcode'] = $this->language->get('entry_postcode');
		$this->data['entry_city'] = $this->language->get('entry_city');
		$this->data['button_submit'] = $this->language->get('button_submit');
		$this->data['button_upload'] = $this->language->get('button_upload');
		$this->data['entry_fax'] = $this->language->get('entry_fax');
		$this->data['text_newsletter'] = $this->language->get('text_newsletter');
		$this->data['entry_newsletter'] = $this->language->get('entry_newsletter');
		$this->data['button_uploading'] = $this->language->get('button_uploading');
		$this->data['button_upload'] = $this->language->get('button_upload');
		$this->data['text_yes'] = $this->language->get('text_yes');
		$this->data['text_no'] = $this->language->get('text_no');

		$this->data['text_account_already'] = sprintf($this->language->get('text_account_already'), $this->url->link('account/login', '', 'SSL'));
		$this->data['text_your_address'] = $this->language->get('text_your_address');
		$this->data['text_your_password'] = $this->language->get('text_your_password');
		$this->data['text_loading'] = $this->language->get('text_loading');
		$this->data['entry_firstname'] = $this->language->get('entry_firstname');
		$this->data['entry_lastname'] = $this->language->get('entry_lastname');
		$this->data['entry_email'] = $this->language->get('entry_email');

		$this->data['button_continue'] = $this->language->get('button_continue');

		$this->data['enabled'] = $this->getEnabled($setting);
		$this->data['submit_url'] = $this->url->link('extension/module/facebooklogin/userdetails', 'module_id='.$this->request->get['module_id'], 'SSL');

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

		if (isset($this->request->post['fax'])) {
			$this->data['fax'] = $this->request->post['fax'];
		} else {
			$this->data['fax'] = '';
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
        $this->document->setTitle($this->language->get('heading_title'));
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
				$this->data['text_agree'] = sprintf($this->language->get('text_agree'), $this->url->link('information/information/agree', 'information_id=' . $this->config->get('config_account_id'), 'SSL'), $information_info['title'], $information_info['title']);
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
	    echo $this->load->view($this->modulePath . '/userdetails', $this->data);
	    exit;
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
			'fax' => !empty($setting['ExtraFax']),
			'address' => !empty($setting['ExtraAddress']),
			'city' => !empty($setting['ExtraCity']),
			'postcode' => !empty($setting['ExtraPostcode']),
			'country' => !empty($setting['ExtraCountry']),
			'region' => !empty($setting['ExtraRegion']),
			'privacy' => !empty($setting['ExtraPrivacy']),
			'newsletter' => !empty($setting['ExtraNewsletter']),
			'company_id' => !empty($setting['ExtraCompanyId']),
			'tax_id' => !empty($setting['ExtraTaxId'])
		);
	}

	function closeAndNavigateTo($route = false) {
		if (!empty($this->session->data['facebooklogin_redirect'])) {
			$route = '"'.str_replace('account/logout', 'account/account', $this->session->data['facebooklogin_redirect']).'"';
			unset($this->session->data['facebooklogin_redirect']);
		} else {
			if ($route === false) {
				$route = 'account/account';
			}
			$route = $route === false ? 'window.location.href.replace("account/logout", "account/account")' : '"'. $this->url->link(str_replace('account/logout', 'account/account', $route), '', 'SSL') .'"';
		}

		echo '<script> window.location.href = '.$route.';  </script>'; exit;
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

	public function notVerified() {


		$this->load->language('account/register');

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

		$this->data['heading_title'] = $this->language->get('heading_title_not_verified');
		$this->data['text_alert_error'] = $this->language->get('text_alert_not_verified');
		$this->data['text_description'] = $this->language->get('text_not_verified_description');

		$this->data['content_top'] = $this->load->controller('common/content_top');
		$this->data['content_bottom'] = $this->load->controller('common/content_bottom');
		$this->data['footer'] = $this->load->controller('common/footer');
		$this->data['header'] = $this->load->controller('common/header');



		$this->data['not_verified_text'] = $this->language->get('text_alert_not_verified');

	   return $this->load->view($this->modulePath . '/not_verified', $this->data);
	}

	public function accountLoginBeforeEventHandler(&$route, &$data) {
		if (strtolower($route) == strtolower($this->modulePath . '/accountLoginBeforeEventHandler')) exit; // disallow direct access to the event handler
		if (isset($this->request->post['redirect']) && (strpos($this->request->post['redirect'], $this->config->get('config_url')) !== false || strpos($this->request->post['redirect'], $this->config->get('config_ssl')) !== false)) {
			$redirect = $this->request->post['redirect'];
		} elseif (isset($this->session->data['redirect'])) {
			$redirect = $this->session->data['redirect'];
		} else {
			$redirect = '';
		}
		if (!empty($redirect)) {
			$this->session->data['facebooklogin_redirect'] = $redirect;
		}
	}

}
?>
