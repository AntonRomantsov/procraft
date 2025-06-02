<?php
class ControllerExtensionExtensionPromotion extends Controller {
	public function index() {

		$r = substr($this->request->get['route'], strrpos($this->request->get['route'], '/') + 1);
		$cache_key = 'cache.promotion.'.$r;
		$response =  $this->cache->get($cache_key);
		if(!$response) {
			$curl = curl_init();
			curl_setopt($curl, CURLOPT_URL,  'https://neoseo.com.ua/api/promotion.php?&type=' . $r."&lang=".$this->config->get('config_language'));
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($curl, CURLOPT_HEADER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 30);
			curl_setopt($curl, CURLOPT_TIMEOUT, 30);
			$response = curl_exec($curl);
			curl_close($curl);
			$this->cache->set($cache_key, $response);
		}

		if ($response) {
			return $response;
		} else {
			return '';
		}

	}
}