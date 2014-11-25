<?php
/*
    File        : D_SearchUserByName.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira

    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class D_SearchUsersByName implements IDataset, IDataget 
{	
	private $data;

	public function setInData($data)
	{
		$this->data = $data;
	}

	public function getOutData()
	{

		$name = $this->data;
		$query = "SELECT * FROM Users WHERE name LIKE '%$name%'";

        $db = DatabaseFactory::create("AAADatabase")->connect();
        return $db->SQLFetchAllArray($query);
	}
}

?>