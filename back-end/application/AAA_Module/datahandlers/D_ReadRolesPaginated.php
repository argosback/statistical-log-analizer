<?php
/*
    File        : D_ReadRolesPaginated.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira

    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class D_ReadRolesPaginated implements IDataget
{	
    public function getOutData()
    {
        $paginator = PaginatorFactory::create();
        $beginning = $paginator->beginning;
        $rowsPerPage = $paginator->rowsPerPage;
        $query = "SELECT * FROM Roles ORDER BY name LIMIT $beginning, $rowsPerPage";
                  
        $db = DatabaseFactory::create("AAADatabase")->connect();
        return $db->SQLFetchAllArray($query);
    }
}

?>