<?php

namespace App\Controller;

class DashboardController
{
    public function index()
    {
        Controller::getView("dashboard");
    }
}
