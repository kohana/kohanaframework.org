<?php defined('SYSPATH') or die('No direct script access.');

class View_SSO_Account_Login extends Kostache_Layout {
	/**
	 * @var     boolean   triggers the menu bar highlight
	 */
	public $menu_sso = TRUE;

	/**
	 * @var string The email address of the last attemped login
	 */
	public $email = NULL;

	/**
	 * Retruns the login form post_url
	 *
	 * @return string
	 */
	public function post_url()
	{
		return Route::url('sso_account', array(
			'action' => 'login',
		), TRUE);
	}

	/**
	 * Retruns the registration URL
	 *
	 * @return string
	 */
	public function register_url()
	{
		return Route::url('sso_account', array(
			'action' => 'register',
		), TRUE);
	}
}