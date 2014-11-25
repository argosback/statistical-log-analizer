<?php
/*
    File        : A_UpdateRoleForm.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class A_UpdateRoleForm implements IAction
{
	public function execute()
	{
        $params = RequestParametersFactory::create();
        $id = $params->get('role-id');

        // $validator = ValidatorFactory::create();
        // $validator->ifFalse(is_integer($id))->respond(NOT_VALID_ID);

        $session = SessionFactory::create();
        $session->set('role-id', $id);
   
        $datahandler = DatahandlerFactory::create('D_ReadRoleById');
        $datahandler->setInData($id);
        $data = $datahandler->getOutData();

        $view = ViewFactory::create('V_UpdateRoleForm');
        $view->setInData($data);
        $view->display();
	}
}

?>