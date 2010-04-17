<?php defined('SYSPATH') or die('No direct script access.');

class Model_Feed extends Sprig {

	protected function _init()
	{
		$this->_fields = array(
			'id' => new Sprig_Field_Auto,
			'name' => new Sprig_Field_Char,
			'title' => new Sprig_Field_Char,
			'more' => new Sprig_Field_Char,
			'url' => new Sprig_Field_Char,
			'limit' => new Sprig_Field_Integer,
			'lifetime' => new Sprig_Field_Integer,
		);
	}

} // End Feed
