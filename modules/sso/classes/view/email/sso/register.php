<?php defined('SYSPATH') or die('No direct script access.');

class View_Email_SSO_Register extends Kostache_Email {
 
	/**
	 * @var string Message Subject
	 */
	protected $_subject = 'Your kohanaframework.org registration';

	/**
	 * @var string Sender Name
	 */
	protected $_sender_name = 'Kohana';

	/**
	 * @var string Sender email email
	 */
	protected $_sender_email = 'noreply@kohanaframework.org';

	/**
	 * @var string Reply-To email
	 */
	protected $_reply_to = 'noreply@kohanaframework.org';

	/**
	 * @return string Bounces Email Address
	 */
	public function return_path()
	{
		return 'bounces+'.$this->message_id.'@kohanaframework.org';
	}

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
}