<?php
/*
    File        : A_ClientDataLineChart.php

    Project     : Statistical Log Analizer

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class A_ClientDataLineChart implements IAction
{
	public function execute()
	{
        //SESSION
        $session = SessionFactory::create();
        $clientIp = $session->get("selected-client-ip");
        $date = $session->get("selected-date");

        //VALIDATION
        $validator = ValidatorFactory::create();
        $validator->ifTrue( ($clientIp == null or $date == null) )
                        ->respond(INCOMPLETE_FILTER_DATA);

        //SESSION DATA
        $sessionData = array
                        (
                           'client-ip' => $clientIp,
                           'date' => $date
                        );

		//DATAHANDLER
		$datahandler = DatahandlerFactory::create('D_ClientDataLineChart');
        $datahandler->setInData($sessionData);
		$data = $datahandler->getOutData();
        //VALIDATION
        $validator->ifTrue( ($data == array()) )
                                ->respond('Client: '.$clientIp.' no activity in the day: '.$date);

		//VIEW
        $view = ViewFactory::create('V_ClientDataLineChart');
        $view->setInData($data);
        $view->display();
	}
}
?>