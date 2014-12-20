<?php
/*
    File        : A_ClientRequestBarPlot.php

    Project     : Statistical Log Analizer

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class A_ClientRequestBarPlot implements IAction
{
	public function execute()
	{
		//DATAHANDLER
		$datahandler = DatahandlerFactory::create('D_ClientRequestBarPlot');
		$data = $datahandler->getOutData();

		//VIEW
        $view = ViewFactory::create('V_ClientRequestBarPlot');
        $view->setInData($data);
        $view->display();
	}
}
?>