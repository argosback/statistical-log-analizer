<?php
/*
    File        : BasicEncryptor.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/
    
class BasicEncryptor implements IEncryptor
{
    public function encrypt($text)
    {
        return crypt($text);
    }
}
?>
