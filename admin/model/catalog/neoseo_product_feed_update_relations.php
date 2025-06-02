<?php

require_once DIR_SYSTEM . "/engine/neoseo_model.php";
class ModelCatalogNeoSeoProductFeedUpdateRelations extends NeoSeoModel
{
    public function __construct($registry)
    {
        parent::__construct($registry);
        $this->_moduleSysName = "neoseo_product_feed";
        $this->_logFile = $this->_moduleSysName() . ".log";
        $this->debug = $this->config->get($this->_moduleSysName() . "_debug") == 1;
    }
    public function getTotalProducts($data = array())
    {
        if (!true) {
            return "";
        }
        $sql = "SELECT COUNT(DISTINCT p.product_id) AS total FROM " . DB_PREFIX . "product p LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id) LEFT JOIN " . DB_PREFIX . "product_to_category p2c ON (p.product_id = p2c.product_id)";
        $sql .= " WHERE pd.language_id = '" . (int) $this->config->get("config_language_id") . "'";
        if (!empty($data["filter_name"])) {
            $sql .= " AND pd.name LIKE '%" . $this->db->escape($data["filter_name"]) . "%'";
        }
        if (isset($data["filter_price"]) && !is_null($data["filter_price"])) {
            $sql .= " AND p.price >= '" . $this->db->escape($data["filter_price"]) . "'";
        }
        if (isset($data["filter_category"]) && !is_null($data["filter_category"])) {
            $sql .= " AND p2c.category_id = '" . (int) $data["filter_category"] . "'";
        }
        if (isset($data["filter_status"]) && !is_null($data["filter_status"])) {
            $sql .= " AND p.status = '" . (int) $data["filter_status"] . "'";
        }
        $query = $this->db->query($sql);
        return $query->row["total"];
    }
    public function getProducts($data = array())
    {
        if (!true) {
            return "";
        }
        $sql = "SELECT * FROM " . DB_PREFIX . "product p LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id)";
        if (!empty($data["filter_category"])) {
            $sql .= " LEFT JOIN " . DB_PREFIX . "product_to_category p2c ON (p.product_id = p2c.product_id)";
        }
        $sql .= " WHERE pd.language_id = '" . (int) $this->config->get("config_language_id") . "'";
        if (!empty($data["filter_name"])) {
            $sql .= " AND pd.name LIKE '%" . $this->db->escape($data["filter_name"]) . "%'";
        }
        if (isset($data["filter_price"]) && !is_null($data["filter_price"])) {
            $sql .= " AND p.price >= '" . $this->db->escape($data["filter_price"]) . "'";
        }
        if (!empty($data["filter_category"])) {
            if (!empty($data["filter_sub_category"])) {
                $implode_data = array();
                $implode_data[] = "category_id = '" . (int) $data["filter_category"] . "'";
                $this->load->model("catalog/category");
                $categories = $this->model_catalog_category->getCategories($data["filter_category"]);
                foreach ($categories as $category) {
                    $implode_data[] = "p2c.category_id = '" . (int) $category["category_id"] . "'";
                }
                $sql .= " AND (" . implode(" OR ", $implode_data) . ")";
            } else {
                $sql .= " AND p2c.category_id = '" . (int) $data["filter_category"] . "'";
            }
        }
        $sql .= " GROUP BY p.product_id";
        $sort_data = array("pd.name", "p.price", "p.sort_order");
        if (isset($data["sort"]) && in_array($data["sort"], $sort_data)) {
            $sql .= " ORDER BY " . $data["sort"];
        } else {
            $sql .= " ORDER BY pd.name";
        }
        if (isset($data["order"]) && $data["order"] == "DESC") {
            $sql .= " DESC";
        } else {
            $sql .= " ASC";
        }
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
    public function getProductCategories($product_id)
    {
        if (!true) {
            return "";
        }
        $product_category_data = array();
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_to_category WHERE product_id = '" . (int) $product_id . "'");
        foreach ($query->rows as $result) {
            $product_category_data[] = $result["category_id"];
        }
        return $product_category_data;
    }
    public function getProductFeedCategory($product_id, $feed_id)
    {
        if (!true) {
            return "";
        }
        $query = $this->db->query("SELECT category_id FROM " . DB_PREFIX . "product_to_feed_category " . "WHERE product_id = '" . (int) $product_id . "' AND product_feed_id = '" . (int) $feed_id . "'");
        return $query->num_rows ? $query->row["category_id"] : 0;
    }
    public function getProductToFeedCategory($product_id)
    {
        if (!true) {
            return "";
        }
        $query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "product_to_feed_category`  WHERE product_id = '" . (int) $product_id . "'");
        return $query->rows;
    }
    public function updateProductToFeedCategory($feed, $product_id)
    {
        if (!true) {
            return "";
        }
        if (0 < count($feed)) {
            foreach ($feed as $product_feed_id => $category_id) {
                if ($product_feed_id) {
                    $this->db->query("DELETE FROM `" . DB_PREFIX . "product_to_feed_category` WHERE product_id = " . (int) $product_id . " AND product_feed_id=" . (int) $product_feed_id);
                    if ($category_id) {
                        $this->db->query("INSERT INTO `" . DB_PREFIX . "product_to_feed_category` SET `product_id` = " . (int) $product_id . ", category_id = " . (int) $category_id . ", product_feed_id = " . (int) $product_feed_id . "");
                    }
                }
            }
        }
    }
    public function deleteProductToFeedCategory($product_id)
    {
        if (!true) {
            return "";
        }
        $this->db->query("DELETE FROM `" . DB_PREFIX . "product_to_feed_category` WHERE product_id = " . (int) $product_id . "");
    }
    private function addAccessLevels()
    {
    }
}

?>