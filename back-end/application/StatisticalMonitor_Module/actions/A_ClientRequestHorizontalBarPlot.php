<?php
/*
    File        : A_ClientRequestHorizontalBarPlot.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class A_ClientRequestHorizontalBarPlot implements IAction
{
	public function execute()
	{
		//DATAHANDLER
		$datahandler = DatahandlerFactory::create('D_ClientRequestBarPlot');
		$data = $datahandler->getOutData();

		//VIEW
        $view = ViewFactory::create('V_ClientRequestHorizontalBarPlot');
        $view->setInData($data);
        $view->display();
	}
}
?>