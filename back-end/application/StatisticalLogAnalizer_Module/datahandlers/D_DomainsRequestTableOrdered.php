<?php
/*
    File        : D_DomainsRequestTableOrdered.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class D_DomainsRequestTableOrdered implements IDataget, IDataset
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

        $query = "SELECT url, date, time, COUNT(url) as frequency 
                    FROM SquidData 
                    WHERE client_ip = '$clientIp' AND date = '$date'
                    GROUP BY url
                    ORDER BY frequency DESC";        
                  
        $db = DatabaseFactory::create("SquidDatabase")->connect();
        return $db->SQLFetchAllArray($query);
    }
}
?>