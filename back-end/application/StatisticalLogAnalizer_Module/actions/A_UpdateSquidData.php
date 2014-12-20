<?php
/*
    File        : A_UpdateSquidData.php

    Project     : Statistical Log Analizer

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class A_UpdateSquidData implements IAction
{
	public function execute()
	{
        
        $datahandler = DatahandlerFactory::create('D_UpdateSquidData');
        $datahandler -> setInData(SQUID_FILE);

        //REDIRECTOR
        $redirector = RedirectorFactory::create();
        $redirector->redirectTo('index.php?A_ReadClientIpWithFrequency');
    }
}
?>