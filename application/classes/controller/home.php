<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Home extends Controller {

	public function action_index()
	{
		$view = new View_Home;
		$view->set('download', Kohana::$config->load('files')->{'kohana-latest'});
		$this->response->body($view);
	}

	/**
	 * Demo action to generate a 500 error
	 *
	 * @return null
	 */
	public function action_error()
	{
		throw new Kohana_Exception('This is an intentional exception');
	}

}