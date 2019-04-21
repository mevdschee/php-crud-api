<?php
if (!file_exists('vendor')) {
    include 'install.php';
}

function removeIgnored(string $dir, array &$entries, array $ignore)
{
    foreach ($entries as $i => $entry) {
        if (isset($ignore[$dir . '/' . $entry])) {
            unset($entries[$i]);
        }
    }
}

function prioritySort(string $dir, array &$entries, array $priority)
{
    $first = array();
    foreach ($entries as $i => $entry) {
        if (isset($priority[$dir . '/' . $entry])) {
            array_push($first, $entry);
            unset($entries[$i]);
        }
    }
    sort($entries);
    foreach ($first as $entry) {
        array_unshift($entries, $entry);
    }
}

function runDir(string $base, string $dir, array &$lines, array $ignore, array $priority): int
{
    $count = 0;
    $entries = scandir($dir);
    removeIgnored($dir, $entries, $ignore);
    prioritySort($dir, $entries, $priority);
    foreach ($entries as $entry) {
        if ($entry === '.' || $entry === '..') {
            continue;
        }
        $filename = "$base/$dir/$entry";
        if (is_dir($filename)) {
            $count += runDir($base, "$dir/$entry", $lines, $ignore, $priority);
        }
    }
    foreach ($entries as $entry) {
        $filename = "$base/$dir/$entry";
        if (is_file($filename)) {
            if (substr($entry, -4) != '.php') {
                continue;
            }
            $data = file_get_contents($filename);
            $data = preg_replace('|/\*\*.*?\*/|s', '', $data);
            array_push($lines, "// file: $dir/$entry");
            foreach (explode("\n", $data) as $line) {
                if (!preg_match('/^<\?php|^namespace |^use |vendor\/autoload|declare\s*\(\s*strict_types\s*=\s*1|^\s*\/\//', $line)) {
                    array_push($lines, $line);
                }
            }
            $count++;
        }
    }
    return $count;
}

function addHeader(array &$lines)
{
    $head = <<<EOF
<?php
/**
 * PHP-CRUD-API v2              License: MIT
 * Maurits van der Schee: maurits@vdschee.nl
 * https://github.com/mevdschee/php-crud-api
 *
 * Dependencies:
 * - vendor/psr/*: PHP-FIG
 *   https://github.com/php-fig
 * - vendor/nyholm/*: Tobias Nyholm
 *   https://github.com/Nyholm
 **/

namespace Tqdev\PhpCrudApi;

EOF;
    foreach (explode("\n", $head) as $line) {
        array_push($lines, $line);
    }
}

function run(string $base, array $dirs, string $filename, array $ignore, array $priority)
{
    $lines = [];
    $start = microtime(true);
    addHeader($lines);
    $ignore = array_flip($ignore);
    $priority = array_flip($priority);
    $count = 0;
    foreach ($dirs as $dir) {
        $count += runDir($base, $dir, $lines, $ignore, $priority);
    }
    $data = implode("\n", $lines);
    $data = preg_replace('/\n({)?\s*\n\s*\n/', "\n$1\n", $data);
    file_put_contents('tmp_' . $filename, $data);
    ob_start();
    include 'tmp_' . $filename;
    ob_end_clean();
    rename('tmp_' . $filename, $filename);
    $end = microtime(true);
    $time = ($end - $start) * 1000;
    echo sprintf("%d files combined in %d ms into '%s'\n", $count, $time, $filename);
}

$ignore = [
    'vendor/autoload.php',
    'vendor/composer',
    'vendor/php-http',
    'vendor/nyholm/psr7/src/Factory/HttplugFactory.php',
];

$priority = [
    'vendor/psr',
];

run(__DIR__, ['vendor', 'src'], 'api.php', $ignore, $priority);
