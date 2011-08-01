<?php defined('SYSPATH') or die('No direct script access.');

class Kostache extends Kohana_Kostache {

	/**
	 * @var     array    partials for the page
	 */
	protected $_partials = array(
		'header'   => 'partials/header',
		'footer'   => 'partials/footer',
		'notices'  => 'partials/notices',
	);

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

	/**
	 * Turn on the google analytics in production
	 *
	 * @return  boolean
	 */
	public function stats()
	{
		return Kohana::$environment === Kohana::PRODUCTION;
	}

	/**
	 * Returns URL::base() in order to link to assets properly
	 *
	 * @return  string
	 */
	public function base_url()
	{
		return URL::base();
	}

	/**
	 * Returns home page url
	 *
	 * @return  string
	 */
	public function home_url()
	{
		return Route::url('home');
	}

	/**
	 * Returns download page url
	 *
	 * @return  string
	 */
	public function download_url()
	{
		return Route::url('download');
	}

	/**
	 * Returns documentation page url
	 *
	 * @return  string
	 */
	public function documentation_url()
	{
		return Route::url('documentation');
	}

	/**
	 * Returns development page url
	 *
	 * @return  string
	 */
	public function development_url()
	{
		return Route::url('development');
	}

	/**
	 * Returns team page url
	 *
	 * @return  string
	 */
	public function team_url()
	{
		return Route::url('team');
	}

	/**
	 * Returns license page url
	 *
	 * @return  string
	 */
	public function license_url()
	{
		return Route::url('license');
	}
	
	/**
	 * Returns current kohana version
	 *
	 * @return  string
	 */
	public function kohana_version()
	{
		return Kohana::VERSION;
	}
	
	/**
	 * Returns current kohana codename
	 *
	 * @return  string
	 */
	public function kohana_codename()
	{
		return Kohana::CODENAME;
	}
	
	/**
	 * Returns notices
	 *
	 * @return  string
	 */
	public function notices()
	{
		return Notice::as_array();
	}
}