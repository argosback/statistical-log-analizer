<?php
/*
    File        : V_UpdateRoleForm.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0

    IDE         : Sublime Text 2.02
*/

class V_UpdateRoleForm implements IView, IDataset
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
            
            ->whereIdIs('create-update-form')
            ->removeAttribute('style="display: none;"')

            ->whereIdIs('role-name')
            ->insertAttribute('value = "'.$this->data['name'].'"')

            ->whereIdIs('role-description-txtarea')
            ->insertNode($this->data['description'])

            ->whereIdIs('save-button')
            ->insertAttribute('name="A_UpdateRole"')
            
            ->display();
    }
}