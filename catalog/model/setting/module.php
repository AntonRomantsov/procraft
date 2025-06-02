<?php
class ModelSettingModule extends Model {
	public function getModule($module_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "module WHERE module_id = '" . (int)$module_id . "'");
		
		if ($query->row) {
			return array_merge(['module_id' => $module_id], json_decode($query->row['setting'], true));
		} else {
			return array();	
		}
	}		
}