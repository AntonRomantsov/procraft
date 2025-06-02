<?php
class ModelExtensionModuleGiftor extends Model {

	public function getGiftsByProduct($product_id) {
		$gifts = array();
		$results = array();

		$customer_group_id = $this->customer->getGroupId() ? $this->customer->getGroupId() : '0';

		$fields = 'g.gift_product_id, g.min_total, g.max_total, g.date_start, g.date_end';
		
		$add_where = " AND g.status = '1' AND ((g.date_start = '0000-00-00' OR g.date_start <= NOW()) AND (g.date_end = '0000-00-00' OR g.date_end >= NOW())) AND JSON_SEARCH(g.customer_group, 'one', '" . $customer_group_id . "') IS NOT NULL";

		// Product
		$sql = "SELECT " . $fields . " FROM " . DB_PREFIX . "giftor_to_product gp LEFT JOIN " . DB_PREFIX . "giftor g ON (g.gift_id = gp.gift_id) WHERE gp.product_id = '" . (int)$product_id . "' AND g.based = '1'" . $add_where;
		$query = $this->db->query($sql);

		if ($query->num_rows) {
			$results = array_merge($results, $query->rows);
		}

		// Categories
		$categories = array();
		$category_query = $this->db->query("SELECT category_id FROM " . DB_PREFIX . "product_to_category WHERE product_id = '" . (int)$product_id . "'");
		if ($category_query->num_rows) {
			foreach ($category_query->rows as $row) {
				$categories[] = $row['category_id'];
			}
		
			if (!empty($categories)) {
				$sql_categories = "SELECT " . $fields . " FROM " . DB_PREFIX . "giftor_to_category gc LEFT JOIN " . DB_PREFIX . "giftor g ON (g.gift_id = gc.gift_id) WHERE gc.category_id IN ('" . implode("','", $categories) . "') AND g.based = '2'" . $add_where;
				$query_categories = $this->db->query($sql_categories);

				if ($query_categories->num_rows) {
					$results = array_merge($results, $query_categories->rows);
				}
			}
		}


		// Manufacturer
		$manufacturer_query = $this->db->query("SELECT manufacturer_id FROM " . DB_PREFIX . "product WHERE product_id = '" . (int)$product_id . "'");
		if ($manufacturer_query->num_rows) {
			$manufacturer_id = $manufacturer_query->row['manufacturer_id'];
		} else {
			$manufacturer_id = 0;
		}

		if ($manufacturer_id) {
			$sql_manufacturer = "SELECT " . $fields . " FROM " . DB_PREFIX . "giftor_to_manufacturer gm LEFT JOIN " . DB_PREFIX . "giftor g ON (g.gift_id = gm.gift_id) WHERE gm.manufacturer_id = '" . (int)$manufacturer_id . "' AND g.based = '3'" . $add_where;
			$query_manufacturer = $this->db->query($sql_manufacturer);

			if ($query_manufacturer->num_rows) {
				$results = array_merge($results, $query_manufacturer->rows);
			}
		}


		foreach ($results as $result) {
			$quantity = $this->db->query("SELECT quantity FROM " . DB_PREFIX . "product WHERE product_id = '" . (int)$result['gift_product_id'] . "' AND status = '1' AND quantity > 0");
			if ($quantity->num_rows) {
				$gifts[] = array(
					'product_id' => $result['gift_product_id'],
					'min_total' => $result['min_total'],
					'max_total' => $result['max_total'],
					'date_start' => $result['date_start'],
					'date_end' => $result['date_end']
				);
			}
		}

		return $gifts;
	}

}