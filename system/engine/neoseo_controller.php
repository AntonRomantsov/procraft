<?php

require_once "soforp_controller.php";
class NeoSeoController extends SoforpController
{
    protected $work_mode = NULL;
    protected $access_levels = array("index" => 0);
    protected $options_levels = array("module_key" => 0);
    protected $_module_code = "OLD_Version";
    protected $preroute = "";
    private $main_route = "";
    public function __construct($registry)
    {
        parent::__construct($registry);
    }
    public function initController()
    {
        if (!isset($this->_logFile)) {
            $this->_logFile = $this->config->get("config_error_filename");
        }
        if (isset($this->request->get["route"])) {
            $route = explode("/", $this->request->get["route"]);
            if ($route[0] == "extension") {
                $this->preroute = "extension";
            }
        } else {
            $this->preroute = "extension";
        }
        if ($this->_module_code == "OLD_Version" && !file_exists(DIR_APPLICATION . "model/tool/" . $this->_module_code . "_info.php")) {
            $this->work_mode = 2;
        } else {
            if ($this->main_route == "") {
                $this->load->model(($this->preroute ? $this->preroute . "/" : "") . $this->_route . "/" . $this->_moduleSysName());
            } else {
                $this->load->model(trim($this->main_route, "/") . "/" . $this->_moduleSysName());
            }
            $this->work_mode = $this->{"model_" . ($this->preroute ? $this->preroute . "_" : "") . $this->_route . "_" . $this->_moduleSysName()}->getWorkMode();
            $current_levels = $this->{"model_" . ($this->preroute ? $this->preroute . "_" : "") . $this->_route . "_" . $this->_moduleSysName()}->getOptionsLevels();
            if (is_array($current_levels)) {
                $this->options_levels = array_merge($this->options_levels, $current_levels);
            }
        }
    }
    protected function setAccessLevels($data)
    {
        $this->access_levels = array_merge($this->access_levels, $data);
    }
    protected function isAccesible($name, $action = false)
    {
        if (in_array($name, array("isAccesible", "addAccessLevels", "index", "__construct", "initController", "validate"))) {
            return true;
        }
        if (array_key_exists($name, $this->access_levels) && $this->access_levels[$name] <= $this->work_mode) {
            return true;
        }
        if ($action) {
            $this->session->data["error_warning"] = $this->language->get("error_access_mode_" . $this->access_levels[$name]);
            $this->response->redirect($this->url->link($this->_route . "/" . $this->_moduleSysName(), "token=" . $this->session->data["token"], "SSL"));
        } else {
            return false;
        }
    }
    protected function initParamsListEx($items, $data)
    {
        if ($this->_module_code == "OLD_Version" && !file_exists(DIR_APPLICATION . "model/tool/" . $this->_module_code . "_info.php")) {
            return parent::initParamsListEx($items, $data);
        }
        if ($this->work_mode == "") {
            $this->initController();
        }
        $data["allowed_options"] = array();
        foreach ($items as $name => $defaultValue) {
            if (!isset($this->options_levels[$name])) {
                $this->options_levels[$name] = 2;
            }
        }
        foreach ($this->options_levels as $option_name => $options_level) {
            if ($options_level <= $this->work_mode) {
                $data["allowed_options"][] = $option_name;
            }
        }
        $this->load->model(($this->preroute ? $this->preroute . "/" : "") . $this->_route . "/" . $this->_moduleSysName());
        $widgets_hash = array("work_mode" => $this->work_mode, "est_days" => $this->{"model_" . ($this->preroute ? $this->preroute . "_" : "") . $this->_route . "_" . $this->_moduleSysName()}->getEstDays(), "valid_to" => $this->{"model_" . ($this->preroute ? $this->preroute . "_" : "") . $this->_route . "_" . $this->_moduleSysName()}->getValidTo(), "error" => $this->{"model_" . ($this->preroute ? $this->preroute . "_" : "") . $this->_route . "_" . $this->_moduleSysName()}->getLicenseError());
        $widgets_hash = json_encode($widgets_hash);
        $widgets_hash = trim(base64_encode($widgets_hash), "=");
        $widgets_hash = substr($widgets_hash, 5) . substr($widgets_hash, 0, 5);
        $data["widget_hash"] = $widgets_hash;
        return parent::initParamsListEx($items, $data);
    }
    protected function initParamsList($items, $data)
    {
        if ($this->work_mode == "") {
            $this->initController();
        }
        $data["allowed_options"] = array();
        foreach ($items as $name => $defaultValue) {
            if (!isset($this->options_levels[$name])) {
                $this->options_levels[$name] = 2;
            }
        }
        foreach ($this->options_levels as $option_name => $options_level) {
            if ($options_level <= $this->work_mode) {
                $data["allowed_options"][] = $option_name;
            }
        }
        $this->load->model(($this->preroute ? $this->preroute . "/" : "") . $this->_route . "/" . $this->_moduleSysName());
        $widgets_hash = array("work_mode" => $this->work_mode, "est_days" => $this->{"model_" . ($this->preroute ? $this->preroute . "_" : "") . $this->_route . "_" . $this->_moduleSysName()}->getEstDays(), "valid_to" => $this->{"model_" . ($this->preroute ? $this->preroute . "_" : "") . $this->_route . "_" . $this->_moduleSysName()}->getValidTo(), "error" => $this->{"model_" . ($this->preroute ? $this->preroute . "_" : "") . $this->_route . "_" . $this->_moduleSysName()}->getLicenseError());
        $widgets_hash = json_encode($widgets_hash);
        $widgets_hash = trim(base64_encode($widgets_hash), "=");
        $widgets_hash = substr($widgets_hash, 5) . substr($widgets_hash, 0, 5);
        $data["widget_hash"] = $widgets_hash;
        return parent::initParamsList($items, $data);
    }
    public function validateKey()
    {
        $this->initController();
        $sysName = $this->_moduleSysName();
        if ($this->user->hasPermission("modify", "extension/" . $this->_route . "/" . $sysName) && $this->request->server["REQUEST_METHOD"] == "POST" && isset($this->request->post[$sysName . "_module_key"])) {
            if ($this->work_mode == 0) {
                $this->load->model(($this->preroute ? $this->preroute . "/" : "") . $this->_route . "/" . $this->_moduleSysName());
                $this->work_mode = $this->{"model_" . ($this->preroute ? $this->preroute . "_" : "") . $this->_route . "_" . $this->_moduleSysName()}->addSettingData($sysName, $sysName . "_module_key", $this->request->post[$sysName . "_module_key"]);
                if (isset($this->session->data["error_warning"])) {
                    $this->session->data["error_warning"] = "";
                }
                return false;
            }
            return true;
        }
        return false;
    }
}

?>