<?php

use Tqdev\PhpCrudApi\Api;
use Tqdev\PhpCrudApi\Config\Config;
use Tqdev\PhpCrudApi\Database\GenericDB;
use Tqdev\PhpCrudApi\RequestFactory;
use Tqdev\PhpCrudApi\ResponseUtils;

error_reporting(-1);
require 'api.include.php';

function runDir(Config $config, string $dir, array $matches, string $category, bool $record): array
{
    $success = 0;
    $skipped = 0;
    $failed = 0;
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
            $statistics = runTest($config, $file, $category, $record);
            $success += $statistics['success'];
            $skipped += $statistics['skipped'];
            $failed += $statistics['failed'];
        } elseif (is_dir($file)) {
            $statistics = runDir($config, $file, array_slice($matches, 1), "$category/$entry", $record);
            $success += $statistics['success'];
            $skipped += $statistics['skipped'];
            $failed += $statistics['failed'];
        }
    }
    return compact('success', 'skipped', 'failed');
}

function runTest(Config $config, string $file, string $category, bool $record): array
{
    $success = 1;
    $skipped = 0;
    $failed = 0;
    $title = ucwords(str_replace('_', ' ', $category)) . '/';
    $title .= ucwords(str_replace('_', ' ', substr(basename($file), 0, -4)));
    $line1 = "=====[$title]=====";
    $len = strlen($line1);
    $line2 = str_repeat("=", $len);
    $parts = preg_split('/^[=]+([\r\n]+|$)/m', file_get_contents($file));
    $headers = explode("\n", $parts[0]);
    $driver = $config->getDriver();
    foreach ($headers as $header) {
        if (!strpos($header, ':')) {
            continue;
        }
        list($key, $value) = explode(':', strtolower($header));
        if ($key == "skip-for-$driver") {
            $skipped = 1;
            $success = 0;
        }
        if ($key == "skip-always") {
            $skipped = 1;
            $success = 0;
        }
    }
    if (!$skipped) {
        $dirty = false;
        for ($i = 1; $i < count($parts); $i += 2) {
            $recording = false;
            if ($record || empty($parts[$i + 1])) {
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
            $out = ResponseUtils::toString($api->handle(RequestFactory::fromString($in)));
            if ($recording) {
                $parts[$i + 1] = $out;
            } else if ($out != $exp) {
                echo "$line1\n$exp\n$line2\n$out\n$line2\n";
                $failed = 1;
                $success = 0;
            }
        }
        if ($dirty) {
            file_put_contents($file, implode("===\n", $parts));
        }
    }
    return compact('success', 'skipped', 'failed');
}

function getDatabase(Config $config)
{
    if (!is_callable($config->getProperty('reconnect.databaseHandler'))) {
        return $config->getDatabase();
    }
    return $config->getProperty('reconnect.databaseHandler')();
}

function getCommand(Config $config)
{
    if (!is_callable($config->getProperty('reconnect.commandHandler'))) {
        return $config->getCommand();
    }
    return $config->getProperty('reconnect.commandHandler')();
}

function getTables(Config $config)
{
    if (!is_callable($config->getProperty('reconnect.tablesHandler'))) {
        return $config->getTables();
    }
    return $config->getProperty('reconnect.tablesHandler')();
}

function getMapping(Config $config)
{
    if (!is_callable($config->getProperty('reconnect.mappingHandler'))) {
        return $config->getMapping();
    }
    return $config->getProperty('reconnect.mappingHandler')();
}

function getUsername(Config $config)
{
    if (!is_callable($config->getProperty('reconnect.usernameHandler'))) {
        return $config->getUsername();
    }
    return $config->getProperty('reconnect.usernameHandler')();
}

function getPassword(Config $config)
{
    if (!is_callable($config->getProperty('reconnect.passwordHandler'))) {
        return $config->getPassword();
    }
    return $config->getProperty('reconnect.passwordHandler')();
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
        getCommand($config),
        getTables($config),
        getMapping($config),
        getUsername($config),
        getPassword($config),
        $config->getGeometrySrid()
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

function collectReferences($node, string $path, array &$references) /*: void*/
{
    if (!is_array($node)) {
        return;
    }
    foreach ($node as $key => $value) {
        if ($key === '$ref' && is_string($value)) {
            $references[$value][] = $path;
        } else {
            collectReferences($value, "$path/$key", $references);
        }
    }
}

function resolveReference(array $document, string $reference)
{
    if (substr($reference, 0, 2) != '#/') {
        return null;
    }
    $node = $document;
    foreach (explode('/', substr($reference, 2)) as $part) {
        $part = str_replace(array('~1', '~0'), array('/', '~'), $part);
        if (!is_array($node) || !array_key_exists($part, $node)) {
            return null;
        }
        $node = $node[$part];
    }
    return $node;
}

function lintOperation(array $document, string $path, string $method, array $operation, array $declaredTags, array &$operationIds): array
{
    $errors = array();
    $location = "$method $path";
    $pathParameters = array();
    $parameters = isset($operation['parameters']) ? $operation['parameters'] : array();
    foreach ($parameters as $parameter) {
        if (isset($parameter['$ref'])) {
            $parameter = resolveReference($document, $parameter['$ref']);
        }
        if (!is_array($parameter) || !isset($parameter['name']) || !isset($parameter['in'])) {
            $errors[] = "a parameter of '$location' has no name or no location";
            continue;
        }
        if (!in_array($parameter['in'], array('query', 'header', 'path', 'cookie'))) {
            $errors[] = sprintf("parameter '%s' of '%s' has unknown location '%s'", $parameter['name'], $location, $parameter['in']);
        }
        if ($parameter['in'] == 'path') {
            $pathParameters[] = $parameter['name'];
            if (empty($parameter['required'])) {
                $errors[] = sprintf("path parameter '%s' of '%s' is not marked required", $parameter['name'], $location);
            }
        }
    }
    preg_match_all('/\{([^}]*)\}/', $path, $matches);
    foreach ($matches[1] as $name) {
        if (!in_array($name, $pathParameters)) {
            $errors[] = sprintf("'%s' has no path parameter for '{%s}'", $location, $name);
        }
    }
    $responses = isset($operation['responses']) ? $operation['responses'] : array();
    if (!$responses) {
        $errors[] = "'$location' has no responses";
    }
    foreach ($responses as $status => $response) {
        if (isset($response['$ref'])) {
            $response = resolveReference($document, $response['$ref']);
        }
        if (!is_array($response) || !isset($response['description'])) {
            $errors[] = "response '$status' of '$location' has no description";
        }
    }
    foreach (isset($operation['tags']) ? $operation['tags'] : array() as $name) {
        if (!isset($declaredTags[$name])) {
            $errors[] = "'$location' uses tag '$name' that is not declared";
        }
    }
    if (!isset($operation['operationId'])) {
        $errors[] = "'$location' has no operationId";
        return $errors;
    }
    $operationId = $operation['operationId'];
    if (isset($operationIds[$operationId])) {
        $errors[] = sprintf("operationId '%s' is used by both '%s' and '%s'", $operationId, $operationIds[$operationId], $location);
    }
    $operationIds[$operationId] = $location;
    return $errors;
}

function lintDocument(array $document): array
{
    $errors = array();
    foreach (array('openapi', 'info', 'paths') as $key) {
        if (!isset($document[$key])) {
            $errors[] = "the document has no '$key'";
        }
    }
    if ($errors) {
        return $errors;
    }
    if (!preg_match('/^3\.[01]\.\d+$/', $document['openapi'])) {
        $errors[] = sprintf("'%s' is not a supported openapi version", $document['openapi']);
    }
    foreach (array('title', 'version') as $key) {
        if (!isset($document['info'][$key])) {
            $errors[] = "the document has no 'info.$key'";
        }
    }
    foreach (isset($document['servers']) ? $document['servers'] : array() as $i => $server) {
        if (!isset($server['url']) || $server['url'] === '') {
            $errors[] = "server $i has no url";
        }
    }
    foreach (isset($document['components']) ? $document['components'] : array() as $section => $items) {
        foreach (array_keys($items) as $key) {
            if (!preg_match('/^[a-zA-Z0-9._-]+$/', (string) $key)) {
                $errors[] = "key of 'components/$section/$key' has characters that are not allowed";
            }
        }
    }
    $references = array();
    collectReferences($document, '', $references);
    foreach ($references as $reference => $usages) {
        if (resolveReference($document, $reference) === null) {
            $errors[] = sprintf("reference '%s' used in '%s' cannot be resolved", $reference, $usages[0]);
        }
    }
    $declaredTags = array();
    foreach (isset($document['tags']) ? $document['tags'] : array() as $tag) {
        $name = isset($tag['name']) ? $tag['name'] : '';
        if ($name === '') {
            $errors[] = "the document declares a tag without a name";
            continue;
        }
        if (isset($declaredTags[$name])) {
            $errors[] = "tag '$name' is declared more than once";
        }
        $declaredTags[$name] = true;
    }
    $methods = array('get', 'put', 'post', 'delete', 'options', 'head', 'patch', 'trace');
    $operationIds = array();
    foreach ($document['paths'] as $path => $item) {
        if (substr($path, 0, 1) != '/') {
            $errors[] = "path '$path' does not start with a slash";
        }
        foreach ($item as $method => $operation) {
            if (!in_array($method, $methods)) {
                continue;
            }
            $errors = array_merge($errors, lintOperation($document, $path, $method, $operation, $declaredTags, $operationIds));
        }
    }
    return $errors;
}

function runLint(Config $config): array
{
    $success = 1;
    $skipped = 0;
    $failed = 0;
    if (!in_array('openapi', $config->getControllers())) {
        return array('success' => 0, 'skipped' => 1, 'failed' => 0);
    }
    $api = new Api($config);
    $response = $api->handle(RequestFactory::fromString("GET /openapi\n"));
    $document = json_decode((string) $response->getBody(), true);
    $errors = is_array($document) ? lintDocument($document) : array('the document is not valid json');
    if ($errors) {
        $line = "=====[OpenApi/Lint]=====";
        echo "$line\n" . implode("\n", $errors) . "\n" . str_repeat('=', strlen($line)) . "\n";
        $success = 0;
        $failed = 1;
    }
    return compact('success', 'skipped', 'failed');
}

function run(array $drivers, string $dir, array $matches, bool $record)
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
        $statistics = runDir($config, "$dir/functional", array_slice($matches, 1), '', $record);
        $lint = runLint($config);
        foreach (array('success', 'skipped', 'failed') as $key) {
            $statistics[$key] += $lint[$key];
        }
        $end = microtime(true);
        $time = ($end - $start) * 1000;
        $success = $statistics['success'];
        $skipped = $statistics['skipped'];
        $failed = $statistics['failed'];
        $total = $success + $skipped + $failed;
        echo sprintf("%s: %d tests ran in %d ms, %d skipped, %d failed\n", $driver, $total, $time, $skipped, $failed);
    }
}

$arguments = array_slice($argv, 1);
$record = in_array('--record', $arguments);
$arguments = array_values(array_filter($arguments, function ($argument) {
    return substr($argument, 0, 2) != '--';
}));

run(['mysql', 'pgsql', 'sqlsrv', 'sqlite'], __DIR__ . '/tests', $arguments, $record);
