<?php defined('SYSPATH') or die('No direct script access.');

class Controller extends Kohana_Controller
{
	/**
	 * @var Auth
	 */
	protected $_auth;

	/**
	 * Runs before the action...
	 *
	 * @return void
	 */
	public function before()
	{
		parent::before();

		$this->_auth = Auth::instance();
	}

	/**
	 * Ensures a user has the required role
	 *
	 * @return boolean
	 */
	protected function _ensure_role($role)
	{
		if ( ! $this->_auth->logged_in())
		{
			// Redirect to login page.
			$this->request->redirect(Route::url('sso_account', array('action' => 'login')).'?redirect_url=');
		}

		$user = $this->_auth->get_user();

		if ( ! $user->has('roles', ORM::factory('role', array('name' => $role))))
		{
			// User is logged in, but does not have the required role. Show a 401.
			throw new HTTP_Exception_401("You do not have the required role (:role) to access this page", array(
				':role' => $role,
			));
		}

		// User is logged in, and has the required role.
		return TRUE;
	}

	/**
	 * Add caching to pages if in production
	 *
	 * @return void
	 */
	public function after()
	{
		if (Kohana::$environment === Kohana::PRODUCTION)
		{
			$this->response->headers('cache-control', 'max-age=3600, public');
 		}

		parent::after();
	}
}