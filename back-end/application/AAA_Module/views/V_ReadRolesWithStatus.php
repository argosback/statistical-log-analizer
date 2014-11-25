<?php
/*
    File        : V_ReadRolesWithStatus.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0

    IDE         : Sublime Text 2.02
*/

class V_ReadRolesWithStatus implements IView, IDataset
{
    private $data;

    public function setInData($data)
    {
        $this->data = $data;
    }

    public function display()
    {
        $dom = DOMHandlerFactory::create();
        $dom->setDocumentFromFile(ROLES_ASSIGNMENT_HTML);

        $dom->whereIdIs('message-container')
            ->insertNode('Role Assignment for: '.$this->data['user-name']);

        $dom->whereIdIs('roles-assignment-form')
                ->removeAttribute('style="display: none;"');  

        $session = SessionFactory::create();
        $dom->whereIdIs('login-user')
                ->insertNode($session->get('session-user-name'));    

        foreach($this->data['user-roles'] as $userRole) 
        {
            if ($userRole['status'] == 1) 
            {
                $dom->whereIdIs('role-assignment-checkboxs')
                    ->insertNode(   
                                    '<div class="checkbox">
                                        <input name="selected-roles-ids[]" 
                                            type="checkbox" 
                                            value="'.$userRole['id'].'" checked
                                        >
                                        <label>
                                            <b>'.$userRole['name'].'</b> '
                                            .$userRole['description'].
                                        '</label>
                                    </div>'
                                );
            }
            elseif($userRole['status'] == 0)
            {
                $dom->whereIdIs('role-assignment-checkboxs')
                    ->insertNode(   
                                    '<div class="checkbox">
                                        <input name="selected-roles-ids[]" 
                                            type="checkbox" 
                                            value="'.$userRole['id'].'">
                                        <label>
                                            <b>'.$userRole['name'].'</b> '
                                            .$userRole['description'].
                                        '</label>
                                    </div>'
                                );                
            }

        }

        $dom->display();
    }
}

