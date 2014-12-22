<?php
/*
    File        : D_ClientDataLineChart.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class D_ClientDataLineChart implements IDataget, IDataset
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

        $query = "SELECT client_data, time
                    FROM SquidData 
                    WHERE client_ip = '$clientIp' AND date = '$date'
                    ORDER BY time";        
                  
        $db = DatabaseFactory::create("SquidDatabase")->connect();
        return $db->SQLFetchAllArray($query);
    }
}
?>