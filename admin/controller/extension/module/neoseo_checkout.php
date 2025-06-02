<?php

require_once( DIR_SYSTEM . '/engine/neoseo_controller.php');
require_once( DIR_SYSTEM . '/engine/neoseo_view.php' );

class ControllerExtensionModuleNeoSeoCheckout extends NeoSeoController
{

	private $error = array();
	private $field_fields = array(
		"firstname" => "Имя",
		"lastname" => "Фамилия",
		"email" => "Электронный адрес",
		"telephone" => "Телефон",
		"fax" => "Факс",
		"tax_id" => "ИНН",
		"company" => "Компания",
		"company_id" => "ОКПО",
		"address_1" => "Адрес 1",
		"address_2" => "Адрес 2",
		"postcode" => "Индекс",
		"password" => "Пароль",
		"password2" => "Подтверждение пароля",
		"comment" => "Комментарий",
		"custom" => "Дополнительное поле",
		"discount" => "Номер дисконта",
	);
	private $field_types = array(
		"input" => "Текст",
		"textarea" => "Многострочный текст",
		"select" => "Список",
		"radio" => "Переключатель",
		"checkbox" => "Флажок",
		"password" => "Пароль",
		"html" => "HTML",
		"file" => "Файл",
	);

	public function __construct($registry)
	{
		parent::__construct($registry);
		$this->_moduleSysName = "neoseo_checkout";
		$this->_modulePostfix = ""; // Постфикс для разных типов модуля, поэтому переходим на испольлзование $this->_moduleSysName()
		$this->_logFile = $this->_moduleSysName() . ".log";
		$this->debug = $this->config->get($this->_moduleSysName() . "_debug") == 1;
	}

