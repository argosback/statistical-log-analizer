<?php
/*
    File        : A_ClientDataLinePlot.php

    Project     : Statistical Log Analizer

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class A_ClientDataLinePlot implements IAction
{
	public function execute()
	{
		//DATAHANDLER
		$datahandler = DatahandlerFactory::create('D_ClientDataLinePlot');
		$data = $datahandler->getOutData();

		//VIEW
        $view = ViewFactory::create('V_ClientDataLinePlot');
        $view->setInData($data);
        $view->display();
	}
}
?>