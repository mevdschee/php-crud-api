<?php
include "config.php";

$table = str_replace('*','%',preg_replace('/[^a-zA-Z0-9\-_*,]/','',isset($_GET["table"])?$_GET["table"]:'*'));
$callback = preg_replace('/[^a-zA-Z0-9\-_]/','',isset($_GET["callback"])?$_GET["callback"]:false);
$page = preg_replace('/[^0-9:]/','',isset($_GET["page"])?$_GET["page"]:false);
$filter = str_replace('*','%',preg_replace('/[^a-zA-Z0-9\-_*:]/','',isset($_GET["filter"])?$_GET["filter"]:false));

$mysqli = new mysqli($config["hostname"], $config["username"], $config["password"], $config["database"]);

if ($mysqli->connect_errno) die('Connect failed: '.$mysqli->connect_error);

$tablelist = explode(',',$table);
$tables = array();

foreach ($tablelist as $table) {
    if ($result = $mysqli->query("SELECT `TABLE_NAME` FROM `INFORMATION_SCHEMA`.`TABLES` WHERE `TABLE_NAME` LIKE '$table' AND `TABLE_SCHEMA` = '$config[database]'")) {
        while ($row = $result->fetch_row()) $tables[] = $row[0];
        $result->close();
    }
}

if ($config["list_whitelist"]) $tables = array_intersect($tables, $config["list_whitelist"]);
if ($config["list_blacklist"]) $tables = array_diff($tables, $config["list_blacklist"]);

if (empty($tables)) {
    die(header("Content-Type:",true,404));
} if ($callback) {
    header("Content-Type: application/javascript");
    echo $callback.'(';
} else {
    header("Content-Type: application/json");
}

if ($filter) {
    $filter = explode(':',$filter,2);
    if (count($filter)<2) $filter = false;
}

if ($page) {
    $page = explode(':',$page,2);
    if (count($page)<2) $page[1]=20;
    $page[0] *= $page[1];
}

echo '{';
$first_table = true;
foreach ($tables as $table) {
    if ($first_table) $first_table = false;
    else echo ',';
    echo '"'.$table.'":{"columns":';
    $sql = "SELECT * FROM `$table`";
    if ($filter) $sql .= " WHERE `$filter[0]` LIKE '$filter[1]'";
    if ($page) $sql .= " LIMIT $page[1] OFFSET $page[0]";
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
    echo ']}';
}
echo '}';

if ($callback) {
    echo ');';
}
