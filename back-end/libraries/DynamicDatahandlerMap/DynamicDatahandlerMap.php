<?php 
/*
    File        : DynamicDatahandlerMap.php

    Project     : Classset

    Authors     : Gabriel Nicolás González Ferreira

    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/ 

class DynamicDatahandlerMap implements IMap
{
  private static $_instance;
  private $datahandlersPaths = array();
  private $datahandlerMap;

  private function __construct($datahandlersPaths)
  {
    $this->datahandlersPaths = $datahandlersPaths;
    $this->datahandlerMap = array();
    $this->loadDatahandler();
  }

  public static function getInstance($datahandlersPaths)
  {
      if (!(self::$_instance instanceof self))
      {
        self::$_instance = new self($datahandlersPaths);
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

  private function addDatahandler($datahandlerKey, $datahandler)
  {
    $this->datahandlerMap[$datahandlerKey] = $datahandler;
    return $this;
  }

  //http://php.net/manual/es/function.readdir.php
  private function loadDatahandler()
  {
    foreach ($this->datahandlersPaths as $datahandlersPath) 
    {
        if ($directoryHandle = opendir($datahandlersPath)) 
        {
            while (false !== ($file = readdir($directoryHandle))) 
            { 
                if( is_dir($file) )
                {
                  continue;
                }
                else
                {
                  $filename = str_replace(".php", "", $file);
                  if(class_exists($filename))
                  {
                    $datahandler = new $filename;
                    if(($datahandler instanceof IDataget) or ($datahandler instanceof IDataset))
                    {
                      $this->addDatahandler($filename, $datahandler);
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
      return $this->datahandlerMap;
    }
    else
    {
      return $this->datahandlerMap[$key];
    }
  }

  public function __destruct()
  {
  }
}