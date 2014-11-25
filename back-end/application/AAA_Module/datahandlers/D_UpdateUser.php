<?php
/*
    File        : D_UpdateUser.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira

    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class D_UpdateUser implements IDataset
{	
	public function setInData($data)
	{  
        $name = $data['name'];
        $password = $data['password'];
        $id = $data['id'];

        $query = "UPDATE Users SET
                     name = '$name', 
                     password = '$password' 
                     WHERE id = $id";

        $db = DatabaseFactory::create("AAADatabase")->connect();
        $db->SQLQuery($query);
	}
}

?>