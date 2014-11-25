<?php
/*
    File        : A_ReadActionsWithStatus.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class A_ReadActionsWithStatus implements IAction
{
	public function execute()
	{
        //PARAMETERS
        $params = RequestParametersFactory::create();
        $roleId = $params->get('selected-role-id');
        $pageNumber = $params->get('page-number');
        $rowsPerPage = $params->get('rows-per-page');
        
        //PAGINATOR
        $paginator = PaginatorFactory::create();
        $paginator->pageNumber = $pageNumber;

        $datahandler = DatahandlerFactory::create('D_ActionsRowsTotalNumber');
        $actionsRowsTotalNumber = $datahandler->getOutData();
        $paginator->rowsPerPage = $actionsRowsTotalNumber;
        
        //Always force a single page
        $paginator->rowsPerPage = $actionsRowsTotalNumber;

        //SESSION
        $session = SessionFactory::create();
        $session->set('selected-role-id',$roleId);

        //DATAHANDLER
        $datahandler = DatahandlerFactory::create('D_ReadActionsWithStatus');
        $datahandler->setInData($roleId);
        $roleActions = $datahandler->getOutData();
 
        //DATAHANDLER
        $datahandler = DatahandlerFactory::create('D_ReadRoleById');
        $datahandler->setInData($roleId);
        $roleData = $datahandler->getOutData();
        
        //SESSION
        $session->set('selected-role-name',$roleData['name']);
        
        $data = array
                (
                    'role-actions' => $roleActions,
                    'role-name' => $roleData['name'] 
                );

        //VIEW
        $view = ViewFactory::create('V_ReadActionsWithStatus');
        $view->setInData($data);
        $view->display();
	}
}

?>