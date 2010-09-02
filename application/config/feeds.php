<?php defined('SYSPATH') or die('No direct script access.');

return array(
	'forum' => array(
		'title' => 'Discussions',
		'feed'  => 'http://forum.kohanaframework.org/discussions/feed.rss',
		'link'  => 'http://forum.kohanaframework.org/',
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
