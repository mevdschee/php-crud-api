<?php

require_once(__DIR__ . '/tests.php');

class MysqlTest extends PHP_CRUD_API_Test
{
    const MYSQL_56 = 50600;
    const MYSQL_57 = 50700;
    public static $mysql_version;

    public static function setUpBeforeClass()
    {
        self::setConfig('MySQL');
        self::seedDatabase();
    }

    /**
     * Seeds the database for this connection
     *
     * @return void
     */
    public function seedDatabase()
    {
        if (static::$config['database']=='{{test_database}}') {
            die("Configure database in 'config.php' before running tests.\n");
        }

        $link = mysqli_connect(
            static::$config['hostname'],
            static::$config['username'],
            static::$config['password'],
            static::$config['database']
        );

        if (mysqli_connect_errno()) {
            die("Connect failed: ".mysqli_connect_error()."\n");
        }

        // Note: For some reason this version is formatted:
        // $mysql_version = main_version * 10000 + minor_version * 100 + sub_version
        static::$mysql_version = mysqli_get_server_version($link);
        $seed_file = self::getSeedFile();

        mysqli_set_charset($link,'utf8');

        $i=0;
        if (mysqli_multi_query($link, file_get_contents($seed_file))) {
            do { $i++; mysqli_next_result($link); } while (mysqli_more_results($link));
        }
        if (mysqli_errno($link)) {
            die("Loading '$seed_file' failed on statemement #$i with error:\n".mysqli_error($link)."\n");
        }

        mysqli_close($link);
    }

    /**
     * Gets the path to the seed file based on the version of MySQL
     *
     * @return string
     */
    protected static function getSeedFile()
    {
        if (static::$mysql_version >= self::MYSQL_57) {
            return __DIR__.'/data/blog_'.strtolower(static::$config['dbengine']).'_57.sql';
        } elseif (static::$mysql_version >= self::MYSQL_56) {
            return __DIR__.'/data/blog_'.strtolower(static::$config['dbengine']).'_56.sql';
        }
        return __DIR__.'/data/blog_'.strtolower(static::$config['dbengine']).'_55.sql';
    }

    public function testHidingPasswordColumn()
    {
        parent::testHidingPasswordColumn();
    }

    public function testMissingIntermediateTable()
    {
        $test = new API($this, static::$config);
        $test->get('/users?include=posts,tags');
        $test->expect('{"users":{"columns":["id","username","location"],"records":[[1,"user1",null]]},"posts":{"relations":{"user_id":"users.id"},"columns":["id","user_id","category_id","content"],"records":[[1,1,1,"blog started"],[2,1,2,"It works!"]]},"post_tags":{"relations":{"post_id":"posts.id"},"columns":["id","post_id","tag_id"],"records":[[1,1,1],[2,1,2],[3,2,1],[4,2,2]]},"tags":{"relations":{"id":"post_tags.tag_id"},"columns":["id","name"],"records":[[1,"funny"],[2,"important"]]}}');
    }

    public function testEditUserPassword()
    {
        parent::testEditUserPassword();
    }

    public function testEditUserLocation()
    {
        parent::testEditUserLocation();
    }

    public function testListUserLocations()
    {
        parent::testListUserLocations();
    }

    public function testEditUserWithId()
    {
        parent::testEditUserWithId();
    }

    public function testReadOtherUser()
    {
        parent::testReadOtherUser();
    }

    public function testEditOtherUser()
    {
        parent::testEditOtherUser();
    }

    public function testSpatialFilterWithin()
    {
        if (static::$mysql_version < self::MYSQL_56) {
            $this->markTestSkipped("MySQL < 5.6 does not support JSON fields.");
        }
        parent::testSpatialFilterWithin();
    }


    public function testListProductsProperties()
    {
        if (static::$mysql_version < self::MYSQL_57) {
            $this->markTestSkipped("MySQL < 5.7 does not support JSON fields.");
        }
        parent::testListProductsProperties();
    }

    public function testReadProductProperties()
    {
        if (static::$mysql_version < self::MYSQL_57) {
            $this->markTestSkipped("MySQL < 5.7 does not support JSON fields.");
        }
        parent::testReadProductProperties();
    }

    public function testWriteProductProperties()
    {
        if (static::$mysql_version < self::MYSQL_57) {
            $this->markTestSkipped("MySQL < 5.7 does not support JSON fields.");
        }
        parent::testWriteProductProperties();
    }

    public function testListProducts()
    {
        parent::testListProducts();
    }

    public function testAddProducts()
    {
        if (static::$mysql_version < self::MYSQL_57) {
            $this->markTestSkipped("MySQL < 5.7 does not support JSON fields.");
        }
        parent::testAddProducts();
    }

    public function testSoftDeleteProducts()
    {
        if (static::$mysql_version < self::MYSQL_57) {
            $test = new API($this, static::$config);
            $test->delete('/products/1');
            $test->expect('1');
            $test->get('/products?columns=id,deleted_at');
            $test->expect('{"products":{"columns":["id","deleted_at"],"records":[[1,"2013-12-11 11:10:09"]]}}');
        } else {
            parent::testSoftDeleteProducts();
        }
    }

}
