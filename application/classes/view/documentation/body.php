<?php defined('SYSPATH') or die('No direct script access.');

class View_Documentation_Body extends Kostache {

	/**
	 * Returns home page url
	 *
	 * @return  string
	 */
	public function home_url()
	{
		return Route::url('home');
	}

}