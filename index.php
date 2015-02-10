<?php
include "config.php";

$action = preg_replace('/[^a-z]/','',isset($_GET["action"])?$_GET["action"]:'list');

if (in_array($action,array('list','read','create','update','delete'))) include $action.'.php';
