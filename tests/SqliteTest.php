<?php

require_once(__DIR__ . '/tests.php');

class SqliteTest extends PHP_CRUD_API_Test
{
    public static function setUpBeforeClass()
    {
        self::setConfig('SQLite');
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

        $database = static::$config['database'];

        $fixture = __DIR__.'/data/blog_'.strtolower(static::$config['dbengine']).'.sql';

        $db = new SQLite3($database);

        if (!$db) {
            die("Could not open '$database' SQLite database: ".SQLite3::lastErrorMsg().' ('.SQLite3::lastErrorCode().")\n");
        }

        $queries = preg_split('/;\s*\n/', file_get_contents($fixture));
        array_pop($queries);

        foreach ($queries as $i=>$query) {
            if (!$db->query($query.';')) {
                $i++;
                die("Loading '$fixture' failed on statemement #$i with error:\n".$db->lastErrorCode().': '.$db->lastErrorMsg()."\n");
            }
        }

        $db->close();
    }
}
