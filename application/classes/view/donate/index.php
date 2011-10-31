<?php defined('SYSPATH') or die('No direct script access.');

class View_Donate_Index extends Kostache_Layout {

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
}