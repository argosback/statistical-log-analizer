<?php
/*
    File        : D_ReadClientIpDomainWithFrequency.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira

    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class D_ReadClientIpDomainWithFrequency implements IDataget
{	
    public function getOutData()
    {
        $paginator = PaginatorFactory::create();
        $beginning = $paginator->beginning;
        $rowsPerPage = $paginator->rowsPerPage;
        $query = "SELECT client_ip, COUNT(client_ip) as frequency FROM SquidData 
        			GROUP BY client_ip 
        				ORDER BY datetime 
        					LIMIT $beginning, $rowsPerPage";
                  
        $db = DatabaseFactory::create("SquidDatabase")->connect();
        return $db->SQLFetchAllArray($query);
    }
}
?>