<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Donate extends Controller {

	public function action_index()
	{
		$view = new View_Donate_Index;
		$view->set('title', 'Make a donation')
			->set('description', 'Make a donation to the Kohana Foundation');

		$this->response->body($view);
	}

}