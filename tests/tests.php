<?php

require __DIR__.'/config.php';
require __DIR__.'/../api.php';

class API
{
    /**
     * Database configuration array
     *
     * @var array
     */
    protected $config;

    /**
     * @var PHP_CRUD_API_Test
     */
    protected $test;

    /**
     * @var PHP_CRUD_API
     */
    protected $api;

    public function __construct($test, $config)
    {
        $this->test = $test;
        $this->config = $config;
    }

    private function action($method,$url,$data='')
    {
        $url = parse_url($url);
        $query = isset($url['query'])?$url['query']:'';
        parse_str($query,$get);

        $this->api = new PHP_CRUD_API(array(
            'dbengine'=>$this->config['dbengine'],
            'hostname'=>$this->config['hostname'],
            'username'=>$this->config['username'],
            'password'=>$this->config['password'],
            'database'=>$this->config['database'],
            // callbacks
            'table_authorizer'=>function($action,$database,$table) { return true; },
            'column_authorizer'=>function($action,$database,$table,$column) { return !($column=='password'&&$action=='list'); },
            'record_filter'=>function($action,$database,$table) { return ($table=='posts')?array('id,neq,13'):false; },
            'tenancy_function'=>function($action,$database,$table,$column) { return ($table=='users'&&$column=='id')?1:null; },
            'input_sanitizer'=>function($action,$database,$table,$column,$type,$value) { return is_string($value)?strip_tags($value):$value; },
            'input_validator'=>function($action,$database,$table,$column,$type,$value,$context) { return ($column=='category_id' && !is_numeric($value))?'must be numeric':true; },
            'before'=>function(&$action,&$database,&$table,&$id,&$input) { if ($table=='products') if ($action=='create') $input->created_at = '2013-12-11 10:09:08'; else if ($action=='delete') { $action='update'; $input = (object)array('deleted_at' => '2013-12-11 11:10:09'); } },
            'after'=>function($action,$database,$table,$id,$input,$output) { file_put_contents('log.txt',var_export(array($action,$database,$table,$id,$input,$output),true),FILE_APPEND); },
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

    public function patch($url,$data)
    {
        return $this->action('PATCH',$url,$data);
    }

    public function expectAny()
    {
        ob_start();
        $this->api->executeCommand();
        ob_end_clean();
        return $this;
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
        if ($exception) $this->test->assertEquals($error, $exception);
        else $this->test->assertEquals($output, $data);
        return $this;
    }
}

abstract class PHP_CRUD_API_Test extends PHPUnit_Framework_TestCase
{
    public static $config;

    public abstract function seedDatabase();

    protected function setConfig($dbengine = '')
    {
        foreach (PHP_CRUD_API_Config::$config as $database) {
            if ($database['dbengine'] == $dbengine) {
                static::$config = $database;
                return true;
            }
        }
        self::markTestSkipped("Configuration for {$dbengine} database not found.");
        return false;
    }

    public function testListPosts()
    {
        $test = new API($this, static::$config);
        $test->get('/posts');
        $test->expect('{"posts":{"columns":["id","user_id","category_id","content"],"records":[[1,1,1,"blog started"],[2,1,2,"It works!"]]}}');
    }

    public function testListPostColumns()
    {
        $test = new API($this, static::$config);
        $test->get('/posts?columns=id,content');
        $test->expect('{"posts":{"columns":["id","content"],"records":[[1,"blog started"],[2,"It works!"]]}}');
    }

    public function testListPostsWithTransform()
    {
        $test = new API($this, static::$config);
        $test->get('/posts?transform=1');
        $test->expect('{"posts":[{"id":1,"user_id":1,"category_id":1,"content":"blog started"},{"id":2,"user_id":1,"category_id":2,"content":"It works!"}]}');
    }

    public function testReadPost()
    {
        $test = new API($this, static::$config);
        $test->get('/posts/2');
        $test->expect('{"id":2,"user_id":1,"category_id":2,"content":"It works!"}');
    }

    public function testReadPosts()
    {
        $test = new API($this, static::$config);
        $test->get('/posts/1,2');
        $test->expect('[{"id":1,"user_id":1,"category_id":1,"content":"blog started"},{"id":2,"user_id":1,"category_id":2,"content":"It works!"}]');
    }

    public function testReadPostColumns()
    {
        $test = new API($this, static::$config);
        $test->get('/posts/2?columns=id,content');
        $test->expect('{"id":2,"content":"It works!"}');
    }

    public function testAddPost()
    {
        $test = new API($this, static::$config);
        $test->post('/posts','{"user_id":1,"category_id":1,"content":"test"}');
        $test->expect('3');
    }

    public function testEditPost()
    {
        $test = new API($this, static::$config);
        $test->put('/posts/3','{"user_id":1,"category_id":1,"content":"test (edited)"}');
        $test->expect('1');
        $test->get('/posts/3');
        $test->expect('{"id":3,"user_id":1,"category_id":1,"content":"test (edited)"}');
    }

    public function testEditPostColumnsMissingField()
    {
        $test = new API($this, static::$config);
        $test->put('/posts/3?columns=id,content','{"content":"test (edited 2)"}');
        $test->expect('1');
        $test->get('/posts/3');
        $test->expect('{"id":3,"user_id":1,"category_id":1,"content":"test (edited 2)"}');
    }

    public function testEditPostColumnsExtraField()
    {
        $test = new API($this, static::$config);
        $test->put('/posts/3?columns=id,content','{"user_id":2,"content":"test (edited 3)"}');
        $test->expect('1');
        $test->get('/posts/3');
        $test->expect('{"id":3,"user_id":1,"category_id":1,"content":"test (edited 3)"}');
    }

    public function testEditPostWithUtf8Content()
    {
        $utf8 = json_encode('Hello world, Καλημέρα κόσμε, コンニチハ');
        $test = new API($this, static::$config);
        $test->put('/posts/2','{"content":'.$utf8.'}');
        $test->expect('1');
        $test->get('/posts/2');
        $test->expect('{"id":2,"user_id":1,"category_id":2,"content":'.$utf8.'}');
    }

    public function testEditPostWithUtf8ContentWithPost()
    {
        $utf8 = '€ Hello world, Καλημέρα κόσμε, コンニチハ';
        $url_encoded = urlencode($utf8);
        $json_encoded = json_encode($utf8);
        $test = new API($this, static::$config);
        $test->put('/posts/2','content='.$url_encoded);
        $test->expect('1');
        $test->get('/posts/2');
        $test->expect('{"id":2,"user_id":1,"category_id":2,"content":'.$json_encoded.'}');
    }

    public function testDeletePost()
    {
        $test = new API($this, static::$config);
        $test->delete('/posts/3');
        $test->expect('1');
        $test->get('/posts/3');
        $test->expect(false,'Not found (object)');
    }

    public function testAddPostWithPost()
    {
        $test = new API($this, static::$config);
        $test->post('/posts','user_id=1&category_id=1&content=test');
        $test->expect('4');
    }

    public function testEditPostWithPost()
    {
        $test = new API($this, static::$config);
        $test->put('/posts/4','user_id=1&category_id=1&content=test+(edited)');
        $test->expect('1');
        $test->get('/posts/4');
        $test->expect('{"id":4,"user_id":1,"category_id":1,"content":"test (edited)"}');
    }

    public function testDeletePostWithPost()
    {
        $test = new API($this, static::$config);
        $test->delete('/posts/4');
        $test->expect('1');
        $test->get('/posts/4');
        $test->expect(false,'Not found (object)');
    }

    public function testListWithPaginate()
    {
        $test = new API($this, static::$config);
        for ($i=1;$i<=10;$i++) {
            $test->post('/posts','{"user_id":1,"category_id":1,"content":"#'.$i.'"}');
            $test->expect(4+$i);
        }
        $test->get('/posts?page=2,2&order=id');
        $test->expect('{"posts":{"columns":["id","user_id","category_id","content"],"records":[[5,1,1,"#1"],[6,1,1,"#2"]],"results":11}}');
    }

    public function testListWithPaginateInMultipleOrder()
    {
        $test = new API($this, static::$config);
        $test->get('/posts?page=1,2&order[]=category_id,asc&order[]=id,desc');
        $test->expect('{"posts":{"columns":["id","user_id","category_id","content"],"records":[[14,1,1,"#10"],[12,1,1,"#8"]],"results":11}}');
    }

    public function testListWithPaginateInDescendingOrder()
    {
        $test = new API($this, static::$config);
        $test->get('/posts?page=2,2&order=id,desc');
        $test->expect('{"posts":{"columns":["id","user_id","category_id","content"],"records":[[11,1,1,"#7"],[10,1,1,"#6"]],"results":11}}');
    }

    public function testListWithPaginateLastPage()
    {
        $test = new API($this, static::$config);
        $test->get('/posts?page=3,5&order=id');
        $test->expect('{"posts":{"columns":["id","user_id","category_id","content"],"records":[[14,1,1,"#10"]],"results":11}}');
    }

    public function testListExampleFromReadmeFullRecord()
    {
        $test = new API($this, static::$config);
        $test->get('/posts?filter=id,eq,1');
        $test->expect('{"posts":{"columns":["id","user_id","category_id","content"],"records":[[1,1,1,"blog started"]]}}');
    }

    public function testListExampleFromReadmeWithExclude()
    {
        $test = new API($this, static::$config);
        $test->get('/posts?exclude=id&filter=id,eq,1');
        $test->expect('{"posts":{"columns":["user_id","category_id","content"],"records":[[1,1,"blog started"]]}}');
    }

    public function testListExampleFromReadme()
    {
        $test = new API($this, static::$config);
        $test->get('/posts?include=categories,tags,comments&filter=id,eq,1');
        $test->expect('{"posts":{"columns":["id","user_id","category_id","content"],"records":[[1,1,1,"blog started"]]},"post_tags":{"relations":{"post_id":"posts.id"},"columns":["id","post_id","tag_id"],"records":[[1,1,1],[2,1,2]]},"categories":{"relations":{"id":"posts.category_id"},"columns":["id","name","icon"],"records":[[1,"announcement",null]]},"tags":{"relations":{"id":"post_tags.tag_id"},"columns":["id","name"],"records":[[1,"funny"],[2,"important"]]},"comments":{"relations":{"post_id":"posts.id"},"columns":["id","post_id","message"],"records":[[1,1,"great"],[2,1,"fantastic"]]}}');
    }

    public function testListExampleFromReadmeWithTransform()
    {
        $test = new API($this, static::$config);
        $test->get('/posts?include=categories,tags,comments&filter=id,eq,1&transform=1');
        $test->expect('{"posts":[{"id":1,"post_tags":[{"id":1,"post_id":1,"tag_id":1,"tags":[{"id":1,"name":"funny"}]},{"id":2,"post_id":1,"tag_id":2,"tags":[{"id":2,"name":"important"}]}],"comments":[{"id":1,"post_id":1,"message":"great"},{"id":2,"post_id":1,"message":"fantastic"}],"user_id":1,"category_id":1,"categories":[{"id":1,"name":"announcement","icon":null}],"content":"blog started"}]}');
    }

    public function testListExampleFromReadmeWithTransformWithExclude()
    {
        $test = new API($this, static::$config);
        $test->get('/posts?include=categories,tags,comments&exclude=comments.message&filter=id,eq,1&transform=1');
        $test->expect('{"posts":[{"id":1,"post_tags":[{"id":1,"post_id":1,"tag_id":1,"tags":[{"id":1,"name":"funny"}]},{"id":2,"post_id":1,"tag_id":2,"tags":[{"id":2,"name":"important"}]}],"comments":[{"id":1,"post_id":1},{"id":2,"post_id":1}],"user_id":1,"category_id":1,"categories":[{"id":1,"name":"announcement","icon":null}],"content":"blog started"}]}');
    }

    public function testEditCategoryWithBinaryContent()
    {
        $binary = base64_encode("\0abc\0\n\r\b\0");
        $base64url = rtrim(strtr($binary, '+/', '-_'), '=');
        $test = new API($this, static::$config);
        $test->put('/categories/2','{"icon":"'.$base64url.'"}');
        $test->expect('1');
        $test->get('/categories/2');
        $test->expect('{"id":2,"name":"article","icon":"'.$binary.'"}');
    }

    public function testEditCategoryWithNull()
    {
        $test = new API($this, static::$config);
        $test->put('/categories/2','{"icon":null}');
        $test->expect('1');
        $test->get('/categories/2');
        $test->expect('{"id":2,"name":"article","icon":null}');
    }

    public function testEditCategoryWithBinaryContentWithPost()
    {
        $binary = base64_encode("€ \0abc\0\n\r\b\0");
        $base64url = rtrim(strtr($binary, '+/', '-_'), '=');
        $test = new API($this, static::$config);
        $test->put('/categories/2','icon='.$base64url);
        $test->expect('1');
        $test->get('/categories/2');
        $test->expect('{"id":2,"name":"article","icon":"'.$binary.'"}');
    }

    public function testListCategoriesWithBinaryContent()
    {
        $test = new API($this, static::$config);
        $test->get('/categories');
        $test->expect('{"categories":{"columns":["id","name","icon"],"records":[[1,"announcement",null],[2,"article","4oKsIABhYmMACg1cYgA="]]}}');
    }

    public function testEditCategoryWithNullWithPost()
    {
        $test = new API($this, static::$config);
        $test->put('/categories/2','icon__is_null');
        $test->expect('1');
        $test->get('/categories/2');
        $test->expect('{"id":2,"name":"article","icon":null}');
    }

    public function testAddPostFailure()
    {
        $test = new API($this, static::$config);
        $test->post('/posts','{"user_id":"a","category_id":1,"content":"tests"}');
        $test->expect('null');
    }

    public function testOptionsRequest()
    {
        $test = new API($this, static::$config);
        $test->options('/posts/2');
        $test->expect('["Access-Control-Allow-Headers: Content-Type, X-XSRF-TOKEN","Access-Control-Allow-Methods: OPTIONS, GET, PUT, POST, DELETE, PATCH","Access-Control-Allow-Credentials: true","Access-Control-Max-Age: 1728000"]',false);
    }

    public function testHidingPasswordColumn()
    {
        $test = new API($this, static::$config);
        $test->get('/users?filter=id,eq,1&transform=1');
        $test->expect('{"users":[{"id":1,"username":"user1","location":null}]}');
    }

    public function testValidatorErrorMessage()
    {
        $test = new API($this, static::$config);
        $test->put('/posts/1','{"category_id":"a"}');
        $test->expect(false,'{"category_id":"must be numeric"}');
    }

    public function testSanitizerToStripTags()
    {
        $test = new API($this, static::$config);
        $test->put('/categories/2','{"name":"<script>alert();</script>"}');
        $test->expect('1');
        $test->get('/categories/2');
        $test->expect('{"id":2,"name":"alert();","icon":null}');
    }

    public function testErrorOnInvalidJson()
    {
        $test = new API($this, static::$config);
        $test->post('/posts','{"}');
        $test->expect(false,'Not found (input)');
    }

    public function testErrorOnDuplicatePrimaryKey()
    {
        $test = new API($this, static::$config);
        $test->post('/posts','{"id":1,"user_id":1,"category_id":1,"content":"blog started (duplicate)"}');
        $test->expect('null');
    }

    public function testErrorOnFailingForeignKeyConstraint()
    {
        $test = new API($this, static::$config);
        $test->post('/posts','{"user_id":3,"category_id":1,"content":"fk constraint"}');
        $test->expect('null');
    }

    public function testMissingIntermediateTable()
    {
        $test = new API($this, static::$config);
        $test->get('/users?include=posts,tags');
        $test->expect('{"users":{"columns":["id","username","location"],"records":[[1,"user1",null]]},"posts":{"relations":{"user_id":"users.id"},"columns":["id","user_id","category_id","content"],"records":[[1,1,1,"blog started"],[2,1,2,"\u20ac Hello world, \u039a\u03b1\u03bb\u03b7\u03bc\u1f73\u03c1\u03b1 \u03ba\u1f79\u03c3\u03bc\u03b5, \u30b3\u30f3\u30cb\u30c1\u30cf"],[5,1,1,"#1"],[6,1,1,"#2"],[7,1,1,"#3"],[8,1,1,"#4"],[9,1,1,"#5"],[10,1,1,"#6"],[11,1,1,"#7"],[12,1,1,"#8"],[14,1,1,"#10"]]},"post_tags":{"relations":{"post_id":"posts.id"},"columns":["id","post_id","tag_id"],"records":[[1,1,1],[2,1,2],[3,2,1],[4,2,2]]},"tags":{"relations":{"id":"post_tags.tag_id"},"columns":["id","name"],"records":[[1,"funny"],[2,"important"]]}}');
    }

    public function testEditUserPassword()
    {
        $test = new API($this, static::$config);
        $test->put('/users/1','{"password":"testtest"}');
        $test->expect('1');
    }

    public function testEditUserLocation()
    {
        $test = new API($this, static::$config);
        $test->put('/users/1','{"location":"POINT(30 20)"}');
        $test->expect('1');
        $test->get('/users/1?columns=id,location');
        if (static::$config['dbengine']=='SQLServer') {
            $test->expect('{"id":1,"location":"POINT (30 20)"}');
        } else {
            $test->expect('{"id":1,"location":"POINT(30 20)"}');
        }
    }

    public function testListUserLocations()
    {
        $test = new API($this, static::$config);
        $test->get('/users?columns=id,location');
        if (static::$config['dbengine']=='SQLServer') {
            $test->expect('{"users":{"columns":["id","location"],"records":[[1,"POINT (30 20)"]]}}');
        } else {
            $test->expect('{"users":{"columns":["id","location"],"records":[[1,"POINT(30 20)"]]}}');
        }
    }

    public function testEditUserWithId()
    {
        if (static::$config['dbengine']!='SQLServer') {
            $test = new API($this, static::$config);
            $test->put('/users/1','{"id":2,"password":"testtest2"}');
            $test->expect('1');
            $test->get('/users/1?columns=id,username,password');
            $test->expect('{"id":1,"username":"user1","password":"testtest2"}');
        }
    }

    public function testReadOtherUser()
    {
        $test = new API($this, static::$config);
        $test->get('/users/2');
        $test->expect(false,'Not found (object)');
    }

    public function testEditOtherUser()
    {
        $test = new API($this, static::$config);
        $test->put('/users/2','{"password":"testtest"}');
        $test->expect('0');
    }

    public function testFilterCategoryOnNullIcon()
    {
        $test = new API($this, static::$config);
        $test->get('/categories?filter[]=icon,is,null&transform=1');
        $test->expect('{"categories":[{"id":1,"name":"announcement","icon":null},{"id":2,"name":"alert();","icon":null}]}');
    }

    public function testFilterCategoryOnNotNullIcon()
    {
        $test = new API($this, static::$config);
        $test->get('/categories?filter[]=icon,nis,null&transform=1');
        $test->expect('{"categories":[]}');
    }

    public function testFilterPostsNotIn()
    {
        $test = new API($this, static::$config);
        $test->get('/posts?filter[]=id,nin,1,2,3,4,7,8,9,10,11,12,13,14&transform=1');
        $test->expect('{"posts":[{"id":5,"user_id":1,"category_id":1,"content":"#1"},{"id":6,"user_id":1,"category_id":1,"content":"#2"}]}');
    }

    public function testFilterPostsBetween()
    {
        $test = new API($this, static::$config);
        $test->get('/posts?filter[]=id,bt,5,6&transform=1');
        $test->expect('{"posts":[{"id":5,"user_id":1,"category_id":1,"content":"#1"},{"id":6,"user_id":1,"category_id":1,"content":"#2"}]}');
    }

    public function testFilterPostsNotBetween()
    {
        $test = new API($this, static::$config);
        $test->get('/posts?filter[]=id,nbt,2,13&transform=1');
        $test->expect('{"posts":[{"id":1,"user_id":1,"category_id":1,"content":"blog started"},{"id":14,"user_id":1,"category_id":1,"content":"#10"}]}');
    }

    public function testColumnsWithTable()
    {
        $test = new API($this, static::$config);
        $test->get('/posts?columns=posts.content&filter=id,eq,1&transform=1');
        $test->expect('{"posts":[{"content":"blog started"}]}');
    }

    public function testColumnsWithTableWildcard()
    {
        $test = new API($this, static::$config);
        $test->get('/posts?columns=posts.*&filter=id,eq,1&transform=1');
        $test->expect('{"posts":[{"id":1,"user_id":1,"category_id":1,"content":"blog started"}]}');
    }

    public function testColumnsOnInclude()
    {
        $test = new API($this, static::$config);
        $test->get('/posts?include=categories&columns=categories.name&filter=id,eq,1&transform=1');
        $test->expect('{"posts":[{"category_id":1,"categories":[{"id":1,"name":"announcement"}]}]}');
    }

    public function testFilterOnRelationAnd()
    {
        $test = new API($this, static::$config);
        $test->get('/categories?include=posts&filter[]=id,ge,1&filter[]=id,le,1&filter[]=id,le,2&filter[]=posts.id,lt,8&filter[]=posts.id,gt,4');
        $test->expect('{"categories":{"columns":["id","name","icon"],"records":[[1,"announcement",null]]},"posts":{"relations":{"category_id":"categories.id"},"columns":["id","user_id","category_id","content"],"records":[[5,1,1,"#1"],[6,1,1,"#2"],[7,1,1,"#3"]]}}');
    }

    public function testFilterOnRelationOr()
    {
        $test = new API($this, static::$config);
        $test->get('/categories?include=posts&filter[]=id,ge,1&filter[]=id,le,1&filter[]=posts.id,eq,5&filter[]=posts.id,eq,6&filter[]=posts.id,eq,7&satisfy=all,posts.any');
        $test->expect('{"categories":{"columns":["id","name","icon"],"records":[[1,"announcement",null]]},"posts":{"relations":{"category_id":"categories.id"},"columns":["id","user_id","category_id","content"],"records":[[5,1,1,"#1"],[6,1,1,"#2"],[7,1,1,"#3"]]}}');
    }

    public function testColumnsOnWrongInclude()
    {
        $test = new API($this, static::$config);
        $test->get('/posts?include=categories&columns=categories&filter=id,eq,1&transform=1');
        $test->expect('{"posts":[{"category_id":1,"categories":[{"id":1}]}]}');
    }

    public function testColumnsOnImplicitJoin()
    {
        $test = new API($this, static::$config);
        $test->get('/posts?include=tags&columns=posts.id,tags.name&filter=id,eq,1&transform=1');
        $test->expect('{"posts":[{"id":1,"post_tags":[{"post_id":1,"tag_id":1,"tags":[{"id":1,"name":"funny"}]},{"post_id":1,"tag_id":2,"tags":[{"id":2,"name":"important"}]}]}]}');
    }

    public function testSpatialFilterWithin()
    {
        if (static::$config['dbengine']!='SQLite') {
            $test = new API($this, static::$config);
            $test->get('/users?columns=id,username&filter=location,swi,POINT(30 20)');
            $test->expect('{"users":{"columns":["id","username"],"records":[[1,"user1"]]}}');
        }
    }

    public function testAddPostsWithNonExistingCategory()
    {
        $test = new API($this, static::$config);
        $test->post('/posts','[{"user_id":1,"category_id":1,"content":"tests"},{"user_id":1,"category_id":15,"content":"tests"}]');
        $test->expect('null');
        $test->get('/posts?columns=content&filter=content,eq,tests');
        $test->expect('{"posts":{"columns":["content"],"records":[]}}');
    }

    public function testAddPosts()
    {
        $test = new API($this, static::$config);
        $test->post('/posts','[{"user_id":1,"category_id":1,"content":"tests"},{"user_id":1,"category_id":1,"content":"tests"}]');
        $test->expectAny();
        $test->get('/posts?columns=content&filter=content,eq,tests');
        $test->expect('{"posts":{"columns":["content"],"records":[["tests"],["tests"]]}}');
    }

    public function testListEvents()
    {
        $test = new API($this, static::$config);
        $test->get('/events?columns=datetime');
        $test->expect('{"events":{"columns":["datetime"],"records":[["2016-01-01 13:01:01"]]}}');
    }

    public function testIncrementEventVisitors()
    {
        $test = new API($this, static::$config);
        $test->patch('/events/1','{"visitors":11}');
        $test->expect('1');
        $test->get('/events/1');
        $test->expect('{"id":1,"name":"Launch","datetime":"2016-01-01 13:01:01","visitors":11}');
    }

    public function testIncrementEventVisitorsWithZero()
    {
        $test = new API($this, static::$config);
        $test->patch('/events/1','{"visitors":0}');
        $test->expect('1');
        $test->get('/events/1');
        $test->expect('{"id":1,"name":"Launch","datetime":"2016-01-01 13:01:01","visitors":11}');
    }

    public function testDecrementEventVisitors()
    {
        $test = new API($this, static::$config);
        $test->patch('/events/1','{"visitors":-5}');
        $test->expect('1');
        $test->get('/events/1');
        $test->expect('{"id":1,"name":"Launch","datetime":"2016-01-01 13:01:01","visitors":6}');
    }

    public function testListTagUsage()
    {
        $test = new API($this, static::$config);
        $test->get('/tag_usage');
        $test->expect('{"tag_usage":{"columns":["name","count"],"records":[["funny",2],["important",2]]}}');
    }

    public function testUpdateMultipleTags()
    {
        $test = new API($this, static::$config);
        $test->get('/tags?transform=1');
        $test->expect('{"tags":[{"id":1,"name":"funny"},{"id":2,"name":"important"}]}');
        $test->put('/tags/1,2','[{"name":"funny"},{"name":"important"}]');
        $test->expect('[1,1]');
    }

    public function testUpdateMultipleTagsTooManyIds()
    {
        $test = new API($this, static::$config);
        $test->put('/tags/1,2,3','[{"name":"funny!!!"},{"name":"important"}]');
        $test->expect(false,'Not found (subject)');
        $test->get('/tags?transform=1');
        $test->expect('{"tags":[{"id":1,"name":"funny"},{"id":2,"name":"important"}]}');
    }

    public function testUpdateMultipleTagsWithoutFields()
    {
        $test = new API($this, static::$config);
        $test->put('/tags/1,2','[{"name":"funny!!!"},{}]');
        $test->expect('null');
        $test->get('/tags?transform=1');
        $test->expect('{"tags":[{"id":1,"name":"funny"},{"id":2,"name":"important"}]}');
    }

    public function testDeleteMultipleTags()
    {
        $test = new API($this, static::$config);
        $test->post('/tags','[{"name":"extra"},{"name":"more"}]');
        $test->expect('[3,4]');
        $test->delete('/tags/3,4');
        $test->expect('[1,1]');
        $test->get('/tags?transform=1');
        $test->expect('{"tags":[{"id":1,"name":"funny"},{"id":2,"name":"important"}]}');
    }

    public function testListProducts()
    {
        $test = new API($this, static::$config);
        $test->get('/products?columns=id,name,price&transform=1');
        $test->expect('{"products":[{"id":1,"name":"Calculator","price":"23.01"}]}');
    }

    public function testListProductsProperties()
    {
        $test = new API($this, static::$config);
        $test->get('/products?columns=id,properties&transform=1');
        $test->expect('{"products":[{"id":1,"properties":{"depth":false,"model":"TRX-120","width":100,"height":null}}]}');
    }

    public function testReadProductProperties()
    {
        $test = new API($this, static::$config);
        $test->get('/products/1?columns=id,properties');
        $test->expect('{"id":1,"properties":{"depth":false,"model":"TRX-120","width":100,"height":null}}');
    }

    public function testWriteProductProperties()
    {
        $test = new API($this, static::$config);
        $test->put('/products/1','{"properties":{"depth":false,"model":"TRX-120","width":100,"height":123}}');
        $test->expect('1');
        $test->get('/products/1?columns=id,properties');
        $test->expect('{"id":1,"properties":{"depth":false,"model":"TRX-120","width":100,"height":123}}');
    }

    public function testAddProducts()
    {
        $test = new API($this, static::$config);
        $test->post('/products','{"name":"Laptop","price":"1299.99","properties":{}}');
        $test->expect('2');
        $test->get('/products/2');
        $test->expect('{"id":2,"name":"Laptop","price":"1299.99","properties":{},"created_at":"2013-12-11 10:09:08","deleted_at":null}');
    }

    public function testSoftDeleteProducts()
    {
        $test = new API($this, static::$config);
        $test->delete('/products/1,2');
        $test->expect('[1,1]');
        $test->get('/products?columns=id,deleted_at');
        $test->expect('{"products":{"columns":["id","deleted_at"],"records":[[1,"2013-12-11 11:10:09"],[2,"2013-12-11 11:10:09"]]}}');
    }

    public function testVarBinaryBarcodes()
    {
        $test = new API($this, static::$config);
        $test->get('/barcodes?transform=1');
        $test->expect('{"barcodes":[{"id":1,"product_id":1,"hex":"00ff01","bin":"AP8B"}]}');
    }
}
