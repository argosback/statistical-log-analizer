<?php
/*
    File        : V_DeleteRoleConfirmation.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0

    IDE         : Sublime Text 2.02
*/

class V_DeleteRoleConfirmation implements IView, IDataset
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
        $dom->setDocumentFromFile(ROLES_HTML)

        ->whereIdIs('login-user')
        ->insertNode($session->get('session-user-name'))   
                
        ->whereIdIs('delete-form')
        ->removeAttribute('style="display: none;"')

        ->whereIdIs('confirm-delete-message')
        ->insertNode('Delete the role: '.$this->data['name'])
        
        ->display();
    }
}