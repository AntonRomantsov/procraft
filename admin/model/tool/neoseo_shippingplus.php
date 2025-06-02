<?php

require_once(DIR_SYSTEM . "/engine/neoseo_model.php");

class ModelToolNeoSeoShippingPlus extends NeoSeoModel
{

	public function __construct($registry)
	{
		parent::__construct($registry);
		$this->_moduleSysName = "neoseo_shippingplus";
				$this->_modulePostfix = ""; // Постфикс для разных типов модуля, поэтому переходим на испольлзование $this->_moduleSysName()
		$this->_logFile = $this->_moduleSysName() . '.log';
		$this->debug = $this->config->get($this->_moduleSysName() . '_debug') == 1;

		
	}

	public function addShipping($data)
	{
		if (isset($data['shipping_weight_price'])) {
			$weight_price_data = serialize($data['shipping_weight_price']);
		} else {
			$weight_price_data = '';
		}

		if (isset($data['geo_zone_id'])) {
			$geo_zone_id = serialize($data['geo_zone_id']);
		} else {
			$geo_zone_id = '';
		}

		$this->db->query("INSERT INTO " . DB_PREFIX . "shippingplus SET sort_order = '" . (int) $data['sort_order'] . "', status = '" . (int) $data['status'] . "', zone_status = '" . (int)$data['zone_status'] . "', price_min = '" . (int) $data['price_min'] . "', price_max = '" . (int) $data['price_max'] . "', geo_zones_id = '" . $geo_zone_id . "', cities = '" . $this->db->escape($data['cities']) . "', weight_price = '" . $this->db->escape($weight_price_data) . "', fix_payment = '" . $this->db->escape($data['fix_payment']) . "', stores='" . json_encode($data['shipping_stores']) . "'");

		$shipping_id = $this->db->getLastId();


		foreach ($data['shipping_description'] as $language_id => $value) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "shippingplus_description SET shipping_id = '" . (int) $shipping_id . "', language_id = '" . (int) $language_id . "', name = '" . $this->db->escape($value['name']) . "', description = '" . $this->db->escape($value['description']) . "'");
		}

		return $shipping_id;
	}

	public function copyShipping($shipping_id)
	{
		$query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "shippingplus s LEFT JOIN " . DB_PREFIX . "shippingplus_description sd ON (s.shipping_id = sd.shipping_id) WHERE s.shipping_id = '" . (int) $shipping_id . "' AND sd.language_id = '" . (int) $this->config->get('config_language_id') . "'");

		if ($query->num_rows) {
			$data = $query->row;

			$data['status'] = '0';
			$data['shipping_description'] = $this->getShippingDescriptions($shipping_id);
			$data['shipping_stores'] = json_decode($data['stores']);

			$this->addShipping($data);
		}
	}

	public function editShipping($shipping_id, $data)
	{
		if (isset($data['shipping_weight_price'])) {
			$weight_price_data = serialize($data['shipping_weight_price']);
		} else {
			$weight_price_data = '';
		}

		if (isset($data['geo_zone_id'])) {
			$geo_zone_id = serialize($data['geo_zone_id']);
		} else {
			$geo_zone_id = '';
		}

		$this->db->query("UPDATE " . DB_PREFIX . "shippingplus SET sort_order = '" . (int) $data['sort_order'] . "', status = '" . (int) $data['status'] . "', zone_status = '" . (int)$data['zone_status'] . "', price_min = '" . (int) $data['price_min'] . "', price_max = '" . (int) $data['price_max'] . "', geo_zones_id = '" . $geo_zone_id . "', cities = '" . $this->db->escape($data['cities']) . "', weight_price = '" . $this->db->escape($weight_price_data) . "', fix_payment = '" . $this->db->escape($data['fix_payment']) . "', stores='" . json_encode($data['shipping_stores']) . "' WHERE shipping_id = '" . (int) $shipping_id . "'");

		$this->db->query("DELETE FROM " . DB_PREFIX . "shippingplus_description WHERE shipping_id = '" . (int) $shipping_id . "'");

		foreach ($data['shipping_description'] as $language_id => $value) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "shippingplus_description SET shipping_id = '" . (int) $shipping_id . "', language_id = '" . (int) $language_id . "', name = '" . $this->db->escape($value['name']) . "', description = '" . $this->db->escape($value['description']) . "'");
		}
	}

	public function deleteShipping($shipping_id)
	{
		$this->db->query("DELETE FROM " . DB_PREFIX . "shippingplus WHERE shipping_id = '" . (int) $shipping_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "shippingplus_description WHERE shipping_id = '" . (int) $shipping_id . "'");
	}

	public function getShipping($shipping_id)
	{
		$query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "shippingplus WHERE shipping_id = '" . (int) $shipping_id . "'");

		return $query->row;
	}

	public function getShippings($data = array())
	{
		$sql = "SELECT s.shipping_id AS shipping_id, sd.name AS name, s.sort_order, s.status, s.zone_status FROM " . DB_PREFIX . "shippingplus s LEFT JOIN " . DB_PREFIX . "shippingplus_description sd ON (s.shipping_id = sd.shipping_id) WHERE sd.language_id = '" . (int) $this->config->get('config_language_id') . "'";

		$sort_data = array(
			'name',
			'sort_order'
		);

		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];
		} else {
			$sql .= " ORDER BY sort_order";
		}

		if (isset($data['order']) && ($data['order'] == 'DESC')) {
			$sql .= " DESC";
		} else {
			$sql .= " ASC";
		}

		if (isset($data['start']) || isset($data['limit'])) {
			if ($data['start'] < 0) {
				$data['start'] = 0;
			}

			if ($data['limit'] < 1) {
				$data['limit'] = 20;
			}

			$sql .= " LIMIT " . (int) $data['start'] . "," . (int) $data['limit'];
		}

		$query = $this->db->query($sql);

		$shipping_data = array();
		foreach ($query->rows as $row) {
			$shipping_data[$row['shipping_id']] = $row;
		}

		return $shipping_data;
	}

	public function getShippingDescriptions($shipping_id)
	{
		$shipping_description_data = array();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "shippingplus_description WHERE shipping_id = '" . (int) $shipping_id . "'");

		foreach ($query->rows as $result) {
			$shipping_description_data[$result['language_id']] = array(
				'name' => $result['name'],
				'description' => $result['description']
			);
		}

		return $shipping_description_data;
	}

	public function getTotalShippings()
	{
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "shippingplus");

		return $query->row['total'];
	}

	public function getAllShippings()
	{
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "shippingplus s LEFT JOIN " . DB_PREFIX . "shippingplus_description sd ON (s.shipping_id = sd.shipping_id) WHERE sd.language_id = '" . (int) $this->config->get('config_language_id') . "' ORDER BY s.sort_order, sd.name");

		$shipping_data = array();
		foreach ($query->rows as $row) {
			$shipping_data[$row['shipping_id']] = $row;
		}

		return $shipping_data;
	}

	

	public function getZones($data = array())
	{		$sql = "SELECT * FROM " . DB_PREFIX . "shippingplus_zones ";

		$sort_data = array(
			'zone',
			'weight'
		);

		if (isset($data['weight']) && in_array($data['weight'], $sort_data)) {
			$sql .= " ORDER BY " . $data['weight'];
		} else {
			$sql .= " ORDER BY weight";
		}

		if (isset($data['order']) && ($data['order'] == 'DESC')) {
			$sql .= " DESC";
		} else {
			$sql .= " ASC";
		}

		if (isset($data['start']) || isset($data['limit'])) {
			if ($data['start'] < 0) {
				$data['start'] = 0;
			}

			if ($data['limit'] < 1) {
				$data['limit'] = 20;
			}

			$sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
		}

		$query = $this->db->query($sql);

		$zone_data = array();
		foreach($query->rows as $row) {
			$zone_data[$row['zone_id']] = $row;
		}

		return $zone_data;
	}

	public function getTotalZones()
	{		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "shippingplus_zones");
		return $query->row['total'];
	}

	public function addZone($data)
	{		$this->db->query("INSERT INTO " . DB_PREFIX . "shippingplus_zones SET `zone` = '" . (int)$data['zone'] . "', weight = '" . (float)$data['weight'] . "', price = '" . (float)$data['price'] . "'");
		$zone_id = $this->db->getLastId();
		return $zone_id;
	}

	public function editZone($zone_id, $data)
	{		$this->db->query("UPDATE " . DB_PREFIX . "shippingplus_zones SET zone = '" . (int)$data['zone'] . "', weight = '" . (float)$data['weight'] . "', price = '" . (float)$data['price'] . "' WHERE `zone_id` = " . (int)$zone_id . " ");
	}

	public function deleteZone($zone_id)
	{		$this->db->query("DELETE FROM " . DB_PREFIX . "shippingplus_zones WHERE zone_id = '" . (int)$zone_id . "'");

	}

	public function getZone($zone_id)
	{		$query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "shippingplus_zones WHERE zone_id = '" . (int)$zone_id . "'");

		return $query->row;
	}

}
