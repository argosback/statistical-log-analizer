<?php
/*
    File        : V_ReadAllClientAndUrl.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0

    IDE         : Sublime Text 2.02
*/

class V_ReadAllClientAndUrl implements IView, IDataset
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
        $tableFactory->dataIds =  array("date", "time", "client_ip", "url");
        $tableFactory->openTable();     
        $tableFactory->addTheaderTitle("Date");
        $tableFactory->addTheaderTitle("Time");
        $tableFactory->addTheaderTitle("Client IP");
        $tableFactory->addTheaderTitle("URL");
        $tableFactory->renderTableData();
        $tableFactory->closeTable();
        $table = $tableFactory->render();

        $dom->whereIdIs("squidDataContainer")->insertNode($table); 

        $paginator = PaginatorFactory::create();
        $paginator->action = "A_ReadAllClientAndUrl";
        $dom->whereIdIs('ul-pagination')
            ->insertNode($paginator->paginationSelect);
        
        $dom->display();
    }
}
?>