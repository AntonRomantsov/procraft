<?php

require_once "soforp_model.php";
class NeoSeoModel extends SoforpModel
{
    private $cipher = NULL;
    private $private_key = NULL;
    protected $_module_code = "OLD_Version";
    protected $access_levels = array("install" => 0, "uninstall" => 0, "installTables" => 0, "initParams" => 0);
    private $license = NULL;
    protected $options_levels = NULL;
    public function __construct($registry)
    {
        parent::__construct($registry);
        $this->cipher = "AES-128-CBC";
    }
    private function disableLicense()
    {
        if (defined("HTTPS_CATALOG")) {
            $this->db->query("UPDATE " . DB_PREFIX . "setting SET value=0 WHERE `key` like '%" . $this->_module_code . "_status%'");
        }
        $this->config->set($this->_moduleSysName() . "_status", 0);
        $this->log->write("Disable module " . $this->_module_code . " for " . $_SERVER["HTTP_HOST"]);
    }
    protected function setAccessLevels($data)
    {
        $this->access_levels = array_merge($this->access_levels, $data);
    }
    protected function isAccesible($name)
    {
        if (in_array($name, array("setOptionsLevels", "addAccessLevels", "__construct", "install", "upgrade", "installTables", "uninstall"))) {
            return true;
        }
        if (array_key_exists($name, $this->access_levels) && $this->access_levels[$name] <= $this->getWorkMode()) {
            return true;
        }
        return false;
    }
    private function checkLicense()
    {
        if (isset($this->session) && $this->session !== NULL) {
            $this->session->data["error_warning"] = "";
        }
        if ($this->_module_code == "OLD_Version" && !file_exists(DIR_APPLICATION . "model/tool/" . $this->_module_code . "_info.php")) {
            $this->license = array("mode" => 2, "period" => 0, "date" => "1980-01-01");
        } else {
            $this->load->model("tool/" . $this->_module_code . "_info");
            $this->private_key = $this->{"model_tool_" . $this->_module_code . "_info"}->getKey();
            $license_key = $this->config->get($this->_module_code . "_module_key");
            $license_key = base64_decode($license_key);
            $this->language->load($this->_route . "/" . $this->_moduleSysName());
            if ($license_key == "" || strlen($license_key) < openssl_cipher_iv_length($this->cipher)) {
                $this->license = array("mode" => 0, "period" => 0, "date" => "1980-01-01");
                $this->session->data["error_warning"] = $this->language->get("text_license_error_key");
                $this->disableLicense();
                return false;
            }
            $hmac = substr($license_key, 0, 32);
            $licence_raw = substr($license_key, 32);
            $data = openssl_decrypt($licence_raw, $this->cipher, $this->private_key, $options = OPENSSL_RAW_DATA, "");
            $calcmac = hash_hmac("sha256", $licence_raw, $this->private_key, $as_binary = true);
            $this->private_key = "InAvAliblePrivateKey";
            if (hash_equals($hmac, $calcmac)) {
                if ($json = json_decode($data, true)) {
                    if (!isset($json["domain"]) || !isset($json["date"]) || !isset($json["period"]) || !isset($json["mode"])) {
                        $this->license = array("mode" => 0, "period" => 0, "date" => "1980-01-01");
                        $this->license["error"] = $this->language->get("text_license_error_key");
                        $this->disableLicense();
                        return false;
                    }
                    if (strpos($_SERVER["HTTP_HOST"], $json["domain"]) !== false || isset($_SERVER["argv"]) && isset($_SERVER["argv"][0])) {
                        if (0 < $json["period"]) {
                            if (!($date = DateTime::createFromFormat("Y-m-d", $json["date"]))) {
                                $this->license = array("mode" => 0, "period" => 0, "date" => "1980-01-01");
                                $this->license["error"] = $this->language->get("text_license_error_key");
                                $this->disableLicense();
                                return false;
                            }
                            if (new DateTime() <= $date->add(new DateInterval("P" . $json["period"] . "D"))) {
                                $this->license = $json;
                                return true;
                            }
                            $this->license = array("mode" => 0, "period" => 0, "date" => "1980-01-01");
                            $this->disableLicense();
                            $this->license["error"] = $this->language->get("text_license_end_period");
                        } else {
                            $this->license = array("mode" => 0, "period" => 0, "date" => "1980-01-01");
                            $this->disableLicense();
                            $this->license["error"] = $this->language->get("text_license_end_period");
                        }
                    } else {
                        $this->license = array("mode" => 0, "period" => 0, "date" => "1980-01-01");
                        $this->disableLicense();
                        $this->license["error"] = $this->language->get("text_license_error_domain");
                    }
                } else {
                    $this->license = array("mode" => 0, "period" => 0, "date" => "1980-01-01");
                    $this->disableLicense();
                    $this->license["error"] = $this->language->get("text_license_error_key");
                }
            } else {
                $this->license = array("mode" => 0, "period" => 0, "date" => "1980-01-01");
                $this->disableLicense();
                $this->license["error"] = $this->language->get("text_license_error_key");
            }
            $this->session->data["error_warning"] = $this->license["error"];
            $this->disableLicense();
            return false;
        }
    }
    public function getWorkMode()
    {
        if ($this->license == false) {
            $this->checkLicense();
        }
        return $this->license["mode"];
    }
    public function getValidTo()
    {
        $this->language->load($this->_route . "/" . $this->_moduleSysName());
        if ($this->license == false) {
            $this->checkLicense();
        }
        if (0 < $this->license["mode"]) {
            if (99999 <= $this->license["period"]) {
                return $this->language->get("text_license_lifetime");
            }
            $est_date = new DateTime($this->license["date"]);
            return $est_date->add(new DateInterval("P" . $this->license["period"] . "D"))->format("d.m.Y");
        }
        return false;
    }
    public function getEstDays()
    {
        $this->language->load($this->_route . "/" . $this->_moduleSysName());
        if ($this->license == false) {
            $this->checkLicense();
        }
        if (0 < $this->license["mode"]) {
            if (99999 <= $this->license["period"]) {
                return $this->language->get("text_license_lifetime");
            }
            $est_date = DateTime::createFromFormat("Y-m-d", $this->license["date"]);
            $est_date->add(new DateInterval("P" . $this->license["period"] . "D"));
            return date_diff($est_date, new DateTime())->days;
        }
        $this->disableLicense();
        return 0;
    }
    public function getOptionsLevels()
    {
        return $this->options_levels;
    }
    public function getLicenseError()
    {
        if (isset($this->license["error"]) && $this->license["error"] != "") {
            return $this->license["error"];
        }
        return "";
    }
    public function addSettingData($code = "", $key = "", $value = "", $store_id = 0)
    {
        $this->db->query("DELETE FROM `" . DB_PREFIX . "setting` WHERE `code` = '" . $this->db->escape($code) . "' AND  `key` = '" . $this->db->escape($key) . "'");
        $sql = "INSERT INTO `" . DB_PREFIX . "setting` (`setting_id`, `store_id`, `code`, `key`, `value`, `serialized`) \n\t\tVALUES (\n\t\t\tNULL,\n\t\t\t '" . (int) $store_id . "',\n\t\t\t '" . $this->db->escape($code) . "',\n\t\t\t '" . $this->db->escape($key) . "',\n\t\t\t '" . $this->db->escape($value) . "',\n\t\t\t '0'\n\t\t\t)";
        $this->db->query($sql);
    }
}

?>