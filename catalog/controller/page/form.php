<?php
class ControllerPageForm extends Controller {
    const TOKEN = 'YWExNjBlYzM4Nzg1ZDlhNTk0OWQzMzZmMjMwMzViZjE4NGNiZjUyNQ';

	public function index() {
		$this->load->language('page/form');

		$this->load->model('page/form');

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/home')
		);

		if (isset($this->request->get['page_form_id'])) {
			$page_form_id = (int)$this->request->get['page_form_id'];
		} else {
			$page_form_id = 0;
		}

		$page_form_info = $this->model_page_form->getPageForm($page_form_id);

		if ($page_form_info) {

			// Datetime Picker
			if(VERSION >= '3.0.0.0') {
			$this->document->addScript('catalog/view/javascript/jquery/magnific/jquery.magnific-popup.min.js');
			$this->document->addStyle('catalog/view/javascript/jquery/magnific/magnific-popup.css');
			$this->document->addScript('catalog/view/javascript/jquery/datetimepicker/moment/moment.min.js');
			$this->document->addScript('catalog/view/javascript/jquery/datetimepicker/moment/moment-with-locales.min.js');
			$this->document->addScript('catalog/view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.js');
			$this->document->addStyle('catalog/view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.css');
			} else {
			$this->document->addScript('catalog/view/javascript/jquery/datetimepicker/moment.js');
			$this->document->addScript('catalog/view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.js');
			$this->document->addStyle('catalog/view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.css');
			}

			// Color Picker
			$this->document->addStyle('catalog/view/javascript/jquery/formbuilder/colorpicker/css/colorpicker.css');
			$this->document->addScript('catalog/view/javascript/jquery/formbuilder/colorpicker/js/colorpicker.js');

			// Dropzone
			$this->document->addStyle('catalog/view/javascript/jquery/formbuilder/dropzone/dist/dropzone.css');
			$this->document->addScript('catalog/view/javascript/jquery/formbuilder/dropzone/dist/dropzone.js');

			// Extension Script
			$this->document->addScript('catalog/view/javascript/jquery/formbuilder/formbuilder.js');

			// Extension Style
			$this->document->addStyle('catalog/view/theme/default/stylesheet/ciformbuilder/style.css');


			$this->document->setTitle($page_form_info['meta_title']);
			$this->document->setDescription($page_form_info['meta_description']);
			$this->document->setKeywords($page_form_info['meta_keyword']);

			$data['breadcrumbs'][] = array(
				'text' => $page_form_info['title'],
				'href' => $this->url->link('page/form', 'page_form_id=' .  $page_form_id)
			);

			$data['page_form_id'] = $page_form_info['page_form_id'];
			$data['css'] = $page_form_info['css'];
			$data['reset_button'] = $page_form_info['reset_button'];

			$data['text_select'] = $this->language->get('text_select');
			$data['button_upload'] = $this->language->get('button_upload');
			$data['text_loading'] = $this->language->get('text_loading');
			$data['text_none'] = $this->language->get('text_none');
			$data['button_reset'] = $this->language->get('button_reset');

			$data['heading_title'] = $page_form_info['title'];

			$data['description'] = html_entity_decode($page_form_info['description'], ENT_QUOTES, 'UTF-8');
			$data['bottom_description'] = html_entity_decode($page_form_info['bottom_description'], ENT_QUOTES, 'UTF-8');

			$data['fieldset_title'] = $page_form_info['fieldset_title'];
			$data['button_continue'] = ($page_form_info['submit_button']) ? $page_form_info['submit_button'] :  $this->language->get('button_continue');


			// Page Form Options
			$data['page_form_options'] = $this->model_page_form->getPageFormOptions($page_form_info['page_form_id']);
			$data['country_exists'] = $this->model_page_form->getPageFormOptionsCountry($page_form_info['page_form_id']);

			$this->load->model('localisation/country');
			$data['countries'] = $this->model_localisation_country->getCountries();


			$this->load->model('localisation/zone');
			$data['zones'] = $this->model_localisation_zone->getZonesByCountryId($this->config->get('config_country_id'));

			// Captcha
			if(VERSION >= '3.0.0.0') {
				if ($this->config->get('captcha_' . $this->config->get('config_captcha') . '_status') && $page_form_info['captcha']) {
					$data['captcha'] = $this->load->controller('extension/captcha/' . $this->config->get('config_captcha'));
				} else {
					$data['captcha'] = '';
				}
			} else {
				if ($this->config->get($this->config->get('config_captcha') . '_status') && $page_form_info['captcha']) {
					if (VERSION <= '2.2.0.0') {
						$data['captcha'] = $this->load->controller('captcha/' . $this->config->get('config_captcha'));
					} else {
						$data['captcha'] = $this->load->controller('extension/captcha/' . $this->config->get('config_captcha'));
					}

				} else {
					$data['captcha'] = '';
				}
			}

			if($this->config->get('theme_default_directory')) {
				$data['theme_name'] = $this->config->get('theme_default_directory');
			} else if($this->config->get('config_template')) {
				$data['theme_name'] = $this->config->get('config_template');
			} else{
				$data['theme_name'] = 'default';
			}

			if(empty($data['theme_name'])) {
				$data['theme_name'] = 'default';
			}

			if(VERSION >= '3.0.0.0') {
				if (file_exists(DIR_TEMPLATE . $data['theme_name'] .'/template/page/page_oc3/form_fields.twig')) {
					$data['include_fields_file'] = $data['theme_name'] .'/template/page/page_oc3/form_fields.twig';
				} else {
					$data['include_fields_file'] = 'default/template/page/page_oc3/form_fields.twig';
				}
			} else {
				if (file_exists(DIR_TEMPLATE . $data['theme_name'] .'/template/page/page_oc2/form_fields.tpl')) {
					$data['include_fields_file'] = DIR_TEMPLATE . $data['theme_name'] .'/template/page/page_oc2/form_fields.tpl';
				} else {
					$data['include_fields_file'] = DIR_TEMPLATE . 'default/template/page/page_oc2/form_fields.tpl';
				}
			}

			$data['column_left'] = $this->load->controller('common/column_left');
			$data['column_right'] = $this->load->controller('common/column_right');
			$data['content_top'] = $this->load->controller('common/content_top');
			$data['content_bottom'] = $this->load->controller('common/content_bottom');
			$data['footer'] = $this->load->controller('common/footer');
			$data['header'] = $this->load->controller('common/header');

			if(VERSION < '2.2.0.0') {
				if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/page/form.tpl')) {
					$this->response->setOutput($this->load->view($this->config->get('config_template') . '/template/page/page_oc2/form.tpl', $data));
				} else {
					$this->response->setOutput($this->load->view('default/template/page/page_oc2/form.tpl', $data));
				}
			} else if(VERSION <= '2.3.0.2') {
				$this->response->setOutput($this->load->view('page/page_oc2/form', $data));
			} else {
				$this->response->setOutput($this->load->view('page/page_oc3/form', $data));
			}
		} else {
			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('text_error'),
				'href' => $this->url->link('page/form', 'page_form_id=' . $page_form_id)
			);

			$this->document->setTitle($this->language->get('text_error'));

			$data['heading_title'] = $this->language->get('text_error');

			$data['text_error'] = $this->language->get('text_error');

			$data['button_continue'] = $this->language->get('button_continue');

			$data['continue'] = $this->url->link('common/home');

			$this->response->addHeader($this->request->server['SERVER_PROTOCOL'] . ' 404 Not Found');

			$data['column_left'] = $this->load->controller('common/column_left');
			$data['column_right'] = $this->load->controller('common/column_right');
			$data['content_top'] = $this->load->controller('common/content_top');
			$data['content_bottom'] = $this->load->controller('common/content_bottom');
			$data['footer'] = $this->load->controller('common/footer');
			$data['header'] = $this->load->controller('common/header');

			if(VERSION < '2.2.0.0') {
				if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/error/not_found.tpl')) {
					$this->response->setOutput($this->load->view($this->config->get('config_template') . '/template/error/not_found.tpl', $data));
				} else {
					$this->response->setOutput($this->load->view('default/template/error/not_found.tpl', $data));
				}
			} else{
				$this->response->setOutput($this->load->view('error/not_found', $data));
			}
		}
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

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	public function add() {
		if(VERSION < '2.2.0.0') {
			require_once(DIR_SYSTEM.'library/pageform.php');
			global $registry;

			$this->pageform = new pageform($registry);
		} else{
			$this->load->library('pageform');
		}

		$this->load->language('page/form');

		$this->load->model('page/form');
		$this->load->model('localisation/country');
		$this->load->model('localisation/zone');
		$this->load->model('extension/module/giftor');
		$this->load->model('catalog/product');

		$json = array();

		if (isset($this->request->get['page_form_id'])) {
			$page_form_id = (int)$this->request->get['page_form_id'];
		} else if (isset($this->request->post['page_form_id'])) {
			$page_form_id = (int)$this->request->post['page_form_id'];
		} else {
			$page_form_id = 0;
		}

		$page_form_info = $this->model_page_form->getPageForm($page_form_id);
		if($page_form_info) {
			if (isset($this->request->post['field'])) {
				$field = $this->request->post['field'];
			} else {
				$field = array();
			}

			if(isset($field[29])){
                $gifts = $this->model_extension_module_giftor->getGiftsByProduct($field[29]);
			}

			if(isset($gifts)){
                foreach($gifts as $gift){
					$gift_data = $this->model_catalog_product->getProduct($gift['product_id']);
					$field[16] .= ' ^ ' . $gift_data['name'];
					$field[17] .= ' - ' . '0';
					$field[18] .= ' - ' . $gift_data['sku'];
					$field[19] .= ' - ' . HTTPS_SERVER . 'image/' . $gift_data['image'];
				}
			}

			// Page Form Options
			$page_form_options = $this->model_page_form->getPageFormOptions($page_form_id);

			$password = '';
			foreach ($page_form_options as $page_form_option) {
				// Text
				if ($page_form_option['required'] && $page_form_option['type'] == 'text' && isset($field[$page_form_option['page_form_option_id']]) && $this->pageform->validateText($field[$page_form_option['page_form_option_id']])) {
						$json['error']['field'][$page_form_option['page_form_option_id']] = ($page_form_option['field_error']) ? $page_form_option['field_error'] : sprintf($this->language->get('error_required'), $page_form_option['field_name']);
				}

				// Textarea
				if ($page_form_option['required'] && $page_form_option['type'] == 'textarea' && isset($field[$page_form_option['page_form_option_id']]) && $this->pageform->validateTextarea($field[$page_form_option['page_form_option_id']])) {
						$json['error']['field'][$page_form_option['page_form_option_id']] = ($page_form_option['field_error']) ? $page_form_option['field_error'] : sprintf($this->language->get('error_required'), $page_form_option['field_name']);
				}

				// Number
				if ($page_form_option['required'] && $page_form_option['type'] == 'number' && isset($field[$page_form_option['page_form_option_id']]) && $this->pageform->validateNumber($field[$page_form_option['page_form_option_id']])) {
						$json['error']['field'][$page_form_option['page_form_option_id']] = ($page_form_option['field_error']) ? $page_form_option['field_error'] : sprintf($this->language->get('error_required'), $page_form_option['field_name']);
				}


				// Telephone
				if ($page_form_option['required'] && $page_form_option['type'] == 'telephone' && isset($field[$page_form_option['page_form_option_id']]) && $this->pageform->validateTelephone($field[$page_form_option['page_form_option_id']])) {
						$json['error']['field'][$page_form_option['page_form_option_id']] = ($page_form_option['field_error']) ? $page_form_option['field_error'] : sprintf($this->language->get('error_required'), $page_form_option['field_name']);
				}

				// Email
				if ($page_form_option['required'] && ($page_form_option['type'] == 'email' || $page_form_option['type'] == 'email_exists') && isset($field[$page_form_option['page_form_option_id']]) && $this->pageform->validateEmail($field[$page_form_option['page_form_option_id']])) {
						$json['error']['field'][$page_form_option['page_form_option_id']] = ($page_form_option['field_error']) ? $page_form_option['field_error'] : $this->language->get('error_email');
				}

				// Email Exists
				if ($page_form_option['required'] && $page_form_option['type'] == 'email_exists' && isset($field[$page_form_option['page_form_option_id']]) && $this->model_page_form->getPageRequestEmailByPageFormID($field[$page_form_option['page_form_option_id']], $page_form_id)) {

						$json['error']['field'][$page_form_option['page_form_option_id']] = ($page_form_option['field_error']) ? $page_form_option['field_error'] : $this->language->get('error_exists');

						$json['error']['warning'] = ($page_form_option['field_error']) ? $page_form_option['field_error'] : $this->language->get('error_exists');
				}

				// Password
				if ($page_form_option['required'] && $page_form_option['type'] == 'password' && isset($field[$page_form_option['page_form_option_id']]) && $this->pageform->validatePassword($field[$page_form_option['page_form_option_id']])) {
						$json['error']['field'][$page_form_option['page_form_option_id']] = ($page_form_option['field_error']) ? $page_form_option['field_error'] : $this->language->get('error_password');
				}

				// Get First Passowrd
				if ($page_form_option['required'] && $page_form_option['type'] == 'password' && isset($field[$page_form_option['page_form_option_id']])) {
					$password = $field[$page_form_option['page_form_option_id']];
				}

				// Confirm Passowrd
				if ($page_form_option['required'] && $page_form_option['type'] == 'confirm_password' && isset($field[$page_form_option['page_form_option_id']]) && $this->pageform->validateConfirmPassword($field[$page_form_option['page_form_option_id']], $password)) {
						$json['error']['field'][$page_form_option['page_form_option_id']] = ($page_form_option['field_error']) ? $page_form_option['field_error'] : $this->language->get('error_confirm');
				}

				// Color Picker
				if ($page_form_option['required'] && $page_form_option['type'] == 'color_picker' && isset($field[$page_form_option['page_form_option_id']]) && $field[$page_form_option['page_form_option_id']] == '') {
						$json['error']['field'][$page_form_option['page_form_option_id']] = ($page_form_option['field_error']) ? $page_form_option['field_error'] : sprintf($this->language->get('error_required'), $page_form_option['field_name']);
				}

				// File
				if ($page_form_option['required'] && $page_form_option['type'] == 'file' && isset($field[$page_form_option['page_form_option_id']]) && $this->pageform->validateFile($field[$page_form_option['page_form_option_id']])) {
						$json['error']['field'][$page_form_option['page_form_option_id']] = ($page_form_option['field_error']) ? $page_form_option['field_error'] : sprintf($this->language->get('error_required'), $page_form_option['field_name']);
				}

				// Date
				if ($page_form_option['required'] && $page_form_option['type'] == 'date' && isset($field[$page_form_option['page_form_option_id']]) && $this->pageform->validateDate($field[$page_form_option['page_form_option_id']])) {
						$json['error']['field'][$page_form_option['page_form_option_id']] = ($page_form_option['field_error']) ? $page_form_option['field_error'] : sprintf($this->language->get('error_required'), $page_form_option['field_name']);
				}

				// Time
				if ($page_form_option['required'] && $page_form_option['type'] == 'time' && isset($field[$page_form_option['page_form_option_id']]) && $this->pageform->validateTime($field[$page_form_option['page_form_option_id']])) {
						$json['error']['field'][$page_form_option['page_form_option_id']] = ($page_form_option['field_error']) ? $page_form_option['field_error'] : sprintf($this->language->get('error_required'), $page_form_option['field_name']);
				}

				// DateTime
				if ($page_form_option['required'] && $page_form_option['type'] == 'datetime' && isset($field[$page_form_option['page_form_option_id']]) && $this->pageform->validateDateTime($field[$page_form_option['page_form_option_id']])) {
						$json['error']['field'][$page_form_option['page_form_option_id']] = ($page_form_option['field_error']) ? $page_form_option['field_error'] : sprintf($this->language->get('error_required'), $page_form_option['field_name']);
				}

				// Country
				if ($page_form_option['required'] && $page_form_option['type'] == 'country' && isset($field[$page_form_option['page_form_option_id']]) && $this->pageform->validateCountry($field[$page_form_option['page_form_option_id']])) {
						$json['error']['field'][$page_form_option['page_form_option_id']] = ($page_form_option['field_error']) ? $page_form_option['field_error'] : sprintf($this->language->get('error_required'), $page_form_option['field_name']);
				}

				// Zone
				if ($page_form_option['required'] && $page_form_option['type'] == 'zone' && isset($field[$page_form_option['page_form_option_id']]) && $this->pageform->validateZone($field[$page_form_option['page_form_option_id']])) {
						$json['error']['field'][$page_form_option['page_form_option_id']] = ($page_form_option['field_error']) ? $page_form_option['field_error'] : sprintf($this->language->get('error_required'), $page_form_option['field_name']);
				}

				// Postcode
				if ($page_form_option['required'] && $page_form_option['type'] == 'postcode' && isset($field[$page_form_option['page_form_option_id']]) && $this->pageform->validatePostcode($field[$page_form_option['page_form_option_id']])) {
						$json['error']['field'][$page_form_option['page_form_option_id']] = ($page_form_option['field_error']) ? $page_form_option['field_error'] : sprintf($this->language->get('error_required'), $page_form_option['field_name']);
				}

				// Address
				if ($page_form_option['required'] && $page_form_option['type'] == 'address' && isset($field[$page_form_option['page_form_option_id']]) && $this->pageform->validateAddress($field[$page_form_option['page_form_option_id']])) {
						$json['error']['field'][$page_form_option['page_form_option_id']] = ($page_form_option['field_error']) ? $page_form_option['field_error'] : sprintf($this->language->get('error_required'), $page_form_option['field_name']);
				}

				// Select
				if ($page_form_option['required'] && $page_form_option['type'] == 'select' && empty($field[$page_form_option['page_form_option_id']])) {
						$json['error']['field'][$page_form_option['page_form_option_id']] = ($page_form_option['field_error']) ? $page_form_option['field_error'] : sprintf($this->language->get('error_required'), $page_form_option['field_name']);
				}

				// Multi Select
				if ($page_form_option['required'] && $page_form_option['type'] == 'multi_select' && empty($field[$page_form_option['page_form_option_id']])) {
						$json['error']['field'][$page_form_option['page_form_option_id']] = ($page_form_option['field_error']) ? $page_form_option['field_error'] : sprintf($this->language->get('error_required'), $page_form_option['field_name']);
				}

				// Radio
				if ($page_form_option['required'] && $page_form_option['type'] == 'radio' && empty($field[$page_form_option['page_form_option_id']])) {
						$json['error']['field'][$page_form_option['page_form_option_id']] = ($page_form_option['field_error']) ? $page_form_option['field_error'] : sprintf($this->language->get('error_required'), $page_form_option['field_name']);
				}

				// Radio Toggle
				if ($page_form_option['required'] && $page_form_option['type'] == 'radio_toggle' && empty($field[$page_form_option['page_form_option_id']])) {
						$json['error']['field'][$page_form_option['page_form_option_id']] = ($page_form_option['field_error']) ? $page_form_option['field_error'] : sprintf($this->language->get('error_required'), $page_form_option['field_name']);
				}

				// Checkbox
				if ($page_form_option['required'] && $page_form_option['type'] == 'checkbox' && empty($field[$page_form_option['page_form_option_id']])) {
						$json['error']['field'][$page_form_option['page_form_option_id']] = ($page_form_option['field_error']) ? $page_form_option['field_error'] : sprintf($this->language->get('error_required'), $page_form_option['field_name']);
				}

				// Checkbox Toggle
				if ($page_form_option['required'] && $page_form_option['type'] == 'checkbox_toggle' && empty($field[$page_form_option['page_form_option_id']])) {
						$json['error']['field'][$page_form_option['page_form_option_id']] = ($page_form_option['field_error']) ? $page_form_option['field_error'] : sprintf($this->language->get('error_required'), $page_form_option['field_name']);
				}
			}

			// Captcha
			if(VERSION >= '3.0.0.0') {
				if ($this->config->get('captcha_' . $this->config->get('config_captcha') . '_status') && $page_form_info['captcha']) {
					$captcha = $this->load->controller('extension/captcha/' . $this->config->get('config_captcha') . '/validate');

					if ($captcha) {
						$json['error']['captcha'] = $captcha;
						$json['captcha'] = $this->load->controller('extension/captcha/' . $this->config->get('config_captcha'), $json['error']);
						$json['error']['warning'] = $captcha;
					}
				}
			} else {
				if ($this->config->get($this->config->get('config_captcha') . '_status') && $page_form_info['captcha']) {
					if (VERSION <= '2.2.0.0') {
						$captcha = $this->load->controller('captcha/' . $this->config->get('config_captcha') . '/validate');
					} else {
						$captcha = $this->load->controller('extension/captcha/' . $this->config->get('config_captcha') . '/validate');
					}

					if ($captcha) {
						$json['error']['captcha'] = $captcha;

						if (VERSION <= '2.2.0.0') {
							$json['captcha'] = $this->load->controller('captcha/' . $this->config->get('config_captcha'), $json['error']);
						} else {
							$json['captcha'] = $this->load->controller('extension/captcha/' . $this->config->get('config_captcha'), $json['error']);
						}

						$json['error']['warning'] = $captcha;
					}
				}
			}
		} else{
			$json['error']['warning'] = $this->language->get('error_not_found');
		}

		if (isset($json['error']) && !isset($json['error']['warning'])) {
			$json['error']['warning'] = $this->language->get('error_warning');
		}

		if(!$json) {
			$form_data = array();
			$form_data['page_form_id'] = $page_form_id;
			$form_data['customer_id'] = $this->customer->getId();
			$form_data['customer_group_id'] = $this->customer->getGroupId();
			$form_data['firstname'] = ($this->customer->getId()) ? $this->customer->getFirstName() .' '. $this->customer->getLastName() : 'Guest';
			$form_data['lastname'] = ($this->customer->getId()) ? $this->customer->getLastName() : '';
			$form_data['store_id'] = $this->config->get('config_store_id');
			$form_data['language_id'] = $this->config->get('config_language_id');
			$form_data['ip'] = $this->request->server['REMOTE_ADDR'];
			$form_data['page_form_title'] = isset($page_form_info['title']) ? $page_form_info['title'] : '';

			// Fields
			$field_data = array();
			if(isset($field)) {
				foreach ($field as $page_form_option_id => $value) {
					$page_form_option_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "page_form_option pfo LEFT JOIN " . DB_PREFIX . "page_form_option_description pfod ON (pfo.page_form_option_id = pfod.page_form_option_id) WHERE pfo.page_form_option_id = '" . (int)$page_form_option_id . "' AND pfo.page_form_id = '" . (int)$page_form_id . "' AND pfod.language_id = '" . (int)$this->config->get('config_language_id') . "'");

					if ($page_form_option_query->num_rows) {
						if ($page_form_option_query->row['type'] == 'select' || $page_form_option_query->row['type'] == 'radio' || $page_form_option_query->row['type'] == 'radio_toggle') {
							$page_form_option_value_query = $this->db->query("SELECT pfovd.name FROM " . DB_PREFIX . "page_form_option_value pfov LEFT JOIN " . DB_PREFIX . "page_form_option_value_description pfovd ON (pfov.page_form_option_value_id = pfovd.page_form_option_value_id) WHERE pfov.page_form_option_value_id = '" . (int)$value . "' AND pfov.page_form_option_id = '" . (int)$page_form_option_id . "' AND pfovd.language_id = '" . (int)$this->config->get('config_language_id') . "'");

							if ($page_form_option_value_query->num_rows) {
								$field_data[] = array(
									'name'                    => $page_form_option_query->row['field_name'],
									'value'                   => $page_form_option_value_query->row['name'],
									'type'                    => $page_form_option_query->row['type'],
								);
							}
						} elseif (($page_form_option_query->row['type'] == 'checkbox' || $page_form_option_query->row['type'] == 'checkbox_toggle' || $page_form_option_query->row['type'] == 'multi_select') && is_array($value)) {
							$checkbox_value = array();
							foreach ($value as $page_form_option_value_id) {
								$page_form_option_value_query = $this->db->query("SELECT pfovd.name FROM " . DB_PREFIX . "page_form_option_value pfov LEFT JOIN " . DB_PREFIX . "page_form_option_value_description pfovd ON (pfov.page_form_option_value_id = pfovd.page_form_option_value_id) WHERE pfov.page_form_option_value_id = '" . (int)$page_form_option_value_id . "' AND pfov.page_form_option_id = '" . (int)$page_form_option_id . "' AND pfovd.language_id = '" . (int)$this->config->get('config_language_id') . "'");

								if ($page_form_option_value_query->num_rows) {
									$checkbox_value[] = $page_form_option_value_query->row['name'];
								}
							}

							if((array)$checkbox_value) {
								$field_data[] = array(
									'name'                    => $page_form_option_query->row['field_name'],
									'value'                   => implode(', ', $checkbox_value),
									'type'                    => $page_form_option_query->row['type'],
								);
							}

						} else if ($page_form_option_query->row['type'] == 'country') {
							$country_info = $this->model_localisation_country->getCountry($value);
							if($country_info) {
								$field_data[] = array(
									'name'                    => $page_form_option_query->row['field_name'],
									'value'                   => $country_info['name'],
									'type'                    => $page_form_option_query->row['type'],
								);
							}

						} else if ($page_form_option_query->row['type'] == 'zone') {
							$zone_info = $this->model_localisation_zone->getZone($value);
							if($zone_info) {
								$field_data[] = array(
									'name'                    => $page_form_option_query->row['field_name'],
									'value'                   => $zone_info['name'],
									'type'                    => $page_form_option_query->row['type'],
								);
							}
						} else if ($page_form_option_query->row['type'] == 'password' || $page_form_option_query->row['type'] == 'confirm_password') {
							$field_data[] = array(
								'name'                    => $page_form_option_query->row['field_name'],
								'value'                   => base64_encode(serialize($value)),
								'type'                    => $page_form_option_query->row['type'],
							);
						} else {
							$field_data[] = array(
								'name'                    => $page_form_option_query->row['field_name'],
								'value'                   => $value,
								'type'                    => $page_form_option_query->row['type'],
							);
						}
					}
				}
			}

			$form_data['field_data'] = $field_data;

			// Page Request
			$this->load->model('page/request');
			$this->model_page_request->addPageRequest($form_data);
            
            // $message = '';
            // $i = 0;
			// foreach($form_data['field_data'] as $item){
			// 	if(($i == 3) && ($page_form_id == 2)){
			// 		break;
			// 	}

			// 	if(($i == 3) && ($page_form_id == 4)){
			// 		break;
			// 	}

            //      $message .= $item['value'] . "\n";
            //      $i++;
			// }

			// mail($this->config->get('config_email'), $form_data['page_form_title'], $message);
			// mail('aromantsov1@gmail.com', $form_data['page_form_title'], $message);

			if($page_form_id == 1){

				$products_data = array();

			    $names = explode(' ^ ', trim($form_data['field_data'][1]['value'], ' ^ '));
			    $skues = explode(' - ', rtrim($form_data['field_data'][3]['value'], ' - '));
			    $prices = explode(' - ', rtrim($form_data['field_data'][2]['value'], ' - '));
			    $pictures = explode(' - ', rtrim($form_data['field_data'][4]['value'], ' - '));

			    for($i = 0; $i < count($names); $i++){
				    $products_data[$i]['name'] = $names[$i];
				    $products_data[$i]['sku'] = $skues[$i];
				    $products_data[$i]['price'] = $prices[$i];
				    $products_data[$i]['picture'] = $pictures[$i];
			    
			    }
				$crm_data = [
				    'title' => $form_data['page_form_title'],
                    'source_id' => 1,
                    'pipeline_id' => 2,
                    'contact' => [
                	    'full_name' => $form_data['firstname'] . ' ' . $form_data['lastname'],
                	    'phone' => str_replace(' ', '', $form_data['field_data'][0]['value']),
                    ],
                    'products' => [],
			    ];

			    foreach($products_data as $product){
                    $crm_data['products'][] = $product;
			    }

			    $data_string = json_encode($crm_data);

			    $token = self::TOKEN;

			    $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, "https://openapi.keycrm.app/v1/leads");
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS,$data_string);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    "Content-type: application/json",
                    "Accept: application/json",
                    "Cache-Control: no-cache",
                    "Pragma: no-cache",
                    'Authorization:  Bearer ' . $token)
                );
                $result = curl_exec($ch);
                curl_close($ch);
			}elseif($page_form_id == 4){

				$names = explode(' ^ ', trim($form_data['field_data'][1]['value'], ' ^ '));
			    $skues = explode(' - ', rtrim($form_data['field_data'][3]['value'], ' - '));
			    $prices = explode(' - ', rtrim($form_data['field_data'][2]['value'], ' - '));
			    $pictures = explode(' - ', rtrim($form_data['field_data'][4]['value'], ' - '));

			    for($i = 0; $i < count($names); $i++){
				    $products_data[$i]['name'] = $names[$i];
				    $products_data[$i]['sku'] = $skues[$i];
				    $products_data[$i]['price'] = $prices[$i];
				    $products_data[$i]['picture'] = $pictures[$i];
			    
			    }
                

				$crm_data = [
				    'title' => $form_data['page_form_title'],
                    'source_id' => 1,
                    'pipeline_id' => 3,
                    'contact' => [
                	    'phone' => $form_data['field_data'][0]['value'],
                    ],
                    'products' => [],
			    ];

			    foreach($products_data as $product){
                    $crm_data['products'][] = $product;
			    }

			    $data_string = json_encode($crm_data);

			    $token = self::TOKEN;

			    $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, "https://openapi.keycrm.app/v1/leads");
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS,$data_string);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    "Content-type: application/json",
                    "Accept: application/json",
                    "Cache-Control: no-cache",
                    "Pragma: no-cache",
                    'Authorization:  Bearer ' . $token)
                );
                $result = curl_exec($ch);
                curl_close($ch);
			}elseif($page_form_id == 7){
				$crm_data = [
				    'title' => $form_data['page_form_title'],
                    'source_id' => 1,
                    'pipeline_id' => 4,
                    'contact' => [
                	    'phone' => $form_data['field_data'][0]['value'],
                    ],
					'products' => [],
			    ];

			    $data_string = json_encode($crm_data);

			    $token = self::TOKEN;

			    $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, "https://openapi.keycrm.app/v1/leads");
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS,$data_string);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    "Content-type: application/json",
                    "Accept: application/json",
                    "Cache-Control: no-cache",
                    "Pragma: no-cache",
                    'Authorization:  Bearer ' . $token)
                );
                $result = curl_exec($ch);
                curl_close($ch);
			}elseif($page_form_id == 2){

				$names = explode(' ^ ', trim($form_data['field_data'][1]['value'], ' ^ '));
			    $skues = explode(' - ', rtrim($form_data['field_data'][3]['value'], ' - '));
			    $prices = explode(' - ', rtrim($form_data['field_data'][2]['value'], ' - '));
			    $pictures = explode(' - ', rtrim($form_data['field_data'][4]['value'], ' - '));

			    for($i = 0; $i < count($names); $i++){
				    $products_data[$i]['name'] = $names[$i];
				    $products_data[$i]['sku'] = $skues[$i];
				    $products_data[$i]['price'] = $prices[$i];
				    $products_data[$i]['picture'] = $pictures[$i];
			    
			    }

				$crm_data = [
				    'title' => $form_data['page_form_title'],
                    'source_id' => 1,
                    'pipeline_id' => 7,
                    'contact' => [
                	    'phone' => $form_data['field_data'][0]['value'],
                    ],
			    ];

				foreach($products_data as $product){
                    $crm_data['products'][] = $product;
			    }

			    $data_string = json_encode($crm_data);

			    $token = self::TOKEN;

			    $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, "https://openapi.keycrm.app/v1/leads");
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS,$data_string);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    "Content-type: application/json",
                    "Accept: application/json",
                    "Cache-Control: no-cache",
                    "Pragma: no-cache",
                    'Authorization:  Bearer ' . $token)
                );
                $result = curl_exec($ch);
                curl_close($ch);
			}


			$json['success'] = str_replace('&amp;', '&', $this->url->link('page/success', 'id='. $page_form_id, true));

			$json['success_title'] = ($page_form_info['success_title']) ? $page_form_info['success_title'] : $this->language->get('text_success');
			$json['success_description'] = html_entity_decode($page_form_info['success_description'], ENT_QUOTES, 'UTF-8');
			$json['success_message'] = $json['success_description'];

			$json['success_button_continue'] = $this->language->get('button_close');
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	public function upload() {
		$this->load->language('tool/upload');

		$this->load->language('page/form');

		$this->load->model('page/form');

		$json = array();

		if (isset($this->request->get['page_form_id'])) {
			$page_form_id = (int)$this->request->get['page_form_id'];
		} else {
			$page_form_id = 0;
		}

		$page_form_info = $this->model_page_form->getPageForm($page_form_id);

		if($page_form_info) {
			if (!empty($this->request->files['file']['name']) && is_file($this->request->files['file']['tmp_name'])) {
				// Sanitize the filename
				$filename = basename(preg_replace('/[^a-zA-Z0-9\.\-\s+]/', '', html_entity_decode($this->request->files['file']['name'], ENT_QUOTES, 'UTF-8')));

				// Validate the filename length
				if ((utf8_strlen($filename) < 3) || (utf8_strlen($filename) > 64)) {
					$json['warning'] = $this->language->get('error_filename');
				}

				// Allowed file extension types
				$allowed = array();

				$extension_allowed = preg_replace('~\r?\n~', "\n", $page_form_info['file_ext_allowed']);

				$filetypes = explode("\n", $extension_allowed);

				foreach ($filetypes as $filetype) {
					$allowed[] = trim($filetype);
				}

				if (!in_array(strtolower(substr(strrchr($filename, '.'), 1)), $allowed)) {
					$json['warning'] = $this->language->get('error_filetype');
				}

				// Allowed file mime types
				$allowed = array();

				$mime_allowed = preg_replace('~\r?\n~', "\n", $page_form_info['file_mime_allowed']);

				$filetypes = explode("\n", $mime_allowed);

				foreach ($filetypes as $filetype) {
					$allowed[] = trim($filetype);
				}

				if (!in_array($this->request->files['file']['type'], $allowed)) {
					$json['warning'] = $this->language->get('error_filetype');
				}

				// Check to see if any PHP files are trying to be uploaded
				$content = file_get_contents($this->request->files['file']['tmp_name']);

				if (preg_match('/\<\?php/i', $content)) {
					$json['warning'] = $this->language->get('error_filetype');
				}

				// Return any upload error
				if ($this->request->files['file']['error'] != UPLOAD_ERR_OK) {
					$json['warning'] = $this->language->get('error_upload_' . $this->request->files['file']['error']);
				}
			} else {
				$json['warning'] = $this->language->get('error_upload');
			}
		} else {
			$json['warning'] = $this->language->get('error_not_found');
		}
		// $json['warning'] = $this->language->get('error_not_found');


		if (!$json) {
			$file = $filename . '.' . $this->random_token(32);

			move_uploaded_file($this->request->files['file']['tmp_name'], DIR_UPLOAD . $file);

			// Hide the uploaded file name so people can not link to it directly.
			$this->load->model('tool/upload');

			$json['code'] = $this->model_tool_upload->addUpload($filename, $file);

			$json['success'] = $this->language->get('text_upload');
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	public function random_token($length = 32) {
		// Create random token
		$string = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

		$max = strlen($string) - 1;

		$token = '';

		for ($i = 0; $i < $length; $i++) {
			$token .= $string[mt_rand(0, $max)];
		}

		return $token;
	}
}