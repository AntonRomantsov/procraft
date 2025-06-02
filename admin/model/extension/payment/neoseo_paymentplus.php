<?php

require_once( DIR_SYSTEM . "/engine/neoseo_model.php");

class ModelExtensionPaymentNeoSeoPaymentPlus extends NeoSeoModel
{

	public function __construct($registry)
	{
		parent::__construct($registry);
		$this->_moduleSysName = "neoseo_paymentplus";
				$this->_modulePostfix = ""; // Постфикс для разных типов модуля, поэтому переходим на испольлзование $this->_moduleSysName()
		$this->_logFile = $this->_moduleSysName() . '.log';
		$this->debug = $this->config->get($this->_moduleSysName() . '_debug') == 1;

		$this->params = array(
			'module_key' => '',
			'status' => 1,
			'debug' => 0,
			'sort_order' => ''
		);

		$this->options_levels = array(
			'module_key' => 0,
			'status' => 0,
			'debug' => 0,
			'sort_order' => 1,
		);

		
	}

	public function install()
	{
		// Значения параметров по умолчанию
		$this->initParams($this->params);

		// Создаем новые и недостающие таблицы в актуальной структуре
		$this->installTables();

		return true;
	}

	public function installTables()
	{
		$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "paymentplus` (
			`payment_id` int(11) NOT NULL AUTO_INCREMENT,
			`status` int(11) DEFAULT NULL,
			`sort_order` int(11) DEFAULT '0',
			`price_min` decimal(10,0) DEFAULT NULL,
			`price_max` decimal(10,0) DEFAULT NULL,
			`geo_zone_id` int(11) DEFAULT NULL,
			`order_status_id` int(11) DEFAULT NULL,
			`cities` longtext,
			`stores` longtext,
			PRIMARY KEY (`payment_id`)
		) DEFAULT CHARSET=utf8 ;");

		$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "paymentplus_description` (
				`id` int(11) NOT NULL AUTO_INCREMENT,
				`payment_id` int(11) DEFAULT NULL,
				`language_id` int(11) DEFAULT NULL,
				`name` varchar(255) DEFAULT NULL,
				`description` text,
				PRIMARY KEY (`id`)
			) DEFAULT CHARSET=utf8 ;");
	}

	public function upgrade()
	{
		// Добавляем недостающие новые параметры
		$this->initParams($this->params);

		// Создаем недостающие таблицы в актуальной структуре
		$this->installTables();

		// Добавляем недостающие столбцы
		$sql = "SHOW COLUMNS FROM `" . DB_PREFIX . "paymentplus` LIKE 'stores'";
		$query = $this->db->query($sql);
		if (!$query->num_rows) {
			$sql = "ALTER TABLE `" . DB_PREFIX . "paymentplus` ADD `stores` longtext COLLATE 'utf8_general_ci' NULL";
			$this->db->query($sql);
		}
	}

	public function uninstall()
	{
		//Уадаляем параметры из сеттингов
		$this->db->query("DELETE FROM `" . DB_PREFIX . "setting` WHERE `code` = '" . $this->_moduleSysName() . "'");

		// Удаляем таблицы модуля
		$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "paymentplus_description`, `" . DB_PREFIX . "paymentplus`");

		return true;
	}

	

}
