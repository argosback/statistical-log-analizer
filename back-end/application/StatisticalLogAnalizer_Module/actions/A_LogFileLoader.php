<?php
/*
    File        : A_LogFileLoader.php

    Project     : Statistical Log Analizer

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class A_LogFileLoader implements IAction
{
	public function execute()
	{
		//VIEW
        $view = ViewFactory::create('V_LogFileLoader');
        $view->display();
	}
}
?>