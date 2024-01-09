<?php

namespace App\Model;

use PDO;
use PDOException;

class CategoriesModel extends Crud
{
    public function fetchCategories()
    {
        $tablename = 'category';
        return $this->read($tablename);
        // $count = $this->show_stats('wiki');
        // return[$data,$count];
    }
}