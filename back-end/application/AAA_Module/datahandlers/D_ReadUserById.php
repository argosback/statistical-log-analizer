<?php
/*
    File        : D_ReadUserById.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira

    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class D_ReadUserById implements IDataset, IDataget 
{	
	private $data;

	public function setInData($data)
	{
		$this->data = $data;
	}

	public function getOutData()
	{
		$id = $this->data;
		$query = "SELECT * FROM Users WHERE id = $id";

        $db = DatabaseFactory::create("AAADatabase")->connect();
        return $db->SQLFetchArray($query);
	}
}

?>