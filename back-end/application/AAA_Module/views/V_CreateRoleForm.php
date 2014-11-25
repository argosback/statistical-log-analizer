<?php
/*
    File        : V_CreateRoleForm.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0

    IDE         : Sublime Text 2.02
*/

class V_CreateRoleForm implements IView
{
    public function display()
    {
        $session = SessionFactory::create();
        $dom = DOMHandlerFactory::create();
        $dom->setDocumentFromFile(ROLES_HTML)
                
            ->whereIdIs('login-user')
            ->insertNode($session->get('session-user-name'))

            ->whereIdIs('create-update-form')
            ->removeAttribute('style="display: none;"')
            ->whereIdIs('save-button')
            ->insertAttribute('name="A_CreateRole"')
               
            ->display();
    }
}