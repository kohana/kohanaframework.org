<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Team extends Controller {

	public function action_index()
	{
		$view = new View_Team;
		$view->set('title', 'The awesome Kohana Team')
			->set('description', 'The awesome Kohana Team who devote countless'.
			' hours to developing this framework');

		$this->response->body($view);
	}

}