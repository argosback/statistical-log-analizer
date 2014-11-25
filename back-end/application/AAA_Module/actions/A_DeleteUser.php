<?php
/*
    File        : A_DeleteUser.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class A_DeleteUser implements IAction
{
	public function execute()
	{
        $session = SessionFactory::create();
        $id = $session->get('user-id');

        $datahandler = DatahandlerFactory::create('D_DeleteUser');
        $datahandler->setInData($id);

        $redirector = RedirectorFactory::create();
        $redirector->redirectTo('index.php?A_ReadUsersPaginated');
	}
}

?>