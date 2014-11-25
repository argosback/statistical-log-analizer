<?php
/*
    File        : A_SearchRolesByName.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class A_SearchRolesByName implements IAction
{
	public function execute()
	{
        $params = RequestParametersFactory::create();
        $name = $params->get('search-target');
        
        $datahandler = DatahandlerFactory::create('D_SearchRolesByName');
        $datahandler->setInData($name);
        $data = $datahandler->getOutData();
        
        $view = ViewFactory::create('V_ReadAllRoles');
        $view->setInData($data);
        $view->display();
	}
}

?>