<?php
class Valid {

	public static $message;

	public static function required($data){
		self::$message = "必须填写";
		return !empty($data);
	}

	public static  function number($data){
		self::$message = "必须为数字";
		return !strlen($data) ? true : is_numeric($data);
	}

	public static  function max($data, $value = 1){
		self::$message = "必须小于或等于".$value;
		return !strlen($data) ? true : $data <= $value;
	}

	public static  function min($data, $value = 1){
		self::$message = "必须大于或等于".$value;
		return !strlen($data) ? true : $data >= $value;
	}

	public static  function maxLength($data, $value = 1){
		self::$message = "必须小于或等于".$value."字符";
		return !strlen($data) ? true : mb_strlen($data) <= $value;
	}

	public static  function minLength($data, $value = 1){
		self::$message = "必须大于或等于".$value."字符";
		return !strlen($data) ? true : mb_strlen($data) >= $value;
	}

	public static  function email($data){
		self::$message = "不是合法的电子邮件地址";
		return !strlen($data) ? true : filter_var($data, FILTER_VALIDATE_EMAIL);
	}

	public static  function phone($data){
		return true;
	}

	public static function time(&$data){
		$data = strtotime($data);
		return true;
	}

	public static  function now(&$data){
		$data = time();
		return true;
	}

	public static  function add(&$data, $value = null){
		$data = $data ? $data : $value;
		return true;
	}

	public static  function fill(&$data, $value = null){
		$data = $value;
		return true;
	}

	public static  function int(&$data){
		$data = intval($data);
		return true;
	}

	public static function md5(&$data){
		$data = md5($data);
		return true;
	}

	public static function random(&$data, $length = 4){
		$data = mt_rand(pow(10, $length), pow(10, $length + 1) -1);
		return true;
	}

	public static function session(&$data, $name, $key){
		self::$message = "登录超时或需要授权";
		$data = isset($_SESSION[$user]) ? $_SESSION[$user][$key] : null;
		return is_null($data) ? false : true;
	}
}