<?php defined('SYSPATH') or die('No direct script access.');

class View_SSO_Account_Login extends View_Base {

	/**
	 * @var     boolean   show the banner space on template
	 */
	public $banner_exists = FALSE;

	/**
	 * @var     boolean   triggers the menu bar highlight
	 */
	public $menu_sso = TRUE;

	public function body()
	{
		// Proxy until Kostache_Layout is used ;)
		$body = new View_SSO_Account_Login_Body();
		
		$body->set('email', $this->email);
		
		return $body;
	}

}