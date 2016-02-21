<?php

/**
 *
 */

const DEBUG = true;

/**
 * MsSQL_CRUD_API
 */
class MsSQL_CRUD_API extends REST_CRUD_API
{
    
    protected $queries = array(
            'reflect_table' => 'SELECT table_schema+\'.\'+TABLE_NAME 
            FROM "INFORMATION_SCHEMA"."TABLES" 
            WHERE 
                "TABLE_CATALOG" = ? AND 
                "TABLE_SCHEMA" = ? AND 
                "TABLE_NAME" LIKE ?'
        ,   'reflect_pk' => 'SELECT
				"COLUMN_NAME"
			FROM
				"INFORMATION_SCHEMA"."TABLE_CONSTRAINTS" tc, "INFORMATION_SCHEMA"."KEY_COLUMN_USAGE" ku
			WHERE
				tc."CONSTRAINT_TYPE" = \'PRIMARY KEY\' AND
				tc."CONSTRAINT_NAME" = ku."CONSTRAINT_NAME" AND
                tc."CONSTRAINT_SCHEMA" = ku."CONSTRAINT_SCHEMA" AND
				ku."TABLE_CATALOG" = ? AND
                ku."TABLE_SCHEMA" = ? AND
				ku."TABLE_NAME" = ?'
        , 'reflect_belongs_to' => 'SELECT
				cu1.table_schema+\'.\'+cu1."TABLE_NAME",cu1."COLUMN_NAME",
				cu2.table_schema+\'.\'+cu2."TABLE_NAME",cu2."COLUMN_NAME"
			FROM
				"INFORMATION_SCHEMA".REFERENTIAL_CONSTRAINTS rc,
				"INFORMATION_SCHEMA".CONSTRAINT_COLUMN_USAGE cu1,
				"INFORMATION_SCHEMA".CONSTRAINT_COLUMN_USAGE cu2
			WHERE
				cu1."CONSTRAINT_NAME" = rc."CONSTRAINT_NAME" AND
				cu2."CONSTRAINT_NAME" = rc."UNIQUE_CONSTRAINT_NAME" AND
				cu1."TABLE_NAME" = ? AND
				cu2."TABLE_SCHEMA"+\'.\'+cu2."TABLE_NAME" IN ? AND
				cu1."TABLE_SCHEMA" = ? AND
				cu1."TABLE_CATALOG" = ? AND
				cu2."TABLE_CATALOG" = ?'
        , 'reflect_has_many' => 'SELECT
				cu1.table_schema+\'.\'+cu1."TABLE_NAME",cu1."COLUMN_NAME",
				cu2.table_schema+\'.\'+cu2."TABLE_NAME",cu2."COLUMN_NAME"
			FROM
				"INFORMATION_SCHEMA".REFERENTIAL_CONSTRAINTS rc,
				"INFORMATION_SCHEMA".CONSTRAINT_COLUMN_USAGE cu1,
				"INFORMATION_SCHEMA".CONSTRAINT_COLUMN_USAGE cu2
			WHERE
				cu1."CONSTRAINT_NAME" = rc."CONSTRAINT_NAME" AND
				cu2."CONSTRAINT_NAME" = rc."UNIQUE_CONSTRAINT_NAME" AND
				cu1."TABLE_SCHEMA"+\'.\'+cu1."TABLE_NAME" IN ? AND
				cu2."TABLE_NAME" = ? AND
                cu2."TABLE_SCHEMA" = ? AND
				cu1."TABLE_CATALOG" = ? AND
				cu2."TABLE_CATALOG" = ?'
        , 'reflect_habtm' => 'SELECT
				cua1."TABLE_SCHEMA"+\'.\'+cua1."TABLE_NAME",cua1."COLUMN_NAME",
				cua2."TABLE_SCHEMA"+\'.\'+cua2."TABLE_NAME",cua2."COLUMN_NAME",
				cub1."TABLE_SCHEMA"+\'.\'+cub1."TABLE_NAME",cub1."COLUMN_NAME",
				cub2."TABLE_SCHEMA"+\'.\'+cub2."TABLE_NAME",cub2."COLUMN_NAME"
			FROM
				"INFORMATION_SCHEMA".REFERENTIAL_CONSTRAINTS rca,
				"INFORMATION_SCHEMA".REFERENTIAL_CONSTRAINTS rcb,
				"INFORMATION_SCHEMA".CONSTRAINT_COLUMN_USAGE cua1,
				"INFORMATION_SCHEMA".CONSTRAINT_COLUMN_USAGE cua2,
				"INFORMATION_SCHEMA".CONSTRAINT_COLUMN_USAGE cub1,
				"INFORMATION_SCHEMA".CONSTRAINT_COLUMN_USAGE cub2
			WHERE
				cua1."CONSTRAINT_NAME" = rca."CONSTRAINT_NAME" AND
				cua2."CONSTRAINT_NAME" = rca."UNIQUE_CONSTRAINT_NAME" AND
				cub1."CONSTRAINT_NAME" = rcb."CONSTRAINT_NAME" AND
				cub2."CONSTRAINT_NAME" = rcb."UNIQUE_CONSTRAINT_NAME" AND
				cua1."TABLE_CATALOG" = ? AND
				cub1."TABLE_CATALOG" = ? AND
				cua2."TABLE_CATALOG" = ? AND
				cub2."TABLE_CATALOG" = ? AND
				cua1."TABLE_NAME" = cub1."TABLE_NAME" AND
				cua2."TABLE_NAME" = ? AND
                cua2."TABLE_SCHEMA" = ? AND
				cub2."TABLE_SCHEMA"+\'.\'+cub2."TABLE_NAME" IN ?'
        );
    
