<?php
class ModelExtensionModuleGiftor extends Model {

	public function install() {

		$query = $this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "cart` LIKE 'gift'");
		if (!$query->num_rows) {
			$this->db->query("ALTER TABLE `" . DB_PREFIX . "cart` ADD COLUMN gift tinyint(1) NOT NULL DEFAULT 0;");
		}

		$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "giftor` (
			`gift_id` INT(11) NOT NULL AUTO_INCREMENT,
			`gift_product_id` INT(11) NOT NULL,
			`based` INT(1) NOT NULL,
			`condition` INT(1) NOT NULL,
			`min_total` INT(11) NOT NULL DEFAULT '0',
			`max_total` INT(11) NOT NULL DEFAULT '0',
			`date_start` date NOT NULL DEFAULT '0000-00-00',
  			`date_end` date NOT NULL DEFAULT '0000-00-00',
			`customer_group` varchar(255) NOT NULL,
			`status` INT(1) NOT NULL DEFAULT '1',
			PRIMARY KEY (`gift_id`)
		) COLLATE='UTF8_GENERAL_CI'	ENGINE=MyISAM;");

		$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "giftor_to_category` (
			`gift_id` INT(11) NOT NULL,
			`category_id` INT(11) NOT NULL
		) COLLATE='UTF8_GENERAL_CI'	ENGINE=MyISAM;");

		$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "giftor_to_manufacturer` (
			`gift_id` INT(11) NOT NULL,
			`manufacturer_id` INT(11) NOT NULL
		) COLLATE='UTF8_GENERAL_CI'	ENGINE=MyISAM;");

		$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "giftor_to_product` (
			`gift_id` INT(11) NOT NULL,
			`product_id` INT(11) NOT NULL
		) COLLATE='UTF8_GENERAL_CI'	ENGINE=MyISAM;");
	}

	public function uninstall() {
		$this->db->query("DROP TABLE `" . DB_PREFIX . "giftor`;");
		$this->db->query("DROP TABLE `" . DB_PREFIX . "giftor_to_category`;");
		$this->db->query("DROP TABLE `" . DB_PREFIX . "giftor_to_manufacturer`;");
		$this->db->query("DROP TABLE `" . DB_PREFIX . "giftor_to_product`;");
	}

	public function addGift($data) {

		$this->db->query("INSERT INTO " . DB_PREFIX . "giftor SET gift_product_id = '" . (int)$data['product_id'] . "', based = '" . (int)$data['based'] . "', `condition` = '0', min_total = '" . (int)$data['min_total'] . "', max_total = '" . (int)$data['max_total'] . "', date_start = '" . $data['date_start'] . "', date_end = '" . $data['date_end'] . "', customer_group = '" . json_encode($data['customer_group']) . "', status = '" . (int)$data['status'] . "'");

		$gift_id = $this->db->getLastId();

		if ($data['based']==1 && !empty($data['product'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "giftor SET `condition` = '" . (int)$data['condition1'] . "' WHERE gift_id = '" . (int)$gift_id . "'");
			foreach ($data['product'] as $product_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "giftor_to_product SET gift_id = '" . (int)$gift_id . "', product_id = '" . (int)$product_id . "'");
			}
		}

		if ($data['based']==2 && !empty($data['category'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "giftor SET `condition` = '" . (int)$data['condition2'] . "' WHERE gift_id = '" . (int)$gift_id . "'");
			foreach ($data['category'] as $category_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "giftor_to_category SET gift_id = '" . (int)$gift_id . "', category_id = '" . (int)$category_id . "'");
			}
		}

		if ($data['based']==3 && !empty($data['manufacturer'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "giftor SET `condition` = '" . (int)$data['condition3'] . "' WHERE gift_id = '" . (int)$gift_id . "'");
			foreach ($data['manufacturer'] as $manufacturer_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "giftor_to_manufacturer SET gift_id = '" . (int)$gift_id . "', manufacturer_id = '" . (int)$manufacturer_id . "'");
			}
		}

		return $gift_id;
	}

	public function editGift($gift_id, $data) {

		$this->db->query("UPDATE " . DB_PREFIX . "giftor SET gift_product_id = '" . (int)$data['product_id'] . "', based = '" . (int)$data['based'] . "', `condition` = '0', min_total = '" . (int)$data['min_total'] . "', max_total = '" . (int)$data['max_total'] . "', date_start = '" . $data['date_start'] . "', date_end = '" . $data['date_end'] . "', customer_group = '" . json_encode($data['customer_group']) . "', status = '" . (int)$data['status'] . "' WHERE gift_id = '" . (int)$gift_id . "'");

		$this->db->query("DELETE FROM " . DB_PREFIX . "giftor_to_product WHERE gift_id = '" . (int)$gift_id . "'");

		if ($data['based']==1 && !empty($data['product'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "giftor SET `condition` = '" . (int)$data['condition1'] . "' WHERE gift_id = '" . (int)$gift_id . "'");
			foreach ($data['product'] as $product_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "giftor_to_product SET gift_id = '" . (int)$gift_id . "', product_id = '" . $product_id . "'");
			}
		}

		$this->db->query("DELETE FROM " . DB_PREFIX . "giftor_to_category WHERE gift_id = '" . (int)$gift_id . "'");
		
		if ($data['based']==2 && !empty($data['category'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "giftor SET `condition` = '" . (int)$data['condition2'] . "' WHERE gift_id = '" . (int)$gift_id . "'");
			foreach ($data['category'] as $category_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "giftor_to_category SET gift_id = '" . (int)$gift_id . "', category_id = '" . $category_id . "'");
			}
		}

		$this->db->query("DELETE FROM " . DB_PREFIX . "giftor_to_manufacturer WHERE gift_id = '" . (int)$gift_id . "'");

		if ($data['based']==3 && !empty($data['manufacturer'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "giftor SET `condition` = '" . (int)$data['condition3'] . "' WHERE gift_id = '" . (int)$gift_id . "'");
			foreach ($data['manufacturer'] as $manufacturer_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "giftor_to_manufacturer SET gift_id = '" . (int)$gift_id . "', manufacturer_id = '" . $manufacturer_id . "'");
			}
		}

	}

	public function deleteGift($gift_id) {

		$this->db->query("DELETE FROM " . DB_PREFIX . "giftor WHERE gift_id = '" . (int)$gift_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "giftor_to_category WHERE gift_id = '" . (int)$gift_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "giftor_to_manufacturer WHERE gift_id = '" . (int)$gift_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "giftor_to_product WHERE gift_id = '" . (int)$gift_id . "'");

	}

	public function getGift($gift_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "giftor 
			 	WHERE gift_id = '" . (int)$gift_id . "'");

		return $query->row;
	}

	public function getGifts($data = array()) {
		$sql = "SELECT * FROM " . DB_PREFIX . "giftor GROUP BY gift_id ORDER BY gift_id";

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


	public function getTotalGifts($data = array()) {
		$sql = "SELECT COUNT(DISTINCT gift_id) AS total FROM " . DB_PREFIX . "giftor";

		$query = $this->db->query($sql);

		return $query->row['total'];
	}

	public function getGiftProducts($gift_id) {
		$gift_products = array();

		$query = $this->db->query("SELECT product_id FROM " . DB_PREFIX . "giftor_to_product WHERE gift_id = " . (int)$gift_id);

		foreach ($query->rows as $result) {
			$gift_products[] = $result['product_id'];
		}

		return $gift_products;
	}

	public function getGiftCategories($gift_id) {
		$gift_categories = array();

		$query = $this->db->query("SELECT category_id FROM " . DB_PREFIX . "giftor_to_category WHERE gift_id = " . (int)$gift_id);

		foreach ($query->rows as $result) {
			$gift_categories[] = $result['category_id'];
		}

		return $gift_categories;
	}

	public function getGiftManufacturers($gift_id) {
		$gift_manufacturers = array();

		$query = $this->db->query("SELECT manufacturer_id FROM " . DB_PREFIX . "giftor_to_manufacturer WHERE gift_id = " . (int)$gift_id);

		foreach ($query->rows as $result) {
			$gift_manufacturers[] = $result['manufacturer_id'];
		}

		return $gift_manufacturers;
	}

	public function getProductGiftsIds($product_id) {
		$query = $this->db->query("SELECT g.gift_id FROM " . DB_PREFIX . "giftor_to_product gp LEFT JOIN " . DB_PREFIX . "giftor g ON g.gift_id = gp.gift_id WHERE gp.product_id = '" . (int)$product_id . "' AND g.based = '1' AND g.`condition` = '0' AND g.min_total = '0' AND g.max_total = '0' AND g.date_start = '0000-00-00' AND g.date_end = '0000-00-00' AND g.customer_group = '" . json_encode(array("0")) . "' AND g.status = '1' AND NOT EXISTS (SELECT * FROM " . DB_PREFIX . "giftor_to_product gp2 WHERE g.gift_id = gp2.gift_id AND gp2.product_id <> '" . (int)$product_id . "')");
		
		return $query->rows;
	}

	public function getGiftsByProduct($product_id) {
		$query = $this->db->query("SELECT g.gift_product_id as product_id FROM " . DB_PREFIX . "giftor g LEFT JOIN " . DB_PREFIX . "giftor_to_product gp ON gp.gift_id = g.gift_id WHERE gp.product_id = '" . (int)$product_id . "' AND g.based = '1' AND g.`condition` = '0' AND g.min_total = '0' AND g.max_total = '0' AND g.date_start = '0000-00-00' AND g.date_end = '0000-00-00' AND g.customer_group = '" . json_encode(array("0")) . "' AND g.status = '1' AND NOT EXISTS (SELECT * FROM " . DB_PREFIX . "giftor_to_product gp2 WHERE g.gift_id = gp2.gift_id AND gp2.product_id <> '" . (int)$product_id . "')");

		return $query->rows;
	}
}