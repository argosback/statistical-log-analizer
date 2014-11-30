<?php
/*
    File        : Table.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class Table
{
	private $data;
	private $dataIds;
	private $table = null;

	public function __construct()
	{
	}

	/*FOR PROPERTIES*/
	public function __get($name)
	{
	    if (method_exists($this, ($method = 'get'.ucfirst($name))))
	    {
	      return $this->$method();
	    }
	    else return;
	}
	
	public function __set($name, $value)
	{
	    if (method_exists($this, ($method = 'set'.ucfirst($name))))
	    {
	      $this->$method($value);
	    }
	}
	/*FOR PROPERTIES*/
	
	/*SETTERS AND GETTERS*/
	public function getData()
	{
	    return $this->data;
	}
	
	public function setData($data)
	{
	    $this->data = $data;
	    return $this;
	}

	public function getDataIds()
	{
	    return $this->dataIds;
	}
	
	public function setDataIds($dataIds)
	{
	    $this->dataIds = $dataIds;
	    return $this;
	}
	/*SETTERS AND GETTERS*/

	public function openTable()
	{
		$this->table .= '<table id="table" class="table table-bordered table-hover 
                        table-striped table-condensed">';
	} 

	public function openTheader()
	{
		$this->table .= '<thead>';
	}

	public function addTheaderTitle($content)
	{
		$this->table .= '<th>'.$content.'</th>';
	}

	public function closeTheader()
	{
		$this->table .= '</thead>';
	}

	public function openTbody()
	{
		$this->table .= '<tbody>';
	}

	public function renderTableData()
	{
		foreach ($this->data as $key => $datum) 
		{
			$this->table .= '<tr>';
			foreach ($this->dataIds as $id) 
			{
				$this->table .= "<td>".$datum["$id"]."</td>";
			}
			$this->table .= '</tr>';
		}
	}

	public function closeTbody()
	{
		$this->table .= '</tbody>';		
	}

	public function closeTable()
	{
		$this->table .= '</table>';		
	}

	public function render()
	{
		return $this->table;
	}

}