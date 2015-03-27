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

	public static  function max($data, $value){
		self::$message = "必须小于".$value;
		return !strlen($data) ? true : $data <= $value;
	}

	public static  function min($data, $value){
		self::$message = "必须大于".$value;
		return !strlen($data) ? true : $data >= $value;
	}

	public static  function maxLength($data, $value){
		self::$message = "必须小于".$value."字符";
		return !strlen($data) ? true : mb_strlen($data) <= $value;
	}

	public static  function minLength($data, $value){
		self::$message = "必须大于".$value."字符";
		return !strlen($data) ? true : mb_strlen($data) >= $value;
	}

	public static  function email($data){
		self::$message = "不是合法的电子邮件地址";
		return !strlen($data) ? true : filter_var($data, FILTER_VALIDATE_EMAIL);
	}

	public static  function phone($data){
		return true;
	}

	public static  function now(&$data){
		$data = time();
		return true;
	}

	public static  function add(&$data, $value){
		$data = $data ? $data : $value;
		return true;
	}

	public static  function fill(&$data, $value){
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
}