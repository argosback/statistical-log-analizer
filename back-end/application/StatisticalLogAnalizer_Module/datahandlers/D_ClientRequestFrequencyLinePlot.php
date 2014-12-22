<?php
/*
    File        : D_ClientRequestFrequencyLinePlot.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class D_ClientRequestFrequencyLinePlot implements IDataget
{
    public function getOutData()
    {
        $query = "SELECT client_ip, COUNT(client_ip) as frequency FROM SquidData 
        			GROUP BY client_ip 
        				ORDER BY frequency DESC";
                  
        $db = DatabaseFactory::create("SquidDatabase")->connect();
        return $db->SQLFetchAllArray($query);
    }
}
?>