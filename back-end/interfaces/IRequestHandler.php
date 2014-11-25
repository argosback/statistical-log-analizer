<?php
/*
    File        : IRequestHandler.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira

    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

interface IRequestHandler
{	
  public function handle($request);
  public function getSelectedActionKey();
}


?>