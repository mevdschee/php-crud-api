<?php
require "api.php";

class MySQL_CRUD_API_Test extends PHPUnit_Framework_TestCase
{
	private function expectQueries($queries)
	{
		$mysqli = $this->getMockBuilder('mysqli')
			->setMethods(array('query','real_escape_string'))
			->getMock();
		$mysqli->expects($this->any())
			->method('real_escape_string')
			->will($this->returnArgument(0));
		$mysqli->expects($this->any())
			->method('query')
			->will($this->returnCallback(function() use ($queries) {
				static $i = 0;
				$args = func_get_args();
				list($query,$fields,$results) = $queries[$i];
				$fields = array_map(function($v){ return (object)array('name'=>$v); },$fields);
				$this->assertEquals($query,$args[0]);
				$mysqli_result = $this->getMockBuilder('mysqli_result')
					->setMethods(array('fetch_fields','fetch_row','close'))
					->disableOriginalConstructor()
					->getMock();
				$mysqli_result->expects($this->any())
					->method('fetch_fields')
					->willReturn($fields);
				$mysqli_result->expects($this->any())
					->method('fetch_row')
					->will($this->returnCallback(function() use ($results) {
						static $r = 0;
						return isset($results[$r])?$results[$r++]:false;
					}));
				$i++;
				return $mysqli_result;
			}));

		return $mysqli;
	}

	public function testList()
	{
		$mysqli = $this->expectQueries(array(
			array(
				"SELECT `TABLE_NAME` FROM `INFORMATION_SCHEMA`.`TABLES` WHERE `TABLE_NAME` LIKE 'table' AND `TABLE_SCHEMA` = 'database'",
				array('table_name'),
				array(array('table')),
			),array(
				"SELECT * FROM `table`",
				array('id','name'),
				array(array('1','value1'),array('2','value2'),array('3','value3'),array('4','value4'),array('5','value5')),
			)
		));
		$api = new MySQL_CRUD_API('','','','database',false,array("dedicated_server_promo_codes"=>"crudl"));
		$api->mysqli = $mysqli;
		$api->method = "GET";
		$api->request = array('table');
		$this->expectOutputString('{"table":{"columns":["id","name"],"records":[["1","value1"],["2","value2"],["3","value3"],["4","value4"],["5","value5"]]}}');
		$api->executeCommand();
	}

	public function testListPageFilterMatchOrder()
	{
		$mysqli = $this->expectQueries(array(
			array(
				"SELECT `TABLE_NAME` FROM `INFORMATION_SCHEMA`.`TABLES` WHERE `TABLE_NAME` LIKE 'table' AND `TABLE_SCHEMA` = 'database'",
				array('table_name'),
				array(array('table')),
			),array(
				"SELECT COUNT(*) FROM `table` WHERE `id` >= '3'",
				array('count'),
				array(array('3')),
			),array(
				"SELECT * FROM `table` WHERE `id` >= '3' ORDER BY `id` DESC LIMIT 2 OFFSET 2",
				array('id','name'),
				array(array('3','value3')),
			)
		));
		$api = new MySQL_CRUD_API('','','','database',false,array("users"=>"crudl"));
		$api->mysqli = $mysqli;
		$api->method = "GET";
		$api->request = array('table');
		$_GET['page']='2,2';
		$_GET['filter']='id:3';
		$_GET['match']='from';
		$_GET['order']='id,desc';
		$this->expectOutputString('{"table":{"columns":["id","name"],"records":[["3","value3"],"results":3]}}');
		$api->executeCommand();
	}
}
