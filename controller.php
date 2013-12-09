<?php
function set($name, $value) {
	$GLOBALS['view_vars'][$name] = $value;	
}

function render($view, $data=null) {
	$pos = strripos($_SERVER['SCRIPT_NAME'],'/');
	$script = substr($_SERVER['SCRIPT_NAME'], $pos+1);
	$controller = substr($script, 0, strripos($script,'.'));
	
	if(isset($GLOBALS['view_vars'])) extract($GLOBALS['view_vars']);
	
 	if(isset($_SERVER['HTTP_X_PJAX'])) {
 		usleep(500000); 			
 		include __DIR__."/views/$controller/$view.php";
 	}
 	else { 		
 		$GLOBALS['content_view'] = __DIR__."/views/$controller/$view.php";
 		include __DIR__."/views/layouts/application.php";
 	}	
}

$action = 'index';
if(isset($_REQUEST['a']))
	$action = $_REQUEST['a'];

if($_SERVER['REQUEST_METHOD'] == 'GET') {
	if (isset($_SESSION['flash'])) {
		$flash = $_SESSION['flash'];
		if ($flash['error']) {
			echo "<div class='alert alert-error'>{$flash['error']}</div>";
		}
	}	
	
	$action();
}
elseif($_SERVER['REQUEST_METHOD'] == 'POST') {
	if($action == 'add') {
		$action = 'create';
	}
	else if($action == 'edit') {
		$action = 'update';
	}
	$action();
}

function get_include_contents($filename) {
	if (is_file($filename)) {
		ob_start();
		include $filename;
		$contents = ob_get_contents();
		ob_end_clean();
		return $contents;
	}
	return false;
}

/**
 * config functions
 */
function config_load() {
	$cfg = array('lastid'=>0, 'connections'=>array());	
	if (file_exists(CONN_CONFIG_FILE_PATH)) {
		$json = file_get_contents(CONN_CONFIG_FILE_PATH);
		$cfg = json_decode($json, true);
	}
	
	return $cfg;
}

function config_get_connection($id) {
	$cfg = config_load();
	return $cfg['connections'][$id];
}

function config_save_connection($connection) {
	$cfg = config_load();
	
	if(isset($connection['id'])) { // update
		$cfg['connections'][$connection['id']] = $connection;
	}
	else { // create
		$lastid = $cfg['lastid'] + 1;
		$cfg['lastid'] = $lastid;
		
		$connection['id'] = $lastid;
		$cfg['connections'][$lastid] = $connection;
	}
	
	$json = json_encode($cfg);
	file_put_contents(CONN_CONFIG_FILE_PATH, $json);
}

function config_delete_connection($id) {
	$cfg = config_load();
	unset($cfg['connections'][$id]);
	$json = json_encode($cfg);
	file_put_contents(CONN_CONFIG_FILE_PATH, $json);
}

function config_save_keyspace($keyspace) {
	$cfg = config_load();
	$cfg['keyspace'] = $keyspace;
	$json = json_encode($cfg);
	file_put_contents(CONN_CONFIG_FILE_PATH, $json);
}
