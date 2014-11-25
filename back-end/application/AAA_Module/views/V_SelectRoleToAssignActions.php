<?php
/*
    File        : V_SelectRoleToAssignActions.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0

    IDE         : Sublime Text 2.02
*/

class V_SelectRoleToAssignActions implements IView, IDataset
{
    private $data;

    public function setInData($data)
    {
        $this->data = $data;
    }

    public function display()
    {
        $dom = DOMHandlerFactory::create();
        $dom->setDocumentFromFile(ACTIONS_ASSIGNMENT_HTML);

        $session = SessionFactory::create();
        $dom->whereIdIs('login-user')
                ->insertNode($session->get('session-user-name'));  

        $dom->whereIdIs('role-select-form')
                ->removeAttribute('style="display: none;"');

        $options = null; 
        foreach ($this->data as $datum) 
        {
            $options .= '<option value="'.$datum['id'].'">'.$datum['name'].'</option>';
        }

        $dom->whereIdIs('role-select-input')
                ->insertNode($options);

        $dom->display();
    }
}