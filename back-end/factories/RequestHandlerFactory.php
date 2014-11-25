<?php
/*
    File        : RequestHandlerFactory.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira

    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class RequestHandlerFactory implements IFactory
{	
  public static function create($id = "HttpRequestHandler")
  {
    if($id == "HttpRequestHandler") 
      return HttpRequestHandler::getInstance(new A_Main, HttpRequestParser::getInstance());

    $messenger = MessengerFactory::create();
    $messenger->say('Null RequestHandler');
  }
}

?>