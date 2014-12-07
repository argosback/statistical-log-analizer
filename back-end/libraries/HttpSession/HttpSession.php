<?php
/*
    File        : HttpSession.php

    Project     : Classset

    Author      : Gabriel Nicolas González Ferreira

    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class HttpSession implements ISession
{
	private static $_instance;
	private $time;
	private $regeneratedState;

	private function __construct()
	{
		$this->setTime(86400);//24 hs = 86400 segs
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

	public function setTime($time)
	{
		$this->time = $time;
		$this->regeneratedState = true;
	}

	public function getTime()
	{
		return $this->time;
	}

	public function start()
	{
		/*Los parámetros comentados son para configurar el tiempo de sesión tengo que hacerlo
		desde una configuración desde un ini*/
		session_set_cookie_params($this->time);
		session_start();
		/*Cuando esté activado session_set_cookie_params lo siguiente es necesario para regenerar
		la sesión*/
		session_regenerate_id($this->regeneratedState);
	}

	public function set($key, $value)
	{
		$_SESSION["$key"] = $value;
	}

	public function get($key)
	{
		if (isset($_SESSION["$key"]))
		{	
		    return $_SESSION["$key"];
		}
		else
		{
			return NULL;
		}
	}

	public function delete($key)
	{
		if (isset($_SESSION["$key"]))
		{
			$_SESSION["$key"] = NULL;
			return TRUE;
		}
		else
		{
			return NULL;
		}
	}

	public function encode()
	{
		return session_encode();
	}

	public function decode($data)
	{
		return session_decode($data);
	}

	public function destroy()
	{
		$_SESSION = array();
		session_destroy();
	}
}

?>