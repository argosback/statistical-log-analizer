<?php
/*
    File        : D_SquidAnalizer.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class D_SquidAnalizer implements IDataset, IDataget
{
    private $data = array();

	public function setInData($data)
	{
        //FOR ERROR Allowed memory size of 134217728 
        //bytes exhausted (tried to allocate 20 bytes):
        ini_set('memory_limit', '-1');

        $tmpdata = array();
        
        $logfile = file($data);
        foreach ($logfile as $linenumber => $line) 
        {
            array_push($tmpdata, explode(" ", $line));
        }

        foreach ($tmpdata as $key => $line) 
        {
            $newline = array();
            foreach ($line as $key => $datum) 
            {
                if ($datum != null) 
                {
                    array_push($newline, $datum);
                }
            }
            array_push($this->data, $newline);
        }
    }

    public function getOutData()
    {
        return $this->data;
    }
}

?>