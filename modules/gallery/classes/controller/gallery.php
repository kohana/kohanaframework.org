<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Gallery extends Controller {

	/**
	 * @var     array
	 */
	protected $_accept_format = 'application/json';

	/**
	 * @var     array
	 */
	protected $_acceptable    = array(
		'text/html',
		'application/json'
	);

	/**
	 * @var     array
	 */
	protected $_data          = array();

	/**
	 * @var     integer
	 */
	protected $_limit         = NULL;

	/**
	 * @var     integer
	 */
	protected $_offset        = NULL;

	/**
	 * Ensures the request is valid
	 *
	 * @return  void
	 */
	public function before()
	{
		if ($this->request->method() !== HTTP_Request::GET)
		{
			throw new HTTP_Exception_405;
		}

		$this->_accept_format = 
			$this->request
				->headers()
				->preferred_accept($this->_acceptable);

	}

	/**
	 * Returns the gallery images.
	 *
	 * @return  void
	 */
	public function action_index()
	{
		$this->_limit  = $this->request->query('limit', NULL);
		$this->_offset = $this->request->query('offset', NULL);

		$this->_data = new Model_Gallery;
	}

	/**
	 * Renders the output in the correct format
	 *
	 * @return void
	 */
	public function after()
	{
		$data  = $this->_data->get_exhibits($limit, $offset);

		if ($this->_accept_format === 'application/json')
		{
			$total = $this->_data->count();

			$this->response->body(
				$this->_create_json_response(
					'exhibit',
					$data,
					$this->_limit,
					$this->_offset,
					$total
				)
			)
		}
		else
		{
			$view = 
		}

		$this->response->headers('content-type', $this->_accept_format);
	}

	/**
	 * Takes the entity and data and returns a json response
	 *
	 * @param   string    $entity Entity to encode
	 * @param   array     $data   Data to encode with entity
	 * @param   integer   $limit  Limit applied to result
	 * @param   integer   $offset Offset applied to result
	 * @param   integer   $total  Total number of results of limit/offset omitted
	 * @return  string
	 */
	protected function _create_json_response(
		$entity,
		array $data, 
		$limit       = NULL,
		$offset      = NULL,
		$total       = NULL
	)
	{
		if ($total === NULL)
		{
			$total = count($data);
		}

		$json = new stdClass;
		$json->entity  = $entity;
		$json->total   = $total;
		$json->offset  = $offset;
		$json->limit   = $limit;
		$json->results = count($data);
		$json->payload = $data;

		return json_encode($json, JSON_NUMERIC_CHECK);
	}

} // Controller_Gallery 