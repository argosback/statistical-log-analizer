<?php
/*
    File        : D_UsersRowsTotalNumber.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira

    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class D_UsersRowsTotalNumber implements IDataget 
{	
	public function getOutData()
	{
		$db = DatabaseFactory::create("AAADatabase")->connect();
		$rowsTotalNumberInArray = $db->SQLFetchArray("SELECT COUNT(*) FROM Users");
        return (int)$rowsTotalNumberInArray['COUNT(*)'];
	}
}

?>