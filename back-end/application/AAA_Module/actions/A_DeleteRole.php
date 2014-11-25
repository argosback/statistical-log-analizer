<?php
/*
    File        : A_DeleteRole.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class A_DeleteRole implements IAction
{
	public function execute()
	{
        $session = SessionFactory::create();
        $id = $session->get('role-id');

        $datahandler = DatahandlerFactory::create('D_DeleteRole');
        $datahandler->setInData($id);

        $redirector = RedirectorFactory::create();
        $redirector->redirectTo('index.php?A_ReadRolesPaginated');
	}
}

?>