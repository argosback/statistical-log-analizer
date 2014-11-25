<?php
/*
    File        : ViewFactory.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira

    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class ViewFactory implements IFactory
{	
  public static function create($id = null)
  {
    $pathsProvider = PathsProvider::init();
    return DynamicViewMap::getInstance( $pathsProvider->getViewsDirs() )->generate($id);
  }
}

?>