<?php
/*
    File        : A_ReadRolesPaginated.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class A_ReadRolesPaginated implements IAction
{
    public function execute()
    {
        //PARAMETERS
        $params = RequestParametersFactory::create();
        $pageNumber = $params->get('page-number');
        $rowsPerPage = $params->get('rows-per-page');
        
        $paginator = PaginatorFactory::create();
        $paginator->pageNumber = $pageNumber;
        $paginator->rowsPerPage = $rowsPerPage;

        //DATAHANDLERS
        $datahandler = DatahandlerFactory::create('D_ReadRolesPaginated');

        $roles = $datahandler->getOutData();

        $datahandler = DatahandlerFactory::create('D_RolesRowsTotalNumber');
        $roleRowsTotalNumber = $datahandler->getOutData();
        $paginator->rowsTotalNumber = $roleRowsTotalNumber;

        //VIEW

        $view = ViewFactory::create('V_ReadRolesPaginated');
        $view->setInData(                                    
                            array
                            (
                                "roles" => $roles,
                            )
                        );
        $view->display();
    }
}

?>