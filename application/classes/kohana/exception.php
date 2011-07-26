<?php

class Kohana_Exception extends Kohana_Kohana_Exception
{
	/**
	 * Inline exception handler, displays the error message, source of the
	 * exception, and the stack trace of the error.
	 *
	 * @uses    Kohana_Exception::text
	 * @param   object   exception object
	 * @return  boolean
	 */
	public static function handler(Exception $e)
	{	
		$response = new Response;
		$view = new View_Error;
		$view->message = $e->getMessage();

		switch (get_class($e))
		{
			case 'HTTP_Exception_404':
				$response->status(404);
				$view->title = 'File Not Found';
				$view->type = 404;

				break;
			default:
				$response->status(500);
				$view->title = 'NOMNOMNOMN';
				$view->type = 500;
	
				break;
		}

		echo $response->body($view)->send_headers()->body();
	}
}
