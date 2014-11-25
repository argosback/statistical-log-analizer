<?php
/*
    File        : V_Messenger.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0

    IDE         : Sublime Text 2.02
*/

class V_Messenger implements IView, IDataset
{
    private $data;

    public function setInData($data)
    {
        $this->data = $data;
    }

    public function display()
    {
        $dom = DOMHandlerFactory::create();
        
        $dom->setDocumentFromFile(MESSENGER_HTML)
                ->whereIdIs('message')
                    ->insertNode($this->data); 

        $session = SessionFactory::create();
        $dom->whereIdIs('login-user')
                ->insertNode($session->get('session-user-name'));    
        
        $dom->display();
        exit();
    }
}