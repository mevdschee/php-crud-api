<?php

session_start();

$algorithm = 'HS256';
$secret = 'secret';
$time = time();
$leeway = 5; // seconds
$ttl = 30; // seconds


function getVerifiedClaims($token,$time,$leeway,$ttl,$algorithm,$secret) {
    $algorithms = array('HS256'=>'sha256','HS384'=>'sha384','HS512'=>'sha512');
    if (!isset($algorithms[$algorithm])) return false;
    $hmac = $algorithms[$algorithm];
    $token = explode('.',$token);
    if (count($token)<3) return false;
    $header = json_decode(base64_decode(strtr($token[0],'-_','+/')),true);
    if (!$secret) return false;
    if ($header['typ']!='JWT') return false;
    if ($header['alg']!=$algorithm) return false;
    $signature = bin2hex(base64_decode(strtr($token[2],'-_','+/')));
    if ($signature!=hash_hmac($hmac,"$token[0].$token[1]",$secret)) return false;
    $claims = json_decode(base64_decode(strtr($token[1],'-_','+/')),true);
    if (!$claims) return false;
    if (isset($claims['nbf']) && $time+$leeway<$claims['nbf']) return false;
    if (isset($claims['iat']) && $time+$leeway<$claims['iat']) return false;
    if (isset($claims['exp']) && $time-$leeway>$claims['exp']) return false;
    if (isset($claims['iat']) && !isset($claims['exp'])) {
        if ($time-$leeway>$claims['iat']+$ttl) return false;
    }
    return $claims;
}

if (trim($_SERVER['PATH_INFO'],'/')=='__login' && isset($_POST['token'])) {




}

$claims = getVerifiedClaims($token,$time,$leeway,$ttl,$algorithm,$secret);

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

include "api.php";

$api = new PHP_CRUD_API(array(
		'dbengine'=>'SQLServer',
		'hostname'=>'(local)',
		'username'=>'',
		'password'=>'',
		'database'=>'xxx',
		'charset'=>'UTF-8'
));
$api->executeCommand();
