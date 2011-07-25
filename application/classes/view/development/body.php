<?php defined('SYSPATH') or die('No direct script access.');

class View_Development_Body extends Kostache {

	/**
	 * Returns team page url
	 *
	 * @return  string
	 */
	public function team_url()
	{
		return Route::url('team');
	}

}