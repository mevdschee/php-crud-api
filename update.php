<?php

// download composer and update dependencies

if (!file_exists('composer.phar')) {
    $composer = file_get_contents('https://getcomposer.org/composer.phar');
    file_put_contents('composer.phar', $composer);
}
exec('php composer.phar update --ignore-platform-reqs');

include 'patch.php';
