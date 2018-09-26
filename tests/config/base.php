<?php
$settings = [
    'database' => 'php-crud-api',
    'username' => 'php-crud-api',
    'password' => 'php-crud-api',
    'middlewares' => 'cors,authorization,validation,sanitation',
    'authorization.tableHandler' => function ($method, $path, $databaseName, $tableName) {
        return !($tableName == 'invisibles');
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
