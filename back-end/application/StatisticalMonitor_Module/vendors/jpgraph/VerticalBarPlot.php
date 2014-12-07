<?php
/*
    File        : VerticalLineBarPLot.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

include_once ("src/jpgraph.php");
include_once ("src/jpgraph_bar.php");
include_once ("src/jpgraph_line.php");

class VerticalLineBarPLot
{
	private $data;
	private $graph;
	private $graphWidth;
	private $graphHeight;

	public function __construct()
	{
		
	}

	public function __destruct()
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
	

	public function getData()
	{
	    return $this->data;
	}
	
	public function setData($data)
	{
	    $this->data = $data;
	    return $this;
	}

	public function getGraph()
	{
	    return $this->graph;
	}
	
	public function setGraph($graph)
	{
	    $this->graph = $graph;
	    return $this;
	}

	public function getGraphWidth()
	{
	    return $this->graphWidth;
	}
	
	public function setGraphWidth($graphWidth)
	{
	    $this->graphWidth = $graphWidth;
	    return $this;
	}

	public function getGraphHeight()
	{
	    return $this->graphHeight;
	}
	
	public function setGraphHeight($graphHeight)
	{
	    $this->graphHeight = $graphHeight;
	    return $this;
	}

	// Utility function to calculate the accumulated frequence
	// for a set of values and ocurrences
	private function accfreq($data)
	{
		rsort($data);
	    $s = array_sum($data);
	    $as = array($data[0]);
	    $asp = array(100*$as[0]/$s);
	    $n = count($data);
	    for( $i=1; $i < $n; ++$i ) {
	    $as[$i] = $as[$i-1]+$data[$i];
	    $asp[$i] = 100.0*$as[$i]/$s;
	    }
	    return $asp;
	}

	public function create()
	{
		$this->graph = new Graph(900,350));

		// some data
		$data_freq = array(1,1,1,1,1,1,2,3,27);

		////descomentar para lineplot:
		// $data_accfreq = $this->accfreq($data_freq);

		// Setup some basic graph parameters
		$this->graph->SetScale("textlin");
		$this->graph->SetY2Scale('lin',0,100);
		$this->graph->img->SetMargin(50,70,30,40);
		$this->graph->yaxis->SetTitleMargin(30);
		$this->graph->SetMarginColor('#EEEEEE');

		// Setup titles and fonts
		$this->graph->title->Set("Client Request Frequency Bar Plot");
		$this->graph->xaxis->title->Set("Client Request");
		$this->graph->yaxis->title->Set("Frequency");

		$this->graph->title->SetFont(FF_FONT1,FS_BOLD);
		$this->graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
		$this->graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);

		// Turn the tickmarks
		$this->graph->xaxis->SetTickSide(SIDE_DOWN);
		$this->graph->yaxis->SetTickSide(SIDE_LEFT);

		$this->graph->y2axis->SetTickSide(SIDE_RIGHT);
		$this->graph->y2axis->SetColor('black','blue');
		$this->graph->y2axis->SetLabelFormat('%3d.0%%');

		//Set Label Content
		$lbl = array(
						'10.2.252.12', 
						'10.2.40.23', 
						'10.2.40.24',
						'10.2.40.39',
						'10.2.81.25',
						'10.2.9.22',
						'10.2.32.30',
						'10.2.16.15',
						'10.2.11.10',	 
					  );
		$this->graph->xaxis->SetTickLabels($lbl);

		// Create a bar pot
		$bplot = new BarPlot($data_freq);

		// Create targets and alt texts for the image maps. One for each bar
		// (In this example this is just "dummy" targets)
		$targ=array("#1","#2","#3","#4","#5","#6","#7","#8","#9");
		$alts=array("val=%d","val=%d","val=%d","val=%d","val=%d","val=%d","val=%d","val=%d","val=%d");
		$bplot->SetCSIMTargets($targ,$alts);

		// //descomentar para lineplot:
		// // Create accumulative graph
		// $lplot = new LinePlot($data_accfreq);
		// // We want the line plot data point in the middle of the bars
		// $lplot->SetBarCenter();
		// // Use transperancy
		// $lplot->SetFillColor('lightblue@0.6');
		// $lplot->SetColor('blue@0.6');
		// $lplot->SetColor('blue');
		// $this->graph->AddY2($lplot);


		// Setup the bars
		$bplot->SetFillColor("orange@0.2");
		$bplot->SetValuePos('center');
		$bplot->value->SetFormat("%d");
		$bplot->value->SetFont(FF_ARIAL,FS_NORMAL,9);
		$bplot->value->Show();

		// Add it to the graph
		$this->graph->Add($bplot);

		// Send back the HTML page which will call this script again
		// to retrieve the image.
		return $this->graph;
	}
}

$verticalLineBarPlot = new VerticalLineBarPLot;
$graph = $verticalLineBarPlot->create();
$graph->Stroke();
?>