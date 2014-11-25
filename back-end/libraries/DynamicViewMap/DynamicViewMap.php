<?php 
/*
    File        : DynamicViewMap.php

    Project     : Classset

    Authors     : Gabriel Nicolás González Ferreira

    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/ 

class DynamicViewMap implements IMap
{
  private static $_instance;
  private $viewsPaths = array();
  private $viewMap;

  private function __construct($viewsPaths)
  {
    $this->viewsPaths = $viewsPaths;
    $this->viewMap = array();
    $this->loadView();
  }

  public static function getInstance($viewsPaths)
  {
      if (!(self::$_instance instanceof self))
      {
        self::$_instance = new self($viewsPaths);
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

  private function addView($viewKey, IView $view)
  {
    $this->viewMap[$viewKey] = $view;
    return $this;
  }

  //http://php.net/manual/es/function.readdir.php
  private function loadView()
  {
    foreach ($this->viewsPaths as $viewsPath) 
    {
        if ($directoryHandle = opendir($viewsPath)) 
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
                    $view = new $filename;
                    if($view instanceof IView)
                    {
                      $this->addView($filename, $view);
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
      return $this->viewMap;
    }
    else
    {
      return $this->viewMap[$key];
    }
  }

  public function __destruct()
  {
  }
}