<?php

require_once( DIR_SYSTEM . "/engine/neoseo_model.php");

class ModelExtensionModuleNeoSeoCheckout extends NeoSeoModel
{

	public function __construct($registry)
	{
		parent::__construct($registry);
		$this->_moduleSysName = "neoseo_checkout";
		$this->_modulePostfix = "";
		$this->_logFile = $this->_moduleSysName() . ".log";
		$this->debug = $this->config->get($this->_moduleSysName() . "_status") == 1;

		$this->language->load('extension/' . $this->_route . '/' . $this->_moduleSysName());
		$this->load->model('customer/customer_group');

		$customerGroups = $this->model_customer_customer_group->getCustomerGroups();

		foreach ($customerGroups as $groups) {
			$defaultCustomerFields[$groups["customer_group_id"]] = array(
				array(
					'label' => array('1' => 'Фамилия'),
					'field' => 'lastname',
					'type' => 'input',
					'name' => 'lastname',
					'mask' => '',
					'default' => '',
					'placeholder' => '',
					'display' => 1,
					'only_register' => 0,
					'required' => 1
				),
				array(
					'label' => array('1' => 'Имя, отчество'),
					'field' => 'firstname',
					'type' => 'input',
					'name' => 'firstname',
					'mask' => '',
					'default' => '',
					'placeholder' => '',
					'display' => 1,
					'only_register' => 0,
					'required' => 1
				),
				array(
					'label' => array('1' => 'Ваш телефон'),
					'field' => 'telephone',
					'type' => 'input',
					'name' => 'telephone',
					'mask' => '+38 (099) 999-99-99',
					'default' => '',
					'placeholder' => '',
					'display' => 1,
					'only_register' => 0,
					'required' => 1
				),
				array(
					'label' => array('1' => 'Ваш электронный адрес'),
					'field' => 'email',
					'type' => 'input',
					'name' => 'email',
					'mask' => '',
					'default' => '',
					'placeholder' => '',
					'display' => 1,
					'only_register' => 0,
					'required' => 0
				),
				array(
					'label' => array('1' => 'Примечание к заказу'),
					'field' => 'comment',
					'type' => 'textarea',
					'name' => 'comment',
					'mask' => '',
					'default' => '',
					'placeholder' => '',
					'display' => 1,
					'only_register' => 0,
					'required' => 0
				),
				array(
					'label' => array('1' => 'Зарегистрироваться'),
					'field' => 'custom',
					'type' => 'checkbox',
					'name' => 'register',
					'mask' => '',
					'default' => '',
					'placeholder' => '',
					'display' => 1,
					'only_register' => 0,
					'required' => 0
				),
				array(
					'label' => array('1' => 'Пароль'),
					'field' => 'password',
					'type' => 'password',
					'name' => 'password',
					'mask' => '',
					'default' => '',
					'placeholder' => '',
					'display' => 1,
					'only_register' => 1,
					'required' => 0
				),
				array(
					'label' => array('1' => 'Подтверждение пароля'),
					'field' => 'custom',
					'type' => 'password',
					'name' => 'password2',
					'mask' => '',
					'default' => '',
					'placeholder' => '',
					'display' => 1,
					'only_register' => 1,
					'required' => 0
				),
				array(
					'label' => array('1' => 'Подписаться на новости'),
					'field' => 'custom',
					'type' => 'checkbox',
					'name' => 'newsletter',
					'mask' => '',
					'default' => '',
					'placeholder' => '',
					'display' => 1,
					'only_register' => 1,
					'required' => 0
				),
			);
		}

		// Подгоняем дефолтные названия полей под все языки в админке
		$this->load->model('localisation/language');
		$languages = $this->model_localisation_language->getLanguages();
		foreach ($defaultCustomerFields as $type => $fields) {
			foreach ($fields as $id => $field) {
				$label = $field['label'][1];
				$labels = array();
				foreach ($languages as $language) {
					$language_id = $language['language_id'];
					$labels[$language_id] = isset($field['label'][$language_id]) ? $field['label'][$language_id] : $label;
				}
				$defaultCustomerFields[$type][$id]['label'] = $labels;
			}
		}

		$this->params = array(
			'module_key' => '',
			"status" => 1,
			"debug" => 0,
			"agreement_id" => 3,
			"agreement_default" => 1,
			"amount_control" => 0,
			"stock_control" => 0,
			"min_amount" => 0,
			"free_delivery_min_amount" => 1000,
			"customer_fields" => $defaultCustomerFields,
			"payment_fields" => array(),
			"shipping_fields" => array(),
			"use_shipping_type" => 0,
			"shipping_type" => array(),
			"shipping_title" => 0,
			"payment_logo" => 0,
			"payment_control" => 1,
			"shipping_control" => 1,
			"payment_reloads_cart" => 1,
			"shipping_reloads_cart" => 1,
			"dependency_type" => "payment_for_shipping",
			"shipping_city_select" => "default",
			"shipping_country_select" => 0,
			"shipping_country_default" => $this->config->get('config_country_id'),
			"shipping_zone_default" => 0,
			"shipping_city_default" => "",
			"shipping_novaposhta_city_default" => "",
			'shipping_novaposhta' => array(),
			'warehouse_types' => array(),
			"cart_redirect" => 0,
			"hide_menu" => 0,
			"hide_footer" => 0,
			"api_key" => '',
			"use_international_phone_mask" => 0,
			"onestep" => "",
			"novaposhta_city_name" => "",
			"customer_group_register" => "",
			"dropped_cart_template" => "",
			"dropped_cart_email_subject" => "",
			"agreement_text" => 0,
			"compact" => 0,
			'aways_show_delivery_block' => 0,
			'shipping_require_city' => array(),
		);

		$this->options_levels = array(
			'module_key' => 0,
			"status" => 0,
			"debug" => 0,
			"agreement_id" => 1,
			"agreement_default" => 1,
			"amount_control" => 1,
			"stock_control" => 1,
			"min_amount" => 1,
			"free_delivery_min_amount" => 1,
			"customer_fields" => 1,
			"payment_fields" => 1,
			"shipping_fields" => 1,
			"use_shipping_type" => 1,
			"shipping_type" => 1,
			"shipping_title" => 1,
			"payment_logo" => 1,
			"payment_control" => 1,
			"shipping_control" => 1,
			"payment_reloads_cart" => 1,
			"shipping_reloads_cart" => 1,
			"dependency_type" => 1,
			"shipping_city_select" => 1,
			"shipping_country_select" => 1,
			"shipping_country_default" => 1,
			"shipping_zone_default" => 1,
			"shipping_city_default" => 1,
			"shipping_novaposhta_city_default" => 1,
			'shipping_novaposhta' => 1,
			'warehouse_types' => 1,
			"cart_redirect" => 1,
			"hide_menu" => 1,
			"hide_footer" => 1,
			"api_key" => 1,
			"use_international_phone_mask" => 1,
			"onestep" => 1,
			"novaposhta_city_name" => 1,
			"customer_group_register" => 1,
			"dropped_cart_template" => "",
			"dropped_cart_email_subject" => 1,
			"agreement_text" => 1,
			"compact" => 1,
			'aways_show_delivery_block' => 1,
			'shipping_require_city' => 1,
		);

		
	}

