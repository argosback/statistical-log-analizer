<?php
/*
    File        : A_SearchActionsByName.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class A_SearchActionsByName implements IAction
{
	public function execute()
	{
        //PARAMETERS
        $params = RequestParametersFactory::create();
        
        //SESSION
        $session = SessionFactory::create();

        $datahandler = DatahandlerFactory::create('D_SearchActionsByName');

                $data = array
                (
                    'selected-role-id' => $session->get('selected-role-id'),
                    'search-action-name' =>  $params->get('search-target')
                );

        $datahandler->setInData($data);
        $roleActions = $datahandler->getOutData();
        
            $data = array
            (
                'role-actions' => $roleActions,
                'role-name' => $session->get('selected-role-name')
            );

        $view = ViewFactory::create('V_ReadActionsWithStatus');
        $view->setInData($data);
        $view->display();
	}
}

?>