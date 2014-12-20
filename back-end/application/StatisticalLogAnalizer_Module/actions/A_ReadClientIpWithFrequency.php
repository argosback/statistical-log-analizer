<?php
/*
    File        : A_ReadClientIpWithFrequency.php

    Project     : Statistical Log Analizer

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class A_ReadClientIpWithFrequency implements IAction
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
        $datahandler = DatahandlerFactory::create('D_SquidDataRowsTotalNumber');
        $rowsTotalNumber = $datahandler->getOutData();
        //Always force a single page
        $paginator->rowsPerPage = $rowsTotalNumber;

        //DATAHANDLERS
        $datahandler = DatahandlerFactory::create('D_ReadClientIpWithFrequency');
        $data = $datahandler->getOutData();

        
        //PAGINATOR
        $paginator->rowsTotalNumber = $rowsTotalNumber;

        //VIEW

        $view = ViewFactory::create('V_ReadClientIpWithFrequency');
        $view->setInData($data);
        $view->display();
    }
}
?>