<?php

require_once(DIR_SYSTEM . "/engine/neoseo_controller.php");
require_once(DIR_SYSTEM . '/engine/neoseo_view.php');

class ControllerToolNeoseoRobotsGenerator extends NeoSeoController
{

	public function __construct($registry)
	{
		parent::__construct($registry);
				$this->_moduleSysName = "neoseo_robots_generator";
		$this->_logFile = $this->_moduleSysName() . ".log";
		$this->debug = $this->config->get($this->_moduleSysName() . "_debug") == 1;

		$this->_store_url = $this->config->get('config_secure') ? HTTPS_CATALOG : HTTP_CATALOG;
		$this->_url = new Url(HTTP_CATALOG, $this->_store_url);
		if (!$seo_type = $this->config->get('config_seo_url_type')) {
			$seo_type = 'seo_url';
		}
		$app_dir = rtrim(realpath(DIR_SYSTEM . "../"), "/") . "/catalog/";
		$seo_file = $app_dir . "controller/common/${seo_type}.php";
		if (file_exists($seo_file)) {
			require_once($seo_file);
			$seoClass = 'Controller' . preg_replace('/[^a-zA-Z0-9]/', '', "common/${seo_type}");
			$seoController = new $seoClass($registry);
			$this->_url->addRewrite($seoController);
		}
	}

	public function index()
	{
		$data = $this->language->load('tool/' . $this->_moduleSysName());

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('tool/' . $this->_moduleSysName());

		$data = $this->initBreadcrumbs(array(
			array('tool/' . $this->_moduleSysName(), 'heading_title')
				), $data);

		$data['close'] = $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], 'SSL');
		$data['save'] = $this->url->link('tool/' . $this->_moduleSysName() . '/save', 'user_token=' . $this->session->data['user_token'], 'SSL');

		$data['stores'] = $this->{'model_tool_' . $this->_moduleSysName()}->getStores();

		foreach ($data['stores'] as $store_id => $store) {

			$parse_url = parse_url($store['url']);

			if (!isset($parse_url['host']))
				$parse_url['host'] = $parse_url['path'];

			$robotsSuffix = $store_id ? ('_' . preg_replace('/\./', '_', $parse_url['host'])) : '';

			$filename = rtrim(realpath(DIR_SYSTEM . "/../"), '/') . "/robots" . $robotsSuffix . ".txt";
			$data['params']['content'][$store_id] = is_file($filename) ? file_get_contents($filename) : '';

			$data['js_stores'][] = $store_id;
		}

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else if (isset($this->session->data['error_warning'])) {
			$data['error_warning'] = $this->session->data['error_warning'];
			unset($this->session->data['error_warning']);
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->session->data['success'])) {
			$data['success'] = $this->session->data['success'];
			unset($this->session->data['success']);
		}

		$data['user_token'] = $this->session->data['user_token'];

		$widgets = new NeoSeoWidgets('', $data['params']);
		$widgets->text_select_all = $this->language->get('text_select_all');
		$widgets->text_unselect_all = $this->language->get('text_unselect_all');
		$data['widgets'] = $widgets;

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('tool/' . $this->_moduleSysName(), $data));
	}

	protected function explodeLines($lines)
	{
		$res = array();
		foreach (explode("\n", trim($lines)) as $line) {
			if (trim($line) != "")
				$res[] = trim($line);
		}
		return $res;
	}

	protected function getLink($route)
	{
		$url = $this->_url->link($route);
		$url = str_replace($this->_store_url, "", $url);
		$url = ltrim($url, "/");
		return $url;
	}

	public function save()
	{
		$this->load->model('tool/' . $this->_moduleSysName());
		$stores = $this->{'model_tool_' . $this->_moduleSysName()}->getStores();

		$this->language->load('tool/' . $this->_moduleSysName());

		foreach ($stores as $store_id => $store) {
			if (empty($this->request->post['content'][$store_id])) {
				$this->session->data['warning'] = $this->language->get("error_no_content") . " " . $store['name'];
				$this->log("no content");
				$this->response->redirect($this->url->link('tool/' . $this->_moduleSysName(), 'user_token=' . $this->session->data['user_token'], 'SSL'));
				return;
			}
		}

		foreach ($this->request->post['content'] as $id => $val) {
			$content = str_replace("&amp;", "&", $this->request->post['content'][$id]);

			$parse_url = parse_url($stores[$id]['url']);
			$robotsSuffix = $id ? ('_' . preg_replace('/\./', '_', $parse_url['host'])) : '';
			$filename = rtrim(realpath(DIR_SYSTEM . "/../"), '/') . "/robots" . $robotsSuffix . ".txt";

			if (false !== file_put_contents($filename, $content)) {
				$this->session->data['success'] = $this->language->get("text_save_success");
			} else {
				$this->session->data['warning'] = $this->language->get("error_save");
			}
		}

		if ($this->request->post['action'] == "save_and_close")
			$this->response->redirect($this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], 'SSL'));
		else
			$this->response->redirect($this->url->link('tool/' . $this->_moduleSysName(), 'user_token=' . $this->session->data['user_token'], 'SSL'));
	}

	public function generate()
	{
		$this->load->language($this->_route . '/' . $this->_moduleSysName());

		$json = array();

		if (!$this->user->hasPermission('modify', $this->_route . '/' . $this->_moduleSysName())) {
			$json['error'] = $this->language->get('error_permission');
			$this->response->addHeader('Content-Type: application/json');
			$this->response->setOutput(json_encode($json));
			return;
		}

		$json['success'] = $this->language->get('text_generate_success');
		$this->load->model('tool/' . $this->_moduleSysName());
		$content = $this->{'model_tool_' . $this->_moduleSysName()}->generate();
		$json['content'] = $content;

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
		return;
	}

	public function hide()
	{
		$this->language->load('tool/' . $this->_moduleSysName);
		$content = "User-agent: *
Disallow:/
";
		$json['success'] = $this->language->get('text_generate_success');
		$json['content'] = $content;

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
		return;
	}

}
