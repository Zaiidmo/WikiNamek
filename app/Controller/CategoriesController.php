<?php

namespace App\Controller;

use App\Model\CategoriesModel;
use App\Model\Permissions;
use App\Model\WikiModel;

class CategoriesController
{
    public function index()
    {
        $categories_permission = new Permissions();
        $role = $categories_permission->Check();
        if ($role == 'admin') {
            $CategoriesModel = new CategoriesModel();
            $Categories = $CategoriesModel->fetchCategories();
            foreach ($Categories as $category) {
                $wikiCount = $CategoriesModel->getWikiCountByCategoryId($category['id']);
                $wikiCounts[$category['id']] = $wikiCount;
            }
            $viewData = [
                'categories' => $Categories,
                'wikiCount' => $wikiCounts
            ];
            // var_dump($viewData);die;
            Controller::getView("categories", $viewData);
        } else {
            Controller::getView("unautorized");
        }
    }
    public function deleteCat(){
        $redirect = URL_DIR . 'categories';
        $CategoriesModel = new CategoriesModel();
        $id = $_GET['id'];
        $CategoriesModel->deleteCategory($id);
        header("Location: $redirect");
    }
    public function editCat(){
        $redirect = URL_DIR . 'categories';
        $CategoriesModel = new CategoriesModel();
        // var_dump($_POST);die;
        $id = $_POST['id'];
        unset($_POST['id']);
        $data = $_POST['name'];
        $name = [
            'name' => $data,
        ];
        $CategoriesModel->editCategory($name,$id);
        header("Location: $redirect");
    }

}
