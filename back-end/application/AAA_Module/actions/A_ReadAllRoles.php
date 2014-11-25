<?php
/*
    File        : A_ReadAllRoles.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class A_ReadAllRoles implements IAction
{
	public function execute()
	{
        //DATAHANDLER
        $datahandler = DatahandlerFactory::create('D_ReadAllRoles');
        $data = $datahandler->getOutData();

        //VIEW
        $view = ViewFactory::create('V_ReadAllRoles');
        $view->setInData($data);
        $view->display();
	}
}

?>