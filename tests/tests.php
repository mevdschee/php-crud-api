<?php
if (!file_exists(__DIR__.'/config.php')) {
	copy(__DIR__.'/config.php.dist',__DIR__.'/config.php');
}
require __DIR__.'/config.php';
require __DIR__.'/../api.php';

class API
{
	protected $test;
	protected $api;

	public function __construct($test)
	{
		$this->test = $test;
	}

	private function action($method,$url,$data='')
	{
		$url = parse_url($url);
		$query = isset($url['query'])?$url['query']:'';
		parse_str($query,$get);

		$data = 'data://text/plain;base64,'.base64_encode($data);

		switch(MySQL_CRUD_API_Config::$dbengine) {
			case 'mssql':	$class = 'MsSQL_CRUD_API'; $charset = 'utf-8'; break;
			case 'pgsql':	$class = 'PgSQL_CRUD_API'; $charset = 'utf8'; break;
			case 'mysql':	$class = 'MySQL_CRUD_API'; $charset = 'utf8'; break;
			default:	die("DB engine not supported: $dbengine\n");
		}

		$this->api = new $class(array(
				'hostname'=>MySQL_CRUD_API_Config::$hostname,
				'username'=>MySQL_CRUD_API_Config::$username,
				'password'=>MySQL_CRUD_API_Config::$password,
				'database'=>MySQL_CRUD_API_Config::$database,
				'charset'=>$charset,
				// callbacks
				'table_authorizer'=>function($action,$database,$table) { return true; },
				'column_authorizer'=>function($action,$database,$table,$column) { return $column!='password'; },
				'input_sanitizer'=>function($action,$database,$table,$column,$type,$value) { return $value===null?null:strip_tags($value); },
				'input_validator'=>function($action,$database,$table,$column,$type,$value) { return ($column=='category_id' && !is_numeric($value))?'must be numeric':true; },
				// for tests
				'method' =>$method,
				'request' =>$url['path'],
				'post'=>$data,
				'get' =>$get,
		));
		return $this;
	}

	public function get($url)
	{
		return $this->action('GET',$url);
	}

	public function post($url,$data)
	{
		return $this->action('POST',$url,$data);
	}

	public function put($url,$data)
	{
		return $this->action('PUT',$url,$data);
	}

	public function delete($url)
	{
		return $this->action('DELETE',$url);
	}

	public function options($url)
	{
		return $this->action('OPTIONS',$url);
	}

	public function expect($output,$error=false)
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
		$this->test->assertEquals($error.$output, $exception.$data);
		return $this;
	}
}

class MySQL_CRUD_API_Test extends PHPUnit_Framework_TestCase
{
	public static function setUpBeforeClass()
	{
		if (MySQL_CRUD_API_Config::$database=='{{test_database}}') {
			die("Configure database in 'config.php' before running tests.\n");
		}

		$dbengine = MySQL_CRUD_API_Config::$dbengine;
		$hostname = MySQL_CRUD_API_Config::$hostname;
		$username = MySQL_CRUD_API_Config::$username;
		$password = MySQL_CRUD_API_Config::$password;
		$database = MySQL_CRUD_API_Config::$database;

		$fixture = __DIR__.'/blog.'.$dbengine;

		if ($dbengine == 'mysql') {

			$link = mysqli_connect($hostname, $username, $password, $database);
			if (mysqli_connect_errno()) {
				die("Connect failed: ".mysqli_connect_error()."\n");
			}

			$i=0;
			if (mysqli_multi_query($link, file_get_contents($fixture))) {
				do { $i++; } while (mysqli_next_result($link));
			}
			if (mysqli_errno($link)) {
				die("Loading '$fixture' failed on statemement #$i with error:\n".mysqli_error($link)."\n");
			}

			mysqli_close($link);

		} elseif ($dbengine == 'mssql') {

			$connectionInfo = array();
			$connectionInfo['UID']=$username;
			$connectionInfo['PWD']=$password;
			$connectionInfo['Database']=$database;
			$connectionInfo['CharacterSet']='UTF-8';
			$conn = sqlsrv_connect( $hostname, $connectionInfo);
			if (!$conn) {
				die("Connect failed: ".print_r( sqlsrv_errors(), true));
			}
			$queries = preg_split('/\n\s*GO\s*\n/', file_get_contents($fixture));
			array_pop($queries);
			foreach ($queries as $i=>$query) {
				if (!sqlsrv_query($conn, $query)) {
					$i++;
					die("Loading '$fixture' failed on statemement #$i with error:\n".print_r( sqlsrv_errors(), true)."\n");
				}
			}
			sqlsrv_close($conn);

		} elseif ($dbengine == 'pgsql') {

			$e = function ($v) { return str_replace(array('\'','\\'),array('\\\'','\\\\'),$v); };
			$hostname = $e($hostname);
			$database = $e($database);
			$username = $e($username);
			$password = $e($password);
			$conn_string = "host='$hostname' dbname='$database' user='$username' password='$password' options='--client_encoding=UTF8'";
			$db = pg_connect($conn_string);
			if (!$db) {
				die("Connect failed: ".print_r( sqlsrv_errors(), true));
			}
			$queries = preg_split('/;\s*\n/', file_get_contents($fixture));
			array_pop($queries);
			foreach ($queries as $i=>$query) {
				if (!pg_query($db, $query.';')) {
					$i++;
					die("Loading '$fixture' failed on statemement #$i with error:\n".print_r( pg_last_error($db), true)."\n");
				}
			}
			pg_close($db);

		}
	}

