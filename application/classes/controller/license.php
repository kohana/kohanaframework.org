<?php defined('SYSPATH') or die('No direct script access.');

class Controller_License extends Controller {

	public function action_index()
	{
		$view = new View_License_Index;
		$view->set('title', 'Kohana License Agreement')
			->set('description', 'The Kohana License');

		$this->response->body($view);
	}

}