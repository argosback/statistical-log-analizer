<?php
/*
    File        : A_SaveActionsForTheRole.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class A_SaveActionsForTheRole implements IAction
{
	public function execute()
	{
        //SESSION
        $session = SessionFactory::create();
        $selectedRoleId = $session->get('selected-role-id');

        //PARAMETERS
        $parameters = RequestParametersFactory::create();
        $selectedActionsNames = $parameters->get('selected-actions-names');

        //DATAHANDLER
        $datahandler = DatahandlerFactory::create('D_SaveActionsForTheRole');
        $data = array
                (
                    'selected-role-id' => $selectedRoleId,
                    'selected-actions-names' => $selectedActionsNames
                );
        $datahandler->setInData($data);
		
        //REDIRECTOR
        $redirector = RedirectorFactory::create();
        $redirector->redirectTo('index.php?selected-role-id='.$selectedRoleId.'&A_ReadActionsWithStatus');
	}
}

?>