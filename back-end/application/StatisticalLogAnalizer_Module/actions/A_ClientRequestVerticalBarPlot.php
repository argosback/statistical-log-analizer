<?php
/*
    File        : A_ClientRequestVerticalBarPlot.php

    Project     : Statistical Log Analizer

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class A_ClientRequestVerticalBarPlot implements IAction
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

		//DATAHANDLER
		$datahandler = DatahandlerFactory::create('D_ClientRequestVerticalBarPlot');
		$datahandler->setInData($sessionData);
        $data = $datahandler->getOutData();
        //VALIDATION
        $validator->ifTrue( ($data == array()) )
                                ->respond('No activity for the day: '.$date);
		//VIEW
        $view = ViewFactory::create('V_ClientRequestVerticalBarPlot');
        $view->setInData($data);
        $view->display();
	}
}
?>