    /** 
     * connectDatabase
     */
    protected function connectDatabase($hostname, $username, $password, $database, $port, $socket, $charset, $app)
    {
        global $user;
        global $loginManager;

        $connectionInfo = array();
        if ($port)
            $hostname .= ',' . $port;
        if ($username)
            $connectionInfo['UID'] = $username;
        if ($password)
            $connectionInfo['PWD'] = $password;
        if ($database)
            $connectionInfo['Database'] = $database;
        if ($charset)
            $connectionInfo['CharacterSet'] = $charset;
        if ($app)
            $connectionInfo['APP'] = $app;
        $connectionInfo['QuotedId']             = 1;
        $connectionInfo['ReturnDatesAsStrings'] = 1;
        if (0==1 && DEBUG) {
                echo '
Hostname: '.print_r($hostname, true).'
connectionInfo: '.print_r($connectionInfo, true);
        }
        $db = sqlsrv_connect($hostname, $connectionInfo);
        //print_r($connectionInfo);
        if (!$db) {
            throw new \Exception('Connect failed. ' . print_r(sqlsrv_errors(), true));
        }
        if ($socket) {
            throw new \Exception('Socket connection is not supported.');
        }
        return $db;
    }
    
    /** 
     * query
     */
    protected function query($db, $sql, $params)
    {
        $args = array();
        $sql = preg_replace_callback('/\!|\?/', function ($matches) use (&$db, &$params, &$args) {
            static $i = -1;
            $i++;
            $param = $params[$i];
            if ($matches[0] == '!') {
                return preg_replace('/[^a-zA-Z0-9\-_=<>.\[\]]/', '', $param);
            }
            // This is workaround because SQLSRV cannot accept NULL in a param
            if ($matches[0] == '?' && is_null($param)) {
                return 'NULL';
            }
            if (is_array($param)) {
                $args = array_merge($args, $param);
                return '(' . implode(',', str_split(str_repeat('?', count($param)))) . ')';
            }
            if (is_object($param)) {
                switch ($param->type) {
                case 'base64':
                    $args[] = bin2hex(base64_decode($param->data));
                    return 'CONVERT(VARBINARY(MAX),?,2)';
                }
            }
            $args[] = $param;
            return '?';
        }, $sql
        );
        
        //var_dump($params);
        //echo "\n$sql\n";
        //var_dump($args);
        
        if (strtoupper(substr($sql, 0, 6)) == 'INSERT') {
            $sql .= ';SELECT SCOPE_IDENTITY()';
        }
        return sqlsrv_query($db, $sql, $args) ?: null;
    }
    
    protected function fetch_assoc($result)
    {
        $values = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
        if ($values)
            $values = array_map(function ($v)
            {
                return is_null($v) ? null : (string) $v;
            }, $values);
        return $values;
    }
    
    protected function fetch_row($result)
    {
        $values = sqlsrv_fetch_array($result, SQLSRV_FETCH_NUMERIC);
        if ($values)
            $values = array_map(function($v)
            {
                return is_null($v) ? null : (string) $v;
            }, $values);
        return $values;
    }
    
    protected function insert_id($db, $result)
    {
        sqlsrv_next_result($result);
        sqlsrv_fetch($result);
        return (int) sqlsrv_get_field($result, 0);
    }
    
    protected function affected_rows($db, $result)
    {
        return sqlsrv_rows_affected($result);
    }
    
    protected function close($result)
    {
        return sqlsrv_free_stmt($result);
    }
    
    protected function fetch_fields($result)
    {
        //var_dump(sqlsrv_field_metadata($result));
        return array_map(
            function ($a) {
                $p = array();
                foreach ($a as $k => $v) {
                    $p[strtolower($k)] = $v;
                }
                return (object) $p;
            }, sqlsrv_field_metadata($result)
        );
    }
    
    protected function add_limit_to_sql($sql, $limit, $offset)
    {
        return "$sql OFFSET $offset ROWS FETCH NEXT $limit ROWS ONLY";
    }
    
