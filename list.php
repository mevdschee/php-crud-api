<?php
include "config.php";

$table = str_replace('*','%',preg_replace('/[^a-zA-Z0-9\-_*,]/','',isset($_GET["table"])?$_GET["table"]:'*'));
$callback = preg_replace('/[^a-zA-Z0-9\-_]/','',isset($_GET["callback"])?$_GET["callback"]:false);
$page = preg_replace('/[^0-9:]/','',isset($_GET["page"])?$_GET["page"]:false);
$filter = isset($_GET["filter"])?$_GET["filter"]:false;
$match = isset($_GET["match"])&&in_array($_GET["match"],array('any','start','end','exact','lower','upto','from','higher'))?$_GET["match"]:'start';

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

if ($config["list_whitelist"]!==false) $tables = array_intersect($tables, $config["list_whitelist"]);
if ($config["list_blacklist"]!==false) $tables = array_diff($tables, $config["list_blacklist"]);

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
    if (count($filter)==2) {
        $filter[0] = preg_replace('/[^a-zA-Z0-9\-_]/','',$filter[0]);
        $filter[1] = $mysqli->real_escape_string($filter[1]);
        $filter[2] = 'LIKE';
        if ($match=='any'||$match=='start') $filter[1] .= '%';
        if ($match=='any'||$match=='end') $filter[1] = '%'.$filter[1];
        if ($match=='exact') $filter[2] = '=';
        if ($match=='lower') $filter[2] = '<';
        if ($match=='upto') $filter[2] = '<=';
        if ($match=='from') $filter[2] = '>=';
        if ($match=='higher') $filter[2] = '>';
    } else {
        $filter = false;
    }
}

if ($page) {
    $page = explode(':',$page,2);
    if (count($page)<2) $page[1]=20;
    $page[0] = ($page[0]-1)*$page[1];
}

echo '{';
$first_table = true;
foreach ($tables as $table) {
    if ($first_table) $first_table = false;
    else echo ',';
    echo '"'.$table.'":{';
    if (is_array($page)) {
        $sql = "SELECT COUNT(*) FROM `$table`";
        if (is_array($filter)) $sql .= " WHERE `$filter[0]` $filter[2] '$filter[1]'";
        if ($result = $mysqli->query($sql)) {
            $pages = $result->fetch_row();
            $pages = floor($pages[0]/$page[1])+1;
            echo '"pages":"'.$pages.'",';
        }
    }
    echo '"columns":';
    $sql = "SELECT * FROM `$table`";
    if (is_array($filter)) $sql .= " WHERE `$filter[0]` $filter[2] '$filter[1]'";
    if (is_array($page)) $sql .= " LIMIT $page[1] OFFSET $page[0]";
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
