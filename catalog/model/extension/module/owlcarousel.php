<?php class ModelExtensionModuleOwlCarousel extends Model {

    // private $use_cache = true;

    public function setCache($use_cache = false) {
        $this->use_cache = $use_cache;
    }

    public function __construct($registry) {
        parent::__construct($registry);
    }

    public function getProducts($data = array()) {
        $current_product_id = isset($this->request->get['product_id']) ? $this->request->get['product_id'] : 0;

        if($this->use_cache) {
            $data['language_id'] = (int)$this->config->get('config_language_id');
            $data['store_id'] = (int)$this->config->get('config_store_id');
            $data['customer_id'] = (int)$this->config->get('config_customer_group_id');
            $data['current_product_id'] = $current_product_id;

            $cachename = 'owlcarousel.getproducts.' . md5(http_build_query($data));
            $cache = $this->cache->get($cachename);
            if ($cache) {
                return $cache;
            }
        }
        
        $sql = "SELECT 
            p.product_id, 
            (
                SELECT 
                    AVG(rating) AS total 
                FROM 
                    " . DB_PREFIX . "review r1 
                WHERE 
                    r1.product_id = p.product_id 
                AND 
                    r1.status = '1' 
                GROUP BY 
                    r1.product_id) AS rating, 
                    (
                        SELECT 
                            price 
                        FROM 
                            " . DB_PREFIX . "product_special ps 
                        WHERE 
                            ps.product_id = p.product_id 
                        AND 
                            ps.customer_group_id = '" . (int)$this->config->get('config_customer_group_id') . "' 
                        AND 
                            ((ps.date_start = '0000-00-00' OR ps.date_start < NOW()) 
                        AND 
                            (ps.date_end = '0000-00-00' OR ps.date_end > NOW())) 
                        ORDER BY 
                            ps.priority ASC, 
                            ps.price ASC 
                        LIMIT 1
                    ) AS special, 
                    (
                        SELECT 
                            COUNT(*) AS total 
                        FROM 
                            " . DB_PREFIX . "order_product op 
                        LEFT JOIN 
                            `" . DB_PREFIX . "order` o 
                        ON 
                            (op.order_id = o.order_id) 
                        WHERE 
                            o.order_status_id > '0' 
                        AND 
                            op.product_id = p.product_id 
                        GROUP BY 
                            op.product_id) as topsellers 
                        FROM 
                            " . DB_PREFIX . "product p 
                        LEFT JOIN 
                            " . DB_PREFIX . "product_description pd 
                        ON 
                            (p.product_id = pd.product_id) 
                        LEFT JOIN 
                            " . DB_PREFIX . "product_to_store p2s 
                        ON 
                            (p.product_id = p2s.product_id)"; 

        $sql .= " LEFT JOIN 
                " . DB_PREFIX . "product_to_category p2c 
            ON 
                (p.product_id = p2c.product_id)";
        
        $sql .= " WHERE
                pd.language_id = '" . (int)$this->config->get('config_language_id') . "' 
            AND 
                p.status = '1' 
            AND 
                p.date_available <= NOW() 
            AND 
                p2s.store_id = '" . (int)$this->config->get('config_store_id') . "'"; 
            
        if (!empty($data['show_stock'])) {
            $sql .= " AND p.quantity > '0' ";
        }   

        if (!empty($data['show_current_product'])) {
            $sql .= " AND p.product_id != '" .(int)$current_product_id. "' ";
        }

        if (!empty($data['filter_category_id'])) {
            if (!empty($data['filter_sub_category'])) {
                $implode_data = array();
                $implode_data[] = "p2c.category_id = '" . (int)$data['filter_category_id'] . "'";
                
                $this->load->model('catalog/category');
                
                $categories = $this->getCategoriesByParentId($data['filter_category_id']);

                foreach ($categories as $category_id) {
                    $implode_data[] = "p2c.category_id = '" . (int)$category_id . "'";
                }
                            
                $sql .= " AND (" . implode(' OR ', $implode_data) . ")";
            } else {
                $sql .= " AND p2c.category_id = '" . (int)$data['filter_category_id'] . "'";
            }
        }

        if (!empty($data['filter_manufacturer_id'])) {
            $sql .= " AND p.manufacturer_id = '" . (int)$data['filter_manufacturer_id'] . "'";
        }
        
        $sql .= " GROUP BY p.product_id";
        
        if ($data['sort'] == 'special') {
            $sql .= " HAVING special IS NOT NULL";
        }

        if ($data['sort'] == 'topsellers') {
            $sql .= " HAVING topsellers IS NOT NULL";
        }

        $sort_data = array(
            'p.date_added',
            'special',
            'topsellers',
            'rating',
            'p.price',
            'p.viewed',
            'p.sort_order'
        );
        
        if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
            $sql .= " ORDER BY " . $data['sort'];    
        }
            
        if ($data['order'] == 'ASC') {
            $sql .= " ASC";
        } else {
            $sql .= " DESC";
        }
        
        if ($data['start'] < 0) {
            $data['start'] = 0;
        }
                
        $sql .= " LIMIT " . (int)$data['limit'];

        $product_data = array();    
        $query = $this->db->query($sql);

        foreach ($query->rows as $result) {
            $product_data[$result['product_id']] = $this->getProduct($result['product_id']);
        }

        if($this->use_cache) {
            $this->cache->set($cachename, $product_data);
        }

        return $product_data;    
    }
    
    public function getCategoriesByParentId($category_id) {
        if($this->use_cache) {
            $cachename = 'owlcarousel.getcategoriesbyparentid.' . $category_id;
            $cache = $this->cache->get($cachename);
            if (!$cache || !is_array($cache)) {
                $cache = array();
            }
            if ($cache && isset($cache[$category_id])) {
                return $cache[$category_id];
            }
        }

        $category_data = array();
        $category_query = $this->db->query("SELECT category_id FROM " . DB_PREFIX . "category WHERE parent_id = '" . (int)$category_id . "'");

        foreach ($category_query->rows as $category) {
            $category_data[] = $category['category_id'];
            $children = $this->getCategoriesByParentId($category['category_id']);

            if ($children) {
                $category_data = array_merge($children, $category_data);
            }            
        }

        if($this->use_cache) {
            $cache[$category_id] = $category_data;
            $this->cache->set($cachename, $cache);
        }

        return $category_data;
    }

    public function getCategoriesByProductId($product_id) {
        if($this->use_cache) {
            $cachename = 'owlcarousel.getcategoriesbyproductid.' . $product_id;
            $cache = $this->cache->get($cachename);
            if (!$cache || !is_array($cache)) {
                $cache = array();
            }

            if ($cache && isset($cache[$product_id])) {
                return $cache[$product_id];
            }
        }

        $category_query = $this->db->query("SELECT category_id FROM " . DB_PREFIX . "product_to_category WHERE product_id = '" .$product_id. "' LIMIT 0, 1 ");

        $category_id = false;
        if ($category_query->num_rows){
            if ($category_query->row['category_id']) {
                $category_id = $category_query->row['category_id'];
            }
        }

        if($this->use_cache) {
            $cache[$product_id] = $category_id;
            $this->cache->set($cachename, $cache);
        }

        return $category_id;
    }

    public function getProduct($product_id, $data = array()) {        
        $current_product_id = isset($this->request->get['product_id']) ? $this->request->get['product_id'] : 0;

        $data['language_id'] = (int)$this->config->get('config_language_id');
        $data['store_id'] = (int)$this->config->get('config_store_id');
        $data['customer_id'] = (int) $this->config->get('config_customer_group_id');
        $data['current_product_id'] = $current_product_id;

        if($this->use_cache) {
            $cachename = 'owlcarousel.getproduct.' . md5(http_build_query($data));
            $cache = $this->cache->get($cachename);
            if (!$cache || !is_array($cache)) {
                $cache = array();
            }

            if ($cache && isset($cache[$product_id])) {
                return $cache[$product_id];
            }
        }
        
        $query = $this->db->query("SELECT DISTINCT *, pd.name AS name, p.image, m.name AS manufacturer, (SELECT price FROM " . DB_PREFIX . "product_discount pd2 WHERE pd2.product_id = p.product_id AND pd2.customer_group_id = '" . (int)$this->config->get('config_customer_group_id') . "' AND pd2.quantity = '1' AND ((pd2.date_start = '0000-00-00' OR pd2.date_start < NOW()) AND (pd2.date_end = '0000-00-00' OR pd2.date_end > NOW())) ORDER BY pd2.priority ASC, pd2.price ASC LIMIT 1) AS discount, (SELECT price FROM " . DB_PREFIX . "product_special ps WHERE ps.product_id = p.product_id AND ps.customer_group_id = '" . (int)$this->config->get('config_customer_group_id') . "' AND ((ps.date_start = '0000-00-00' OR ps.date_start < NOW()) AND (ps.date_end = '0000-00-00' OR ps.date_end > NOW())) ORDER BY ps.priority ASC, ps.price ASC LIMIT 1) AS special, (SELECT points FROM " . DB_PREFIX . "product_reward pr WHERE pr.product_id = p.product_id AND customer_group_id = '" . (int)$this->config->get('config_customer_group_id') . "') AS reward, (SELECT ss.name FROM " . DB_PREFIX . "stock_status ss WHERE ss.stock_status_id = p.stock_status_id AND ss.language_id = '" . (int)$this->config->get('config_language_id') . "') AS stock_status, (SELECT wcd.unit FROM " . DB_PREFIX . "weight_class_description wcd WHERE p.weight_class_id = wcd.weight_class_id AND wcd.language_id = '" . (int)$this->config->get('config_language_id') . "') AS weight_class, (SELECT lcd.unit FROM " . DB_PREFIX . "length_class_description lcd WHERE p.length_class_id = lcd.length_class_id AND lcd.language_id = '" . (int)$this->config->get('config_language_id') . "') AS length_class, (SELECT AVG(rating) AS total FROM " . DB_PREFIX . "review r1 WHERE r1.product_id = p.product_id AND r1.status = '1' GROUP BY r1.product_id) AS rating, (SELECT COUNT(*) AS total FROM " . DB_PREFIX . "review r2 WHERE r2.product_id = p.product_id AND r2.status = '1' GROUP BY r2.product_id) AS reviews, p.sort_order FROM " . DB_PREFIX . "product p LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id) LEFT JOIN " . DB_PREFIX . "product_to_store p2s ON (p.product_id = p2s.product_id) LEFT JOIN " . DB_PREFIX . "manufacturer m ON (p.manufacturer_id = m.manufacturer_id) WHERE p.product_id = '" . (int)$product_id . "' AND pd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND p.status = '1'" . (!empty($data['show_stock']) ? " AND p.quantity > '0' " : "") . (!empty($data['show_current_product']) ? " AND p.product_id != '" .(int)$current_product_id. "' " : "")  . " AND p.date_available <= NOW() AND p2s.store_id = '" . (int)$this->config->get('config_store_id') . "' ");
        
        if ($query->num_rows) {
            $query->row['price'] = ($query->row['discount'] ? $query->row['discount'] : $query->row['price']);
            $query->row['rating'] = (int)$query->row['rating'];

            if($this->use_cache) {
                $cache[$product_id] = $query->row;
                $this->cache->set($cachename, $cache);
            }

            return $query->row;
        } else {
            return false;
        }
    }
    
} ?>