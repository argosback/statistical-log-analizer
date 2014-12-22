<?php
/*
    File        : V_FrequencyTableOfClientRequests.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0

    IDE         : Sublime Text 2.02
*/

class V_FrequencyTableOfClientRequests implements IView, IDataset
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

        $selectedDate = $session->get("selected-date");
        $title = "<h3>Frequency Table of client requests for the day: ".$selectedDate." </h3>";
        $dom->whereIdIs("body-title")->insertNode($title); 

        $tableFactory = HtmlElementsFactory::create("table");
        $tableFactory->data = $this->data;
        $tableFactory->dataIds =  array("client_ip", "frequency");
        $tableFactory->openTable();     
        $tableFactory->addTheaderTitle("Client IP");
        $tableFactory->addTheaderTitle("Frequency");
        $tableFactory->renderTableData();
        $tableFactory->closeTable();
        $table = $tableFactory->render();

        $dom->whereIdIs("squidDataContainer")->insertNode($table); 

        $paginator = PaginatorFactory::create();
        $paginator->action = "A_FrequencyTableOfClientRequests";
        $dom->whereIdIs('ul-pagination')
            ->insertNode($paginator->paginationSelect);
        
        $dom->display();
    }
}