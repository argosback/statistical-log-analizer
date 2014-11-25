<?php
/*
    File        : D_ReadRolesWithStatus.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira

    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class D_ReadRolesWithStatus implements IDataset, IDataget 
{	
	private $data;

	public function setInData($data)
	{
		$this->data = $data;
	}

	public function getOutData()
	{
		$id = $this->data;
 
        $query = "SELECT roles.*, 1 as status
                  FROM roles 
                  LEFT JOIN users_roles
                  ON users_roles.role_id = roles.id
                  WHERE users_roles.user_id = $id

				  UNION

				  SELECT roles.*, 0 as status
                  FROM roles 
                  WHERE roles.id NOT IN 
                  (
                  	SELECT roles.id
			      	FROM roles
		    	  	LEFT JOIN users_roles
		          	ON users_roles.role_id = roles.id
		          	WHERE users_roles.user_id = $id
		          )";

        $db = DatabaseFactory::create("AAADatabase")->connect();
        return $db -> SQLFetchAllArray($query);
	}
}

?>