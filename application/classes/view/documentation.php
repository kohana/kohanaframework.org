<?php defined('SYSPATH') or die('No direct script access.');

class View_Documentation extends View_Base {

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
	public $menu_documentation = TRUE;


	public function body()
	{
		return new View_Documentation_Body;
	}

}