<?php

namespace App\Controller;

use App\Model\Permissions;
use App\Model\Statistics;

class DashboardController
{
    public function index()
    {
        $statistics = new Statistics();
        $totalUsersData = $statistics->getTotalUsers();
        $totalAuthorsData = $statistics->getTotalAuthors();
        $totalAdminsData = $statistics->getTotalAdmins();
        $totalReadersData = $statistics->getTotalReaders();
        $totalWikisData = $statistics->getTotalWikis();
        $pendingWikisData = $statistics->getPendingWikis();
        $approvedWikisData = $statistics->getApprovedWikis();
        $deniedWikisData = $statistics->getDeniedWikis();
        $categories = $statistics->getCatefories();
        $tags = $statistics->getTags();


        $users = $totalUsersData['totalUsers'];
        $authors = $totalAuthorsData['totalAuthors'];
        $readers = $totalReadersData['totalReaders'];
        $admins = $totalAdminsData['totalAdmins'];
        $wikis = $totalWikisData['totalWikis'];
        $pending = $pendingWikisData['pendingWikis'];
        $approved = $approvedWikisData['approvedWikis'];
        $denied = $deniedWikisData['deniedWikis'];
        $category = $categories['categories'];
        $tag = $tags['tags'];


        $statisticsData = [
            'users' => $users,
            'authors' => $authors,
            'readers' => $readers,
            'admins' => $admins,
            'wikis' => $wikis,
            'pending' => $pending,
            'approved' => $approved,
            'denied' => $denied,
            'category' => $category,
            'tags' => $tag,
        ];


        $dashboard_per = new Permissions();
        $role = $dashboard_per->Check();
        if ($role == 'admin') {
            Controller::getView("dashboard", $statisticsData);
        } else {
            Controller::getView("unautorized");
        }
    }
}
