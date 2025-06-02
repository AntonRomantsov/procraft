<?php
class ModelCatalogGaranty extends Model {
	public function addGaranty($data) {
		$this->db->query("INSERT INTO " . DB_PREFIX . "garanty SET name = '" . $this->db->escape($data['name']) . "', type = '" . $this->db->escape($data['type']) . "', period = '" . $this->db->escape($data['period']) . "'");

		$garanty_id = $this->db->getLastId();

		foreach ($data['garanty_description'] as $language_id => $value) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "garanty_description SET garanty_id = '" . (int)$garanty_id . "', language_id = '" . (int)$language_id . "', description = '" . $this->db->escape($value['description']) . "'");
		}

		return $garanty_id;
	}

	public function editGaranty($garanty_id, $data) {
		$this->db->query("UPDATE " . DB_PREFIX . "garanty SET name = '" . $this->db->escape($data['name']) . "', type = '" . $this->db->escape($data['type']) . "', period = '" . $this->db->escape($data['period']) . "' WHERE garanty_id = '" . (int)$garanty_id . "'");

		$this->db->query("DELETE FROM " . DB_PREFIX . "garanty_description WHERE garanty_id = '" . (int)$garanty_id . "'");

		foreach ($data['garanty_description'] as $language_id => $value) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "garanty_description SET garanty_id = '" . (int)$garanty_id . "', language_id = '" . (int)$language_id . "', description = '" . $this->db->escape($value['description']) . "'");
		}
	}

	public function deleteGaranty($garanty_id) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "garanty WHERE garanty_id = '" . (int)$garanty_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "garanty_description WHERE garanty_id = '" . (int)$garanty_id . "'");
	}

	// public function getAttribute($attribute_id) {
	// 	$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "attribute a LEFT JOIN " . DB_PREFIX . "attribute_description ad ON (a.attribute_id = ad.attribute_id) WHERE a.attribute_id = '" . (int)$attribute_id . "' AND ad.language_id = '" . (int)$this->config->get('config_language_id') . "'");

	// 	return $query->row;
	// }

	public function getGaranty($garanty_id) {
		$query = $this->db->query("SELECT g.*, gd.* FROM " . DB_PREFIX . "garanty g LEFT JOIN " . DB_PREFIX . "garanty_description gd ON (g.garanty_id = gd.garanty_id) WHERE g.garanty_id = '" . (int)$garanty_id . "' AND gd.language_id = '" . (int)$this->config->get('config_language_id') . "'");

		return $query->row;
	}

	public function getGaranties($data = array()) {
		// $sql = "SELECT *, (SELECT agd.name FROM " . DB_PREFIX . "attribute_group_description agd WHERE agd.attribute_group_id = a.attribute_group_id AND agd.language_id = '" . (int)$this->config->get('config_language_id') . "') AS attribute_group FROM " . DB_PREFIX . "attribute a LEFT JOIN " . DB_PREFIX . "attribute_description ad ON (a.attribute_id = ad.attribute_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "'";

		$sql = "SELECT * FROM " . DB_PREFIX . "garanty g LEFT JOIN " . DB_PREFIX . "garanty_description gd ON (g.garanty_id = gd.garanty_id) WHERE gd.language_id = '" . (int)$this->config->get('config_language_id') . "'";


		if (!empty($data['filter_name'])) {
			$sql .= " AND g.name LIKE '" . $this->db->escape($data['filter_name']) . "%'";
		}

		$sort_data = array(
			'g.name',
		);

		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];
		} else {
			$sql .= " ORDER BY g.name";
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

		return $query->rows;
	}

	public function getGarantyDescriptions($garanty_id) {
		$garanty_data = array();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "garanty_description WHERE garanty_id = '" . (int)$garanty_id . "'");

		foreach ($query->rows as $result) {
			$garanty_data[$result['language_id']] = array('description' => $result['description']);
		}

		return $garanty_data;
	}

	public function getAttributesByAttributeGroupId($data = array()) {
		$sql = "SELECT *, (SELECT agd.name FROM " . DB_PREFIX . "attribute_group_description agd WHERE agd.attribute_group_id = a.attribute_group_id AND agd.language_id = '" . (int)$this->config->get('config_language_id') . "') AS attribute_group FROM " . DB_PREFIX . "attribute a LEFT JOIN " . DB_PREFIX . "attribute_description ad ON (a.attribute_id = ad.attribute_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "'";

		if (!empty($data['filter_name'])) {
			$sql .= " AND ad.name LIKE '" . $this->db->escape($data['filter_name']) . "%'";
		}

		if (!empty($data['filter_attribute_group_id'])) {
			$sql .= " AND a.attribute_group_id = '" . $this->db->escape($data['filter_attribute_group_id']) . "'";
		}

		$sort_data = array(
			'ad.name',
			'attribute_group',
			'a.sort_order'
		);

		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];
		} else {
			$sql .= " ORDER BY ad.name";
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

		return $query->rows;
	}

	public function getTotalGaranties() {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "garanty");

		return $query->row['total'];
	}

	public function getTotalAttributesByAttributeGroupId($attribute_group_id) {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "attribute WHERE attribute_group_id = '" . (int)$attribute_group_id . "'");

		return $query->row['total'];
	}
}
