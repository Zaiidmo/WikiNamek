<?php

namespace App\Controller;

use App\Model\Permissions;

class DashboardController
{
    public function index()
    {
        $dashboard_per = new Permissions();
        $role = $dashboard_per->Check();
        if ($role == 'admin') {
            Controller::getView("dashboard");
        } else {
            Controller::getView("error404");
        }
    }
}
