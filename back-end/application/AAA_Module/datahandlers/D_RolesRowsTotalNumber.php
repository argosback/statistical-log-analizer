<?php
/*
    File        : D_RolesRowsTotalNumber.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira

    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class D_RolesRowsTotalNumber implements IDataget 
{	
	public function getOutData()
	{
		$db = DatabaseFactory::create("AAADatabase")->connect();
		$rowsTotalNumberInArray = $db->SQLFetchArray("SELECT COUNT(*) FROM Roles");
        return (int)$rowsTotalNumberInArray['COUNT(*)'];
	}
}

?>