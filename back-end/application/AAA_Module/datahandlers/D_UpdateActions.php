<?php
/*
    File        : D_UpdateActions.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira

    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class D_UpdateActions implements IDataset
{	
	public function setInData($data)
	{
		$actions = $data;
		$queries = array();

		$query1 = "DELETE FROM actions";
		array_push($queries, $query1);

		foreach ($actions as $actionKey => $actionValue) 
		{
			$query2 = "INSERT OR REPLACE INTO actions (name) VALUES 
			        ('$actionKey')";
			array_push($queries, $query2);
		}		

		// foreach ($actions as $actionKey => $actionValue) 
		// {
		// 	$query3 = "DELETE FROM roles_actions WHERE action_name <> '$actionKey'";
		// 	array_push($queries, $query3);
		// }

        $db = DatabaseFactory::create("AAADatabase")->connect();
		$db->SQLTransaction($queries);
	}
}

?>