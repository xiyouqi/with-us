<?php
require 'lib/Valid.php';

Flight::map('query',function($sql, $array = null){
	$rs = Flight::db()->prepare($sql);
	$rs->execute($array);
	return $rs->fetchAll(PDO::FETCH_ASSOC);
});

Flight::map('insert',function($table, $array){
	$keys = implode(array_keys($array), '`,`');
	$values = implode(array_keys($array), ',:');
	$sql = "INSERT INTO `$table` (`$keys`) VALUES (:$values)";
	$rs = Flight::db()->prepare($sql);
	$rs->execute($array);
	return $rs->rowCount();
});

Flight::map('update',function($table, $array, $where = 'id'){
	$fileds = $and = '';
	foreach ($array as $key => $value) {
		$fileds = $and . '`' . $key . '`' . ' = :' . $key;
		$and = ' , ';
	}
	$sql = "UPDATE `$table` SET $fileds WHERE `$where` = ':$where'";
	$rs = Flight::db()->prepare($sql);
	$rs->execute($array);
	return $rs->rowCount();
});

Flight::map('where',function($table, $array, $select = '*', $one = false){
	$select = is_array($select) ? '`' . implode($select, '`,`') . '`' : $select;
	$sql = "SELECT $select FROM `$table`";
	$where = $and = '';
	foreach ($array as $key => $value) {
		$where .= $and . '`' . $key . '`' . ' = :' . $key;
		$and = ' AND ';
	}
	$sql = $where ? $sql . ' WHERE ' . $where : $sql;
	$rs = Flight::db()->prepare($sql);
	$rs->execute($array);
	return $one ? $rs->fetch(PDO::FETCH_ASSOC) : $rs->fetchAll(PDO::FETCH_ASSOC);
});

Flight::map('find',function($table, $array, $select = '*'){
	return Flight::where($table, $array, $select, true);
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
		$data = Flight::valid(Flight::request()->data[$key], $val);
		$map[$key] = $data;
	}
	return call_user_func_array(array('Flight', $method), array($table, $map));
});