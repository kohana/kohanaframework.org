<?php defined('SYSPATH') or die('No direct script access.');

class View_Email_SSO_Register extends Kostache {

	/**
	 * @var string Message Subject
	 */
	public $subject = "Your kohanaframework.org registration";

	/**
	 * @var string Message From Name
	 */
	public $from_name = "Kohana";

	/**
	 * @var string Message From Address
	 */
	public $from_address = "noreply@kohanaframework.org";

	/**
	 * @var string Message From Address
	 */
	public $reply_to = "noreply@kohanaframework.org";

	/**
	 * @return string Bounces Email Address
	 */
	public function return_path()
	{
		return 'bounces+'.$this->code.'@kohanaframework.org';
	}

	/**
	 * @var array SMTP Headers
	 */
	public $headers = array(
		'Auto-Submitted' => 'auto-generated', // See http://tools.ietf.org/html/rfc3834#section-5
	);

	/**
	 * Retruns the verification URL
	 *
	 * @return string
	 */
	public function verify_url()
	{
		return Route::url('sso_account', array(
			'action' => 'verify',
		), TRUE).'?code='.$this->code;
	}

	public function __get($name)
	{
		return $this->{$name}();
	}
}