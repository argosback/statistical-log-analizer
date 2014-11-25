<?php
/*
    File        : V_ReadAllRoles.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0

    IDE         : Sublime Text 2.02
*/

class V_ReadAllRoles implements IView, IDataset
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

            ->whereIdIs('table')
                ->removeAttribute('style="display: none;"');

        foreach ($this->data as $key => $datum) 
        {
            $tr = "<tr><td>".$datum["name"]."</td>";
            $tr .= "<td>".$datum["description"]."</td>";

            $tr.= "<td><a href='?role-id=".$datum["id"]."&A_UpdateRoleForm'";
            $tr .= "title='Update Role' class='button'>";
            $tr .= "<i class='glyphicon glyphicon-pencil'></i></a> ";

            $tr .= "<a href='?role-id=".$datum["id"]."&A_DeleteRoleConfirmation'";
            $tr .= "title='Delete Role' class='button'>";
            $tr .= "<i class='glyphicon glyphicon-trash'></i></a></td></tr>";

            $dom->whereIdIs("tbody")->insertNode($tr);     
        }
        $dom->display();
    }
}