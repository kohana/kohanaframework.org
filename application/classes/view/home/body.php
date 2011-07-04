<?php defined('SYSPATH') or die('No direct script access.');

class View_Home_Body extends Kostache {

	public function features()
	{
		return new View_Home_Features;
	}

	public function whouses()
	{
		return new View_Home_Whouses;
	}

	public function gallery()
	{
		return new View_Home_Gallery;
	}

	public function social()
	{
		return new View_Home_Social;
	}

}