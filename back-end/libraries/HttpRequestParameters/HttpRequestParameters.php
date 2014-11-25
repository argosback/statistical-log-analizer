<?php
/*
    File        : HttpRequestParameters.php

    Project     : Classset

    Author      : Pablo Daniel Spennato

    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class HttpRequestParameters implements IParameters
{
	private static $_instance;
	private $_parameters = array();
	private $_request = array();

	private function __construct($request)
	{
		$this->_request = $request;
		foreach ($this->_request as $key => $value) 
		{
			$this->_parameters[$key] = $value;
		}
	}

	//to_prevent cloned:
	private function __clone()
	{
		trigger_error
		(
			'Invalid Operation: You can not clone an instance of '
			. get_class($this) ." class.", E_USER_ERROR 
		);
	}

	//to prevent deserialization:
	private function __wakeup()
	{
		trigger_error
		(
			'Invalid Operation: You can not deserialize an instance of '
			. get_class($this) ." class."
		);
	}

	public static function getInstance($request)
	{
		if (!(self::$_instance instanceof self))
		{
	 		self::$_instance=new self($request);
		}
		return self::$_instance;
	}

    public function get($key)
    {
    	if (isset($this -> _parameters[$key]))
		{	
    		return $this -> _parameters[$key];
    	}
		else
		{
			return NULL;
		}
    }

    public function getAll()
    {
    	if (isset($this -> _parameters))
		{
    		return $this -> _parameters;
    	}
    	else
		{
			return NULL;
		}	
    }


}

?>
