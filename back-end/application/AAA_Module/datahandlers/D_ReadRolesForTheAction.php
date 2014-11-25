<?php
/*
    File        : D_ReadRolesForTheAction.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira

    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class D_ReadRolesForTheAction implements IDataset, IDataget 
{	
	private $data;

	public function setInData($data)
	{
		$this->data = $data;
	}

	public function getOutData()
	{
		$actionName = $this->data;
		
        $query = "SELECT roles.*
                  FROM roles
                  LEFT JOIN roles_actions
                  ON roles_actions.role_id = roles.id
                  WHERE roles_actions.action_name = '$actionName'";
                  
        $db = DatabaseFactory::create("AAADatabase")->connect();
        return $db->SQLFetchAllArray($query);
	}
}

?>