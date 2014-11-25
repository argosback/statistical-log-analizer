<?php
/*
    File        : D_SaveRolesForTheUser.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira

    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class D_SaveRolesForTheUser implements IDataset
{	
	private $data;

	public function setInData($data)
	{
		$this->data = $data;
		$rolesIds = $this->data['selected-roles-ids'];
		$userId = $this->data['selected-user-id'];

		$queries = array();

		$query1 = "DELETE FROM users_roles WHERE user_id='$userId'";
		array_push($queries, $query1);

		foreach ($rolesIds as $roleId) 
		{
			$query2 = "INSERT OR REPLACE INTO users_roles (user_id, role_id) VALUES 
			        ('$userId', '$roleId')";
			array_push($queries, $query2);
		}

        $db = DatabaseFactory::create("AAADatabase")->connect();
		$db -> SQLTransaction($queries);
	}
}

?>