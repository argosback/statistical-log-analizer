<?php
/*
    File        : D_ClientDataConsumptionTableOrdered.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class D_ClientDataConsumptionTableOrdered implements IDataget, IDataset
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

        $query = "SELECT client_data, time, url
                    FROM SquidData 
                    WHERE client_ip = '$clientIp' AND date = '$date'
                    ORDER BY client_data DESC";        
                  
        $db = DatabaseFactory::create("SquidDatabase")->connect();
        return $db->SQLFetchAllArray($query);
    }
}
?>