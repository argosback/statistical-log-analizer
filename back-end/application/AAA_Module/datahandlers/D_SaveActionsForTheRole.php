<?php
/*
    File        : D_SaveActionsForTheRole.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira

    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class D_SaveActionsForTheRole implements IDataset
{	
	private $data;

	public function setInData($data)
	{
		$this->data = $data;
		$actionsNames = $this->data['selected-actions-names'];
		$roleId = $this->data['selected-role-id'];

		$queries = array();

		$query1 = "DELETE FROM roles_actions WHERE role_id='$roleId'";
		array_push($queries, $query1);

		foreach ($actionsNames as $actionName) 
		{
			$query2 = "INSERT OR REPLACE INTO roles_actions (role_id, action_name) VALUES 
			        ('$roleId', '$actionName')";
			array_push($queries, $query2);
		}

        $db = DatabaseFactory::create("AAADatabase")->connect();
		$db -> SQLTransaction($queries);
	}
}

?>