<?php

require_once(__DIR__ . '/Tests.php');

class PostgresqlTest extends Tests
{
    /**
     * Connects to the Database
     *
     * @return object Database connection
     */
    public function connect($config)
    {
        $e = function ($v) { return str_replace(array('\'','\\'),array('\\\'','\\\\'),$v); };
        $hostname = $e($config['hostname']);
        $database = $e($config['database']);
        $username = $e($config['username']);
        $password = $e($config['password']);
        $connectionString = "host='$hostname' dbname='$database' user='$username' password='$password' options='--client_encoding=UTF8'";

        return pg_connect($connectionString);
    }

    /**
     * Disconnects from the Database
     *
     * @return boolean Success
     */
    public function disconnect($db)
    {
        return pg_close($db);
    }

    /**
     * Checks the version of the Database
     *
     * @return void
     */
    public function checkVersion($db)
    {
        $major = 9;
        $minor = 1;
        $version = pg_version();
        $v = explode('.',$version['server']);
        if ($v[0]<$major || ($v[0]==$major && $v[1]<$minor)) {
            die("Detected PostgreSQL $v[0].$v[1], but only $major.$minor and up are supported\n");
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
        $major = 9;
        $minor = 4;
        $version = pg_version();
        $v = explode('.',$version['server']);
        if ($v[0]>$major || ($v[0]==$major && $v[1]>=$minor)) {
            $capabilities |= self::JSON;
        }
        $extensions = pg_fetch_all(pg_query($db, "SELECT * FROM pg_extension;"));
        foreach ($extensions as $extension) {
          if ($extension['extname'] === 'postgis') {
            $capabilities |= self::GIS;
          }
        }
        return $capabilities;
    }

    /**
     * Seeds the database for this connection
     *
     * @return void
     */
    public function seedDatabase($db,$capabilities)
    {
        $fixture = __DIR__.'/data/blog_postgresql.sql';
        $contents = file_get_contents($fixture);

        if (!($capabilities & self::GIS)) {
            $contents = preg_replace('/(geometry) NOT NULL/i','text NOT NULL',$contents);
            $contents = preg_replace('/ST_GeomFromText/i','concat',$contents);
        }
        if (!($capabilities & self::JSON)) {
            $contents = preg_replace('/JSONB? NOT NULL/i','text NOT NULL',$contents);
        }

        $queries = preg_split('/;\s*\n/', $contents);
        array_pop($queries);

        foreach ($queries as $i=>$query) {
            if (!pg_query($db, $query.';')) {
                $i++;
                die("Loading '$seed_file' failed on statemement #$i with error:\n".print_r( pg_last_error($db), true)."\n");
            }
        }
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
