<?php
/*
    File        : D_UpdateRole.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira

    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class D_UpdateRole implements IDataset
{	
	public function setInData($data)
	{
        $id = $data['id'];
        $name = $data['name'];
        $description = $data['description'];

        $query = "UPDATE Roles SET
                     name = '$name', 
                     description = '$description' 
                     WHERE id = $id";

        $db = DatabaseFactory::create("AAADatabase")->connect();
        $db->SQLQuery($query);
	}
}

?>