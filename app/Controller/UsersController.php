<?php

namespace App\Controller;

use App\Model\Permissions;

class UsersController
{
    public function index()
    {
        $users_permission = new Permissions();
        $role = $users_permission->Check();
        if ($role == 'admin') {
            Controller::getView("users");
        } else {
            Controller::getView("error404");
        }
    }
}