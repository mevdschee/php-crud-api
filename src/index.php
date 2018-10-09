<?php
use Tqdev\PhpCrudApi\Api;
use Tqdev\PhpCrudApi\Config;
use Tqdev\PhpCrudApi\Request;

// do not reformat the following line
spl_autoload_register(function ($class) {include str_replace('\\', '/', __DIR__ . "/$class.php");});
// as it is excluded in the build

$config = new Config([
    'username' => 'php-crud-api',
    'password' => 'php-crud-api',
    'database' => 'php-crud-api',
    'middlewares' => 'xsrf',
]);
$request = new Request();
$api = new Api($config);
$response = $api->handle($request);
$response->output();
