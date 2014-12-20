<?php
/*
    File        : D_RequestDomainsLinePlot.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class D_RequestDomainsLinePlot implements IDataget
{
    public function getOutData()
    {
        $query = "SELECT url, date, COUNT(url) as frequency 
                    FROM SquidData 
                    WHERE client_ip = '10.2.40.39' AND date = '16-09-2014'
                    GROUP BY url
                    ORDER BY frequency DESC";        
                  
        $db = DatabaseFactory::create("SquidDatabase")->connect();
        return $db->SQLFetchAllArray($query);
    }
}
?>