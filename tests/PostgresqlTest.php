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
        $queries = preg_split('/;\s*\n/', file_get_contents($fixture));
        array_pop($queries);

        foreach ($queries as $i=>$query) {
            if (!pg_query($db, $query.';')) {
                $i++;
                die("Loading '$fixture' failed on statemement #$i with error:\n".print_r( pg_last_error($db), true)."\n");
            }
        }
    }
}
