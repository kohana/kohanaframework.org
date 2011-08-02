<?php defined('SYSPATH') or die('No direct access allowed.');

class Model_User extends Model_Auth_User {
	
	/**
	 * Auto-update columns for updates
	 * @var array
	 */
	protected $_updated_column = array(
		'column' => 'updated',
		'format' => TRUE,
	);

	/**
	 * Auto-update columns for creation
	 * @var array
	 */
	protected $_created_column = array(
		'column' => 'created',
		'format' => TRUE,
	);
	
	/**
	 * Insert a new object to the database.
	 * 
	 * Overloaded to trigger SSO tasks.
	 * 
	 * @param  Validation $validation Validation object
	 * @return ORM
	 */
	public function create(Validation $validation = NULL)
	{
		$this->code = Text::random('alnum', 50);
		
		$user = parent::create($validation);
		
		Email::factory('sso/register')
			->to($user->email, $user->first_name.' '.$user->last_name, array('code' => $user->code))
			->send();
		
		return $user;
	}
	
	/**
	 * Updates a single record or multiple records
	 * 
	 * Overloaded to trigger SSO tasks.
	 *
	 * @chainable
	 * @param  Validation $validation Validation object
	 * @return ORM
	 */
	public function update(Validation $validation = NULL)
	{
		if ($this->changed('email'))
		{
			/**
			 * @todo Verify new email addresses..
			 */
		}
		
		return parent::update($validation);
	}
	
	public function rules()
	{
		return parent::rules() + array(
			'first_name' => array(
				array('not_empty'),
				array('max_length', array(':value', 50)),
			),
			'last_name' => array(
				array('not_empty'),
				array('max_length', array(':value', 50)),
			),
		);
	}
}