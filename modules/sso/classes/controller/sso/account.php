<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Sso_Account extends Controller {

	/**
	 * @var Auth
	 */
	protected $_auth;

	/**
	 * @var Session
	 */
	protected $_session;

	/**
	 * Sets up some common stuff we'll need, and stores the redirect_url if supplied.
	 */
	public function before()
	{
		parent::before();

		// We'll need these later...
		$this->_auth = Auth::instance();
		$this->_session = Session::instance();

		// Store the redirect URL if one has been provided
		if ($redirect_url = $this->request->query('redirect_url'))
		{
			if ($redirect_url == 'referrer')
			{
				$redirect_url = $this->request->referrer();
			}

			$this->_session->set('redirect_url', $redirect_url);
		}
	}

	/**
	 * Displays/updates the current users profile
	 */
	public function action_index()
	{
		// Ensure we're logged in.
		if ( ! $this->_auth->logged_in())
		{
			// Redirect the user ..
			$this->_redirect(TRUE);
		}

		// Prepare an empty user and errors var.
		$user = $this->_auth->get_user();
		$errors = array();

		// Has the user already filled out the form?
		if ($this->request->method() == Request::POST)
		{
			try
			{
				// Create the user
				$user = $user->update_user($this->request->post('user'), array(
					'first_name',
					'last_name',
					'email',
					'password',
				));

				Notice::add(Notice::SUCCESS, 'Update successful.');

				$this->_redirect(TRUE);
			}
			catch (ORM_Validation_Exception $e)
			{
				Notice::add(Notice::ERROR, 'Validation failed. Please correct the errors and retry.');
				$errors = $e->errors('sso/model');
			}
		}

		// Prepare the my account view
		$view = Kostache::factory('sso/account/index')
		    ->set('title', 'Kohana SSO')
		    ->set('description', 'Kohana SSO')
		    ->set('user', $this->_auth->get_user())
		    ->set('errors', $errors);


		$this->response->body($view);
	}

	public function action_login()
	{
		// Are we alreayed logged in??
		if ($this->_auth->logged_in())
		{
			// Redirect the user ..
			$this->_redirect();
		}

		// Has the user already filled out the form?
		if ($this->request->method() == Request::POST)
		{
			// Find the user.
			$user = ORM::factory('user', array(
				'email' => $this->request->post('email'),
			));

			try
			{
				// Attempt to login...
				if ($this->_auth->login($user, $this->request->post('password')))
				{
					$user = $this->_auth->get_user();

					// Login Succcess - Redirect the user ..
					$this->_redirect();
				}
				else
				{
					// Login Failed
					Notice::add(Notice::ERROR, 'Login failed.');
				}
			}
			catch (ORM_Validation_Exception $e)
			{
				throw $e;
				// The users details are no longer valid. Ask them to update their profile.
				// Heh - Looks like there is an issue with this -_-
				Notice::add(Notice::WARNING, 'Please update your profile.');

				// Redirect the user to their profile for updating..
				$this->_redirect(TRUE);
			}
		}

		// Prepare the login view
		$view = Kostache::factory('sso/account/login')
		    ->set('title', 'Kohana SSO Login')
		    ->set('description', 'Kohana SSO Login')
		    ->set('email', $this->request->post('email'));

		$this->response->body($view);
	}

	public function action_logout()
	{
		$this->_auth->logout();

		// Redirect the user ..
		$this->_redirect();
	}

	public function action_register()
	{
		// Are we alreayed logged in??
		if ($this->_auth->logged_in())
		{
			// Redirect the user ..
			$this->_redirect();
		}

		// Prepare an empty user and errors var.
		$user = ORM::factory('user');
		$errors = array();

		// Has the user already filled out the form?
		if ($this->request->method() == Request::POST)
		{
			try
			{
				// Create the user
				$user = $user->create_user($this->request->post('user'), array(
					'username',
					'first_name',
					'last_name',
					'email',
					'password',
				));

				Notice::add(Notice::SUCCESS, 'Registration sucessful. Please check your email (:email) for a verification link.', array(
					':email' => $user->email,
				));

				$this->_redirect(TRUE);
			}
			catch (ORM_Validation_Exception $e)
			{
				Notice::add(Notice::ERROR, 'Validation failed. Please correct the errors and retry.');
				$errors = $e->errors('sso/model');
			}
		}

		// Prepare the registration view
		$view = Kostache::factory('sso/account/register')
		    ->set('title', 'Kohana SSO Registration')
		    ->set('description', 'Kohana SSO Registration')
		    ->set('user', $user)
		    ->set('errors', $errors);

		$this->response->body($view);
	}

	public function action_verify()
	{
		$code = $this->request->query('code');

		// Ensure a code has been supplied
		if ($code === NULL)
		{
			Notice::add(Notice::ERROR, "Invalid verification code");

			$this->_redirect(TRUE);
		}

		// Find the user record for this code
		$user = ORM::factory('user', array(
			'code' => $code,
		));

		// Ensure a user was found
		if ( ! $user->loaded())
		{
			Notice::add(Notice::ERROR, "Invalid verification code");

			$this->_redirect(TRUE);
		}

		// Update the user and redirect
		$user->add('roles', ORM::factory('role', array(
			'name' => 'login',
		)));

		$user->code = NULL;
		$user->save();

		Notice::add(Notice::SUCCESS, "Verification sucessful. Please login.");

		$this->_redirect(TRUE);
	}

	protected function _redirect($force_default = FALSE)
	{
		$redirect_url = NULL;

		if ( ! $force_default)
		{
			$redirect_url = $this->_session->get_once('redirect_url', FALSE);
		}

		if ( ! $redirect_url && $this->_auth->logged_in())
		{
			$redirect_url = Route::get('sso_account')->uri(array(
				'action' => 'index',
			), TRUE);
		}
		else if ( ! $redirect_url)
		{
			$redirect_url = Route::get('sso_account')->uri(array(
				'action' => 'login',
			), TRUE);
		}

		$this->request->redirect($redirect_url);
	}
}