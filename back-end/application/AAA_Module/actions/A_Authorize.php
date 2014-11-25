<?php
/*
    File        : A_Authorize.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class A_Authorize implements IAction
{
	public function execute()
	{
		//Session User ID
		$session = SessionFactory::create();
		$userId = $session->get('session-user-id');

		//Request Handler
		$requestHandler = RequestHandlerFactory::create();
		$selectedActionKey = $requestHandler->getSelectedActionKey();
		
		//Datahandler
		$datahandler = DatahandlerFactory::create('D_ReadAllowedRoles');
		$datahandler->setInData
							(
								array
								(
									'action-name' => $selectedActionKey,  
									'user-id' => $userId,
									'admin-role-id' => 1
								)
							);
		$allowedRoles = $datahandler->getOutData(); 

		$isAuthorize = ( $allowedRoles != array() );

		if($isAuthorize)
		{
			$session->set("authorized", true);
		}
		else
		{
			$session->set("authorized", false);
		}
	}
}

?>