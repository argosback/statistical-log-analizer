<?php
/*
    File        : PaginatorFactory.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira

    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class PaginatorFactory implements IFactory
{	
  public static function create($id = "Paginator")
  {
    if($id == "Paginator") return new Paginator( HttpSession::getInstance() );

    $messenger = MessengerFactory::create();
    $messenger->say('Null Paginator');
  }
}

?>