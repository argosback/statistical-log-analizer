<?php
/*
    File        : A_Main.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class A_Main implements IAction
{
	public function execute()
	{
        //SESSION
        $session = SessionFactory::create();
        
		if ($session->get("authenticated") == null) $session->set("authenticated", false);

		if ($session->get("authorized") == null) $session->set("authorized", false);

		//ACTIONS
		$actions = ActionFactory::create();
		
		//REQUESTHANDLER AND SELECTACTIONKEY
		$requestHandler = RequestHandlerFactory::create();
		$selectedActionKey = $requestHandler->getSelectedActionKey();			
		
		//VALIDATOR
		$validator = ValidatorFactory::create();
		
		//REDIRECTOR
		$redirector = RedirectorFactory::create();

////LOGICA DE AUTENTICACIÓN Y AUTORIZACIÓN:
		//Si no está autenticado se ejecuta la acción de autenticación
		//, esto podría ser también si selecciona Authenticate
		$validator->ifFalse( $session->get("authenticated") )
					->execute($actions['A_Authenticate']);	
		
		//Si selecciona Logout Action se le permite ejecutar siempre.
		$validator->ifTrue( $selectedActionKey == 'A_Logout' )
					->execute($actions['A_Logout']);

		//Si después de ser autenticado entra aquí no está autenticado 
		//se ejecuta Logout:
		$validator->ifFalse( $session->get("authenticated") )
					->execute($actions['A_Logout']);

		//Si está autenticado y no autorizado se ejecuta la acción de autorización
		//(siempre se debe autorizar, para que esto sea más eficiente armar un cache en
		//session con las acciones autorizadas)
		$actions['A_Authorize']->execute();

		//Si está autenticado y no autorizado:
		// $validator->ifFalse( $authorizer->isAuthorized() )
		$validator->ifFalse( $session->get("authorized") )
					->respond(NO_AUTHORIZED_ACTION);

		/*Si está autenticado y autorizado y quiere ejecutar login lo 
		redirijo a default a default action:*/
		$validator->ifTrue( $selectedActionKey == "A_Authenticate" )
					->redirectTo('index.php?A_EnterFilterDataForm');

		//Si está autenticado y autorizado y ejecuta una acción no existente
		$validator->ifFalse( array_key_exists($selectedActionKey, $actions) )
					->respond($selectedActionKey." ".NOT_IMPLEMENTED);

		//Si está autenticado y autorizado y ejecuta una acción existente
		$actions[$selectedActionKey]->execute();
	}
}

?>
