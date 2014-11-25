<?php
/*
    File        : SessionFactory.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira

    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class SessionFactory implements IFactory
{	
  public static function create($id = "HttpSession")
  {
    if($id == "HttpSession") 
      return HttpSession::getInstance();
    
    $messenger = MessengerFactory::create();
    $messenger->say('Null Filter');
  }
}
?>