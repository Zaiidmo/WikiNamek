<?php

namespace App\Controller;

use App\Model\HomeModel;

class HomeController
{
    public function index()
    {
        $wiki = new HomeModel();
        $wikis = $wiki->popularWikis();
        $authors = $wiki->popularAuthors();
        $viewData = [
            'wikis' => $wikis,
            'authors' => $authors
        ];
        Controller::getView("home", $viewData);
    }
}
