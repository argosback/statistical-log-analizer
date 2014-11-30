<?php
/*
    File        : HtmlElementsFactory.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira

    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class HtmlElementsFactory implements IFactory
{	
  public static function create($id)
  {
    if($id == 'table') 
      return new Table();
    
    $messenger = MessengerFactory::create();
    $messenger->say('Null HtmlElement');
  }
}

?>