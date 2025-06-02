<?php

require_once( DIR_SYSTEM . "/engine/neoseo_model.php");

class ModelLocalisationNeoSeoAddress extends NeoSeoModel
{

	public function __construct($registry)
	{
		parent::__construct($registry);
		$this->_moduleSysName = "neoseo_checkout";
		$this->_moduleName = "neoseo_address";
		$this->_modulePostfix = "";
		$this->_logFile = $this->_moduleSysName() . ".log";
		$this->debug = $this->config->get($this->_moduleSysName() . "_debug");

		
	}

	public function getAddresses($zone_id, $city, $shipping_method)
	{
		$language_id = $this->config->get('config_language_id');

		$sql = "SELECT name 
		          FROM " . DB_PREFIX . "city_address_description 
		         WHERE language_id = " . (int) $language_id . "
		           AND zone_id = " . (int) $zone_id . "
		           AND city = '" . $this->db->escape($city) . "'
		           AND shipping_method = '" . $this->db->escape($shipping_method) . "'
		           
		           ";

		$query = $this->db->query($sql);

		return $query->rows;
	}

	

}
