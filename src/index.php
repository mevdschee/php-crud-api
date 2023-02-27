<?php

namespace Tqdev\PhpCrudApi;

use Tqdev\PhpCrudApi\Api;
use Tqdev\PhpCrudApi\Config\Config;
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
]);
$request = RequestFactory::fromGlobals();
$api = new Api($config);
$response = $api->handle($request);
ResponseUtils::output($response);

//file_put_contents('request.log',RequestUtils::toString($request)."===\n",FILE_APPEND);
//file_put_contents('request.log',ResponseUtils::toString($response)."===\n",FILE_APPEND);