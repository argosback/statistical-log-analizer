<?php
/*
    File        : A_ReadUsersPaginated.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class A_ReadUsersPaginated implements IAction
{
    public function execute()
    {
        //PARAMETERS
        $params = RequestParametersFactory::create();
        $pageNumber = $params->get('page-number');
        $rowsPerPage = $params->get('rows-per-page');
        
        //PAGINATOR
        $paginator = PaginatorFactory::create();
        $paginator->pageNumber = $pageNumber;
        $paginator->rowsPerPage = 5;

        //DATAHANDLERS
        $datahandler = DatahandlerFactory::create('D_ReadUsersPaginated');

        $users = $datahandler->getOutData();

        $datahandler = DatahandlerFactory::create('D_UsersRowsTotalNumber');
        $userRowsTotalNumber = $datahandler->getOutData();
        
        //PAGINATOR
        $paginator->rowsTotalNumber = $userRowsTotalNumber;

        //VIEW

        $view = ViewFactory::create('V_ReadUsersPaginated');
        $view->setInData(                                    
                            array
                            (
                                "users" => $users,
                            )
                        );
        $view->display();
    }
}

?>