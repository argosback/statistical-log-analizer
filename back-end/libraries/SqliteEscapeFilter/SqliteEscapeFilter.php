<?php
/*
    File        : SqliteEscapeFilter.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira

    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class SqliteEscapeFilter implements IFilter
{	
	public function filters($str)
	{
		return SQLite3::escapeString($str);
	}
}

?>