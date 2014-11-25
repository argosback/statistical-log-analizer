<?php
/*
    File        : V_ReadAllUsers.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0

    IDE         : Sublime Text 2.02
*/

class V_ReadAllUsers implements IView, IDataset
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
        
                ->whereIdIs('table')
                    ->removeAttribute('style="display: none;"');

        foreach ($this->data as $key => $datum) 
        {
            $tr = "<tr><td>".$datum["name"]."</td>";

            $tr.= "<td><a href='?user-id=".$datum["id"]."&A_UpdateUserForm'";
            $tr .= "title='Update User' class='button'>";
            $tr .= "<i class='glyphicon glyphicon-pencil'></i></a> ";

            $tr .= "<a href='?user-id=".$datum["id"]."&A_DeleteUserConfirmation'";
            $tr .= "title='Delete User' class='button'>";
            $tr .= "<i class='glyphicon glyphicon-trash'></i></a></td></tr>";

            $dom->whereIdIs("tbody")->insertNode($tr);     
        }
        
        $dom->display();
    }
}