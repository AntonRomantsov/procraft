<?php
class ModelCatalogSpecFilter extends Model
{
	public function addSpecFilter($data)
	{
		$this->db->query("INSERT INTO " . DB_PREFIX . "spec_filter SET `top` = '" . (isset($data['top']) ? (int)$data['top'] : 0) . "', `column` = '" . (int)$data['column'] . "', `redirect_category_id` = '" . (int)$data['redirect_category_id'] . "', sort_order = '" . (int)$data['sort_order'] . "', status = '" . (int)$data['status'] . "', date_modified = NOW(), date_added = NOW()");

		$spec_filter_id = $this->db->getLastId();

		if (isset($data['image'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "spec_filter SET image = '" . $this->db->escape($data['image']) . "' WHERE spec_filter_id = '" . (int)$spec_filter_id . "'");
		}

		foreach ($data['spec_filter_description'] as $language_id => $value) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "spec_filter_description SET spec_filter_id = '" . (int)$spec_filter_id . "', language_id = '" . (int)$language_id . "', name = '" . $this->db->escape($value['name']) . "', description = '" . $this->db->escape($value['description']) . "', meta_title = '" . $this->db->escape($value['meta_title']) . "', meta_description = '" . $this->db->escape($value['meta_description']) . "', meta_keyword = '" . $this->db->escape($value['meta_keyword']) . "'");
		}

		// MySQL Hierarchical Data Closure Table Pattern

