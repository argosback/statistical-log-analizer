<?php
/*
    File        : A_Logout.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class A_Logout implements IAction
{
	public function execute()
	{
		$session = SessionFactory::create();
		$session->destroy();

		$view = ViewFactory::create('V_Logout');
       	$view->display();
        exit();
	}
}

?>