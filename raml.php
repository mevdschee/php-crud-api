<?php
require "Inflector.php";

$url = "http://localhost/api.php";

$hostname = "localhost";
$username = "root";
$password = "root";
$database = "mysql_crud_api";

$mysqli = new mysqli($hostname,$username,$password,$database);
if ($mysqli->connect_errno) {
	throw new \Exception('Connect failed: '.$mysqli->connect_error);
}

$tables = array();
if ($result = $mysqli->query("SELECT `TABLE_NAME` FROM `INFORMATION_SCHEMA`.`TABLES` WHERE `TABLE_SCHEMA` = '$database'")) {
	while ($row = $result->fetch_row()) $tables[] = $row[0];
}
$result->close();

echo "#%RAML 0.8\n";
echo "title: $database\n";
echo "version: 1\n";
echo "baseUri: $url\n";

foreach ($tables as $object_table) {
	$objects = Inflector::humanize($object_table);
	$object = Inflector::humanize(Inflector::singularize($object_table));
	echo "/$object_table:\n";
	echo "  displayName: $objects\n";
	echo "  description: A collection of $objects\n";
	echo "  get:\n";
	echo "    description: Get a list of $objects\n";
	echo "    queryParameters:\n";
	echo "      page:\n";
	echo "        description: Specify the page that you want to retrieve\n";
	echo "        required: false\n";
	echo "      filter:\n";
	echo "        description: Set to filter the list on a specific field\n";
	echo "        required: false\n";
	echo "      match:\n";
	echo "        description: Adjust the way the filter matches the value to the field\n";
	echo "        required: false\n";
	echo "      order:\n";
	echo "        description: Specify to change the sorting of the list\n";
	echo "        required: false\n";
	echo "  post:\n";
	echo "    description: Create a $object\n";
	echo "  /{id}:\n";
	echo "    description: A specific $object, a member of the $objects collection\n";
	echo "    get:\n";
	echo "      description: Get a specific $object\n";
	echo "    put:\n";
	echo "      description: Update a $object\n";
	echo "    delete:\n";
	echo "      description: Delete a $object\n";
}
