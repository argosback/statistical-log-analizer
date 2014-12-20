<?php
/*
     File        : V_RequestDomainsLinePlot.php
 
     Project     : Classset
 
     Author      : Gabriel Nicolás González Ferreira
     
     License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0
     
     IDE         : Sublime Text 2.02
 */
 
include_once "back-end/vendors/libchart/libchart/classes/libchart.php";

 class V_RequestDomainsLinePlot implements IView, IDataset
 {
     private $data;
 
     public function setInData($data)
     {
         $this->data = $data;
     }
 
     public function display()
     {
        $chart = new LineChart(4500,350);

        $serie1 = new XYDataSet();

        foreach ($this->data as $key => $datum) 
        {
            $serie1->addPoint(new Point($datum['url'], $datum['frequency']));
        }

        $dataSet = new XYSeriesDataSet();
        $dataSet->addSerie("Client 10.2.11.10 at 15-09-14", $serie1);
        $chart->setDataSet($dataSet);

        $chart->setTitle("Client Request Frequency Line Plot");
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