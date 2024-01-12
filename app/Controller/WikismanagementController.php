<?php

namespace App\Controller;
    
use App\Model\Permissions;
use App\Model\WikiModel;

class WikismanagementController
{
    public function index()
    {
        $wikis_permission = new Permissions();
        $role = $wikis_permission->Check();
        if ($role == 'admin') {
            $WikiModel = new WikiModel();
            $Wikis = $WikiModel->fetchWikis();
            Controller::getView("wikismanagement", ['wikis' => $Wikis]);        
        } else {
            Controller::getView("unautorized");
        }
    }
    public function approve(){
        $id = $_GET['id'];
        $WikiModel = new WikiModel();
        $WikiModel->approveWiki($id);
        header("Location: ../../wikismanagement");
    }
    public function deny(){
        $id = $_GET['id'];
        $WikiModel = new WikiModel();
        $WikiModel->denyWiki($id);
        header("Location: ../../wikismanagement");
    }
    public function delete(){
        $id = $_GET['id'];
        $WikiModel = new WikiModel();
        $WikiModel->deleteWiki($id);
        header("Location: ../../wikismanagement");
    }
    public function archive(){
        $id = $_GET['id'];
        $WikiModel = new WikiModel();
        $WikiModel->archiveWiki($id);
        header("Location: ../../wikismanagement");
    }
}
