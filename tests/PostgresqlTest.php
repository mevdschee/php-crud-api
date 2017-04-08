<?php

require_once(__DIR__ . '/tests.php');

class PostgresqlTest extends PHP_CRUD_API_Test
{
    public static $gis_installed;
    public static $pg_server_version;

    public static function setUpBeforeClass()
    {
        static::setConfig('PostgreSQL');
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

        $e = function ($v) { return str_replace(array('\'','\\'),array('\\\'','\\\\'),$v); };
        $hostname = $e(static::$config['hostname']);
        $database = $e(static::$config['database']);
        $username = $e(static::$config['username']);
        $password = $e(static::$config['password']);
        $conn_string = "host='$hostname' dbname='$database' user='$username' password='$password' options='--client_encoding=UTF8'";

        $db = pg_connect($conn_string);

        if (!$db) {
            die("Connect failed: ". pg_last_error());
        }

        static::$pg_server_version = pg_version()['server'];
        $gisInstalled = self::isGisInstalled(
            pg_fetch_all(
                pg_query($db, "SELECT * FROM pg_extension;")
            )
        );
        $seed_file = self::getSeedFile();
        $queries = preg_split('/;\s*\n/', file_get_contents($seed_file));
        array_pop($queries);

        foreach ($queries as $i=>$query) {
            if (!pg_query($db, $query.';')) {
                $i++;
                die("Loading '$seed_file' failed on statemement #$i with error:\n".print_r( pg_last_error($db), true)."\n");
            }
        }

        pg_close($db);
    }

    /**
     * Gets the path to the seed file based on the version of Postgres and GIS extension
     *
     * @return string
     */
    protected function getSeedFile()
    {
        $filepath = __DIR__.'/data/blog_'.strtolower(static::$config['dbengine']);

        if (version_compare(static::$pg_server_version, '9.4.0') >= 0 ) {
            $filepath .= '_94';
        } elseif (version_compare(static::$pg_server_version, '9.2.0') >= 0 ) {
            $filepath .= '_92';
        } else {
            $filepath .= '_91';
        }
        if (static::$gis_installed) {
            $filepath .= '_gis';
        }
        return $filepath.'.sql';
    }

    /**
     * Determines whether the GIS extension is installed or not based on array of extensions.
     *
     * @return boolean
     */
    protected function isGisInstalled($extensions = [])
    {
        static::$gis_installed = false;
        if ($extensions) {
            foreach ($extensions as $extension) {
                if ($extension['extname'] === 'postgis') {
                    static::$gis_installed = true;
                    break;
                }
            }
        }
        return static::$gis_installed;
    }

    public function testSpatialFilterWithin()
    {
        if (!static::$gis_installed) {
            $this->markTestSkipped("Postgis not installed");
        }
        parent::testSpatialFilterWithin();
    }

    public function testListProductsProperties()
    {
        if (version_compare(static::$pg_server_version, '9.2.0') < 0) {
            $this->markTestSkipped("Postgres < 9.2.0 does not support JSON fields.");
        }
        parent::testListProductsProperties();
    }

    public function testReadProductProperties()
    {
        if (version_compare(static::$pg_server_version, '9.2.0') < 0) {
            $this->markTestSkipped("Postgres < 9.2.0 does not support JSON fields.");
        }
        parent::testReadProductProperties();
    }

    public function testWriteProductProperties()
    {
        if (version_compare(static::$pg_server_version, '9.2.0') < 0) {
            $this->markTestSkipped("Postgres < 9.2.0 does not support JSON fields.");
        }
        parent::testWriteProductProperties();
    }

    public function testListProducts()
    {
        parent::testListProducts();
    }

    public function testAddProducts()
    {
        if (version_compare(static::$pg_server_version, '9.2.0') < 0) {
            $this->markTestSkipped("Postgres < 9.2.0 does not support JSON fields.");
        }
        parent::testAddProducts();
    }

    public function testSoftDeleteProducts()
    {
        if (version_compare(static::$pg_server_version, '9.2.0') < 0) {
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