	public function installTables()
	{
		// Создаем недостающие таблички
		$sql = "
			CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "customer_scfield` (
			`customer_scfield_id` int(11) NOT NULL AUTO_INCREMENT,
			`customer_id` int(11) NOT NULL,
			`name` varchar(256) NOT NULL,
			`value` text NOT NULL,
			PRIMARY KEY (`customer_scfield_id`)
			) DEFAULT CHARSET=utf8;
		";
		$this->db->query($sql);

		$sql = "
			CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "order_scfield` (
			`order_scfield_id` int(11) NOT NULL AUTO_INCREMENT,
			`order_id` int(11) NOT NULL,
			`name` varchar(256) NOT NULL,
			`value` text NOT NULL,
			PRIMARY KEY (`order_scfield_id`)
			) DEFAULT CHARSET=utf8;
		";

		$this->db->query($sql);

		//Create table
		$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "city` (
			`city_id` int(11) NOT NULL AUTO_INCREMENT,
			`country_id` int(11) NOT NULL,
			`zone_id` int(11) NOT NULL,
			`status` tinyint(1) NOT NULL,
			PRIMARY KEY (`city_id`)
			) DEFAULT CHARSET=utf8");

		$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "city_description` (
			`city_id` int(11) NOT NULL,
			`language_id` int(11) NOT NULL,
			`name` varchar(64) NOT NULL
			) DEFAULT CHARSET=utf8");

		$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "country_description` (
			`country_description_id`  int(11) NOT NULL AUTO_INCREMENT ,
			`country_id` int(11) null, 
			`language_id` int(11) null,
			`name` varchar(128), 
			`iso_code_2` varchar(2), 
			`iso_code_3` varchar(3), 
			`address_format` text, 
			`postcode_required`	tinyint(1), 
			`status` tinyint(1) NOT NULL DEFAULT 1,   
			PRIMARY KEY (`country_description_id`),
			KEY `country_language` (`country_id`, `language_id`)
			) DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci;");

		$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "zone_description` (
			`zone_description_id`  int(11) NOT NULL AUTO_INCREMENT ,
			`zone_id` int(11), 
			`country_id` int(11), 			
			`language_id` int(11),
			`name` varchar(255),
			`code` varchar(32) NOT NULL default '', 
			`status` tinyint(1) NOT NULL default 1,  
			PRIMARY KEY (`zone_description_id`),
			KEY `zone_language` (`zone_id`, `language_id`)
			) DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci;");

		$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "city_address` (
			`address_id`  int(11) NOT NULL AUTO_INCREMENT ,
			`name` varchar(255),
			`zone_id` int(11), 
			`city` varchar(255),
			`shipping_method` varchar(255),
			PRIMARY KEY (`address_id`),
			KEY `city` (`city`),
			KEY `zone_city` (`zone_id`,`city`)
			) DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci;");

		$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "city_address_description` (
			`address_description_id`  int(11) NOT NULL AUTO_INCREMENT ,
			`address_id` int(11), 
			`name` varchar(255),
			`language_id` int(11),
			`zone_id` int(11), 
			`city` varchar(255),
			`shipping_method` varchar(255),
			PRIMARY KEY (`address_description_id`),
			KEY `city` (`city`,`language_id`),
			KEY `address` (`address_id`),
			KEY `zone_city` (`zone_id`,`city`)
			) DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci;");

		$this->db->query('CREATE TABLE IF NOT EXISTS `' . DB_PREFIX . 'dropped_cart` (
			`dropped_cart_id` int(11) NOT NULL AUTO_INCREMENT,
			`customer_id` int(11) DEFAULT NULL,
			`email` varchar(128) NOT NULL,
			`name` varchar(255) DEFAULT \'\',
			`phone` varchar(45) DEFAULT \'\',
			`modified` datetime DEFAULT NULL,
			`created` datetime NOT NULL,
			`user_token` varchar(255) NOT NULL,
			`notification_count` int(3) DEFAULT \'0\',
			PRIMARY KEY (`dropped_cart_id`),
			KEY `oc_dropped_cart_token` (`user_token`)
			) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;');

		$this->db->query('CREATE TABLE IF NOT EXISTS  `' . DB_PREFIX . 'dropped_cart_product` (
			`dropped_cart_id` int(11) NOT NULL,
			`cart_id` int(11) DEFAULT NULL,
			`product_id` int(11) NOT NULL,
			`option` text NOT NULL,
			`quantity` int(5) NOT NULL DEFAULT \'1\',
			`image` varchar(1024) DEFAULT NULL,
			`href` varchar(45) DEFAULT NULL,
			`special` int(11) DEFAULT NULL,
			`name` varchar(255) NOT NULL,
			`price` decimal(15,2) DEFAULT NULL,
			KEY `oc_dropped_cart_products_idpid` (`dropped_cart_id`,`product_id`)
			) ENGINE=MyISAM DEFAULT CHARSET=utf8;
			');
	}

	// Install/Uninstall
	public function install()
	{
		// Настройки по умолчанию
		$this->initParams($this->params);

		// Создаем новые и недостающие таблицы в актуальной структуре
		$this->installTables();

		// Доступы
		$this->load->model('user/user_group');
		$this->model_user_user_group->addPermission($this->user->getId(), 'access', 'localisation/neoseo_city');
		$this->model_user_user_group->addPermission($this->user->getId(), 'modify', 'localisation/neoseo_city');
		$this->model_user_user_group->addPermission($this->user->getId(), 'access', 'localisation/neoseo_address');
		$this->model_user_user_group->addPermission($this->user->getId(), 'modify', 'localisation/neoseo_address');
		$this->model_user_user_group->addPermission($this->user->getId(), 'access', 'sale/neoseo_dropped_cart');
		$this->model_user_user_group->addPermission($this->user->getId(), 'modify', 'sale/neoseo_dropped_cart');

		$this->load->model('setting/event');
		$this->model_setting_event->addEvent($this->_moduleSysName(), 'catalog/controller/checkout/cart/add', 'checkout/neoseo_dropped_cart/sync');
		$this->model_setting_event->addEvent($this->_moduleSysName(), 'catalog/controller/checkout/cart/edit', 'checkout/neoseo_dropped_cart/sync');
		$this->model_setting_event->addEvent($this->_moduleSysName(), 'catalog/controller/checkout/cart/remove', 'checkout/neoseo_dropped_cart/sync');

		$this->model_setting_event->addEvent($this->_moduleSysName(), 'catalog/model/account/customer/addCustomer', 'catalog/model/checkout/neoseo_dropped_cart/merge');
		$this->model_setting_event->addEvent($this->_moduleSysName(), 'catalog/controller/checkout/neoseo_customer/validate', 'checkout/neoseo_dropped_cart/merge');


		$this->model_setting_event->addEvent($this->_moduleSysName(), 'catalog/model/checkout/order/addOrder', 'catalog/model/checkout/neoseo_dropped_cart/clear');

		$this->model_setting_event->addEvent($this->_moduleSysName(), 'catalog/controller/checkout/' . $this->_moduleSysName() . '/validateLogin', 'checkout/neoseo_dropped_cart/merge');
		$this->model_setting_event->addEvent($this->_moduleSysName(), 'catalog/controller/checkout/' . $this->_moduleSysName() . '/validate', 'checkout/neoseo_dropped_cart/merge');
		$this->model_setting_event->addEvent($this->_moduleSysName(), 'catalog/controller/checkout/' . $this->_moduleSysName() . '/login', 'checkout/neoseo_dropped_cart/merge');

		return TRUE;
	}

	public function upgrade()
	{
		// Добавляем недостающие новые параметры
		$this->initParams($this->params);

		// Создаем недостающие таблицы в актуальной структуре
		$this->installTables();
	}

	public function uninstall()
	{
		//Уадаляем параметры из сеттингов
		$this->db->query("DELETE FROM `" . DB_PREFIX . "setting` WHERE `code` = '" . $this->_moduleSysName() . "'");

		// Удаляем таблицы модуля
		$this->db->query("DROP TABLE IF EXISTS " . DB_PREFIX . "customer_scfield");
		$this->db->query("DROP TABLE IF EXISTS " . DB_PREFIX . "order_scfield");
		$this->db->query("DROP TABLE IF EXISTS " . DB_PREFIX . "city");
		$this->db->query("DROP TABLE IF EXISTS " . DB_PREFIX . "city_description");
		$this->db->query("DROP TABLE IF EXISTS " . DB_PREFIX . "country_description");
		$this->db->query("DROP TABLE IF EXISTS " . DB_PREFIX . "zone_description");
		$this->db->query("DROP TABLE IF EXISTS " . DB_PREFIX . "city_address");
		$this->db->query("DROP TABLE IF EXISTS " . DB_PREFIX . "city_address_description");
		$this->db->query("DROP TABLE IF EXISTS " . DB_PREFIX . "dropped_cart");
		$this->db->query("DROP TABLE IF EXISTS " . DB_PREFIX . "dropped_cart_product");

		// Удаляем обработчики событий, если они у нас есть
		$this->load->model('setting/event');
		$this->model_setting_event->deleteEventByCode($this->_moduleSysName());

		// Удаляем права на нестандартные контроллеры, если они используются
		$this->load->model('user/user_group');
		$this->model_user_user_group->removePermission($this->user->getGroupId(), 'access', 'localisation/neoseo_city');
		$this->model_user_user_group->removePermission($this->user->getGroupId(), 'modify', 'localisation/neoseo_city');
		$this->model_user_user_group->removePermission($this->user->getGroupId(), 'access', 'localisation/neoseo_address');
		$this->model_user_user_group->removePermission($this->user->getGroupId(), 'modify', 'localisation/neoseo_address');
		$this->model_user_user_group->removePermission($this->user->getGroupId(), 'access', 'sale/neoseo_dropped_cart');
		$this->model_user_user_group->removePermission($this->user->getGroupId(), 'modify', 'sale/neoseo_dropped_cart');

		return TRUE;
	}

	
}

?>