<?php

require_once( DIR_SYSTEM . "/engine/neoseo_controller.php");

class ControllerToolNeoSeoCheckout extends NeoSeoController
{

	public function __construct($registry)
	{
		parent::__construct($registry);
		$this->_moduleSysName = "neoseo_checkout";
		$this->_modulePostfix = "";
		$this->_logFile = $this->_moduleSysName() . ".log";
		$this->debug = $this->config->get($this->_moduleSysName() . "_debug") == 1;
	}

}
