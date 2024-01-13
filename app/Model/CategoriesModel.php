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
    public function getWikiCountByCategoryId($categoryId) {
        $tablename = 'wiki';
        $condition = "WHERE category_id = $categoryId";
        return $this->show_stats($tablename, $condition);
    }
    public function deleteCategory($categoryId){
        $tablename = 'category';
        return $this->delete($tablename, $categoryId);
    }
    public function editCategory($data,$categoryId){
        $tablename = 'category';
        return $this->update($tablename,$data, $categoryId);
    }
    public function CreateNew($data){
        $tablename = 'category';
        return $this->create($tablename, $data);
    }
}