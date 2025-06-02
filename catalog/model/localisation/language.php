<?php
class ModelLocalisationLanguage extends Model {
	public function getLanguage($language_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "language WHERE language_id = '" . (int)$language_id . "'");

		return $query->row;
	}

	public function getLanguages() {
		$language_data = $this->cache->get('catalog.language');

		if (!$language_data) {
			$language_data = array();

			$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "language WHERE status = '1' ORDER BY sort_order, name");

			foreach ($query->rows as $result) {
				$language_data[$result['code']] = array(
					'language_id' => $result['language_id'],
					'name'        => $result['name'],
					'code'        => $result['code'],
					'locale'      => $result['locale'],
					'image'       => $result['image'],
					'directory'   => $result['directory'],
					'sort_order'  => $result['sort_order'],
					'status'      => $result['status']
				);
			}

			$this->cache->set('catalog.language', $language_data);
		}

		return $language_data;
	}

	public function getCodes(){
		$langcode_data = $this->cache->get('langcode');

		if (!$langcode_data) {
			$langcode_data = array();

			$query = $this->db->query("SELECT code FROM " . DB_PREFIX . "language ORDER BY sort_order, name");

			foreach ($query->rows as $result) {
				$langcode_data[] = substr($result['code'], 3, 2);
			}

			$this->cache->set('language', $langcode_data);
		}

		return $langcode_data;
	}

	public function getLanguageIdByCode($code){
		$query = $this->db->query("SELECT language_id FROM " . DB_PREFIX . "language WHERE code = '" . $this->db->escape($code) . "' AND status = 1");
		return $query->row['language_id'];
	}
}