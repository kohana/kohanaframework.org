<?php defined('SYSPATH') or die('No direct script access.');

class View_Download extends View_Base {

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

	/**
	 * @var     boolean   triggers the menu bar highlight
	 */
	public $menu_download = TRUE;


	public function body()
	{
		$body = new View_Download_Body; 

		$body->set('download', $this->download);

		return $body;
	}

}