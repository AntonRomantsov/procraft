<?php
#######################################################
#	Category Manager 1.35 for Opencart 3x by AlexDW	  #
#######################################################
class ModelExtensionModuleCategorymanager extends Model {

	private function getCMpath($category_id) {
		return $this->md($category_id);
	}
		public function md($category_id)
    {
        $BMcFK = DB_PREFIX;
        $kRCoZ = $this->db->query("SELECT DISTINCT *, (SELECT GROUP_CONCAT(cd1.category_id ORDER BY level SEPARATOR '_') FROM " . $BMcFK . "category_path cp LEFT JOIN " . $BMcFK . "category_description cd1 ON (cp.path_id = cd1.category_id AND cp.category_id != cp.path_id) WHERE cp.category_id = c.category_id AND cd1.language_id = '" . (int) $this->config->get("config_language_id") . "' GROUP BY cp.category_id) AS path FROM " . $BMcFK . "category c WHERE c.category_id = '" . (int) $category_id . "' ");
        return $kRCoZ->row["path"];
    }
	
	public function mc($Qn7OW)
    {
        
            $BMcFK = DB_PREFIX;
            $kRCoZ = $this->db->query("SELECT cp.* FROM `" . $BMcFK . "category_path` cp LEFT JOIN `" . $BMcFK . "category_path` cp2 ON (cp2.path_id = cp.category_id) WHERE cp.path_id = '" . (int) $Qn7OW . "' GROUP BY cp.category_id ORDER BY cp2.`level` ASC ");
            return $kRCoZ->rows;
        
    }
	private function getCMdata($category_id) {
		$query = $this->db->query("SELECT DISTINCT * FROM `" . DB_PREFIX . "category` WHERE category_id = '" .(int)$category_id. "'");
		if ($query->num_rows) {
			return $query->row;
		}
		return !1;
	}

	private function getCMchild($parent_id) {
		
		return $this->mc($parent_id);
	}

	public function getCMpro($category_id) {
		$query = $this->db->query("SELECT COUNT(category_id) AS pro FROM `" . DB_PREFIX . "product_to_category` WHERE category_id = '" .(int)$category_id. "'");
		if ($query->num_rows) {
			return $query->row['pro'];
		}
		return 0;
	}

	public function copyCat($category_id, $copy=0) {
		$this->load->model('catalog/category');
		$data = $this->getCMdata($category_id);
		if ($data) {
			$replace = array();
			$parents = $this->getCMchild($category_id);

			foreach ($parents as $par) {
			$data = $this->getCMdata($par['category_id']);
			$data['keyword'] = '';
			$data['status'] = '0';
			$category_id = $par['category_id'];

			if (!empty($copy)) {
				$cmpath = $this->getCMpath($category_id);
				$cmpath = $data['parent_id'] = (substr(strrchr($cmpath, '_'), 1))!='' ? (substr(strrchr($cmpath, '_'), 1)) : $cmpath;
			}
			if (!empty($replace) && !empty($copy) && in_array($cmpath, $replace) ) {
				$data['parent_id'] = array_search($cmpath, $replace);
			}

			$data['category_description'] = $this->model_catalog_category->getCategoryDescriptions($category_id);
				foreach ($data['category_description'] as $language_id => $value) {
				$data['category_description'][$language_id]['name'] = $data['category_description'][$language_id]['name'] .'**';
				}
			$data['category_filter'] = $this->model_catalog_category->getCategoryFilters($category_id);
			$data['category_store'] = $this->model_catalog_category->getCategoryStores($category_id);
			$data['category_layout'] = $this->model_catalog_category->getCategoryLayouts($category_id);

			$lastcat = $this->model_catalog_category->addCategory($data);
			$replace[$lastcat] = $category_id;
			if (empty($copy)) break;
			}
		}
	}

	private function CMdate($category_id) {
		if ($this->config->get('module_categorymanager_udate')) {
		$this->db->query("UPDATE " . DB_PREFIX . "category SET `date_modified` = NOW() WHERE category_id = '" . (int)$category_id . "'");
		}
	}

	public function BMdeleteImage($category_id) {
		$this->db->query("UPDATE " . DB_PREFIX . "category SET image = '' WHERE category_id = '" . (int)$category_id . "'");
		$this->CMdate($category_id);
		$this->cache->delete( 'category');
	}