    protected function likeEscape($string)
    {
        return str_replace(array(
            '%',
            '_'
        ), array(
            '[%]',
            '[_]'
        ), $string);
    }
    
    protected function is_binary_type($field)
    {
        return ($field->type >= -4 && $field->type <= -2);
    }
    
    protected function base64_encode($string)
    {
        return base64_encode($string);
    }
    
    protected function getDefaultCharset()
    {
        return 'UTF-8';
    }
}

class REST_CRUD_API
{
    
    protected $settings;
    
    protected function mapMethodToAction($method, $key)
    {
        switch ($method) {
            case 'OPTIONS':
                return 'headers';
            case 'GET':
                return $key ? 'read' : 'list';
            case 'PUT':
                return 'update';
            case 'POST':
                return 'create';
            case 'DELETE':
                return 'delete';
            default:
                $this->exitWith404('method');
        }
        return false;
    }
    
    protected function parseRequestParameter(&$request, $characters)
    {
        if (!$request)
            return false;
        $pos     = strpos($request, '/');
        $value   = $pos ? substr($request, 0, $pos) : $request;
        $request = $pos ? substr($request, $pos + 1) : '';
        if (!$characters)
            return $value;
        return preg_replace("/[^$characters]/", '', $value);
    }
    
    protected function parseGetParameter($get, $name, $characters)
    {
        $value = isset($get[$name]) ? $get[$name] : false;
        return $characters ? preg_replace("/[^$characters]/", '', $value) : $value;
    }
    
    protected function parseGetParameterArray($get, $name, $characters)
    {
        $values = isset($get[$name]) ? $get[$name] : false;
        if (!is_array($values))
            $values = array(
                $values
            );
        if ($characters) {
            foreach ($values as &$value) {
                $value = preg_replace("/[^$characters]/", '', $value);
            }
        }
        return $values;
    }
    
    protected function applyTableAuthorizer($callback, $action, $database, &$tables)
    {
        if (is_callable($callback, true))
            foreach ($tables as $i => $table) {
                if (!$callback($action, $database, $table)) {
                    if ($i)
                        unset($tables[$i]);
                    else
                        $this->exitWith404('entity');
                }
            }
    }
    
    protected function applyColumnAuthorizer($callback, $action, $database, &$fields)
    {
        if (is_callable($callback, true))
            foreach ($fields as $table => $keys) {
                foreach ($keys as $field) {
                    if (!$callback($action, $database, $table, $field->name)) {
                        unset($fields[$table][$field->name]);
                    }
                }
            }
    }
    
    protected function applyInputSanitizer($callback, $action, $database, $table, &$input, $keys)
    {
        if (is_callable($callback, true))
            foreach ((array) $input as $key => $value) {
                if (isset($keys[$key])) {
                    $input->$key = $callback($action, $database, $table, $key, $keys[$key]->type, $value);
                }
            }
    }
    
    protected function applyInputValidator($callback, $action, $database, $table, $input, $keys, $context)
    {
        $errors = array();
        if (is_callable($callback, true))
            foreach ((array) $input as $key => $value) {
                if (isset($keys[$key])) {
                    $error = $callback($action, $database, $table, $key, $keys[$key]->type, $value, $context);
                    if ($error !== true && $error !== null)
                        $errors[$key] = $error;
                }
            }
        if (!empty($errors))
            $this->exitWith422($errors);
    }
    
    /**
     *
     */
    protected function processTablesParameter($database, $tables, $action, $db)
    {
        $blacklist = array(
            'information_schema',
            'mysql',
            'sys',
            'pg_catalog'
        );
        if (in_array(strtolower($database), $blacklist)) {
            return array();
        }
        $table_array = explode(',', $tables);
        $table_list  = array();
        foreach ($table_array as $table) {
            if ($result = $this->query($db, $this->queries['reflect_table'], array($database, $this->getSchema($table), $this->getTable($table)))) {
                while ($row = $this->fetch_row($result))
                    $table_list[] = $row[0];
                $this->close($result);
                if ($action != 'list')
                    break;
            }
        }
        if (empty($table_list))
            $this->exitWith404('entity');
        return $table_list;
    }
    
    protected function exitWith404($type)
    {
        if (isset($_SERVER['REQUEST_METHOD'])) {
            header('Content-Type:', true, 404);
            die("Not found ($type)");
        } else {
            throw new \Exception("Not found ($type)");
        }
    }
    
    protected function exitWith422($object)
    {
        if (isset($_SERVER['REQUEST_METHOD'])) {
            header('Content-Type:', true, 422);
            die(json_encode($object));
        } else {
            throw new \Exception(json_encode($object));
        }
    }
    
