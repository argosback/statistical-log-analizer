<?php
/*
    File        : D_DomainsRequestTotalNumber.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira

    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class D_DomainsRequestTotalNumber implements IDataget, IDataset 
{
    private $data = array();

    public function setInData($data)
    {
        $this->data = $data;
    }

	public function getOutData()
	{
        $clientIp = $this->data['client-ip'];
        $date = $this->data['date']; 
        
		$db = DatabaseFactory::create("SquidDatabase")->connect();
		$rowsTotalNumberInArray = $db->SQLFetchArray("SELECT COUNT(*)
                                                         FROM SquidData
                                                         WHERE client_ip = '$clientIp' AND date = '$date'");
        return (int)$rowsTotalNumberInArray['COUNT(*)'];
	}
}
?>