		if (isset($data['spec_filter_store'])) {
			foreach ($data['spec_filter_store'] as $store_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "spec_filter_to_store SET spec_filter_id = '" . (int)$spec_filter_id . "', store_id = '" . (int)$store_id . "'");
			}
		}

		if (isset($data['spec_filter_seo_url'])) {
			foreach ($data['spec_filter_seo_url'] as $store_id => $language) {
				foreach ($language as $language_id => $keyword) {
					if (!empty($keyword)) {
						$this->db->query("INSERT INTO " . DB_PREFIX . "seo_url SET store_id = '" . (int)$store_id . "', language_id = '" . (int)$language_id . "', query = 'ocf=FV" . (int)$spec_filter_id . "', keyword = '" . $this->db->escape($keyword) . "'");
					} else {
						$keyword = $this->regTranslitIt($data['spec_filter_description'][$language_id]['name']);
						if (empty($keyword)) {
							$keyword = $data['spec_filter_description'][$language_id]['name'];
						}
						$this->db->query("INSERT INTO " . DB_PREFIX . "seo_url SET store_id = '" . (int)$store_id . "', language_id = '" . (int)$language_id . "', query = 'ocf=FV" . (int)$spec_filter_id . "', keyword = '" . $this->db->escape($keyword) . "'");
					}
				}
			}
		}

		// Set which layout to use with this spec_filter
		if (isset($data['spec_filter_layout'])) {
			foreach ($data['spec_filter_layout'] as $store_id => $layout_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "spec_filter_to_layout SET spec_filter_id = '" . (int)$spec_filter_id . "', store_id = '" . (int)$store_id . "', layout_id = '" . (int)$layout_id . "'");
			}
		}

		if (isset($data['spec_filter_category'])) {
			foreach ($data['spec_filter_category'] as $category_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "spec_filter_to_category SET spec_filter_id = '" . (int)$spec_filter_id . "', category_id = '" . (int)$category_id . "'");
			}
		}

		if (isset($data['spec_filter_product'])) {
			foreach ($data['spec_filter_product'] as $product_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "spec_filter_to_product SET spec_filter_id = '" . (int)$spec_filter_id . "', product_id = '" . (int)$product_id . "'");
			}
		}

		$this->cache->delete('spec_filter');
		$this->cache->delete('seo_pro');

		return $spec_filter_id;
	}

	public function editSpecFilter($spec_filter_id, $data)
	{
		$this->db->query("UPDATE " . DB_PREFIX . "spec_filter SET `top` = '" . (isset($data['top']) ? (int)$data['top'] : 0) . "', `column` = '" . (int)$data['column'] . "', `redirect_category_id` = '" . (int)$data['redirect_category_id'] . "', sort_order = '" . (int)$data['sort_order'] . "', status = '" . (int)$data['status'] . "', date_modified = NOW() WHERE spec_filter_id = '" . (int)$spec_filter_id . "'");

		if (isset($data['image'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "spec_filter SET image = '" . $this->db->escape($data['image']) . "' WHERE spec_filter_id = '" . (int)$spec_filter_id . "'");
		}

		$this->db->query("DELETE FROM " . DB_PREFIX . "spec_filter_description WHERE spec_filter_id = '" . (int)$spec_filter_id . "'");

		foreach ($data['spec_filter_description'] as $language_id => $value) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "spec_filter_description SET spec_filter_id = '" . (int)$spec_filter_id . "', language_id = '" . (int)$language_id . "', name = '" . $this->db->escape($value['name']) . "', description = '" . $this->db->escape($value['description']) . "', meta_title = '" . $this->db->escape($value['meta_title']) . "', meta_description = '" . $this->db->escape($value['meta_description']) . "', meta_keyword = '" . $this->db->escape($value['meta_keyword']) . "'");
		}

		if (isset($data['spec_filter_filter'])) {
			foreach ($data['spec_filter_filter'] as $filter_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "spec_filter_filter SET spec_filter_id = '" . (int)$spec_filter_id . "', filter_id = '" . (int)$filter_id . "'");
			}
		}

		$this->db->query("DELETE FROM " . DB_PREFIX . "spec_filter_to_store WHERE spec_filter_id = '" . (int)$spec_filter_id . "'");

		if (isset($data['spec_filter_store'])) {
			foreach ($data['spec_filter_store'] as $store_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "spec_filter_to_store SET spec_filter_id = '" . (int)$spec_filter_id . "', store_id = '" . (int)$store_id . "'");
			}
		}

		// SEO URL
		$this->db->query("DELETE FROM `" . DB_PREFIX . "seo_url` WHERE query = 'ocf=FV" . (int)$spec_filter_id . "'");

		if (isset($data['spec_filter_seo_url'])) {
			foreach ($data['spec_filter_seo_url'] as $store_id => $language) {
				foreach ($language as $language_id => $keyword) {
					if (!empty($keyword)) {
						$this->db->query("INSERT INTO " . DB_PREFIX . "seo_url SET store_id = '" . (int)$store_id . "', language_id = '" . (int)$language_id . "', query = 'ocf=FV" . (int)$spec_filter_id . "', keyword = '" . $this->db->escape($keyword) . "'");
					}else {
						$keyword = $this->regTranslitIt($data['spec_filter_description'][$language_id]['name']);
						if (empty($keyword)) {
							$keyword = $data['spec_filter_description'][$language_id]['name'];
						}
						$this->db->query("INSERT INTO " . DB_PREFIX . "seo_url SET store_id = '" . (int)$store_id . "', language_id = '" . (int)$language_id . "', query = 'ocf=FV" . (int)$spec_filter_id . "', keyword = '" . $this->db->escape($keyword) . "'");
					}
				}
			}
		}

		$this->db->query("DELETE FROM " . DB_PREFIX . "spec_filter_to_layout WHERE spec_filter_id = '" . (int)$spec_filter_id . "'");

		if (isset($data['spec_filter_layout'])) {
			foreach ($data['spec_filter_layout'] as $store_id => $layout_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "spec_filter_to_layout SET spec_filter_id = '" . (int)$spec_filter_id . "', store_id = '" . (int)$store_id . "', layout_id = '" . (int)$layout_id . "'");
			}
		}

		$this->db->query("DELETE FROM " . DB_PREFIX . "spec_filter_to_category WHERE spec_filter_id = '" . (int)$spec_filter_id . "'");

		if (isset($data['spec_filter_category'])) {
			foreach ($data['spec_filter_category'] as $category_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "spec_filter_to_category SET spec_filter_id = '" . (int)$spec_filter_id . "', category_id = '" . (int)$category_id . "'");
			}
		}

		$this->db->query("DELETE FROM " . DB_PREFIX . "spec_filter_to_product WHERE spec_filter_id = '" . (int)$spec_filter_id . "'");

		if (isset($data['spec_filter_product'])) {
			foreach ($data['spec_filter_product'] as $product_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "spec_filter_to_product SET spec_filter_id = '" . (int)$spec_filter_id . "', product_id = '" . (int)$product_id . "'");
			}
		}

		$this->cache->delete('spec_filter');
	}

	public function deleteSpecFilter($spec_filter_id)
	{

		$this->db->query("DELETE FROM " . DB_PREFIX . "spec_filter WHERE spec_filter_id = '" . (int)$spec_filter_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "spec_filter_description WHERE spec_filter_id = '" . (int)$spec_filter_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "spec_filter_to_store WHERE spec_filter_id = '" . (int)$spec_filter_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "spec_filter_to_layout WHERE spec_filter_id = '" . (int)$spec_filter_id . "'");
		//$this->db->query("DELETE FROM " . DB_PREFIX . "product_to_spec_filter WHERE spec_filter_id = '" . (int)$spec_filter_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "seo_url WHERE query = 'ocf=FV" . (int)$spec_filter_id . "'");
		//$this->db->query("DELETE FROM " . DB_PREFIX . "coupon_spec_filter WHERE spec_filter_id = '" . (int)$spec_filter_id . "'");

		$this->cache->delete('spec_filter');
	}

	public function getSpecFilter($spec_filter_id)
	{
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "spec_filter c LEFT JOIN " . DB_PREFIX . "spec_filter_description cd1 ON (c.spec_filter_id = cd1.spec_filter_id) WHERE c.spec_filter_id = '" . (int)$spec_filter_id . "' AND cd1.language_id = '" . (int)$this->config->get('config_language_id') . "'");

		return $query->row;
	}

	public function getSpecFilters($data = array())
	{
		$sql = "SELECT * FROM " . DB_PREFIX . "spec_filter c LEFT JOIN " . DB_PREFIX . "spec_filter_description cd1 ON (c.spec_filter_id = cd1.spec_filter_id) WHERE cd1.language_id = '" . (int)$this->config->get('config_language_id') . "'";

		if (!empty($data['filter_name'])) {
			$sql .= " AND cd1.name LIKE '%" . $this->db->escape($data['filter_name']) . "%'";
		}

		$sql .= " GROUP BY c.spec_filter_id";

		$sort_data = array(
			'name',
			'sort_order'
		);

		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];
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

			$sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
		}

		$query = $this->db->query($sql);

		return $query->rows;
	}

	public function getSpecFilterDescriptions($spec_filter_id)
	{
		$spec_filter_description_data = array();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "spec_filter_description WHERE spec_filter_id = '" . (int)$spec_filter_id . "'");

		foreach ($query->rows as $result) {
			$spec_filter_description_data[$result['language_id']] = array(
				'name'             => $result['name'],
				'meta_title'       => $result['meta_title'],
				'meta_description' => $result['meta_description'],
				'meta_keyword'     => $result['meta_keyword'],
				'description'      => $result['description']
			);
		}

		return $spec_filter_description_data;
	}

	public function getSpecFilterStores($spec_filter_id)
	{
		$spec_filter_store_data = array();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "spec_filter_to_store WHERE spec_filter_id = '" . (int)$spec_filter_id . "'");

		foreach ($query->rows as $result) {
			$spec_filter_store_data[] = $result['store_id'];
		}

		return $spec_filter_store_data;
	}

	public function getSpecFilterSeoUrls($spec_filter_id)
	{
		$spec_filter_seo_url_data = array();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "seo_url WHERE query = 'ocf=FV" . (int)$spec_filter_id . "'");

		foreach ($query->rows as $result) {
			$spec_filter_seo_url_data[$result['store_id']][$result['language_id']] = $result['keyword'];
		}

		return $spec_filter_seo_url_data;
	}

	public function getSpecFilterLayouts($spec_filter_id)
	{
		$spec_filter_layout_data = array();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "spec_filter_to_layout WHERE spec_filter_id = '" . (int)$spec_filter_id . "'");

		foreach ($query->rows as $result) {
			$spec_filter_layout_data[$result['store_id']] = $result['layout_id'];
		}

		return $spec_filter_layout_data;
	}

	public function getTotalSpecFilters()
	{
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "spec_filter");

		return $query->row['total'];
	}

	public function getTotalSpecFiltersByLayoutId($layout_id)
	{
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "spec_filter_to_layout WHERE layout_id = '" . (int)$layout_id . "'");

		return $query->row['total'];
	}

	public function getSpecFilterCategories($spec_filter_id)
	{
		$spec_filter_category_data = array();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "spec_filter_to_category WHERE spec_filter_id = '" . (int)$spec_filter_id . "'");

		foreach ($query->rows as $result) {
			$spec_filter_category_data[] = $result['category_id'];
		}

		return $spec_filter_category_data;
	}

	public function getSpecFilterProducts($spec_filter_id)
	{
		$spec_filter_product_data = array();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "spec_filter_to_product WHERE spec_filter_id = '" . (int)$spec_filter_id . "'");

		foreach ($query->rows as $result) {
			$spec_filter_product_data[] = $result['product_id'];
		}

		return $spec_filter_product_data;
	}

	private function translitIt($str)
	{
		$tr = array(
			"А" => "a",
			"Б" => "b",
			"В" => "v",
			"Г" => "g",
			"Д" => "d",
			"Е" => "e",
			"Ё" => "yo",
			"Ж" => "j",
			"З" => "z",
			"И" => "i",
			"Й" => "y",
			"К" => "k",
			"Л" => "l",
			"М" => "m",
			"Н" => "n",
			"О" => "o",
			"П" => "p",
			"Р" => "r",
			"С" => "s",
			"Т" => "t",
			"У" => "u",
			"Ф" => "f",
			"Х" => "h",
			"Ц" => "c",
			"Ч" => "ch",
			"Ш" => "sh",
			"Щ" => "sch",
			"Ъ" => "",
			"Ы" => "yi",
			"Ь" => "",
			"Э" => "e",
			"Ю" => "yu",
			"Я" => "ya",
			"а" => "a",
			"б" => "b",
			"в" => "v",
			"г" => "g",
			"д" => "d",
			"е" => "e",
			"ё" => "yo",
			"ж" => "j",
			"з" => "z",
			"и" => "i",
			"й" => "y",
			"к" => "k",
			"л" => "l",
			"м" => "m",
			"н" => "n",
			"о" => "o",
			"п" => "p",
			"р" => "r",
			"с" => "s",
			"т" => "t",
			"у" => "u",
			"ф" => "f",
			"х" => "h",
			"ц" => "c",
			"ч" => "ch",
			"ш" => "sh",
			"щ" => "sch",
			"ъ" => "y",
			"ы" => "y",
			"ь" => "",
			"э" => "e",
			"ю" => "yu",
			"я" => "ya",
			" " => "_",
			"." => "",
			"/" => "_"
		);
		return strtr($str, $tr);
	}

	private function regTranslitIt($urlstr)
	{
		if (preg_match('/[^A-Za-z0-9_\-]/', $urlstr)) {
			$urlstr = $this->translitIt($urlstr);
			$urlstr = preg_replace('/[^A-Za-z0-9_\-]/', '', $urlstr);
			return $urlstr;
		}
	}
}
