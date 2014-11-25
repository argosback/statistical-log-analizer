<?php
/*
    File        : HtmlDecoder.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira

    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class HtmlDecoder implements IDecoder
{	
	public function decode($string)
	{
		$entities = get_html_translation_table(HTML_ENTITIES, ENT_NOQUOTES, 'UTF-8');
      	$specialChars = get_html_translation_table(HTML_SPECIALCHARS, ENT_NOQUOTES, 'UTF-8');
      	$latinChars["latinChars"] = array_diff($entities, $specialChars);
      	$decodeString= strtr($string, $latinChars["latinChars"]);
      	return $decodeString;
	}
}

?>