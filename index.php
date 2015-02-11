<?php
include "config.php";

function connectDatabase($hostname,$username,$password,$database) {
	global $config;
	$mysqli = new mysqli($hostname,$username,$password,$database);
	if ($mysqli->connect_errno) {
		die('Connect failed: '.$mysqli->connect_error);
	}
	return $mysqli;
}

function parseGetParameter($name,$characters,$default) {
	$value = isset($_GET[$name])?$_GET[$name]:$default;
	return $characters?preg_replace("/[^$characters]/",'',$value):$value;
}

function applyWhitelist($table,$action,$list) {
	if ($list===false) return $table;
	$list = array_filter($list, function($actions){
		return strpos($actions,$action[0])!==false;
	});
	return array_intersect($table, array_keys($list));
}

function applyBlacklist($table,$action,$list) {
	if ($list===false) return $table;
	$list = array_filter($list, function($actions) use ($action) {
		return strpos($actions,$action[0])!==false;
	});
	return array_diff($table, array_keys($list));
}

function applyWhitelistAndBlacklist($table, $action, $whitelist, $blacklist) {
	$table = applyWhitelist($table, $action, $whitelist);
	$table = applyBlacklist($table, $action, $blacklist);
	if (empty($table)) exitWith404();
	return $table;
}

function processTableParameter($table,$database,$mysqli) {
	global $config;
	$tablelist = explode(',',$table);
	$tables = array();
	foreach ($tablelist as $table) {
		$table = str_replace('*','%',$table);
		if ($result = $mysqli->query("SELECT `TABLE_NAME` FROM `INFORMATION_SCHEMA`.`TABLES` WHERE `TABLE_NAME` LIKE '$table' AND `TABLE_SCHEMA` = '$database'")) {
			while ($row = $result->fetch_row()) $tables[] = $row[0];
			$result->close();
		}
	}
	return $tables;
}

function findPrimaryKey($table,$database,$mysqli) {
	global $config;
	$keys = array();
	if ($result = $mysqli->query("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `COLUMN_KEY` = 'PRI' AND `TABLE_NAME` = '$table[0]' AND `TABLE_SCHEMA` = '$database'")) {
		while ($row = $result->fetch_row()) $keys[] = $row[0];
		$result->close();
	}
	return count($keys)?$keys[0]:false;
}

function exitWith404() {
	die(header("Content-Type:",true,404));
}

function startOutput($callback) {
	if ($callback) {
		header("Content-Type: application/javascript");
		echo $callback.'(';
	} else {
		header("Content-Type: application/json");
	}
}

function endOutput($callback) {
	if ($callback) {
		echo ');';
	}
}

function processKeyParameter($key,$table,$database,$mysqli) {
	if ($key) {
		$key = array($key,findPrimaryKey($table,$database,$mysqli));
		if ($key[1]===false) exitWith404();
	}
	return $key;
}

function processFilterParameter($filter,$match,$mysqli) {
	if ($filter) {
		$filter = explode(':',$filter,2);
		if (count($filter)==2) {
			$filter[0] = preg_replace('/[^a-zA-Z0-9\-_]/','',$filter[0]);
			if ($match=='in') {
				$filter[1] = implode("','",array_map(function($v){ return preg_replace('/[^a-zA-Z0-9\-]/','',$v); },explode(',',$filter[1])));
			} else {
				$filter[1] = $mysqli->real_escape_string($filter[1]);
			}
			$filter[2] = 'LIKE';
			if ($match=='any'||$match=='start') $filter[1] .= '%';
			if ($match=='any'||$match=='end') $filter[1] = '%'.$filter[1];
			if ($match=='exact') $filter[2] = '=';
			if ($match=='lower') $filter[2] = '<';
			if ($match=='upto') $filter[2] = '<=';
			if ($match=='from') $filter[2] = '>=';
			if ($match=='higher') $filter[2] = '>';
			if ($match=='in') $filter[2] = 'IN';
			$filter[1]="'$filter[1]'";
			if ($filter[2]=='IN') $filter[1]="($filter[1])";
		} else {
			$filter = false;
		}
	}
	return $filter;
}

function processPageParameter($page) {
	if ($page) {
		$page = explode(',',$page,2);
		if (count($page)<2) $page[1]=20;
		$page[0] = ($page[0]-1)*$page[1];
	}
	return $page;
}

function retrieveObject($key,$table,$mysqli) {
	if (!$key) return false;
	if ($result = $mysqli->query("SELECT * FROM `$table[0]` WHERE `$key[1]` = '$key[0]'")) {
		$object = $result->fetch_assoc();
		$result->close();
	}
	return $object;
}

