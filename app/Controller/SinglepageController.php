<?php

namespace App\Controller;

use App\Model\WikiModel;

class SinglepageController
{
    public function index()
    {
        $wiki = new WikiModel();
        $wikis = $wiki->fetchWikis();
        Controller::getView("singlepage", ['wikis' => $wikis]);
    }
}
