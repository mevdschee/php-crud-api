<?php

require_once(__DIR__ . '/Tests.php');

class SqlServerTest extends Tests
{
    /**
     * Connects to the Database
     *
     * @return object Database connection
     */
    public function connect($config)
    {
        $connectionInfo = array(
            'UID' => $config['username'],
            'PWD' => $config['password'],
            'Database' => $config['database'],
            'CharacterSet' => 'UTF-8',
        );

        $db = sqlsrv_connect($config['hostname'], $connectionInfo);

        if (!$db) {
            die("Connect failed: ".print_r( sqlsrv_errors(), true));
        }

        return $db;
    }

    /**
     * Disconnects from the Database
     *
     * @return boolean Success
     */
    public function disconnect($db)
    {
        return sqlsrv_close($db);
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
        $version = sqlsrv_server_info($db);
        $v = explode('.',$version['SQLServerVersion']);
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
        return self::GIS;
    }


    /**
     * Seeds the database for this connection
     *
     * @return void
     */
    public function seedDatabase($db, $capabilities)
    {
        $fixture = __DIR__.'/data/blog_sqlserver.sql';

        $queries = preg_split('/\n\s*GO\s*\n/', file_get_contents($fixture));
        array_pop($queries);

        foreach ($queries as $i=>$query) {
            if (!sqlsrv_query($db, $query)) {
                $i++;
                die("Loading '$fixture' failed on statemement #$i with error:\n".print_r( sqlsrv_errors(), true)."\n");
            }
        }
    }
}
