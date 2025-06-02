<?php
class ModelCatalogSpecFilter extends Model {
	public function getCategoryFilters($category_id){
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "spec_filter sf LEFT JOIN " . DB_PREFIX . "spec_filter_to_category sf2c ON (sf.spec_filter_id = sf2c.spec_filter_id) LEFT JOIN " . DB_PREFIX . "spec_filter_description sfd ON (sf.spec_filter_id = sfd.spec_filter_id) WHERE sf2c.category_id = " . (int)$category_id . " AND sfd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND sf.status = 1 ORDER BY sf.sort_order");
		return $query->rows;
	}

	public function getSpecFilter($spec_filter_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "spec_filter c LEFT JOIN " . DB_PREFIX . "spec_filter_description cd1 ON (c.spec_filter_id = cd1.spec_filter_id) WHERE c.spec_filter_id = '" . (int)$spec_filter_id . "' AND cd1.language_id = '" . (int)$this->config->get('config_language_id') . "'");
		
		return $query->row;
	}
}