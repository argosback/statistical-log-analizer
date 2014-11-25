<?php
/*
    File        : D_CreateUser.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira

    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class D_CreateUser implements IDataset
{	
	public function setInData($data)
	{  
        $name = $data['name'];
        $password = $data['password'];
        $query = "INSERT INTO Users (name, password) VALUES ('$name', '$password')";
        $db = DatabaseFactory::create("AAADatabase")->connect();
        $db->SQLQuery($query);
	}
}

?>