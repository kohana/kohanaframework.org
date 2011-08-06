<?php defined('SYSPATH') or die('No direct script access.');

class Notice {
	
	// Notice types
	const ERROR      = 'error';
	const WARNING    = 'warning';
	const INFO       = 'information';
	const SUCCESS    = 'success';
	
	/**
	 * Add a new notice
	 *
	 * @param   string  Type
	 * @param   string  Message
	 * @param   array   Translation values
	 * @return	void
	 */
	public static function add($type, $message = NULL, array $values = NULL)
	{
		$session = Session::instance();

		$notices = $session->get('notices', array());

		$notices[] = array(
			'type'    => $type,
			'message' => __($message, $values),
		);

		$session->set('notices', $notices);
	}
	
	/**
	 * Returns the current notices.
	 *
	 * @return   array
	 */
	public static function as_array()
	{
		$session = Session::instance();

		return $session->get_once('notices', array());
	}
}