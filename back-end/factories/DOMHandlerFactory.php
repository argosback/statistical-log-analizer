<?php
/*
    File        : DOMHandlerFactory.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira

    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class DOMHandlerFactory implements IFactory
{	
  public static function create($id = 'DOMHandler')
  {
    if($id == 'DOMHandler') 
      return new DOMHandler(new HtmlDecoder, MessengerFactory::create());
    
    $messenger = MessengerFactory::create();
    $messenger->say('Null DOMHandler');
  }
}

?>