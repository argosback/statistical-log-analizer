<?php
/*
    File        : A_DeleteUserConfirmation.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class A_DeleteUserConfirmation implements IAction
{
	public function execute()
	{
        $params = RequestParametersFactory::create();
        $id = $params->get('user-id');

        $validator = ValidatorFactory::create();
        $validator->ifTrue( ($id == "1") )->respond(NOT_DELETE_ADMIN);

        $session = SessionFactory::create();
        $session->set('user-id', $id);

        $datahandler = DatahandlerFactory::create('D_ReadUserById');
        $datahandler->setInData($id);
        $data = $datahandler->getOutData();

        $view = ViewFactory::create('V_DeleteUserConfirmation');
        $view->setInData($data);
        $view->display();
        
        unset($datahandler, $view);
	}
}

?>