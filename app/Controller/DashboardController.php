<?php

namespace App\Controller;

use App\Model\Permissions;
use App\Model\Statistics;

class DashboardController
{
    public function index()
    {
        // $statistics = new Statistics();
        // $totalUsersData = $statistics->getTotalUsers();
        // $totalAuthorsData = $statistics->getTotalAuthors();
        // $totalReadersData = $statistics->getTotalReaders();
        // $totalWikisData = $statistics->getTotalWikis();
        // $approvedWikisData = $statistics->getApprovedWikis();
        // $deniedWikisData = $statistics->getDeniedWikis();

        // $users = $totalUsersData['totalUsers'];
        // $author = $totalAuthorsData['totalAuthors'];
        // $reader = $totalReadersData['totalReaders'];
        // $wiki = $totalWikisData['totalWikis'];
        // $approved = $approvedWikisData['approvedWikis'];
        // $denied = $deniedWikisData['deniedWikis'];


        $dashboard_per = new Permissions();
        $role = $dashboard_per->Check();
        if ($role == 'admin') {
            Controller::getView("dashboard");
        } else {
            Controller::getView("unautorized");
        }
    }
}
