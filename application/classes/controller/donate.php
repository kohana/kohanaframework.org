<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Donate extends Controller_Website {

	public function action_index()
	{
		$this->template->title   = 'Make A Donation';
		$this->template->content = View::factory('donate')
			->bind('post', $post)
			->bind('errors', $errors);

		$post = Validate::factory($_POST)
			->filter('amount', 'trim')
			->rules('amount', array(
				'not_empty' => NULL,
				'numeric'   => NULL,
			))
			->rules('using', array(
				'not_empty' => NULL,
				'in_array'  => array(array('paypal', 'google')),
			));

		if ($post->check())
		{
			// Format the amount into dollars
			$post['amount'] = number_format($post['amount'], 2, '.', '');

			// Return URL when payment is complete
			$return = URL::site($this->request->uri, Request::$protocol);

			// Process the payment using PayPal
			$params = array
			(
				'cmd' => '_donations',
				'item_name' => 'Donation for Kohana PHP Framework',
				'currency_code' => 'USD',
				'return' => $return,
				'cancel_return' => $return,
				'business' => 'alwayson@kohanaphp.com',
			);

			// Send the user to PayPal to complete their payment
			$this->request->redirect('https://www.sandbox.paypal.com/cgi-bin/webscr?'.http_build_query($params));
		}

		if ( ! $_POST)
		{
			$post['amount'] = '10.00';
		}

		$errors = $post->errors('donate');
	}

} // End Donate
