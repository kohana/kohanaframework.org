<?php defined('SYSPATH') or die('No direct script access.');

class Controller_File extends Controller_Website {

	public function action_get($file = NULL)
	{
		// Load the configuration for this file
		$config = Kohana::config("files.$file");

		if (isset($config['download']))
		{
			// Redirect to the download location
			$this->request->redirect($config['download']);
		}
		else
		{
			throw new Kohana_Exception('Requested file does not exist: :file',
				array(':file' => $file));
		}
	}

} // End File