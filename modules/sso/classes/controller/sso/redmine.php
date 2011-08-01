<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Sso_Redmine extends Controller {

	public function action_index()
	{
		// Needed ..
	}
	
	public function action_present()
	{
		$username = $this->request->param('username'); //$auth = Auth::instance();
		
		$user = ORM::factory('user', array(
			'username' => $username,
		));
		
		if ( ! $user->loaded())
		{
			$this->response->status(404);
		}
	}
	
	public function action_login()
	{
		$auth = Auth::instance();
		
		$user = ORM::factory('user', array(
			'username' => $this->request->post('login'),
		));
				
		$success = $auth->login($user, $this->request->post('password'));
		
		if ($success)
		{
			$this->response->body(View::factory('sso/redmine/login', array(
				'user' => $auth->get_user(),
			)));
		}	
		else
		{
			$this->response->status(500);
		}
		
		
	}

}