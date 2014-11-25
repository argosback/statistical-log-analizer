<?php
/*
    File        : HttpRedirector.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/
    
class HttpRedirector implements IRedirector
{
 //    private static $instance;

	// private function __construct()
 //    {
 //    }

 //    //to_prevent cloned:
 //    private function __clone()
 //    {
 //        trigger_error
 //        (
 //            'Invalid Operation: You can not clone an instance of '
 //            . get_class($this) ." class.", E_USER_ERROR 
 //        );
 //    }

 //    //to prevent deserialization:
 //    private function __wakeup()
 //    {
 //        trigger_error
 //        (
 //            'Invalid Operation: You can not deserialize an instance of '
 //            . get_class($this) ." class."
 //        );
 //    }

 //    public static function getInstance()
 //    {
 //        if (!(self::$instance instanceof self))
 //        {
 //            self::$instance = new self();
 //        }
 //        return self::$instance;
 //    }

	public function redirectTo($uri='') 
	{
        exit(header("Location: $uri"));
    }
}
?>
