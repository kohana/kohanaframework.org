<?php defined('SYSPATH') or die('No direct script access.');

class View_Home extends View_Base {

	/**
	 * @var     array    partials for the page
	 */
	protected $_partials = array(
		'header'   => 'partials/header',
		'footer'   => 'partials/footer',
		'notices'  => 'partials/notices',
		'banner'   => 'partials/home/banner',
	);

	/**
	 * @var     boolean   show the banner space on template
	 */
	public $banner_exists = TRUE;

	/**
	 * @var     boolean   triggers the menu bar highlight
	 */
	public $menu_home = TRUE;

	public function download_version()
	{
		return $this->download['version'].' ('.$this->download['status'].')';
	}

	public function download_link()
	{
		return $this->download['download'];
	}

	public function body()
	{
		return new View_Home_Body;
	}

}