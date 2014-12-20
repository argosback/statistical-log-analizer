<?php
/*
    File        : D_SampleSize.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira

    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class D_SampleSize implements IDataget 
{	
	public function getOutData()
	{
		$db = DatabaseFactory::create("SquidDatabase")->connect();
		$rowsTotalNumberInArray = $db->SQLFetchArray("SELECT COUNT(*) FROM SquidData");
        return (int)$rowsTotalNumberInArray['COUNT(*)'];
	}
}
?>