	public function BMchangeImage($category_id, $ipath) {
		$this->db->query("UPDATE " . DB_PREFIX . "category SET image = '" . $this->db->escape($ipath) . "' WHERE category_id = '" . (int)$category_id . "'");
		$this->CMdate($category_id);
		$this->cache->delete( 'category');
	}

	public function BMchangeData($category_id, $type, $text, $store_id, $language_id) {
		if ($type == "name") {
			$this->db->query("UPDATE `" . DB_PREFIX . "category_description` SET `name` = '" . $this->db->escape($text) . "' WHERE category_id = '" . (int)$category_id . "' AND language_id = '" . (int)$this->config->get('config_language_id') . "' ");
		}
		if ($type == "sort_order") {
			$this->db->query("UPDATE `" . DB_PREFIX . "category` SET `sort_order` = '" . (int)$text . "' WHERE category_id = '" . (int)$category_id . "'");
		}
		if ($type == "top") {
			$this->db->query("UPDATE `" . DB_PREFIX . "category` SET `top` = '" . ((int)$text !=0 ? 1 : 0) . "' WHERE category_id = '" . (int)$category_id . "'");
		}
		if ($type == "sta") {
			$this->db->query("UPDATE `" . DB_PREFIX . "category` SET `status` = '" . ((int)$text !=0 ? 1 : 0) . "' WHERE category_id = '" . (int)$category_id . "'");
		}
		if ($type == "noindex") {
			$this->db->query("UPDATE `" . DB_PREFIX . "category` SET `noindex` = '" . ((int)$text !=0 ? 1 : 0) . "' WHERE category_id = '" . (int)$category_id . "'");
		}
		if ($type == "keyword") {
			$this->db->query("DELETE FROM `" . DB_PREFIX . "seo_url` WHERE `query` = 'category_id=" . (int)$category_id . "' AND `store_id` = '" . (int)$store_id . "' AND `language_id` = '" . (int)$language_id . "' ");
			if (isset($text) && $text !='') {
			$this->db->query("INSERT INTO `" . DB_PREFIX . "seo_url` SET `query` = 'category_id=" . (int)$category_id . "', `keyword` = '" . $this->db->escape($text) . "', `store_id` = '" . (int)$store_id . "', `language_id` = '" . (int)$language_id . "'");
			}
		}

		if ($type == "store") {
			$this->db->query("DELETE FROM `" . DB_PREFIX . "category_to_store` WHERE `category_id` = '" . (int)$category_id . "'");
			if (isset($text) && $text !='') {
			$text = explode(',', $text);
			foreach ($text as $store_id) {
				$this->db->query("INSERT INTO `" . DB_PREFIX . "category_to_store` SET `category_id` = '" . (int)$category_id . "', `store_id` = '" . (int)$store_id . "'");
			}
			}
		}
		$this->CMdate($category_id);
		$this->cache->delete( 'category');
	}

