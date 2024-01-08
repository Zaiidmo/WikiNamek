<?php

namespace App\Controller;

class HomeController
{
    public function index()
    {
        Controller::getView("home");
    }
}
