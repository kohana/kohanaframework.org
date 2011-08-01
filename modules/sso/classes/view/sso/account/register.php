<?php defined('SYSPATH') or die('No direct script access.');

class View_SSO_Account_Register extends Kostache_Layout {
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
			'action' => 'register',
		), TRUE);
	}

	/**
	 * Retruns the login URL
	 *
	 * @return string
	 */
	public function login_url()
	{
		return Route::url('sso_account', array(
			'action' => 'login',
		), TRUE);
	}
}