<?php
return array(
	'username' => array(
		'unique' => 'This username has already been taken, please choose another.',
	), 
	'email' => array(
		'unique' => 'This email address is already associated with another account',
		'email' => 'must be a email address'
	),
);