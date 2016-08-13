<form method="post" action="api.php">
<input name="token" value=
<?php
require 'api.php';

$auth = new PHP_API_AUTH(array(
	'secret'=>'someVeryLongPassPhraseChangeMe',
	'authenticator'=>function($user,$pass){ $_SESSION['user']=($user=='admin' && $pass=='admin'); }
));
$auth->executeCommand();
?>/>
<input type="submit" value="ok">
</form>
