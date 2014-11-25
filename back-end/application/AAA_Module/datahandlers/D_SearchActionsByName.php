<?php
/*
    File        : D_SearchActionByName.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira

    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class D_SearchActionsByName implements IDataset, IDataget 
{	
	private $data;

	public function setInData($data)
	{
		$this->data = $data;
	}

	public function getOutData()
	{

		$id = $this->data["selected-role-id"];
		$name = $this->data["search-action-name"];
 
        $query = "SELECT actions.*, 1 as status
                  FROM actions 
                  LEFT JOIN roles_actions
                  ON roles_actions.action_name = actions.name
                  WHERE roles_actions.role_id = $id
                  AND actions.name LIKE '%$name%'

				  UNION

				  SELECT actions.*, 0 as status
                  FROM actions 
                  WHERE actions.name NOT IN 
                  (
                  	SELECT actions.name
			      	FROM actions
		    	  	LEFT JOIN roles_actions
		          	ON roles_actions.action_name = actions.name
		          	WHERE roles_actions.role_id = $id
		          ) AND actions.name LIKE '%$name%'
					ORDER BY actions.name DESC";

        $db = DatabaseFactory::create("AAADatabase")->connect();
        return $db->SQLFetchAllArray($query);
	}
}

?>