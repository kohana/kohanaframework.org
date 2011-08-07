<?php defined('SYSPATH') or die('No direct script access.');

abstract class Controller_Admin extends Controller {
	/**
	 * Ensure the user has the 'admin' role.
	 *
	 * @return void
	 */
	public function before()
	{
		parent::before();

		$this->_ensure_role('admin');
	}
}