<?php

namespace App\Controller;

use App\Model\Crud;
use App\Model\WikiModel;

class WikisController extends Crud
{
    public function index()
    {
        $wiki = new WikiModel();
        $wikis = $wiki->fetcApprovedhWikis();
        Controller::getView("wikis", ['wikis' => $wikis]);
    }
    
}
