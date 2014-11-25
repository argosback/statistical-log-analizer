<?php 
/*
    File        : DynamicActionMap.php

    Project     : Classset

    Authors     : Gabriel Nicolás González Ferreira

    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/ 

class DynamicActionMap implements IMap
{
    private static $_instance;
    private $actionsPaths = array();
    private $actionMap;

    private function __construct($actionsPaths)
    {
      $this->actionsPaths = $actionsPaths;
      $this->actionMap = array();
      $this->loadAction();
    }

    public static function getInstance($actionsPaths)
    {
        if (!(self::$_instance instanceof self))
        {
          self::$_instance = new self($actionsPaths);
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

    private function addAction($actionKey, IAction $action)
    {
      $this->actionMap[$actionKey] = $action;
      return $this;
    }

    //http://php.net/manual/es/function.readdir.php
    private function loadAction()
    {
      foreach ($this->actionsPaths as $actionsPath) 
      {
          if ($directoryHandle = opendir($actionsPath)) 
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
                      $action = new $filename;
                      if($action instanceof IAction)
                      {
                        $this->addAction($filename, $action);
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
        return $this->actionMap;
      }
      else
      {
        return $this->actionMap[$key];
      }
    }

    public function __destruct()
    {
    }
}