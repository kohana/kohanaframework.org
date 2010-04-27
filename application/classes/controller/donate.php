<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Donate extends Controller_Website {

	public function action_index()
	{
		$this->template->title   = 'Make A Donation';
		$this->template->content = View::factory('donate');
	}

} // End Donate
