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
	
	
	public function create_user($values, $expected)
	{
		$this->code = Text::random('alnum', 50);
		
		return parent::create_user($values, $expected);
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