<?php

namespace App\Controller;

use App\Model\Permissions;

class WikismanagementController
{
    public function index()
    {
        $wikis_permission = new Permissions();
        $role = $wikis_permission->Check();
        if ($role == 'admin') {
            Controller::getView("wikismanagement");
        } else {
            Controller::getView("error404");
        }
    }
}
