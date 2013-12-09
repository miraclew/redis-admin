<?php 
if (!defined('CONN_CONFIG_FILE_PATH')) {
	define('CONN_CONFIG_FILE_PATH', __DIR__."/config/connections.json") || trigger_error('constant already defined', E_USER_NOTICE);
}

require_once 'controller.php';

function index() {
	render('index');
}