<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Download extends Controller {

	public function action_index()
	{
		$download = Kohana::$config->load('files');

		$view = new View_Download;
		$view->set('download', $download)
			->set('title', 'Download Kohana');

		$this->response->body($view);
	}

}