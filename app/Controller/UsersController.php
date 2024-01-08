<?php

namespace App\Controller;

use App\Model\Permissions;
use App\Model\UserModel;

class UsersController
{
    public function index()
    {
        $usersPermission = new Permissions();
        $role = $usersPermission->Check();
    
        if ($role == 'admin') {
            $userModel = new UserModel();
            $users = $userModel->getUsers();
    
            Controller::getView("users", ['users' => $users]);
        } else {
            Controller::getView("error404");
        }
    }

    public function delete(){
        
    }
    
}