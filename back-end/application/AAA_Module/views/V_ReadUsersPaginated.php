<?php
/*
    File        : V_ReadUsersPaginated.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0

    IDE         : Sublime Text 2.02
*/

class V_ReadUsersPaginated implements IView, IDataset
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

        $trs = null;
        foreach ($this->data['users'] as $key => $user) 
        {
            $trs .= "<tr><td>".$user["name"]."</td>";

            $trs .= "<td><a href='?user-id=".$user["id"]."&A_UpdateUserForm'";
            $trs .= "title='Update User' class='button'>";
            $trs .= "<i class='glyphicon glyphicon-pencil'></i></a> ";

            $trs .= "<a href='?user-id=".$user["id"]."&A_DeleteUserConfirmation'";
            $trs .= "title='Delete User' class='button'>";
            $trs .= "<i class='glyphicon glyphicon-trash'></i></a></td></tr>";       
        }
        $dom->whereIdIs("tbody")->insertNode($trs); 

        $paginator = PaginatorFactory::create();
        $paginator->action = "A_ReadUsersPaginated";
        $dom->whereIdIs('ul-pagination')
            ->insertNode($paginator->paginationSelect);
        
        $dom->display();
    }
}