    protected function headersCommand($parameters)
    {
        $headers   = array();
        $headers[] = 'Access-Control-Allow-Headers: Content-Type';
        $headers[] = 'Access-Control-Allow-Methods: OPTIONS, GET, PUT, POST, DELETE';
        $headers[] = 'Access-Control-Max-Age: 1728000';
        if (isset($_SERVER['REQUEST_METHOD'])) {
            foreach ($headers as $header)
                header($header);
        } else {
            echo json_encode($headers);
        }
    }
    
    protected function startOutput($callback)
    {
        if ($callback) {
            if (isset($_SERVER['REQUEST_METHOD'])) {
                header('Content-Type: application/javascript');
            }
            echo $callback . '(';
        } else {
            if (isset($_SERVER['REQUEST_METHOD'])) {
                header('Content-Type: application/json');
            }
        }
    }
    
    protected function endOutput($callback)
    {
        if ($callback) {
            echo ');';
        }
    }
    
    protected function processKeyParameter($key, $tables, $database, $db)
    {
        //echo 'processKeyParameter::bingo';
        if (!$key)
            return false;
        $count = 0;
        $field = false;
        if ($result = $this->query($db, $this->queries['reflect_pk'], array($database, $this->getSchema($tables[0]), $this->getTable($tables[0])))) {
            while ($row = $this->fetch_row($result)) {
                $count++;
                $field = $row[0];
            }
            $this->close($result);
        }
        if ($count != 1 || $field == false)
            $this->exitWith404('1pk');
        return array(
            $key,
            $field
        );
    }
    
    protected function processOrderParameter($order)
    {
        if ($order) {
            $order = explode(',', $order, 2);
            if (count($order) < 2)
                $order[1] = 'ASC';
            $order[1] = strtoupper($order[1]) == 'DESC' ? 'DESC' : 'ASC';
        }
        return $order;
    }
    
    protected function processFiltersParameter($tables, $filters)
    {
        $result = array();
        foreach ($filters as $filter) {
            if ($filter) {
                $filter = explode(',', $filter, 3);
                if (count($filter) == 3) {
                    $match     = $filter[1];
                    $filter[1] = 'LIKE';
                    if ($match == 'cs')
                        $filter[2] = '%' . $this->likeEscape($filter[2]) . '%';
                    if ($match == 'sw')
                        $filter[2] = $this->likeEscape($filter[2]) . '%';
                    if ($match == 'ew')
                        $filter[2] = '%' . $this->likeEscape($filter[2]);
                    if ($match == 'eq')
                        $filter[1] = '=';
                    if ($match == 'ne')
                        $filter[1] = '<>';
                    if ($match == 'lt')
                        $filter[1] = '<';
                    if ($match == 'le')
                        $filter[1] = '<=';
                    if ($match == 'ge')
                        $filter[1] = '>=';
                    if ($match == 'gt')
                        $filter[1] = '>';
                    if ($match == 'in') {
                        $filter[1] = 'IN';
                        $filter[2] = explode(',', $filter[2]);
                    }
                    $result[] = $filter;
                }
            }
        }
        return $result;
    }
    
    protected function processPageParameter($page)
    {
        if ($page) {
            $page = explode(',', $page, 2);
            if (count($page) < 2)
                $page[1] = 20;
            $page[0] = ($page[0] - 1) * $page[1];
        }
        return $page;
    }
    
    protected function retrieveObject($key, $fields, $tables, $db)
    {
        if (!$key)
            return false;
        $sql = 'SELECT ';
        $sql .= '"' . implode('","', array_keys($fields[$tables[0]])) . '"';
        $sql .= ' FROM "!" WHERE "!" = ?';
        if ($result = $this->query($db, $sql, array(
            $tables[0],
            $key[1],
            $key[0]
        ))) {
            $object = $this->fetch_assoc($result);
            foreach ($fields[$tables[0]] as $field) {
                if ($this->is_binary_type($field) && $object[$field->name]) {
                    $object[$field->name] = $this->base64_encode($object[$field->name]);
                }
            }
            $this->close($result);
        }
        return $object;
    }
    
    protected function createObject($input, $tables, $db)
    {
        if (!$input)
            return false;
        $input  = (array) $input;
        $keys   = implode('","', str_split(str_repeat('!', count($input))));
        $values = implode(',', str_split(str_repeat('?', count($input))));
        $params = array_merge(array_keys($input), array_values($input));
        array_unshift($params, $tables[0]);
        $result = $this->query($db, 'INSERT INTO "!" ("' . $keys . '") VALUES (' . $values . ')', $params);
        if (!$result)
            return null;
        return $this->insert_id($db, $result);
    }
    
