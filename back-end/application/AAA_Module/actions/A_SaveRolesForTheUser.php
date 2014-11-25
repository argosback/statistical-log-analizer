<?php
/*
    File        : A_SaveRolesForTheUser.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class A_SaveRolesForTheUser implements IAction
{
	public function execute()
	{
        //SESSION
        $session = SessionFactory::create();
        $selectedUserId = $session->get('selected-user-id');

        //PARAMETERS
        $parameters = RequestParametersFactory::create();
        $selectedRolesIds = $parameters->get('selected-roles-ids');

        //DATAHANDLER
        $datahandler = DatahandlerFactory::create('D_SaveRolesForTheUser');
        $data = array
                (
                    'selected-user-id' => $selectedUserId,
                    'selected-roles-ids' => $selectedRolesIds
                );
        $datahandler->setInData($data);
		
        //REDIRECTOR
        $redirector = RedirectorFactory::create();
        $redirector->redirectTo('index.php?selected-user-id='.$selectedUserId.'&A_ReadRolesWithStatus');
	}
}

?>