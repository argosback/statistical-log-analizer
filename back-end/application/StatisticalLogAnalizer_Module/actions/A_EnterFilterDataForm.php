<?php
/*
    File        : A_EnterFilterDataForm.php

    Project     : Statistical Log Analizer

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class A_EnterFilterDataForm implements IAction
{
	public function execute()
	{
        //DATAHANDLER
        $datahandler = DatahandlerFactory::create('D_ReadClientIps');
        $clientIps = $datahandler->getOutData();        
        $datahandler = DatahandlerFactory::create('D_ReadDates');
        $dates = $datahandler->getOutData();        

        $data = array(
                        "client-ips" => $clientIps,
                        "dates" => $dates
                     );

		//VIEW
        $view = ViewFactory::create('V_EnterFilterDataForm');
        $view->setInData($data);
        $view->display();
	}
}
?>
