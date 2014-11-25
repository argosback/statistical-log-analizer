<?php
/*
    File        : A_SelectUserToAssignRoles.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class A_SelectUserToAssignRoles implements IAction
{
	public function execute()
	{
        $datahandler = DatahandlerFactory::create('D_ReadAllUsers');
        $data = $datahandler->getOutData();
		
        $view = ViewFactory::create('V_SelectUserToAssignRoles');
        $view->setInData($data);
		$view->display();
	}
}

?>