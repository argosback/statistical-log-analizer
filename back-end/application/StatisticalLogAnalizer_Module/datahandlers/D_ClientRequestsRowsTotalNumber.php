<?php
/*
    File        : D_ClientRequestsRowsTotalNumber.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira

    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class D_ClientRequestsRowsTotalNumber implements IDataget, IDataset 
{
    private $data = array();

    public function setInData($data)
    {
        $this->data = $data;
    }

	public function getOutData()
	{
        $date = $this->data['date'];
		$db = DatabaseFactory::create("SquidDatabase")->connect();
		$rowsTotalNumberInArray = $db->SQLFetchArray("SELECT COUNT(*)
                                                         FROM SquidData
                                                         WHERE date = '$date' ");
        return (int)$rowsTotalNumberInArray['COUNT(*)'];
	}
}
?>