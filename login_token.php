<form method="post" action="api.php">
<input name="token" value=
<?php
require 'api.php';

$auth = new PHP_API_AUTH(array(
	'secret'=>'someVeryLongPassPhrase',
	'authenticator'=>function($user,$pass){ if ($user=='admin' && $pass=='admin') $_SESSION['user']=$user; }
));
$auth->executeCommand();
?>/>
<input type="submit" value="ok">
</form>
