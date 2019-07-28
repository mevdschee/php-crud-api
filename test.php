<?php

use Tqdev\PhpCrudApi\Api;
use Tqdev\PhpCrudApi\Config;
use Tqdev\PhpCrudApi\Database\GenericDB;
use Tqdev\PhpCrudApi\RequestFactory;
use Tqdev\PhpCrudApi\ResponseUtils;

require 'vendor/autoload.php';

function runDir(Config $config, string $dir, array $matches, string $category): array
{
    $success = 0;
    $total = 0;
    $entries = scandir($dir);
    foreach ($entries as $entry) {
        if ($entry === '.' || $entry === '..') {
            continue;
        }
        if (isset($matches[0])) {
            if (!preg_match('/' . $matches[0] . '/', $entry)) {
                continue;
            }
        }
        $file = "$dir/$entry";
        if (is_file($file)) {
            if (substr($entry, -4) != '.log') {
                continue;
            }
            $success += runTest($config, $file, $category);
            $total += 1;
        } elseif (is_dir($file)) {
            $statistics = runDir($config, $file, array_slice($matches, 1), "$category/$entry");
            $total += $statistics['total'];
            $success += $statistics['success'];
        }
    }
    $failed = $total - $success;
    return compact('total', 'success', 'failed');
}

function runTest(Config $config, string $file, string $category): int
{
    $title = ucwords(str_replace('_', ' ', $category)) . '/';
    $title .= ucwords(str_replace('_', ' ', substr(basename($file), 0, -4)));
    $line1 = "=====[$title]=====";
    $len = strlen($line1);
    $line2 = str_repeat("=", $len);
    $parts = preg_split('/^[=]+([\r\n]+|$)/m', file_get_contents($file));
    $dirty = false;
    $success = 1;
    for ($i = 0; $i < count($parts); $i += 2) {
        $recording = false;
        if (empty($parts[$i + 1])) {
            if (substr($parts[$i], -1) != "\n") {
                $parts[$i] .= "\n";
            }
            $parts[$i + 1] = '';
            $recording = true;
            $dirty = true;
        }
        $in = $parts[$i];
        $exp = $parts[$i + 1];
        $api = new Api($config);
        $_SERVER['REMOTE_ADDR'] = 'TEST_IP';
        $out = ResponseUtils::toString($api->handle(RequestFactory::fromString($in)));
        if ($recording) {
            $parts[$i + 1] = $out;
        } else if ($out != $exp) {
            echo "$line1\n$exp\n$line2\n$out\n$line2\n";
            $success = 0;
        }
    }
    if ($dirty) {
        file_put_contents($file, implode("===\n", $parts));
    }
    return $success;
}

function getDatabase(Config $config)
{
    if (!isset($config->getMiddlewares()['reconnect']['databaseHandler'])) {
        return $config->getDatabase();
    }
    return $config->getMiddlewares()['reconnect']['databaseHandler']();
}

function getUsername(Config $config)
{
    if (!isset($config->getMiddlewares()['reconnect']['usernameHandler'])) {
        return $config->getUsername();
    }
    return $config->getMiddlewares()['reconnect']['usernameHandler']();
}

function getPassword(Config $config)
{
    if (!isset($config->getMiddlewares()['reconnect']['passwordHandler'])) {
        return $config->getPassword();
    }
    return $config->getMiddlewares()['reconnect']['passwordHandler']();
}


function loadFixture(string $dir, Config $config)
{
    $driver = $config->getDriver();
    $filename = "$dir/fixtures/blog_$driver.sql";
    $file = file_get_contents($filename);
    $db = new GenericDB(
        $config->getDriver(),
        $config->getAddress(),
        $config->getPort(),
        getDatabase($config),
        getUsername($config),
        getPassword($config)
    );
    $pdo = $db->pdo();
    $file = preg_replace('/--.*$/m', '', $file);
    if ($driver == 'sqlsrv') {
        $statements = preg_split('/\n\s*GO\s*\n/s', $file);
    } else {
        $statements = preg_split('/(?<=;)\n/s', $file);
    }
    foreach ($statements as $i => $statement) {
        $statement = trim($statement);
        if ($statement) {
            try {
                $pdo->exec($statement);
            } catch (\PDOException $e) {
                $error = print_r($pdo->errorInfo(), true);
                $statement = var_export($statement, true);
                echo "Loading '$filename' failed on statemement #$i:\n$statement\nwith error:\n$error\n";
                exit(1);
            }
        }
    }
}

function run(array $drivers, string $dir, array $matches)
{
    foreach ($drivers as $driver) {
        if (isset($matches[0])) {
            if (!preg_match('/' . $matches[0] . '/', $driver)) {
                continue;
            }
        }
        if (!extension_loaded("pdo_$driver")) {
            echo sprintf("%s: skipped, driver not loaded\n", $driver);
            continue;
        }
        $settings = [];
        include "$dir/config/base.php";
        include sprintf("$dir/config/%s.php", $driver);
        $config = new Config($settings);
        loadFixture($dir, $config);
        $start = microtime(true);
        $stats = runDir($config, "$dir/functional", array_slice($matches, 1), '');
        $end = microtime(true);
        $time = ($end - $start) * 1000;
        $total = $stats['total'];
        $failed = $stats['failed'];
        echo sprintf("%s: %d tests ran in %d ms, %d failed\n", $driver, $total, $time, $failed);
    }
}

run(['mysql', 'pgsql', 'sqlsrv'], __DIR__ . '/tests', array_slice($argv, 1));
