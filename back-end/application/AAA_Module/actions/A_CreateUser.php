<?php
/*
    File        : A_CreateUser.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class A_CreateUser implements IAction
{
	public function execute()
	{
        //FILTERS
        $filter = FilterFactory::create();        

        //PARAMETERS
        $params = RequestParametersFactory::create();
        $name = $filter->filters($params->get('user-name'));
        $password = $params->get('user-password');
        $passwordConfirmation = $params->get('password-confirmation');
        $encryptPassword = crypt($password);
        
        //VALIDATION
        $datahandler = DatahandlerFactory::create();
        $datahandler['D_ReadUserByName']->setInData($name);
        $data = $datahandler['D_ReadUserByName']->getOutData();
        $validator = ValidatorFactory::create();
        $validator->ifTrue(($data['name'] != null))->respond(EXISTING_USER);
        $validator->ifFalse( ($password == $passwordConfirmation) )->respond(PASSWORDS_NOT_MATCH);

        //DATAHANDLER
        $datahandler['D_CreateUser']->setInData
                    (
                        array
                        (
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