<?php
/*
     File        : V_ClientRequestHorizontalBarPlot.php
 
     Project     : Classset
 
     Author      : Gabriel Nicolás González Ferreira
     
     License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0
     
     IDE         : Sublime Text 2.02
 */
 
include_once "back-end/vendors/libchart/libchart/classes/libchart.php";

 class V_ClientRequestHorizontalBarPlot implements IView, IDataset
 {
     private $data;
 
     public function setInData($data)
     {
         $this->data = $data;
     }
 
     public function display()
     {
        //graph generation
        $chart = new HorizontalBarChart(800,4500);

        $dataSet = new XYDataSet();

        foreach ($this->data as $key => $datum) 
        {
            $dataSet->addPoint(new Point($datum['client_ip'], $datum['frequency']));
        }

        $chart->setDataSet($dataSet);

        $chart->getPlot()->setGraphPadding(new Padding(5, 30, 20, 140));
        $chart->getPlot()->setLogoFileName("");//clear the image logo
        $chart->setTitle("");//clear the image title
        $chart->render("front-end/images/client_request_horizontal_bar_plot.png");
        //graph generation

        $session = SessionFactory::create();
        $selectedDate = $session->get("selected-date");
        $dom = DOMHandlerFactory::create();
        $dom->setDocumentFromFile(STATISTICAL_LOG_ANALIZER_HTML)

                ->whereIdIs('login-user')
                    ->insertNode($session->get('session-user-name'));     

        $selectedDate = $session->get("selected-date");
        $title = "<h3>Bar Graph IP requests for the day: ".$selectedDate." </h3>";
        $dom->whereIdIs("body-title")->insertNode($title);

        $graph = '<div style="text-align: center;">
        			<img 
        				src="front-end/images/client_request_horizontal_bar_plot.png" 
        				alt="" border="0">
        			</div>';
        $dom->whereIdIs("squidDataContainer")->insertNode($graph); 
        
        $dom->display();
     }
 } 

?>