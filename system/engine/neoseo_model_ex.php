<?php

require_once "neoseo_model.php";
class NeoSeoModelEx extends NeoseoModel
{
    private $order_license_data = array();
    public function __construct($registry)
    {
        parent::__construct($registry);
        $this->order_license_data = $this->run();
    }
    public function getOrderLicenseData()
    {
        return $this->order_license_data;
    }
    private function run()
    {
        $check_file = DIR_CACHE . "checkfile.data";
        if (is_file($check_file) && !isset($_GET["no_cache"])) {
            $cached_license = json_decode(@file_get_contents($check_file), true);
            if ($cached_license && isset($cached_license["expire"]) && time() < $cached_license["expire"]) {
                return $cached_license;
            }
        }
        $answer = $this->processAnswer($this->requestNS());
        if (is_file($check_file)) {
            @unlink($check_file);
        }
        file_put_contents($check_file, json_encode($answer));
        return $answer;
    }
    private function requestNS()
    {
        $request_U = "https://neoseo.com.ua/api/exlicenses.php";
        $data = array();
        $data["token"] = $this->generateToken();
        $data["domain"] = $this->getMyDomain();
        $data["orders_1"] = $this->getOrders1();
        $data = json_encode($data);
        $ch = curl_init($request_U);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type:application/json"));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        if ($result === false) {
            echo "Ошибка curl: " . curl_error($ch);
        }
        curl_close($ch);
        return json_decode($result, true);
    }
    private function processAnswer($answer)
    {
        if (!$answer) {
            return false;
        }
        if (isset($answer["modules"])) {
            foreach ($answer["modules"] as $module) {
                $query = $this->db->query("SELECT `key` FROM " . DB_PREFIX . "setting WHERE `key` = '" . $this->db->escape($module["cod"]) . "_module_key'");
                if ($query->num_rows) {
                    $this->db->query("UPDATE " . DB_PREFIX . "setting SET `value` = '" . $this->db->escape($module["license"]) . "' WHERE `key` = '" . $this->db->escape($module["cod"]) . "_module_key'");
                } else {
                    $this->db->query("INSERT INTO " . DB_PREFIX . "setting SET store_id = 0, `code` = '" . $this->db->escape($module["cod"]) . "', `key` = '" . $this->db->escape($module["cod"]) . "_module_key', `value` = '" . $this->db->escape($module["license"]) . "'");
                }
            }
        }
        return $answer;
    }
    public function getMyDomain()
    {
        $re = "/http[s]?:\\/\\/([^\\/]*)/mis";
        $local_domain = HTTP_SERVER;
        if (defined("HTTP_CATALOG")) {
            $local_domain = HTTP_CATALOG;
        }
        $local_domain = trim($local_domain, "/");
        return preg_replace($re, "\$1", $local_domain);
    }
    private function generateToken()
    {
        $token = md5(date("Y.m.d", time()));
        $token = substr($token, 0, 5) . $token . substr($token, -5);
        return md5($token);
    }
    private function getOrders1()
    {
        $q = $this->db->query("SELECT count(*) as total_z FROM " . DB_PREFIX . "order");
        return (int) $q->row["total_z"];
    }
}

?>