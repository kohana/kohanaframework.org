<?php defined('SYSPATH') or die('No direct script access.');

class View_Home extends View_Base {

	/**
	 * @var     array    partials for the page
	 */
	protected $_partials = array(
		'header'   => 'partials/header',
		'footer'   => 'partials/footer',
		'banner'   => 'partials/home/banner',
	);

	/**
	 * @var     boolean   show the banner space on template
	 */
	public $banner_exists = TRUE;

	public function download_version()
	{
		$download = Kohana::$config->load('files')->{'kohana-latest'};
		return $download['version'].' ('.$download['status'].')';
	}

	public function body()
	{
		return new View_Home_Body;
	}

}