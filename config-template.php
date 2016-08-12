<?php
	return array(
		'authentication' => array(
			'enabled' => false, // Set to true if you want auth
			'users' => array( // Set the usernames and password you are willing to accept
				'someusername' => 'somepassword',
				'jusername' => 'jpassword',
			),
			'secret' => 'DFGf9ggdfgDFGDFiikjkjdfg',
			// Choices are 'HS256', 'HS384', 'HS512'
			'algorithm' => 'HS256',
			'time' => time(),
			'leeway' => 5,
			'ttl' => 600, // Values is in seconds
			'sub' => ''
		)
	);
?>