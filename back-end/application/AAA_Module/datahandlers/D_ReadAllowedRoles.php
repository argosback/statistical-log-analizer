<?php
/*
    File        : D_ReadAllowedRoles.php

    Project     : Classset

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/

class D_ReadAllowedRoles implements IDataset, IDataget
{
    private $data;

    public function setInData($data)
    {
        $this->data = $data;
    }

    public function getOutData()
    {
    	$actionName = $this->data['action-name'];
    	$userId = $this->data['user-id'];
      $adminRoleId = $this->data['admin-role-id'];

        $query = "SELECT roles.*
                  FROM roles
                  LEFT JOIN roles_actions
                  ON roles_actions.role_id = roles.id
                  WHERE roles_actions.action_name = '$actionName'

        				  INTERSECT

        				  SELECT roles.*
                          FROM roles 
                          LEFT JOIN users_roles
                          ON users_roles.role_id = roles.id
                          WHERE users_roles.user_id = $userId

                  UNION

                  SELECT roles.*
                          FROM roles 
                          LEFT JOIN users_roles
                          ON users_roles.role_id = $adminRoleId
                          WHERE users_roles.user_id = $userId"; 
                  
        $db = DatabaseFactory::create("AAADatabase")->connect();
        return $db->SQLFetchAllArray($query);
    }
}
?>