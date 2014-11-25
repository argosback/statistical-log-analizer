<?php
/*
    File        : A_UpdateActions.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class A_UpdateActions implements IAction
{
	public function execute()
	{
        //SESSION
        $session = SessionFactory::create();
        $selectedRoleId = $session->get('selected-role-id');
        
        //ACTIONS
        $actions = ActionFactory::create();

        $datahandler = DatahandlerFactory::create('D_UpdateActions');
        $data = $datahandler->setIndata($actions);

        //REDIRECTOR
        $redirector = RedirectorFactory::create();
        $redirector->redirectTo('index.php?selected-role-id='.$selectedRoleId.'&A_ReadActionsWithStatus');
	}
}

?>