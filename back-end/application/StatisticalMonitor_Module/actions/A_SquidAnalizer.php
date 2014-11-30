<?php
/*
    File        : A_SquidAnalizer.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class A_SquidAnalizer implements IAction
{
	public function execute()
	{
        $datahandler = DatahandlerFactory::create('D_SquidAnalizer');
        $datahandler -> setInData("back-end/application/StatisticalMonitor_Module/database/access.test");
        $data = $datahandler->getOutData();
        
        $view = ViewFactory::create('V_SquidAnalizer');
        $view -> setInData($data); 
        $view->display();

        unset($view);
    }
}

?>