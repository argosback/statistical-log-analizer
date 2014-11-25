<?php
/*
    File        : EncryptorFactory.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira

    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class EncryptorFactory implements IFactory
{	
    public static function create($id = "BasicEncryptor")
    {
        if($id == "BasicEncryptor") return new BasicEncryptor;
        
        $messenger = MessengerFactory::create();
        $messenger->say('Null Encryptor');
    }
}

?>