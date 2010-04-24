<?php defined('SYSPATH') or die('No direct script access.');

return array(
	// Enable stats when the site is in production
	'stats' => Kohana::$environment === Kohana::PRODUCTION,
);
