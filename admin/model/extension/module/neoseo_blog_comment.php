<?php

require_once( DIR_SYSTEM . "/engine/neoseo_model.php");

class ModelExtensionModuleNeoSeoBlogComment extends NeoSeoModel
{

	public function __construct($registry)
	{
		parent::__construct($registry);
		$this->_moduleSysName = 'neoseo_blog';
				$this->_modulePostfix = "_comment";
		$this->_logFile = $this->_moduleSysName . '.log';
		$this->debug = $this->config->get($this->_moduleSysName . '_status') == 1;

		
	}

	public function install()
	{
		return TRUE;
	}

	public function installTables()
	{	}

	public function upgrade()
	{	}

	public function uninstall()
	{
		return TRUE;
	}

	

}

?>