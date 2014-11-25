<?php
/*
    File        : D_ReadUsedRoles.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira

    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class D_ReadUsedRoles implements IDataset, IDataget 
{	
	private $data;

	public function setInData($data)
	{
		$this->data = $data;
	}

	public function getOutData()
	{
		$id = $this->data;
 
        $query = "SELECT users.*, 1 as status
                  FROM users 
                  LEFT JOIN users_roles
                  ON users_roles.user_id = users.id
                  WHERE users_roles.role_id = $id";

        $db = DatabaseFactory::create("AAADatabase")->connect();
        return $db->SQLFetchAllArray($query);
	}
}

?>