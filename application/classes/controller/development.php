<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Development extends Controller {

	public function action_index()
	{
		$view = new View_Development_Index;
		$view->set('title', 'Kohana Development')
			->set('description', 'All the information you will ever need about
				developing the Kohana Framework');

		$this->response->body($view);
	}
}
