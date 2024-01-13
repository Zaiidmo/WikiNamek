<?php

namespace App\Model;

use App\Model\Crud;
use PDO;
class Statistics extends Crud
{
    public function getTotalUsers()
    {
        return ['totalUsers' => $this->show_stats('user')];
    }

    public function getTotalAuthors()
    {
        return ['totalAuthors' => $this->show_stats('user', 'WHERE role = "author"')];
    }

    public function getTotalReaders()
    {
        return ['totalReaders' => $this->show_stats('user', 'WHERE role = "reader"')];
    }
    public function getTotalWikis()
    {
        return ['totalWikis' => $this->show_stats('wiki')];
    }
    public function getApprovedWikis()
    {
        return ['approvedWikis' => $this->show_stats('wiki', 'WHERE status = "approved"')];
    }
    public function getDeniedWikis()
    {
        return ['deniedWikis' => $this->show_stats('wiki', 'WHERE status = "denied"')];
    }


}
