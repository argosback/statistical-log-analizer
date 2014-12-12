<?php
/*
    File        : Application.php

    Project     : Classset PHP 

    Author      : Gabriel Nicolas González Ferreira
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

require_once 'back-end/configurations/Autoloader.php';

final class Application
{	
	public static function run()
	{
		Autoloader::init();
		
		$session = SessionFactory::create();
		$session -> setTime('86400');//24 hs
		$session -> start();

		$requestHandler = RequestHandlerFactory::create();
		$requestHandler -> handle($_REQUEST);
	}
}

?>