<?php
class ModelLocalisationLocation extends Model {
	public function getLocation($location_id) {
		$query = $this->db->query("SELECT location_id, name, address, geocode, telephone, fax, image, open, comment FROM " . DB_PREFIX . "location WHERE location_id = '" . (int)$location_id . "'");

		return $query->row;
	}

	public function getLocations($service = false) {
		$query = $this->db->query("SELECT location_id, name, city, address, geocode, telephone, fax, image, open, comment FROM " . DB_PREFIX . "location WHERE service = '" . (int)$service ."'");

		return $query->rows;
	}
}