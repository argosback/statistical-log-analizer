<?php
/*
    File        : MessengerFactory.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira

    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class MessengerFactory implements IFactory
{	
  public static function create($id = 'HtmlMessenger')
  {
    if($id == 'HtmlMessenger') 
      return new HtmlMessenger(new V_Messenger);
  }
}

?>