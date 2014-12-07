<?php
/*
    File        : V_ReadAllSquidData.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0

    IDE         : Sublime Text 2.02
*/

class V_ReadAllSquidData implements IView, IDataset
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
        $dom->setDocumentFromFile(STATISTICAL_MONITOR_HTML)

                ->whereIdIs('login-user')
                    ->insertNode($session->get('session-user-name'));

        $tableFactory = HtmlElementsFactory::create("table");
        $tableFactory->data = $this->data;
        $tableFactory->dataIds =  array(
                                        "datetime", "transaction_time", 
                                        "client_ip", "squid_result_code",
                                        "client_data", "request_method",
                                        "mime_type"
                                        );
        $tableFactory->openTable();     
        $tableFactory->addTheaderTitle("Datetime");
        $tableFactory->addTheaderTitle("Transaction Time");
        $tableFactory->addTheaderTitle("Client IP");
        $tableFactory->addTheaderTitle("Squid Code");
        $tableFactory->addTheaderTitle("Client Data");
        $tableFactory->addTheaderTitle("Request Method");
        $tableFactory->addTheaderTitle("Mime Type");
        $tableFactory->renderTableData();
        $tableFactory->closeTable();
        $table = $tableFactory->render();

        $dom->whereIdIs("squidDataContainer")->insertNode($table); 

        $paginator = PaginatorFactory::create();
        $paginator->action = "A_ReadAllSquidData";
        $dom->whereIdIs('ul-pagination')
            ->insertNode($paginator->paginationSelect);
        
        $dom->display();
    }
}
?>