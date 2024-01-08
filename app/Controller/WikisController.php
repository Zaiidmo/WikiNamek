<?php

namespace App\Controller;

class WikisController
{
    public function index()
    {
        Controller::getView("wikis");
    }
}
