<?php defined('SYSPATH') or die('No direct script access.');

class View_Team_Index extends Kostache_Layout {

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
	 * Email link for team@kohanaframework.org
	 *
	 * @return  string
	 */
	public function team_at_kohanaframework()
	{
		return HTML::mailto('team@kohanaframework.org');
	}

}