<?php
/*
    File        : A_ReadRolesWithStatus.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class A_ReadRolesWithStatus implements IAction
{
	public function execute()
	{
        //PARAMETERS
        $params = RequestParametersFactory::create();
        $userId = $params->get('selected-user-id');

        //SESSION
        $session = SessionFactory::create();
        $session->set('selected-user-id',$userId);

        //DATAHANDLER
        $datahandler = DatahandlerFactory::create('D_ReadRolesWithStatus');
        $datahandler->setInData($userId);
        $userRoles = $datahandler->getOutData();
 
        //DATAHANDLER
        $datahandler = DatahandlerFactory::create('D_ReadUserById');
        $datahandler->setInData($userId);
        $userData = $datahandler->getOutData();

        $data = array
                (
                    'user-roles' => $userRoles,
                    'user-name' => $userData['name'] 
                );

        //VIEW
        $view = ViewFactory::create('V_ReadRolesWithStatus');
        $view->setInData($data);
        $view->display();
	}
}

?>