<?php

namespace Tqdev\PhpCrudApi;

use Tqdev\PhpCrudApi\Api;
use Tqdev\PhpCrudApi\Config;
use Tqdev\PhpCrudApi\RequestFactory;
use Tqdev\PhpCrudApi\ResponseUtils;

require '../vendor/autoload.php';

$config = new Config([
    // 'driver' => 'mysql',
    // 'address' => 'localhost',
    // 'port' => '3306',
    'username' => 'php-crud-api',
    'password' => 'php-crud-api',
    'database' => 'php-crud-api',
    // 'debug' => false
'customization.beforeHandler' => function ($operation, $tableName, $request, $environment) {
  $param = $request->getQueryParams();
  $param["filter"] = "field1,eq,value1";
  return $request->withQueryParams($param);            
}

]);
$request = RequestFactory::fromGlobals();
$api = new Api($config);
$response = $api->handle($request);
ResponseUtils::output($response);
