<?php
require "api.php";

class MySQL_CRUD_API_Config
{
	public static $hostname='localhost';
	public static $username='root';
	public static $password='root';
	public static $database='mysql_crud_api'; // NB: Use an empty database, data will be LOST!
}

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

		$this->api = new MySQL_CRUD_API(array(
				'hostname'=>MySQL_CRUD_API_Config::$hostname,
				'username'=>MySQL_CRUD_API_Config::$username,
				'password'=>MySQL_CRUD_API_Config::$password,
				'database'=>MySQL_CRUD_API_Config::$database,
				'charset'=>'utf8',
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
		$this->test->assertEquals($output, $data);
		$this->test->assertEquals($error, $exception);
		return $this;
	}
}

class MySQL_CRUD_API_Test extends PHPUnit_Framework_TestCase
{
	private static function checkConfig()
	{
		$file = __FILE__;
		$file = str_replace(rtrim(getcwd(),'/').'/', '', $file);
		if (MySQL_CRUD_API_Config::$database=='{{test_database}}') {
			die("Configure database in '$file' before running tests.\n");
		}
	}

	public static function setUpBeforeClass()
	{
		static::checkConfig();
		$fixture = 'blog.mysql';

		$hostname = MySQL_CRUD_API_Config::$hostname;
		$username = MySQL_CRUD_API_Config::$username;
		$password = MySQL_CRUD_API_Config::$password;
		$database = MySQL_CRUD_API_Config::$database;

		$link = mysqli_connect($hostname, $username, $password, $database);

		if (mysqli_connect_errno()) {
			die("Connect failed: ".mysqli_connect_error()."\n");
		}

		if (mysqli_multi_query($link, file_get_contents($fixture))) {
			$i = 0;
			do {
				$i++;
			} while (mysqli_next_result($link));
		}
		if (mysqli_errno($link)) {
			die("Loading '$fixture' failed on statemement #$i with error:\n".mysqli_error($link)."\n");
		}

		mysqli_close($link);
	}

	public function testListPosts()
	{
		$test = new API($this);
		$test->get('/posts');
		$test->expect('{"posts":{"columns":["id","user_id","category_id","content"],"records":[["1","1","1","blog started"],["2","1","2","It works!"]]}}');
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

}
