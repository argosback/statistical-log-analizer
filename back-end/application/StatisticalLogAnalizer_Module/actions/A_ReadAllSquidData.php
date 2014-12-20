<?php
/*
    File        : A_ReadAllSquidData.php

    Project     : Statistical Log Analizer

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class A_ReadAllSquidData implements IAction
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
        $paginator->rowsPerPage = 10;

        //DATAHANDLERS
        $datahandler = DatahandlerFactory::create('D_ReadAllSquidData');

        $data = $datahandler->getOutData();

        $datahandler = DatahandlerFactory::create('D_SquidDataRowsTotalNumber');
        $rowsTotalNumber = $datahandler->getOutData();
        
        //PAGINATOR
        $paginator->rowsTotalNumber = $rowsTotalNumber;

        //VIEW

        $view = ViewFactory::create('V_ReadAllSquidData');
        $view->setInData($data);
        $view->display();
    }
}
?>