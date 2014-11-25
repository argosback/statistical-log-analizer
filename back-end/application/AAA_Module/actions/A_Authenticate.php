<?php
/*
    File        : A_Authenticate.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class A_Authenticate implements IAction
{
	public function execute()
	{
        //SESSION
        $session = SessionFactory::create();

        //PARAMETERS
        $params = RequestParametersFactory::create();
        $session = SessionFactory::create();

        if( !$session->get("authenticated") and $params->get('public_key') == $session->get('randLogin') )
        {
            //PARAMETERS:
            $params = RequestParametersFactory::create();
            $username = $params->get('user-name');
            $userpassword = $params->get('user-password');
            $filter = FilterFactory::create();
            $filteredUsername = $filter->filters($username);

            //DATAHANDLER
            $datahandler = DatahandlerFactory::create('D_ReadUserByName');
            $datahandler->setInData($filteredUsername);
            $existingUser = $datahandler->getOutData();    

            //ENCRYPTOR
            $isAuthenticate = (crypt($userpassword, $existingUser['password']) === $existingUser['password']);

            if( $isAuthenticate )
            {
                //SET SESSION DATA
                $session->set('session-user-name', $existingUser['name']);
                $session->set('session-user-id', $existingUser['id']);
                $session->set("authenticated", true);
            }
            else
            {
                $session->set("authenticated", false);
            }            
        }
    }
}

?>