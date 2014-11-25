<?php
/*
    File        : A_UpdateUser.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class A_UpdateUser implements IAction
{
	public function execute()
	{
        //PARAMETERS
        $params = RequestParametersFactory::create();
        $name = $params->get('user-name');
        $password = $params->get('user-password');
        $passwordConfirmation = $params->get('password-confirmation');
        $encryptPassword = crypt($password);

        $session = SessionFactory::create();
        $id = $session->get('user-id');

        //FILTERS
        $filter = FilterFactory::create();
        $filter->filters($name);

        //VALIDATOR
        $validator = ValidatorFactory::create();
        $validator->ifFalse( ($password == $passwordConfirmation) )
                    ->respond(PASSWORDS_NOT_MATCH);

        //DATASET
        $datahandler = DatahandlerFactory::create('D_UpdateUser');
        $datahandler->setInData
                    (
                        array
                        (
                            "id" => "$id",
                            "name" => "$name", 
                            "password" => "$encryptPassword"
                        )
                    );

        //REDIRECTOR
        $redirector = RedirectorFactory::create();
        $redirector->redirectTo('index.php?A_ReadUsersPaginated');
	}
}

?>