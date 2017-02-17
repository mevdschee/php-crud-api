<?php
require "../lib/php_crud_api_transform.php";

$cookiejar = tempnam(sys_get_temp_dir(), 'cookiejar-');

function call($method, $url, $csrf = false, $data = false) {
	global $cookiejar;
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
	curl_setopt($ch, CURLOPT_URL, $url);
	$headers = array();
	if ($data) {
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		$headers[] = 'Content-Type: application/json';
		$headers[] = 'Content-Length: ' . strlen($data);
	}
	if ($csrf) {
		$headers[] = 'X-XSRF-TOKEN: ' . $csrf;
	}
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	curl_setopt($ch, CURLOPT_COOKIEJAR, $cookiejar);
	curl_setopt($ch, CURLOPT_COOKIEFILE, $cookiejar);

	return curl_exec($ch);
}

// in case you are using php-api-auth:
$csrf = json_decode(call('POST','http://localhost/api.php/', false, 'username=admin&password=admin'));
$response = call('GET','http://localhost/api.php/posts?include=categories,tags,comments&filter=id,eq,1', $csrf);

unlink($cookiejar);

$jsonObject = json_decode($response,true);

$jsonObject = php_crud_api_transform($jsonObject);
$output = json_encode($jsonObject,JSON_PRETTY_PRINT);
?>
<html>
<head>
</head>
<body>
<pre><?php echo $output ?></pre>
</body>
</html>