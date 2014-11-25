<?php
/*
    File        : RequestParametersFactory.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira

    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class RequestParametersFactory implements IFactory
{	
  public static function create($id = "HttpRequestParameters")
  {
  	if($id == "HttpRequestParameters") 
      return HttpRequestParameters::getInstance($_REQUEST);
    
    $messenger = MessengerFactory::create();
    $messenger->say('Null Parameters');
  }
}

?>