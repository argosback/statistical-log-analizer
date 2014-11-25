<?php
/*
    File        : D_ReadAllUsers.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira

    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class D_ReadAllUsers implements IDataget
{	
	public function getOutData()
	{
        $db = DatabaseFactory::create("AAADatabase")->connect();
		return $db->SQLFetchAllArray("SELECT * FROM Users ORDER BY name");
	}
}

?>