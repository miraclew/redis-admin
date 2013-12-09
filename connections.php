<?php 
require_once __DIR__.'/config/config.php';
require_once 'controller.php';

function connect() {
	$id = $_REQUEST['id'];
	$conn = config_get_connection($id);
	
	$redis = new Redis();
	$data = array();
	$success = $redis->pconnect('127.0.0.1', 6379);
	$data['success'] = $success;
	if ($success) {
		;
	}
	echo json_encode($data);
}

function index() {
	$cfg = config_load();
	$connections = $cfg['connections']; 
	set('config', $cfg);
	render('index');
}

function add() {
	render('edit');
}

function create() {	
	if(!validate($_POST['m'])) {
		render('edit');
		return;
	}
	
	$m = $_POST['m'];
	if(empty($m['name'])) {
		$m['name'] = $m['host'];
	}
	config_save_connection($m);
	
	header("Location: connections.php");
}

function edit() {
	if(!validate($_POST['m'])) {
		render('edit');
		return;
	}
	
	render('edit');
}

function update() {
	$m = $_POST['m'];
	config_save_connection($m);
	header("Location: connections.php");
}

function delete() {
	$id = $_REQUEST['id'];
	config_delete_connection($id);

	header("Location: connections.php");
}

function savekeyspace() {
	$keyspace = $_REQUEST['keyspace'];
	config_save_keyspace($keyspace);
	
	echo json_encode(array('success' => true));
}

function validate($m) {
	$ret = true;
	$flash = array('model'=>$m);
	if(empty($m['host'])) {
		$flash['error'] = 'host不能为空';
		$ret = false;
	}
	$_SESSION['flash'] = $flash;
	
	return $ret;
}


?>