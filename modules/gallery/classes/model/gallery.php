<?php defined('SYSPATH') or die('No direct script access.');
/**
 * The Kohana_HTTP_Header class provides an Object-Orientated interface
 * to HTTP headers. This can parse header arrays returned from the
 * PHP functions `apache_request_headers()` or the `http_parse_headers()`
 * function available within the PECL HTTP library.
 *
 * @package    Kohana Website
 * @category   Gallery
 * @author     Kohana Team
 * @copyright  (c) 2008-2011 Kohana Team
 * @license    http://kohanaframework.org/license
 */
class Model_Gallery implements Countable {

	/**
	 * @var     array    exhibits for the gallery
	 */
	protected $_gallery_exhibits = array();

	/**
	 * Constructor to allow injection of data
	 *
	 * @param   array    $exhibits Exhibits to set to the model
	 */
	public function __construct(array $exhibits = NULL)
	{
		if ($exhibits !== NULL)
		{
			$this->set_exhibits($exhibits)
		}
		else
		{
			$this->set_exhibits(Kohana::$config->load('gallery'));
		}
	}

	/**
	 * Implements the Countable interface
	 *
	 * @return  integer
	 */
	public function count()
	{
		return count($this->get_exhibits());
	}

	/**
	 * Set exhibits to this model.
	 *
	 * @param   array    $exhibits  Exhibits to set
	 * @param   string   $replace   Replace all exhibits with the array
	 * @return  void
	 */
	public function set_exhibits(array $exhibits, $replace = FALSE)
	{
		if ($replace === TRUE)
		{
			$this->_gallery_exhibits = $exhibits;
		}
		else
		{
			$this->_gallery_exhibits = 
				Arr::merge($this->get_exhibits(), $exhibits);
		}
	}

	/**
	 * Returns the exhibits, either all or limited and offsetted.
	 *
	 * @return  array
	 */
	public function get_exhibits($limit = NULL, $offset = NULL)
	{
		if ($limit === NULL AND $offset === NULL)
		{
			return $this->_gallery_exhibits;
		}

		$result = $this->_gallery_exhibits;

		if ($offset !== NULL)
		{
			$result = array_slice($result, (int) $offset, $limit, TRUE);
		}
		elseif ($limit !== NULL)
		{
			$result = array_slice($result, 0, (int) $limit, TRUE);
		}

		return $result;
	}

} // End Model_Gallery