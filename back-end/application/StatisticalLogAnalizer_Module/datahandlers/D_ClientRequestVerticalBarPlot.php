<?php
/*
    File        : D_ClientRequestVerticalBarPlot.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class D_ClientRequestVerticalBarPlot implements IDataget, IDataset
{
    private $data = array();

    public function setInData($data)
    {
        $this->data = $data;
    }
    
    public function getOutData()
    {
        $date = $this->data['date'];
        $query = "SELECT client_ip, COUNT(client_ip) as frequency 
                    FROM SquidData 
        			WHERE date = '$date'
                    GROUP BY client_ip 
        			ORDER BY frequency DESC";
                  
        $db = DatabaseFactory::create("SquidDatabase")->connect();
        return $db->SQLFetchAllArray($query);
    }
}
?>