<?php

namespace App\Controller;

use App\Model\CategoriesModel;
use App\Model\Permissions;

class CategoriesController
{
    public function index()
    {
        $categories_permission = new Permissions();
        $role = $categories_permission->Check();
        if ($role == 'admin') {
            $CategoriesModel = new CategoriesModel();
            $Categories = $CategoriesModel->fetchCategories();
            Controller::getView("categories", ['categories' => $Categories]);
        } else {
            Controller::getView("error404");
        }
    }
}
