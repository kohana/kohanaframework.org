<?php defined('SYSPATH') or die('No direct script access.');

class View_License extends View_Base {

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

	public function body()
	{
		$body = new View_License_Body; 
		$body->set('year', $this->year());

		return $body;
	}

}