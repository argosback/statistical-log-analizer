<?php
/*
    File        : A_CreateRole.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class A_CreateRole implements IAction
{
	public function execute()
	{
        //PARAMETERS
        $params = RequestParametersFactory::create();
        $name = $params->get('role-name');
        $description = $params->get('role-description');
        
        //FILTERS
        $filter = FilterFactory::create();
        $filteredName = $filter->filters($name);

        //VALIDATOR//VALIDO QUE EL ROLE YA NO EXISTA
        $datahandler = DatahandlerFactory::create();
        $datahandler['D_ReadRoleByName']->setInData($filteredName);
        $existingRole = $datahandler['D_ReadRoleByName']->getOutData();
        $validator = ValidatorFactory::create();
        $validator->ifFalse( ($existingRole['name'] == null) )
                    ->respond(EXISTING_ROLE);

        //DATAHANDLER
        $datahandler['D_CreateRole']->setInData
                    (
                        array
                        (
                            "name" => "$name", 
                            "description" => "$description"
                        )
                    );

        //REDIRECTOR
        $redirector = RedirectorFactory::create();
        $redirector->redirectTo('index.php?A_ReadRolesPaginated');
	}
}

?>