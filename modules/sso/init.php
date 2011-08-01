<?php defined('SYSPATH') or die('No direct script access.');

Route::set('sso_redmine', 'sso/redmine(/<action>(/<username>))')
	->defaults(array(
		'directory'  => 'sso',
		'controller' => 'redmine',
		'action'     => 'login',
	));

Route::set('sso_redmine_login', 'sso/redmine/login.xml')
	->defaults(array(
		'directory'  => 'sso',
		'controller' => 'redmine',
		'action'     => 'login',
	));

Route::set('sso_vanilla_proxyconnect', 'sso/vanilla(/<action>)')
	->defaults(array(
		'directory'  => 'sso',
		'controller' => 'vanilla',
		'action'     => 'proxyconnect',
	));

Route::set('sso_account', 'sso(/<action>)')
	->defaults(array(
		'directory'  => 'sso',
		'controller' => 'account',
		'action'     => 'index',
	));