<?php
session_start();
require 'flight/Flight.php';
require 'common.php';
require 'orm-mysql.php';
Flight::render('footer', null, 'footer');
Flight::route('/', function(){
		$view = array(
			'title' => '主页'
		);
		Flight::render('header', $view, 'header');
		Flight::render('index', $view);
});

Flight::route('/index-slider', function(){
		$view = array(
			'title' => '主页'
		);
		Flight::render('index-slider', $view);
});

Flight::route('/office-slider', function(){
		$view = array(
			'title' => '主页'
		);
		Flight::render('office-slider', $view);
});

Flight::route('/event-category', function(){
		$view = array(
			'title' => '活动'
		);
		Flight::render('header', $view, 'header');
		Flight::render('event-category', $view);
});

Flight::route('/event-next', function(){
		$events = Flight::where('event', array('status' => 0));
		$view = array(
			'title' => '即将举行的活动',
			'events' => $events
		);
		Flight::render('header', $view, 'header');
		Flight::render('event-next', $view);
});

Flight::route('/event-pre', function(){
		$events = Flight::where('event', array('status' => 1));
		$view = array(
			'title' => '历届活动回顾',
			'events' => $events
		);
		Flight::render('header', $view, 'header');
		Flight::render('event-next', $view);
});

Flight::route('/event-apply', function(){
		$view = array(
			'title' => '活动申请'
		);

		$schema = array(
			'service_id' => '服务类型|fill-2',
			'description' => '活动主题|required|maxLength-256',
			'service_time' => '使用时间|required|maxLength-10|minLength-8',
			'contact' => '联系人|required|maxLength-20|minLength-2',
			'contact_mobile' => '联系电话|required|maxLength-13|minLength-7',
			'number' => '规模人数|required|number',
			'apply_time' => '申请时间|now',
			'status' => '状态|fill-0'
		);

		if('POST' === Flight::request()->method){
			Flight::form('service_apply', $schema);
			Flight::ok('活动场地预约提交成功。');
		}

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

		$schema = array(
			'service_id' => '服务类型|fill-1',
			'service_time' => '使用时间|required|maxLength-10|minLength-8',
			'service_no' => '会议室编号|required|maxLength-20',
			'contact' => '联系人|required|maxLength-20|minLength-2',
			'contact_mobile' => '联系电话|required|maxLength-13|minLength-7',
			'number' => '规模人数|required|number',
			'apply_time' => '申请时间|now',
			'status' => '状态|fill-0'
		);

		if('POST' === Flight::request()->method){
			Flight::form('service_apply', $schema);
			Flight::ok('会议室预约提交成功。');
		}

		Flight::render('header', $view, 'header');
		Flight::render('room-apply', $view);
});

Flight::route('/service-apply', function(){
		$view = array(
			'title' => '服务申请'
		);

		$schema = array(
			'service_name' => '服务名称|required|maxLength-20',
			'service_time' => '服务时间|required|maxLength-10|minLength-8',
			'contact' => '联系人|required|maxLength-20|minLength-2',
			'contact_mobile' => '联系电话|required|maxLength-13|minLength-7',
			'contact_email' => '邮箱|email',
			'apply_time' => '申请时间|now',
			'status' => '状态|fill-0'
		);

		if('POST' === Flight::request()->method){
			Flight::form('service', $schema);
			Flight::ok('创意服务申请提交成功。');
		}
		Flight::render('header', $view, 'header');
		Flight::render('service-apply', $view);
});

Flight::route('/service-no', function(){
		Flight::error('服务尚未开通');
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

Flight::route('/reset-password', function(){
		$view = array(
			'title' => '找回密码'
		);

		Flight::render('header', $view, 'header');
		Flight::render('reset-password', $view);
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

			if(Flight::request()->data['password'] != Flight::request()->data['repassword']){
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
