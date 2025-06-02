<?php

 if($_SERVER['REQUEST_URI'] == "/ru/index.php?route=product/bestseller") {
    header("Location: /ru/xity-prodazh",TRUE,301);
    exit();
    }

 if($_SERVER['REQUEST_URI'] == "/ua/index.php?route=product/bestseller") {
    header("Location: /ua/xity-prodazh",TRUE,301);
    exit();
    }

  if($_SERVER['REQUEST_URI'] == "/ru/index.php?route=product/special") {
    header("Location: /ru/aktsii",TRUE,301);
    exit();
    }

 if($_SERVER['REQUEST_URI'] == "/ua/index.php?route=product/special") {
    header("Location: /ua/aktsii",TRUE,301);
    exit();
    }  

 if($_SERVER['REQUEST_URI'] == '/ua/'){
         header("Location: /ua",TRUE,301);
            exit();
      }

  if($_SERVER['REQUEST_URI'] == '/ru/'){
         header("Location: /ru",TRUE,301);
            exit();
      }     

// Version
define('VERSION', '3.0.3.7');

// Configuration
if (is_file('config.php')) {
	require_once('config.php');
}

// Install
if (!defined('DIR_APPLICATION')) {
	header('Location: install/index.php');
	exit;
}

// Startup
require_once(DIR_SYSTEM . 'startup.php');

start('catalog');