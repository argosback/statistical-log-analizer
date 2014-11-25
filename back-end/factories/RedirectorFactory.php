<?php
/*
    File        : RedirectorFactory.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira

    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class RedirectorFactory implements IFactory
{	
  public static function create($id = "HttpRedirector")
  {
    if($id == "HttpRedirector") return new HttpRedirector;

    $messenger = MessengerFactory::create();
    $messenger->say('Null Redirector');
  }
}

?>