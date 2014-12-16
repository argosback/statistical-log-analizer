<?php
/*
    File        : A_Test.php

    Project     : Statistical Log Analizer

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class A_Test implements IAction
{
	public function execute()
	{
		//PARAMETERS
        // $params = RequestParametersFactory::create();
        // $namePostVariable = $params->get('files');

        $temporalName=$_FILES['files']['tmp_name'];
        $originalName=$_FILES['files']['name'];
        if(is_uploaded_file($temporalName));            
            move_uploaded_file($temporalName, "uploads/".$originalName);

        //DATAHANDLER
        $datahandler = DatahandlerFactory::create('D_UpdateSquidData');
        $datahandler -> setInData("uploads/".$originalName);

        //REDIRECTOR
        $redirector = RedirectorFactory::create();
        $redirector->redirectTo('index.php?A_ReadAllSquidData');

        // $fileUploader = FileUploader::getInstance();
        // // $fileUploader->setNamePostVariable($namePostVariable);
        // $fileUploader->setUploadDirectory(".");
        // $fileUploader->fileUpload();
	}
}
?>