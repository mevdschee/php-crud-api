<?php
namespace Tqdev\PhpCrudApi;

use Tqdev\PhpCrudApi\Api;
use Tqdev\PhpCrudApi\Config;
use Tqdev\PhpCrudApi\RequestFactory;
use Tqdev\PhpCrudApi\ResponseUtils;

require '../vendor/autoload.php';

$config = new Config([
    'username' => 'php-crud-api',
    'password' => 'php-crud-api',
    'database' => 'php-crud-api',
]);
$request = RequestFactory::fromGlobals();
$api = new Api($config);
$response = $api->handle($request);
ResponseUtils::output($response);
