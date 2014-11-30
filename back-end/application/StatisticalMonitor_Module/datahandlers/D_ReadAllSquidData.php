<?php
/*
    File        : D_ReadAllSquidData.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira

    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class D_ReadAllSquidData implements IDataget
{    
    public function getOutData()
    {
        $paginator = PaginatorFactory::create();
        $beginning = $paginator->beginning;
        $rowsPerPage = $paginator->rowsPerPage;
        $query = "SELECT * FROM SquidData LIMIT $beginning, $rowsPerPage";
                  
        $db = DatabaseFactory::create("SquidDatabase")->connect();
        return $db->SQLFetchAllArray($query);
    }
}
?>