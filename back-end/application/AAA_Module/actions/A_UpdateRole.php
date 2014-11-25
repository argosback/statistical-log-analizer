<?php
/*
    File        : A_UpdateRole.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class A_UpdateRole implements IAction
{
	public function execute()
	{
        //PARAMETERS
        $params = RequestParametersFactory::create();
        $name = $params->get('role-name');
        $description = $params->get('role-description');

        $session = SessionFactory::create();
        $id = $session->get('role-id');

        //FILTERS
        $filter = FilterFactory::create();
        $filteredName = $filter->filters($name);
        $filteredDescription = $filter->filters($description);

        //VALIDATOR
        $validator = ValidatorFactory::create();

        //DATASET
        $datahandler = DatahandlerFactory::create('D_UpdateRole');
        $datahandler->setInData
                    (
                        array
                        (
                            "id" => "$id",
                            "name" => "$filteredName", 
                            "description" => "$filteredDescription"
                        )
                    );

        //REDIRECTOR
        $redirector = RedirectorFactory::create();
        $redirector->redirectTo('index.php?A_ReadRolesPaginated');
	}
}

?>