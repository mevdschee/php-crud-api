<?php
$settings = [
    'database' => 'php-crud-api',
    'username' => 'php-crud-api',
    'password' => 'php-crud-api',
    'controllers' => 'records,columns,cache,openapi',
    'middlewares' => 'cors,jwtAuth,basicAuth,authorization,validation,sanitation,multiTenancy',
    'jwtAuth.time' => '1538207605',
    'jwtAuth.secret' => 'axpIrCGNGqxzx2R9dtXLIPUSqPo778uhb8CA0F4Hx',
    'basicAuth.passwordFile' => __DIR__ . DIRECTORY_SEPARATOR . '.htpasswd',
    'authorization.tableHandler' => function ($operation, $tableName) {
        return !($tableName == 'invisibles' && !isset($_SESSION['claims']['name']) && empty($_SESSION['username']));
    },
    'authorization.columnHandler' => function ($operation, $tableName, $columnName) {
        return !($columnName == 'invisible');
    },
    'authorization.recordHandler' => function ($operation, $tableName) {
        return ($tableName == 'comments') ? 'filter=message,neq,invisible' : '';
    },
    'sanitation.handler' => function ($operation, $tableName, $column, $value) {
        return is_string($value) ? strip_tags($value) : $value;
    },
    'validation.handler' => function ($operation, $tableName, $column, $value, $context) {
        return ($column['name'] == 'post_id' && !is_numeric($value)) ? 'must be numeric' : true;
    },
    'multiTenancy.handler' => function ($operation, $tableName) {
        return ($tableName == 'kunsthåndværk') ? ['user_id' => 1] : [];
    },
    'debug' => true,
];
