<?php
/*
    File        : XmlDocumentGenerator.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class XmlDocumentGenerator
{
    /* Attributes */
    private static $_instance;
    private $_header;
    private $_content;


    /* Methods */
    
    private function __construct()
    {
        $this -> setHeader('Content-Type: application/xml; charset=utf-8');
    }

    //to_prevent cloned:
    private function __clone()
    {
        trigger_error
        (
            'Invalid Operation: You can not clone an instance of '
            . get_class($this) ." class.", E_USER_ERROR 
        );
    }

    //to prevent deserialization:
    private function __wakeup()
    {
        trigger_error
        (
            'Invalid Operation: You can not deserialize an instance of '
            . get_class($this) ." class."
        );
    }

    public static function getInstance()
    {
        if (!(self::$_instance instanceof self))
        {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function setHeader($header)
    {
        $this -> _header = $header;
        return $this;
    }

    //recursive method:
    public function setContent($content)
    {
        foreach($content as $key => $value)
        {
            if(is_array($value))
            {
                $this -> _content .= "<row>";
                $this -> setContent($value);
                $this -> _content .= "</row>\n";
            }
            else
            {
                $this -> _content .= "<".$key.">".$value."</".$key.">";
            }      
        }
        return $this;        
    }

    public function response()
    {
        header ($this->_header);
        echo "<dataset>\n".$this->_content."</dataset>\n";
    }

    public function __destruct()
    {

    }

}
?> 