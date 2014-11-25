<?php
/*
    File        : FilterFactory.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira

    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class FilterFactory implements IFactory
{	
    public static function create($id = "SqliteScape")
    {
        if($id == "SqliteScape") return new SqliteEscapeFilter;
        if($id == "PostgreScape") return new PostgreEscapeFilter;
        
        $messenger = MessengerFactory::create();
        $messenger->say('Null Filter');
    }
}

?>