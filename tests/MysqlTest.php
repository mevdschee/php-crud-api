<?php
namespace Mevdschee\PhpCrudApi\Tests;

class MysqlTest extends Tests
{
    /**
     * Gets the name of the database engine
     *
     * @return string Name of the database engine
     */
    public function getEngineName()
    {
        return 'MySQL';
    }

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

        mysqli_set_charset($db, 'utf8');

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
            $contents = preg_replace('/(POINT|POLYGON)( NOT)? NULL/i', 'text\2 NULL', $contents);
            $contents = preg_replace('/ST_GeomFromText/i', 'concat', $contents);
        }
        if (!($capabilities & self::JSON)) {
            $contents = preg_replace('/JSON NOT NULL/i', 'text NOT NULL', $contents);
        }

        $i=0;
        if (mysqli_multi_query($db, $contents)) {
            do {
                $i++;
                mysqli_next_result($db);
            } while (mysqli_more_results($db));
        }

        if (mysqli_errno($db)) {
            die("Loading '$fixture' failed on statemement #$i with error:\n".mysqli_error($db)."\n");
        }
    }
}
