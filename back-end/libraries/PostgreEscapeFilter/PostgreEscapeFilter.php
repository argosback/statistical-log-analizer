<?php
/*
    File        : PostgreEscapeFilter.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira

    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class PostgreEscapeFilter implements IFilter
{	
	public function filters($str)
	{
		return pg_escape_string($str);
	}
}

?>