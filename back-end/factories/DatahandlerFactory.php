<?php
/*
    File        : DatahandlerFactory.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira

    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class DatahandlerFactory implements IFactory
{	
  public static function create($id = null)
  {
    $pathsProvider = PathsProvider::init();
    return DynamicDatahandlerMap::getInstance( $pathsProvider->getDatahandlersDirs() )->generate($id);
  }
}

?>