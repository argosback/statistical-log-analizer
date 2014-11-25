<?php 
/*
    File        : HttpRequestHandler.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira

    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/ 

class HttpRequestHandler implements IRequestHandler
{
	private static $_instance;
	private $mainAction;
	private $parser;

	private $selectedActionKey;

	/* methods: */
	private function __construct(IAction $mainAction, IParser $parser)
	{
		//ctor
	    $this->mainAction = $mainAction;
	    $this->parser = $parser;
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

	public static function getInstance(IAction $mainAction, IParser $parser)
	{
		if (!(self::$_instance instanceof self))
		{
	 		self::$_instance=new self($mainAction, $parser);
		}
		return self::$_instance;
	}

	public function handle($request)
	{
    	$this->selectedActionKey = $this->parser->parse($request);
    	$this->mainAction->execute();
	}

	public function getSelectedActionKey()
	{
		return $this->selectedActionKey;
	}

	public function __destruct()
	{
		unset($this->mainAction, $this->parser);
    }
}