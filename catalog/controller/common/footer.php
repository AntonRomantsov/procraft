<?php
class ControllerCommonFooter extends Controller {
	public function index() {
		$this->document->addScript('catalog/view/javascript/jquery/fancybox/jquery.fancybox.min.js','footer');
		$this->document->addScript('catalog/view/theme/default/javascript/main.js','footer');

		$this->load->language('common/footer');

		$this->load->model('catalog/information');

		$data['informations'] = array();

		foreach ($this->model_catalog_information->getInformations() as $result) {
			if ($result['bottom']) {
				$data['informations'][] = array(
					'title' => $result['title'],
					'href'  => $this->url->link('information/information', 'information_id=' . $result['information_id'])
				);
			}
		}
		$data['lang'] = substr($this->session->data['language'], 3, 2);

		$data['about'] = $this->url->link('information/information&information_id=4');
		$data['store'] = $this->url->link('information/information&information_id=7');
		$data['news'] = substr($this->session->data['language'], 3, 2) . '/news';
		$data['bestseller'] = substr($this->session->data['language'], 3, 2) . '/xity-prodazh';
		$data['all_category'] = $this->url->link('product/category&path=69');
		$data['blog'] = substr($this->session->data['language'], 3, 2) . '/blog';
		$data['partnery'] = $this->url->link('information/information&information_id=8');
		$data['delivery'] = $this->url->link('information/information&information_id=6');
		$data['black_list'] = $this->url->link('information/information&information_id=11');
		$data['service_map'] = $this->url->link('information/information&information_id=10');
		$data['instrument'] = $this->url->link('account/instrument');

		$data['contact'] = $this->url->link('information/contact');
		$data['return'] = $this->url->link('account/return/add', '', true);
		$data['sitemap'] = $this->url->link('information/sitemap');
		$data['tracking'] = $this->url->link('information/tracking');
		$data['manufacturer'] = $this->url->link('product/manufacturer');
		$data['voucher'] = $this->url->link('account/voucher', '', true);
		$data['affiliate'] = $this->url->link('affiliate/login', '', true);
		$data['special'] = $this->url->link('product/special');
		$data['account'] = $this->url->link('account/account', '', true);
		$data['order'] = $this->url->link('account/order', '', true);
		$data['wishlist'] = $this->url->link('account/wishlist', '', true);
		$data['newsletter'] = $this->url->link('account/newsletter', '', true);
		$data['catalog'] = $this->url->link('product/catalog', '', true);
		$data['cart'] = $this->url->link('checkout/simplecheckout', '', true);
		$data['special'] = $this->url->link('product/special', '', true);

		$data['count_cart'] = $this->cart->countProducts() + (isset($this->session->data['vouchers']) ? count($this->session->data['vouchers']) : 0);

		$data['footer_phone_href'] = 'tel: +38' . $this->config->get('config_telephone');
		$data['footer_email_href'] = 'mailto: ' . $this->config->get('config_email');

		$data['footer_phone'] = $this->config->get('config_telephone');
		$data['footer_email'] = $this->config->get('config_email');

		$data['route'] = $this->request->get['route'];

		$this->load->model('setting/module');

		$setting_info = $this->model_setting_module->getModule(42);

		if ($setting_info && $setting_info['status']) {
			$output = $this->load->controller('extension/module/newsletter', $setting_info);

			if ($output) {
				$data['form_newsletter'] = $output;
			}
		}

		$data['powered'] = sprintf($this->language->get('text_powered'), date('Y', time()));

		// Whos Online
		if ($this->config->get('config_customer_online')) {
			$this->load->model('tool/online');

			if (isset($this->request->server['REMOTE_ADDR'])) {
				$ip = $this->request->server['REMOTE_ADDR'];
			} else {
				$ip = '';
			}

			if (isset($this->request->server['HTTP_HOST']) && isset($this->request->server['REQUEST_URI'])) {
				$url = ($this->request->server['HTTPS'] ? 'https://' : 'http://') . $this->request->server['HTTP_HOST'] . $this->request->server['REQUEST_URI'];
			} else {
				$url = '';
			}

			if (isset($this->request->server['HTTP_REFERER'])) {
				$referer = $this->request->server['HTTP_REFERER'];
			} else {
				$referer = '';
			}

			$this->model_tool_online->addOnline($ip, $this->customer->getId(), $url, $referer);
		}

		$data['scripts'] = $this->document->getScripts('footer');
		$data['styles'] = $this->document->getStyles('footer');
		
		return $this->load->view('common/footer2', $data);
	}
}
