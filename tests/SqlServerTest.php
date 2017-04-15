<?php
namespace Mevdschee\PhpCrudApi\Tests;

class SqlServerTest extends Tests
{
    /**
     * Gets the name of the database engine
     *
     * @return string Name of the database engine
     */
    public function getEngineName()
    {
        return 'SQLServer';
    }

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
            die("Connect failed: ".print_r(sqlsrv_errors(), true));
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
        $major = 11;
        $minor = 0;
        $build = 3000;
        $version = sqlsrv_server_info($db);
        $v = explode('.', $version['SQLServerVersion']);
        if ($v[0]<$major || ($v[0]==$major && $v[1]<$minor) || ($v[0]==$major && $v[1]==$minor && $v[2]<$build)) {
            die("Detected SQL Server $v[0].$v[1].$v[2], but only $major.$minor.$build and up are supported\n");
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
        $capabilities |= self::JSON;
        $capabilities |= self::GIS;
        return $capabilities;
    }


    /**
     * Seeds the database for this connection
     *
     * @return void
     */
    public function seedDatabase($db, $capabilities)
    {
        $fixture = __DIR__.'/data/blog_sqlserver.sql';
        $contents = file_get_contents($fixture);

        $queries = preg_split('/\n\s*GO\s*\n/', $contents);
        array_pop($queries);

        foreach ($queries as $i=>$query) {
            if (!sqlsrv_query($db, $query)) {
                $i++;
                die("Loading '$fixture' failed on statemement #$i with error:\n".print_r(sqlsrv_errors(), true)."\n");
            }
        }
    }
}
