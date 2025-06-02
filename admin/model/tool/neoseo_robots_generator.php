<?php

require_once(DIR_SYSTEM . "/engine/neoseo_model.php");

class ModelToolNeoseoRobotsGenerator extends NeoSeoModel
{

	public function __construct($registry)
	{
		parent::__construct($registry);
				$this->_moduleSysName = "neoseo_robots_generator";
		$this->_logFile = $this->_moduleSysName() . ".log";
		$this->debug = $this->config->get($this->_moduleSysName() . '_debug') == 1;
		
		$this->options_levels = array(
			'module_key' => 0,
			'status' => 0,
			'debug' => 0
		);
	}

	public function isExistSearchAdress()
	{
		$sql = "show tables like 'search_adress%'";
		$query = $this->db->query($sql);
		return $query->num_rows > 0;
	}

	public function generate()
	{
		$store_url = $this->config->get('config_secure') ? HTTPS_CATALOG : HTTP_CATALOG;
		$host = rtrim(str_replace("http://", '', $store_url), "/");

		$common_content = '';
		$common_content .= "
Disallow:/admin
Allow: /catalog/*.css
Allow: /catalog/*.js
Allow: /catalog/*.js
Allow: /catalog/*.png
Allow: /catalog/*.gif
Allow: /catalog/*.ttf
Allow: /catalog/*.otf
Allow: /catalog/*.woff
Disallow:/catalog
Disallow:/download
Disallow:/system

Disallow:/" . $this->getLink("account/account") . "
Disallow:/" . $this->getLink("account/register") . "
Disallow:/" . $this->getLink("account/login") . "
Disallow:/" . $this->getLink("account/logout") . "
Disallow:/" . $this->getLink("account/forgotten") . "
Disallow:/" . $this->getLink("account/edit") . "
Disallow:/" . $this->getLink("account/address") . "
Disallow:/" . $this->getLink("account/voucher") . "
Disallow:/" . $this->getLink("account/reward") . "
Disallow:/" . $this->getLink("account/wishlist") . "
Disallow:/" . $this->getLink("account/newsletter") . "
Disallow:/" . $this->getLink("account/order") . "
Disallow:/" . $this->getLink("account/transaction") . "
Disallow:/" . $this->getLink("account/return") . "
Disallow:/" . $this->getLink("account/return/insert") . "
Disallow:/" . $this->getLink("account/download") . "

Disallow:/" . $this->getLink("affiliate/account") . "
Disallow:/" . $this->getLink("affiliate/register") . "
Disallow:/" . $this->getLink("affiliate/login") . "
Disallow:/" . $this->getLink("affiliate/logout") . "
Disallow:/" . $this->getLink("affiliate/forgotten") . "
Disallow:/" . $this->getLink("affiliate/edit") . "
Disallow:/" . $this->getLink("affiliate/password") . "
Disallow:/" . $this->getLink("affiliate/transaction") . "
Disallow:/" . $this->getLink("affiliate/payment") . "
Disallow:/" . $this->getLink("affiliate/tracking") . "


Disallow:/" . $this->getLink("checkout/checkout") . "
Disallow:/" . $this->getLink("checkout/cart") . "
Disallow:/" . $this->getLink("checkout/success") . "

Disallow:/" . $this->getLink("product/search") . "
Disallow:/*?filter_name=
Disallow:/*&filter_name=
Disallow:/*?filter_ocfilter=
Disallow:/*&filter_ocfilter=
Disallow:/*?filter_sub_category=
Disallow:/*&filter_sub_category=
Disallow:/*?filter_description=
Disallow:/*&filter_description=

Disallow:/" . $this->getLink("product/compare") . "

Disallow:/*?sort=
Disallow:/*&sort=
Disallow:/*?order=
Disallow:/*&order=
Disallow:/*?limit=
Disallow:/*&limit=
Disallow:/*?tracking=
Disallow:/*&tracking=
";

		$content = "
User-agent: *
$common_content



User-agent: Yandex
$common_content

Host:$host
Sitemap:${store_url}sitemap.xml
        ";

		return $content;
	}

	protected function getLink($route)
	{
		$url = $this->_url->link($route);
		$url = str_replace($this->_store_url, "", $url);
		$url = ltrim($url, "/");
		return $url;
	}

	

}

?>