	public function index()
	{
		$this->upgrade();

		$data = $this->language->load('extension/' . $this->_route . '/' . $this->_moduleSysName());

		$this->document->setTitle($this->language->get('text_title'));

		$this->document->addStyle('view/stylesheet/' . $this->_moduleSysName() . '.css');
		$this->document->addStyle('view/javascript/jquery/jquery-ui.min.css');
		$this->document->addScript('view/javascript/jquery/jquery-ui.min.js');
		$this->document->addScript('view/javascript/' . $this->_moduleSysName() . '.js');
		$this->document->addScript('view/javascript/jsrender/jsrender.js');

		$this->load->model('setting/setting');
		$this->load->model('extension/' . $this->_route . '/' . $this->_moduleSysName());
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting($this->_moduleSysName(), $this->request->post);
			$this->model_extension_module_neoseo_checkout->setModuleStatus($this->request->post[$this->_moduleSysName() . "_status"]);

			$this->session->data['success'] = $this->language->get('text_success');

			if ($this->request->post['action'] == "save") {
				$this->response->redirect($this->url->link('extension/' . $this->_route . '/' . $this->_moduleSysName(), 'user_token=' . $this->session->data['user_token'], true));
			} else {
				$this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'], true));
			}
		}

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else if (isset($this->session->data['error_warning'])) {
			$data['error_warning'] = $this->session->data['error_warning'];
			unset($this->session->data['error_warning']);
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->session->data['success'])) {
			$data['success'] = $this->session->data['success'];
			unset($this->session->data['success']);
		}

		$data = $this->initBreadcrumbs(array(
			array('marketplace/extension', 'text_module'),
			array('extension/' . $this->_route . '/' . $this->_moduleSysName(), "heading_title_raw")
				), $data);

		$data = $this->initButtons($data);

		$data['user_token'] = $this->session->data['user_token'];

		$this->load->model('sale/neoseo_dropped_cart');

		$data['dropped_cart_template'] = array();
		$dropped_cart_template_path = $this->model_sale_neoseo_dropped_cart->getEmailTemplatePath();

		foreach (glob($dropped_cart_template_path . '*.twig') as $template) {
			$data['dropped_cart_template'][$template] = basename($template);
		}

		$this->load->model("extension/" . $this->_route . "/" . $this->_moduleSysName());
		$data = $this->initParamsListEx($this->{"model_extension_" . $this->_route . "_" . $this->_moduleSysName()}->getParams(), $data);

		$this->load->model('localisation/language');
		$data['languages'] = $this->model_localisation_language->getLanguages();
		$data['config_language_id'] = $this->config->get('config_language_id');

		$this->load->model('localisation/country');
		$countries = $this->model_localisation_country->getCountries();
		$data['countries'] = array();
		foreach ($countries as $country) {
			$data['countries'][$country['country_id']] = $country['name'];
		}

		$this->load->model('catalog/information');
		$data['information'] = array(
			0 => $this->language->get("text_disabled")
		);
		foreach ($this->model_catalog_information->getInformations() as $information) {
			if ($information['status'] == 1)
				$data['information'][$information['information_id']] = $information['title'];
		}

		$this->load->model('customer/customer_group');
		$items = $this->model_customer_customer_group->getCustomerGroups(array('sort' => 'cg.sort_order'));
		$customer_groups = array();
		foreach ($items as $item) {
			$customer_groups[$item['customer_group_id']] = $item['name'];
		}
		$data['customer_groups'] = $customer_groups;

		$data['field_fields'] = $this->field_fields;
		$data['field_types'] = $this->field_types;
		$config_language_id = $this->config->get("config_language_id");

		// Payment Methods
		$files = glob(DIR_APPLICATION . 'controller/extension/payment/*.php');
		$method_data = array();
		foreach ($files as $file) {
			$extension = basename($file, '.php');
			if (1 != $this->config->get('payment_'.$extension . '_status'))
				continue;

			if ($extension == "transfer_plus") {
				$methods = $this->config->get("transfer_plus_module");
				foreach ($methods as $id => $data1) {
					$method_data[] = array(
						'code' => 'transfer_plus.' . $id,
						'name' => isset($data1['title'][$config_language_id]) ? $data1['title'][$config_language_id] : $data1['title'][key($data1['title'])],
						'sort_order' => $data1['sort_order'],
					);
				}
				continue;
			} elseif ($extension == "neoseo_paymentplus") {
				$this->load->model('tool/neoseo_paymentplus');
				$methods = $this->model_tool_neoseo_paymentplus->getAllPayments();

				foreach ($methods as $id => $data1) {
					$method_data[] = array(
						'code' => 'neoseo_paymentplus.neoseo_paymentplus' . $id,
						'name' => $data1['name'],
						'sort_order' => $data1['sort_order'],
					);
				}
				continue;
			}

			$this->language->load('extension/payment/' . $extension);

			$method_data[] = array(
				'code' => $extension,
				'name' => $this->language->get('heading_title'),
				'sort_order' => $this->config->get($extension . '_sort_order'),
			);
		}
		$sort_order = array();

		foreach ($method_data as $key => $value) {
			$sort_order[$key] = $value['sort_order'];
		}

		array_multisort($sort_order, SORT_ASC, $method_data);


		$data['payment_methods'] = $method_data;

		// Shipping Methods
		$files = glob(DIR_APPLICATION . 'controller/extension/shipping/*.php');
		$method_data = array();
		foreach ($files as $file) {

			$extension = basename($file, '.php');
			if (1 != $this->config->get('shipping_'.$extension . '_status'))
				continue;

			if ($extension == "dostavkaplus") {
				$methods = $this->config->get("dostavkaplus_module");
				foreach ($methods as $id => $data1) {
					$method_data[] = array(
						'code' => 'dostavkaplus.sh' . $id,
						'name' => isset($data1['title'][$config_language_id]) ? $data1['title'][$config_language_id] : $data1['title'][key($data1['title'])],
						'sort_order' => $data1['sort_order'],
					);
				}
				continue;
			} elseif ($extension == "neoseo_shippingplus") {
				$this->load->model('tool/neoseo_shippingplus');
				$methods = $this->model_tool_neoseo_shippingplus->getAllShippings();
				foreach ($methods as $id => $data1) {
					$method_data[] = array(
						'code' => 'neoseo_shippingplus.neoseo_shippingplus' . $id,
						'name' => $data1['name'],
						'sort_order' => $data1['sort_order'],
					);
				}
				continue;
			} elseif ($extension == "cdek") {
				$cdek_tariff_list = $this->config->get('cdek_custmer_tariff_list');

				foreach ($cdek_tariff_list as $cdek_tariff) {
					$method_data[] = array(
						'code' => $extension . '.tariff_' . $cdek_tariff['tariff_id'] . '_0',
						'name' => $cdek_tariff['title'][$config_language_id],
						'sort_order' => $this->config->get($extension . '_sort_order'),
					);
				}

				continue;
			} elseif ($extension == "yandex_delivery") {
				$ya_tariff = $this->config->get('yandex_delivery_shipping_type');
				switch ($ya_tariff) {
					case 0:
						$method_data[] = array(
							'code' => $extension . '.PICKUP',
							'name' => 'Самовывоз из пункта выдачи заказов',
							'sort_order' => $this->config->get($extension . '_sort_order'),
						);
						$method_data[] = array(
							'code' => $extension . '.TODOOR',
							'name' => 'Курьерская доставка до двери',
							'sort_order' => $this->config->get($extension . '_sort_order'),
						);
						$method_data[] = array(
							'code' => $extension . '.POST_stub',
							'name' => 'Доставка Почтой России',
							'sort_order' => $this->config->get($extension . '_sort_order'),
						);
						break;
					case 1:
						$method_data[] = array(
							'code' => $extension . '.PICKUP',
							'name' => 'Самовывоз из пункта выдачи заказов',
							'sort_order' => $this->config->get($extension . '_sort_order'),
						);
						break;
					case 2:
						$method_data[] = array(
							'code' => $extension . '.TODOOR',
							'name' => 'Курьерская доставка до двери',
							'sort_order' => $this->config->get($extension . '_sort_order'),
						);
						break;
				}


				continue;
			}elseif ($extension == "yd3") {
				$method_data[] = array(
					'code' => 'yd3.PICKUP',
					'name' => 'Яндекс.Доставка (новый ЛК) Самовывоз из пункта выдачи заказов',
					'sort_order' => 0,
				);
				$method_data[] = array(
					'code' => 'yd3.COURIER',
					'name' => 'Яндекс.Доставка (новый ЛК) Курьер',
					'sort_order' => 0,
				);
				$method_data[] = array(
					'code' => 'yd3.POST',
					'name' => 'Яндекс.Доставка (новый ЛК) Почтой России',
					'sort_order' => 0,
				);
				continue;
			}

			$this->language->load('extension/shipping/' . $extension);
			$extended_info = $this->language->get('text_' . $extension . '_methods');
			if ($extended_info && is_array($extended_info)) {
				foreach ($extended_info as $id => $name) {
					$method_data[] = array(
						'code' => $extension . '.' . $id,
						'name' => $name,
						'sort_order' => $this->config->get($extension . '_sort_order'),
					);
				}
			} else {
				$method_data[] = array(
					'code' => $extension,
					'name' => $this->language->get('heading_title'),
					'sort_order' => $this->config->get($extension . '_sort_order'),
				);
			}
		}
		$sort_order = array();

		foreach ($method_data as $key => $value) {
			$sort_order[$key] = $value['sort_order'];
		}

		array_multisort($sort_order, SORT_ASC, $method_data);

		$data['shipping_methods'] = $method_data;

		$data['shipping_methods_list'] = array();
		foreach ($method_data as $item) {
			$data['shipping_methods_list'][$item['code']] = $item['name'];
		}

		if ($this->config->get($this->_moduleSysName() . '_api_key')) {
			$data['warehouse_types'] = $this->getWarehouseTypes();
			$data['error_warehouse'] = $this->language->get('error_warehouse_types');
		} else {
			$data['warehouse_types'] = false;
			$data['error_warehouse'] = $this->language->get('error_warehouse_empty_api_key');
		}


		// Dependencies for shipping
		$payment_for_shipping = $this->config->get($this->_moduleSysName() . '_payment_for_shipping');
		$data[$this->_moduleSysName() . '_payment_for_shipping'] = array();
		foreach ($data['shipping_methods'] as $smethod) {
			$pmethods = array();
			foreach ($data['payment_methods'] as $pmethod) {
				$pmethods[$pmethod['code']] = isset($payment_for_shipping[$smethod['code']][$pmethod['code']]);
			}
			$data[$this->_moduleSysName() . '_payment_for_shipping'][$smethod['code']] = $pmethods;
		}
		//$this->log("payment_for_shipping:" . print_r($data[$this->_moduleSysName() . '_payment_for_shipping'], true));
		// Dependencies for payment
		$shipping_for_payment = $this->config->get($this->_moduleSysName() . '_shipping_for_payment');
		$data[$this->_moduleSysName() . '_shipping_for_payment'] = array();
		foreach ($data['payment_methods'] as $pmethod) {
			$smethods = array();
			foreach ($data['shipping_methods'] as $smethod) {
				$smethods[$smethod['code']] = isset($shipping_for_payment[$pmethod['code']][$smethod['code']]);
			}
			$data[$this->_moduleSysName() . '_shipping_for_payment'][$pmethod['code']] = $smethods;
		}
		//$this->log("shipping_for_payment:" . print_r($data[$this->_moduleSysName() . '_shipping_for_payment'], true));

		$data["params"] = $data;

		$data["logs"] = $this->getLogs();

		$widgets = new NeoSeoWidgets($this->_moduleSysName() . '_', $data);
		$widgets->text_select_all = $this->language->get('text_select_all');
		$widgets->text_unselect_all = $this->language->get('text_unselect_all');
		$data['widgets'] = $widgets;

		if ($this->config->get('neoseo_novaposhta_status') == 1) {
			/* В системе установлен модуль от новой почты с автоматическим формированием накладных
			  Надо выбрать город для него
			 */
			$data['novaposhtan_need_city'] = true;
			$this->load->model('tool/neoseo_novaposhta');
			$current_np_city = $this->model_tool_neoseo_novaposhta->getCityBuId($this->config->get($this->_moduleSysName() . '_shipping_novaposhta_city_default'));
			$data[$this->_moduleSysName() . '_novaposhta_city_name'] = isset($current_np_city['descriptionru']) ? $current_np_city['descriptionru'] : "";
			$data[$this->_moduleSysName() . '_shipping_novaposhta_city_default'] = isset($current_np_city['ref']) ? $current_np_city['ref'] : "";
		} else {
			$data['novaposhtan_need_city'] = false;
		}
		$data['module_sysname'] = $this->_moduleSysName();

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/' . $this->_route . '/' . $this->_moduleSysName(), $data));
	}

	private function validate()
	{
		if (!$this->user->hasPermission('modify', 'extension/' . $this->_route . '/' . $this->_moduleSysName())) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if (isset($this->request->post[$this->_moduleSysName() . '_customer_fields'])) {
			foreach ($this->request->post[$this->_moduleSysName() . '_customer_fields'] as $type => $fields) {
				foreach ($fields as $key => $value) {
					if ($value['field'] == "comment") {
						$this->request->post[$this->_moduleSysName() . '_customer_fields'][$type][$key]['type'] = "textarea";
						$this->request->post[$this->_moduleSysName() . '_customer_fields'][$type][$key]['name'] = $value["field"];
					} else if ($value['field'] != "custom") {
						$this->request->post[$this->_moduleSysName() . '_customer_fields'][$type][$key]['type'] = "input";
						$this->request->post[$this->_moduleSysName() . '_customer_fields'][$type][$key]['name'] = $value["field"];
					}
				}
			}
		}

		if (isset($this->request->post[$this->_moduleSysName() . '_payment_fields'])) {
			foreach ($this->request->post[$this->_moduleSysName() . '_payment_fields'] as $code => $payment_fields) {
				foreach ($payment_fields as $key => $value) {
					if ($value['field'] == "comment") {
						$this->request->post[$this->_moduleSysName() . '_customer_fields'][$type][$key]['type'] = "textarea";
						$this->request->post[$this->_moduleSysName() . '_customer_fields'][$type][$key]['name'] = $value["field"];
					} else if ($value['field'] != "custom") {
						$this->request->post[$this->_moduleSysName() . '_payment_fields'][$code][$key]['type'] = "input";
						$this->request->post[$this->_moduleSysName() . '_payment_fields'][$code][$key]['name'] = $value["field"];
					}
				}
			}
		}

		if (isset($this->request->post[$this->_moduleSysName() . '_shipping_fields'])) {
			foreach ($this->request->post[$this->_moduleSysName() . '_shipping_fields'] as $code => $shipping_fields) {
				foreach ($shipping_fields as $key => $value) {
					if ($value['field'] == "comment") {
						$this->request->post[$this->_moduleSysName() . '_customer_fields'][$type][$key]['type'] = "textarea";
						$this->request->post[$this->_moduleSysName() . '_customer_fields'][$type][$key]['name'] = $value["field"];
					} else if ($value['field'] != "custom") {
						$this->request->post[$this->_moduleSysName() . '_shipping_fields'][$code][$key]['type'] = "input";
						$this->request->post[$this->_moduleSysName() . '_shipping_fields'][$code][$key]['name'] = $value["field"];
					}
				}
			}
		}

		if (isset($this->request->post[$this->_moduleSysName() . '_payment_for_shipping'])) {
			foreach ($this->request->post[$this->_moduleSysName() . '_payment_for_shipping'] as $code => $methods) {
				foreach ($methods as $key => $value) {
					$this->request->post[$this->_moduleSysName() . '_payment_for_shipping'][$code][$key] = ( isset($value) ? 1 : 0 );
				}
			}
			$this->debug("updated payment_for_shipping:" . print_r($this->request->post[$this->_moduleSysName() . '_payment_for_shipping'], true));
		}

		if (isset($this->request->post[$this->_moduleSysName() . '_shipping_for_payment'])) {
			foreach ($this->request->post[$this->_moduleSysName() . '_shipping_for_payment'] as $code => $methods) {
				foreach ($methods as $key => $value) {
					$this->request->post[$this->_moduleSysName() . '_shipping_for_payment'][$code][$key] = ( isset($value) ? 1 : 0 );
				}
			}
			$this->debug("updated shipping_for_payment:" . print_r($this->request->post[$this->_moduleSysName() . '_shipping_for_payment'], true));
		}

		if (!$this->error) {
			return true;
		} else {
			return false;
		}
	}

	public function getWarehouseTypes()
	{
		// Справочник типов отделений
		$curl = curl_init();
		if (!$curl) {
			$this->log->write("Curl initialization error! Function getWarehouseTypes canseled.");
			return false;
		} else {
			$api_key = $this->config->get($this->_moduleSysName() . '_api_key');
			if (!$api_key) {
				$this->log->write("Api key is empty! Function getWarehouseTypes canseled.");
				return false;
			}
			$data_string = '
			{
				"modelName": "Address", 
				"calledMethod": "getWarehouseTypes",
				"methodProperties": {
						"Language": "ru-ru"
					},
				"apiKey": "' . $api_key . '"
			}';

			//$url = 'https://api.novaposhta.ua/v2.0/json/AddressGeneral/getWarehouses';
			$url = 'https://api.novaposhta.ua/v2.0/json/';
			curl_setopt($curl, CURLOPT_URL, $url);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array(
				'Content-Type: application/json',
				'Content-Length: ' . strlen($data_string)
			));
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
			$response_raw = curl_exec($curl);
			$err = curl_error($curl);
			curl_close($curl);

			if ($err) {
				$this->log->write("getWarehouseTypes faled. cURL Error #: " . $err);
				return false;
			} else {
				$result = array();
				$response = json_decode($response_raw);
				foreach ($response->data as $war_type) {
					$result[$war_type->Ref] = $war_type->Description;
				}
				return $result;
			}
		}
	}

}