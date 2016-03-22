<?php
require "../lib/php_crud_api_transform.php";

function call($method, $url, $data = false) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
	curl_setopt($ch, CURLOPT_URL, $url);
	if ($data) {
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		$headers = array();
		$headers[] = 'Content-Type: application/json';
		$headers[] = 'Content-Length: ' . strlen($data);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	}
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	return curl_exec($ch);
}

$response = call('GET','http://localhost/api.php/posts?include=categories,tags,comments&filter=id,eq,1');
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
