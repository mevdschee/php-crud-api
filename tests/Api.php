<?php
namespace Mevdschee\PhpCrudApi\Tests;

require_once(__DIR__ . '/../api.php');

class Api
{
    /**
     * Database configuration array
     *
     * @var array
     */
    protected $config;

    /**
     * @var Mevdschee\PhpCrudApi\Tests\BaseTest
     */
    protected $test;

    /**
     * @var \PHP_CRUD_API
     */
    protected $api;

    public function __construct($test)
    {
        $this->test = $test;
        $this->config = $test::$config;
        $this->config['dbengine'] = $test->getEngineName();
    }

    private function action($method, $url, $data='')
    {
        $url = parse_url($url);
        $query = isset($url['query'])?$url['query']:'';
        parse_str($query, $get);

        $this->api = new \PHP_CRUD_API(array(
            'dbengine'=>$this->config['dbengine'],
            'hostname'=>$this->config['hostname'],
            'username'=>$this->config['username'],
            'password'=>$this->config['password'],
            'database'=>$this->config['database'],
            // callbacks
            'table_authorizer'=>function ($action, $database, $table) {
                return true;
            },
            'column_authorizer'=>function ($action, $database, $table, $column) {
                return !($column=='password'&&$action=='list');
            },
            'record_filter'=>function ($action, $database, $table) {
                return ($table=='posts')?array('id,neq,13'):false;
            },
            'tenancy_function'=>function ($action, $database, $table, $column) {
                return ($table=='users'&&$column=='id')?1:null;
            },
            'input_sanitizer'=>function ($action, $database, $table, $column, $type, $value) {
                return is_string($value)?strip_tags($value):$value;
            },
            'input_validator'=>function ($action, $database, $table, $column, $type, $value, $context) {
                return ($column=='category_id' && !is_numeric($value))?'must be numeric':true;
            },
            'before'=>function (&$action, &$database, &$table, &$id, &$input) {
                if ($table=='products') {
                    if ($action=='create') {
                        $input->created_at = '2013-12-11 10:09:08';
                    } elseif ($action=='delete') {
                        $action='update';
                        $input = (object)array('deleted_at' => '2013-12-11 11:10:09');
                    }
                }
            },
            'after'=>function ($action, $database, $table, $id, $input, $output) {
                file_put_contents('log.txt', var_export(array($action,$database,$table,$id,$input,$output), true), FILE_APPEND);
            },
            // for tests
            'method'=>$method,
            'request'=>$url['path'],
            'post'=>$data,
            'get'=>$get,
        ));
        return $this;
    }

    public function get($url)
    {
        return $this->action('GET', $url);
    }

    public function post($url, $data)
    {
        return $this->action('POST', $url, $data);
    }

    public function put($url, $data)
    {
        return $this->action('PUT', $url, $data);
    }

    public function delete($url)
    {
        return $this->action('DELETE', $url);
    }

    public function options($url)
    {
        return $this->action('OPTIONS', $url);
    }

    public function patch($url, $data)
    {
        return $this->action('PATCH', $url, $data);
    }

    public function expectAny()
    {
        ob_start();
        $this->api->executeCommand();
        ob_end_clean();
        return $this;
    }

    public function expect($output, $error=false)
    {
        $exception = false;
        ob_start();
        try {
            $this->api->executeCommand();
        } catch (\Exception $e) {
            $exception = $e->getMessage();
        }
        $data = ob_get_contents();
        ob_end_clean();
        if ($exception) {
            $this->test->assertEquals($error, $exception);
        } else {
            $this->test->assertEquals($output, $data);
        }
        return $this;
    }

    public function expectPattern($expectedOutputPattern, $expectedErrorPattern) {
        $exception = false;
        ob_start();
        try {
            $this->api->executeCommand();
        } catch (\Exception $e) {
            $exception = $e->getMessage();
        }
        $outputData = ob_get_contents();
        ob_end_clean();
        if ($exception) {
            $this->test->assertRegExp($expectedErrorPattern, $exception);
        } else {
            $this->test->assertRegExp($expectedOutputPattern, $outputData);
        }
        return $this;
    }
}
