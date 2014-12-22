<?php
/*
    File        : D_FrequencyTableOfClientRequests.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira

    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class D_FrequencyTableOfClientRequests implements IDataget, IDataset
{	
    private $data = array();

    public function setInData($data)
    {
        $this->data = $data;
    }

    public function getOutData()
    {
        $date = $this->data['date'];
        $paginator = PaginatorFactory::create();
        $beginning = $paginator->beginning;
        $rowsPerPage = $paginator->rowsPerPage;
        $query = "SELECT client_ip, url, COUNT(client_ip) as frequency FROM SquidData 
        			WHERE date = '$date' 
                    GROUP BY client_ip 
        			ORDER BY frequency DESC 
        			LIMIT $beginning, $rowsPerPage";
                  
        $db = DatabaseFactory::create("SquidDatabase")->connect();
        return $db->SQLFetchAllArray($query);
    }
}
?>