<?php

namespace App\Controller;

use App\Model\Crud;

class WikisController extends Crud
{
    public function index()
    {
        
        Controller::getView("wikis");
    }
    
}
