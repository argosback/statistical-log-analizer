<?php
/*
    File        : PathsProvider.php

    Project     : Classset PHP 

    Author      : Gabriel Nicolas González Ferreira
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/
class PathsProvider
{
    private static $directories;
    
    public static function init()
    {
        if (!(self::$directories instanceof self))
        {
            self::$directories = new self();
        }
        return self::$directories;
    }

    private function __construct()
    {
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

    public function getDatabasesDirs()
    {
        //Database
        return array
                    (
                        'back-end/application/AAA_Module/database/'
                    );
    } 

    public function getConfigurationsDirs()
    {
		//Configurations
		return array
					(
						'back-end/configurations/'
					);
    }     

    public function getConstantsFiles()
    {
        //Constants
		return array
					(
						'back-end/configurations/Constants.php'
					);
    }    

    public function getMessagesFiles()
    {
        //Messages
		return array
					(
						'back-end/configurations/SpanishMessages.php',
						'back-end/configurations/EnglishMessages.php'
					);
    }

    public function getInterfacesDirs()
    {
		//Interfaces
		return array
					(
						'back-end/interfaces/'
					);
    }  

    public function getLibrariesDirs()
    {
		//Libraries
		return array
					(
						'back-end/libraries/'
					);
    }  

    public function getFactoriesDirs()
    {
		//Factories
		return array
					(
						'back-end/factories/'
					);
    }

    public function getActionsDirs()
    {
		//Actions
		return array
					(
                        'back-end/application/AAA_Module/actions/',
						'back-end/application/StatisticalMonitor_Module/actions/'

					);
    }

    public function  getDatahandlersDirs()
    {
		//Datahandlers
		return array
					(
                        'back-end/application/AAA_Module/datahandlers/',
						'back-end/application/StatisticalMonitor_Module/datahandlers/'
					);
    }


    public function  getViewsDirs()
    {
		//Views
		return array
					(
                        'back-end/application/AAA_Module/views/',
						'back-end/application/StatisticalMonitor_Module/views/'
					);
    }

    public function getVendorsDirs()
    {
        //Vendors
        return array
                    (
                        'back-end/vendors/'
                    );
    } 

}