	public function testListPosts()
	{
		$test = new API($this);
		$test->get('/posts');
		$test->expect('{"posts":{"columns":["id","user_id","category_id","content"],"records":[["1","1","1","blog started"],["2","1","2","It works!"]]}}');
	}
	
	public function testListPostColumns()
	{
		$test = new API($this);
		$test->get('/posts?columns=id,content');
		$test->expect('{"posts":{"columns":["id","content"],"records":[["1","blog started"],["2","It works!"]]}}');
	}
	
	public function testListPostsWithTransform()
	{
		$test = new API($this);
		$test->get('/posts?transform=1');
		$test->expect('{"posts":[{"id":"1","user_id":"1","category_id":"1","content":"blog started"},{"id":"2","user_id":"1","category_id":"2","content":"It works!"}]}');
	}

	public function testReadPost()
	{
		$test = new API($this);
		$test->get('/posts/2');
		$test->expect('{"id":"2","user_id":"1","category_id":"2","content":"It works!"}');
	}
	
	public function testReadPostColumns()
	{
		$test = new API($this);
		$test->get('/posts/2?columns=id,content');
		$test->expect('{"id":"2","content":"It works!"}');
	}
	
	public function testAddPost()
	{
		$test = new API($this);
		$test->post('/posts','{"user_id":"1","category_id":"1","content":"test"}');
		$test->expect('3');
	}

	public function testEditPost()
	{
		$test = new API($this);
		$test->put('/posts/3','{"user_id":"1","category_id":"1","content":"test (edited)"}');
		$test->expect('1');
		$test->get('/posts/3');
		$test->expect('{"id":"3","user_id":"1","category_id":"1","content":"test (edited)"}');
	}
	
	public function testEditPostColumns()
	{
		$test = new API($this);
		$test->put('/posts/3?columns=id,content','{"user_id":"1","category_id":"2","content":"test (edited 2)"}');
		$test->expect('1');
		$test->get('/posts/3');
		$test->expect('{"id":"3","user_id":"1","category_id":"1","content":"test (edited 2)"}');
	}
	
	public function testEditPostWithUtf8Content()
	{
		$utf8 = json_encode('Hello world, Καλημέρα κόσμε, コンニチハ');
		$test = new API($this);
		$test->put('/posts/2','{"content":'.$utf8.'}');
		$test->expect('1');
		$test->get('/posts/2');
		$test->expect('{"id":"2","user_id":"1","category_id":"2","content":'.$utf8.'}');
	}

	public function testEditPostWithUtf8ContentWithPost()
	{
		$utf8 = '€ Hello world, Καλημέρα κόσμε, コンニチハ';
		$url_encoded = urlencode($utf8);
		$json_encoded = json_encode($utf8);
		$test = new API($this);
		$test->put('/posts/2','content='.$url_encoded);
		$test->expect('1');
		$test->get('/posts/2');
		$test->expect('{"id":"2","user_id":"1","category_id":"2","content":'.$json_encoded.'}');
	}

	public function testDeletePost()
	{
		$test = new API($this);
		$test->delete('/posts/3');
		$test->expect('1');
		$test->get('/posts/3');
		$test->expect('','Not found (object)');
	}

	public function testAddPostWithPost()
	{
		$test = new API($this);
		$test->post('/posts','user_id=1&category_id=1&content=test');
		$test->expect('4');
	}

	public function testEditPostWithPost()
	{
		$test = new API($this);
		$test->put('/posts/4','user_id=1&category_id=1&content=test+(edited)');
		$test->expect('1');
		$test->get('/posts/4');
		$test->expect('{"id":"4","user_id":"1","category_id":"1","content":"test (edited)"}');
	}

	public function testDeletePostWithPost()
	{
		$test = new API($this);
		$test->delete('/posts/4');
		$test->expect('1');
		$test->get('/posts/4');
		$test->expect('','Not found (object)');
	}

	public function testListWithPaginate()
	{
		$test = new API($this);
		for ($i=1;$i<=10;$i++) {
		  $test->post('/posts','{"user_id":"1","category_id":"1","content":"#'.$i.'"}');
		  $test->expect(4+$i);
		}
		$test->get('/posts?page=2,2&order=id');
		$test->expect('{"posts":{"columns":["id","user_id","category_id","content"],"records":[["5","1","1","#1"],["6","1","1","#2"]],"results":12}}');
	}

