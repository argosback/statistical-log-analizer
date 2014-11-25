<?php
/*
    File        : D_DeleteRole.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira

    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class D_DeleteRole implements IDataset
{	
	public function setInData($data)
	{  
		$id = $data;
        $query = "DELETE FROM Roles WHERE id=$id";
        $db = DatabaseFactory::create("AAADatabase")->connect();
        $db->SQLQuery($query);
	}
}

?>