<?php
/*
    File        : V_ReadActionsWithStatus.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0

    IDE         : Sublime Text 2.02
*/

class V_ReadActionsWithStatus implements IView, IDataset
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

        $dom->whereIdIs('message-container')
            ->insertNode('Actions Assignment for: '.$this->data['role-name']);

        $dom->whereIdIs('actions-search-form')
                ->removeAttribute('style="display: none;"');
        
        $dom->whereIdIs('actions-assignment-form')
                ->removeAttribute('style="display: none;"');    

        $trs = null;
        foreach($this->data['role-actions'] as $actionRole) 
        {
            if ($actionRole['status'] == 1) 
            {
                $trs .= '<tr><td><div class="checkbox">
                    <label>
                        <b>'.$actionRole['name'].'</b>
                    </label>
                    </td>
                    <td><input name="selected-actions-names[]" 
                        type="checkbox" 
                        value="'.$actionRole['name'].'" checked
                    ></td>
                </div></tr>';
            }
            elseif($actionRole['status'] == 0)
            {
                $trs .= '<tr><td><div class="checkbox">
                        <label>
                            <b>'.$actionRole['name'].'</b>
                        </label>
                        </td>
                        <td><input name="selected-actions-names[]" 
                            type="checkbox" 
                            value="'.$actionRole['name'].'"></td>
                    </div></tr>';                
            }            
        }

        $dom->whereIdIs('tbody')->insertNode($trs); 

        // foreach($this->data['role-actions'] as $actionRole) 
        // {
        //     if ($actionRole['status'] == 1) 
        //     {
        //         $dom->whereIdIs('tbody')
        //             ->insertNode(   
        //                             '<tr><td><div class="checkbox">
        //                                 <label>
        //                                     <b>'.$actionRole['name'].'</b>
        //                                 </label>
        //                                 </td>
        //                                 <td><input name="selected-actions-names[]" 
        //                                     type="checkbox" 
        //                                     value="'.$actionRole['name'].'" checked
        //                                 ></td>
        //                             </div></tr>'
        //                         );
        //     }
        //     elseif($actionRole['status'] == 0)
        //     {
        //         $dom->whereIdIs('tbody')
        //             ->insertNode(   
        //                             '<tr><td><div class="checkbox">
        //                                 <label>
        //                                     <b>'.$actionRole['name'].'</b>
        //                                 </label>
        //                                 </td>
        //                                 <td><input name="selected-actions-names[]" 
        //                                     type="checkbox" 
        //                                     value="'.$actionRole['name'].'"></td>
        //                             </div></tr>'
        //                         );                
        //     }

        // }

        $id = $session->get('selected-role-id');
        $paginator = PaginatorFactory::create();
        $paginator->action = "selected-role-id=".$id."&A_ReadActionsWithStatus";
        $dom->whereIdIs('ul-pagination')
            ->insertNode($paginator->paginationSelect);

        $dom->display();
    }
}
