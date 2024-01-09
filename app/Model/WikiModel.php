<?php

namespace App\Model;

use PDO;
use PDOException;

class WikiModel extends Crud
{
    public function fetchCategories()
    {
        $tablename = 'category';
        return $this->read($tablename);
        
    }
}
