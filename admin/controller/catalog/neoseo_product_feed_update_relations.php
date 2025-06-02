<?php

require_once DIR_SYSTEM . "/engine/neoseo_controller.php";
class ControllerCatalogNeoSeoProductFeedUpdateRelations extends NeoSeoController
{
    private $error = array();
    public function __construct($registry)
    {
        parent::__construct($registry);
        $this->_moduleSysName = "neoseo_product_feed";
        $this->_logFile = $this->_moduleSysName() . ".log";
        $this->debug = $this->config->get($this->_moduleSysName() . "_debug") == 1;
    }
    public function index()
    {
        $this->load->model("catalog/" . $this->_moduleSysName() . "_update_relations");
        $this->load->model("catalog/category");
        $this->load->model("tool/" . $this->_moduleSysName());
        $this->load->model("catalog/" . $this->_moduleSysName() . "_categories");
        $this->getList();
    }
    protected function getList()
    {
        $data = $this->load->language("catalog/" . $this->_moduleSysName() . "_update_relations");
        $this->document->setTitle($this->language->get("heading_title"));
        if (isset($this->request->get["filter_name"])) {
            $filter_name = $this->request->get["filter_name"];
        } else {
            $filter_name = NULL;
        }
        if (isset($this->request->get["filter_price"])) {
            $filter_price = $this->request->get["filter_price"];
        } else {
            $filter_price = NULL;
        }
        if (isset($this->request->get["filter_category"])) {
            $filter_category = $this->request->get["filter_category"];
        } else {
            $filter_category = NULL;
        }
        if (isset($this->request->get["filter_status"])) {
            $filter_status = $this->request->get["filter_status"];
        } else {
            $filter_status = NULL;
        }
        if (isset($this->request->get["sort"])) {
            $sort = $this->request->get["sort"];
        } else {
            $sort = "pd.name";
        }
        if (isset($this->request->get["order"])) {
            $order = $this->request->get["order"];
        } else {
            $order = "ASC";
        }
        if (isset($this->request->get["page"])) {
            $page = $this->request->get["page"];
        } else {
            $page = 1;
        }
        $url = "";
        if (isset($this->request->get["filter_name"])) {
            $url .= "&filter_name=" . urlencode(html_entity_decode($this->request->get["filter_name"], ENT_QUOTES, "UTF-8"));
        }
        if (isset($this->request->get["filter_price"])) {
            $url .= "&filter_price=" . $this->request->get["filter_price"];
        }
        if (isset($this->request->get["filter_category"])) {
            $url .= "&filter_category=" . $this->request->get["filter_category"];
        }
        if (isset($this->request->get["sort"])) {
            $url .= "&sort=" . $this->request->get["sort"];
        }
        if (isset($this->request->get["order"])) {
            $url .= "&order=" . $this->request->get["order"];
        }
        if (isset($this->request->get["page"])) {
            $url .= "&page=" . $this->request->get["page"];
        }
        $data["breadcrumbs"] = array();
        $data["breadcrumbs"][] = array("text" => $this->language->get("text_home"), "href" => $this->url->link("common/dashboard", "user_token=" . $this->session->data["user_token"], "SSL"));
        $data["breadcrumbs"][] = array("text" => $this->language->get("heading_title"), "href" => $this->url->link("catalog/product", "user_token=" . $this->session->data["user_token"] . $url, "SSL"));
        $data["listFeeds"] = array();
        $data["activeFeed"] = array();
        $data["products"] = array();
        $filter_data = array("filter_name" => $filter_name, "filter_price" => $filter_price, "filter_category" => $filter_category, "sort" => $sort, "order" => $order, "start" => ($page - 1) * $this->config->get("config_limit_admin"), "limit" => $this->config->get("config_limit_admin"));
        $product_total = $this->model_catalog_neoseo_product_feed_update_relations->getTotalProducts($filter_data);
        $results = $this->model_catalog_neoseo_product_feed_update_relations->getProducts($filter_data);
        $listFeeds = $this->model_tool_neoseo_product_feed->getListFeeds(array("where" => "use_categories > 0"));
        if (0 < count($listFeeds)) {
            foreach ($listFeeds as $feed) {
                $data["listFeeds"][$feed["product_feed_id"]] = $feed;
            }
            $activeFeed = isset($this->request->get["feed_id"]) ? $data["listFeeds"][$this->request->get["feed_id"]] : $listFeeds[0];
            $data["activeFeed"] = $activeFeed;
            $data["feedCategories"] = $this->model_catalog_neoseo_product_feed_categories->getCategories(array("where" => "cp.category_id IN(" . $activeFeed["categories"] . ") AND c2.parent_id!=0"));
            $this->load->model("tool/image");
            $filter_data = array("sort" => "name", "order" => "ASC");
            $data["categories"] = $this->model_catalog_category->getCategories($filter_data);
            foreach ($results as $result) {
                $category = $this->model_catalog_neoseo_product_feed_update_relations->getProductCategories($result["product_id"]);
                if (is_file(DIR_IMAGE . $result["image"])) {
                    $image = $this->model_tool_image->resize($result["image"], 40, 40);
                } else {
                    $image = $this->model_tool_image->resize("no_image.png", 40, 40);
                }
                $data["products"][] = array("product_id" => $result["product_id"], "image" => $image, "name" => $result["name"], "price" => $result["price"], "category" => $category, "feed_category_id" => $this->model_catalog_neoseo_product_feed_update_relations->getProductFeedCategory($result["product_id"], $activeFeed["product_feed_id"]));
            }
        }
        $data["user_token"] = $this->session->data["user_token"];
        if (isset($this->error["warning"])) {
            $data["error_warning"] = $this->error["warning"];
        } else {
            $data["error_warning"] = "";
        }
        if (isset($this->session->data["success"])) {
            $data["success"] = $this->session->data["success"];
            unset($this->session->data["success"]);
        } else {
            $data["success"] = "";
        }
        if (isset($this->request->post["selected"])) {
            $data["selected"] = (array) $this->request->post["selected"];
        } else {
            $data["selected"] = array();
        }
        $url = "";
        if (isset($this->request->get["filter_name"])) {
            $url .= "&filter_name=" . urlencode(html_entity_decode($this->request->get["filter_name"], ENT_QUOTES, "UTF-8"));
        }
        if (isset($this->request->get["filter_price"])) {
            $url .= "&filter_price=" . $this->request->get["filter_price"];
        }
        if (isset($this->request->get["filter_category"])) {
            $url .= "&filter_category=" . $this->request->get["filter_category"];
        }
        if ($order == "ASC") {
            $url .= "&order=ASC";
        } else {
            $url .= "&order=DESC";
        }
        if (isset($this->request->get["page"])) {
            $url .= "&page=" . $this->request->get["page"];
        }
        $data["action"] = $this->url->link("catalog/" . $this->_moduleSysName() . "_update_relations", "user_token=" . $this->session->data["user_token"] . $url, "SSL");
        $data["sort_name"] = $this->url->link("catalog/" . $this->_moduleSysName() . "_update_relations", "user_token=" . $this->session->data["user_token"] . "&sort=pd.name" . $url, "SSL");
        $data["sort_price"] = $this->url->link("catalog/" . $this->_moduleSysName() . "_update_relations", "user_token=" . $this->session->data["user_token"] . "&sort=p.price" . $url, "SSL");
        $data["sort_order"] = $this->url->link("catalog/" . $this->_moduleSysName() . "_update_relations", "user_token=" . $this->session->data["user_token"] . "&sort=p.sort_order" . $url, "SSL");
        $url = "";
        if (isset($this->request->get["filter_name"])) {
            $url .= "&filter_name=" . urlencode(html_entity_decode($this->request->get["filter_name"], ENT_QUOTES, "UTF-8"));
        }
        if (isset($this->request->get["filter_price"])) {
            $url .= "&filter_price=" . $this->request->get["filter_price"];
        }
        if (isset($this->request->get["filter_category"])) {
            $url .= "&filter_category=" . $this->request->get["filter_category"];
        }
        if (isset($this->request->get["sort"])) {
            $url .= "&sort=" . $this->request->get["sort"];
        }
        if (isset($this->request->get["order"])) {
            $url .= "&order=" . $this->request->get["order"];
        }
        $pagination = new Pagination();
        $pagination->total = $product_total;
        $pagination->page = $page;
        $pagination->limit = $this->config->get("config_limit_admin");
        $pagination->url = $this->url->link("catalog/" . $this->_moduleSysName() . "_update_relations", "user_token=" . $this->session->data["user_token"] . $url . "&page={page}", "SSL");
        $data["pagination"] = $pagination->render();
        $data["results"] = sprintf($this->language->get("text_pagination"), $product_total ? ($page - 1) * $this->config->get("config_limit_admin") + 1 : 0, $product_total - $this->config->get("config_limit_admin") < ($page - 1) * $this->config->get("config_limit_admin") ? $product_total : ($page - 1) * $this->config->get("config_limit_admin") + $this->config->get("config_limit_admin"), $product_total, ceil($product_total / $this->config->get("config_limit_admin")));
        $data["filter_name"] = $filter_name;
        $data["filter_category"] = $filter_category;
        $data["filter_price"] = $filter_price;
        $data["sort"] = $sort;
        $data["order"] = $order;
        $data["header"] = $this->load->controller("common/header");
        $data["column_left"] = $this->load->controller("common/column_left");
        $data["footer"] = $this->load->controller("common/footer");
        $this->response->setOutput($this->load->view("catalog/" . $this->_moduleSysName() . "_update_relations" . "_list", $data));
    }
    public function updateProductToFeedCategory()
    {
        $this->load->language("catalog/" . $this->_moduleSysName() . "_update_relations");
        $json = array();
        if (!$this->user->hasPermission("modify", "catalog/" . $this->_moduleSysName() . "_update_relations")) {
            $json["error"] = $this->language->get("error_permission");
            $this->response->addHeader("Content-Type: application/json");
            $this->response->setOutput(json_encode($json));
        } else {
            if (!isset($this->request->post["products_id"])) {
                $json["error"] = $this->language->get("error_empty_product");
                $this->response->addHeader("Content-Type: application/json");
                $this->response->setOutput(json_encode($json));
            } else {
                $this->load->model("catalog/" . $this->_moduleSysName() . "_update_relations");
                $categoryToFeed = array($this->request->post["feed_id"] => $this->request->post["category_id"]);
                if (is_array($this->request->post["products_id"])) {
                    foreach ($this->request->post["products_id"] as $product_id) {
                        $this->model_catalog_neoseo_product_feed_update_relations->updateProductToFeedCategory($categoryToFeed, $product_id);
                    }
                    $this->session->data["success"] = $this->language->get("text_success_update") . count($this->request->post["products_id"]);
                    $json["success"] = true;
                } else {
                    $this->model_catalog_neoseo_product_feed_update_relations->updateProductToFeedCategory($categoryToFeed, $this->request->post["products_id"]);
                }
                $this->response->addHeader("Content-Type: application/json");
                $this->response->setOutput(json_encode($json));
            }
        }
    }
}

?>