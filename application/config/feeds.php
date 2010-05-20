<?php defined('SYSPATH') or die('No direct script access.');

return array(
	'forum' => array(
		'title' => 'Discussions',
		'feed'  => 'http://forum.kohanaphp.com/search.php?PostBackAction=Search&Advanced=1&Type=Comments&Feed=RSS2',
		'link'  => 'http://forum.kohanaphp.com/',
		'limit' => 8,
		'cache' => 30,
	),
	'dev' => array(
		'title' => 'Development',
		'feed'  => 'http://dev.kohanaframework.org/activity.atom?show_issues=1',
		'link'  => 'http://dev.kohanaframework.org/activity',
		'limit' => 5,
		'cache' => 30,
	),
);
