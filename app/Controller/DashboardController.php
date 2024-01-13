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
        $totalReadersData = $statistics->getTotalReaders();
        $totalWikisData = $statistics->getTotalWikis();
        $approvedWikisData = $statistics->getApprovedWikis();
        $deniedWikisData = $statistics->getDeniedWikis();
        $categories = $statistics->getCatefories();
        $tags = $statistics->getTags();


        $users = $totalUsersData['totalUsers'];
        $authors = $totalAuthorsData['totalAuthors'];
        $readers = $totalReadersData['totalReaders'];
        $wikis = $totalWikisData['totalWikis'];
        $approved = $approvedWikisData['approvedWikis'];
        $denied = $deniedWikisData['deniedWikis'];
        $category = $categories['categories'];
        $tag = $tags['tags'];


        $statisticsData = [
            'users' => $users,
            'authors' => $authors,
            'readers' => $readers,
            'wikis' => $wikis,
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
