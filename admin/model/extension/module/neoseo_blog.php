<?php

require_once( DIR_SYSTEM . "/engine/neoseo_model.php");

class ModelExtensionModuleNeoSeoBlog extends NeoSeoModel
{

	public function __construct($registry)
	{
		parent::__construct($registry);
		$this->_moduleSysName = 'neoseo_blog';
				$this->_modulePostfix = "";
		$this->_logFile = $this->_moduleSysName() . '.log';
		$this->debug = $this->config->get($this->_moduleSysName() . '_status') == 1;

		$this->params = array(
			'module_key' => '',
			'status' => 1,
			'debug' => 0,
			'comment_auto_approval' => 0,
			'article_time_format' => '%Y-%m-%d',
			'comment_time_format' => '%Y-%m-%d',
			'image_article_list_width' => '200',
			'image_article_list_height' => '100',
			'image_article_block_width' => '400',
			'image_article_block_height' => '200',
			'image_product_block_width' => $this->config->get('theme_default_image_product_width'),
			'image_product_block_height' => $this->config->get('theme_default_image_product_width'),
			'image_category_block_width' => $this->config->get('theme_default_image_category_width'),
			'image_category_block_height' => $this->config->get('theme_default_image_category_height'),
			'image_author_block_width' => $this->config->get('theme_default_image_category_width'),
			'image_author_block_height' => $this->config->get('theme_default_image_category_height'),
		);

		$this->options_levels = array(
			'module_key' => 0,
			'status' => 0,
			'debug' => 0,
			'comment_auto_approval' => 1,
			'article_time_format' => 1,
			'comment_time_format' => 1,
			'image_article_list_width' => 1,
			'image_article_list_height' => 1,
			'image_article_block_width' => 1,
			'image_article_block_height' => 1,
			'image_product_block_width' => 1,
			'image_product_block_height' => 1,
			'image_category_block_width' => 1,
			'image_category_block_height' => 1,
			'image_author_block_width' => 1,
			'image_author_block_height' => 1,
		);

		
	}

	public function install()
	{
		// Значения параметров по умолчанию
		$this->initParams($this->params);

		$this->installTables();

		// Добавляем права на нестандартные контроллеры, если они используются
		$this->addPermission($this->user->getGroupId(), 'access', 'blog/' . $this->_moduleSysName() . '_category');
		$this->addPermission($this->user->getGroupId(), 'modify', 'blog/' . $this->_moduleSysName() . '_category');

		$this->addPermission($this->user->getGroupId(), 'access', 'blog/' . $this->_moduleSysName() . '_author');
		$this->addPermission($this->user->getGroupId(), 'modify', 'blog/' . $this->_moduleSysName() . '_author');

		$this->addPermission($this->user->getGroupId(), 'access', 'blog/' . $this->_moduleSysName() . '_article');
		$this->addPermission($this->user->getGroupId(), 'modify', 'blog/' . $this->_moduleSysName() . '_article');

		$this->addPermission($this->user->getGroupId(), 'access', 'blog/' . $this->_moduleSysName() . '_comment');
		$this->addPermission($this->user->getGroupId(), 'modify', 'blog/' . $this->_moduleSysName() . '_comment');

		$this->addPermission($this->user->getGroupId(), 'access', 'blog/' . $this->_moduleSysName() . '_report');
		$this->addPermission($this->user->getGroupId(), 'modify', 'blog/' . $this->_moduleSysName() . '_report');

		//Устанавливаем компоненты модуля
		$this->installComponent($this->_moduleSysName() . '_category');
		$this->installComponent($this->_moduleSysName() . '_comment');
		$this->installComponent($this->_moduleSysName() . '_search');
		$this->installComponent($this->_moduleSysName() . '_products');
		$this->installComponent($this->_moduleSysName() . '_article');

		return TRUE;
	}

	public function installTables()
	{
		$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "seo_blog_article` (
			  `article_id` INT NOT NULL AUTO_INCREMENT,
			  `author_id` INT NOT NULL,
			  `allow_comment` INT NOT NULL,
			  `image` TEXT NOT NULL,
			  `sort_order` INT NOT NULL,
			  `status` INT NOT NULL,
			  `viewed` INT NOT NULL,
			  `date_added` datetime NOT NULL,
			  `date_modified` datetime NOT NULL,
			   PRIMARY KEY (`article_id`)
			) DEFAULT CHARSET=utf8;");

