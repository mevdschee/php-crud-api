<?php

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"http://10.11.25.107/auth_basic.php");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$headers = apache_request_headers();

if (!isset($headers['Authorization'])) die('Forbidden');

$headers = array('Authorization: '.$headers['Authorization']);

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$server_output = curl_exec ($ch);
$info = curl_getinfo($ch);
curl_close ($ch);

if ($info['http_code']!=200) die('Forbidden');

include "api.php";

header('Access-Control-Allow-Origin: *');
$api = new SQLSRV_CRUD_API(array(
  'hostname'=>'(local)',
  'username'=>'',
  'password'=>'',
  'database'=>'xxx',
  'charset'=>'UTF-8'
));
$api->executeCommand();

