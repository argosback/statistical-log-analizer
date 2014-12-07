<?php
// Example of CSIM frequence bar that uses the cache
//
include_once ("src/jpgraph.php");
include_once ("src/jpgraph_bar.php");
include_once ("src/jpgraph_line.php");

// Utility function to calculate the accumulated frequence
// for a set of values and ocurrences
function accfreq($data) {
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

// some data
$data_freq = array(1,1,1,1,1,1,2,3,27);

////descomentar para lineplot:
$data_accfreq = accfreq($data_freq);

// Create the graph. 
$graph = new Graph(900,350);

// We need to make this extra call for CSIM scripts
// that make use of the cache. If the cache contains this
// graph the HTML wrapper will be returned and then the
// method will call exit() and hence NO LINES AFTER THIS 
// CALL WILL BE EXECUTED.
// $graph->CheckCSIMCache('auto');

// Setup some basic graph parameters
$graph->SetScale("textlin");
$graph->SetY2Scale('lin',0,100);
$graph->img->SetMargin(50,70,30,40);
$graph->yaxis->SetTitleMargin(30);
$graph->SetMarginColor('#EEEEEE');

// Setup titles and fonts
$graph->title->Set("Client Request Frequency Bar Plot");
$graph->xaxis->title->Set("Client Request");
$graph->yaxis->title->Set("Frequency");

$graph->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);

// Turn the tickmarks
$graph->xaxis->SetTickSide(SIDE_DOWN);
$graph->yaxis->SetTickSide(SIDE_LEFT);

$graph->y2axis->SetTickSide(SIDE_RIGHT);
$graph->y2axis->SetColor('black','blue');
$graph->y2axis->SetLabelFormat('%3d.0%%');

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
$graph->xaxis->SetTickLabels($lbl);

// Create a bar pot
$bplot = new BarPlot($data_freq);

// Create targets and alt texts for the image maps. One for each bar
// (In this example this is just "dummy" targets)
$targ=array("#1","#2","#3","#4","#5","#6","#7","#8","#9");
$alts=array("val=%d","val=%d","val=%d","val=%d","val=%d","val=%d","val=%d","val=%d","val=%d");
$bplot->SetCSIMTargets($targ,$alts);

//descomentar para lineplot:
// Create accumulative graph
$lplot = new LinePlot($data_accfreq);
// We want the line plot data point in the middle of the bars
$lplot->SetBarCenter();
// Use transperancy
$lplot->SetFillColor('lightblue@0.6');
$lplot->SetColor('blue@0.6');
$lplot->SetColor('blue');
$graph->AddY2($lplot);


// // Setup the bars
$bplot->SetFillColor("orange@0.2");
$bplot->SetValuePos('center');
$bplot->value->SetFormat("%d");
$bplot->value->SetFont(FF_ARIAL,FS_NORMAL,9);
$bplot->value->Show();

$bplot->value->SetAngle(45);
// Black color for positive values and darkred for negative values
$bplot->value->SetColor("black"); 

// Add it to the graph
$graph->Add($bplot);

// Send back the HTML page which will call this script again
// to retrieve the image.
$graph->Stroke();
?>