<?php
/*
    File        : A_EnterFilterData.php

    Project     : Statistical Log Analizer

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class A_EnterFilterData implements IAction
{
	public function execute()
	{
        //PARAMETERS
        $parameters = RequestParametersFactory::create();
        $clientIp = $parameters->get("selected-client-ip");
        $date = $parameters->get("selected-date");

        //SESSION
        $session = SessionFactory::create();
        $session->set("selected-client-ip", $clientIp);
        $session->set("selected-date", $date);

        //REDIRECTOR
        $redirector = RedirectorFactory::create();
        $redirector->redirectTo('index.php?A_EnterFilterDataForm');
	}
}
?>
