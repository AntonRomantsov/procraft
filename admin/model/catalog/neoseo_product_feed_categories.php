<?php

require_once DIR_SYSTEM . "/engine/neoseo_model.php";
class ModelCatalogNeoSeoProductFeedCategories extends NeoSeoModel
{
    public function __construct($registry)
    {
        parent::__construct($registry);
        $this->_moduleSysName = "neoseo_product_feed";
        $this->_logFile = $this->_moduleSysName() . ".log";
        $this->debug = $this->config->get($this->_moduleSysName() . "_debug") == 1;
    }
    public function deleteCategory($category_id)
    {
        if (!true) {
            return "";
        }
        $this->db->query("DELETE FROM " . DB_PREFIX . "product_feed_categories WHERE category_id='" . (int) $category_id . "' OR parent_id='" . (int) $category_id . "'");
        $this->db->query("DELETE FROM " . DB_PREFIX . "product_feed_categories_path WHERE category_id = '" . (int) $category_id . "'");
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_feed_categories_path WHERE path_id = '" . (int) $category_id . "'");
        foreach ($query->rows as $result) {
            $this->deleteCategory($result["category_id"]);
        }
    }
    public function getCategoriesByParentId($parent_id = 0)
    {
        if (!true) {
            return "";
        }
        $query = $this->db->query("SELECT cp.category_id AS category_id FROM " . DB_PREFIX . "product_feed_categories_path cp LEFT JOIN " . DB_PREFIX . "product_feed_categories c1 ON (cp.path_id = c1.category_id)  WHERE c1.parent_id = '" . (int) $parent_id . "' GROUP BY category_id");
        return $query->rows;
    }
    public function getListCategoriesByParentId($parent_id = 0)
    {
        if (!true) {
            return "";
        }
        $query = $this->db->query("SELECT *, (SELECT COUNT(parent_id) FROM " . DB_PREFIX . "product_feed_categories WHERE parent_id = c.category_id) AS children FROM " . DB_PREFIX . "product_feed_categories c  WHERE c.parent_id = '" . (int) $parent_id . "'");
        return $query->rows;
    }
    public function getCategories($data = array())
    {
        if (!true) {
            return "";
        }
        $sql = "SELECT cp.category_id AS category_id, GROUP_CONCAT(c1.name ORDER BY cp.level SEPARATOR '  >  ') AS name FROM " . DB_PREFIX . "product_feed_categories_path cp LEFT JOIN " . DB_PREFIX . "product_feed_categories c1 ON (cp.path_id = c1.category_id) LEFT JOIN " . DB_PREFIX . "product_feed_categories c2 ON (cp.path_id = c2.category_id)";
        if (isset($data["where"])) {
            $sql .= "WHERE " . $data["where"];
        }
        $sql .= " GROUP BY category_id";
        $sql .= " ORDER BY name";
        if (isset($data["start"]) || isset($data["limit"])) {
            if ($data["start"] < 0) {
                $data["start"] = 0;
            }
            if ($data["limit"] < 1) {
                $data["limit"] = 20;
            }
            $sql .= " LIMIT " . (int) $data["start"] . "," . (int) $data["limit"];
        }
        $query = $this->db->query($sql);
        return $query->rows;
    }
    public function getParentCategories()
    {
        if (!true) {
            return "";
        }
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_feed_categories WHERE parent_id='0'");
        return $query->rows;
    }
    public function getTotalCategories()
    {
        if (!true) {
            return "";
        }
        $query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "product_feed_categories");
        return $query->row["total"];
    }
    public function getAllCategories()
    {
        if (!true) {
            return "";
        }
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "category c LEFT JOIN " . DB_PREFIX . "category_description cd ON (c.category_id = cd.category_id) LEFT JOIN " . DB_PREFIX . "category_to_store c2s ON (c.category_id = c2s.category_id) WHERE cd.language_id = '" . (int) $this->config->get("config_language_id") . "' AND c2s.store_id = '" . (int) $this->config->get("config_store_id") . "'  ORDER BY c.parent_id, c.sort_order, cd.name");
        $category_data = array();
        foreach ($query->rows as $row) {
            $category_data[$row["parent_id"]][$row["category_id"]] = $row;
        }
        return $category_data;
    }
    public function getTotalCategoriesByLayoutId($layout_id)
    {
        if (!true) {
            return "";
        }
        $query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "category_to_layout WHERE layout_id = '" . (int) $layout_id . "'");
        return $query->row["total"];
    }
    public function getCategory($item_id)
    {
        if (!true) {
            return "";
        }
        $query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "product_feed_categories` c WHERE c.category_id = '" . (int) $item_id . "'");
        $data = $query->row;
        return $data;
    }
    public function addCategory($data)
    {
        if (!true) {
            return "";
        }
        $sql = "INSERT INTO " . DB_PREFIX . "product_feed_categories SET name = '" . $this->db->escape($data["item"]["name"]) . "',  parent_id = '" . (int) $data["item"]["parent_id"] . "'";
        $this->db->query($sql);
        $category_id = $this->db->getLastId();
        $level = 0;
        $query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "product_feed_categories_path` WHERE category_id = '" . (int) $data["item"]["parent_id"] . "' ORDER BY `level` ASC");
        foreach ($query->rows as $result) {
            $this->db->query("INSERT INTO `" . DB_PREFIX . "product_feed_categories_path` SET `category_id` = '" . (int) $category_id . "', `path_id` = '" . (int) $result["path_id"] . "', `level` = '" . (int) $level . "'");
            $level++;
        }
        $this->db->query("INSERT INTO `" . DB_PREFIX . "product_feed_categories_path` SET `category_id` = '" . (int) $category_id . "', `path_id` = '" . (int) $category_id . "', `level` = '" . (int) $level . "'");
        return $category_id;
    }
    public function editCategory($category_id, $data)
    {
        if (!true) {
            return "";
        }
        $sql = "UPDATE " . DB_PREFIX . "product_feed_categories SET \n             name = '" . $this->db->escape($data["item"]["name"]) . "', \n             parent_id = '" . (int) $data["item"]["parent_id"] . "'\n            WHERE category_id ='" . $category_id . "'";
        $this->db->query($sql);
        $query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "product_feed_categories_path` WHERE path_id = '" . (int) $category_id . "' ORDER BY level ASC");
        if ($query->rows) {
            foreach ($query->rows as $category_path) {
                $this->db->query("DELETE FROM `" . DB_PREFIX . "product_feed_categories_path` WHERE category_id = '" . (int) $category_path["category_id"] . "' AND level < '" . (int) $category_path["level"] . "'");
                $path = array();
                $query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "product_feed_categories_path` WHERE category_id = '" . (int) $data["item"]["parent_id"] . "' ORDER BY level ASC");
                foreach ($query->rows as $result) {
                    $path[] = $result["path_id"];
                }
                $query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "product_feed_categories_path` WHERE category_id = '" . (int) $category_path["category_id"] . "' ORDER BY level ASC");
                foreach ($query->rows as $result) {
                    $path[] = $result["path_id"];
                }
                $level = 0;
                foreach ($path as $path_id) {
                    $this->db->query("REPLACE INTO `" . DB_PREFIX . "product_feed_categories_path` SET category_id = '" . (int) $category_path["category_id"] . "', `path_id` = '" . (int) $path_id . "', level = '" . (int) $level . "'");
                    $level++;
                }
            }
        } else {
            $this->db->query("DELETE FROM `" . DB_PREFIX . "product_feed_categories_path` WHERE category_id = '" . (int) $category_id . "'");
            $level = 0;
            $query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "product_feed_categories_path` WHERE category_id = '" . (int) $data["item"]["parent_id"] . "' ORDER BY level ASC");
            foreach ($query->rows as $result) {
                $this->db->query("INSERT INTO `" . DB_PREFIX . "product_feed_categories_path` SET category_id = '" . (int) $category_id . "', `path_id` = '" . (int) $result["path_id"] . "', level = '" . (int) $level . "'");
                $level++;
            }
            $this->db->query("REPLACE INTO `" . DB_PREFIX . "product_feed_categories_path` SET category_id = '" . (int) $category_id . "', `path_id` = '" . (int) $category_id . "', level = '" . (int) $level . "'");
        }
    }
    public function getFeedCategories()
    {
        if (!true) {
            return "";
        }
        $query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "product_feed_categories`");
        $categories = array();
        if ($query->num_rows) {
            foreach ($query->rows as $row) {
                $categories[$row["name"]] = $row["category_id"];
            }
        }
        return $categories;
    }
    public function getFeedCategoriesByIds($ids)
    {
        if (!true) {
            return "";
        }
        $query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "product_feed_categories` WHERE category_id IN(" . $ids . ")");
        return $query->rows;
    }
    public function upload($filename, $parent_id)
    {
        if (!true) {
            return "";
        }
        require_once DIR_SYSTEM . "library/PHPExcel/Classes/PHPExcel.php";
        require_once DIR_SYSTEM . "library/PHPExcel/Classes/PHPExcel/IOFactory.php";
        $this->load->model("catalog/product");
        $feedCategories = $this->getFeedCategories();
        try {
            $inputFileType = PHPExcel_IOFactory::identify($filename);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            if ($inputFileType == "CSV") {
                return "Не верный формат файла .csv!";
            }
            $objReader->setReadDataOnly(true);
            $reader = $objReader->load($filename);
            $worksheet = $reader->getSheet(0);
            $maxColumn = PHPExcel_Cell::columnIndexFromString($worksheet->getHighestColumn());
            $maxRow = $worksheet->getHighestRow();
            $categories = array();
            for ($i = 1; $i <= $maxRow; $i++) {
                for ($j = 0; $j <= $maxColumn - 1; $j++) {
                    $value = $worksheet->getCellByColumnAndRow($j, $i)->getValue();
                    if ($value) {
                        $parentCategory[$j] = $value;
                        if (isset($feedCategories[$value])) {
                            continue;
                        }
                        $data["item"] = array("name" => $value, "parent_id" => isset($parentCategory[$j - 1]) && isset($feedCategories[$parentCategory[$j - 1]]) ? $feedCategories[$parentCategory[$j - 1]] : $parent_id);
                        $feedCategories[$value] = $this->addCategory($data);
                    }
                }
            }
        } catch (Exception $e) {
            return str_replace("Invalid cell coordinate", "Не удалось прочитать значение ячейки", $e->getMessage());
        }
    }
    private function addAccessLevels()
    {
    }
}

?>