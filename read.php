<?php
include "config.php";

$key = preg_replace('/[^a-zA-Z0-9\-_]/','',isset($_GET["key"])?$_GET["key"]:false);
$table = preg_replace('/[^a-zA-Z0-9\-_]/','',isset($_GET["table"])?$_GET["table"]:false);
$callback = preg_replace('/[^a-zA-Z0-9\-_]/','',isset($_GET["callback"])?$_GET["callback"]:false);

$mysqli = new mysqli($config["hostname"], $config["username"], $config["password"], $config["database"]);

if ($mysqli->connect_errno) die('Connect failed: '.$mysqli->connect_error);

$tables = array();

if ($result = $mysqli->query("SELECT `TABLE_NAME` FROM `INFORMATION_SCHEMA`.`TABLES` WHERE `TABLE_NAME` = '$table' AND `TABLE_SCHEMA` = '$config[database]'")) {
    while ($row = $result->fetch_row()) $tables[] = $row[0];
    $result->close();
}

$keys = array();

if ($result = $mysqli->query("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `COLUMN_KEY` = 'PRI' AND `TABLE_NAME` = '$table' AND `TABLE_SCHEMA` = '$config[database]'")) {
	while ($row = $result->fetch_row()) $keys[] = $row[0];
	$result->close();
}

if ($config["read_whitelist"]!==false) $tables = array_intersect($tables, $config["read_whitelist"]);
if ($config["read_blacklist"]!==false) $tables = array_diff($tables, $config["read_blacklist"]);

if (empty($tables) || empty($keys)) {
    die(header("Content-Type:",true,404));
} if ($callback) {
    header("Content-Type: application/javascript");
    echo $callback.'(';
} else {
    header("Content-Type: application/json");
}

if ($result = $mysqli->query("SELECT * FROM `$tables[0]` WHERE `$keys[0]` = '$key'")) {
	$value = $result->fetch_assoc();
    if ($value) echo json_encode($value);
    else die(header("Content-Type:",true,404));
    $result->close();
}

if ($callback) {
    echo ');';
}
