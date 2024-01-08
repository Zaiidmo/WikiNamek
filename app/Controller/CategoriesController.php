<?php

namespace App\Controller;

use App\Model\Permissions;

class CategoriesController
{
    public function index()
    {
        $categories_permission = new Permissions();
        $role = $categories_permission->Check();
        if ($role == 'admin') {
            Controller::getView("categories");
        } else {
            Controller::getView("error404");
        }
    }
}
