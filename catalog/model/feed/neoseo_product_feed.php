<?php

require_once DIR_SYSTEM . "/engine/neoseo_model.php";
class ModelFeedNeoSeoProductFeed extends NeoSeoModel
{
    private $shop = array();
    private $currencies = array();
    private $categories = array();
    private $native_categories = array();
    private $offers = array();
    private $eol = "\n";
    private $hasMainCategory = NULL;
    private $hasPermanentMainCategory = NULL;
    private $hasRelatedoptions = NULL;
    private $hasProductImageByOption = NULL;
    private $hasCategoryPath = true;
    private $hasDiscountTable = true;
    private $hasSpecialTable = true;
    public function __construct($registry)
    {
        parent::__construct($registry);
        $this->_moduleName = "NeoSeo Product Feed";
        $this->_logFile = "neoseo_product_feed.log";
        $this->debug = $this->config->get("neoseo_product_feed_debug") == 1;
        $query = $this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "product_to_category` WHERE `Field` = 'main_category'");
        $this->hasMainCategory = 0 < $query->num_rows ? 1 : 0;
        $this->hasPermanentMainCategory = $this->hasMainCategory;
        $query = $this->db->query("SHOW TABLES LIKE '" . DB_PREFIX . "relatedoptions'");
        $this->hasRelatedoptions = $query->num_rows ? true : false;
        if (!$this->hasRelatedoptions) {
            $this->log("Сообщение для разработчика: Таблица '" . DB_PREFIX . "relatedoptions' отсутствует в БД. Использование связных опций невозможно!");
        }
        $query = $this->db->query("SHOW TABLES LIKE '" . DB_PREFIX . "product_image_by_option'");
        $this->hasProductImageByOption = $query->num_rows ? true : false;
        if (!$this->hasProductImageByOption) {
            $this->log("Сообщение для разработчика: Таблица '" . DB_PREFIX . "product_image_by_option' отсутствует в БД. Использование изображений опций невозможно!");
        }
        $sql = "SHOW TABLES LIKE '" . DB_PREFIX . "category_path'";
        $query = $this->db->query($sql);
        $this->hasCategoryPath = 0 < $query->num_rows;
        if (!$this->hasCategoryPath) {
            $this->log("Сообщение для разработчика: Таблица '" . DB_PREFIX . "category_path' отсутствует в БД. Использование полного пути категорий невозможно!");
        }
        $sql = "SHOW TABLES LIKE '" . DB_PREFIX . "product_discount'";
        $query = $this->db->query($sql);
        $this->hasDiscountTable = 0 < $query->num_rows;
        if (!$this->hasDiscountTable) {
            $this->log("Сообщение для разработчика: Таблица '" . DB_PREFIX . "product_discount' отсутствует в БД. Использование скидок невозможно!");
        }
        $sql = "SHOW TABLES LIKE '" . DB_PREFIX . "product_special'";
        $query = $this->db->query($sql);
        $this->hasSpecialTable = 0 < $query->num_rows;
        if (!$this->hasSpecialTable) {
            $this->log("Сообщение для разработчика: Таблица '" . DB_PREFIX . "product_special' отсутствует в БД. Использование акций невозможно!");
        }
    }
    protected function cartesian($input)
    {
        if (!true) {
            return "";
        }
        $result = array();
        foreach ($input as $key => $values) {
            if (empty($values)) {
                continue;
            }
            if (empty($result)) {
                foreach ($values as $value) {
                    $result[] = array($key => $value);
                }
            } else {
                $append = array();
                foreach ($result as &$product) {
                    $product[$key] = array_shift($values);
                    $copy = $product;
                    foreach ($values as $item) {
                        $copy[$key] = $item;
                        $append[] = $copy;
                    }
                    array_unshift($values, $product[$key]);
                }
                $result = array_merge($result, $append);
            }
        }
        return $result;
    }
    public function sqlBefore($sql_before)
    {
        if (!true) {
            return "";
        }
        if (trim($sql_before) != "") {
            $this->log("Запускаем пред-обработку SQL");
            foreach (explode(";", html_entity_decode($sql_before)) as $query) {
                if (trim($query) == "") {
                    continue;
                }
                $this->db->query(trim($query));
            }
        }
    }
    public function explodeLines($lines)
    {
        if (!true) {
            return "";
        }
        $res = array();
        foreach (explode("\n", trim($lines)) as $line) {
            if (trim($line) != "") {
                $res[] = trim($line);
            }
        }
        return $res;
    }
    protected function prepareUrl($url)
    {
        if (!true) {
            return "";
        }
        $result = $url;
        $result = str_replace("&amp;", "&", $result);
        $result = str_replace("&", "&amp;", $result);
        return $result;
    }
    public function getCategory($language_id, $use_categories = 0, $categories_id = 0)
    {
        if (!true) {
            return "";
        }
        $where = "";
        if ($categories_id) {
            $categories_id = rtrim($categories_id, ",");
        }
        $where = " AND c.category_id IN (" . $categories_id . ")";
        $sql = "SELECT cd.name, c.category_id, c.parent_id\n\t\t\t\t FROM " . DB_PREFIX . "category c\n\t\t\t\t\t  LEFT JOIN " . DB_PREFIX . "category_description cd ON (c.category_id = cd.category_id)\n\t\t\t\t\t  LEFT JOIN " . DB_PREFIX . "category_to_store c2s ON (c.category_id = c2s.category_id)\n\t\t\t\tWHERE cd.language_id = '" . $language_id . "'\n\t\t\t\t  AND c2s.store_id = '" . (int) $this->config->get("config_store_id") . "'\n\t\t\t\t  AND c.status = '1'\n\t\t\t\t  AND c.sort_order <> '-1'" . $where;
        if ($use_categories) {
            $where = "";
            if ($categories_id) {
                $where = " WHERE c.category_id IN (" . $categories_id . "," . $use_categories . ")";
            }
            $sql = "SELECT c.name, c.category_id, c.parent_id FROM " . DB_PREFIX . "product_feed_categories c" . $where;
        }
        $query = $this->db->query($sql);
        return $query->rows;
    }
    public function getProductIds($allowed_categories, $allowed_manufacturers, $allowed_products, $vendor_required = true, $language_id, $sql_code, $use_caregories = 0, $product_feed_id = 0, $use_just_on_products = true)
    {
        if (!true) {
            return "";
        }
        $result = array();
        $get_product_ids = false;
        $category = "product_to_category AS p2c ON (p.product_id = p2c.product_id " . ($this->hasMainCategory ? " AND p2c.main_category = 1 " : "") . ") ";
        if ($use_caregories) {
            $category = "product_to_feed_category AS p2c ON (p.product_id = p2c.product_id AND p2c.product_feed_id=" . $product_feed_id . ")";
            $get_product_ids = true;
        }
        $where = "";
        if ($sql_code) {
            $where .= html_entity_decode(" AND " . ltrim($sql_code, "AND"));
        }
        if ($allowed_categories) {
            $where .= " AND p2c.category_id IN (" . $this->db->escape(rtrim($allowed_categories, ",")) . ")";
            $get_product_ids = true;
        }
        if ($allowed_manufacturers) {
            $where .= " AND p.manufacturer_id IN (" . $this->db->escape($allowed_manufacturers) . ")";
            $get_product_ids = true;
        }
        if ($use_just_on_products) {
            $where .= "AND p.status = '1'";
        }
        if (substr(VERSION, 0, 3) == "3.0" || substr(VERSION, 0, 3) == "2.3") {
            $sql = "SELECT store_id FROM " . DB_PREFIX . "product_feed WHERE product_feed_id = '" . $product_feed_id . "'";
        } else {
            $sql = "SELECT store_id FROM " . DB_PREFIX . "product_feed_to_store WHERE product_feed_id = '" . $product_feed_id . "'";
        }
        $stores = $this->db->query($sql)->rows;
        $sqlStores = array();
        foreach ($stores as $store) {
            $sqlStores[] = $store["store_id"];
        }
        if (!count($sqlStores)) {
            $sqlStores[] = 0;
        }
        $sqlStores = implode(",", $sqlStores);
        if ($get_product_ids) {
            $query = $this->db->query("SELECT DISTINCT p.product_id  \n\t\t\tFROM " . DB_PREFIX . "product p\n\t\t\tJOIN " . DB_PREFIX . $category . ($vendor_required ? "" : " LEFT ") . " JOIN " . DB_PREFIX . "manufacturer m ON (p.manufacturer_id = m.manufacturer_id)\n\t\t\tLEFT JOIN " . DB_PREFIX . "product_to_store p2s ON (p.product_id = p2s.product_id)\n\t\t\tLEFT JOIN " . DB_PREFIX . "product_special ps ON (p.product_id = ps.product_id) AND ps.customer_group_id = '" . (int) $this->config->get("config_customer_group_id") . "' AND ps.date_start < NOW() AND (ps.date_end = '0000-00-00' OR ps.date_end > NOW())\n\t\t\tWHERE p2s.store_id IN (" . $sqlStores . ")\n\t\t\tAND p.date_available <= NOW()\n\t\t\t" . $where);
            if ($query->num_rows) {
                foreach ($query->rows as $row) {
                    $result[$row["product_id"]] = $row["product_id"];
                }
            }
        }
        if ($allowed_products) {
            $where = $sql_code ? html_entity_decode(" AND " . ltrim($sql_code, "AND")) : "";
            $query = $this->db->query("SELECT DISTINCT p.product_id  FROM " . DB_PREFIX . "product p" . " LEFT JOIN " . DB_PREFIX . "product_to_store p2s ON (p.product_id = p2s.product_id)" . " WHERE p2s.store_id IN (" . $sqlStores . ")" . " AND p.date_available <= NOW()" . " AND p.status = '1'" . " AND p.product_id IN (" . $allowed_products . ")" . $where);
            if ($query->num_rows) {
                foreach ($query->rows as $row) {
                    $result[$row["product_id"]] = $row["product_id"];
                }
            }
        }
        return $result;
    }
    public function getProductName($product_id, $language_id)
    {
        if (!true) {
            return "";
        }
        $sql = "SELECT pd.name FROM " . DB_PREFIX . "product_description pd \n\t\t\tWHERE pd.product_id = '" . (int) $product_id . "'\n\t\t\tAND pd.language_id = '" . $language_id . "'";
        $result = "";
        $query = $this->db->query($sql);
        if ($query->num_rows) {
            $result = $query->row["name"];
        }
        unset($query);
        return $result;
    }
    public function getProductDescription($product_id, $language_id)
    {
        if (!true) {
            return "";
        }
        $sql = "SELECT pd.description FROM " . DB_PREFIX . "product_description pd \n\t\t\tWHERE pd.product_id = '" . (int) $product_id . "'\n\t\t\tAND pd.language_id = '" . $language_id . "'";
        $result = "";
        $query = $this->db->query($sql);
        if ($query->num_rows) {
            $result = $query->row["description"];
        }
        unset($query);
        return $result;
    }
    public function getFeed($name)
    {
        if (!true) {
            return "";
        }
        $sql = "SELECT * FROM `" . DB_PREFIX . "product_feed` WHERE feed_shortname = '" . $this->db->escape($name) . "'";
        $query = $this->db->query($sql);
        return $query->row;
    }
    private function getFeeds()
    {
        if (!true) {
            return "";
        }
        $store_id = $this->config->get("config_store_id");
        $where = "WHERE store_id=" . $store_id;
        if (substr(VERSION, 0, 3) == "3.0" || substr(VERSION, 0, 3) == "2.3") {
            $sql = "SELECT * FROM `" . DB_PREFIX . "product_feed`" . $where;
        } else {
            $sql = "SELECT * FROM `" . DB_PREFIX . "product_feed`";
        }
        $query = $this->db->query($sql);
        return $query->rows;
    }
    private function getFormat($id_format)
    {
        if (!true) {
            return "";
        }
        $sql = "SELECT * FROM `" . DB_PREFIX . "product_feed_format` WHERE product_feed_format_id = '" . $id_format . "'";
        $query = $this->db->query($sql);
        return $query->row;
    }
    /**
     * Feed By Schedule
     */
    public function saveFeeds()
    {
        if (!true) {
            return "";
        }
        $feed_filter = "";
        if ($this->request && isset($this->request->get["feed"])) {
            $feed_filter = $this->request->get["feed"];
        }
        $this->log("Формируем выгрузки по расписанию!");
        if (!$this->config->get("neoseo_product_feed_status")) {
            $this->log("ERROR: Модуль экспорта отключен, формирование фидов невозможно!");
            exit;
        }
        if ($this->config->get("neoseo_product_feed_type") != 1) {
            $this->log("ERROR: Модуль настроен на формирование данных по требованию!");
            exit;
        }
        foreach ($this->getFeeds() as $feed) {
            if ($feed_filter && $feed["feed_shortname"] != $feed_filter) {
                $this->debug("Ищем фид с именем '" . $feed_filter . "'. Фид с именем '" . $feed["feed_shortname"] . "' нам не подходит!");
                continue;
            }
            if (!$feed["status"]) {
                $this->debug("Выгрузка данных для '" . $feed["feed_name"] . "' отключена!");
                continue;
            }
            if (!$feed["feed_shortname"]) {
                $this->debug("Не указан файл для сохранения данных по выгрузке '" . $feed["feed_name"] . "'!");
                continue;
            }
            $content = $this->getFeedContent($feed);
            $filename = rtrim(DIR_DOWNLOAD, "/") . "/" . $feed["feed_shortname"] . ".xml";
            $res = file_put_contents($filename, $content);
            if ($res) {
                $this->log("INFO: Данные для " . $feed["feed_name"] . " успешно записаны в файл " . $filename);
            } else {
                $this->log("ERROR: Не удалось записать файл " . $filename . " для экспорта " . $feed["feed_name"]);
            }
        }
    }
    public function getProduct($product_id, $language_id, $use_categories = 0, $product_feed_id = 0)
    {
        if (!true) {
            return "";
        }
        $category = "";
        $field_category = "";
        if ($use_categories) {
            $category = " JOIN " . DB_PREFIX . "product_to_feed_category AS pf2c ON (p.product_id = pf2c.product_id AND pf2c.category_id!=0 AND pf2c.product_feed_id='" . $product_feed_id . "')";
            $field_category = "pf2c.category_id as feed_category_id, ";
        }
        $sql = "SELECT p.*, \n\t\t\tpd.*, \n\t\t\tm.name AS manufacturer, \n\t\t\t(select category_id from  " . DB_PREFIX . "product_to_category p2c WHERE p.product_id = p2c.product_id AND  p2c.main_category = 1" . ($this->categories ? " AND  p2c.category_id IN (" . implode(",", array_keys($this->categories)) . ") " : "") . " limit 1) as category_id,\n\t\t\t" . $field_category . " \n\t\t\tps.price as special,\n\t\t\tps.date_start as special_date_start,\n\t\t\tps.date_end as special_date_end\n\t\t\tFROM " . DB_PREFIX . "product p\n\t\t\t" . $category . "\n\t\t\tLEFT JOIN " . DB_PREFIX . "manufacturer m ON (p.manufacturer_id = m.manufacturer_id)\n\t\t\tLEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id)\n\t\t\tLEFT JOIN " . DB_PREFIX . "product_special ps ON (p.product_id = ps.product_id AND ( ps.date_start = '0000-00-00' OR ps.date_start < NOW() ) AND ( ps.date_end = '0000-00-00' OR ps.date_end > NOW()) )\n\t\t\tWHERE p.product_id = " . (int) $product_id . "\n\t\t\tAND pd.language_id = " . (int) $language_id;
        $query = $this->db->query($sql);
        $data = $query->row;
        $this->load->model("localisation/language");
        $languages = $this->model_localisation_language->getLanguages();
        foreach ($languages as $language) {
            $sql = "SELECT name, description FROM " . DB_PREFIX . "product_description WHERE product_id = " . (int) $product_id . " AND language_id = " . (int) $language["language_id"];
            $query = $this->db->query($sql);
            $data["names"][] = array("language" => $language["code"], "name" => $this->safeValue($query->row["name"]), "description" => $this->safeValue($query->row["description"]), "description_no_html" => $this->safeValue(strip_tags(html_entity_decode($query->row["description"], ENT_QUOTES, "UTF-8"))));
        }
        return $data;
    }
    public function getProductAttributes($product_id, $language_id)
    {
        if (!true) {
            return "";
        }
        $product_attribute_group_data = array();
        $product_attribute_group_query = $this->db->query("SELECT ag.attribute_group_id, agd.name FROM " . DB_PREFIX . "product_attribute pa LEFT JOIN " . DB_PREFIX . "attribute a ON (pa.attribute_id = a.attribute_id) LEFT JOIN " . DB_PREFIX . "attribute_group ag ON (a.attribute_group_id = ag.attribute_group_id) LEFT JOIN " . DB_PREFIX . "attribute_group_description agd ON (ag.attribute_group_id = agd.attribute_group_id) WHERE pa.product_id = '" . (int) $product_id . "' AND agd.language_id = '" . (int) $language_id . "' GROUP BY ag.attribute_group_id ORDER BY ag.sort_order, agd.name");
        foreach ($product_attribute_group_query->rows as $product_attribute_group) {
            $product_attribute_data = array();
            $product_attribute_query = $this->db->query("SELECT a.attribute_id, ad.name, pa.text FROM " . DB_PREFIX . "product_attribute pa LEFT JOIN " . DB_PREFIX . "attribute a ON (pa.attribute_id = a.attribute_id) LEFT JOIN " . DB_PREFIX . "attribute_description ad ON (a.attribute_id = ad.attribute_id) WHERE pa.product_id = '" . (int) $product_id . "' AND a.attribute_group_id = '" . (int) $product_attribute_group["attribute_group_id"] . "' AND ad.language_id = '" . (int) $language_id . "' AND pa.language_id = '" . (int) $language_id . "' ORDER BY a.sort_order, ad.name");
            foreach ($product_attribute_query->rows as $product_attribute) {
                $product_attribute_data[] = array("attribute_id" => $product_attribute["attribute_id"], "name" => $product_attribute["name"], "text" => $product_attribute["text"]);
            }
            $product_attribute_group_data[] = array("attribute_group_id" => $product_attribute_group["attribute_group_id"], "name" => $product_attribute_group["name"], "attribute" => $product_attribute_data);
        }
        return $product_attribute_group_data;
    }
    public function getProductFilterAttributes($product_id, $language_id)
    {
        if (!true) {
            return "";
        }
        if ($this->config->get("neoseo_filter_show_attributes")) {
            $filter_used = false;
        }
        $product_attribute_group_data = array();
        $product_attribute_group_query = $this->db->query("SELECT ag.attribute_group_id, agd.name FROM " . DB_PREFIX . "product_attribute pa LEFT JOIN " . DB_PREFIX . "attribute a ON (pa.attribute_id = a.attribute_id) LEFT JOIN " . DB_PREFIX . "attribute_group ag ON (a.attribute_group_id = ag.attribute_group_id) LEFT JOIN " . DB_PREFIX . "attribute_group_description agd ON (ag.attribute_group_id = agd.attribute_group_id) WHERE pa.product_id = '" . (int) $product_id . "' AND agd.language_id = '" . (int) $language_id . "' GROUP BY ag.attribute_group_id ORDER BY ag.sort_order, agd.name");
        foreach ($product_attribute_group_query->rows as $product_attribute_group) {
            $product_attribute_data = array();
            $product_attribute_query = $this->db->query("SELECT a.attribute_id, ad.name, pa.text FROM " . DB_PREFIX . "product_attribute pa LEFT JOIN " . DB_PREFIX . "attribute a ON (pa.attribute_id = a.attribute_id) LEFT JOIN " . DB_PREFIX . "attribute_description ad ON (a.attribute_id = ad.attribute_id) WHERE pa.product_id = '" . (int) $product_id . "' AND a.attribute_group_id = '" . (int) $product_attribute_group["attribute_group_id"] . "' AND ad.language_id = '" . (int) $language_id . "' AND pa.language_id = '" . (int) $language_id . "' ORDER BY a.sort_order, ad.name");
            foreach ($product_attribute_query->rows as $product_attribute) {
                $product_attribute_data[] = array("attribute_id" => $product_attribute["attribute_id"], "name" => $product_attribute["name"], "text" => $product_attribute["text"]);
            }
            if ($this->config->get("neoseo_filter_show_attributes") && $product_attribute["attribute_id"] == $this->config->get("neoseo_filter_show_attributes")) {
                $filter_used = true;
                if (!$this->model_module_neoseo_filter) {
                    $this->load->model("module/neoseo_filter");
                }
                $product_attribute_query = $this->model_module_neoseo_filter->getProductOptionsGrouped($product_id);
                $product_attribute_data = array();
                if ($product_attribute_query) {
                    foreach ($product_attribute_query as $product_attribute) {
                        $product_attribute_data[] = array("attribute_id" => "", "name" => $product_attribute["option_name"], "text" => $product_attribute["option_value_name"]);
                    }
                }
            }
            $product_attribute_group_data[] = array("attribute_group_id" => $product_attribute_group["attribute_group_id"], "name" => $product_attribute_group["name"], "attribute" => $product_attribute_data);
        }
        if ($this->config->get("neoseo_filter_show_attributes") && !$filter_used) {
            $product_attribute_group_query = $this->db->query("SELECT agd.name FROM " . DB_PREFIX . "attribute_group ag LEFT JOIN " . DB_PREFIX . "attribute_group_description agd ON (ag.attribute_group_id = agd.attribute_group_id) WHERE ag.attribute_group_id = '" . (int) $this->config->get("neoseo_filter_attributes_group") . "' AND agd.language_id = '" . (int) $language_id . "' GROUP BY ag.attribute_group_id");
            if ($product_attribute_group_query->num_rows) {
                if (!$this->model_module_neoseo_filter) {
                    $this->load->model("module/neoseo_filter");
                }
                $product_attribute_query = $this->model_module_neoseo_filter->getProductOptionsGrouped($product_id);
                $product_attribute_data = array();
                if ($product_attribute_query) {
                    foreach ($product_attribute_query as $product_attribute) {
                        $product_attribute_data[] = array("attribute_id" => "", "name" => $product_attribute["option_name"], "text" => $product_attribute["option_value_name"]);
                    }
                }
                $product_attribute_group_data[] = array("attribute_group_id" => (int) $this->config->get("neoseo_filter_attributes_group"), "name" => $product_attribute_group_query->row["name"], "attribute" => $product_attribute_data);
            }
        }
        return $product_attribute_group_data;
    }
    public function getProductOptions($product_id, $language_id)
    {
        if (!true) {
            return "";
        }
        $product_option_data = array();
        $isExistsOptionSku = $this->getIsExistsOptionSku();
        $isExistsOptionModel = $this->getIsExistsOptionModel();
        $product_option_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_option po LEFT JOIN `" . DB_PREFIX . "option` o ON (po.option_id = o.option_id) LEFT JOIN " . DB_PREFIX . "option_description od ON (o.option_id = od.option_id) WHERE po.product_id = '" . (int) $product_id . "' AND od.language_id = '" . (int) $language_id . "' ORDER BY o.sort_order");
        foreach ($product_option_query->rows as $product_option) {
            $product_option_value_data = array();
            $product_option_value_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_option_value pov LEFT JOIN " . DB_PREFIX . "option_value ov ON (pov.option_value_id = ov.option_value_id) LEFT JOIN " . DB_PREFIX . "option_value_description ovd ON (ov.option_value_id = ovd.option_value_id) WHERE pov.product_id = '" . (int) $product_id . "' AND pov.product_option_id = '" . (int) $product_option["product_option_id"] . "' AND ovd.language_id = '" . (int) $language_id . "' ORDER BY ov.sort_order");
            foreach ($product_option_value_query->rows as $product_option_value) {
                $data = array("product_option_value_id" => $product_option_value["product_option_value_id"], "option_value_id" => $product_option_value["option_value_id"], "name" => $product_option_value["name"], "image" => $product_option_value["image"], "quantity" => $product_option_value["quantity"], "subtract" => $product_option_value["subtract"], "price" => $product_option_value["price"], "special" => isset($product_option_value["special"]) ? $product_option_value["special"] : 0, "price_prefix" => $product_option_value["price_prefix"], "weight" => $product_option_value["weight"], "weight_prefix" => $product_option_value["weight_prefix"]);
                if ($isExistsOptionSku) {
                    $data["sku"] = $product_option_value["sku"];
                }
                if ($isExistsOptionModel) {
                    $data["model"] = $product_option_value["model"];
                }
                $product_option_value_data[] = $data;
            }
            $product_option_data[] = array("product_option_id" => $product_option["product_option_id"], "product_option_value" => $product_option_value_data, "option_id" => $product_option["option_id"], "name" => $product_option["name"], "type" => $product_option["type"], "value" => isset($product_option["value"]) ? $product_option["value"] : "", "required" => $product_option["required"]);
        }
        return $product_option_data;
    }
    public function getProductRelated($product_id)
    {
        if (!true) {
            return "";
        }
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "relatedoptions r LEFT JOIN " . DB_PREFIX . "relatedoptions_option ro USING (relatedoptions_id) WHERE r.product_id='" . $product_id . "'");
        $result = array();
        foreach ($query->rows as $value) {
            if (!isset($result[$value["relatedoptions_id"]])) {
                $result[$value["relatedoptions_id"]] = array("quantity" => $value["quantity"], "model" => $value["model"], "price_prefix" => $value["price_prefix"], "price" => $value["price"]);
            }
            $result[$value["relatedoptions_id"]]["option"][] = array("option_id" => $value["option_id"], "option_value_id" => $value["option_value_id"]);
        }
        return $result;
    }
    private function getProductWarehouseQuantity($product_id, $warehouses)
    {
        if (!true) {
            return "";
        }
        $query = $this->db->query("show tables like '" . DB_PREFIX . "product_warehouse'");
        if (!$query->num_rows) {
            return false;
        }
        $query = $this->db->query("SELECT SUM(`quantity`) AS sum FROM " . DB_PREFIX . "product_warehouse WHERE product_id='" . $product_id . "' AND warehouse_id IN (" . $warehouses . ")");
        if (!$query->num_rows) {
            return false;
        }
        return $query->row["sum"];
    }
    private function getProductOptionWarehouseQuantity($product_id, $product_option_value_id, $warehouses)
    {
        if (!true) {
            return "";
        }
        $query = $this->db->query("show tables like '" . DB_PREFIX . "product_option_warehouse'");
        if (!$query->num_rows) {
            return false;
        }
        $query = $this->db->query("SELECT SUM(`quantity`) AS sum FROM " . DB_PREFIX . "product_option_warehouse WHERE product_id = '" . $product_id . "' AND product_option_value_id = '" . $product_option_value_id . "' AND warehouse_id IN (" . $warehouses . ")");
        if (!$query->num_rows) {
            return false;
        }
        return $query->row["sum"];
    }
    public function getCategoryNames($product_id, $feed_id, $use_categories = 0, $separathor = " > ")
    {
        if (!true) {
            return "";
        }
        $secure_separathor = addslashes($separathor);
        $path = array();
        if (!$use_categories) {
            $query_cat_ids = $this->db->query("SELECT `category_id` FROM " . DB_PREFIX . "product_to_category  WHERE `product_id`=" . (int) $product_id . " ORDER BY `category_id`");
            if ($query_cat_ids->rows) {
                foreach ($query_cat_ids->rows as $cat_id) {
                    $sql = "SELECT DISTINCT name, (SELECT GROUP_CONCAT(cd1.name ORDER BY level SEPARATOR '" . $secure_separathor . "') FROM " . DB_PREFIX . "category_path cp LEFT JOIN " . DB_PREFIX . "category_description cd1 ON (cp.path_id = cd1.category_id AND cp.category_id != cp.path_id) WHERE cp.category_id = c.category_id AND cd1.language_id = '" . (int) $this->config->get("config_language_id") . "' GROUP BY cp.category_id) AS path FROM " . DB_PREFIX . "category c LEFT JOIN " . DB_PREFIX . "category_description cd2 ON (c.category_id = cd2.category_id) WHERE c.category_id = '" . (int) $cat_id["category_id"] . "' AND cd2.language_id = '" . (int) $this->config->get("config_language_id") . "'";
                    $query = $this->db->query($sql);
                    if ($query->row) {
                        if (!empty($query->row["path"])) {
                            $path[$cat_id["category_id"]] = $query->row["path"] . $separathor . $query->row["name"];
                        } else {
                            $path[$cat_id["category_id"]] = $query->row["name"];
                        }
                    }
                }
            }
        } else {
            $cat_names = array();
            $query = $this->db->query("SELECT pfcp.`category_id`,`path_id`,pfcp.`level`,`name` FROM " . DB_PREFIX . "product_feed_categories_path pfcp LEFT JOIN " . DB_PREFIX . "product_feed_categories pfc ON (pfcp.path_id = pfc.category_id) WHERE pfcp.category_id IN (SELECT `category_id` FROM " . DB_PREFIX . "product_to_feed_category  WHERE `product_id`=" . (int) $product_id . " AND `product_feed_id`=" . (int) $feed_id . ") ORDER BY `level` ASC");
            if ($query->rows) {
                foreach ($query->rows as $row) {
                    $cat_names[] = $row["name"];
                    $cad_id = $row["category_id"];
                }
            }
            $path[$cad_id] = implode($separathor, $cat_names);
        }
        return $path;
    }
    /**
     * Проверяет наличие полей sku в таблице product_option_value
     * @return boolean true если есть, false - если нету
     */
    protected function getIsExistsOptionSku()
    {
        if (!true) {
            return "";
        }
        $sql = "SHOW COLUMNS FROM `" . DB_PREFIX . "product_option_value` LIKE 'sku';";
        $query = $this->db->query($sql);
        if ($query->num_rows) {
            return true;
        }
        return false;
    }
    /**
     * Проверяет наличие полей model в таблице product_option_value
     * @return boolean true если есть, false - если нету
     */
    protected function getIsExistsOptionModel()
    {
        if (!true) {
            return "";
        }
        $sql = "SHOW COLUMNS FROM `" . DB_PREFIX . "product_option_value` LIKE 'model';";
        $query = $this->db->query($sql);
        if ($query->num_rows) {
            return true;
        }
        return false;
    }
    public function getFeedContent($feed)
    {
        if (!true) {
            return "";
        }
        if (!$feed["status"]) {
            $this->log("ERROR: Запрошено формирование выключенного фида: " . $feed["feed_name"] . "!");
            return "<?xml version=\"1.0\" encoding=\"UTF-8\"?><root>This feed is disabled</root>";
        }
        if (!isset($feed["use_just_on_products"])) {
            $feed["use_just_on_products"] = true;
        }
        $getFormat = $this->getFormat($feed["id_format"]);
        $isExistsOptionSku = $this->getIsExistsOptionSku();
        $isExistsOptionModel = $this->getIsExistsOptionModel();
        $this->load->model("localisation/currency");
        $feed_currency = $feed["currency"];
        if (!$this->currency->has($feed_currency)) {
            $this->log("ERROR: Указаная валюта '" . $feed_currency . "' отсутствует в списке валют магазина");
            return "<?xml version=\"1.0\" encoding=\"UTF-8\"?><root>Bad currency</root>";
        }
        $decimal_place = $this->currency->getDecimalPlace($feed_currency);
        if (!$decimal_place || !is_numeric($decimal_place)) {
            $decimal_place = 0;
        }
        $shop_currency = $this->config->get("config_currency");
        $this->debug("Валюта экспорта: " . $feed_currency . ", валюта магазина: " . $shop_currency);
        $stock_statuses = $this->getStockStatuses($feed["language_id"]);
        $this->load->model("tool/image");
        $this->load->model("catalog/product");
        $this->log("DEBUG: Формируем данные для " . $feed["feed_name"]);
        $pictures_limit = $feed["pictures_limit"];
        $this->log("Лимит изображений: " . $pictures_limit);
        $this->shop = array();
        $this->categories = array();
        $this->offers = array();
        $this->feed_currency = $this->safeValue(strtoupper($feed_currency));
        if (!$feed["use_main_category"]) {
            $this->hasMainCategory = false;
        } else {
            $this->hasMainCategory = $this->hasPermanentMainCategory;
        }
        $server_url = $this->config->get("config_url");
        $query_variation = $this->db->query("SHOW TABLES LIKE '" . DB_PREFIX . "product_variation_value'");
        if ($query_variation->num_rows) {
            $is_variation = true;
            $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "variation_description WHERE language_id = " . (int) $feed["language_id"]);
            $cache_variations = array();
            foreach ($query->rows as $row) {
                $cache_variations[$row["variation_id"]] = $row["name"];
            }
            $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "variation_value_description WHERE language_id = " . (int) $feed["language_id"]);
            $cache_value_variations = array();
            foreach ($query->rows as $row) {
                $cache_value_variations[$row["variation_value_id"]] = $row["name"];
            }
        } else {
            $is_variation = false;
        }
        $categories = $this->getCategory($feed["language_id"], $feed["use_categories"], $feed["categories"]);
        foreach ($categories as $category) {
            $this->setCategory($category["name"], $category["category_id"], $category["parent_id"], $feed["use_categories"]);
        }
        if ($feed["use_categories"]) {
            $native_categories = $this->getCategory($feed["language_id"]);
            foreach ($native_categories as $category) {
                $this->setNativeCategory($category["name"], $category["category_id"], $category["parent_id"]);
            }
        }
        $vendor_required = false;
        $product_list = isset($feed["products"]) && $feed["products"] ? $feed["products"] : "";
        $products = $this->getProductIds($feed["categories"], $feed["manufacturers"], $product_list, $vendor_required, $feed["language_id"], $feed["sql_code"], $feed["use_categories"], $feed["product_feed_id"], $feed["use_just_on_products"]);
        if (!$products || !count($products)) {
            $this->log("ERROR: Нет продуктов для экспорта!");
            return "<?xml version=\"1.0\" encoding=\"UTF-8\"?><root>No products</root>";
        }
        $this->log("Найдено " . count($products) . " товаров для экспорта");
        $query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "language`");
        foreach ($query->rows as $result) {
            $languages[$result["code"]] = $result;
        }
        $not_unload = isset($feed["not_unload"]) && $feed["not_unload"] ? explode(",", $feed["not_unload"]) : array();
        $counter = 0;
        foreach ($products as $product_id) {
            if ($not_unload && in_array($product_id, $not_unload)) {
                $this->log("Исключаем товар  c id " . $product_id . ", т.к. он в черном списке");
                continue;
            }
            $pictures_limit = $feed["pictures_limit"];
            $product = $this->getProduct($product_id, $feed["language_id"], $feed["use_categories"], $feed["product_feed_id"]);
            if (isset($feed["exclude_empty_product"]) && $feed["exclude_empty_product"] && (!isset($product["category_id"]) || !$product["category_id"])) {
                continue;
            }
            $counter++;
            if ($counter % 100 == 0) {
                $this->log("Уже обработано " . $counter . " товаров");
            }
            $data = array();
            if (isset($feed["fake_id_table_code"])) {
                $data["id"] = !empty($product[$feed["fake_id_table_code"]]) ? $product[$feed["fake_id_table_code"]] : $product["product_id"];
            } else {
                $data["id"] = $product["product_id"];
            }
            $data["available"] = "true";
            $data["names"] = $product["names"];
            if (isset($stock_statuses[$product["stock_status_id"]])) {
                $data["stock_status_name"] = $stock_statuses[$product["stock_status_id"]];
            } else {
                $data["stock_status_name"] = "";
            }
            $categoryId = $product["category_id"];
            $separ = isset($feed["cat_names_separathor"]) ? $feed["cat_names_separathor"] : " > ";
            if ($this->hasCategoryPath) {
                $data["path"] = $this->getCategoryNames($product["product_id"], $feed["product_feed_id"], $feed["use_categories"], $separ);
            } else {
                $data["path"] = "";
            }
            $data["categoryId"] = $this->safeValue($product["category_id"]);
            $data["code"] = $product["model"];
            $data["tag"] = isset($product["tag"]) ? $product["tag"] : "";
            if (isset($product["meta_title"])) {
                $data["meta_title"] = $product["meta_title"];
            } else {
                if (isset($product["seo_title"])) {
                    $data["meta_title"] = $product["seo_title"];
                } else {
                    $data["meta_title"] = "";
                }
            }
            if (isset($product["meta_h1"])) {
                $data["meta_h1"] = $product["meta_h1"];
            } else {
                if (isset($product["seo_h1"])) {
                    $data["meta_h1"] = $product["seo_h1"];
                } else {
                    $data["meta_h1"] = "";
                }
            }
            $data["meta_description"] = isset($product["meta_description"]) ? $product["meta_description"] : "";
            $data["meta_keyword"] = isset($product["meta_keyword"]) ? $product["meta_keyword"] : "";
            if (isset($product["feed_category_id"])) {
                $data["categoryId"] = $this->safeValue($product["feed_category_id"]);
            }
            $path = $this->getPath($categoryId);
            if ($feed["use_categories"]) {
                $path = $this->getNativePath($categoryId);
            }
            $data["url"] = $this->url->link("product/product", "path=" . $path . "&product_id=" . $product["product_id"]);
            if ($product["special"] < 1) {
                $product["special"] = (double) $product["price"] * (double) $product["special"];
            }
            if (!empty($feed["product_markup"])) {
                if ($feed["product_markup_type"] == 0) {
                    $markup = 1 + $feed["product_markup"] / 100;
                    $prod_special = isset($product["special"]) ? $product["special"] * $markup : 0;
                    $prod_price = $product["price"] * $markup;
                } else {
                    $prod_special = isset($product["special"]) ? $product["special"] + $feed["product_markup"] : 0;
                    $prod_price = $product["price"] + $feed["product_markup"];
                }
            } else {
                $prod_special = isset($product["special"]) ? $product["special"] : 0;
                $prod_price = $product["price"];
            }
            if (!empty($feed["feed_discount"]) && $feed["feed_discount"] != 0) {
                $prod_price = $prod_price - $prod_price * $feed["feed_discount"] / 100;
            }
            if (isset($feed["gp_bundle"]) && $feed["gp_bundle"]) {
                $total_quantity = 0;
                $total_price = 0;
                $total_price_bundle = 0;
                $total_tax = 0;
                $product_bundle = $this->model_catalog_product->getGroupedProductBundleChilds($product_id);
                if (count($product_bundle)) {
                    foreach ($product_bundle as $child) {
                        $child_id = $child["child_id"];
                        $child_info = $this->model_catalog_product->getProduct($child["child_id"]);
                        $child_qty = $child["quantity"];
                        $total_quantity += $child_qty;
                        $child_price = (double) $child_info["special"] ? $child_info["special"] : $child_info["price"];
                        foreach ($this->model_catalog_product->getProductOptions($child_id) as $option) {
                            $child_option_value_id = $option["child_option_value_id"];
                            foreach ($option["product_option_value"] as $option_value) {
                                if (is_array($child_option_value_id)) {
                                    foreach ($child_option_value_id as $c_o_v_id) {
                                        if ($c_o_v_id == $option_value["product_option_value_id"]) {
                                            $child_price += $option_value["price_prefix"] . $option_value["price"];
                                        }
                                    }
                                } else {
                                    if ($child_option_value_id == $option_value["product_option_value_id"]) {
                                        $child_price += $option_value["price_prefix"] . $option_value["price"];
                                    }
                                }
                            }
                        }
                        if (!$child["show_in"]) {
                            foreach ($this->model_catalog_product->getGroupedProductBundleChilds($child_id) as $key => $value) {
                                $product_gp = $this->model_catalog_product->getChildChild($this->request->get["product_id"], $child_id, $value["child_id"]);
                                if (isset($product_gp["special"])) {
                                    $child_price += $product_gp["special"] * $product_gp["quantity"];
                                } else {
                                    $child_price += $product_gp["price"] * $product_gp["quantity"];
                                }
                            }
                            if ((double) $child_price) {
                                $total_price += $child_qty * $this->tax->calculate($child_price, $child_info["tax_class_id"], $this->config->get("config_tax"));
                                $total_tax += $child_qty * $child_price;
                            }
                            $total_price_bundle += $child_qty * $this->tax->calculate($child_price, $child_info["tax_class_id"], $this->config->get("config_tax"));
                        }
                    }
                    $data["price"] = number_format($this->currency->convert($this->tax->calculate($total_price_bundle, $product["tax_class_id"]), $shop_currency, $feed_currency), $decimal_place, ".", "");
                    if ($product["special"] && $product["special"] != $data["price"]) {
                        $data["price"] = number_format($this->currency->convert($this->tax->calculate($prod_special, $product["tax_class_id"]), $shop_currency, $feed_currency), $decimal_place, ".", "");
                        $data["oldprice"] = $data["price"];
                    }
                } else {
                    if ($product["special"] && $product["special"] != $product["price"]) {
                        $data["price"] = number_format($this->currency->convert($this->tax->calculate($prod_special, $product["tax_class_id"]), $shop_currency, $feed_currency), $decimal_place, ".", "");
                        $data["oldprice"] = number_format($this->currency->convert($this->tax->calculate($prod_price, $product["tax_class_id"]), $shop_currency, $feed_currency), $decimal_place, ".", "");
                    } else {
                        $data["price"] = number_format($this->currency->convert($this->tax->calculate($prod_price, $product["tax_class_id"]), $shop_currency, $feed_currency), $decimal_place, ".", "");
                    }
                }
            } else {
                if ($product["special"] && $product["special"] != $product["price"]) {
                    $data["price"] = number_format($this->currency->convert($this->tax->calculate($prod_special, $product["tax_class_id"]), $shop_currency, $feed_currency), $decimal_place, ".", "");
                    $data["oldprice"] = number_format($this->currency->convert($this->tax->calculate($prod_price, $product["tax_class_id"]), $shop_currency, $feed_currency), $decimal_place, ".", "");
                } else {
                    $data["price"] = number_format($this->currency->convert($this->tax->calculate($prod_price, $product["tax_class_id"]), $shop_currency, $feed_currency), $decimal_place, ".", "");
                }
            }
            $this->load->model("account/customer_group");
            $user_groups = $this->model_account_customer_group->getCustomerGroups();
            if ($this->hasDiscountTable) {
                $data["discount"] = array();
                foreach ($user_groups as $user_group) {
                    $discount_price = $this->getDiscountForUserGroup($product["product_id"], $user_group["customer_group_id"]);
                    if ($discount_price) {
                        $data["discount"][$user_group["customer_group_id"]] = number_format($this->currency->convert($this->tax->calculate($discount_price, $product["tax_class_id"]), $shop_currency, $feed_currency), $decimal_place, ".", "");
                    }
                }
            }
            if ($this->hasSpecialTable) {
                $data["special"] = array();
                foreach ($user_groups as $user_group) {
                    $special_price = $this->getSpecialForUserGroup($product["product_id"], $user_group["customer_group_id"]);
                    if ($special_price < 1) {
                        $special_price = (double) $product["price"] * (double) $special_price;
                    }
                    if ($special_price) {
                        $data["special"][$user_group["customer_group_id"]] = number_format($this->currency->convert($this->tax->calculate($special_price, $product["tax_class_id"]), $shop_currency, $feed_currency), $decimal_place, ".", "");
                    }
                }
            }
            $quantity = $product["quantity"];
            if ($feed["use_warehouse_quantity"] == 1 && $feed["warehouses"]) {
                $warehouse_quantity = $this->getProductWarehouseQuantity($product_id, $feed["warehouses"]);
                $quantity = $warehouse_quantity ? $warehouse_quantity : 0;
            }
            $data["quantity"] = $quantity;
            $data["currencyId"] = $this->safeValue($feed_currency);
            if ($product["image"]) {
                $check = $this->checkImageGDError($product["image"]);
                if ($check) {
                    if ($feed["use_original_images"]) {
                        $image = $server_url . "image/" . $product["image"];
                    } else {
                        $image = $this->model_tool_image->resize($product["image"], $feed["image_width"], $feed["image_height"]);
                    }
                    $data["image"][] = $this->safeValue(str_replace(" ", "%20", $image));
                    $this->log("Основное изображение товара " . $image);
                    $pictures_limit--;
                } else {
                    $this->log("Отсутствует изображение: " . $product["image"] . " у продукта id=" . $product["product_id"]);
                    if ($feed["image_pass"] == 1) {
                        $image = $this->model_tool_image->resize("no_image.png", $feed["image_width"] ? $feed["image_width"] : 200, $feed["image_height"] ? $feed["image_height"] : 200);
                        $data["image"][] = $this->safeValue(str_replace(" ", "%20", $image));
                        $this->log("Основное изображение товара " . $image);
                        $pictures_limit--;
                    }
                }
            }
            $data["name"] = $this->safeValue($product["name"]);
            foreach ($languages as $language) {
                $data["name_" . str_replace("-", "_", $language["code"])] = $this->getProductName($product["product_id"], $language["language_id"]);
            }
            unset($images);
            if ($feed["replace_break"]) {
                if (strpos($this->safeValue($product["description"]), "&lt;br&gt;")) {
                    $data["description"] = str_replace("&lt;br&gt;", "\\n", $this->safeValue($product["description"]));
                }
                if (strpos($this->safeValue($product["description"]), "&lt;br/&gt;")) {
                    $data["description"] = str_replace("&lt;br/&gt;", "\\n", $this->safeValue($product["description"]));
                }
                if (strpos($this->safeValue($product["description"]), "&lt;br /&gt;")) {
                    $data["description"] = str_replace("&lt;br /&gt;", "\\n", $this->safeValue($product["description"]));
                }
                foreach ($languages as $language) {
                    $desc_lang = "description_" . str_replace("-", "_", $language["code"]);
                    $data[$desc_lang] = $this->getProductDescription($product["product_id"], $language["language_id"]);
                    if (strpos($this->safeValue($data[$desc_lang]), "&lt;br&gt;")) {
                        $data[$desc_lang] = str_replace("&lt;br&gt;", "\\n", $this->safeValue($data[$desc_lang]));
                    }
                    if (strpos($this->safeValue($data[$desc_lang]), "&lt;br/&gt;")) {
                        $data[$desc_lang] = str_replace("&lt;br/&gt;", "\\n", $this->safeValue($data[$desc_lang]));
                    }
                    if (strpos($this->safeValue($data[$desc_lang]), "&lt;br /&gt;")) {
                        $data[$desc_lang] = str_replace("&lt;br /&gt;", "\\n", $this->safeValue($data[$desc_lang]));
                    }
                }
            } else {
                $data["description"] = $this->safeValue($product["description"]);
                foreach ($languages as $language) {
                    $data["description_" . str_replace("-", "_", $language["code"])] = $this->getProductDescription($product["product_id"], $language["language_id"]);
                }
            }
            $data["description_no_html"] = $this->safeValue(strip_tags(html_entity_decode($product["description"], ENT_QUOTES, "UTF-8")));
            foreach ($languages as $language) {
                $data["description_no_html_" . str_replace("-", "_", $language["code"])] = $this->safeValue(strip_tags(html_entity_decode($this->getProductDescription($product["product_id"], $language["language_id"]), ENT_QUOTES, "UTF-8")));
            }
            $data["model"] = $this->safeValue($product["model"]);
            $data["vendor"] = $this->safeValue($product["manufacturer"]);
            $data["manufacturer"] = $this->safeValue($product["manufacturer"]);
            $data["vendorCode"] = $this->safeValue($product["sku"]);
            $data["sku"] = $this->safeValue($product["sku"]);
            $data["group"] = 0;
            if ($this->config->get("neoseo_product_variations_status") == 1 && $is_variation) {
                $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_variation_value WHERE product_id = " . (int) $product["product_id"] . " and variation_product_main = 1");
                if ($query->num_rows) {
                    $data["group"] = (int) $query->row["variation_product_id"];
                    $query_product_variation = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_variation_value WHERE variation_product_id = " . (int) $product["product_id"] . " GROUP BY variation_id");
                    if ($query_product_variation->num_rows) {
                        $data["group"] = (int) $query->row["variation_product_id"];
                        $data["group_params"] = array();
                        foreach ($query_product_variation->rows as $row) {
                            $data["group_params"][] = array("name" => $cache_variations[$row["variation_id"]], "value" => $cache_value_variations[$row["variation_value_id"]]);
                        }
                    }
                }
            }
            $attributeGroups = $this->getProductAttributes($product["product_id"], $feed["language_id"]);
            if (0 < count($attributeGroups)) {
                foreach ($attributeGroups as $attributeGroup) {
                    foreach ($attributeGroup["attribute"] as $attribute) {
                        if (!isset($data["attributes"])) {
                            $data["attributes"] = array();
                        }
                        $data["attributes"][] = array("id" => $this->safeValue($attribute["attribute_id"]), "name" => $this->safeValue($attribute["name"]), "value" => $this->safeValue($attribute["text"]));
                    }
                }
            }
            unset($attributeGroups);
            if ($this->config->get("neoseo_filter_show_attributes")) {
                $attributeFilterGroups = $this->getProductFilterAttributes($product["product_id"], $feed["language_id"]);
                if (0 < count($attributeFilterGroups)) {
                    foreach ($attributeFilterGroups as $attributeFilterGroup) {
                        foreach ($attributeFilterGroup["attribute"] as $filter_attribute) {
                            if (!isset($data["filter_attributes"])) {
                                $data["filter_attributes"] = array();
                            }
                            $data["filter_attributes"][] = array("name" => $this->safeValue($filter_attribute["name"]), "value" => $this->safeValue($filter_attribute["text"]));
                        }
                    }
                }
                unset($attributeFilterGroups);
            }
            $options = $this->getProductOptions($product["product_id"], $feed["language_id"]);
            $relateds = $this->hasRelatedoptions ? $this->getProductRelated($product["product_id"]) : array();
            if (0 < count($options)) {
                $product_option_value_data = array();
                $cartesianData = array();
                $option_values = array();
                $optionNames = array();
                $optionValueNames = array();
                foreach ($options as $product_option) {
                    foreach ($product_option["product_option_value"] as $product_option_value) {
                        $quantity = $product_option_value["quantity"];
                        if ($feed["use_warehouse_quantity"] == 1 && $feed["warehouses"]) {
                            $warehouse_quantity = $this->getProductOptionWarehouseQuantity($product_id, $product_option_value["product_option_value_id"], $feed["warehouses"]);
                            $quantity = $warehouse_quantity ? $warehouse_quantity : 0;
                        }
                        $item = array("id" => $this->safeValue($product_option_value["option_value_id"]), "name" => $this->safeValue($product_option["name"]), "value" => $this->safeValue($product_option_value["name"]), "quantity" => $this->safeValue($quantity));
                        if ($isExistsOptionSku) {
                            $item["sku"] = $this->safeValue($product_option_value["sku"]);
                        }
                        if ($isExistsOptionModel) {
                            $item["model"] = $this->safeValue($product_option_value["model"]);
                        }
                        if (isset($option_values[$item["name"]])) {
                            $option_values[$item["name"]] .= ", ";
                        } else {
                            $option_values[$item["name"]] = "";
                        }
                        $option_values[$item["name"]] .= $item["value"];
                        $optionNames[$product_option["option_id"]] = $item["name"];
                        $optionValueNames[$product_option_value["option_value_id"]] = $item["value"];
                        if (!isset($cartesianData[$product_option["option_id"]])) {
                            $cartesianData[$product_option["option_id"]] = array();
                        }
                        $cartesianData[$product_option["option_id"]][] = $product_option_value["option_value_id"];
                        if (!empty($feed["product_markup"])) {
                            if ($feed["product_markup_type"] == 0) {
                                $prod_price = $product["price"] * (1 + $feed["product_markup"] / 100);
                            } else {
                                $prod_price = $product["price"] + $feed["product_markup"];
                            }
                        } else {
                            $prod_price = $product["price"];
                        }
                        if (!empty($feed["product_markup"])) {
                            if ($feed["product_markup_type"] == 0) {
                                $prod_price_special = $product["special"] * (1 + $feed["product_markup"] / 100);
                            } else {
                                $prod_price_special = $product["special"] + $feed["product_markup"];
                            }
                        } else {
                            $prod_price_special = $product["special"];
                        }
                        if (!empty($feed["product_markup_option"])) {
                            if ($feed["product_markup_type"] == 0) {
                                $opt_price = $product_option_value["price"] * (1 + $feed["product_markup_option"] / 100);
                            } else {
                                $opt_price = $product_option_value["price"] + $feed["product_markup_option"];
                            }
                        } else {
                            $opt_price = $product_option_value["price"];
                        }
                        if (!empty($feed["product_markup_option"])) {
                            if ($feed["product_markup_type"] == 0) {
                                $opt_price_special = $product_option_value["special"] * (1 + $feed["product_markup_option"] / 100);
                            } else {
                                $opt_price_special = $product_option_value["special"] + $feed["product_markup_option"];
                            }
                        } else {
                            $opt_price_special = $product_option_value["special"];
                        }
                        if ($product_option_value["price_prefix"] == "+") {
                            $item["price"] = $prod_price + $opt_price;
                        } else {
                            if ($product_option_value["price_prefix"] == "-") {
                                $item["price"] = $prod_price - $opt_price;
                            } else {
                                if ($product_option_value["price_prefix"] == "*") {
                                    $item["price"] = $prod_price * $opt_price;
                                } else {
                                    if ($product_option_value["price_prefix"] == "/") {
                                        $item["price"] = $prod_price / $opt_price;
                                    } else {
                                        if ($product_option_value["price_prefix"] == "=") {
                                            $item["price"] = $opt_price;
                                        } else {
                                            $item["price"] = "0";
                                        }
                                    }
                                }
                            }
                        }
                        if ($product_option_value["price_prefix"] == "+") {
                            $item["special"] = $prod_price_special + $opt_price_special;
                        } else {
                            if ($product_option_value["price_prefix"] == "-") {
                                $item["special"] = $prod_price_special - $opt_price_special;
                            } else {
                                if ($product_option_value["price_prefix"] == "*") {
                                    $item["special"] = $prod_price_special * $opt_price_special;
                                } else {
                                    if ($product_option_value["price_prefix"] == "/") {
                                        $item["special"] = $prod_price_special / $opt_price_special;
                                    } else {
                                        if ($product_option_value["price_prefix"] == "=") {
                                            $item["special"] = $opt_price_special;
                                        } else {
                                            $item["special"] = "0";
                                        }
                                    }
                                }
                            }
                        }
                        $item["price"] = number_format($this->currency->convert($this->tax->calculate($item["price"], $product["tax_class_id"]), $shop_currency, $feed_currency), $decimal_place, ".", "");
                        $item["special"] = number_format($this->currency->convert($this->tax->calculate($item["special"], $product["tax_class_id"]), $shop_currency, $feed_currency), $decimal_place, ".", "");
                        $product_option_value_data[] = $item;
                    }
                }
                $data["options"] = $product_option_value_data;
                $data["option_values"] = $option_values;
                $cartesian = $this->cartesian($cartesianData);
                $data["cartesian"] = array();
                foreach ($cartesian as $cartesian1) {
                    $key = "";
                    $cartesian2 = array();
                    foreach ($cartesian1 as $option_id_1 => $option_value_id_1) {
                        if ($key != "") {
                            $key .= "-";
                        }
                        $key .= $option_id_1 . "-" . $option_value_id_1;
                        $cartesian2[$optionNames[$option_id_1]] = $optionValueNames[$option_value_id_1];
                    }
                    $data["cartesian"][$key] = $cartesian2;
                }
            }
            $data["relateds"] = array();
            if (0 < count($relateds)) {
                $this->log("Обрабатываем связанные");
                if ($product["image"]) {
                    $check = $this->checkImageGDError($product["image"]);
                    if ($check) {
                        if ($feed["use_original_images"]) {
                            $image = $server_url . "image/" . $product["image"];
                        } else {
                            $image = $this->model_tool_image->resize($product["image"], $feed["image_width"], $feed["image_height"]);
                        }
                        $image = $this->safeValue(str_replace(" ", "%20", $image));
                    } else {
                        $this->log("Отсутствует изображение: " . $product["image"] . " у продукта id=" . $product["product_id"]);
                        if ($feed["image_pass"] == 1) {
                            $image = $this->model_tool_image->resize("no_image.png", $feed["image_width"] ? $feed["image_width"] : 200, $feed["image_height"] ? $feed["image_height"] : 200);
                        }
                    }
                }
                $data["relateds"][0] = array("id" => 0, "quantity" => $product["quantity"], "model" => $this->safeValue($product["model"]), "image" => $image, "price" => $data["price"]);
                foreach ($relateds as $key => $related) {
                    $price = 0;
                    foreach ($related["option"] as $value) {
                        $options_related = array_filter($options, function ($param) use($value) {
                            return $param["option_id"] == $value["option_id"];
                        });
                        $option_related = array_shift($options_related);
                        $options_related_value = array_filter($option_related["product_option_value"], function ($param) use($value) {
                            return $param["option_value_id"] == $value["option_value_id"];
                        });
                        $option_related_value = array_shift($options_related_value);
                        $image = "";
                        if ($this->hasProductImageByOption) {
                            $query_image = $this->db->query("SELECT * FROM `" . DB_PREFIX . "product_image` pi WHERE product_image_id IN (SELECT product_image_id FROM `" . DB_PREFIX . "product_image_by_option` pibo WHERE pibo.option_value_id = '" . $option_related_value["option_value_id"] . "' AND pibo.product_id = '" . $product["product_id"] . "')");
                            if (0 < $query_image->num_rows && $image["image"]) {
                                $check = $this->checkImageGDError($query_image->row["image"]);
                                if ($check) {
                                    if ($feed["use_original_images"]) {
                                        $image = $server_url . "image/" . $query_image->row["image"];
                                    } else {
                                        $image = $this->model_tool_image->resize($query_image->row["image"], $feed["image_width"], $feed["image_height"]);
                                    }
                                    $image = $this->safeValue(str_replace(" ", "%20", $image));
                                } else {
                                    $this->log("Отсутствует изображение: " . $query_image->row["image"] . " у продукта id=" . $product["product_id"]);
                                    if ($feed["image_pass"] == 1) {
                                        $image = $this->model_tool_image->resize("no_image.png", $feed["image_width"] ? $feed["image_width"] : 200, $feed["image_height"] ? $feed["image_height"] : 200);
                                    }
                                }
                            }
                        }
                        if (!isset($data["relateds"][$key])) {
                            $data["relateds"][$key] = array("id" => $key, "quantity" => $related["quantity"], "model" => $related["model"], "image" => $image);
                        } else {
                            $data["relateds"][$key]["image"] = $image;
                        }
                        if (!empty($feed["product_markup"])) {
                            if ($feed["product_markup_type"] == 0) {
                                $prod_price = $product["price"] * (1 + $feed["product_markup"] / 100);
                            } else {
                                $prod_price = $product["price"] + $feed["product_markup"];
                            }
                        } else {
                            $prod_price = $product["price"];
                        }
                        if (!empty($feed["product_markup_option"])) {
                            if ($feed["product_markup_type"] == 0) {
                                $opt_price = $option_related_value["price"] * (1 + $feed["product_markup_option"] / 100);
                            } else {
                                $opt_price = $option_related_value["price"] + $feed["product_markup_option"];
                            }
                        } else {
                            $opt_price = $option_related_value["price"];
                        }
                        if ($option_related_value["price_prefix"] == "+") {
                            $price = $prod_price + $opt_price;
                        } else {
                            if ($option_related_value["price_prefix"] == "-") {
                                $price = $prod_price - $opt_price;
                            } else {
                                if ($option_related_value["price_prefix"] == "=") {
                                    $price = $opt_price;
                                } else {
                                    $price = "0";
                                }
                            }
                        }
                        $data["relateds"][$key]["price"] = number_format($this->currency->convert($this->tax->calculate($price, $product["tax_class_id"]), $shop_currency, $feed_currency), $decimal_place, ".", "");
                        $data["relateds"][$key][str_replace(" ", "", $option_related["name"])] = $option_related_value["name"];
                    }
                }
            }
            $this->log("Получаем дополнительные изображения товара:" . $product["product_id"]);
            $images = $this->model_catalog_product->getProductImages($product["product_id"]);
            $this->log("Количество изображений " . count($images));
            foreach ($images as $image) {
                if ($pictures_limit <= 0) {
                    $this->log("Прекращаем обработку изображений товара:" . $product["product_id"]);
                    break;
                }
                if (!isset($image["image"]) || !$image["image"]) {
                    continue;
                }
                $pictures_limit--;
                $check = $this->checkImageGDError($image["image"]);
                if ($check) {
                    if ($feed["use_original_images"]) {
                        $image = $server_url . "image/" . $image["image"];
                    } else {
                        $image = $this->model_tool_image->resize($image["image"], $feed["image_width"], $feed["image_height"]);
                    }
                    $data["image"][] = $this->safeValue(str_replace(" ", "%20", $image));
                    $this->log("Добавляем изображение товара:" . $image);
                } else {
                    $this->log("Отсутствует изображение: " . $image["image"] . " у продукта id=" . $product["product_id"]);
                    if ($feed["image_pass"] == 1) {
                        $image = $this->model_tool_image->resize("no_image.png", $feed["image_width"] ? $feed["image_width"] : 200, $feed["image_height"] ? $feed["image_height"] : 200);
                        $data["image"][] = $this->safeValue(str_replace(" ", "%20", $image));
                        $this->log("Добавляем изображение товара:" . $image);
                    }
                }
            }
            $feed_ukrcredits = array();
            $data["ukrcredits_type"] = "";
            if (isset($feed["ukrcredits"]) && $feed["ukrcredits"]) {
                $this->log("Проверяем наличие рассрочки у товара");
                $ukrcredits_settings = $this->config->get("ukrcredits_settings");
                if ($ukrcredits_settings) {
                    $ukrcredits = explode(",", $feed["ukrcredits"]);
                    foreach ($ukrcredits as $ukrcredit_type) {
                        if ($ukrcredit_type == 1 && $ukrcredits_settings["pp_status"] == 1) {
                            $pp_product_allowed = $ukrcredits_settings["pp_product_allowed"];
                            if ($pp_product_allowed && in_array($product["product_id"], $pp_product_allowed) && !in_array("ПриватБанк", $feed_ukrcredits)) {
                                $this->log("Товару #" . $product["product_id"] . " доступна рассрочка Оплата частями (ПриватБанк)");
                                $feed_ukrcredits[] = "ПриватБанк";
                            }
                        } else {
                            if ($ukrcredit_type == 2 && $ukrcredits_settings["ii_status"] == 1) {
                                $ii_product_allowed = $ukrcredits_settings["ii_product_allowed"];
                                if ($ii_product_allowed && in_array($product["product_id"], $ii_product_allowed) && !in_array("ПриватБанк", $feed_ukrcredits)) {
                                    $this->log("Товару #" . $product["product_id"] . " доступна рассрочка Мгновенная рассрочка (ПриватБанк)");
                                    $feed_ukrcredits[] = "ПриватБанк";
                                }
                            } else {
                                if ($ukrcredit_type == 3 && $ukrcredits_settings["mb_status"] == 1) {
                                    $mb_product_allowed = $ukrcredits_settings["mb_product_allowed"];
                                    if ($mb_product_allowed && in_array($product["product_id"], $mb_product_allowed)) {
                                        $this->log("Товару #" . $product["product_id"] . " доступна рассрочка Покупка частями (МоноБанк)");
                                        $feed_ukrcredits[] = "Monobank";
                                    }
                                }
                            }
                        }
                    }
                }
                $data["ukrcredits_type"] = $feed_ukrcredits ? implode(", ", $feed_ukrcredits) : "";
            }
            foreach ($product as $key => $value) {
                if (!isset($data[$key])) {
                    $data[$key] = $this->safeValue($value);
                }
            }
            $this->offers[] = $data;
            unset($product);
        }
        $this->log("Всего обработано " . $counter . " товаров");
        if (!in_array("Twig_Autoloader", get_declared_classes())) {
            $this->library("Twig/Autoloader");
            Twig_Autoloader::register();
        }
        if (2 <= (int) substr(Twig_Environment::VERSION, 0, 1)) {
            $config = array("autoescape" => false, "debug" => false, "auto_reload" => true, "cache" => DIR_CACHE . "template/");
            $loader = new Twig\Loader\ArrayLoader(array("index.html" => $this->safeValue(html_entity_decode($getFormat["format_xml"]))));
            $twig = new Twig\Environment($loader, $config);
        } else {
            $loader = new Twig_Loader_String();
            $twig = new Twig_Environment($loader);
        }
        $filter = new Twig_SimpleFilter("html_entity_decode", "html_entity_decode");
        $twig->addFilter($filter);
        $filter = new Twig_SimpleFilter("strreplace", array($this, "twig_replace_text"));
        $twig->addFilter($filter);
        $twig_array = array("date" => date("Y-m-d H:i"), "date_iso" => date("Y-m-d\\TH:m:s"), "url" => $this->config->get("config_url"), "currency" => $this->feed_currency, "categories" => $this->categories, "offers" => $this->offers);
        $this->load->model("localisation/currency");
        foreach ($this->model_localisation_currency->getCurrencies() as $currency) {
            $twig_array["FROM_" . strtoupper($currency["code"])] = floatval($currency["value"]);
        }
        if (2 <= (int) substr(Twig_Environment::VERSION, 0, 1)) {
            $render_twig = str_replace("&amp;", "&amp;amp;", $twig->render("index.html", $twig_array));
        } else {
            $render_twig = $twig->render($this->safeValue(str_replace("&amp;", "&amp;amp;", $getFormat["format_xml"])), $twig_array);
        }
        $result = html_entity_decode($render_twig);
        if ($this->config->get("neoseo_product_feed_check_encode")) {
            if (!$this->check_utf8($result)) {
                $this->log("Обнаружена неправильная кодировка (c8)!");
                $result = mb_convert_encoding($result, "UTF-8", "UTF-8");
            }
            if (!mb_check_encoding($result, "UTF-8")) {
                $this->log("Обнаружена неправильная кодировка (mbce)!");
                $result = mb_convert_encoding($result, "UTF-8", "UTF-8");
            }
        }
        $this->log("Формирование данных для " . $feed["feed_name"] . " завершено.");
        return $result;
    }
    public function getDiscountForUserGroup($product_id, $customer_group_id)
    {
        if (!true) {
            return "";
        }
        $query = $this->db->query("SELECT price FROM " . DB_PREFIX . "product_discount WHERE product_id = " . (int) $product_id . " AND customer_group_id = " . (int) $customer_group_id . " ORDER BY quantity ASC LIMIT 1");
        if (!$query->num_rows) {
            return false;
        }
        $discount = $query->row["price"];
        return $discount;
    }
    /**
     * Product special (Акции товара) - Возвращает акцию для товара и группы покупателя
     * @param int $product_id
     * @param int $customer_group_id
     * @return float
     */
    public function getSpecialForUserGroup($product_id, $customer_group_id)
    {
        if (!true) {
            return "";
        }
        $query = $this->db->query("SELECT price FROM " . DB_PREFIX . "product_special WHERE product_id = " . (int) $product_id . " AND customer_group_id = " . (int) $customer_group_id . " ORDER BY priority ASC LIMIT 1");
        if (!$query->num_rows) {
            return false;
        }
        $discount = $query->row["price"];
        return $discount;
    }
    /**
     * Категории товаров
     *
     * @param string $name - название рубрики
     * @param int $id - id рубрики
     * @param int $parent_id - id родительской рубрики
     * @param int $use_categories - id используемой категории, 0 - встроенные
     * @return bool
     */
    private function setCategory($name, $id, $parent_id = 0, $use_categories = 0)
    {
        if (!true) {
            return "";
        }
        $id = (int) $id;
        if ($id < 1 || trim($name) == "" || $use_categories == $id) {
            return false;
        }
        if (0 < (int) $parent_id && $parent_id != $use_categories) {
            $this->categories[$id] = array("id" => $id, "parentId" => (int) $parent_id, "name" => $this->safeValue($name), "url" => $this->url->link("product/category", "path=" . $id));
        } else {
            $this->categories[$id] = array("id" => $id, "name" => $this->safeValue($name), "url" => $this->url->link("product/category", "path=" . $id));
        }
        return true;
    }
    private function setNativeCategory($name, $id, $parent_id = 0)
    {
        if (!true) {
            return "";
        }
        $id = (int) $id;
        if ($id < 1 || trim($name) == "") {
            return false;
        }
        if (0 < (int) $parent_id) {
            $this->native_categories[$id] = array("id" => $id, "parentId" => (int) $parent_id, "name" => $this->safeValue($name));
        } else {
            $this->native_categories[$id] = array("id" => $id, "name" => $this->safeValue($name));
        }
        return true;
    }
    private function check_utf8($str)
    {
        if (!true) {
            return "";
        }
        $len = strlen($str);
        for ($i = 0; $i < $len; $i++) {
            $c = ord($str[$i]);
            if (128 < $c) {
                if (247 < $c) {
                    return false;
                }
                if (239 < $c) {
                    $bytes = 4;
                } else {
                    if (223 < $c) {
                        $bytes = 3;
                    } else {
                        if (191 < $c) {
                            $bytes = 2;
                        } else {
                            return false;
                        }
                    }
                }
                if ($len < $i + $bytes) {
                    return false;
                }
                while (1 < $bytes) {
                    $i++;
                    $b = ord($str[$i]);
                    if ($b < 128 || 191 < $b) {
                        return false;
                    }
                    $bytes--;
                }
            }
        }
        return true;
    }
    /**
     * Запрещаем любые html-тэги, стандарт XML не допускает использования в текстовых данных
     * непечатаемых символов с ASCII-кодами в диапазоне значений от 0 до 31 (за исключением
     * символов с кодами 9, 10, 13 - табуляция, перевод строки, возврат каретки). Также этот
     * стандарт требует обязательной замены некоторых символов на их символьные примитивы.
     * @param string $text
     * @return string
     */
    private function safeValue($field)
    {
        if (!true) {
            return "";
        }
        $field = htmlspecialchars_decode($field);
        $from = array("&nbsp;", "&", ">", "<", "'", "\"");
        $to = array(" ", "&amp;", "&gt;", "&lt;", "&apos;", "&quot;");
        $field = str_replace($from, $to, $field);
        $field = preg_replace("/[^\\x{0009}\\x{000a}\\x{000d}\\x{0020}-\\x{D7FF}\\x{E000}-\\x{FFFD}]+/u", " ", $field);
        $fields_rebuild = array();
        preg_match_all("/\\{\\%.*\\%\\}/iu", $field, $fields_rebuild);
        if ($fields_rebuild && count($fields_rebuild[0])) {
            foreach ($fields_rebuild[0] as $restore_operators) {
                $to = array(">", "<", "'", "\"");
                $from = array("&gt;", "&lt;", "&apos;", "&quot;");
                $clean_restore_operators = str_replace($from, $to, $restore_operators);
                $field = str_replace($restore_operators, $clean_restore_operators, $field);
            }
        }
        return trim($field);
    }
    protected function getPath($category_id, $current_path = "")
    {
        if (!true) {
            return "";
        }
        if (isset($this->categories[$category_id])) {
            $this->categories[$category_id]["export"] = 1;
            if (!$current_path) {
                $new_path = $this->categories[$category_id]["id"];
            } else {
                $new_path = $this->categories[$category_id]["id"] . "_" . $current_path;
            }
            if (isset($this->categories[$category_id]["parentId"]) && $this->categories[$category_id]["parentId"] != $category_id) {
                return $this->getPath($this->categories[$category_id]["parentId"], $new_path);
            }
            return $new_path;
        }
    }
    protected function getNativePath($category_id, $current_path = "")
    {
        if (!true) {
            return "";
        }
        if (isset($this->native_categories[$category_id])) {
            $this->native_categories[$category_id]["export"] = 1;
            if (!$current_path) {
                $new_path = $this->native_categories[$category_id]["id"];
            } else {
                $new_path = $this->native_categories[$category_id]["id"] . "_" . $current_path;
            }
            if (isset($this->native_categories[$category_id]["parentId"]) && $this->native_categories[$category_id]["parentId"] != $category_id) {
                return $this->getNativePath($this->native_categories[$category_id]["parentId"], $new_path);
            }
            return $new_path;
        }
    }
    protected function checkImageGDError($filename)
    {
        if (!true) {
            return "";
        }
        try {
            if (file_exists(DIR_IMAGE . $filename)) {
                $image = new Image(DIR_IMAGE . $filename);
                unset($image);
                $res = true;
            } else {
                $res = false;
            }
        } catch (Exception $e) {
            $res = false;
        }
        return $res;
    }
    public function filterCategory($category)
    {
        if (!true) {
            return "";
        }
        return isset($category["export"]);
    }
    public function library($library)
    {
        if (!true) {
            return "";
        }
        $file = DIR_SYSTEM . "library/" . $library . ".php";
        if (file_exists($file)) {
            require_once $file;
        } else {
            trigger_error("Error: Could not load library" . $file . "!");
            exit;
        }
    }
    public function twig_replace_text()
    {
        if (!true) {
            return "";
        }
        $arguments = func_get_args();
        return str_replace($arguments[1], $arguments[2], $arguments[0]);
    }
    private function getStockStatuses($lang_id)
    {
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "stock_status WHERE language_id = '" . (int) $lang_id . "' ");
        $stock_status = array();
        foreach ($query->rows as $row) {
            $stock_status[$row["stock_status_id"]] = $row["name"];
        }
        return $stock_status;
    }
    private function addAccessLevels()
    {
    }
}
if (!function_exists("array_column")) {
}

?>