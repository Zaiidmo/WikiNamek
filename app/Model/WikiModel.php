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
    public function CreateWiki($table, $data){
        // var_dump($data);
        $this->create($table, $data);
    }
}
