<?php
require __DIR__.'/../lib/Predis/Autoloader.php';
Predis\Autoloader::register();
if (!defined('CONN_CONFIG_FILE_PATH')) {
	define('CONN_CONFIG_FILE_PATH', __DIR__."/connections.json") || trigger_error('constant already defined', E_USER_NOTICE);
}