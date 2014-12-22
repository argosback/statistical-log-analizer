<?php
/*
    File        : V_ClientDataConsumptionTable.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0

    IDE         : Sublime Text 2.02
*/

class V_ClientDataConsumptionTable implements IView, IDataset
{
    private $data;

    public function setInData($data)
    {
        $this->data = $data;
    }

    public function display()
    {
        $session = SessionFactory::create();
        $dom = DOMHandlerFactory::create();
        $dom->setDocumentFromFile(STATISTICAL_LOG_ANALIZER_HTML)

                ->whereIdIs('login-user')
                    ->insertNode($session->get('session-user-name'));

        //TITLE
        $selectedClientIp = $session->get("selected-client-ip");
        $selectedDate = $session->get("selected-date");
        $beginTime = $this->data[0]['time'];
        $endTime = end($this->data)['time'];
        $title = "<h3>Client (".$selectedClientIp.") Data Consumption Table, 
                            at: ".$selectedDate." between: ".$beginTime." and ".$endTime."</h3><br><h5>(Ordered from highest to lowest consumption)</h5>";
        $dom->whereIdIs("body-title")->insertNode($title); 
        //TITLE

        $tableFactory = HtmlElementsFactory::create("table");
        $tableFactory->data = $this->data;
        $tableFactory->dataIds =  array("time", "client_data", "url");
        $tableFactory->openTable();     
        $tableFactory->addTheaderTitle("Time");
        $tableFactory->addTheaderTitle("Client Data Consumption In Kb");
        $tableFactory->addTheaderTitle("URL");
        $tableFactory->renderTableData();
        $tableFactory->closeTable();
        $table = $tableFactory->render();

        $dom->whereIdIs("squidDataContainer")->insertNode($table); 

        $paginator = PaginatorFactory::create();
        $paginator->action = "A_ClientDataConsumptionTable";
        $dom->whereIdIs('ul-pagination')
            ->insertNode($paginator->paginationSelect);
        
        $dom->display();
    }
}