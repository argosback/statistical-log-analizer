<?php
/*
    File        : ValidatorFactory.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira

    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class ValidatorFactory implements IFactory
{	
  public static function create($id = 'Validator')
  {
    if($id == 'Validator') 
      return new Validator(new NullValidator, MessengerFactory::create(), RedirectorFactory::create());
    
    $messenger = MessengerFactory::create();
    $messenger->say('Null Validator');
  }
}

?>