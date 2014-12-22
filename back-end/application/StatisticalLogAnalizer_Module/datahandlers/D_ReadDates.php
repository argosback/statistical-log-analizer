<?php
/*
    File        : D_ReadDates.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class D_ReadDates implements IDataget
{
    public function getOutData()
    {
        $query = "SELECT date FROM SquidData 
        			GROUP BY date 
        				ORDER BY date";
                  
        $db = DatabaseFactory::create("SquidDatabase")->connect();
        return $db->SQLFetchAllArray($query);
    }
}
?>