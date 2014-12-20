<?php
/*
    File        : V_ReadClientIpWithFrequency.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0

    IDE         : Sublime Text 2.02
*/

class V_ReadClientIpWithFrequency implements IView, IDataset
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
        $paginator->action = "A_ReadClientIpWithFrequency";
        $dom->whereIdIs('ul-pagination')
            ->insertNode($paginator->paginationSelect);
        
        $dom->display();
    }
}