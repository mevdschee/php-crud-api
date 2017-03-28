<?php

require_once(__DIR__ . '/tests.php');

class PostgresqlTest extends PHP_CRUD_API_Test
{
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

        $fixture = __DIR__.'/data/blog_'.strtolower(static::$config['dbengine']).'.sql';

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
