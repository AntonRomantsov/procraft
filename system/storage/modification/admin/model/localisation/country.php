<?php
class ModelLocalisationCountry extends Model {
	public function addCountry($data) {
		
            /* NeoSeo ShippingPlus - begin */
            $this->db->query("INSERT INTO " . DB_PREFIX . "country SET name = '" . $this->db->escape($data['name']) . "', iso_code_2 = '" . $this->db->escape($data['iso_code_2']) . "', iso_code_3 = '" . $this->db->escape($data['iso_code_3']) . "', address_format = '" . $this->db->escape($data['address_format']) . "', postcode_required = '" . (int)$data['postcode_required'] . "', status = '" . (int)$data['status'] . "', shippingplus_zone = '" . (int)$data['shippingplus_zone'] . "' ");
            /* NeoSeo ShippingPlus - end */
            
		/* NeoSeo Checkout - begin */
		$country_id = $this->db->getLastId();
		foreach ($data['names'] as $language_id => $name) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "country_description SET country_id = '" . $country_id . "',name = '" . $this->db->escape($name) . "', iso_code_2 = '" . $this->db->escape($data['iso_code_2']) . "', iso_code_3 = '" . $this->db->escape($data['iso_code_3']) . "', address_format = '" . $this->db->escape($data['address_format']) . "', postcode_required = '" . (int)$data['postcode_required'] . "', language_id = '" . (int)$language_id . "', status = '" . (int)$data['status'] . "'");
		}
		/* NeoSeo Checkout - end */

		$this->cache->delete('country');
		
		return $this->db->getLastId();
	}

	public function editCountry($country_id, $data) {
		
            /* NeoSeo ShippingPlus - begin */
                $this->db->query("UPDATE " . DB_PREFIX . "country SET name = '" . $this->db->escape($data['name']) . "', iso_code_2 = '" . $this->db->escape($data['iso_code_2']) . "', iso_code_3 = '" . $this->db->escape($data['iso_code_3']) . "', address_format = '" . $this->db->escape($data['address_format']) . "', postcode_required = '" . (int)$data['postcode_required'] . "', status = '" . (int)$data['status'] . "', shippingplus_zone = '" . (int)$data['shippingplus_zone'] . "' WHERE country_id = '" . (int)$country_id . "' ");
             /* NeoSeo ShippingPlus - end */
            
		/* NeoSeo Checkout - begin */
		$this->db->query("DELETE FROM " . DB_PREFIX . "country_description WHERE country_id = '" . (int)$country_id . "'");
		foreach ($data['names'] as $language_id => $name) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "country_description SET country_id = '" . $country_id . "',name = '" . $this->db->escape($name) . "', iso_code_2 = '" . $this->db->escape($data['iso_code_2']) . "', iso_code_3 = '" . $this->db->escape($data['iso_code_3']) . "', address_format = '" . $this->db->escape($data['address_format']) . "', postcode_required = '" . (int)$data['postcode_required'] . "', language_id = '" . (int)$language_id . "', status = '" . (int)$data['status'] . "'");
		}
		/* NeoSeo Checkout - end */

		$this->cache->delete('country');
	}

	public function deleteCountry($country_id) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "country WHERE country_id = '" . (int)$country_id . "'");
		/* NeoSeo Checkout - begin */
		$this->db->query("DELETE FROM " . DB_PREFIX . "country_description WHERE country_id = '" . (int)$country_id . "'");
		/* NeoSeo Checkout - end */

		$this->cache->delete('country');
	}

		/* NeoSeo Checkout - begin */
		public function getCountryDescription($country_id, $language_id) {
			$query = $this->db->query("SELECT name FROM " . DB_PREFIX . "country_description WHERE country_id = '" . (int)$country_id . "' AND language_id = '".(int)$language_id."'");
			return $query->row;
		}
		/* NeoSeo Checkout - end */
	public function getCountry($country_id) {
		$query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "country WHERE country_id = '" . (int)$country_id . "'");

		return $query->row;
	}

	public function getCountries($data = array()) {

            /* NeoSeo ShippingPlus - begin */
            $sql = "SHOW COLUMNS FROM `" . DB_PREFIX . "country` LIKE 'shippingplus_zone'";
		$query = $this->db->query($sql);
		if (!$query->num_rows) {
			$sql = "ALTER TABLE `" . DB_PREFIX . "country` ADD `shippingplus_zone` int(11) DEFAULT NULL";
			$this->db->query($sql);
		}
            /* NeoSeo ShippingPlus - end */
            
		if ($data) {
			$sql = "SELECT * FROM " . DB_PREFIX . "country";

			$sort_data = array(
				'name',
				'iso_code_2',
				'iso_code_3'
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
		} else {
			$country_data = $this->cache->get('country.admin');

			if (!$country_data) {
				$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "country ORDER BY name ASC");

				$country_data = $query->rows;

				$this->cache->set('country.admin', $country_data);
			}

			return $country_data;
		}
	}

	public function getTotalCountries() {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "country");

		return $query->row['total'];
	}
}