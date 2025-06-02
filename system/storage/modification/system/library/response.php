<?php
/**
 * @package		OpenCart
 * @author		Daniel Kerr
 * @copyright	Copyright (c) 2005 - 2017, OpenCart, Ltd. (https://www.opencart.com/)
 * @license		https://opensource.org/licenses/GPL-3.0
 * @link		https://www.opencart.com
*/

/**
* Response class
*/
class Response {
	private $headers = array();
	private $level = 0;
	private $output;

	//Jet Cache vars
	private $sc_registry = Array();
	//End of Jet Cache vars
    

	/**
	 * Constructor
	 *
	 * @param	string	$header
	 *
 	*/

 	public function seocms_setRegistry($registry) {
		$this->sc_registry = $registry;
	}

 	public function seocms_getHeaders() {
		return $this->headers;
	}
 	public function seocms_getOutput() {
		return $this->output;
	}
    
	public function addHeader($header) {
		$this->headers[] = $header;
	}
	
	/**
	 * 
	 *
	 * @param	string	$url
	 * @param	int		$status
	 *
 	*/
	public function redirect($url, $status = 302) {
		header('Location: ' . str_replace(array('&amp;', "\n", "\r"), array('&', '', ''), $url), true, $status);
		exit();
	}
	
	/**
	 * 
	 *
	 * @param	int		$level
 	*/
	public function setCompression($level) {
		$this->level = $level;
	}
	
	/**
	 * 
	 *
	 * @return	array
 	*/
	public function getOutput() {
		return $this->output;
	}
	
	/**
	 * 
	 *
	 * @param	string	$output
 	*/	
	public function setOutput($output) {
		$this->output = $output;
	}
	
	/**
	 * 
	 *
	 * @param	string	$data
	 * @param	int		$level
	 * 
	 * @return	string
 	*/
	private function compress($data, $level = 0) {
		if (isset($_SERVER['HTTP_ACCEPT_ENCODING']) && (strpos($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip') !== false)) {
			$encoding = 'gzip';
		}

		if (isset($_SERVER['HTTP_ACCEPT_ENCODING']) && (strpos($_SERVER['HTTP_ACCEPT_ENCODING'], 'x-gzip') !== false)) {
			$encoding = 'x-gzip';
		}

		if (!isset($encoding) || ($level < -1 || $level > 9)) {
			return $data;
		}

		if (!extension_loaded('zlib') || ini_get('zlib.output_compression')) {
			return $data;
		}

		if (headers_sent()) {
			return $data;
		}

		if (connection_status()) {
			return $data;
		}

		$this->addHeader('Content-Encoding: ' . $encoding);

		return gzencode($data, (int)$level);
	}
	
	/**
	 * 
 	*/
	public function output() {
		// SEO langmark code
		if (function_exists('agoo_cont') && is_callable(array($this->sc_registry, 'get')) && $this->output) {
            if (!defined('DIR_CATALOG')) {
            	$ascp_settings = $this->sc_registry->get('config')->get('ascp_settings');
				if (isset($ascp_settings) && $ascp_settings && $ascp_settings['langmark_widget_status']) {
		           	agoo_cont('record/langmark', $this->sc_registry);
					$this->output = $this->sc_registry->get('controller_record_langmark')->set_agoo_hreflang($this->output);
					$this->output = $this->sc_registry->get('controller_record_langmark')->shortcodes($this->output);
					unset($this->controller_record_langmark);
            	}
            }
		}
		// End SEO langmark code
		// SEO langmark code
			if (is_callable(array($this->sc_registry, 'get')) && $this->output) {
            	if (defined('DIR_CATALOG')) {
            	} else {
	           		if (function_exists('agoo_cont')) {
		           		agoo_cont('record/pagination', $this->sc_registry);
						$this->output = $this->sc_registry->get('controller_record_pagination')->setPagination($this->output);
						unset($this->controller_record_pagintation);

	            		if ($this->sc_registry->get('config')->get('google_sitemap_blog_status')) {
		            		if (isset($this->sc_registry) && $this->sc_registry) {
		            			agoo_cont('record/google_sitemap_blog', $this->sc_registry);
		                		$this->output = $this->sc_registry->get('controller_record_google_sitemap_blog')->setSitemap($this->output);
		                	}
	                	}
                	}
                }
			}
		// End SEO langmark code
		if ($this->output) {
			$output = $this->level ? $this->compress($this->output, $this->level) : $this->output;
			
			if (!headers_sent()) {
				foreach ($this->headers as $header) {
					header($header, true);
				}
			}
			
			echo $output;
		}
	}
}