    protected function updateObject($key, $input, $tables, $db)
    {
        if (!$input)
            return false;
        $input    = (array) $input;
        $params   = array();
        $sql      = 'UPDATE "!" SET ';
        $params[] = $tables[0];
        foreach (array_keys($input) as $i => $k) {
            if ($i)
                $sql .= ',';
            $v = $input[$k];
            $sql .= '"!"=?';
            $params[] = $k;
            $params[] = $v;
        }
        $sql .= ' WHERE "!"=?';
        $params[] = $key[1];
        $params[] = $key[0];
        $result   = $this->query($db, $sql, $params);
        return $this->affected_rows($db, $result);
    }
    
    protected function deleteObject($key, $tables, $db)
    {
        $result = $this->query($db, 'DELETE FROM "!" WHERE "!" = ?', array(
            $tables[0],
            $key[1],
            $key[0]
        ));
        return $this->affected_rows($db, $result);
    }
    
    protected function findRelations($tables, $database, $db)
    {
        $tableset = array();
        $collect  = array();
        $select   = array();
        
        while (count($tables) > 1) {
            $table0     = array_shift($tables);
            $tableset[] = $table0;
            
            $result = $this->query($db, $this->queries['reflect_belongs_to'], array(
                $this->getTable($table0),
                $tables,
                $this->getSchema($table0),
                $database,
                $database
            ));
            while ($row = $this->fetch_row($result)) {
                $collect[$row[0]][$row[1]] = array();
                $select[$row[2]][$row[3]]  = array(
                    $row[0],
                    $row[1]
                );
                if (!in_array($row[0], $tableset))
                    $tableset[] = $row[0];
            }
            $result = $this->query($db, $this->queries['reflect_has_many'], array(
                $tables,
                $this->getTable($table0),
                $this->getSchema($table0),
                $database,
                $database
            ));
            while ($row = $this->fetch_row($result)) {
                $collect[$row[2]][$row[3]] = array();
                $select[$row[0]][$row[1]]  = array(
                    $row[2],
                    $row[3]
                );
                if (!in_array($row[2], $tableset))
                    $tableset[] = $row[2];
            }
            $result = $this->query($db, $this->queries['reflect_habtm'], array(
                $database,
                $database,
                $database,
                $database,
                $this->getTable($table0),
                $this->getSchema($table0),
                $tables
            ));
            while ($row = $this->fetch_row($result)) {
                $collect[$row[2]][$row[3]] = array();
                $select[$row[0]][$row[1]]  = array(
                    $row[2],
                    $row[3]
                );
                $collect[$row[4]][$row[5]] = array();
                $select[$row[6]][$row[7]]  = array(
                    $row[4],
                    $row[5]
                );
                if (!in_array($row[2], $tableset))
                    $tableset[] = $row[2];
                if (!in_array($row[4], $tableset))
                    $tableset[] = $row[4];
            }
        }
        $tableset[] = array_shift($tables);
        return array(
            $tableset,
            $collect,
            $select
        );
    }
    
    protected function retrieveInput($post)
    {
        $input = (object) array();
        $data  = trim(file_get_contents($post));
        if (strlen($data) > 0) {
            if ($data[0] == '{') {
                $input = json_decode($data);
            } else {
                parse_str($data, $input);
                foreach ($input as $key => $value) {
                    if (substr($key, -9) == '__is_null') {
                        $input[substr($key, 0, -9)] = null;
                        unset($input[$key]);
                    }
                }
                $input = (object) $input;
            }
        }
        return $input;
    }
    
    protected function findFields($tables, $collect, $select, $columns, $database, $db)
    {
        $tables = array_unique(array_merge($tables, array_keys($collect), array_keys($select)));
        $fields = array();
        foreach ($tables as $i => $table) {
            $fields[$table] = $this->findTableFields($table, $database, $db);
            if ($i == 0)
                $fields[$table] = $this->filterFieldsByColumns($fields[$table], $columns);
        }
        //echo 'XXXXXXXXXXXXXX'.print_r($fields, true).'XXXXXXXXXXXXXX';
        return $fields;
    }
    
    protected function findInputFields($table, $columns, $database, $db)
    {
        $fields         = array();
        $fields[$table] = $this->findTableFields($table, $database, $db);
        $fields[$table] = $this->filterFieldsByColumns($fields[$table], $columns);
        return $fields;
    }
    
    protected function filterFieldsByColumns($fields, $columns)
    {
        if ($columns)
            foreach (array_keys($fields) as $key) {
                if (!in_array($key, $columns)) {
                    unset($fields[$key]);
                }
            }
        return $fields;
    }
    
    protected function findTableFields($table, $database, $db)
    {
        $fields = array();
        $result = $this->query($db, 'SELECT * FROM ! WHERE 1=2;', array(
            '['.$this->getSchema($table).'].['.$this->getTable($table).']'
        ));
        foreach ($this->fetch_fields($result) as $field) {
            $fields[$field->name] = $field;
        }
        return $fields;
    }
    
