<?php
/*
    File        : ActionFactory.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira

    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class ActionFactory implements IFactory
{	
  public static function create($id = null)
  {
    $pathsProvider = PathsProvider::init();
    return DynamicActionMap::getInstance( $pathsProvider->getActionsDirs() )->generate($id);
  }
}

?>