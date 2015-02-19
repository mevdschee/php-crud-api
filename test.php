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
				list($query,$fields,$results) = $queries[$i++];
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
				return $mysqli_result;
			}));

		return $mysqli;
	}

	private function expect($method,$url,$queries,$output)
	{
		$api = new MySQL_CRUD_API('','','','database',false,array("users"=>"crudl"));
		$api->mysqli = $this->expectQueries($queries);
		$api->method = "GET";
		$url = explode('?',$url,2);
		if (isset($url[1])) {
			parse_str($url[1],$_GET);
		}
		$api->request = explode('/',ltrim($url[0],'/'));
		$this->expectOutputString($output);
		$api->executeCommand();
	}

	public function testList()
	{
		$this->expect(
			"GET",
			"/table",
			array(
				array(
					"SELECT `TABLE_NAME` FROM `INFORMATION_SCHEMA`.`TABLES` WHERE `TABLE_NAME` LIKE 'table' AND `TABLE_SCHEMA` = 'database'",
					array('table_name'),
					array(array('table')),
				),array(
					"SELECT * FROM `table`",
					array('id','name'),
					array(array('1','value1'),array('2','value2'),array('3','value3'),array('4','value4'),array('5','value5')),
				)
			),
			'{"table":{"columns":["id","name"],"records":[["1","value1"],["2","value2"],["3","value3"],["4","value4"],["5","value5"]]}}'
		);
	}

	public function testListPageFilterMatchOrder()
	{
		$this->expect(
			"GET",
			"/table?page=2,2&filter=id:3&match=from&order=id,desc",
			array(
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
			),
			'{"table":{"columns":["id","name"],"records":[["3","value3"]],"results":3}}'
		);
	}
}