function createObject($input,$table,$mysqli) {
	if (!$input) return false;
	$keys = implode('`,`',array_map(function($v){ return preg_replace('/[^a-zA-Z0-9\-_]/','',$v); },array_keys((array)$input)));
	$values = implode("','",array_map(function($v) use ($mysqli){ return $mysqli->real_escape_string($v); },array_values((array)$input)));
	$mysqli->query("INSERT INTO `$table[0]` (`$keys`) VALUES ('$values')");
	return $mysqli->insert_id;
}

function updateObject($key,$input,$table,$mysqli) {
	if (!$input) return false;
	$sql = "UPDATE `$table[0]` SET ";
	foreach (array_keys((array)$input) as $i=>$k) {
		if ($i) $sql .= ",";
		$v = $input->$k;
		$sql .= "`$k`='$v'";
	}
	$sql .= " WHERE `$key[1]`='$key[0]'";
	$mysqli->query($sql);
	return $mysqli->affected_rows;
}

function deleteObject($key,$table,$mysqli) {
	$mysqli->query("DELETE FROM `$table[0]` WHERE `$key[1]`='$key[0]'");
	return $mysqli->affected_rows;
}

$action   = parseGetParameter('action', 'a-z', 'list');
$table    = parseGetParameter('table', 'a-zA-Z0-9\-_*,', '*');
$key      = parseGetParameter('key', 'a-zA-Z0-9\-,', false); // auto-increment or uuid
$callback = parseGetParameter('callback', 'a-zA-Z0-9\-_', false);
$page     = parseGetParameter('page', '0-9,', false);
$filter   = parseGetParameter('filter', false, 'start');
$match    = parseGetParameter('match', 'a-z', false);

$mysqli = connectDatabase($config["hostname"], $config["username"], $config["password"], $config["database"]);

$table  = processTableParameter($table,$config["database"],$mysqli);
$key    = processKeyParameter($key,$table,$config["database"],$mysqli);
$filter = processFilterParameter($filter,$match,$mysqli);
$page   = processPageParameter($page);

$table  = applyWhitelistAndBlacklist($table,$action,$config['whitelist'],$config['blacklist']);

$object = retrieveObject($key,$table,$mysqli);
$input  = json_decode(file_get_contents('php://input'));

switch($action){
	case 'list':
		startOutput($callback);
		echo '{';
		$tables = $table;
		foreach ($tables as $t=>$table) {
			$count = false;
			if ($t>0) echo ',';
			echo '"'.$table.'":{';
			if ($t==0 && is_array($page)) {
				$sql = "SELECT COUNT(*) FROM `$table`";
				if (is_array($filter)) $sql .= " WHERE `$filter[0]` $filter[2] $filter[1]";
				if ($result = $mysqli->query($sql)) {
					$pages = $result->fetch_row();
					$count = $pages[0];
				}
			}
			echo '"columns":';
			$sql = "SELECT * FROM `$table`";
			if ($t==0 && is_array($filter)) $sql .= " WHERE `$filter[0]` $filter[2] $filter[1]";
			if ($t==0 && is_array($page)) $sql .= " LIMIT $page[1] OFFSET $page[0]";
			if ($result = $mysqli->query($sql)) {
				$fields = array();
				foreach ($result->fetch_fields() as $field) $fields[] = $field->name;
				echo json_encode($fields);
				echo ',"records":[';
				$first_row = true;
				while ($row = $result->fetch_row()) {
					if ($first_row) $first_row = false;
					else echo ',';
					echo json_encode($row);
				}
				$result->close();
			}
			if ($results) echo ',"results":'.$count;
			echo ']}';
		}
		echo '}';
		endOutput($callback);
		break;
	case 'read':
		if (!$object) exitWith404();
		startOutput($callback);
		echo json_encode($object);
		endOutput($callback);
		break;
	case 'create':;
		if (!$input) exitWith404();
		startOutput($callback);
		echo json_encode(createObject($input,$table,$mysqli));
		endOutput($callback);
		break;
	case 'update':
		if (!$input) exitWith404();
		startOutput($callback);
		echo json_encode(updateObject($key,$input,$table,$mysqli));
		endOutput($callback);
		break;
	case 'delete':
		if (!$object) exitWith404();
		startOutput($callback);
		echo json_encode(deleteObject($key,$table,$mysqli));
		endOutput($callback);
		break;
	default: exitWith404();
}
