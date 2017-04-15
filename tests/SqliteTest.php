<?php

require_once(__DIR__ . '/Tests.php');

class SqliteTest extends Tests
{
    /**
     * Connects to the Database
     *
     * @return object Database connection
     */
    public function connect($config)
    {
        $db = new SQLite3($config['database']);

        if (!$db) {
            die("Could not open '$database' SQLite database: ".SQLite3::lastErrorMsg().' ('.SQLite3::lastErrorCode().")\n");
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
        return $db->close();
    }

    /**
     * Checks the version of the Database
     *
     * @return void
     */
    public function checkVersion($db)
    {
        $major = 3;
        $minor = 0;
        $version = SQLite3::version();
        $v = explode('.',$version['versionString']);
        if ($v[0]<$major || ($v[0]==$major && $v[1]<$minor)) {
            die("Detected SQLite $v[0].$v[1], but only $major.$minor and up are supported\n");
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
        return $capabilities;
    }

    /**
     * Seeds the database for this connection
     *
     * @return void
     */
    public function seedDatabase($db, $capabilities)
    {
        $fixture = __DIR__.'/data/blog_sqlite.sql';
        $contents = file_get_contents($fixture);

        $queries = preg_split('/;\s*\n/', $contents);
        array_pop($queries);

        foreach ($queries as $i=>$query) {
            if (!$db->query($query.';')) {
                $i++;
                die("Loading '$fixture' failed on statemement #$i with error:\n".$db->lastErrorCode().': '.$db->lastErrorMsg()."\n");
            }
        }
    }
}