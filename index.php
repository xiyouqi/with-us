<?php
require 'flight/Flight.php';
require 'lib/Valid.php';
session_start();
Flight::register(
	'db', 'PDO',
	array('mysql:host=localhost;dbname=with_us','root','glosea'),
	function($db){
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->prepare('set names utf8')->execute();
	}
);

Flight::map('query',function($sql, $array = null){
	$rs = Flight::db()->prepare($sql);
	$rs->execute($array);
	return $rs->fetchAll(PDO::FETCH_ASSOC);
});

Flight::map('insert',function($table, $array){
	$keys = implode(array_keys($array), '`,`');
	$sql = "INSERT INTO `$table` (`".str_replace(':', '', $keys)."`) VALUES (".str_replace('`', '', $keys).")";
	$rs = Flight::db()->prepare($sql);
	$rs->execute($array);
	return $rs->rowCount();
});

Flight::map('find',function($table, $array){
	$sql = "SELECT * FROM `$table`";
	$where = $and = '';
	foreach ($array as $key => $value) {
		$where .= $and . '`' . str_replace(':', '', $key) . '`' . ' = ' . $key;
		$and = ' AND ';
	}
	$sql = $where ? $sql . ' WHERE ' . $where : $sql;
	$rs = Flight::db()->prepare($sql);
	$rs->execute($array);
	return $rs->fetch(PDO::FETCH_ASSOC);
});

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
	Flight::render('header', $view, 'header');
	Flight::render('message-error', $view);
	exit();
});

Flight::map('ok',function($message, $url = '', $time = 0){
	$view = array(
		'title' => '成功提醒',
		'message' => $message,
		'url' => $url,
		'time' => $time,
	);
	Flight::render('header', $view, 'header');
	Flight::render('message-ok', $view);
	exit();
});

Flight::map('valid',function($data, $rules){
	$rules = explode('|', $rules);
	$name;
	foreach ($rules as $key => $rule) {
		if(0 == $key){
			$name = $rule;
			continue;
		}
		$rule = explode('-', $rule);
		$method = $rule[0];
		if(isset($method) && method_exists('Valid', $method)){
			$rule[0] = &$data;
			$result = call_user_func_array(array('Valid', $method), $rule);
			if(false === $result){
				Flight::error($name.Valid::$message);
			}
		}
	}
	return $data;
});

Flight::map('form',function($table, $array, $method = 'insert'){
	$map = array();
	foreach ($array as $key => $val) {
		$data = Flight::valid($_POST[$key], $val);
		$map[':'.$key] = $data;
	}
	return call_user_func_array(array('Flight', $method), array($table, $map));
});

Flight::route('/', function(){
		$view = array(
			'title' => '主页'
		);
		Flight::render('header', $view, 'header');
		Flight::render('index', $view);
});

Flight::route('/event-apply', function(){
		$view = array(
			'title' => '活动申请'
		);
		Flight::render('header', $view, 'header');
		Flight::render('event-apply', $view);
});

Flight::route('/member-apply', function(){
		$view = array(
			'title' => '会员申请'
		);

		$schema = array(
			'type' => '会员类型|required|maxLength-20|minLength-2',
			'amount' => '充值金额|required|number',
			'member_no' => '购买数量|required|number|max-100|min-1',
			'contact' => '联系人|required|maxLength-20|minLength-2',
			'contact_mobile' => '联系电话|required|maxLength-13|minLength-7',
			'contact_email' => '邮箱|email',
			'status' => '状态|fill-0'
		);

		if('POST' === Flight::request()->method){
			Flight::form('member_apply', $schema);
			Flight::ok('申请提交成功，请等待审核。');
		}

		Flight::render('header', $view, 'header');
		Flight::render('member-apply', $view);
});

Flight::route('/member-benefits', function(){
		$view = array(
			'title' => '会员资格'
		);
		Flight::render('header', $view, 'header');
		Flight::render('member-benefits', $view);
});

Flight::route('/next', function(){
		$view = array(
			'title' => '成为下一个'
		);
		Flight::render('header', $view, 'header');
		Flight::render('next', $view);
});

Flight::route('/office-bj', function(){
		$view = array(
			'title' => '办公空间'
		);
		Flight::render('header', $view, 'header');
		Flight::render('office-bj', $view);
});

Flight::route('/office', function(){
		$view = array(
			'title' => '办公空间'
		);
		Flight::render('header', $view, 'header');
		Flight::render('office', $view);
});

Flight::route('/our-services', function(){
		$view = array(
			'title' => '我们的服务'
		);
		Flight::render('header', $view, 'header');
		Flight::render('our-services', $view);
});

Flight::route('/room-apply', function(){
		$view = array(
			'title' => '会议室预约'
		);
		Flight::render('header', $view, 'header');
		Flight::render('room-apply', $view);
});

Flight::route('/service-apply', function(){
		$view = array(
			'title' => '服务申请'
		);
		Flight::render('header', $view, 'header');
		Flight::render('service-apply', $view);
});

Flight::route('/sign-in', function(){
		$view = array(
			'title' => '用户登录'
		);

		$schema = array(
			'email' => '邮箱|required|email',
			'password' => '密码|required|minLength-6|maxLength-16|md5'
		);

		if('POST' === Flight::request()->method){
			$user = Flight::form('user', $schema, 'find');
			if($user){
				$_SESSION['user'] = $user;
				Flight::ok('用户登录成功', '/', 3);
			}else{
				Flight::error('用户名或密码错误');
			}
		}

		Flight::render('header', $view, 'header');
		Flight::render('sign-in', $view);
});

Flight::route('/sign-out', function(){
	session_unset('user');
	Flight::ok('用户注销成功', '/', 3);
});

Flight::route('/sign-up', function(){
		$view = array(
			'title' => '用户注册'
		);

		$schema = array(
			'email' => '邮箱|required|email',
			'name' => '用户名|required|maxLength-20|minLength-2',
			'password' => '密码|required|minLength-6|maxLength-16|md5',
			'regtime' => '注册时间|now',
			'status' => '状态|fill-0'
		);

		$user = array(
			'email' => '邮箱|required|email'
		);

		if('POST' === Flight::request()->method){

			if($_POST['password'] != $_POST['repassword']){
				return Flight::error('两次输入密码不一致');
			}

			$user = Flight::form('user', $user, 'find');

			if($user){
				return Flight::error('邮箱已经存在');
			}

			Flight::form('user', $schema);
			Flight::ok('用户注册成功');
		}

		Flight::render('header', $view, 'header');
		Flight::render('sign-up', $view);
});

Flight::route('/visit', function(){
		$view = array(
			'title' => '预约参观'
		);

		$schema = array(
			'visit_time' => '参观时间|required|maxLength-20|minLength-2',
			'visit_num' => '参观人数|required|number|max-200|min-1',
			'industry' => '所属行业|required|maxLength-20|minLength-2',
			'contact' => '联系人|required|maxLength-20|minLength-2',
			'contact_mobile' => '联系电话|required|maxLength-13|minLength-7',
			'contact_email' => '邮箱|email',
			'apply_time' => '申请时间|now',
			'status' => '状态|fill-0'
		);

		if('POST' === Flight::request()->method){
			Flight::form('visit_apply', $schema);
			Flight::ok('预约提交成功。');
		}

		Flight::render('header', $view, 'header');
		Flight::render('visit', $view);
});

Flight::start();
?>
