<?php
// $Id: horizbarex4.php,v 1.4 2002/11/17 23:59:27 aditus Exp $
require_once ('src/jpgraph.php');
require_once ('src/jpgraph_bar.php');
 
$datay=array(1,1,1,1,1,1,2,3,27);
 
// Size of graph
$width=400;
$height=500;
 
// Set the basic parameters of the graph
$graph = new Graph($width,$height);
$graph->SetScale('textlin');
 
$top = 60;
$bottom = 30;
$left = 80;
$right = 30;
$graph->Set90AndMargin($left,$right,$top,$bottom);
 
// Nice shadow
$graph->SetShadow();
 
// Setup labels
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
 
// Label align for X-axis
$graph->xaxis->SetLabelAlign('right','center','right');
 
// Label align for Y-axis
$graph->yaxis->SetLabelAlign('center','bottom');
 
// Titles
$graph->title->Set('Client Request Frequency Bar Plot');
$graph->title->SetFont(FF_FONT1,FS_BOLD);
 
// Create a bar pot
$bplot = new BarPlot($datay);
$bplot->SetFillColor('orange');
$bplot->SetWidth(0.5);
$bplot->SetYMin(1);

// Setup the values that are displayed on top of each bar
$bplot->value->Show();
// Must use TTF fonts if we want text at an arbitrary angle
$bplot->value->SetFont(FF_ARIAL,FS_BOLD);
$bplot->value->SetAngle(45);
// Black color for positive values and darkred for negative values
$bplot->value->SetColor("black"); 
 
$graph->Add($bplot);
 
$graph->Stroke();

// $graph->Stroke();
// $gdImgHandler = $graph->Stroke(_IMG_HANDLER);
// // Default is PNG so use ".png" as suffix
// $fileName = "client_request_horizontal_bar_plot.png";
// $graph->img->Stream($fileName);
?>