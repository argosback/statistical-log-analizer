<?php
/*
    File        : A_CreateRoleForm.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class A_CreateRoleForm implements IAction
{
	public function execute()
	{
        $view = ViewFactory::create('V_CreateRoleForm');
        $view->display();
    }
}

?>