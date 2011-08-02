<?php

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException,
	Behat\Behat\Context\Step,
	Behat\Behat\Event\SuiteEvent;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;

/**
 * SSO context.
 */
class SsoContext extends BehatContext
{
	public static $users = array(
		'admin' => array(
			'username'    => 'admin',
			'email'       => 'admin@kohanaframework.org',
			'first_name'  => 'Admin_FN',
			'last_name'   => 'Admin_LN',
			'password'    => 'admin123',
			'is_verified' => true,
			'is_admin'    => true,
		),
		'user' => array(
			'username'    => 'user',
			'email'       => 'user@kohanaframework.org',
			'first_name'  => 'User_FN',
			'last_name'   => 'User_LN',
			'password'    => 'user123',
			'is_verified' => true,
			'is_admin'    => true,
		),
		'user-unverified' => array(
			'username'    => 'user-unverified',
			'email'       => 'user-unverified@kohanaframework.org',
			'first_name'  => 'User_Unverified_FN',
			'last_name'   => 'User_Unverified_LN',
			'password'    => 'user123',
			'is_verified' => false,
			'is_admin'    => true,
		),
	);

	/**
	 * @BeforeSuite
	 */
	public static function before_suite(SuiteEvent $event)
	{
		foreach (self::$users as $raw_user)
		{
			try
			{
				$user = ORM::factory('user', array(
					'username' => $raw_user['username'],
				));

				if ($user->loaded())
				{
					$user->delete();
				}

				$user = ORM::factory('user')->values($raw_user)->save();

				if ($raw_user['is_verified'] == true)
				{
					$user->add('roles', ORM::factory('role', array('name' => 'login')));
				}

				if ($raw_user['is_admin'] == true)
				{
					$user->add('roles', ORM::factory('role', array('name' => 'admin')));
				}

				$user->save();
			}
			catch (ORM_Validation_Exception $e)
			{
				var_dump($e->errors());
				throw new Exception('Todo 1 :)');
			}
			catch (Exception $e)
			{
				throw new Exception('Todo 2 :) '.$e->getMessage());
			}
		}
	}

	/**
	 * Ensures you are logged out.
	 *
     * @Given /^I am logged out$/
     */
    public function iAmLoggedOut()
    {
        return array(
			new Step\Given('I go to "/sso/logout"'),
			new Step\Then('I should see "Login"'),
		);
    }

	/**
	 * Logs in as a specific user.
	 *
	 * @Given /^I am logged in as "([^"]*)" with password "([^"]*)"$/
	 */
	public function iAmLoggedInAsWithPassword($email, $password)
	{
		return array(
			new Step\Given('I am logged out'),
			new Step\Given('I go to "/sso/login"'),
			new Step\When('I fill in "email" with "'.$email.'"'),
			new Step\When('I fill in "password" with "'.$password.'"'),
			new Step\When('I press "Login"'),
			new Step\Then('I should see "My Account"'),
		);
	}

	/**
	 * Logs you in as a user with a specific role.
	 *
     * @Given /^I am logged in as "([^"]*)"$/
     */
    public function iAmLoggedInAs($user)
    {
		if ( ! isset(self::$users[$user]))
			throw new Exception('Unknown user \''.$user.'\'');

		$user = self::$users[$user];

		return array(
			new Step\Given('I am logged out'),
			new Step\Given('I am logged in as "'.$user['email'].'" with password "'.$user['password'].'"')
		);
    }
}
