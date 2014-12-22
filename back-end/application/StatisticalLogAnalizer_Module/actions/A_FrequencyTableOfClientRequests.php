<?php
/*
    File        : A_FrequencyTableOfClientRequests.php

    Project     : Statistical Log Analizer

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class A_FrequencyTableOfClientRequests implements IAction
{
    public function execute()
    {
        //SESSION
        $session = SessionFactory::create();
        $date = $session->get("selected-date");

        //VALIDATION
        $validator = ValidatorFactory::create();
        $validator->ifTrue( ($date == null) )->respond(INCOMPLETE_FILTER_DATA);

        //SESSION DATA
        $sessionData = array
                        (
                           'date' => $date
                        );

        //PARAMETERS
        $params = RequestParametersFactory::create();
        $pageNumber = $params->get('page-number');
        $rowsPerPage = $params->get('rows-per-page');
        
        //PAGINATOR
        $paginator = PaginatorFactory::create();
        $paginator->pageNumber = $pageNumber;
        $datahandler = DatahandlerFactory::create('D_ClientRequestsRowsTotalNumber');
        $datahandler->setInData($sessionData);
        $rowsTotalNumber = $datahandler->getOutData();
        //Always force a single page
        $paginator->rowsPerPage = $rowsTotalNumber;

        //DATAHANDLERS
        $datahandler = DatahandlerFactory::create('D_FrequencyTableOfClientRequests');
        $datahandler->setInData($sessionData);
        $data = $datahandler->getOutData();
        //VALIDATION
        $validator->ifTrue( ($data == array()) )
                                ->respond('No activity for the day: '.$date);
        
        //PAGINATOR
        $paginator->rowsTotalNumber = $rowsTotalNumber;

        //VIEW

        $view = ViewFactory::create('V_FrequencyTableOfClientRequests');
        $view->setInData($data);
        $view->display();
    }
}
?>