		$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "seo_blog_article_description` (
			  `article_description_id` INT NOT NULL AUTO_INCREMENT,
			  `article_id` INT NOT NULL,
			  `language_id` INT NOT NULL,
			  `name` VARCHAR(255) NOT NULL,
			  `meta_title` VARCHAR(255) NOT NULL,
			  `meta_h1` VARCHAR(255) NOT NULL,
			  `teaser` TEXT NOT NULL,
			  `description` TEXT NOT NULL,
			  `meta_description` VARCHAR(255) NOT NULL,
			  `meta_keyword` VARCHAR(255) NOT NULL,
			  PRIMARY KEY (`article_description_id`),
			  KEY `article` (`article_id`)
			) DEFAULT CHARSET=utf8;");

		$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "seo_blog_article_related_product` (
			  `article_id` INT NOT NULL,
			  `product_id` INT NOT NULL,
			  PRIMARY KEY (`article_id`,`product_id`),
			  KEY `product` (`product_id`)
			) DEFAULT CHARSET=utf8;");

		$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "seo_blog_article_related_article` (
			  `related_article_id` INT NOT NULL AUTO_INCREMENT,
			  `article_id` INT NOT NULL,
			  `related_id` INT NOT NULL,
			  `sort_order` INT NOT NULL,
			  `status` INT NOT NULL,
			  `date_added` datetime NOT NULL,
			  PRIMARY KEY (`related_article_id`)
			) DEFAULT CHARSET=utf8;");

		$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "seo_blog_article_to_category` (
			  `article_id` INT NOT NULL,
			  `category_id` INT NOT NULL,
			  `main_category` INT NOT NULL DEFAULT '0',
			  PRIMARY KEY (`article_id`,`category_id`),
			  KEY `category` (`category_id`)
			) DEFAULT CHARSET=utf8;");

		$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "seo_blog_article_to_layout` (
			  `article_id` INT NOT NULL,
			  `store_id` INT NOT NULL,
			  `layout_id` INT NOT NULL,
			  PRIMARY KEY (`article_id`,`store_id`)
			) DEFAULT CHARSET=utf8;");

		$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "seo_blog_article_to_store` (
			  `article_id` INT NOT NULL,
			  `store_id` INT NOT NULL
			) DEFAULT CHARSET=utf8;");

		$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "seo_blog_author` (
			  `author_id` INT NOT NULL AUTO_INCREMENT,
			  `name` VARCHAR(255) NOT NULL,
			  `image` TEXT NOT NULL,
			  `status` INT NOT NULL,
			  `date_added` datetime NOT NULL,
			  `date_modified` datetime NOT NULL,
			  PRIMARY KEY (`author_id`),
			  KEY `author_status` (`author_id`,`status`)
			) DEFAULT CHARSET=utf8;");

		$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "seo_blog_author_description` (
			  `author_description_id` INT NOT NULL AUTO_INCREMENT,
			  `author_id` INT NOT NULL,
			  `language_id` INT NOT NULL,
			  `meta_title` VARCHAR(255) NOT NULL,
			  `meta_h1` VARCHAR(255) NOT NULL,
			  `teaser` TEXT NOT NULL,
			  `description` TEXT NOT NULL,
			  `meta_description` VARCHAR(255) NOT NULL,
			  `meta_keyword` VARCHAR(255) NOT NULL,
			  `date_added` datetime NOT NULL,
			  PRIMARY KEY (`author_description_id`),
			  KEY `author` (`author_id`)
			) DEFAULT CHARSET=utf8;");

		$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "seo_blog_category` (
			  `category_id` INT NOT NULL AUTO_INCREMENT,
			  `image` TEXT NOT NULL,
			  `parent_id` INT NOT NULL,
			  `sort_order` INT NOT NULL,
			  `status` INT NOT NULL,
			  `date_added` datetime NOT NULL,
			  `date_modified` datetime NOT NULL,
			  PRIMARY KEY (`category_id`)
			) ENGINE=MyISAM DEFAULT CHARSET=utf8;");

		$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "seo_blog_category_description` (
			  `category_description_id` INT NOT NULL AUTO_INCREMENT,
			  `category_id` INT NOT NULL,
			  `language_id` INT NOT NULL,
			  `name` VARCHAR(255) NOT NULL,
			  `meta_title` VARCHAR(255) NOT NULL,
			  `meta_h1` VARCHAR(255) NOT NULL,
			  `teaser` TEXT NOT NULL,
			  `description` TEXT NOT NULL,
			  `meta_description` VARCHAR(255) NOT NULL,
			  `meta_keyword` VARCHAR(255) NOT NULL,
			  PRIMARY KEY (`category_description_id`),
			  KEY `category` (`category_id`)
			) DEFAULT CHARSET=utf8;");

		$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "seo_blog_category_path` (
			  `category_id` INT NOT NULL,
			  `path_id` INT NOT NULL,
			  `level` INT NOT NULL,
			  PRIMARY KEY (`category_id`,`path_id`)
			) ENGINE=MyISAM DEFAULT CHARSET=utf8;");

		$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "seo_blog_category_to_layout` (
			  `category_id` INT NOT NULL,
			  `store_id` INT NOT NULL,
			  `layout_id` INT NOT NULL
			) DEFAULT CHARSET=utf8;");

		$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "seo_blog_category_to_store` (
			  `category_id` INT NOT NULL,
			  `store_id` INT NOT NULL
			) DEFAULT CHARSET=utf8;");

		$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "seo_blog_comment` (
			  `comment_id` INT NOT NULL AUTO_INCREMENT,
			  `article_id` INT NOT NULL,
			  `comment_reply_id` INT NOT NULL,
			  `author` VARCHAR(255) NOT NULL,
			  `comment` TEXT NOT NULL,
			  `status` INT NOT NULL,
			  `date_added` datetime NOT NULL,
			  `date_modified` datetime NOT NULL,
			  `rating` INT NOT NULL,
			  PRIMARY KEY (`comment_id`)
			) DEFAULT CHARSET=utf8;");

		$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "seo_category_to_blog_article` (
			  `category_to_blog_article_id` INT NOT NULL AUTO_INCREMENT,
			  `category_id` INT NOT NULL,
			  `article_id` INT NOT NULL,
			  PRIMARY KEY (`category_to_blog_article_id`),
			  KEY (`category_id`)
			) DEFAULT CHARSET=utf8;");
	}

	public function upgrade()
	{
		$this->initParams($this->params);
		$this->installTables();
	}

	public function uninstall()
	{
		$this->db->query("DROP TABLE IF EXISTS " . DB_PREFIX . "seo_blog_article");
		$this->db->query("DROP TABLE IF EXISTS " . DB_PREFIX . "seo_blog_article_description");
		$this->db->query("DROP TABLE IF EXISTS " . DB_PREFIX . "seo_blog_article_related_product");
		$this->db->query("DROP TABLE IF EXISTS " . DB_PREFIX . "seo_blog_article_related_article");
		$this->db->query("DROP TABLE IF EXISTS " . DB_PREFIX . "seo_blog_article_to_category");
		$this->db->query("DROP TABLE IF EXISTS " . DB_PREFIX . "seo_blog_article_to_layout");
		$this->db->query("DROP TABLE IF EXISTS " . DB_PREFIX . "seo_blog_article_to_store");
		$this->db->query("DROP TABLE IF EXISTS " . DB_PREFIX . "seo_blog_author");
		$this->db->query("DROP TABLE IF EXISTS " . DB_PREFIX . "seo_blog_author_description");
		$this->db->query("DROP TABLE IF EXISTS " . DB_PREFIX . "seo_blog_category");
		$this->db->query("DROP TABLE IF EXISTS " . DB_PREFIX . "seo_blog_category_description");
		$this->db->query("DROP TABLE IF EXISTS " . DB_PREFIX . "seo_blog_category_path");
		$this->db->query("DROP TABLE IF EXISTS " . DB_PREFIX . "seo_blog_category_to_layout");
		$this->db->query("DROP TABLE IF EXISTS " . DB_PREFIX . "seo_blog_category_to_store");
		$this->db->query("DROP TABLE IF EXISTS " . DB_PREFIX . "seo_blog_comment");
		$this->db->query("DROP TABLE IF EXISTS " . DB_PREFIX . "seo_category_to_blog_article");

		$this->db->query("DELETE FROM `" . DB_PREFIX . "setting` WHERE `code` = '" . $this->_moduleSysName() . "'");

		$this->load->model('setting/extension');
		$this->load->model('setting/module');
		$this->model_setting_extension->uninstall('module', $this->_moduleSysName() . '_comment');
		$this->model_setting_extension->uninstall('module', $this->_moduleSysName() . '_search');
		$this->model_setting_extension->uninstall('module', $this->_moduleSysName() . '_category');
		$this->model_setting_extension->uninstall('module', $this->_moduleSysName() . '_article');
		$this->model_setting_extension->uninstall('module', $this->_moduleSysName() . '_products');


		$this->model_setting_module->deleteModulesByCode($this->_moduleSysName() . '_comment');
		$this->model_setting_module->deleteModulesByCode($this->_moduleSysName() . '_search');
		$this->model_setting_module->deleteModulesByCode($this->_moduleSysName() . '_category');
		$this->model_setting_module->deleteModulesByCode($this->_moduleSysName() . '_article');
		$this->model_setting_module->deleteModulesByCode($this->_moduleSysName() . '_products');

		// Удаляем права на нестандартные контроллеры, если они используются
		$this->load->model('user/user_group');
		$this->model_user_user_group->removePermission($this->user->getGroupId(), 'access', 'blog/' . $this->_moduleSysName() . '_category');
		$this->model_user_user_group->removePermission($this->user->getGroupId(), 'modify', 'blog/' . $this->_moduleSysName() . '_category');

		$this->model_user_user_group->removePermission($this->user->getGroupId(), 'access', 'blog/' . $this->_moduleSysName() . '_author');
		$this->model_user_user_group->removePermission($this->user->getGroupId(), 'modify', 'blog/' . $this->_moduleSysName() . '_author');

		$this->model_user_user_group->removePermission($this->user->getGroupId(), 'access', 'blog/' . $this->_moduleSysName() . '_article');
		$this->model_user_user_group->removePermission($this->user->getGroupId(), 'modify', 'blog/' . $this->_moduleSysName() . '_article');

		$this->model_user_user_group->removePermission($this->user->getGroupId(), 'access', 'blog/' . $this->_moduleSysName() . '_comment');
		$this->model_user_user_group->removePermission($this->user->getGroupId(), 'modify', 'blog/' . $this->_moduleSysName() . '_comment');

		$this->model_user_user_group->removePermission($this->user->getGroupId(), 'access', 'blog/' . $this->_moduleSysName() . '_report');
		$this->model_user_user_group->removePermission($this->user->getGroupId(), 'modify', 'blog/' . $this->_moduleSysName() . '_report');

		//Удаляем компоненты модуля
		$this->uninstallComponent($this->_moduleSysName() . '_category');
		$this->uninstallComponent($this->_moduleSysName() . '_comment');
		$this->uninstallComponent($this->_moduleSysName() . '_search');
		$this->uninstallComponent($this->_moduleSysName() . '_products');
		$this->uninstallComponent($this->_moduleSysName() . '_article');

		return TRUE;
	}

	private function installComponent($extension)
	{
		$this->load->model('setting/extension');

		$this->model_setting_extension->install('module', $extension);

		$this->load->controller('extension/module/' . $extension . '/install');

		$this->addPermission($this->user->getGroupId(), 'access', 'extension/module/' . $extension);
		$this->addPermission($this->user->getGroupId(), 'modify', 'extension/module/' . $extension);
	}

	private function uninstallComponent($extension)
	{
		$this->load->model('setting/extension');
		$this->load->model('setting/module');
		$this->load->model('user/user_group');

		$this->model_setting_extension->uninstall('module', $extension);
		$this->model_setting_module->deleteModulesByCode($extension);

		$this->load->controller('extension/module/' . $extension . '/uninstall');

		$this->model_user_user_group->removePermission($this->user->getGroupId(), 'access', 'extension/module/' . $extension);
		$this->model_user_user_group->removePermission($this->user->getGroupId(), 'modify', 'extension/module/' . $extension);
	}

	

}

?>