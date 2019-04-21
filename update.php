<?php

// download composer and update dependencies

if (!file_exists('composer.phar')) {
    $composer = file_get_contents('https://getcomposer.org/composer.phar');
    file_put_contents('composer.phar', $composer);
}
exec('php composer.phar update');

// patch files for PHP 7.0 compatibility

function patchDir(string $base, string $dir): int
{
    $count = 0;
    $entries = scandir($dir);
    foreach ($entries as $entry) {
        if ($entry === '.' || $entry === '..') {
            continue;
        }
        $filename = "$base/$dir/$entry";
        if (is_dir($filename)) {
            $count += patchDir($base, "$dir/$entry");
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
            $patched = preg_replace('/(private|public|protected) const/', "/*$1*/ const", $patched);
            if ($patched && $patched != $original) {
                file_put_contents($filename, $patched);
                $count++;
            }
        }
    }
    return $count;
}

function patch(string $base, array $dirs)
{
    $start = microtime(true);
    $count = 0;
    foreach ($dirs as $dir) {
        $count += patchDir($base, $dir);
    }
    $end = microtime(true);
    $time = ($end - $start) * 1000;
    if ($count) {
        fwrite(STDERR, sprintf("%d files patched in %d ms\n", $count, $time));
    }
}

patch(__DIR__, ['vendor']);
