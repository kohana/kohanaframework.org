<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Page extends Controller_Template {

	protected $page_titles = array(
		'home' => 'The Swift PHP Framework',
	);

	public function action_load()
	{
		$page = $this->request->param('page', 'home');

		if (isset($this->page_titles[$page]))
		{
			// Use the defined page title
			$title = $this->page_titles[$page];
		}
		else
		{
			// Use the page name as the title
			$title = ucwords(str_replace('_', ' ', $page));
		}

		$this->template->title   = $title;
		$this->template->content = View::factory("pages/$page")
			->render();
	}

} // End Page