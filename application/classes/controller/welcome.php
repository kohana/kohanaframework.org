<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller_Template {

	public function action_index()
	{
		$this->template->content = 'hello, world';
	}

} // End Welcome
