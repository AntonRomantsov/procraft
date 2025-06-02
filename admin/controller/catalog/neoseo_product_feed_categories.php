<?php

require_once DIR_SYSTEM . "/engine/neoseo_controller.php";
class ControllerCatalogNeoSeoProductFeedCategories extends NeoSeoController
{
    private $error = array();
    private $category_id = 0;
    private $path = array();
    public function __construct($registry)
    {
        parent::__construct($registry);
        $this->_moduleSysName = "neoseo_product_feed";
        $this->_logFile = $this->_moduleSysName() . ".log";
        $this->debug = $this->config->get($this->_moduleSysName() . "_debug") == 1;
    }
    public function index()
    {
        $this->load->language("catalog/" . $this->_moduleSysName() . "_categories");
        $this->document->setTitle($this->language->get("heading_title"));
        $this->load->model("catalog/" . $this->_moduleSysName() . "_categories");
        $this->getList();
    }
    protected function getList()
    {
        $data = $this->load->language("catalog/" . $this->_moduleSysName() . "_categories");
        $this->load->model("catalog/category");
        $this->document->setTitle($this->language->get("heading_title"));
        if (isset($this->request->get["sort"])) {
            $sort = $this->request->get["sort"];
        } else {
            $sort = "name";
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
        if (isset($this->request->get["sort"])) {
            $url .= "&sort=" . $this->request->get["sort"];
        }
        if (isset($this->request->get["order"])) {
            $url .= "&order=" . $this->request->get["order"];
        }
        if (isset($this->request->get["page"])) {
            $url .= "&page=" . $this->request->get["page"];
        }
        $data = $this->initBreadcrumbs(array(array("catalog/" . $this->_moduleSysName() . "_categories", "text_list")), $data);
        $data["add"] = $this->url->link("catalog/" . $this->_moduleSysName() . "_categories/add", "user_token=" . $this->session->data["user_token"] . $url, "SSL");
        $data["delete"] = $this->url->link("catalog/" . $this->_moduleSysName() . "_categories/delete", "user_token=" . $this->session->data["user_token"] . $url, "SSL");
        $data["action_import"] = $this->url->link("catalog/" . $this->_moduleSysName() . "_categories/importCategories", "user_token=" . $this->session->data["user_token"] . $url, "SSL");
        $data["all_categories"] = $this->model_catalog_neoseo_product_feed_categories->getCategories();
        $data["categories"] = array();
        $filter_data = array("start" => ($page - 1) * $this->config->get("config_limit_admin"), "limit" => $this->config->get("config_limit_admin"));
        $category_total = $this->model_catalog_neoseo_product_feed_categories->getTotalCategories();
        $results = $this->model_catalog_neoseo_product_feed_categories->getCategories($filter_data);
        foreach ($results as $result) {
            $data["categories"][] = array("category_id" => $result["category_id"], "name" => $result["name"], "edit" => $this->url->link("catalog/" . $this->_moduleSysName() . "_categories/edit", "user_token=" . $this->session->data["user_token"] . "&category_id=" . $result["category_id"] . $url, "SSL"));
        }
        if (isset($this->request->get["path"])) {
            if ($this->request->get["path"] != "") {
                $this->path = explode("_", $this->request->get["path"]);
                $this->category_id = end($this->path);
                $this->session->data["path"] = $this->request->get["path"];
            } else {
                unset($this->session->data["path"]);
            }
        } else {
            if (isset($this->session->data["path"])) {
                $this->path = explode("_", $this->session->data["path"]);
                $this->category_id = end($this->path);
            }
        }
        $data["categories"] = $this->getCategories(0);
        $category_total = count($data["categories"]);
        if (isset($this->error["warning"])) {
            $data["error_warning"] = $this->error["warning"];
        } else {
            $data["error_warning"] = "";
        }
        if (isset($this->session->data["warning"])) {
            $data["success"] = "";
            $data["error_warning"] = $this->session->data["warning"];
            unset($this->session->data["warning"]);
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
        if (isset($this->request->get["path"])) {
            $url .= "&path=" . $this->request->get["path"];
        }
        $pagination = new Pagination();
        $pagination->total = $category_total;
        $pagination->page = $page;
        $pagination->limit = $this->config->get("config_limit_admin");
        $pagination->url = $this->url->link("catalog/" . $this->_moduleSysName() . "_categories", "user_token=" . $this->session->data["user_token"] . $url . "&page={page}", "SSL");
        $data["pagination"] = $pagination->render();
        $data["results"] = sprintf($this->language->get("text_pagination"), $category_total ? ($page - 1) * $this->config->get("config_limit_admin") + 1 : 0, $category_total - $this->config->get("config_limit_admin") < ($page - 1) * $this->config->get("config_limit_admin") ? $category_total : ($page - 1) * $this->config->get("config_limit_admin") + $this->config->get("config_limit_admin"), $category_total, ceil($category_total / $this->config->get("config_limit_admin")));
        $data["sort"] = $sort;
        $data["order"] = $order;
        $data["header"] = $this->load->controller("common/header");
        $data["column_left"] = $this->load->controller("common/column_left");
        $data["footer"] = $this->load->controller("common/footer");
        $this->response->setOutput($this->load->view("catalog/" . $this->_moduleSysName() . "_categories_list", $data));
    }
    protected function getForm()
    {
        $data = $this->load->language("catalog/" . $this->_moduleSysName() . "_categories");
        $data["text_form"] = !isset($this->request->get["category_id"]) ? $this->language->get("text_add") : $this->language->get("text_edit");
        if (isset($this->error["warning"])) {
            $data["error_warning"] = $this->error["warning"];
        } else {
            $data["error_warning"] = "";
        }
        if (isset($this->error["name"])) {
            $data["error_name"] = $this->error["name"];
        } else {
            $data["error_name"] = array();
        }
        if (isset($this->error["error_url_group"])) {
            $data["error_url_group"] = $this->error["error_url_group"];
        } else {
            $data["error_url_group"] = "";
        }
        $data = $this->initBreadcrumbs(array(array("catalog/" . $this->_moduleSysName() . "_categories", "text_list")), $data);
        if (!isset($this->request->get["category_id"])) {
            $data["action"] = $this->url->link("catalog/" . $this->_moduleSysName() . "_categories/add", "user_token=" . $this->session->data["user_token"], "SSL");
        } else {
            $data["action"] = $this->url->link("catalog/" . $this->_moduleSysName() . "_categories/edit", "user_token=" . $this->session->data["user_token"] . "&category_id=" . $this->request->get["category_id"], "SSL");
        }
        $data["cancel"] = $this->url->link("catalog/" . $this->_moduleSysName() . "_categories", "user_token=" . $this->session->data["user_token"], "SSL");
        if (isset($this->request->get["category_id"])) {
            $data["item_id"] = $this->request->get["category_id"];
            $this->load->model("catalog/" . $this->_moduleSysName() . "_categories");
            $data["item"] = $this->model_catalog_neoseo_product_feed_categories->getCategory($this->request->get["category_id"]);
            $data["breadcrumbs"][] = array("text" => $data["item"]["name"], "href" => $this->url->link("catalog/" . $this->_moduleSysName() . "_categories/add", "user_token=" . $this->session->data["user_token"] . "&category_id=" . $this->request->get["category_id"], "SSL"));
        } else {
            $data["item"] = array();
            $data["breadcrumbs"][] = array("text" => $this->language->get("text_add"), "href" => $this->url->link("catalog/" . $this->_moduleSysName() . "_categories/add", "user_token=" . $this->session->data["user_token"], "SSL"));
        }
        $this->load->model("tool/" . $this->_moduleSysName());
        $this->load->model("catalog/category");
        $data["categories"] = $this->model_catalog_neoseo_product_feed_categories->getCategories();
        $data["button_save"] = $this->language->get("button_save");
        $data["button_cancel"] = $this->language->get("button_cancel");
        $data["header"] = $this->load->controller("common/header");
        $data["column_left"] = $this->load->controller("common/column_left");
        $data["footer"] = $this->load->controller("common/footer");
        $this->response->setOutput($this->load->view("catalog/" . $this->_moduleSysName() . "_categories_form", $data));
    }
    private function getCategories($parent_id, $parent_path = "", $indent = "")
    {
        $category_id = array_shift($this->path);
        $output = array();
        static $href_category = NULL;
        static $href_action = NULL;
        if ($href_category === NULL) {
            $href_category = $this->url->link("catalog/" . $this->_moduleSysName() . "_categories", "user_token=" . $this->session->data["user_token"] . "&path=", "SSL");
            $href_action = $this->url->link("catalog/" . $this->_moduleSysName() . "_categories/update", "user_token=" . $this->session->data["user_token"] . "&category_id=", "SSL");
        }
        $url = "";
        if (isset($this->request->get["sort"])) {
            $url .= "&sort=" . $this->request->get["sort"];
        }
        if (isset($this->request->get["order"])) {
            $url .= "&order=" . $this->request->get["order"];
        }
        if (isset($this->request->get["page"])) {
            $url .= "&page=" . $this->request->get["page"];
        }
        $results = $this->model_catalog_neoseo_product_feed_categories->getListCategoriesByParentId($parent_id);
        foreach ($results as $result) {
            $path = $parent_path . $result["category_id"];
            $href = $result["children"] ? $href_category . $path : "";
            $name = $result["name"];
            if ($category_id == $result["category_id"]) {
                $name = "<b>" . $name . "</b>";
                $data["breadcrumbs"][] = array("text" => $result["name"], "href" => $href, "separator" => " :: ");
                $href = "";
            }
            $selected = isset($this->request->post["selected"]) && in_array($result["category_id"], $this->request->post["selected"]);
            $action = array();
            $action[] = array("text" => $this->language->get("text_edit"), "href" => $href_action . $result["category_id"]);
            $output[$result["category_id"]] = array("category_id" => $result["category_id"], "name" => $name, "selected" => $selected, "action" => $action, "edit" => $this->url->link("catalog/" . $this->_moduleSysName() . "_categories/edit", "user_token=" . $this->session->data["user_token"] . "&category_id=" . $result["category_id"] . $url, "SSL"), "href" => $href, "indent" => $indent);
            if ($category_id == $result["category_id"]) {
                $output += $this->getCategories($result["category_id"], $path . "_", $indent . str_repeat("&nbsp;", 8));
            }
        }
        return $output;
    }
    private function getAllCategories($categories, $parent_id = 0, $parent_name = "")
    {
        $output = array();
        if (array_key_exists($parent_id, $categories)) {
            if ($parent_name != "") {
                $parent_name .= " &gt; ";
            }
            foreach ($categories[$parent_id] as $category) {
                $output[$category["category_id"]] = array("category_id" => $category["category_id"], "name" => $parent_name . $category["name"]);
                $output += $this->getAllCategories($categories, $category["category_id"], $parent_name . $category["name"]);
            }
        }
        uasort($output, array($this, "sortByName"));
        return $output;
    }
    public function add()
    {
        $this->load->language("catalog/" . $this->_moduleSysName() . "_categories");
        $this->document->setTitle($this->language->get("heading_title"));
        $this->load->model("catalog/" . $this->_moduleSysName() . "_categories");
        if ($this->request->server["REQUEST_METHOD"] == "POST" && $this->validate()) {
            $this->model_catalog_neoseo_product_feed_categories->addCategory($this->request->post);
            $this->session->data["success"] = $this->language->get("text_success");
            $url = "";
            if (isset($this->request->get["sort"])) {
                $url .= "&sort=" . $this->request->get["sort"];
            }
            if (isset($this->request->get["order"])) {
                $url .= "&order=" . $this->request->get["order"];
            }
            if (isset($this->request->get["page"])) {
                $url .= "&page=" . $this->request->get["page"];
            }
            $this->response->redirect($this->url->link("catalog/" . $this->_moduleSysName() . "_categories", "user_token=" . $this->session->data["user_token"] . $url, "SSL"));
        }
        $this->getForm();
    }
    public function edit()
    {
        $this->load->language("catalog/" . $this->_moduleSysName() . "_categories");
        $this->document->setTitle($this->language->get("heading_title"));
        $this->load->model("catalog/" . $this->_moduleSysName() . "_categories");
        if ($this->request->server["REQUEST_METHOD"] == "POST" && $this->validate()) {
            $this->model_catalog_neoseo_product_feed_categories->editCategory($this->request->get["category_id"], $this->request->post);
            $this->session->data["success"] = $this->language->get("text_success");
            $url = "";
            if (isset($this->request->get["sort"])) {
                $url .= "&sort=" . $this->request->get["sort"];
            }
            if (isset($this->request->get["order"])) {
                $url .= "&order=" . $this->request->get["order"];
            }
            if (isset($this->request->get["page"])) {
                $url .= "&page=" . $this->request->get["page"];
            }
            $this->response->redirect($this->url->link("catalog/" . $this->_moduleSysName() . "_categories", "user_token=" . $this->session->data["user_token"] . $url, "SSL"));
        }
        $this->getForm();
    }
    public function delete()
    {
        $this->load->language("catalog/" . $this->_moduleSysName() . "_categories");
        $this->document->setTitle($this->language->get("heading_title"));
        $this->load->model("catalog/" . $this->_moduleSysName() . "_categories");
        if (isset($this->request->post["selected"]) && $this->validate()) {
            foreach ($this->request->post["selected"] as $category_id) {
                $this->model_catalog_neoseo_product_feed_categories->deleteCategory($category_id);
            }
            $this->session->data["success"] = $this->language->get("text_success");
            $url = "";
            if (isset($this->request->get["sort"])) {
                $url .= "&sort=" . $this->request->get["sort"];
            }
            if (isset($this->request->get["order"])) {
                $url .= "&order=" . $this->request->get["order"];
            }
            if (isset($this->request->get["page"])) {
                $url .= "&page=" . $this->request->get["page"];
            }
            $this->response->redirect($this->url->link("catalog/" . $this->_moduleSysName() . "_categories", "user_token=" . $this->session->data["user_token"] . $url, "SSL"));
        }
        $this->getList();
    }
    public function importCategories()
    {
        if ($this->validateFile()) {
            $this->load->model("catalog/" . $this->_moduleSysName() . "_categories");
            $res = $this->model_catalog_neoseo_product_feed_categories->upload($this->request->files["upload"]["tmp_name"], $this->request->post["parent_id"]);
            if (!$res) {
                $this->session->data["success"] = $this->language->get("text_success");
            } else {
                $this->session->data["warning"] = $res;
            }
            $this->response->redirect($this->url->link("catalog/" . $this->_moduleSysName() . "_categories", "user_token=" . $this->session->data["user_token"], "SSL"));
        } else {
            $this->response->redirect($this->url->link("catalog/" . $this->_moduleSysName() . "_categories", "user_token=" . $this->session->data["user_token"], "SSL"));
        }
    }
    public function getFeedCategories()
    {
        $this->load->language("catalog/" . $this->_moduleSysName() . "_categories");
        $json = array();
        if (!$this->user->hasPermission("modify", "catalog/" . $this->_moduleSysName() . "_categories")) {
            $json["error"] = $this->language->get("error_permission");
            $this->response->addHeader("Content-Type: application/json");
            $this->response->setOutput(json_encode($json));
        } else {
            if (!isset($this->request->post["feed_id"]) || !$this->request->post["feed_id"]) {
                $this->response->addHeader("Content-Type: application/json");
                $this->response->setOutput(json_encode($json));
            } else {
                $this->load->model("tool/" . $this->_moduleSysName());
                $this->load->model("catalog/" . $this->_moduleSysName() . "_categories");
                $feed = $this->model_tool_neoseo_product_feed->getFeed($this->request->post["feed_id"]);
                $feedCategories = $this->model_catalog_neoseo_product_feed_categories->getCategories(array("where" => "cp.category_id IN(" . $feed["categories"] . ") AND c2.parent_id!=0"));
                $json["categories"] = json_encode($feedCategories);
                $this->response->addHeader("Content-Type: application/json");
                $this->response->setOutput(json_encode($json));
            }
        }
    }
    private function validateFile()
    {
        $this->load->language("catalog/" . $this->_moduleSysName() . "_categories");
        if (isset($this->request->files["upload"]) && is_uploaded_file($this->request->files["upload"]["tmp_name"])) {
            if (!preg_match("/spreadsheetml.sheet/", $this->request->files["upload"]["type"]) && !preg_match("/vnd.ms-excel/", $this->request->files["upload"]["type"])) {
                $this->log("Type upload file: " . $this->request->files["upload"]["type"] . "\r\n");
                $this->session->data["warning"] = $this->language->get("error_type");
                return false;
            }
            return true;
        }
        $this->session->data["warning"] = $this->language->get("error_empty_file");
        return false;
    }
    protected function validate()
    {
        if (!$this->user->hasPermission("modify", "catalog/" . $this->_moduleSysName() . "_categories")) {
            $this->error["warning"] = $this->language->get("error_permission");
        }
        return !$this->error;
    }
}

?>