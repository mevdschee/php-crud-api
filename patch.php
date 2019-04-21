<?php

function runDir(string $base, string $dir): int
{
    $count = 0;
    $entries = scandir($dir);
    foreach ($entries as $entry) {
        if ($entry === '.' || $entry === '..') {
            continue;
        }
        $filename = "$base/$dir/$entry";
        if (is_dir($filename)) {
            $count += runDir($base, "$dir/$entry");
        }
    }
    foreach ($entries as $entry) {
        $filename = "$base/$dir/$entry";
        if (is_file($filename)) {
            if (substr($entry, -4) != '.php') {
                continue;
            }
            $patched = $original = file_get_contents($filename);
            $patched = preg_replace('/\):\s*(\?[a-zA-Z]+|void)\s*\n/', ") /*:$1*/\n", $patched);
            $patched = preg_replace('/private const/', "/*private*/ const", $patched);
            if ($patched && $patched != $original) {
                echo "$filename\n";
                file_put_contents($filename, $patched);
                $count++;
            }
        }
    }
    return $count;
}

function run(string $base, array $dirs)
{
    $start = microtime(true);
    $count = 0;
    foreach ($dirs as $dir) {
        $count += runDir($base, $dir);
    }
    $end = microtime(true);
    $time = ($end - $start) * 1000;
    if ($count) {
        echo sprintf("%d files patched in %d ms\n", $count, $time);
    }
}

run(__DIR__, ['vendor']);