	public function getCategoriesCM($data = array()) {

		if (isset($data['filter_seo'])) {
		$sql = "SELECT * FROM `" . DB_PREFIX . "seo_url` WHERE `keyword` != '' AND `query` LIKE 'category_id=%' ";
			if (isset($data['filter_lang'])) {
				$sql .= " AND `language_id` = '" . (int)$data['filter_lang'] . "' ";
			}
			if (isset($data['filter_store']) && $data['filter_store'] != '**') {
				$sql .= " AND `store_id` = '" . (int)$data['filter_store'] . "' ";
			}
		$query = $this->db->query($sql);

			$seoman = array();
				foreach ($query->rows as $result) {
					$seoman[] = str_replace('category_id=', '', $result['query']);
				}
			$seoman = array_unique($seoman);
			$seoman = implode(',', $seoman);
		}

		if (isset($data['filter_subcat'])) {
			$sql = "SELECT GROUP_CONCAT(zcp.category_id ORDER BY zcp.level SEPARATOR ',') as zcat FROM " . DB_PREFIX . "category_path zcp LEFT JOIN " . DB_PREFIX . "category zc1 ON (zcp.category_id = zc1.category_id) LEFT JOIN " . DB_PREFIX . "category zc2 ON (zcp.path_id = zc2.category_id) LEFT JOIN " . DB_PREFIX . "category_description zcd1 ON (zcp.path_id = zcd1.category_id) WHERE zcd1.language_id = '" . (int)$this->config->get('config_language_id') . "' AND zcp.path_id = '" . (int)$data['filter_subcat'] . "' GROUP BY zcp.category_id ";
			$query = $this->db->query($sql);

			$path = array();
				foreach ($query->rows as $result) {
					$path[] = $result['zcat'];
				}
			$subcat_id = implode(',', $path);
		}

		if (isset($data['filter_cat'])) {		
			$sql = "SELECT GROUP_CONCAT(zcp.category_id ORDER BY zcp.level SEPARATOR ',') as zcat FROM " . DB_PREFIX . "category_path zcp LEFT JOIN " . DB_PREFIX . "category zc1 ON (zcp.category_id = zc1.category_id) LEFT JOIN " . DB_PREFIX . "category zc2 ON (zcp.path_id = zc2.category_id) LEFT JOIN " . DB_PREFIX . "category_description zcd1 ON (zcp.path_id = zcd1.category_id) WHERE zcd1.language_id = '" . (int)$this->config->get('config_language_id') . "' AND LCASE(zcd1.name) LIKE '%" . $this->db->escape(utf8_strtolower($data['filter_cat'])) . "%' GROUP BY zcp.category_id ";
			$query = $this->db->query($sql);

			$path2 = array();
				foreach ($query->rows as $result) {
					$path2[] = $result['zcat'];
				}
			$subcat_name = implode(',', $path2);
		}

		$sql = "SELECT cp.category_id AS category_id, GROUP_CONCAT(cd1.name ORDER BY cp.level SEPARATOR '&nbsp;&nbsp;&gt;&nbsp;&nbsp;') AS name, c1.parent_id, c1.date_added, c1.date_modified, c1.sort_order, c1.status FROM " . DB_PREFIX . "category_path cp LEFT JOIN " . DB_PREFIX . "category c1 ON (cp.category_id = c1.category_id) LEFT JOIN " . DB_PREFIX . "category c2 ON (cp.path_id = c2.category_id) LEFT JOIN " . DB_PREFIX . "category_description cd1 ON (cp.path_id = cd1.category_id) LEFT JOIN " . DB_PREFIX . "category_description cd2 ON (cp.category_id = cd2.category_id) WHERE cd1.language_id = '" . (int)$this->config->get('config_language_id') . "' AND cd2.language_id = '" . (int)$this->config->get('config_language_id') . "'";

		if (isset($data['filter_id'])) {
			$sql .= " AND c1.category_id LIKE '%" . (int)$data['filter_id'] . "%'";
		}

		if (isset($data['filter_subcat'])) {
			if ($subcat_id <>'') {
				$sql .= " AND (c1.category_id IN (".$subcat_id.")) ";
			} else {
				$sql .= " AND c1.category_id = ".(int)$subcat_id." ";
			}
		}

		if (isset($data['filter_cat'])) {
			if ($subcat_name <>'') {
				$sql .= " AND (c1.category_id IN (".$subcat_name.")) ";
			} else {
				$sql .= " AND c1.category_id = ".(int)$subcat_name." ";
			}
		}

		if (isset($data['filter_store'])) {
			if (($data['filter_store']) <> '**') {
				$sql .= " AND c1.category_id IN (SELECT c2s.category_id FROM " . DB_PREFIX . "category_to_store c2s WHERE c1.category_id=c2s.category_id AND c2s.store_id = '" . (int)$data['filter_store'] . "' ) ";
			} else {
				$sql .= " AND c1.category_id NOT IN (SELECT c2s.category_id FROM " . DB_PREFIX . "category_to_store c2s GROUP BY c2s.category_id) ";
			}
		}

		if (isset($data['filter_status'])) {
		if (($data['filter_status']) == 1) {
			$sql .= " AND c1.status = '1'";
		} else {
			$sql .= " AND c1.status <> '1'";
		}
		}

		if (isset($data['filter_noindex'])) {
		if (($data['filter_noindex']) == 1) {
			$sql .= " AND c1.noindex = '1'";
		} else {
			$sql .= " AND c1.noindex <> '1'";
		}
		}

		if (isset($data['filter_product'])) {
		if (($data['filter_product']) == 1) {
			$sql .= " AND c1.category_id IN (SELECT p2c.category_id FROM " . DB_PREFIX . "product_to_category p2c GROUP BY p2c.category_id) ";
		} else {
			$sql .= " AND c1.category_id NOT IN (SELECT p2c.category_id FROM " . DB_PREFIX . "product_to_category p2c GROUP BY p2c.category_id) ";
		}
		}

		if (isset($data['filter_child'])) {
		if (($data['filter_child']) == 1) {
			$sql .= " AND (SELECT COUNT(cp2.category_id) AS cnpro FROM " . DB_PREFIX . "category_path cp2 WHERE cp2.path_id=c1.category_id) > '1' ";
		} else {
			$sql .= " AND (SELECT COUNT(cp2.category_id) AS cnpro FROM " . DB_PREFIX . "category_path cp2 WHERE cp2.path_id=c1.category_id) = '1' ";
		}
		}

		if (isset($data['filter_top'])) {
		if (($data['filter_top']) == 1) {
			$sql .= " AND c1.top = '1'";
		} else {
			$sql .= " AND c1.top <> '1'";
		}
		}

		if (isset($data['filter_seo'])) {
			if ($seoman !='') {
			if (($data['filter_seo']) == 1) {
				$sql .= " AND (c1.category_id IN (".$seoman.")) ";
			} else {
				$sql .= " AND (c1.category_id NOT IN (".$seoman.")) ";
			}
			} else {
				$sql .= " AND (c1.category_id IN (0)) ";
			}
		}

		if ((!empty($data['filter_dad'])) XOR (!empty($data['filter_dade']))) {
			$sql .= " AND (DATE(c1.date_added) = DATE('" . $this->db->escape($data['filter_dad']) . "') OR DATE(c1.date_added) = DATE('" . $this->db->escape($data['filter_dade']) . "'))";
		}

		if ((!empty($data['filter_dad'])) AND (!empty($data['filter_dade']))) {
			$sql .= " AND (DATE(c1.date_added) >= DATE('" . $this->db->escape($data['filter_dad']) . "') AND DATE(c1.date_added) <= DATE('" . $this->db->escape($data['filter_dade']) . "'))";
		}

		if ((!empty($data['filter_dam'])) XOR (!empty($data['filter_dame']))) {
			$sql .= " AND (DATE(c1.date_modified) = DATE('" . $this->db->escape($data['filter_dam']) . "') OR DATE(c1.date_modified) = DATE('" . $this->db->escape($data['filter_dame']) . "'))";
		}

		if ((!empty($data['filter_dam'])) AND (!empty($data['filter_dame']))) {
			$sql .= " AND (DATE(c1.date_modified) >= DATE('" . $this->db->escape($data['filter_dam']) . "') AND DATE(c1.date_modified) <= DATE('" . $this->db->escape($data['filter_dame']) . "'))";
		}

		if (isset($data['filter_image']) ) {
		if ($data['filter_image'] == 1) {
			$sql .= " AND ((c1.image) <> '' AND (c1.image) <> 'no_image.png' AND (c1.image) IS NOT NULL)";
		} else {
			$sql .= " AND ((c1.image) = '' OR (c1.image) = 'no_image.png' OR (c1.image) IS NULL)";
		}
		}

		if (!empty($data['filter_name'])) {
			$sql .= " AND cd2.name LIKE '" . $this->db->escape($data['filter_name']) . "%'";
		}

		$sql .= " GROUP BY cp.category_id";

		$sort_data= array(
			'category_id',
			'date_added',
			'date_modified',
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

	public function getTotalCategoryManager($data = array()) {

		if (isset($data['filter_seo'])) {
		$sql = "SELECT * FROM `" . DB_PREFIX . "seo_url` WHERE `keyword` != '' AND `query` LIKE 'category_id=%' ";
			if (isset($data['filter_lang'])) {
				$sql .= " AND `language_id` = '" . (int)$data['filter_lang'] . "' ";
			}
			if (isset($data['filter_store']) && $data['filter_store'] != '**') {
				$sql .= " AND `store_id` = '" . (int)$data['filter_store'] . "' ";
			}
		$query = $this->db->query($sql);

			$seoman = array();
				foreach ($query->rows as $result) {
					$seoman[] = str_replace('category_id=', '', $result['query']);
				}
			$seoman = array_unique($seoman);
			$seoman = implode(',', $seoman);
		}

		if (isset($data['filter_subcat'])) {
			$sql = "SELECT GROUP_CONCAT(zcp.category_id ORDER BY zcp.level SEPARATOR ',') as zcat FROM " . DB_PREFIX . "category_path zcp LEFT JOIN " . DB_PREFIX . "category zc1 ON (zcp.category_id = zc1.category_id) LEFT JOIN " . DB_PREFIX . "category zc2 ON (zcp.path_id = zc2.category_id) LEFT JOIN " . DB_PREFIX . "category_description zcd1 ON (zcp.path_id = zcd1.category_id) WHERE zcd1.language_id = '" . (int)$this->config->get('config_language_id') . "' AND zcp.path_id = '" . (int)$data['filter_subcat'] . "' GROUP BY zcp.category_id ";
			$query = $this->db->query($sql);

			$path = array();
				foreach ($query->rows as $result) {
					$path[] = $result['zcat'];
				}
			$subcat_id = implode(',', $path);
		}

		if (isset($data['filter_cat'])) {
			$sql = "SELECT GROUP_CONCAT(zcp.category_id ORDER BY zcp.level SEPARATOR ',') as zcat FROM " . DB_PREFIX . "category_path zcp LEFT JOIN " . DB_PREFIX . "category zc1 ON (zcp.category_id = zc1.category_id) LEFT JOIN " . DB_PREFIX . "category zc2 ON (zcp.path_id = zc2.category_id) LEFT JOIN " . DB_PREFIX . "category_description zcd1 ON (zcp.path_id = zcd1.category_id) WHERE zcd1.language_id = '" . (int)$this->config->get('config_language_id') . "' AND LCASE(zcd1.name) LIKE '%" . $this->db->escape(utf8_strtolower($data['filter_cat'])) . "%' GROUP BY zcp.category_id ";
			$query = $this->db->query($sql);

			$path2 = array();
				foreach ($query->rows as $result) {
					$path2[] = $result['zcat'];
				}
			if (isset($path2)) {
			$subcat_name = implode(',', $path2);
			}
		}

			$sql = "SELECT COUNT(c.category_id) AS total FROM " . DB_PREFIX . "category c ";
			$sql .= " WHERE 1 ";

		if (isset($data['filter_id'])) {
			$sql .= " AND c.category_id LIKE '%" . (int)$data['filter_id'] . "%'";
		}

		if (isset($data['filter_subcat'])) {
			if ($subcat_id <> '') {
				$sql .= " AND (c.category_id IN (".$subcat_id.")) ";
			} else {
				$sql .= " AND c.category_id = ".(int)$subcat_id." ";
			}
		}

		if (isset($data['filter_cat'])) {
			if ($subcat_name <> '') {
				$sql .= " AND (c.category_id IN (".$subcat_name.")) ";
			} else {
				$sql .= " AND c.category_id = ".(int)$subcat_name." ";
			}
		}

		if (isset($data['filter_store'])) {
			if (($data['filter_store']) <> '**') {
				$sql .= " AND c.category_id IN (SELECT c2s.category_id FROM " . DB_PREFIX . "category_to_store c2s WHERE c.category_id=c2s.category_id AND c2s.store_id = '" . (int)$data['filter_store'] . "' ) ";
			} else {
				$sql .= " AND c.category_id NOT IN (SELECT c2s.category_id FROM " . DB_PREFIX . "category_to_store c2s GROUP BY c2s.category_id) ";
			}
		}

		if (isset($data['filter_status'])) {
		if (($data['filter_status']) == 1) {
			$sql .= " AND c.status = '1'";
		} else {
			$sql .= " AND c.status <> '1'";
		}
		}

		if (isset($data['filter_noindex'])) {
		if (($data['filter_noindex']) == 1) {
			$sql .= " AND c.noindex = '1'";
		} else {
			$sql .= " AND c.noindex <> '1'";
		}
		}

		if (isset($data['filter_product'])) {
		if (($data['filter_product']) == 1) {
			$sql .= " AND c.category_id IN (SELECT p2c.category_id FROM " . DB_PREFIX . "product_to_category p2c GROUP BY p2c.category_id) ";
		} else {
			$sql .= " AND c.category_id NOT IN (SELECT p2c.category_id FROM " . DB_PREFIX . "product_to_category p2c GROUP BY p2c.category_id) ";
		}
		}
		
		if (isset($data['filter_child'])) {
		if (($data['filter_child']) == 1) {
			$sql .= " AND (SELECT COUNT(cp2.category_id) AS cnpro FROM " . DB_PREFIX . "category_path cp2 WHERE cp2.path_id=c.category_id) > '1' ";
		} else {
			$sql .= " AND (SELECT COUNT(cp2.category_id) AS cnpro FROM " . DB_PREFIX . "category_path cp2 WHERE cp2.path_id=c.category_id) = '1' ";
		}
		}

		if (isset($data['filter_top'])) {
		if (($data['filter_top']) == 1) {
			$sql .= " AND c.top = '1'";
		} else {
			$sql .= " AND c.top <> '1'";
		}
		}

		if (isset($data['filter_seo'])) {
			if ($seoman !='') {
			if (($data['filter_seo']) == 1) {
				$sql .= " AND (c.category_id IN (".$seoman.")) ";
			} else {
				$sql .= " AND (c.category_id NOT IN (".$seoman.")) ";
			}
			} else {
				$sql .= " AND (c.category_id IN (0)) ";
			}
		}

		if ((!empty($data['filter_dad'])) XOR (!empty($data['filter_dade']))) {
			$sql .= " AND (DATE(c.date_added) = DATE('" . $this->db->escape($data['filter_dad']) . "') OR DATE(c.date_added) = DATE('" . $this->db->escape($data['filter_dade']) . "'))";
		}

		if ((!empty($data['filter_dad'])) AND (!empty($data['filter_dade']))) {
			$sql .= " AND (DATE(c.date_added) >= DATE('" . $this->db->escape($data['filter_dad']) . "') AND DATE(c.date_added) <= DATE('" . $this->db->escape($data['filter_dade']) . "'))";
		}

		if ((!empty($data['filter_dam'])) XOR (!empty($data['filter_dame']))) {
			$sql .= " AND (DATE(c.date_modified) = DATE('" . $this->db->escape($data['filter_dam']) . "') OR DATE(c.date_modified) = DATE('" . $this->db->escape($data['filter_dame']) . "'))";
		}

		if ((!empty($data['filter_dam'])) AND (!empty($data['filter_dame']))) {
			$sql .= " AND (DATE(c.date_modified) >= DATE('" . $this->db->escape($data['filter_dam']) . "') AND DATE(c.date_modified) <= DATE('" . $this->db->escape($data['filter_dame']) . "'))";
		}

		if (isset($data['filter_image']) ) {
		if ($data['filter_image'] == 1) {
			$sql .= " AND ((c.image) <> '' AND (c.image) <> 'no_image.png' AND (c.image) IS NOT NULL)";
		} else {
			$sql .= " AND ((c.image) = '' OR (c.image) = 'no_image.png' OR (c.image) IS NULL)";
		}
		}

		$query = $this->db->query($sql);

		return $query->row['total'];
	}

	public function disableAllCategory() {
		$query = $this->db->query("UPDATE " . DB_PREFIX . "category SET `status`='0' ");
		$this->cache->delete('category');
	}

	public function enableAllCategory() {
		$query = $this->db->query("UPDATE " . DB_PREFIX . "category SET `status`='1' ");
		$this->cache->delete('category');
	}

	public function enableCategoryCM($category_id) {
		$this->db->query("UPDATE " . DB_PREFIX . "category SET `status`='1' WHERE category_id = '" . (int)$category_id . "'");
		$this->cache->delete('category');	
	}

	public function disableCategoryCM($category_id) {
		$this->db->query("UPDATE " . DB_PREFIX . "category SET `status`='0' WHERE category_id = '" . (int)$category_id . "'");
		$this->cache->delete('category');	
	}
}