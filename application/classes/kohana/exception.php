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

		switch (get_class($e))
		{
			case 'HTTP_Exception_404':
				$view = new View_Error_404;
				$view->message = $e->getMessage();
				$response->status(404);
				$view->title = 'File Not Found';

				break;
			default:
				$view = new View_Error_500;
				$view->message = $e->getMessage();
				$response->status(500);
				$view->title = 'NOMNOMNOMN';
	
				break;
		}

		echo $response->body($view)->send_headers()->body();
	}
}
