<?php
/*
    File        : V_EnterFilterDataForm.php

    Project     : Statistical Log Analizer

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class V_EnterFilterDataForm implements IView, IDataset
{
    private $data = array();

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
                    ->insertNode($session->get('session-user-name'))
                ->whereIdIs('filter-data-form')
                	->removeAttribute('style="display: none;"'); 

        //CLIENT IP SELECT INPUT
        $selectedClientIp = $session->get("selected-client-ip");
        $options = null; 
        foreach ($this->data["client-ips"] as $datum) 
        {
            if($datum['client_ip'] == $selectedClientIp)
            {
                $options .= '<option selected value="'.$selectedClientIp.'">'.$selectedClientIp.'</option>';
            }
            else
            {
                $options .= '<option value="'.$datum['client_ip'].'">'.$datum['client_ip'].'</option>';
            }
        }
        $dom->whereIdIs('client-ip-select-input')
            ->insertNode($options);

        //DATE SELECT INPUT
        $selectedDate = $session->get("selected-date");
        $options = null;
        foreach ($this->data["dates"] as $datum) 
        {
            if($datum['date'] == $selectedDate)
            {
                $options .= '<option selected value="'.$selectedDate.'">'.$selectedDate.'</option>';
            }
            else
            {
                $options .= '<option value="'.$datum['date'].'">'.$datum['date'].'</option>';
            }
        }
        $dom->whereIdIs('date-select-input')
            ->insertNode($options);

        //DISPLAY
        $dom->display();       
    }
}
?>