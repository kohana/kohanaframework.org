<?php defined('SYSPATH') or die('No direct script access.');

class View_Base extends Kostache {

	/**
	 * @var     array    partials for the page
	 */
	protected $_partials = array(
		'header'   => 'partials/header',
		'footer'   => 'partials/footer',
	);

	/**
	 * @var     string    overloading the template to lock to base
	 */
	protected $_template = 'base';

	/**
	 * @var     string    title of the site
	 */
	public $title = 'Kohana: The Swift PHP Framework';

	/**
	 * @var     boolean   show the banner space on template
	 */
	public $banner_exists = FALSE;

	/**
	 * @var     string    description of the page
	 */
	public $description = 'Kohana homepage. Kohana is an HMVC PHP5 framework
	 that provides a rich set of components for building web applications.';

	/**
	 * Return the charset for the page
	 *
	 * @return  string
	 */
	public function charset()
	{
		return Kohana::$charset;
	} 

	/**
	 * Return the language for the page
	 *
	 * @return  string
	 */
	public function language()
	{
		return I18n::$lang;
	}

	/**
	 * Return the full year (for copyright notice)
	 *
	 * @return  string
	 */
	public function year()
	{
		return date('Y');
	}
}