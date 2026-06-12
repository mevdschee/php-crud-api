<?php

// combine src and vendor directories into a single file using phpfilemerger

$mergerUrl = 'https://raw.githubusercontent.com/mevdschee/phpfilemerger/refs/heads/main/phpfilemerger.php';
$mergerFile = __DIR__ . '/phpfilemerger.php';

$header = <<<EOF
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

function download(string $url, string $file)
{
    echo "downloading phpfilemerger.php\n";
    $data = file_get_contents($url);
    if ($data === false) {
        fwrite(STDERR, "failed to download $url\n");
        exit(1);
    }
    file_put_contents($file, $data);
}

function merge(string $merger, string $entry, string $output, bool $excludeEntry)
{
    // run from this directory so phpfilemerger auto-detects the project root
    // from composer.json and keeps the inlined file paths relative
    $command = sprintf(
        '%s %s merge %s --output %s%s --quiet',
        escapeshellarg(PHP_BINARY),
        escapeshellarg($merger),
        escapeshellarg($entry),
        escapeshellarg($output),
        $excludeEntry ? ' --exclude-entry' : ''
    );
    passthru($command, $status);
    if ($status !== 0) {
        fwrite(STDERR, "phpfilemerger failed for $output\n");
        exit($status);
    }
}

function replaceHeader(string $file, string $header)
{
    // swap phpfilemerger's generated header for the project header
    $data = file_get_contents($file);
    $end = strpos($data, "*/");
    $data = $header . substr($data, $end + 2);
    file_put_contents($file, $data);
}

chdir(__DIR__);

if (!file_exists($mergerFile)) {
    download($mergerUrl, $mergerFile);
}

$start = microtime(true);

merge($mergerFile, 'src/index.php', 'api.php', false);
merge($mergerFile, 'src/index.php', 'api.include.php', true);

replaceHeader('api.php', $header);
replaceHeader('api.include.php', $header);

$time = (microtime(true) - $start) * 1000;
echo sprintf("combined into 'api.php' and 'api.include.php' in %d ms\n", $time);
