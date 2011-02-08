<?php defined('SYSPATH') or die('No direct script access.');

//-- Environment setup --------------------------------------------------------

/**
 * Set the default time zone.
 *
 * @see  http://docs.kohanaphp.com/features/localization#time
 * @see  http://php.net/timezones
 */
date_default_timezone_set('America/Chicago');

/**
 * Enable the Kohana auto-loader.
 *
 * @see  http://docs.kohanaphp.com/features/autoloading
 * @see  http://php.net/spl_autoload_register
 */
spl_autoload_register(array('Kohana', 'auto_load'));

//-- Configuration and initialization -----------------------------------------

if ($_SERVER['SERVER_ADDR'] !== '127.0.0.1')
{
	// We are live!
	Kohana::$environment = Kohana::PRODUCTION;

	// Do not hide errors
	ini_set('display_errors', TRUE);
}

/**
 * Initialize Kohana, setting the default options.
 *
 * The following options are available:
 *
 * - string   base_url    path, and optionally domain, of your application   NULL
 * - string   index_file  name of your index file, usually "index.php"       index.php
 * - string   charset     internal character set used for input and output   utf-8
 * - string   cache_dir   set the internal cache directory                   APPPATH/cache
 * - boolean  errors      enable or disable error handling                   TRUE
 * - boolean  profile     enable or disable internal profiling               TRUE
 * - boolean  caching     enable or disable internal caching                 FALSE
 */
Kohana::init(array(
	'base_url'   => '/',
	'caching'    => Kohana::$environment === Kohana::PRODUCTION,
	'index_file' => FALSE,
));

/**
 * Attach the file write to logging. Multiple writers are supported.
 */
Kohana::$log->attach(new Kohana_Log_File(APPPATH.'logs'));

/**
 * Attach a file reader to config. Multiple readers are supported.
 */
Kohana::$config->attach(new Kohana_Config_File);

/**
 * Enable modules. Modules are referenced by a relative or absolute path.
 */
Kohana::modules(array(
	//'auth'       => MODPATH.'auth',       // Basic authentication
	//'cache'      => MODPATH.'cache',      // Custom caching
	//'codebench'  => MODPATH.'codebench',  // Benchmarking tool
	//'database'   => MODPATH.'database',   // Database access
	//'image'      => MODPATH.'image',      // Image manipulation
	//'oauth'      => MODPATH.'oauth',      // OAuth authentication
	//'orm'        => MODPATH.'orm',        // Object Relationship Mapping
	//'pagination' => MODPATH.'pagination', // Paging of results
	//'userguide'  => MODPATH.'userguide',  // User guide and API documentation
	));

/**
 * Set the routes. Each route must have a minimum of a name, a URI and a set of
 * defaults for the URI.
 */

// Handles: feed/$type.rss and feed/$type.atom
Route::set('feed', 'feed/<name>', array('name' => '.+'))
	->defaults(array(
		'controller' => 'feed',
		'action'     => 'load',
	));

// Handles: download/$file
Route::set('file', 'download/<file>', array('file' => '.+'))
	->defaults(array(
		'controller' => 'file',
		'action'     => 'get',
	));

// Handles: donate
Route::set('donate', 'donate(/<action>)')
	->defaults(array(
		'controller' => 'donate',
		'action'     => 'index',
	));

// Handles: $lang/$page and $page
Route::set('page', '((<lang>/)<page>)', array('lang' => '[a-z]{2}', 'page' => '.+'))
	->defaults(array(
		'controller' => 'page',
		'action'     => 'load',
	));

/**
 * Execute the main request. A source of the URI can be passed, eg: $_SERVER['PATH_INFO'].
 * If no source is specified, the URI will be automatically detected.
 */
echo Request::instance()
	->execute()
	->send_headers()
	->response;
