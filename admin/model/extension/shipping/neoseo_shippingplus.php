<?php

require_once(DIR_SYSTEM . "/engine/neoseo_model.php");

class ModelExtensionShippingNeoSeoShippingPlus extends NeoSeoModel
{

	public function __construct($registry)
	{
		parent::__construct($registry);
		$this->_moduleSysName = "neoseo_shippingplus";
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

		return TRUE;
	}

	public function installTables()
	{
		$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "shippingplus` (
			`shipping_id` int(11) NOT NULL AUTO_INCREMENT,
			`status` int(11) DEFAULT NULL,
			`sort_order` int(11) DEFAULT '0',
			`price_min` decimal(10,0) DEFAULT NULL,
			`price_max` decimal(10,0) DEFAULT NULL,
			`fix_payment` decimal(10,0) DEFAULT NULL,
			`geo_zone_id` int(11) DEFAULT NULL,
			`geo_zones_id` longtext,
			`cities` longtext,
			`weight_price` longtext,
			`stores` longtext,
			PRIMARY KEY (`shipping_id`)
			) DEFAULT CHARSET=utf8 ;");
		$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "shippingplus_description` (
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`shipping_id` int(11) DEFAULT NULL,
			`language_id` int(11) DEFAULT NULL,
			`name` varchar(255) DEFAULT NULL,
			`description` text,
			PRIMARY KEY (`id`)
			) DEFAULT CHARSET=utf8 ;");
		$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "shippingplus_zones` (
			`zone_id` int(11) NOT NULL AUTO_INCREMENT,
			`zone` int(11) NOT NULL DEFAULT '0',
			`weight` decimal(15,2) NOT NULL DEFAULT '0.00',
			`price` decimal(15,4) NOT NULL DEFAULT '0.0000',
			PRIMARY KEY (`zone_id`)
			) DEFAULT CHARSET=utf8 ;");
	}

	public function upgrade()
	{
		// Добавляем недостающие новые параметры
		$this->initParams($this->params);

		// Создаем недостающие таблицы в актуальной структуре
		$this->installTables();
		// Добавляем недостающие столбцы
		$sql = "SHOW COLUMNS FROM `" . DB_PREFIX . "shippingplus` LIKE 'weight_price'";
		$query = $this->db->query($sql);
		if (!$query->num_rows) {
			$sql = "ALTER TABLE `" . DB_PREFIX . "shippingplus` ADD `weight_price` longtext";
			$this->db->query($sql);
		}

		$sql = "SHOW COLUMNS FROM `" . DB_PREFIX . "shippingplus` LIKE 'fix_payment'";
		$query = $this->db->query($sql);
		if (!$query->num_rows) {
			$sql = "ALTER TABLE `" . DB_PREFIX . "shippingplus` ADD `fix_payment` decimal(10,0)";
			$this->db->query($sql);
		}

		$sql = "SHOW COLUMNS FROM `" . DB_PREFIX . "shippingplus` LIKE 'geo_zones_id'";
		$query = $this->db->query($sql);
		if (!$query->num_rows) {
			$sql = "ALTER TABLE `" . DB_PREFIX . "shippingplus` ADD `geo_zones_id` longtext";
			$this->db->query($sql);
		}

		$sql = "SHOW COLUMNS FROM `" . DB_PREFIX . "shippingplus` LIKE 'stores'";
		$query = $this->db->query($sql);
		if (!$query->num_rows) {
			$sql = "ALTER TABLE `" . DB_PREFIX . "shippingplus` ADD `stores` longtext COLLATE 'utf8_general_ci' NULL";
			$this->db->query($sql);
		}

		$sql = "SHOW COLUMNS FROM `" . DB_PREFIX . "shippingplus` LIKE 'zone_status'";
		$query = $this->db->query($sql);
		if (!$query->num_rows) {
			$sql = "ALTER TABLE `" . DB_PREFIX . "shippingplus` ADD `zone_status` int(11) DEFAULT NULL";
			$this->db->query($sql);
		}
	}

	public function uninstall()
	{
		//Уадаляем параметры из сеттингов
		$this->db->query("DELETE FROM `" . DB_PREFIX . "setting` WHERE `code` = '" . $this->_moduleSysName() . "'");

		// Удаляем таблицы модуля
		$this->db->query("DROP TABLE IF EXISTS
			`" . DB_PREFIX . "shippingplus_description`,
			`" . DB_PREFIX . "shippingplus`");

		return true;
	}

	

}
