<?php
class ControllerExtensionModuleCiformbuilder extends Controller {
	public function index($setting) {
		static $module_row = 0;

		$this->load->language('page/form');

		$this->load->model('page/form');

		$data['heading_title'] = $this->language->get('heading_title');

		if(isset($setting['page_form_id'])) {
			$page_form_id = $setting['page_form_id'];
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

			$data['page_form_id'] = $page_form_info['page_form_id'];
			$data['css'] = $page_form_info['css'];
			$data['reset_button'] = $page_form_info['reset_button'];

			$data['text_select'] = $this->language->get('text_select');
			$data['text_loading'] = $this->language->get('text_loading');
			$data['text_none'] = $this->language->get('text_none');

			$data['heading_title'] = $page_form_info['title'];

			$data['description'] = html_entity_decode($page_form_info['description'], ENT_QUOTES, 'UTF-8');

			$data['bottom_description'] = html_entity_decode($page_form_info['bottom_description'], ENT_QUOTES, 'UTF-8');

			$data['fieldset_title'] = $page_form_info['fieldset_title'];

			$data['button_reset'] = $this->language->get('button_reset');
			$data['button_upload'] = $this->language->get('button_upload');
			$data['button_continue'] = ($page_form_info['submit_button']) ? $page_form_info['submit_button'] :  $this->language->get('button_continue');


			// Page Form Options
			$data['page_form_options'] = $this->model_page_form->getPageFormOptions($page_form_info['page_form_id']);
			$data['country_exists'] = $this->model_page_form->getPageFormOptionsCountry($page_form_info['page_form_id']);

			$this->load->model('localisation/country');
			$data['countries'] = $this->model_localisation_country->getCountries();


			$this->load->model('localisation/zone');
			$data['zones'] = $this->model_localisation_zone->getZonesByCountryId($this->config->get('config_country_id'));

			if(!isset($this->request->get['route'])) {
				$this->request->get['route'] = 'common/home';
			}

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

			$data['module_row'] = $module_row++;

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

			if(VERSION < '2.2.0.0') {
				if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/ciformbuilder.tpl')) {
					return $this->load->view($this->config->get('config_template') . '/template/module/ciformbuilder.tpl', $data);
				} else {
					return $this->load->view('default/template/module/ciformbuilder.tpl', $data);
				}
			} else if(VERSION == '2.2.0.0') {
				return $this->load->view('module/ciformbuilder', $data);
			} else{
				return $this->load->view('extension/module/ciformbuilder', $data);
			}
		}
	}
}