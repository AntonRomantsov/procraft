<?php

require_once( DIR_SYSTEM . "/engine/neoseo_model.php");

class ModelToolNeoSeoPaymentPlus extends NeoSeoModel
{

	public function __construct($registry)
	{
		parent::__construct($registry);
		$this->_moduleSysName = "neoseo_paymentplus";
				$this->_modulePostfix = ""; // Постфикс для разных типов модуля, поэтому переходим на испольлзование $this->_moduleSysName()
		$this->_logFile = $this->_moduleSysName() . '.log';
		$this->debug = $this->config->get($this->_moduleSysName() . '_debug') == 1;

		
	}

	public function addPayment($data)
	{
		$this->db->query("INSERT INTO " . DB_PREFIX . "paymentplus SET sort_order = '" . (int) $data['sort_order'] . "', status = '" . (int) $data['status'] . "', price_min = '" . (int) $data['price_min'] . "', price_max = '" . (int) $data['price_max'] . "', geo_zone_id = '" . (int) $data['geo_zone_id'] . "', order_status_id = '" . (int) $data['order_status_id'] . "', cities = '" . $this->db->escape($data['cities']) . "', stores='" . $this->db->escape(json_encode($data['payment_stores'])) . "'");

		$payment_id = $this->db->getLastId();

		foreach ($data['payment_description'] as $language_id => $value) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "paymentplus_description SET payment_id = '" . (int) $payment_id . "', language_id = '" . (int) $language_id . "', name = '" . $this->db->escape($value['name']) . "', description = '" . $this->db->escape($value['description']) . "'");
		}

		return $payment_id;
	}

	public function copyPayment($payment_id)
	{
		$query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "paymentplus s LEFT JOIN " . DB_PREFIX . "paymentplus_description sd ON (s.payment_id = sd.payment_id) WHERE s.payment_id = '" . (int) $payment_id . "' AND sd.language_id = '" . (int) $this->config->get('config_language_id') . "'");

		if ($query->num_rows) {
			$data = $query->row;

			$data['status'] = '0';
			$data['payment_description'] = $this->getPaymentDescriptions($payment_id);
			$data['payment_stores'] = json_decode($data['stores']);

			$this->addPayment($data);
		}
	}

	public function editPayment($payment_id, $data)
	{
		$this->db->query("UPDATE " . DB_PREFIX . "paymentplus SET sort_order = '" . (int) $data['sort_order'] . "', status = '" . (int) $data['status'] . "', price_min = '" . (int) $data['price_min'] . "', price_max = '" . (int) $data['price_max'] . "', geo_zone_id = '" . (int) $data['geo_zone_id'] . "', order_status_id = '" . (int) $data['order_status_id'] . "', cities = '" . $this->db->escape($data['cities']) . "', stores='" . $this->db->escape(json_encode($data['payment_stores'])) . "' WHERE payment_id = '" . (int) $payment_id . "'");

		$this->db->query("DELETE FROM " . DB_PREFIX . "paymentplus_description WHERE payment_id = '" . (int) $payment_id . "'");

		foreach ($data['payment_description'] as $language_id => $value) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "paymentplus_description SET payment_id = '" . (int) $payment_id . "', language_id = '" . (int) $language_id . "', name = '" . $this->db->escape($value['name']) . "', description = '" . $this->db->escape($value['description']) . "'");
		}
	}

	public function deletePayment($payment_id)
	{
		$this->db->query("DELETE FROM " . DB_PREFIX . "paymentplus WHERE payment_id = '" . (int) $payment_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "paymentplus_description WHERE payment_id = '" . (int) $payment_id . "'");
	}

	public function getPayment($payment_id)
	{
		$query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "paymentplus WHERE payment_id = '" . (int) $payment_id . "'");

		return $query->row;
	}

	public function getPayments($data = array())
	{
		$sql = "SELECT s.payment_id AS payment_id, sd.name AS name, s.sort_order, s.status FROM " . DB_PREFIX . "paymentplus s LEFT JOIN " . DB_PREFIX . "paymentplus_description sd ON (s.payment_id = sd.payment_id) WHERE sd.language_id = '" . (int) $this->config->get('config_language_id') . "'";

		$sort_data = array(
			'name',
			'sort_order'
		);

		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $this->db->escape($data['sort']);
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

		return $query->rows;
	}

	public function getPaymentDescriptions($payment_id)
	{
		$payment_description_data = array();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "paymentplus_description WHERE payment_id = '" . (int) $payment_id . "'");

		foreach ($query->rows as $result) {
			$payment_description_data[$result['language_id']] = array(
				'name' => $result['name'],
				'description' => $result['description']
			);
		}

		return $payment_description_data;
	}

	public function getTotalPayments()
	{
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "paymentplus");

		return $query->row['total'];
	}

	public function getAllPayments()
	{
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "paymentplus s LEFT JOIN " . DB_PREFIX . "paymentplus_description sd ON (s.payment_id = sd.payment_id) WHERE sd.language_id = '" . (int) $this->config->get('config_language_id') . "' ORDER BY s.sort_order, sd.name");

		$payment_data = array();
		foreach ($query->rows as $row) {
			$payment_data[$row['payment_id']] = $row;
		}

		return $payment_data;
	}

	

}
