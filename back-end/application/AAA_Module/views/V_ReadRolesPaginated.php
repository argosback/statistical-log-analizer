<?php
/*
    File        : V_ReadRolesPaginated.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0

    IDE         : Sublime Text 2.02
*/

class V_ReadRolesPaginated implements IView, IDataset
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

        $trs = null;
        foreach ($this->data['roles'] as $key => $role) 
        {
            $trs .= "<tr><td>".$role["name"]."</td>";
            $trs .= "<td>".$role["description"]."</td>";

            $trs .= "<td><a href='?role-id=".$role["id"]."&A_UpdateRoleForm'";
            $trs .= "title='Update Role' class='button'>";
            $trs .= "<i class='glyphicon glyphicon-pencil'></i></a> ";

            $trs .= "<a href='?role-id=".$role["id"]."&A_DeleteRoleConfirmation'";
            $trs .= "title='Delete Role' class='button'>";
            $trs .= "<i class='glyphicon glyphicon-trash'></i></a></td></tr>";      
        }
        $dom->whereIdIs("tbody")->insertNode($trs); 

        $paginator = PaginatorFactory::create();
        $paginator->action = "A_ReadRolesPaginated";
        $dom->whereIdIs('ul-pagination')
            ->insertNode($paginator->paginationSelect);
        
        $dom->display();
    }
}