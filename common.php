<?php
Flight::register(
	'db', 'PDO',
	array('mysql:host=localhost;dbname=with-us','root',''),
	function($db){
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$db->prepare('set names utf8')->execute();
	}
);

Flight::map('console',function($info){
	echo "<script>console.log(\"$info\");</script>\n";
});

Flight::map('error',function($message, $url = '', $time = 0){

	$view = array(
		'title' => '错误提醒',
		'message' => $message,
		'url' => $url,
		'time' => $time,
	);

	if(Flight::request()->ajax){
		Flight::json(array('error' => $view), 400);
	}else{
		Flight::render('header', $view, 'header');
		Flight::render('message-error', $view);
	}
	exit();

});

Flight::map('ok',function($message, $url = '', $time = 0){

	$view = array(
		'title' => '成功提醒',
		'message' => $message,
		'url' => $url,
		'time' => $time,
	);

	if(Flight::request()->ajax){
		Flight::json(array('ok' => $view), 200);
	}else{
		Flight::render('header', $view, 'header');
		Flight::render('message-ok', $view);
	}
	exit();
	
});