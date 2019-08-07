<?php

function removeIgnored(string $dir, array &$entries, array $ignore)
{
    foreach ($entries as $i => $entry) {
        if (isset($ignore[$dir . '/' . $entry])) {
            unset($entries[$i]);
        }
    }
}

function runDir(string $base, string $dir, array &$lines, array $ignore): int
{
    $count = 0;
    $entries = scandir($dir);
    removeIgnored($dir, $entries, $ignore);
    sort($entries);
    foreach ($entries as $entry) {
        if ($entry === '.' || $entry === '..') {
            continue;
        }
        $filename = "$base/$dir/$entry";
        if (is_dir($filename)) {
            $count += runDir($base, "$dir/$entry", $lines, $ignore);
        }
    }
    foreach ($entries as $entry) {
        $filename = "$base/$dir/$entry";
        if (is_file($filename)) {
            if (substr($entry, -4) != '.php') {
                continue;
            }
            $data = file_get_contents($filename);
            $data = preg_replace('/\s*<\?php\s+/s', '', $data, 1);
            $data = preg_replace('/^.*?(vendor\/autoload|declare\s*\(\s*strict_types\s*=\s*1).*?$/m', '', $data);
            array_push($lines, "// file: $dir/$entry");
            if (!preg_match('/^\s*(namespace[^;]*);/', $data)){
                $data = "namespace;\n".$data;
            }
            foreach (explode("\n", trim($data)) as $line) {
                if ($line) {
                    $line = '    ' . $line;
                }
                $line = preg_replace('/^\s*(namespace[^;]*);/', '\1 {', $line);
                array_push($lines, $line);
            }
            array_push($lines, '}');
            array_push($lines, '');
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

EOF;
    foreach (explode("\n", $head) as $line) {
        array_push($lines, $line);
    }
}

function run(string $base, array $dirs, string $filename, array $ignore)
{
    $lines = [];
    $start = microtime(true);
    addHeader($lines);
    $ignore = array_flip($ignore);
    $count = 0;
    foreach ($dirs as $dir) {
        $count += runDir($base, $dir, $lines, $ignore);
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
    'vendor/nyholm/psr7/src/Factory/HttplugFactory.php',
];

run(__DIR__, ['vendor/psr', 'vendor/nyholm', 'src'], 'api.php', $ignore);
