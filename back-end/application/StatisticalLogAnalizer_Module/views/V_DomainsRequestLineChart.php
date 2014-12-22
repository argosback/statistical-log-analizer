<?php
/*
     File        : V_DomainsRequestLineChart.php
 
     Project     : Classset
 
     Author      : Gabriel Nicolás González Ferreira
     
     License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0
     
     IDE         : Sublime Text 2.02
 */
 
include_once "back-end/vendors/libchart/libchart/classes/libchart.php";

 class V_DomainsRequestLineChart implements IView, IDataset
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
        // $chart = new HorizontalBarChart(800,30000);
        $chart = new LineChart(3000,500);
        
        $dataSet = new XYDataSet();

        // $protocols = array('http://', 'https://', 'ftp://', 'www.');
        foreach ($this->data as $key => $datum) 
        {
            // $domain = explode('/', str_replace($protocols, '', $datum['url']));
            $dataSet->addPoint(new Point("", $datum['frequency']));
        }

        $chart->setDataSet($dataSet);

        $chart->getPlot()->setGraphPadding(new Padding(5, 3, 20, 140));
        $chart->getPlot()->setLogoFileName("");//clear the image logo
        $chart->setTitle("");//clear the image title
        $chart->render("front-end/images/domains_request_horizontal_bar_plot.png");
        /*CHART*/

        $session = SessionFactory::create();
        $dom = DOMHandlerFactory::create();
        $dom->setDocumentFromFile(STATISTICAL_LOG_ANALIZER_HTML)

                ->whereIdIs('login-user')
                    ->insertNode($session->get('session-user-name'));     

      //INSERT TITLE:
        $title = "<h3>Client (".$clientIp.") Domains Request Frequency Bar Plot, at: ".$date." between: ".$beginTime." and ".$endTime."</h3>";
        $dom->whereIdIs("body-title")->insertNode($title);

        $graph = '<div style="text-align: center;">
        			<img 
        				src="front-end/images/domains_request_horizontal_bar_plot.png" 
        				alt="" border="0">
        			</div>';
        $dom->whereIdIs("squidDataContainer")->insertNode($graph); 
        
        $dom->display();
     }
 } 

?>