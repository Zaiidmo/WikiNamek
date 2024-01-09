<?php

namespace App\Controller;

use App\Model\WikiModel;

class HomeController
{
    public function index()
    {
        $wiki = new WikiModel();
        $wikis = $wiki->fetchWikis();
        Controller::getView("home", ['wikis' => $wikis]);
    }
}
