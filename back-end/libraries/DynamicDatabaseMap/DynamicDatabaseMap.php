<?php 
/*
    File        : DynamicDatabaseMap.php

    Project     : Classset

    Authors     : Gabriel Nicolás González Ferreira

    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/ 

class DynamicDatabaseMap implements IMap
{
    private static $_instance;
    private $databasesPaths = array();
    private $databaseMap;

    private function __construct($databasesPaths)
    {
      $this->databasesPaths = $databasesPaths;
      $this->databaseMap = array();
      $this->loadDatabase();
    }

    public static function getInstance($databasesPaths)
    {
        if (!(self::$_instance instanceof self))
        {
          self::$_instance = new self($databasesPaths);
        }
        return self::$_instance;
    }

    //to_prevent cloned:
    private function __clone()
    {
        trigger_error
        (
            'Invalid Operation: You cannot clone an instance of '
            . get_class($this) ." class.", E_USER_ERROR 
        );
    }

    //to prevent deserialization:
    private function __wakeup()
    {
        trigger_error
        (
            'Invalid Operation: You cannot deserialize an instance of '
            . get_class($this) ." class."
        );
    }

    private function addDatabase($databaseKey, $databaseConnection)
    {
      $this->databaseMap[$databaseKey] = $databaseConnection;
      return $this;
    }

    //http://php.net/manual/es/function.readdir.php
    private function loadDatabase()
    {
      foreach ($this->databasesPaths as $databasesPath) 
      {
          if ($directoryHandle = opendir($databasesPath)) 
          {
              while (false !== ($file = readdir($directoryHandle))) 
              { 
                  // if ($file == '.' || $file == '..') 
                  // {
                  //   continue;
                  // } 
                  if( is_dir($file) )
                  {
                    continue;
                  }
                  else
                  {
                    $filename = str_replace(".php", "", $file);
                    if(class_exists($filename))
                    {
                      // echo $filename;
                      $database = $filename::getInstance();
                      if($database instanceof IDatabase)
                      {
                        $this->addDatabase($filename, $database);
                      }
                    }
                  }
              } 
              closedir($directoryHandle);
          }
      }
    }

    public function generate($key = null)
    {
      if ($key==null) 
      {
        return $this->databaseMap;
      }
      else
      {
        return $this->databaseMap[$key];
      }
    }

    public function __destruct()
    {
    }
}