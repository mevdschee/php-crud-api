<?php

require_once(__DIR__ . '/tests.php');

class MysqlTest extends PHP_CRUD_API_Test
{
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

        $fixture = __DIR__.'/data/blog_'.strtolower(static::$config['dbengine']).'.sql';

        $link = mysqli_connect(
            static::$config['hostname'],
            static::$config['username'],
            static::$config['password'],
            static::$config['database']
        );

        if (mysqli_connect_errno()) {
            die("Connect failed: ".mysqli_connect_error()."\n");
        }

        mysqli_set_charset($link,'utf8');

        $i=0;
        if (mysqli_multi_query($link, file_get_contents($fixture))) {
            do { $i++; mysqli_next_result($link); } while (mysqli_more_results($link));
        }
        if (mysqli_errno($link)) {
            die("Loading '$fixture' failed on statemement #$i with error:\n".mysqli_error($link)."\n");
        }

        mysqli_close($link);
    }
}
