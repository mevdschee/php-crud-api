<?php
$settings = [
    'database' => 'php-crud-api',
    'username' => 'php-crud-api',
    'password' => 'php-crud-api',
    'middlewares' => 'cors,jwtAuth,basicAuth,authorization,validation,sanitation',
    'jwtAuth.time' => '1538207605',
    'jwtAuth.secret' => 'axpIrCGNGqxzx2R9dtXLIPUSqPo778uhb8CA0F4Hx',
    'basicAuth.passwordFile' => __DIR__ . DIRECTORY_SEPARATOR . '.htpasswd',
    'authorization.tableHandler' => function ($method, $path, $databaseName, $tableName) {
        return !($tableName == 'invisibles' && !isset($_SESSION['claims']['name']) && empty($_SESSION['username']));
    },
    'authorization.columnHandler' => function ($method, $path, $databaseName, $tableName, $columnName) {
        return !($columnName == 'invisible');
    },
    'authorization.recordHandler' => function ($method, $path, $databaseName, $tableName) {
        return ($tableName == 'comments') ? 'filter=message,neq,invisible' : '';
    },
    'sanitation.handler' => function ($method, $tableName, $column, $value) {
        return is_string($value) ? strip_tags($value) : $value;
    },
    'validation.handler' => function ($method, $tableName, $column, $value, $context) {
        return ($column['name'] == 'post_id' && !is_numeric($value)) ? 'must be numeric' : true;
    },
    'debug' => true,
];
