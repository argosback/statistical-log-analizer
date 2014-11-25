<?php
/*
    File        : Validator.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira

    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class Validator implements IValidator
{	
	private $nullValidator;
	private $messenger;
	private $redirector;

	public function __construct(IValidator $nullValidator, IMessenger $messenger, IRedirector $redirector)
	{
		$this->nullValidator = $nullValidator;
		$this->messenger = $messenger;
		$this->redirector = $redirector;
	}

	public function ifTrue($condition)
	{
		if($condition) return $this;
		return $this->nullValidator;
	}

	public function ifFalse($condition)
	{
		if(!$condition) return $this;
		return $this->nullValidator;
	}

	public function respond($response)
	{
		$this->messenger->say($response);
	}

	public function execute(IAction $action)
	{
		$action->execute();
	}

	public function redirectTo($location)
	{
		$this->redirector->redirectTo($location);
	}

	public function __destruct()
	{
		unset($this->nullValidator, $this->messenger, $this->redirector);
	}
}


?>