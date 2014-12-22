<?php
/*
    File        : D_ReadClientIps.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class D_ReadClientIps implements IDataget
{
    public function getOutData()
    {
        $query = "SELECT client_ip FROM SquidData 
        			GROUP BY client_ip 
        				ORDER BY client_ip";
                  
        $db = DatabaseFactory::create("SquidDatabase")->connect();
        return $db->SQLFetchAllArray($query);
    }
}
?>