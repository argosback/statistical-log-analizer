<?php
/*
    File        : DatabaseFactory.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira

    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class DatabaseFactory implements IFactory
{	
  public static function create($id = null)
  {
    $pathsProvider = PathsProvider::init();
    return DynamicDatabaseMap::getInstance( $pathsProvider->getDatabasesDirs() )->generate($id);
  }
}

?>