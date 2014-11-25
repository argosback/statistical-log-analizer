<?php
/*
    File        : A_DeleteRoleConfirmation.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class A_DeleteRoleConfirmation implements IAction
{
	public function execute()
	{
        $params = RequestParametersFactory::create();
        $id = $params->get('role-id');

        $validator = ValidatorFactory::create();
        $validator->ifTrue( ($id == "1") )->respond(NOT_DELETE_ADMIN);

        $datahandler = DatahandlerFactory::create('D_ReadUsedRoles');
        $datahandler->setInData($id);
        $data = $datahandler->getOutData();

        $validator->ifTrue( ($data != array()) )->respond(USED_ROLE);

        $session = SessionFactory::create();
        $session->set('role-id', $id);

        $datahandler = DatahandlerFactory::create('D_ReadRoleById');
        $datahandler->setInData($id);
        $data = $datahandler->getOutData();

        $view = ViewFactory::create('V_DeleteRoleConfirmation');
        $view->setInData($data);
        $view->display();
        
        unset($datahandler, $view);
	}
}

?>