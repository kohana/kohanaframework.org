<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Documentation extends Controller {

	public function action_index()
	{
		$view = new View_Documentation_Index;
		$view->set('title', 'Kohana Documentation')
			->set('description', 'Get the current supported versions of the 
				Kohana documentation');

		$this->response->body($view);
	}

}