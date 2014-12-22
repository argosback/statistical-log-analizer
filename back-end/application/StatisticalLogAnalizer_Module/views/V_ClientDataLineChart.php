<?php
/*
     File        : V_ClientDataLineChart.php
 
     Project     : Classset
 
     Author      : Gabriel Nicolás González Ferreira
     
     License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0
     
     IDE         : Sublime Text 2.02
 */
 
include_once "back-end/vendors/libchart/libchart/classes/libchart.php";

 class V_ClientDataLineChart implements IView, IDataset
 {
     private $data;
 
     public function setInData($data)
     {
         $this->data = $data;
     }
 
     public function display()
     {
        $session = SessionFactory::create();
        $clientIp = $session->get("selected-client-ip");
        $date = $session->get("selected-date");
        $beginTime = $this->data[0]['time'];
        $endTime = end($this->data)['time'];


        /*CHART*/
        $chart = new LineChart(1400,500);

        $serie1 = new XYDataSet();

        foreach ($this->data as $key => $datum) 
        {
            $serie1->addPoint(new Point("", $datum['client_data']));
        }

        $dataSet = new XYSeriesDataSet();
        $dataSet->addSerie("Client: ".$clientIp." at ".$date, $serie1);
        $chart->setDataSet($dataSet);

        $chart->getPlot()->setGraphPadding(new Padding(5, 3, 20, 140));
        $chart->setTitle("");//clear the image title
        $chart->getPlot()->setLogoFileName("");//clear the image logo
        $chart->render("front-end/images/client_data_line_plot.png");
        /*CHART*/

        //DOM:
        $dom = DOMHandlerFactory::create();
        $dom->setDocumentFromFile(STATISTICAL_LOG_ANALIZER_HTML)

                ->whereIdIs('login-user')
                    ->insertNode($session->get('session-user-name')); 
                    
        //INSERT TITLE:
        $title = "<h3>Client (".$clientIp.") Data Consumption Line Chart, 
                            at: ".$date." between: ".$beginTime." and ".$endTime."</h3>";
        $dom->whereIdIs("body-title")->insertNode($title); 

        //INSERT GRAPH:
        $graph = '<div style="text-align: center;">
                    <img src="front-end/images/client_data_line_plot.png" alt="" border="0">
                    </div>';
        $dom->whereIdIs("squidDataContainer")->insertNode($graph); 
        
        $dom->display();
     }
 } 

?>