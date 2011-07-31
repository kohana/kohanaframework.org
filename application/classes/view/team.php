<?php defined('SYSPATH') or die('No direct script access.');

class View_Team extends View_Base {

	/**
	 * @var     array    partials for the page
	 */
	protected $_partials = array(
		'header'   => 'partials/header',
		'footer'   => 'partials/footer',
		'notices'  => 'partials/notices',
	);

	/**
	 * @var     boolean   show the banner space on template
	 */
	public $banner_exists = FALSE;

	public function body()
	{
		return new View_Team_Body; 
	}

}