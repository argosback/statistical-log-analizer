<?php
/*
    File       : DOMHandler.php

    Project    : Classset CPP

    Author     : Gabriel Nicolás González Ferreira

    License    : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0

    Editor     : Sublime Text 2.02

    RAD        : Code::Blocks 12.11
*/

class DOMHandler implements IDOMHandler
{
    private $document;
    private $idPosition;
    private $decoder;
    private $messenger;

    public function __construct(IDecoder $decoder, IMessenger $messenger)
    {
        //ctor
        $this->decoder = $decoder;
        $this->messenger = $messenger;
        $this->idPosition = 0;
    }

    public function setHeader($header)
    {
        header($header);
        return $this;
    }

    public function setDocumentFromString($str)
    {
        $this->document = $str;
        return $this;
    }   

    public function setDocumentFromFile($filePath)
    {
        $this->document = file_get_contents($filePath);
        return $this;
    }

    public function getDocument()
    {
        return $this->document;
    }

    public function whereIdIs($id)
    {
        $this->idPosition = strpos($this->document, $id);

        if( ($this->idPosition == null) )
            $this->messenger->say("DOMHandler Error: The identifier \"".$id."\" does not exist :(");
                
        return $this;
    }

    public function insertNode($node)
    {
        $subString = substr($this->document, $this->idPosition);
        $tagEndPosition = strpos($subString, "<");
        if( ($tagEndPosition == null) )
            $this->messenger->say("DOMHandler Error: The position of character \"<\" does not exist :(");
        $targetPosition = $this->idPosition+$tagEndPosition;
        $this->document = substr_replace($this->document, $node."\n", $targetPosition, 0);
        return $this;
    }

    public function insertAttribute($attribute)
    {
        $subString = substr($this->document, $this->idPosition);
        $tagEndPosition = strpos($subString, ">");
        if( ($tagEndPosition == null) )
            $this->messenger->say("DOMHandler Error:  The position of character \">\" does not exist :(");
        $targetPosition = $this->idPosition+$tagEndPosition;
        $this->document = substr_replace($this->document, " ".$attribute, $targetPosition, 0);
        return $this;
    }

    public function removeAttribute($attribute)
    {
        $subString = substr($this->document, $this->idPosition);
        $attributePosition = strpos($subString, $attribute);      
        
        if( ($attributePosition != null) )
            $targetPosition = $this->idPosition+$attributePosition;
            $this->document = substr_replace($this->document, "", $targetPosition, strlen($attribute));
        
        if( ($attributePosition == null) )
            $this->messenger->say("DOMHandler Error: The position of attribute \"".$attribute."\" does not exist :(");

        return $this;
    }

    public function display()
    {
        echo $this->decoder->decode($this->document);
    }

    public function __destruct()
    {
        unset($this->messenger, $this->decoder);
    }
} 


?>