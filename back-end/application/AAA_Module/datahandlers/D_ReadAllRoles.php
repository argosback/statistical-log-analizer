<?php
/*
    File        : D_ReadAllRoles.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira

    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class D_ReadAllRoles implements IDataget
{	
	public function getOutData()
	{
        $db = DatabaseFactory::create("AAADatabase")->connect();
		return $db->SQLFetchAllArray("SELECT * FROM Roles ORDER BY name");
	}
}

?>