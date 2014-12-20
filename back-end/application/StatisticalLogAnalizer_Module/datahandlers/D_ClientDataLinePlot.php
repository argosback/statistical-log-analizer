<?php
/*
    File        : D_ClientDataLinePlot.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class D_ClientDataLinePlot implements IDataget
{
    public function getOutData()
    {
        $query = "SELECT client_data, time
                    FROM SquidData 
                    WHERE client_ip = '10.2.210.10' AND date = '15-09-2014'
                    ORDER BY time";        
                  
        $db = DatabaseFactory::create("SquidDatabase")->connect();
        return $db->SQLFetchAllArray($query);
    }
}
?>