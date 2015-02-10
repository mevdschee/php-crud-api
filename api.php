<?php
include "config.php";

$table = str_replace('*','%',preg_replace('/[^a-zA-Z0-9\-_*]/','',isset($_GET["table"])?$_GET["table"]:'*'));
$callback = preg_replace('/[^a-zA-Z0-9\-_]/','',isset($_GET["callback"])?$_GET["callback"]:false);

$mysqli = new mysqli($config["hostname"], $config["username"], $config["password"], $config["database"]);

if ($mysqli->connect_errno) die('Connect failed: '.$mysqli->connect_error);

$tables = array();

if ($result = $mysqli->query("SELECT `TABLE_NAME` FROM `INFORMATION_SCHEMA`.`TABLES` WHERE `TABLE_NAME` LIKE '$table' AND `TABLE_SCHEMA` = '$config[database]'")) {
    while ($row = $result->fetch_row()) $tables[] = $row[0];
    $result->close();
}

if ($config["whitelist"]) $tables = array_intersect($tables, $config["whitelist"]);
if ($config["blacklist"]) $tables = array_diff($tables, $config["blacklist"]);

if (empty($tables)) {
    die(header("Content-Type:",true,404));
} if ($callback) {
    header("Content-Type: application/javascript");
    echo $callback.'({';
} else {
    header("Content-Type: application/json");
    echo '{';
}

$first = true;
foreach ($tables as $table) {
    if ($first) $first = false;
    else echo ',';
    echo '"'.$table.'":[';
    if ($result = $mysqli->query("SELECT * FROM `$table`")) {
        $fields = array();
        foreach ($result->fetch_fields() as $field) $fields[] = $field->name;
        echo json_encode($fields);
        while ($row = $result->fetch_row()) echo ','.json_encode($row);
        $result->close();
    }
    echo ']';
}

if ($callback) {
    echo '});';
} else {
    echo '}';
}
