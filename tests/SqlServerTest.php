<?php

require_once(__DIR__ . '/tests.php');

class SqlServerTest extends PHP_CRUD_API_Test
{
    public static function setUpBeforeClass()
    {
        self::setConfig('SQLServer');

        if (static::$config['database']=='{{test_database}}') {
            die("Configure database in 'config.php' before running tests.\n");
        }

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

        $connectionInfo = array(
            'UID' => static::$config['username'],
            'PWD' => static::$config['password'],
            'Database' => static::$config['database'],
            'CharacterSet' => 'UTF-8',
        );

        $conn = sqlsrv_connect(static::$config['hostname'], $connectionInfo);

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
    }
}
