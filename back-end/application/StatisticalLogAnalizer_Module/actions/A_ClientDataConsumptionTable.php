<?php
/*
    File        : A_ClientDataConsumptionTable.php

    Project     : Statistical Log Analizer

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class A_ClientDataConsumptionTable implements IAction
{
    public function execute()
    {
        //SESSION
        $session = SessionFactory::create();
        $clientIp = $session->get("selected-client-ip");
        $date = $session->get("selected-date");

        //VALIDATION
        $validator = ValidatorFactory::create();
        $validator->ifTrue( ($clientIp == null or $date == null) )->respond(INCOMPLETE_FILTER_DATA);

        //SESSION DATA
        $sessionData = array
                        (
                            'client-ip' => $clientIp,
                            'date' => $date
                        );

        //PARAMETERS
        $params = RequestParametersFactory::create();
        $pageNumber = $params->get('page-number');
        $rowsPerPage = $params->get('rows-per-page');
        
        //PAGINATOR
        $paginator = PaginatorFactory::create();
        $paginator->pageNumber = $pageNumber;
        $datahandler = DatahandlerFactory::create('D_ClientDataRowsTotalNumber');
        $datahandler->setInData($sessionData);
        $rowsTotalNumber = $datahandler->getOutData();
        //Always force a single page
        $paginator->rowsPerPage = $rowsTotalNumber;

        //DATAHANDLERS
        $datahandler = DatahandlerFactory::create('D_ClientDataConsumptionTable');
        $datahandler->setInData($sessionData);
        $data = $datahandler->getOutData();
        //VALIDATION
        $validator->ifTrue( ($data == array()) )
                                ->respond('Client: '.$clientIp.' no activity in the day: '.$date);
        
        //PAGINATOR
        $paginator->rowsTotalNumber = $rowsTotalNumber;

        //VIEW

        $view = ViewFactory::create('V_ClientDataConsumptionTable');
        $view->setInData($data);
        $view->display();
    }
}
?>