<?php
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="My Realm"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Text to send if user hits Cancel button';
    exit;
} elseif ($_SERVER['PHP_AUTH_USER']=='user' && $_SERVER['PHP_AUTH_PW']=='pass') {
    echo "OK";
} else {
    header('HTTP/1.0 403 Forbidden');
}
