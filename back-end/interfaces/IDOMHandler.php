<?php
/*
    File        : IDOMHandler.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira

    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

interface IDOMHandler
{	
	public function setHeader($header);
	public function setDocumentFromString($str);
	public function setDocumentFromFile($filePath);
	public function getDocument();
	public function whereIdIs($id);
	public function insertNode($node);
	public function insertAttribute($attribute);
	public function removeAttribute($attribute);

	public function display();
}

?>