<?php

require_once DIR_SYSTEM . "/engine/neoseo_model.php";
class ModelToolNeoSeoProductFeed extends NeoSeoModel
{
    public function __construct($registry)
    {
        parent::__construct($registry);
        $this->_moduleSysName = "neoseo_product_feed";
        $this->_logFile = $this->_moduleSysName() . ".log";
        $this->debug = $this->config->get($this->_moduleSysName() . "_debug") == 1;
    }
    public function getListFeeds($data)
    {
        if (!true) {
            return "";
        }
        $sql = "SELECT * FROM " . DB_PREFIX . "product_feed";
        if (isset($data["where"])) {
            $sql .= " WHERE " . $data["where"];
        }
        $sql .= " GROUP BY product_feed_id";
        $sort_data = array("feed_name", "id_format", "status");
        if (isset($data["sort"]) && in_array($data["sort"], $sort_data)) {
            $sql .= " ORDER BY " . $data["sort"];
        } else {
            $sql .= " ORDER BY feed_name";
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
    public function saveFeed($data)
    {
        if (!true) {
            return "";
        }
        if (isset($data["categories"])) {
            $categories = implode(",", $data["categories"]);
        } else {
            $categories = "0";
        }
        if (isset($data["manufacturers"])) {
            $manufacturers = implode(",", $data["manufacturers"]);
        } else {
            $manufacturers = "0";
        }
        if (isset($data["warehouses"])) {
            $warehouses = implode(",", $data["warehouses"]);
        } else {
            $warehouses = "0";
        }
        if (isset($data["product_not_unload"])) {
            $not_unload = implode(",", $data["product_not_unload"]);
        } else {
            $not_unload = "0";
        }
        if (isset($data["product_list"])) {
            $products = implode(",", $data["product_list"]);
        } else {
            $products = "0";
        }
        if (isset($data["use_warehouse_quantity"])) {
            $use_warehouse_quantity = $data["use_warehouse_quantity"];
        } else {
            $use_warehouse_quantity = "0";
        }
        $sql = (isset($data["product_feed_id"]) ? "UPDATE `" . DB_PREFIX . "product_feed` SET " : "INSERT INTO `" . DB_PREFIX . "product_feed` SET ") . "`language_id` = '" . (int) $data["language_id"] . "'," . " `feed_name` = '" . $this->db->escape($data["feed_name"]) . "', " . "`feed_shortname` = '" . $this->db->escape($data["feed_shortname"]) . "', " . "`status` = '" . (int) $data["status"] . "', " . "`replace_break` = '" . (int) $data["replace_break"] . "'," . "`id_format` = '" . (int) $data["id_format"] . "', " . "`use_main_category` = '" . (int) $data["use_main_category"] . "', " . "`use_warehouse_quantity` = '" . (int) $use_warehouse_quantity . "', " . "`warehouses` = '" . $warehouses . "', " . "`use_categories` = '" . (int) $data["use_categories"] . "', " . "`categories` = '" . $categories . "', " . "`manufacturers` = '" . $manufacturers . "', " . "`products` = '" . $products . "', " . "`not_unload` = '" . $not_unload . "', " . " `currency` = '" . $this->db->escape($data["currency"]) . "', " . "`use_original_images` = '" . (int) $data["use_original_images"] . "', " . "`image_pass` = '" . (int) $data["image_pass"] . "', " . "`image_width` = '" . (int) $data["image_width"] . "', " . "`image_height` = '" . (int) $data["image_height"] . "', " . "`pictures_limit` = '" . $this->db->escape($data["pictures_limit"]) . "', " . "`cat_names_separathor` = '" . $this->db->escape($data["cat_names_separathor"]) . "', " . "`product_markup` = '" . $this->db->escape($data["product_markup"]) . "', " . "`product_markup_option` = '" . $this->db->escape($data["product_markup_option"]) . "', " . "`product_markup_type` = '" . $this->db->escape($data["product_markup_type"]) . "', " . "`sql_code` = '" . $this->db->escape($data["sql_code"]) . "', " . "`sql_code_before` = '" . $this->db->escape($data["sql_code_before"]) . "', " . "`exclude_empty_product` = '" . (int) $data["exclude_empty_product"] . "'," . "`ip_list` = '" . (isset($data["ip_list"]) ? $this->db->escape($data["ip_list"]) : "") . "', " . "`store_id` = '" . (int) $data["store_id"] . "'" . (isset($data["product_feed_id"]) ? " WHERE product_feed_id = '" . (int) $data["product_feed_id"] . "' " : "");
        $this->db->query($sql);
        if (isset($data["product_feed_id"])) {
            $this->db->query("DELETE FROM `" . DB_PREFIX . "product_feed_to_store` WHERE product_feed_id='" . (int) $data["product_feed_id"] . "'");
            $product_feed_id = $data["product_feed_id"];
        } else {
            $product_feed_id = $this->db->getLastId();
        }
        if (isset($data["product_feed_store"])) {
            foreach ($data["product_feed_store"] as $store_id) {
                $this->db->query("INSERT INTO `" . DB_PREFIX . "product_feed_to_store` SET product_feed_id = '" . (int) $product_feed_id . "', store_id = '" . (int) $store_id . "'");
            }
        }
    }
    public function getTotalFeeds()
    {
        if (!true) {
            return "";
        }
        $sql = "SELECT COUNT(product_feed_id) AS total FROM " . DB_PREFIX . "product_feed WHERE 1";
        $query = $this->db->query($sql);
        return $query->row["total"];
    }
    public function getFeed($feed_id)
    {
        if (!true) {
            return "";
        }
        $query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "product_feed` feed WHERE feed.product_feed_id = '" . (int) $feed_id . "'");
        return $query->row;
    }
    public function deleteFeed($data)
    {
        if (!true) {
            return "";
        }
        $sql = "DELETE FROM `" . DB_PREFIX . "product_feed` WHERE product_feed_id = '" . (int) $data["product_feed_id"] . "' ";
        $this->db->query($sql);
    }
    public function getListFormats()
    {
        if (!true) {
            return "";
        }
        $sql = "SELECT * FROM `" . DB_PREFIX . "product_feed_format` ORDER BY product_feed_format_id ASC";
        $query = $this->db->query($sql);
        return $query->rows;
    }
    public function getFormats($data)
    {
        if (!true) {
            return "";
        }
        $sql = "SELECT * FROM " . DB_PREFIX . "product_feed_format WHERE 1 ";
        $sql .= " GROUP BY product_feed_format_id";
        $sort_data = array("feed_format_name", "format_xml");
        if (isset($data["sort"]) && in_array($data["sort"], $sort_data)) {
            $sql .= " ORDER BY " . $data["sort"];
        } else {
            $sql .= " ORDER BY feed_format_name";
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
    public function getTotalFormats()
    {
        if (!true) {
            return "";
        }
        $sql = "SELECT COUNT(product_feed_format_id) AS total FROM " . DB_PREFIX . "product_feed_format WHERE 1";
        $query = $this->db->query($sql);
        return $query->row["total"];
    }
    public function getFormat($format_id)
    {
        if (!true) {
            return "";
        }
        $query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "product_feed_format` format WHERE format.product_feed_format_id = '" . (int) $format_id . "'");
        return $query->row;
    }
    public function saveFormats($data)
    {
        if (!true) {
            return "";
        }
        $sql = (isset($data["product_feed_format_id"]) ? "UPDATE `" . DB_PREFIX . "product_feed_format` SET " : "INSERT INTO `" . DB_PREFIX . "product_feed_format` SET ") . "`feed_format_name` = '" . $this->db->escape($data["feed_format_name"]) . "', `format_xml` = '" . $this->db->escape($data["format_xml"]) . "'" . (isset($data["product_feed_format_id"]) ? " WHERE product_feed_format_id = '" . (int) $data["product_feed_format_id"] . "' " : "");
        $this->db->query($sql);
    }
    public function deleteFormat($data)
    {
        if (!true) {
            return "";
        }
        $sql = "DELETE FROM `" . DB_PREFIX . "product_feed_format` WHERE product_feed_format_id = '" . (int) $data["product_feed_format_id"] . "' ";
        $this->db->query($sql);
    }
    public function getProductByMainCategoryId($category_id)
    {
        if (!true) {
            return "";
        }
        $query = $this->db->query("SELECT product_id FROM " . DB_PREFIX . "product_to_category WHERE category_id = '" . (int) $category_id . "' AND main_category = '1'");
        return $query->rows;
    }
    public function getProductFeedStore($product_feed_id)
    {
        if (!true) {
            return "";
        }
        $product_feed_store_data = array();
        $sql = $this->db->query("SELECT * FROM `" . DB_PREFIX . "product_feed_to_store` WHERE product_feed_id = '" . (int) $product_feed_id . "'");
        foreach ($sql->rows as $result) {
            $product_feed_store_data[] = $result["store_id"];
        }
        return $product_feed_store_data;
    }
    public function getWarehouses()
    {
        if (!true) {
            return "";
        }
        $data = array();
        $query = $this->db->query("show tables like '" . DB_PREFIX . "warehouse'");
        if (!$query->num_rows) {
            return $data;
        }
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "warehouse");
        return $query->rows;
    }
    private function addAccessLevels()
    {
    }
}

?>