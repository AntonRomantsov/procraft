<?php

require_once( DIR_SYSTEM . "/engine/neoseo_model.php");

class ModelLocalisationNeoSeoCity extends NeoSeoModel
{

	public function __construct($registry)
	{
		parent::__construct($registry);
		$this->_moduleSysName = "neoseo_checkout";
		$this->_moduleName = "neoseo_city";
		$this->_modulePostfix = "";
		$this->_logFile = $this->_moduleSysName() . ".log";
		$this->debug = $this->config->get($this->_moduleSysName() . "_debug");

		
	}

	public function lookup($name)
	{
		$zones = $this->cache->get($this->_moduleName . '_zones');
		if (!$zones) {
			$zones = array();
			$query = $this->db->query("SELECT name, zone_id FROM `" . DB_PREFIX . "zone`");
			foreach ($query->rows as $row) {
				$zones[$row['zone_id']] = $row['name'];
			}
			$this->cache->set($this->_moduleName . '_zones', $zones);
		}

		$countries = $this->cache->get($this->_moduleName . '_countries');
		if (!$countries) {
			$countries = array();
			$query = $this->db->query("SELECT name, country_id FROM `" . DB_PREFIX . "country`");
			foreach ($query->rows as $row) {
				$countries[$row['country_id']] = $row['name'];
			}
			$this->cache->set($this->_moduleName . '_countries', $countries);
		}

		$result = array();

		$sql = "SELECT cd.`name`, c.zone_id, c.country_id
					FROM " . DB_PREFIX . "city_description cd
					     INNER JOIN " . DB_PREFIX . "city c on ( c.city_id = cd.city_id )
				WHERE cd.name like '" . $name . "%' 
				  AND c.status = '1'
				  AND cd.language_id = '" . $this->config->get('config_language_id') . "'
			    ORDER BY `name` LIMIT 0,20";

		$query = $this->db->query($sql);
		foreach ($query->rows as $row) {
			$item = array();
			$item['city'] = $row['name'];
			$item['zone_id'] = $row['zone_id'];
			$item['zone'] = (isset($zones[$row['zone_id']]) ? $zones[$row['zone_id']] : "" );
			$item['country_id'] = $row['country_id'];
			$item['country'] = (isset($countries[$row['country_id']]) ? $countries[$row['country_id']] : "" );
			$result[] = $item;
		}

		return $result;
	}

	public function lookup_city($name, $zone_id, $country_id)
	{
		$result = array();

		$sql = "SELECT cd.`name`, c.zone_id, c.country_id
					FROM " . DB_PREFIX . "city_description cd
					     INNER JOIN " . DB_PREFIX . "city c on ( c.city_id = cd.city_id )
				WHERE cd.name like '" . $name . "%' 
				  AND c.status = '1'
				  AND cd.language_id = '" . $this->config->get('config_language_id') . "'
			    ";

		if ($country_id != 0) {
			$sql .= " AND c.country_id = " . ($country_id) . "";
			if ($zone_id != 0) {
				$sql .= " AND c.zone_id = " . ($zone_id) . "";
			}
		}
		$sql .= " ORDER BY `name` LIMIT 0,20";

		$query = $this->db->query($sql);
		foreach ($query->rows as $row) {
			$item = array();
			$item['city'] = $row['name'];
			$item['zone_id'] = $row['zone_id'];
			$item['country_id'] = $row['country_id'];
			$result[] = $item;
		}

		return $result;
	}

	

}
