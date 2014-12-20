<?php
/*
    File        : D_UpdateSquidData.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class D_UpdateSquidData implements IDataset
{
    private $data = array();

    public function setInData($datafile)
    {
        //FOR ERROR Allowed memory size of 134217728 
        //bytes exhausted (tried to allocate 20 bytes):
        ini_set('memory_limit', '-1');
        ini_set('upload_max_filesize', '500M');
        set_time_limit(100);
        // ini_set('memory_limit', '100M');

        $tmpdata = array();
        
        $logfile = file($datafile);
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

        
        $db = DatabaseFactory::create("SquidDatabase")->connect();
        
        $queries = array();

        $query1 = "DELETE FROM SquidData";
        array_push($queries, $query1);

        $filter = FilterFactory::create();
        foreach ($this->data as $key => $datum) 
        {
        	$datetime = date('d-m-Y H:m', $filter->filters($datum[0]));
        	$transaction_time = $datum[1];
        	$client_ip = $filter->filters($datum[2]);
        	$squid_result_code = $filter->filters($datum[3]); 
        	$client_data = $datum[4];
        	$request_method = $filter->filters($datum[5]);
        	$url = $filter->filters($datum[6]);
        	$mime_type = $filter->filters($datum[9]);
            $explodedUrl = explode("/", $datum[6]);
            @$domain = $filter->filters($explodedUrl[2]);

        	$query2 = "INSERT INTO SquidData
        					   (
        							datetime, transaction_time, 
        							client_ip, squid_result_code,
        							client_data, request_method,
        							url, mime_type, domain
        					   ) 
						VALUES (
									'$datetime', $transaction_time,
									'$client_ip', '$squid_result_code',
									$client_data, '$request_method',
									'$url', '$mime_type', '$domain'
							   )";
            array_push($queries, $query2);        	
        }

        $db->SQLTransaction($queries);
    }
}
?>