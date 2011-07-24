<?php defined('SYSPATH') or die('No direct script access.');

class Controller extends Kohana_Controller
{
	/**
	 * Add caching to pages if in production
	 *
	 * @return void
	 */
	public function after()
	{
		if (Kohana::$environment === Kohana::PRODUCTION)
		{
			$this->response->headers('cache-control', 'max-age=3600, public');
 		}
	}
}