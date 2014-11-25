<?php
/*
    File        : V_UpdateUserForm.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0

    IDE         : Sublime Text 2.02
*/

class V_UpdateUserForm implements IView, IDataset
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
        $dom->setDocumentFromFile(USERS_HTML)
                
            ->whereIdIs('login-user')
            ->insertNode($session->get('session-user-name'))
            
            ->whereIdIs('create-update-form')
            ->removeAttribute('style="display: none;"')

            ->whereIdIs('user-name-id')
            ->insertAttribute('value="'.$this->data['name'].'"')

            ->whereIdIs('save-button-id')
            ->insertAttribute('name="A_UpdateUser"')
            
            ->display();
    }
}