	public function testListWithPaginateLastPage()
	{
		$test = new API($this);
		$test->get('/posts?page=3,5&order=id');
		$test->expect('{"posts":{"columns":["id","user_id","category_id","content"],"records":[["13","1","1","#9"],["14","1","1","#10"]],"results":12}}');
	}
	
	public function testListExampleFromReadme()
	{
		$test = new API($this);
		$test->get('/posts,categories,tags,comments?filter=id,eq,1');
		$test->expect('{"posts":{"columns":["id","user_id","category_id","content"],"records":[["1","1","1","blog started"]]},"post_tags":{"relations":{"post_id":"posts.id"},"columns":["id","post_id","tag_id"],"records":[["1","1","1"],["2","1","2"]]},"categories":{"relations":{"id":"posts.category_id"},"columns":["id","name","icon"],"records":[["1","anouncement",null]]},"tags":{"relations":{"id":"post_tags.tag_id"},"columns":["id","name"],"records":[["1","funny"],["2","important"]]},"comments":{"relations":{"post_id":"posts.id"},"columns":["id","post_id","message"],"records":[["1","1","great"],["2","1","fantastic"]]}}');
	}

	public function testListExampleFromReadmeWithTransform()
	{
		$test = new API($this);
		$test->get('/posts,categories,tags,comments?filter=id,eq,1&transform=1');
		$test->expect('{"posts":[{"id":"1","post_tags":[{"id":"1","post_id":"1","tag_id":"1","tags":[{"id":"1","name":"funny"}]},{"id":"2","post_id":"1","tag_id":"2","tags":[{"id":"2","name":"important"}]}],"comments":[{"id":"1","post_id":"1","message":"great"},{"id":"2","post_id":"1","message":"fantastic"}],"user_id":"1","category_id":"1","categories":[{"id":"1","name":"anouncement","icon":null}],"content":"blog started"}]}');
	}

	public function testEditCategoryWithBinaryContent()
	{
		$binary = base64_encode("\0abc\0\n\r\b\0");
		$base64url = rtrim(strtr($binary, '+/', '-_'), '=');
		$test = new API($this);
		$test->put('/categories/2','{"icon":"'.$base64url.'"}');
		$test->expect('1');
		$test->get('/categories/2');
		$test->expect('{"id":"2","name":"article","icon":"'.$binary.'"}');
	}

	public function testEditCategoryWithNull()
	{
		$test = new API($this);
		$test->put('/categories/2','{"icon":null}');
		$test->expect('1');
		$test->get('/categories/2');
		$test->expect('{"id":"2","name":"article","icon":null}');
	}

	public function testEditCategoryWithBinaryContentWithPost()
	{
		$binary = base64_encode("€ \0abc\0\n\r\b\0");
		$base64url = rtrim(strtr($binary, '+/', '-_'), '=');
		$test = new API($this);
		$test->put('/categories/2','icon='.$base64url);
		$test->expect('1');
		$test->get('/categories/2');
		$test->expect('{"id":"2","name":"article","icon":"'.$binary.'"}');
	}

	public function testEditCategoryWithNullWithPost()
	{
		$test = new API($this);
		$test->put('/categories/2','icon__is_null');
		$test->expect('1');
		$test->get('/categories/2');
		$test->expect('{"id":"2","name":"article","icon":null}');
	}

	public function testAddPostFailure()
	{
		$test = new API($this);
		$test->post('/posts','{"user_id":"a","category_id":"1","content":"tests"}');
		$test->expect('null');
	}

	public function testOptionsRequest()
	{
		$test = new API($this);
		$test->options('/posts/2');
		$test->expect('["Access-Control-Allow-Headers: Content-Type","Access-Control-Allow-Methods: OPTIONS, GET, PUT, POST, DELETE","Access-Control-Max-Age: 1728000"]');
	}
	
	public function testHidingPasswordColumn()
	{
		$test = new API($this);
		$test->get('/users/1');
		$test->expect('{"id":"1","username":"user1"}');
	}
	
	public function testValidatorErrorMessage()
	{
		$test = new API($this);
		$test->put('/posts/1','{"category_id":"a"}');
		$test->expect('{"category_id":"must be numeric"}');
	}
	
	public function testSanitizerToStripTags()
	{
		$test = new API($this);
		$test->put('/categories/2','{"name":"<script>alert();</script>"}');
		$test->expect('1');
		$test->get('/categories/2');
		$test->expect('{"id":"2","name":"alert();","icon":null}');
	}
	
	public function testErrorOnInvalidJson()
	{
		$test = new API($this);
		$test->post('/posts','{"}');
		$test->expect('Not found (input)');
	}
		
	public function testErrorOnDuplicatePrimaryKey()
	{
		$test = new API($this);
		$test->post('/posts','{"id":"1","user_id":"1","category_id":"1","content":"blog started (duplicate)"}');
		$test->expect('null');
	}
}
