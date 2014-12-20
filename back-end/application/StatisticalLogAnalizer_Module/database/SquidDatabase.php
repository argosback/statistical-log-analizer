<?php
/*
    File        : SquidDatabase.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0

    IDE         : Sublime Text 2.02
*/  

class SquidDatabase implements IDatabase
{
    private static $_instance;
    
    /* methods: */
    private function __construct(){}

    //to_prevent cloned:
    private function __clone()
    {
        trigger_error
        (
            'Invalid Operation: You can not clone an instance of '
            . get_class($this) ." class.", E_USER_ERROR 
        );
    }

    //to prevent deserialization:
    private function __wakeup()
    {
        trigger_error
        (
            'Invalid Operation: You can not deserialize an instance of '
            . get_class($this) ." class."
        );
    }

    public static function getInstance()
    {
        if (!(self::$_instance instanceof self))
        {
          self::$_instance=new self();
        }
        return self::$_instance;
    }

    public function connect()
    {
        $dbh = DatabaseHandler::getInstance();
        $dbh->filePath = __DIR__.'/squid_database.sqlite';
        $dbh -> openDBMS('sqlite');
        return $dbh;
    }
}