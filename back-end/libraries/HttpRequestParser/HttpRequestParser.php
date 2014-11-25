<?php
/*
    File        : HttpRequestParser.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira

    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class HttpRequestParser implements IParser
{
    private static $_instance;


    /* methods: */
    private function __construct()
    {
        //ctor
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

    public static function getInstance()
    {
        if (!(self::$_instance instanceof self))
        {
            self::$_instance=new self();
        }
        return self::$_instance;
    }


	public function parse($input)
	{
		$allKeys = array_keys($input);
    	return end($allKeys);       
	}
}

?>