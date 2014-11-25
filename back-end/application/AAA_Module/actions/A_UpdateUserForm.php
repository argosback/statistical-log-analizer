<?php
/*
    File        : A_UpdateUserForm.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class A_UpdateUserForm implements IAction
{
	public function execute()
	{
        $params = RequestParametersFactory::create();
        $id = $params->get('user-id');

        // $validator = ValidatorFactory::create();
        // $validator->ifFalse(is_integer($id))->respond(NOT_VALID_ID);

        $session = SessionFactory::create();
        $session->set('user-id', $id);
   
        $datahandler = DatahandlerFactory::create('D_ReadUserById');
        $datahandler->setInData($id);
        $data = $datahandler->getOutData();

        $view = ViewFactory::create('V_UpdateUserForm');
        $view->setInData($data);
        $view->display();
	}
}

?>