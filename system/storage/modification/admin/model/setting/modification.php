<?php
class ModelSettingModification extends Model {
	public function addModification($data) {
		$this->db->query("INSERT INTO `" . DB_PREFIX . "modification` SET `extension_install_id` = '" . (int)$data['extension_install_id'] . "', `name` = '" . $this->db->escape($data['name']) . "', `code` = '" . $this->db->escape($data['code']) . "', `author` = '" . $this->db->escape($data['author']) . "', `version` = '" . $this->db->escape($data['version']) . "', `link` = '" . $this->db->escape($data['link']) . "', `xml` = '" . $this->db->escape($data['xml']) . "', `status` = '" . (int)$data['status'] . "', `date_added` = NOW()");

//ExecutionOrder
		$mod_id = $this->db->getLastId();
		$this->db->query("INSERT INTO `" . DB_PREFIX . "modification_order` SET `modification_id` = '" . (int)$mod_id . "', `extension_install_id` = '" . (int)$data['extension_install_id'] . "', `sort_order` = '0' ");
//ExecutionOrder
			
	}

	public function deleteModification($modification_id) {

//ExecutionOrder
		$this->db->query("DELETE FROM `" . DB_PREFIX . "modification_order` WHERE modification_id = '" . (int)$modification_id . "'");
//ExecutionOrder
			
		$this->db->query("DELETE FROM `" . DB_PREFIX . "modification` WHERE `modification_id` = '" . (int)$modification_id . "'");
	}

	public function deleteModificationsByExtensionInstallId($extension_install_id) {

//ExecutionOrder
		$this->db->query("DELETE FROM `" . DB_PREFIX . "modification_order` WHERE `extension_install_id` = '" . (int)$extension_install_id . "'");
//ExecutionOrder
			
		$this->db->query("DELETE FROM `" . DB_PREFIX . "modification` WHERE `extension_install_id` = '" . (int)$extension_install_id . "'");
	}
	
	public function enableModification($modification_id) {
		$this->db->query("UPDATE `" . DB_PREFIX . "modification` SET `status` = '1' WHERE `modification_id` = '" . (int)$modification_id . "'");
	}

	public function disableModification($modification_id) {
		$this->db->query("UPDATE `" . DB_PREFIX . "modification` SET `status` = '0' WHERE `modification_id` = '" . (int)$modification_id . "'");
	}


//ExecutionOrder
	public function UpdateSorder($modification_id, $sort_order) {
		$this->db->query("UPDATE `" . DB_PREFIX . "modification_order` SET `sort_order` = '" . (int)$sort_order . "' WHERE modification_id = '" . (int)$modification_id . "'");
	}
//ExecutionOrder
			
	public function getModification($modification_id) {
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "modification` WHERE `modification_id` = '" . (int)$modification_id . "'");

		return $query->row;
	}

	public function getModifications($data = array()) {

//ExecutionOrder
			$sql = "CREATE TABLE IF NOT EXISTS `" . DB_PREFIX ."modification_order` ( `modification_id` int(11) NOT NULL, `extension_install_id` int(11) NOT NULL, `sort_order` int(11) NOT NULL, PRIMARY KEY (`modification_id`) ) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";

			$query = $this->db->query( $sql);

			$qu = $this->db->query("DESCRIBE " . DB_PREFIX . "modification_order `sort_order`");
			if ($qu->num_rows == 0) {
				$sqladd = $this->db->query("ALTER TABLE `" . DB_PREFIX ."modification_order` ADD `sort_order` int(11) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL AFTER `modification_id`");
			}

			$this->db->query("INSERT IGNORE INTO `" . DB_PREFIX ."modification_order` (`modification_id`, `extension_install_id`) SELECT `modification_id`, `extension_install_id` FROM " . DB_PREFIX ."modification");
//ExecutionOrder
			
		$sql = "SELECT * FROM `" . DB_PREFIX . "modification`";

//ExecutionOrder
		$sql .= " as m LEFT JOIN `" . DB_PREFIX . "modification_order` mo ON (m.modification_id = mo.modification_id)";
//ExecutionOrder
			

		$sort_data = array(
			'name',
			'author',

//ExecutionOrder
			'sort_order',
//ExecutionOrder
			
			'version',
			'status',
			'date_added'
		);

		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];
		} else {
			$sql .= " ORDER BY name";
		}

		if (isset($data['order']) && ($data['order'] == 'DESC')) {
			$sql .= " DESC";
		} else {
			$sql .= " ASC";
		}


//ExecutionOrder
		if (isset($data['sort'])&&($data['sort'] == 'sort_order')) {
			$sql .= " , name " ;
			$sql .= isset($data['order'])&&($data['order'] == 'DESC') ? " ASC" : "DESC" ;
		}
//ExecutionOrder
			
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

	public function getTotalModifications() {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM `" . DB_PREFIX . "modification`");

		return $query->row['total'];
	}
	
	public function getModificationByCode($code) {
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "modification` WHERE `code` = '" . $this->db->escape($code) . "'");

		return $query->row;
	}	
}