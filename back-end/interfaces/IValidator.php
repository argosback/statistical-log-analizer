<?php
/*
    File        : IValidator.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira

    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

interface IValidator
{	
	public function ifTrue($condition);
	public function ifFalse($condition);
	public function respond($response);
	public function execute(IAction $action);
	public function redirectTo($location);
}


?>