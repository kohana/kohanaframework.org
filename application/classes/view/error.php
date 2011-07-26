<?php defined('SYSPATH') or die('No direct script access.');

class View_Error extends View_Base {

	/**
	 * @var     array    partials for the page
	 */
	protected $_partials = array(
		'header'   => 'partials/header',
		'footer'   => 'partials/footer',
		'banner'   => 'partials/error/banner',
	);

	/**
	 * @var     boolean   show the banner space on template
	 */
	public $banner_exists = TRUE;

	public $message;

	public function body()
	{
		$class = 'View_Error_'.((int)$this->type);
		return new $class; 
	}

}