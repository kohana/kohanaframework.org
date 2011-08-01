<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Sso_Vanilla extends Controller {

	public function action_proxyconnect()
	{
		$auth = Auth::instance();
		
		if ($auth->logged_in())
		{
			$this->response->body(View::factory('sso/vanilla/proxyconnect', array(
				'user' => $auth->get_user(),
			)));
		}
	}

}