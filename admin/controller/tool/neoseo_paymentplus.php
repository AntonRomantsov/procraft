<?php

require_once( DIR_SYSTEM . "/engine/soforp_controller.php");

class ControllerToolNeoSeoPaymentPlus extends SoforpController
{

	public function __construct($registry)
	{
		parent::__construct($registry);
		$this->_moduleSysName = "neoseo_paymentplus";
				$this->_logFile = $this->_moduleSysName() . ".log";
		$this->debug = $this->config->get($this->_moduleSysName() . "_debug") == 1;
	}

}

?>