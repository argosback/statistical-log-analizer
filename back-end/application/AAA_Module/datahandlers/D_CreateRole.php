<?php
/*
    File        : D_CreateRole.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira

    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class D_CreateRole implements IDataset
{	
	public function setInData($data)
	{  
        $name = $data['name'];
        $description = $data['description'];
        $query = "INSERT INTO Roles (name, description) VALUES ('$name', '$description')";
        $db = DatabaseFactory::create("AAADatabase")->connect();
        $db->SQLQuery($query);
	}
}

?>