<?php
/*
    File        : D_SquidDataRowsTotalNumber.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira

    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class D_SquidDataRowsTotalNumber implements IDataget 
{	
	public function getOutData()
	{
		$db = DatabaseFactory::create("SquidDatabase")->connect();
		$rowsTotalNumberInArray = $db->SQLFetchArray("SELECT COUNT(*) FROM SquidData");
        return (int)$rowsTotalNumberInArray['COUNT(*)'];
	}
}
?>