<?php
/*
    File        : Autoloader.php

    Project     : Classset

    Author      : Felipe Evans and Gabriel Nicolás González Ferreira

    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/
    
require_once 'PathsProvider.php';

class Autoloader
{
    private static $_loader;
    
    public static function init()
    {
        if (!(self::$_loader instanceof self))
        {
            self::$_loader=new self();
        }
        return self::$_loader;
    }

    private function __construct()
    {
        /*** nullify any existing autoloads ***/
        spl_autoload_register(null, false);
 
        /*** specify extensions that may be loaded ***/
        spl_autoload_extensions('.php, .class.php');

        /*** register the loader functions ***/
        // $this->loadConstants();
        spl_autoload_register( array($this, 'loadDatabases') );
        
        spl_autoload_register( array($this, 'loadConfigurations') );
        
        spl_autoload_register( array($this, 'loadConstants') );
        spl_autoload_register( array($this, 'loadMessages') );

        spl_autoload_register( array($this, 'loadInterfaces') );
        spl_autoload_register( array($this, 'loadLibraries') );
        spl_autoload_register( array($this, 'loadFactories') );
        spl_autoload_register( array($this, 'loadActions') );
        spl_autoload_register( array($this, 'loadDatahandlers') );
        spl_autoload_register( array($this, 'loadViews') );
        spl_autoload_register( array($this, 'loadVendors') );
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
 
    /*** class Loaders ***/
    private function loadDatabases($class)
    {
        $filename = $class . '.php';
        $pathsProvider = PathsProvider::init();
        $directories = $pathsProvider->getDatabasesDirs();
        foreach ($directories as $directory) 
        {
            if (file_exists($directory.$filename))
            {
                require_once $directory.$filename;
            }
        }
    }

    private function loadConfigurations($class)
    {
        $filename = $class . '.php';
        $pathsProvider = PathsProvider::init();
        $directories = $pathsProvider->getConfigurationsDirs();
        foreach ($directories as $directory) 
        {
            if (file_exists($directory.$filename))
            {
                require_once $directory.$filename;
            }
        }
    }

    private function loadConstants()
    {
        $pathsProvider = PathsProvider::init();
        $directories = $pathsProvider->getConstantsFiles();
        foreach ($directories as $directory) 
        {
            if (file_exists($directory))
            {
                require_once $directory;
            }
        }
    }

    private function loadMessages()
    {
        $pathsProvider = PathsProvider::init();
        $directories = $pathsProvider->getMessagesFiles();
        foreach ($directories as $directory) 
        {
            if (file_exists($directory))
            {
                require_once $directory;
            }
        }
    }    

    private function loadInterfaces($class)
    {
        $filename = $class . '.php';
        $pathsProvider = PathsProvider::init();
        $directories = $pathsProvider->getInterfacesDirs();
        foreach ($directories as $directory) 
        {
            if (file_exists($directory.$filename))
            {
                require_once $directory.$filename;
            }
        }
    }

    private function loadLibraries($class)
    {
        $filename = $class ."/". $class . '.php';
        $pathsProvider = PathsProvider::init();
        $directories = $pathsProvider->getLibrariesDirs();
        foreach ($directories as $directory) 
        {
            if (file_exists($directory.$filename))
            {
                require_once $directory.$filename;
            }
        }
    }

    private function loadFactories($class)
    {
        $filename = $class . '.php';
        $pathsProvider = PathsProvider::init();
        $directories = $pathsProvider->getFactoriesDirs();
        foreach ($directories as $directory) 
        {
            if (file_exists($directory.$filename))
            {
                require_once $directory.$filename;
            }
        }
    }

    private function loadActions($class)
    {
        $filename = $class . '.php';
        $pathsProvider = PathsProvider::init();
        $directories = $pathsProvider->getActionsDirs();
        foreach ($directories as $directory) 
        {
            if (file_exists($directory.$filename))
            {
                require_once $directory.$filename;
            }
        }
    }

    private function loadDatahandlers($class)
    {
        $filename = $class . '.php';
        $pathsProvider = PathsProvider::init();
        $directories = $pathsProvider->getDatahandlersDirs();
        foreach ($directories as $directory) 
        {
            if (file_exists($directory.$filename))
            {
                require_once $directory.$filename;
            }
        }
    }

    private function loadViews($class)
    {
        $filename = $class . '.php';
        $pathsProvider = PathsProvider::init();
        $directories = $pathsProvider->getViewsDirs();
        foreach ($directories as $directory) 
        {
            if (file_exists($directory.$filename))
            {
                require_once $directory.$filename;
            }
        } 
    }

    private function loadVendors($class)
    {
        $filename = $class . '.php';
        $pathsProvider = PathsProvider::init();
        $directories = $pathsProvider->getVendorsDirs();
        foreach ($directories as $directory) 
        {
            if (file_exists($directory.$filename))
            {
                require_once $directory.$filename;
            }
        }
    }
}
?>