    protected function filterInputByColumns($input, $columns)
    {
        if ($columns)
            foreach (array_keys((array) $input) as $key) {
                if (!isset($columns[$key])) {
                    unset($input->$key);
                }
            }
        return $input;
    }
    
    protected function convertBinary(&$input, $keys)
    {
        foreach ($keys as $key => $field) {
            if (isset($input->$key) && $input->$key && $this->is_binary_type($field)) {
                $data        = $input->$key;
                $data        = str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT);
                $input->$key = (object) array(
                    'type' => 'base64',
                    'data' => $data
                );
            }
        }
    }
    
    /**
     *
     */
    protected function getSchema($xtable)
    {
        return(($xpos = strpos($xtable, ".")) ? substr($xtable, 0, $xpos) : "dbo");
    }

    /**
     *
     */
    protected function getTable($xtable)
    {
        return(($xpos = strpos($xtable, ".")) ? substr($xtable, $xpos+1) : $xtable);
    }

    /**
     *
     */
    protected function getParameters($settings)
    {
        extract($settings);
        $tables    = $this->parseRequestParameter($request, 'a-zA-Z0-9\-_*,.');
        $key       = $this->parseRequestParameter($request, 'a-zA-Z0-9\-,.'); // auto-increment or uuid
        //echo 'key: '.print_r($key, true);
        $action    = $this->mapMethodToAction($method, $key);
        $callback  = $this->parseGetParameter($get, 'callback', 'a-zA-Z0-9\-_');
        $page      = $this->parseGetParameter($get, 'page', '0-9,');
        $filters   = $this->parseGetParameterArray($get, 'filter', false);
        $satisfy   = $this->parseGetParameter($get, 'satisfy', 'a-z');
        $columns   = $this->parseGetParameter($get, 'columns', 'a-zA-Z0-9\-_,');
        $order     = $this->parseGetParameter($get, 'order', 'a-zA-Z0-9\-_*,');
        $transform = $this->parseGetParameter($get, 'transform', '1');
        //echo 'bingo';
        $tables  = $this->processTablesParameter($database, $tables, $action, $db);
        //echo 'bingo2';
        $key     = $this->processKeyParameter($key, $tables, $database, $db);
        $filters = $this->processFiltersParameter($tables, $filters);
        if ($columns)
            $columns = explode(',', $columns);
        $page    = $this->processPageParameter($page);
        $satisfy = ($satisfy && strtolower($satisfy) == 'any') ? 'any' : 'all';
        $order   = $this->processOrderParameter($order);
        
        // reflection
        list($tables, $collect, $select) = $this->findRelations($tables, $database, $db);
        $fields = $this->findFields($tables, $collect, $select, $columns, $database, $db);
        
        // permissions
        if ($table_authorizer)
            $this->applyTableAuthorizer($table_authorizer, $action, $database, $tables);
        if ($column_authorizer)
            $this->applyColumnAuthorizer($column_authorizer, $action, $database, $fields);
        
        if ($post) {
            // input
            $context = $this->retrieveInput($post);
            $input   = $this->filterInputByColumns($context, $fields[$tables[0]]);
            
            if ($input_sanitizer)
                $this->applyInputSanitizer($input_sanitizer, $action, $database, $tables[0], $input, $fields[$tables[0]]);
            if ($input_validator)
                $this->applyInputValidator($input_validator, $action, $database, $tables[0], $input, $fields[$tables[0]], $context);
            
            $this->convertBinary($input, $fields[$tables[0]]);
        }
        
        return compact('action', 'database', 'tables', 'key', 'callback', 'page', 'filters', 'satisfy', 'fields', 'order', 'transform', 'db', 'input', 'collect', 'select');
    }
    
    protected function listCommandInternal($parameters)
    {
        extract($parameters);
        echo '{';
        $table = array_shift($tables);
        // first table
        $count = false;
        echo '"' . $table . '":{';
        if (is_array($order) && is_array($page)) {
            $params   = array();
            $sql      = 'SELECT COUNT(*) FROM !';
            $params[] = $table;
            foreach ($filters as $i => $filter) {
                if (is_array($filter)) {
                    $sql .= $i == 0 ? ' WHERE ' : ($satisfy == 'all' ? ' AND ' : ' OR ');
                    $sql .= '"!" ! ?';
                    $params[] = $filter[0];
                    $params[] = $filter[1];
                    $params[] = $filter[2];
                }
            }
            if ($result = $this->query($db, $sql, $params)) {
                while ($pages = $this->fetch_row($result)) {
                    $count = $pages[0];
                }
            }
        }
        $params = array();
        $sql    = 'SELECT ';
        $sql .= '[' . implode('],[', array_keys($fields[$table])) . ']';
        $sql .= ' FROM !';
        $params[] = '['.$this->getSchema($table).'].['.$this->getTable($table).']';
        foreach ($filters as $i => $filter) {
            if (is_array($filter)) {
                $sql .= $i == 0 ? ' WHERE ' : ($satisfy == 'all' ? ' AND ' : ' OR ');
                $sql .= '! ! ?';
                $params[] = $filter[0];
                $params[] = $filter[1];
                $params[] = $filter[2];
            }
        }
        if (is_array($order)) {
            $sql .= ' ORDER BY "!" !';
            $params[] = $order[0];
            $params[] = $order[1];
        }
        if (is_array($order) && is_array($page)) {
            $sql = $this->add_limit_to_sql($sql, $page[1], $page[0]);
        }

        //        echo '

        //listCommandInternal::sql: '.print_r($sql, true).'

        //';
        if ($result = $this->query($db, $sql, $params)) {
            echo '"columns":';
            $keys   = array();
            $base64 = array();
            foreach ($fields[$table] as $field) {
                $base64[] = $this->is_binary_type($field);
                $keys[]   = $field->name;
            }
            echo json_encode($keys);
            $keys = array_flip($keys);
            echo ',"records":[';
            $first_row = true;
            while ($row = $this->fetch_row($result)) {
                if ($first_row)
                    $first_row = false;
                else
                    echo ',';
                if (isset($collect[$table])) {
                    foreach (array_keys($collect[$table]) as $field) {
                        $collect[$table][$field][] = $row[$keys[$field]];
                    }
                }
                foreach ($base64 as $k => $v) {
                    if ($v && $row[$k]) {
                        $row[$k] = $this->base64_encode($row[$k]);
                    }
                }
                echo json_encode($row);
            }
            $this->close($result);
            echo ']';
            if ($count)
                echo ',';
        }
        if ($count)
            echo '"results":' . $count;
        echo '}';
        // other tables
        foreach ($tables as $t => $table) {
            echo ',';
            echo '"' . $table . '":{';
            $params = array();
            $sql    = 'SELECT ';
            $sql .= '[' . implode('],[', array_keys($fields[$table])) . ']';
            $sql .= ' FROM !';
            $params[] = '['.$this->getSchema($table).'].['.$this->getTable($table).']';;
            if (isset($select[$table])) {
                $first_row = true;
                echo '"relations":{';
                foreach ($select[$table] as $field => $path) {
                    $values = $collect[$path[0]][$path[1]];
                    $sql .= $first_row ? ' WHERE ' : ' OR ';
                    $sql .= '"!" IN ?';
                    $params[] = $field;
                    $params[] = $values;
                    if ($first_row)
                        $first_row = false;
                    else
                        echo ',';
                    echo '"' . $field . '":"' . implode('.', $path) . '"';
                }
                echo '}';
            }
            if ($result = $this->query($db, $sql, $params)) {
                if (isset($select[$table]))
                    echo ',';
                echo '"columns":';
                $keys   = array();
                $base64 = array();
                foreach ($fields[$table] as $field) {
                    $base64[] = $this->is_binary_type($field);
                    $keys[]   = $field->name;
                }
                echo json_encode($keys);
                $keys = array_flip($keys);
                echo ',"records":[';
                $first_row = true;
                while ($row = $this->fetch_row($result)) {
                    if ($first_row)
                        $first_row = false;
                    else
                        echo ',';
                    if (isset($collect[$table])) {
                        foreach (array_keys($collect[$table]) as $field) {
                            $collect[$table][$field][] = $row[$keys[$field]];
                        }
                    }
                    foreach ($base64 as $k => $v) {
                        if ($v && $row[$k]) {
                            $row[$k] = $this->base64_encode($row[$k]);
                        }
                    }
                    echo json_encode($row);
                }
                $this->close($result);
                echo ']';
            }
            echo '}';
        }
        echo '}';
    }
    
    protected function readCommand($parameters)
    {
        extract($parameters);
        $object = $this->retrieveObject($key, $fields, $tables, $db);
        if (!$object)
            $this->exitWith404('object');
        $this->startOutput($callback);
        echo json_encode($object);
        $this->endOutput($callback);
    }
    
    protected function createCommand($parameters)
    {
        extract($parameters);
        if (!$input)
            $this->exitWith404('input');
        $this->startOutput($callback);
        echo json_encode($this->createObject($input, $tables, $db));
        $this->endOutput($callback);
    }
    
    protected function updateCommand($parameters)
    {
        extract($parameters);
        if (!$input)
            $this->exitWith404('subject');
        $this->startOutput($callback);
        echo json_encode($this->updateObject($key, $input, $tables, $db));
        $this->endOutput($callback);
    }
    
    protected function deleteCommand($parameters)
    {
        extract($parameters);
        $this->startOutput($callback);
        echo json_encode($this->deleteObject($key, $tables, $db));
        $this->endOutput($callback);
    }
    
    protected function listCommand($parameters)
    {
        extract($parameters);
        $this->startOutput($callback);
        if ($transform) {
            ob_start();
        }
        $this->listCommandInternal($parameters);
        if ($transform) {
            $content = ob_get_contents();
            ob_end_clean();
            $data = json_decode($content, true);
            echo json_encode(self::php_crud_api_transform($data));
        }
        $this->endOutput($callback);
    }
    
    /**
     *
     */
    public function __construct($config)
    {
        extract($config);
        
        //echo 'config: '.print_r($config, true);

        // initialize
        $hostname = isset($hostname) ? $hostname : null;
        $username = isset($username) ? $username : null;
        $password = isset($password) ? $password : null;
        $database = isset($database) ? $database : null;
        $port     = isset($port)     ? $port     : null;
        $socket   = isset($socket)   ? $socket   : null;
        $charset  = isset($charset)  ? $charset  : null;
        $app      = isset($app)      ? $app      : null;
        
        $table_authorizer  = isset($table_authorizer) ? $table_authorizer : null;
        $column_authorizer = isset($column_authorizer) ? $column_authorizer : null;
        $input_sanitizer   = isset($input_sanitizer) ? $input_sanitizer : null;
        $input_validator   = isset($input_validator) ? $input_validator : null;
        
        $db      = isset($db) ? $db : null;
        $method  = isset($method) ? $method : null;
        $request = isset($request) ? $request : null;
        $get     = isset($get) ? $get : null;
        $post    = isset($post) ? $post : null;
        
        // defaults
        if (!$method) {
            $method = $_SERVER['REQUEST_METHOD'];
        }
        if (!$request) {
            $request = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
        }
        if (!$get) {
            $get = $_GET;
        }
        if (!$post) {
            $post = 'php://input';
        }
        if (!$charset) {
            $charset = $this->getDefaultCharset();
        }
        
        // connect
        $request = trim($request, '/');
        if (!$database) {
            $database = $this->parseRequestParameter($request, 'a-zA-Z0-9\-_');
        }
        if (!$db) {
            $db = $this->connectDatabase($hostname, $username, $password, $database, $port, $socket, $charset, $app);
        }
        
        $this->settings = compact('method', 'request', 'get', 'post', 'database', 'table_authorizer', 'column_authorizer', 'input_sanitizer', 'input_validator', 'db');
        //        echo '
        //<PRE>this->settings: '.print_r($this->settings, true).'</PRE>';
    }
    
    /**
     *
     */
    public static function php_crud_api_transform(&$tables)
    {
        $get_objects = function (&$tables, $table_name, $where_index = false, $match_value = false) use (&$get_objects) {
            $objects = array();
            foreach ($tables[$table_name]['records'] as $record) {
                if ($where_index === false || $record[$where_index] == $match_value) {
                    $object = array();
                    foreach ($tables[$table_name]['columns'] as $index => $column) {
                        $object[$column] = $record[$index];
                        foreach ($tables as $relation => $reltable) {
                            if (isset($reltable['relations'])) {
                                foreach ($reltable['relations'] as $key => $target) {
                                    if ($target == "$table_name.$column") {
                                        $column_indices    = array_flip($reltable['columns']);
                                        $object[$relation] = $get_objects($tables, $relation, $column_indices[$key], $record[$index]);
                                    }
                                }
                            }
                        }
                    }
                    $objects[] = $object;
                }
            }
            return $objects;
        };
        $tree        = array();
        foreach ($tables as $name => $table) {
            if (!isset($table['relations'])) {
                $tree[$name] = $get_objects($tables, $name);
                if (isset($table['results'])) {
                    $tree['_results'] = $table['results'];
                }
            }
        }
        return $tree;
    }
    
    /**
     *
     */
    public function executeCommand()
    {
        if (isset($_SERVER['REQUEST_METHOD'])) {
            header('Access-Control-Allow-Origin: *');
        }
        //        echo '
        //executeCommand::settings: '.print_r($this->settings, true);
        $parameters = $this->getParameters($this->settings);
        //        echo '
        //executeCommand::parameters: '.print_r($parameters, true);
        switch ($parameters['action']) {
        case 'list':
            $this->listCommand($parameters);
            break;
        case 'read':
            $this->readCommand($parameters);
            break;
        case 'create':
            $this->createCommand($parameters);
            break;
        case 'update':
            $this->updateCommand($parameters);
            break;
        case 'delete':
            $this->deleteCommand($parameters);
            break;
        case 'headers':
            $this->headersCommand($parameters);
            break;
        }
    }
    
}


// For Microsoft SQL Server use:

$api = new mssql_crud_api(array(
	'hostname'=>'(local)',
	'username'=>'',
	'password'=>'',
	'database'=>'xxx',
	'charset'=>'utf-8',
	'app'=> 'string to show in sp_who2'
));
$api->executeCommand();


$api->executeCommand();
