<?php 
require_once __DIR__.'/config/config.php';
require_once 'controller.php';

function index() {
	$id = $_REQUEST['id'];
	$cfg = config_load();
	$conn = $cfg['connections'][$id];	
	set('config', $cfg);
	set('h1', $conn['host'].':'.$conn['port']);
	$redis = new Predis\Client('tcp://'.$conn['host'].':'.$conn['port']);
 	
	if ($redis) {
		ob_start();
		var_dump($redis->info());
		$info = ob_get_clean();
		
		set('info', $info);
	}
	else {
		set('info', '连接失败!');
	}
	
	// keyspace
	$keyspace = explode("\n", $cfg['keyspace']);
	sort($keyspace);
	$keys = array();
	$namespace = array();
	
	foreach ($keyspace as $s) {
		if (stripos($s, ':*') === false) {
			$keys[] = $s;
		}
		else {
			$namespace[] = $s;
		}
	}
	set('keys', $keys);
	
	render('index');
}

function watch() {
	
}



?>

