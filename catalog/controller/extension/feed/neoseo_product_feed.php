<?php

require_once DIR_SYSTEM . "/engine/neoseo_controller.php";
class ControllerExtensionFeedNeoSeoProductFeed extends NeoSeoController
{
    public function __construct($registry)
    {
        parent::__construct($registry);
        $this->_moduleSysName = "neoseo_product_feed";
        $this->_logFile = $this->_moduleSysName() . ".log";
        $this->debug = $this->config->get($this->_moduleSysName . "_debug") == 1;
    }
    /**
     * Feed By Demand
     */
    public function index()
    {
        $this->load->model("feed/neoseo_product_feed");
        $name = $this->request->get["name"];
        $feed = $this->model_feed_neoseo_product_feed->getFeed($name);
        if (!isset($feed["product_feed_id"])) {
            $this->log("ERROR: Не найден фид по имени: " . $name . "!");
        } else {
            if (isset($_SERVER["REMOTE_ADDR"])) {
                $ipList = $this->model_feed_neoseo_product_feed->explodeLines($feed["ip_list"]);
                if (0 < count($ipList)) {
                    $denied = true;
                    foreach ($ipList as $ip) {
                        if ($ip == $_SERVER["REMOTE_ADDR"]) {
                            $denied = false;
                            break;
                        }
                    }
                    if ($denied) {
                        $this->log("ERROR: Зарегистрировано обращение с недоверенного ip-адреса: " . $_SERVER["REMOTE_ADDR"] . ". Список доверенных адресов: " . join(",", $ipList));
                        exit;
                    }
                }
            }
            if (isset($feed["sql_code_before"])) {
                $this->model_feed_neoseo_product_feed->sqlBefore($feed["sql_code_before"]);
            }
            $content = $this->model_feed_neoseo_product_feed->getFeedContent($feed);
            $this->response->addHeader("Content-Type: application/xml; charset=utf-8");
            $this->response->setOutput($content);
        }
    }
    /**
     * Feed By Schedule
     */
    public function save()
    {
        $this->load->model("feed/neoseo_product_feed");
        $this->model_feed_neoseo_product_feed->saveFeeds();
        echo "success";
        exit;
    }
    public function download()
    {
        $file = DIR_DOWNLOAD . $this->request->get["feed"];
        $rFile = @fopen($file, "r");
        $rOutput = fopen("php://output", "w");
        if ($rFile) {
            header("Content-Disposition: attachment; filename=" . basename($file));
            stream_copy_to_stream($rFile, $rOutput);
            exit;
        }
    }
}

?>