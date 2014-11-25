<?php
/*
    File        : MssqlDatabase.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/  

class MssqlDatabase
{	
	/* methods: */
	protected function __construct()	
    {
    }
	
	public function openDatabase()
	{
		try 
		{
			$dbh = DatabaseHandler::getInstance();       
			$databaseLink = new PDO('mssql:'.$dbh->host, $dbh->name, $dbh->user, $dbh->password);	
			$databaseLink -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} 

		catch (PDOException $exception) 
		{
			$databaseException = $exception -> getMessage();
      		trigger_error($databaseException, E_USER_ERROR);
		}

		return $databaseLink;	 
	}
}	
?>		