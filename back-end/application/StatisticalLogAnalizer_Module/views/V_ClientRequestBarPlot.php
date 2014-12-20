<?php
/*
     File        : V_ClientRequestBarPlot.php
 
     Project     : Classset
 
     Author      : Gabriel Nicolás González Ferreira
     
     License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0
     
     IDE         : Sublime Text 2.02
 */
 
include_once "back-end/vendors/libchart/libchart/classes/libchart.php";

 class V_ClientRequestBarPlot implements IView, IDataset
 {
     private $data;
 
     public function setInData($data)
     {
         $this->data = $data;
     }
 
     public function display()
     {
		$chart = new VerticalBarChart(900,350);

		$dataSet = new XYDataSet();

		foreach ($this->data as $key => $datum) 
		{
			$dataSet->addPoint(new Point($datum['client_ip'], $datum['frequency']));
		}

		$chart->setDataSet($dataSet);

		$chart->setTitle("Client Request Frequency Bar Plot");
		$chart->render("front-end/images/client_request_vertical_bar_plot.png");


        $session = SessionFactory::create();
        $dom = DOMHandlerFactory::create();
        $dom->setDocumentFromFile(STATISTICAL_LOG_ANALIZER_HTML)

                ->whereIdIs('login-user')
                    ->insertNode($session->get('session-user-name'));   

        $graph = '<div style="text-align: center;">
        			<img src="front-end/images/client_request_vertical_bar_plot.png" alt="" border="0">
        			</div>';

        $dom->whereIdIs("squidDataContainer")->insertNode($graph); 
        
        $dom->display();
     }
 } 

?>