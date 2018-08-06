<?php

function runDir(String $base, String $dir, array &$lines): int
{
    $count = 0;
    $entries = scandir($dir);
    sort($entries);
    foreach ($entries as $entry) {
        if ($entry === '.' || $entry === '..') {
            continue;
        }
        $filename = "$base/$dir/$entry";
        if (is_dir($filename)) {
            $count += runDir($base, "$dir/$entry", $lines);
        }
    }
    foreach ($entries as $entry) {
        $filename = "$base/$dir/$entry";
        if (is_file($filename)) {
            if (substr($entry, -4) != '.php') {
                continue;
            }
            $data = file_get_contents($filename);
            array_push($lines, "// file: $dir/$entry");
            foreach (explode("\n", $data) as $line) {
                if (!preg_match('/^<\?php|^namespace |^use |spl_autoload_register|^\s*\/\//', $line)) {
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
 **/

namespace Tqdev\PhpCrudApi;

EOF;
    foreach (explode("\n", $head) as $line) {
        array_push($lines, $line);
    }
}

function run(String $base, String $dir, String $filename)
{
    $lines = [];
    $start = microtime(true);
    addHeader($lines);
    $count = runDir($base, $dir, $lines);
    $data = implode("\n", $lines);
    $data = preg_replace('/\n\s*\n\s*\n/', "\n\n", $data);
    file_put_contents('tmp_' . $filename, $data);
    ob_start();
    include 'tmp_' . $filename;
    ob_end_clean();
    rename('tmp_' . $filename, $filename);
    $end = microtime(true);
    $time = ($end - $start) * 1000;
    echo sprintf("%d files combined in %d ms into '%s'\n", $count, $time, $filename);
}

run(__DIR__, 'src', 'api.php');
