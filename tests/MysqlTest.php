<?php

require_once(__DIR__ . '/Tests.php');

class MysqlTest extends Tests
{
    /**
     * Connects to the Database
     *
     * @return object Database connection
     */
    public function connect($config)
    {
        $db = mysqli_connect(
            $config['hostname'],
            $config['username'],
            $config['password'],
            $config['database']
        );

        if (mysqli_connect_errno()) {
            die("Connect failed: ".mysqli_connect_error()."\n");
        }

        mysqli_set_charset($db,'utf8');

        return $db;
    }

    /**
     * Disconnects from the Database
     *
     * @return boolean Success
     */
    public function disconnect($db)
    {
        return mysqli_close($db);
    }

    /**
     * Checks the version of the Database
     *
     * @return void
     */
    public function checkVersion($db)
    {
        $major = 5;
        $minor = 5;
        $version = mysqli_get_server_version($db);
        $v = array(floor($version/10000),floor(($version%10000)/100));
        if ($v[0]<$major || ($v[0]==$major && $v[1]<$minor)) {
            die("Detected MySQL $v[0].$v[1], but only $major.$minor and up are supported\n");
        }
    }

    /**
     * Gets the capabilities of the Database
     *
     * @return int Capabilites
     */
    public function getCapabilities($db)
    {
        $capabilities = 0;
        $version = mysqli_get_server_version($db);
        if ($version>=50600) {
            $capabilities |= self::GIS;
        }
        if ($version>=50700) {
            $capabilities |= self::JSON;
        }
        return $capabilities;
    }

    /**
     * Seeds the database for this connection
     *
     * @return void
     */
    public function seedDatabase($db, $capabilities)
    {
        $fixture = __DIR__.'/data/blog_mysql.sql';
        $contents = file_get_contents($fixture);

        if (!($capabilities & self::GIS)) {
            $contents = preg_replace('/(POINT|POLYGON) NOT NULL/i','text NOT NULL',$contents);
            $contents = preg_replace('/ST_GeomFromText/i','concat',$contents);
        }
        if (!($capabilities & self::JSON)) {
            $contents = preg_replace('/JSON NOT NULL/i','text NOT NULL',$contents);
        }

        $i=0;
        if (mysqli_multi_query($db, $contents)) {
            do { $i++; mysqli_next_result($db); } while (mysqli_more_results($db));
        }

        if (mysqli_errno($db)) {
            die("Loading '$fixture' failed on statemement #$i with error:\n".mysqli_error($db)."\n");
        }
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
