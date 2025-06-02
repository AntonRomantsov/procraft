<?php

require_once(DIR_SYSTEM . "/engine/neoseo_model.php");

class ModelExtensionModuleNeoseoRobotsGenerator extends NeoSeoModel
{

	public function __construct($registry)
	{
		parent::__construct($registry);
				$this->_moduleSysName = "neoseo_robots_generator";
		$this->_logFile = $this->_moduleSysName() . ".log";
		$this->debug = $this->config->get($this->_moduleSysName() . '_debug') == 1;

		$this->params = array(
			'module_key' => '',
			'status' => 1,
			'debug' => 0
		);
		$this->options_levels = array(
			'module_key' => 0,
			'status' => 0,
			'debug' => 0
		);
		
	}

	public function install()
	{
		// Значения параметров по умолчанию
		$this->initParams($this->params);

		// Добавляем права на нестандартные контроллеры, если они используются
		$this->addPermission($this->user->getGroupId(), 'access', 'tool/' . $this->_moduleSysName());
		$this->addPermission($this->user->getGroupId(), 'modify', 'tool/' . $this->_moduleSysName());

		return TRUE;
	}

	public function upgrade()
	{
		return TRUE;
	}

	public function uninstall()
	{
		$this->db->query("DELETE FROM `" . DB_PREFIX . "setting` WHERE `code` = '" . $this->_moduleSysName() . "'");

		return TRUE;
	}

	

}

?>