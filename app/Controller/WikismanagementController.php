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
            Controller::getView("error404");
        }
    }
}
