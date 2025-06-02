<?php

require_once( DIR_SYSTEM . "/engine/neoseo_controller.php");
require_once( DIR_SYSTEM . '/engine/neoseo_view.php' );

class ControllerLocalisationNeoSeoCity extends NeoSeoController
{

	public function __construct($registry)
	{
		parent::__construct($registry);
		$this->_moduleSysName = "neoseo_checkout";
		$this->_modulePostfix = "";
		$this->_moduleName = "neoseo_city";
		$this->_logFile = $this->_moduleSysName() . ".log";
		$this->debug = $this->config->get($this->_moduleSysName() . "_status") == 1;
	}

	private $error = array();

	public function index()
	{
		$this->load->language($this->_route . '/' . $this->_moduleName);

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model($this->_route . '/' . $this->_moduleName);

		$this->getList();
	}

	public function getCities($page = 1)
	{
		$curl = curl_init();
		if (!$curl) {
			$this->log('не удалось инициализировать curl');
			return $this->response->redirect($this->url->link($this->_route . '/' . $this->_moduleName, 'user_token=' . $this->session->data['user_token'], 'SSL'));
		}

		$api_key = $this->config->get($this->_moduleSysName() . '_api_key');
		if(trim($api_key) == ""){
			return $this->response->redirect($this->url->link($this->_route . '/' . $this->_moduleName, 'user_token=' . $this->session->data['user_token'], 'SSL'));
		}

		$data_string = '
		{
			"modelName": "Address", 
			"calledMethod": "getSettlements",
			"methodProperties": {
				"Page": "' . $page . '"
			},
			"apiKey": "' . $api_key . '"
		}';

		$url = 'https://api.novaposhta.ua/v2.0/json/AddressGeneral/getSettlements';
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Content-Length: ' . strlen($data_string)
		));
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
		$response_raw = curl_exec($curl);
		curl_close($curl);
		if (!$response_raw) {
			return array();
		}

		$response = json_decode($response_raw);
		if (!$response->success) {
			$this->log("Ошибка API новой почты: " . implode(",", $response->errors));
			return $this->response->redirect($this->url->link($this->_route . '/' . $this->_moduleName, 'user_token=' . $this->session->data['user_token'], 'SSL'));
		}

		return $response->data;
	}

	public function refresh()
	{
		$api_key = $this->config->get($this->_moduleSysName() . '_api_key');
		if(trim($api_key) == ""){
			return $this->response->redirect($this->url->link($this->_route . '/' . $this->_moduleName, 'user_token=' . $this->session->data['user_token'], 'SSL'));
		}
		// Обновляем адреса согласно новой почте
		$areas_old = array(
			//"CR" => "71508128-9b87-11de-822f-000c2965ae0e", // АРК
			"VI" => "Винницкая область", // Вінницька
			"VO" => "Волынская область", // Волинська
			"DN" => "Днепропетровская область", // Дніпропетровська
			"DO" => "Донецкая область", // Донецька
			"ZH" => "Житомирская область", // Житомирська
			"ZK" => "Закарпатская область", // Закарпатська
			"ZA" => "Запорожская область", // Запорізька
			"IV" => "Ивано-Франковская область", // Івано-Франківська
			"KV" => "Киевская область", // Київська
			"KY" => "Киев", // Київ
			"KR" => "Кировоградская область", // Кіровоградська
			"LU" => "Луганская область", // Луганська
			"LV" => "Львовская область", // Львівська
			"MY" => "Николаевская область", // Миколаївська
			"OD" => "Одесская область", // Одеська
			"PO" => "Полтавская область", // Полтавська
			"RI" => "Ровенская область", // Рівненська
			"SU" => "Сумская область", // Сумська
			"TE" => "Тернопольская область", // Тернопільська
			"KH" => "Харьковская область", // Харківська
			"KE" => "Херсонская область", // Херсонська
			"KM" => "Хмельницкая область", // Хмельницька
			"CK" => "Черкасская область", // Черкаська
			"CV" => "Черновицкая область", // Чернівецька
			"CH" => "Черниговская область", // Чернігівська
		);

		$areas_new = array(
			//"43" => "71508128-9b87-11de-822f-000c2965ae0e", // АРК
			"05" => "Винницкая область", // Вінницька
			"07" => "Волынская область", // Волинська
			"12" => "Днепропетровская область", // Дніпропетровська
			"14" => "Донецкая область", // Донецька
			"18" => "Житомирская область", // Житомирська
			"21" => "Закарпатская область", // Закарпатська
			"23" => "Запорожская область", // Запорізька
			"26" => "Ивано-Франковская область", // Івано-Франківська
			"30" => "Киев", // Київ
			"32" => "Киевская область", // Київська
			"35" => "Кировоградская область", // Кіровоградська
			"09" => "Луганская область", // Луганська
			"46" => "Львовская область", // Львівська
			"48" => "Николаевская область", // Миколаївська
			"51" => "Одесская область", // Одеська
			"53" => "Полтавская область", // Полтавська
			"56" => "Ровенская область", // Рівненська
			"59" => "Сумская область", // Сумська
			"61" => "Тернопольская область", // Тернопільська
			"63" => "Харьковская область", // Харківська
			"65" => "Херсонская область", // Херсонська
			"68" => "Хмельницкая область", // Хмельницька
			"71" => "Черкасская область", // Черкаська
			"74" => "Черновицкая область", // Чернівецька
			"77" => "Черниговская область", // Чернігівська
		);

		$this->load->model($this->_route . '/country');
		$countries = $this->{'model_' . $this->_route . '_country'}->getCountries();
		$country_id = 0;
		if($countries){
			foreach($countries as $country){
				if($country['name'] == 'Украина'){
					$country_id = $country['country_id'];
				}
			}
		}

		if(!$country_id){
			$this->log('Страна Украина не найдена в списке стран магазина');
			return false;
		}
		

		$this->load->model($this->_route . '/zone');
		$zones_by_area = array();
		foreach ($this->{'model_' . $this->_route . '_zone'}->getZones() as $zone) {
			if ($zone['country_id'] != $country_id) {
				continue;
			}
			$zone_code = '';
			if (isset($areas[$zone['code']])) {
				$zone_code = $areas[$zone['code']];
			}
			if (isset($areas_new[$zone['code']])) {
				$zone_code = $areas_new[$zone['code']];
			}
			if(!$zone_code){
				continue;
			}
			$zones_by_area[$zone_code] = $zone['zone_id'];
		}

		// Справочник городов
		// Интеллектуальный детект языков
		$russian_language_id = 1;
		$ukrainian_language_id = 2;
		$this->load->model($this->_route . '/language');
		$languages = $this->{'model_' . $this->_route . '_language'}->getLanguages();
		foreach ($languages as $language) {
			if ($language['code'] == "ru-ru") {
				$russian_language_id = $language['language_id'];
			} else if ($language['code'] == "uk-ua") {
				$ukrainian_language_id = $language['language_id'];
			}
		}

		$this->load->model($this->_route . '/' . $this->_moduleName);
		$this->{'model_' . $this->_route . '_' . $this->_moduleName}->deleteAllCities();
		$page = 1;
		while ($cities = $this->getCities($page)) {
			$page = $page + 1;
			foreach ($cities as $city) {
				$item = array();
				$item['status'] = 1;
				$item['country_id'] = 220;
				if (isset($zones_by_area[$city->AreaDescriptionRu])) {
					$item['zone_id'] = $zones_by_area[$city->AreaDescriptionRu];
				}
				if ($city->DescriptionRu == "Киев") {
					$item['zone_id'] = $zones_by_area['Киев'];
				}

				$item['name'] = array(
					$russian_language_id => htmlspecialchars($city->DescriptionRu),
					$ukrainian_language_id => htmlspecialchars($city->Description),
				);

				$this->{'model_' . $this->_route . '_' . $this->_moduleName}->addCity($item);
			}
		}

		return $this->response->redirect($this->url->link($this->_route . '/' . $this->_moduleName, 'user_token=' . $this->session->data['user_token'], 'SSL'));
	}

	public function add()
	{
		$this->load->language($this->_route . '/' . $this->_moduleName);

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model($this->_route . '/' . $this->_moduleName);

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->{'model_' . $this->_route . '_' . $this->_moduleName}->addCity($this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link($this->_route . '/' . $this->_moduleName, 'user_token=' . $this->session->data['user_token'] . $url, 'SSL'));
		}

		$this->getForm();
	}

	public function edit()
	{
		$this->load->language($this->_route . '/' . $this->_moduleName);

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model($this->_route . '/' . $this->_moduleName);

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->{'model_' . $this->_route . '_' . $this->_moduleName}->editCity($this->request->get['city_id'], $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link($this->_route . '/' . $this->_moduleName, 'user_token=' . $this->session->data['user_token'] . $url, 'SSL'));
		}

		$this->getForm();
	}

	public function delete()
	{
		$this->load->language($this->_route . '/' . $this->_moduleName);

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model($this->_route . '/' . $this->_moduleName);
		//@todo: почистить дублирующийся код ниже
		if (isset($this->request->get['city_id']) && $this->validateDelete()) {
			$this->{'model_' . $this->_route . '_' . $this->_moduleName}->deleteCity($this->request->get['city_id']);
			$this->session->data['success'] = $this->language->get('text_success');
			$url = '';
			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}
			$this->response->redirect($this->url->link($this->_route . '/' . $this->_moduleName, 'user_token=' . $this->session->data['user_token'] . $url, 'SSL'));
		} else {
			if (isset($this->request->post['selected']) && $this->validateDelete()) {
				foreach ($this->request->post['selected'] as $city_id) {
					$this->{'model_' . $this->_route . '_' . $this->_moduleName}->deleteCity($city_id);
				}

				$this->session->data['success'] = $this->language->get('text_success');

				$url = '';

				if (isset($this->request->get['sort'])) {
					$url .= '&sort=' . $this->request->get['sort'];
				}

				if (isset($this->request->get['order'])) {
					$url .= '&order=' . $this->request->get['order'];
				}

				if (isset($this->request->get['page'])) {
					$url .= '&page=' . $this->request->get['page'];
				}

				$this->response->redirect($this->url->link($this->_route . '/' . $this->_moduleName, 'user_token=' . $this->session->data['user_token'] . $url, 'SSL'));
			}
		}

		$this->getList();
	}

	public function getList()
	{
		if (isset($this->request->get['filter_name'])) {
			$filter_name = $this->request->get['filter_name'];
		} else {
			$filter_name = "";
		}

		if (isset($this->request->get['filter_country'])) {
			$filter_country = $this->request->get['filter_country'];
		} else {
			$filter_country = null;
		}


		if (isset($this->request->get['filter_zone'])) {
			$filter_zone = $this->request->get['filter_zone'];
		} else {
			$filter_zone = null;
		}

		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'ct.name';
		}

		if (isset($this->request->get['order'])) {
			$order = $this->request->get['order'];
		} else {
			$order = 'ASC';
		}

		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		$url = '';

		if (isset($this->request->get['filter_name'])) {
			$url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
		}
		if (isset($this->request->get['filter_country'])) {
			$url .= '&filter_country=' . $this->request->get['filter_country'];
		}
		if (isset($this->request->get['filter_zone'])) {
			$url .= '&filter_zone=' . $this->request->get['filter_zone'];
		}

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['add'] = $this->url->link($this->_route . '/' . $this->_moduleName . '/add', 'user_token=' . $this->session->data['user_token'] . $url, 'SSL');
		$data['delete'] = $this->url->link($this->_route . '/' . $this->_moduleName . '/delete', 'user_token=' . $this->session->data['user_token'] . $url, 'SSL');
		$data['refresh'] = $this->url->link($this->_route . '/' . $this->_moduleName . '/refresh', 'user_token=' . $this->session->data['user_token'] . $url, 'SSL');

		$data = $this->initBreadcrumbs(array(
			array($this->_route . '/' . $this->_moduleName, 'heading_title')
				), $data);

		$data['cities'] = array();

		$filter_data = array(
			'filter_name' => $filter_name,
			'filter_country' => $filter_country,
			'filter_zone' => $filter_zone,
			'sort' => $sort,
			'order' => $order,
			'start' => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit' => $this->config->get('config_limit_admin')
		);

		$city_total = $this->{'model_' . $this->_route . '_' . $this->_moduleName}->getTotalCities($filter_data);
		$results = $this->{'model_' . $this->_route . '_' . $this->_moduleName}->getCities($filter_data);

		foreach ($results as $result) {
			$data['cities'][] = array(
				'city_id' => $result['city_id'],
				'country' => $result['country'],
				'name' => $result['name'],
				'zone' => $result['zone_name'],
				'edit' => $this->url->link($this->_route . '/' . $this->_moduleName . '/edit', 'user_token=' . $this->session->data['user_token'] . '&city_id=' . $result['city_id'] . $url, 'SSL'),
				'delete' => $this->url->link($this->_route . '/' . $this->_moduleName . '/delete', 'user_token=' . $this->session->data['user_token'] . '&city_id=' . $result['city_id'] . $url, 'SSL'),
			);
		}

		$data['heading_title'] = $this->language->get('heading_title');

		$data['button_refresh'] = $this->language->get('button_refresh');

		$data['text_list'] = $this->language->get('text_list');
		$data['text_no_results'] = $this->language->get('text_no_results');
		$data['text_confirm'] = $this->language->get('text_confirm');

		$data['entry_name'] = $this->language->get('entry_name');

		$data['column_country'] = $this->language->get('column_country');
		$data['column_name'] = $this->language->get('column_name');
		$data['column_zone'] = $this->language->get('column_zone');
		$data['column_action'] = $this->language->get('column_action');

		$data['button_add'] = $this->language->get('button_add');
		$data['button_edit'] = $this->language->get('button_edit');
		$data['button_delete'] = $this->language->get('button_delete');
		$data['button_filter'] = $this->language->get('button_filter');

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

		if (isset($this->request->post['selected'])) {
			$data['selected'] = (array) $this->request->post['selected'];
		} else {
			$data['selected'] = array();
		}

		$url = '';

		if (isset($this->request->get['filter_name'])) {
			$url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
		}
		if (isset($this->request->get['filter_country'])) {
			$url .= '&filter_country=' . $this->request->get['filter_country'];
		}
		if (isset($this->request->get['filter_zone'])) {
			$url .= '&filter_zone=' . $this->request->get['filter_zone'];
		}

		if ($order == 'ASC') {
			$url .= '&order=DESC';
		} else {
			$url .= '&order=ASC';
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['sort_country'] = $this->url->link($this->_route . '/' . $this->_moduleName, 'user_token=' . $this->session->data['user_token'] . '&sort=c.name' . $url, 'SSL');
		$data['sort_zone'] = $this->url->link($this->_route . '/' . $this->_moduleName, 'user_token=' . $this->session->data['user_token'] . '&sort=z.name' . $url, 'SSL');
		$data['sort_name'] = $this->url->link($this->_route . '/' . $this->_moduleName, 'user_token=' . $this->session->data['user_token'] . '&sort=cd.name' . $url, 'SSL');

		$url = '';
		if (isset($this->request->get['filter_name'])) {
			$url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
		}
		if (isset($this->request->get['filter_country'])) {
			$url .= '&filter_country=' . $this->request->get['filter_country'];
		}
		if (isset($this->request->get['filter_zone'])) {
			$url .= '&filter_zone=' . $this->request->get['filter_zone'];
		}

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		$pagination = new Pagination();
		$pagination->total = $city_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_limit_admin');
		$pagination->url = $this->url->link($this->_route . '/' . $this->_moduleName, 'user_token=' . $this->session->data['user_token'] . $url . '&page={page}', 'SSL');

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($city_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($city_total - $this->config->get('config_limit_admin'))) ? $city_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $city_total, ceil($city_total / $this->config->get('config_limit_admin')));
		$data['filter_name'] = $filter_name;
		$data['filter_country'] = $filter_country;
		$data['filter_zone'] = $filter_zone;
		$data['sort'] = $sort;
		$data['order'] = $order;
		$data['user_token'] = $this->session->data['user_token'];

		$this->load->model($this->_route . '/country');
		$this->load->model($this->_route . '/zone');

		$countries = $this->{'model_' . $this->_route . '_country'}->getCountries();

		foreach ($countries as $country) {
			$data['countries'][] = array(
				'country_id' => $country['country_id'],
				'name' => $country['name']
					//   'city_count' => $this->{'model_' . $this->_route . '_' . $this->_moduleName}->getTotalCitiesByCountryId($country['country_id'])
			);
		}

		if ($data['filter_country']) {
			$zones = $this->{'model_' . $this->_route . '_zone'}->getZonesByCountryId($data['filter_country']);
			foreach ($zones as $zone) {
				$data['zones'][] = array(
					'zone_id' => $zone['zone_id'],
					'name' => $zone['name'],
						//    'city_count' => $this->{'model_' . $this->_route . '_' . $this->_moduleName}->getTotalCitiesByZoneId($zone['zone_id'])
				);
			}
		} else {
			$zones = $this->{'model_' . $this->_route . '_zone'}->getZones();
			foreach ($zones as $zone) {
				$data['zones'][] = array(
					'zone_id' => $zone['zone_id'],
					'name' => $zone['name'],
						// 'city_count' => $this->{'model_' . $this->_route . '_' . $this->_moduleName}->getTotalCitiesByZoneId($zone['zone_id'])
				);
			}
		}

		$api_key = $this->config->get($this->_moduleSysName() . '_api_key');
		if(trim($api_key) == ""){
			$data['error_warning'] = $this->language->get('error_api_key');
		}
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view($this->_route . '/' . $this->_moduleName . '_list', $data));
	}

	protected function getForm()
	{
		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_form'] = !isset($this->request->get['city_id']) ? $this->language->get('text_add') : $this->language->get('text_edit');

		$data['entry_status'] = $this->language->get('entry_status');
		$data['entry_name'] = $this->language->get('entry_name');
		$data['entry_zone'] = $this->language->get('entry_zone');
		$data['entry_country'] = $this->language->get('entry_country');

		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');

		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else if (isset($this->session->data['error_warning'])) {
			$data['error_warning'] = $this->session->data['error_warning'];
			unset($this->session->data['error_warning']);
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->error['name'])) {
			$data['error_name'] = $this->error['name'];
		} else {
			$data['error_name'] = '';
		}

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data = $this->initBreadcrumbs(array(
			array($this->_route . '/' . $this->_moduleName, 'heading_title')
				), $data);

		if (!isset($this->request->get['city_id'])) {
			$data['action'] = $this->url->link($this->_route . '/' . $this->_moduleName . '/add', 'user_token=' . $this->session->data['user_token'] . $url, 'SSL');
		} else {
			$data['action'] = $this->url->link($this->_route . '/' . $this->_moduleName . '/edit', 'user_token=' . $this->session->data['user_token'] . '&city_id=' . $this->request->get['city_id'] . $url, 'SSL');
		}

		$data['cancel'] = $this->url->link($this->_route . '/' . $this->_moduleName, 'user_token=' . $this->session->data['user_token'] . $url, 'SSL');

		if (isset($this->request->get['city_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$city_info = $this->{'model_' . $this->_route . '_' . $this->_moduleName}->getCity($this->request->get['city_id']);
		}

		if (isset($this->request->post['status'])) {
			$data['status'] = $this->request->post['status'];
		} elseif (!empty($city_info)) {
			$data['status'] = $city_info['status'];
		} else {
			$data['status'] = '1';
		}

		$this->load->model($this->_route . '/language');
		$data['languages'] = $this->{'model_' . $this->_route . '_language'}->getLanguages();

		$this->load->model($this->_route . '/' . $this->_moduleName);
		if (isset($this->request->post['name'])) {
			$data['name'] = $this->request->post['name'];
		} elseif (isset($this->request->get['city_id'])) {
			$data['name'] = $this->{'model_' . $this->_route . '_' . $this->_moduleName}->getCityDescriptions($this->request->get['city_id']);
		} else {
			$data['name'] = array();
		}

		if (isset($this->request->post['zone_id'])) {
			$data['zone_id'] = $this->request->post['zone_id'];
		} elseif (!empty($city_info)) {
			$data['zone_id'] = $city_info['zone_id'];
		} else {
			$data['zone_id'] = '';
		}

		if (isset($this->request->post['country_id'])) {
			$data['country_id'] = $this->request->post['country_id'];
		} elseif (!empty($city_info)) {
			$data['country_id'] = $city_info['country_id'];
		} else {
			$data['country_id'] = '';
		}

		$this->load->model($this->_route . '/country');
		$this->load->model($this->_route . '/zone');
		$data['countries'] = $this->{'model_' . $this->_route . '_country'}->getCountries();
		if ($data['country_id']) {
			$data['zones'] = $this->{'model_' . $this->_route . '_zone'}->getZonesByCountryId($data['country_id']);
		} else {
			$data['zones'] = $this->{'model_' . $this->_route . '_zone'}->getZones();
		}
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view($this->_route . '/' . $this->_moduleName . '_form', $data));
	}

	public function reloadZones()
	{
		$this->load->model($this->_route . '/zone');
		$this->load->model($this->_route . '/' . $this->_moduleName);
		if (isset($this->request->post['country_id'])) {
			$data['country_id'] = $this->request->post['country_id'];
		} elseif (!empty($city_info)) {
			$data['country_id'] = $city_info['country_id'];
		} else {
			$data['country_id'] = '';
		}
		if (isset($this->request->post['zone_id'])) {
			$data['zone_id'] = $this->request->post['zone_id'];
		} elseif (!empty($city_info)) {
			$data['zone_id'] = $city_info['zone_id'];
		} else {
			$data['zone_id'] = '';
		}

		/* if (isset($this->request->post['fromlist'])) {
		  $data['fromlist'] = true;
		  } else { */
		$data['fromlist'] = false;
		//}

		if ($data['country_id']) {
			$zones = $this->{'model_' . $this->_route . '_zone'}->getZonesByCountryId($data['country_id']);
			foreach ($zones as $zone) {
				$data['zones'][] = array(
					'zone_id' => $zone['zone_id'],
					'name' => $zone['name'],
						//'city_count' => $this->{'model_' . $this->_route . '_' . $this->_moduleName}->getTotalCitiesByZoneId($zone['zone_id']) // Если отключить подсчет, то будет отображать все регионы, а не те в которых есть города
				);
			}
		} else {
			$zones = $this->{'model_' . $this->_route . '_zone'}->getZones();
			foreach ($zones as $zone) {
				$data['zones'][] = array(
					'zone_id' => $zone['zone_id'],
					'name' => $zone['name'],
						//      'city_count' => $this->{'model_' . $this->_route . '_' . $this->_moduleName}->getTotalCitiesByZoneId($zone['zone_id']) // Если отключить подсчет, то будет отображать все регионы, а не те в которых есть города
				);
			}
		}

		$this->response->setOutput($this->load->view($this->_route . '/' . $this->_moduleName . '_zones', $data));
	}

	protected function validateForm()
	{
		if (!$this->user->hasPermission('modify', $this->_route . '/' . $this->_moduleName)) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		foreach ($this->request->post['name'] as $language_id => $name) {
			if ((utf8_strlen($name) < 2) || (utf8_strlen($name) > 64)) {
				$this->error['name'][$language_id] = $this->language->get('error_name');
			}
		}

		return !$this->error;
	}

	protected function validateDelete()
	{
		if (!$this->user->hasPermission('modify', $this->_route . '/' . $this->_moduleName)) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		// @todo:в зависимости от того к чему будут относится адреса нужно добавить проверки на привязки к магазину, адресам и т.п.
		return !$this->error;
	}

	public function autocomplete_city()
	{

		if (isset($this->request->get['name'])) {
			$city = trim($this->request->get['name']);
		} else if (isset($this->request->post['name'])) {
			$city = trim($this->request->post['name']);
		}

		if (!$city) {
			$this->response->setOutput(json_encode(array()));
			return;
		}

		if (isset($this->request->get['country_id'])) {
			$country_id = trim($this->request->get['country_id']);
		} else if (isset($this->request->post['country_id'])) {
			$country_id = trim($this->request->post['country_id']);
		} else if ($this->config->get($this->_moduleSysName() . "_shipping_country_select")) {
			$country_id = $this->config->get($this->_moduleSysName() . "_shipping_country_default");
		} else {
			$country_id = 0;
		}

		if (isset($this->request->get['zone_id'])) {
			$zone_id = trim($this->request->get['zone_id']);
		} else if (isset($this->request->post['zone_id'])) {
			$zone_id = trim($this->request->post['zone_id']);
		} else {
			$zone_id = 0;
		}

		$this->load->model($this->_route . '/' . $this->_moduleName);
		$cities = $this->{'model_' . $this->_route . '_' . $this->_moduleName}->lookup_city($city, $zone_id, $country_id);

		$result = array();
		foreach ($cities as $city) {
			$value = $city['city'];

			$item = array(
				"value" => $value,
				'city' => $city['city'],
				'zone_id' => $city['zone_id'],
				'country_id' => $city['country_id']
			);
			$result[] = $item;
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($result));
	}

}
