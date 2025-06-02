<?php
class ControllerExtensionModuleCategorymanager extends Controller
{
    private $error = array();
    public function index()
    {
        $this->load->language("extension/module/categorymanager");
        $this->document->setTitle(strip_tags($this->language->get("heading_title")));
        clearstatcache();
        $this->load->model("setting/setting");
        
        if ($this->request->server["REQUEST_METHOD"] == "POST" && $this->validate()) {
            $post_data = array("udate", "hide", "hideck", "hidecs", "status");
            foreach ($post_data as $post) {
                if (!isset($this->request->post["module_categorymanager_" . $post])) {
                    $this->request->post["module_categorymanager_" . $post] = "0";
                } 
            }
            $this->model_setting_setting->editSetting("module_categorymanager", $this->request->post);
            $this->session->data["success"] = $this->language->get("text_success");
            $this->response->redirect($this->url->link("marketplace/extension", "user_token=" . $this->session->data["user_token"] . "&type=module", true));
        } 
        
        $text_strings = array("heading_title", "text_module", "text_edit", "text_enabled", "text_disabled", "entry_status", "text_server", "text_host", "text_settings", "entry_code", "entry_limit", "entry_col", "help_col", "entry_hide", "entry_udate", "help_hide", "help_udate", "entry_hideck", "help_hideck", "entry_hidecs", "help_hidecs", "button_save", "button_cancel");
        foreach ($text_strings as $text) {
            $data[$text] = $this->language->get($text);
        }
        $config_data = array("status", "limit", "hide", "hideck", "hidecs", "udate", "col", "code");
        foreach ($config_data as $conf) {
            $conf = "module_categorymanager_" . $conf;
            if (!isset($this->request->post[$conf])) {
                $data[$conf] = $this->config->get($conf);
            } else {
                $data[$conf] = $this->request->post[$conf];
            }
        }
        if (!isset($this->error["warning"])) {
            $data["error_warning"] = '';
        } else {
            $data["error_warning"] = $this->error["warning"];
        }
        $data["cols"] = array("3", "4", "6");
        $data["breadcrumbs"] = array();
        $data["breadcrumbs"][] = array("text" => $this->language->get("text_home"), "href" => $this->url->link("common/dashboard", "user_token=" . $this->session->data["user_token"], true));
        $data["breadcrumbs"][] = array("text" => $this->language->get("text_module"), "href" => $this->url->link("marketplace/extension", "user_token=" . $this->session->data["user_token"] . "&type=module", true));
        $data["breadcrumbs"][] = array("text" => $this->language->get("heading_title"), "href" => $this->url->link("extension/module/categorymanager", "user_token=" . $this->session->data["user_token"], true));
        $data["action"] = $this->url->link("extension/module/categorymanager", "user_token=" . $this->session->data["user_token"], true);
        $data["cancel"] = $this->url->link("marketplace/extension", "user_token=" . $this->session->data["user_token"] . "&type=module", true);
        $data["header"] = $this->load->controller("common/header");
        $data["column_left"] = $this->load->controller("common/column_left");
        $data["footer"] = $this->load->controller("common/footer");
        
        $out = $this->load->view("extension/module/categorymanager", $data);
        
        $this->response->setOutput($out);
    }
    protected function validate()
    {
        if (!$this->user->hasPermission("modify", "extension/module/categorymanager")) {
            $this->error["warning"] = $this->language->get("error_permission");
        } else {
        }
        return !$this->error;
    }
}