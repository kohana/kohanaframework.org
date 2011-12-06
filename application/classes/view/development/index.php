<?php defined('SYSPATH') or die('No direct script access.');

class View_Development_Index extends Kostache_Layout {

	/**
	 * @var     array    partials for the page
	 */
	protected $_partials = array(
		'header'   => 'partials/header',
		'footer'   => 'partials/footer',
	);

	/**
	 * @var     boolean   show the banner space on template
	 */
	public $banner_exists = FALSE;

	/**
	 * @var     boolean   triggers the menu bar highlight
	 */
	public $menu_development = TRUE;

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