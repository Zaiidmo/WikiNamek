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
    public function CreateWiki($table, $data)
    {
        // var_dump($data);
        $this->create($table, $data);
    }
    public function fetchWikis()
    {
        try {
            $query = " SELECT w.id, w.title, w.description, w.creation_date, w.content, w.status, u.user_name AS author, c.name FROM `wiki` w
            INNER JOIN user u ON w.author_id = u.id 
            INNER JOIN category c ON w.category_id = c.id";
            $stmt = $this->pdo->query($query);
            $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $records;
        } catch (PDOException $e) {
            echo "Error fetching records: " . $e->getMessage();
            return [];
        }
    }
    public function approveWiki($id)
    {
        try {
            $query = "UPDATE wiki SET status = 'approved' WHERE id = $id";
            $stmt = $this->pdo->query($query);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error fetching records: " . $e->getMessage();
            return [];
        }
    }
    public function denyWiki($id)
    {
        try {
            $query = "UPDATE wiki SET status = 'denied' WHERE id = $id";
            $stmt = $this->pdo->query($query);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error fetching records: " . $e->getMessage();
            return [];
        }
    }
    public function deleteWiki($id)
    {
        try {
            $query = "UPDATE wiki SET status = 'deleted' WHERE id = $id";
            $stmt = $this->pdo->query($query);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error fetching records: " . $e->getMessage();
            return [];
        }
    }
    public function archiveWiki($id)
    {
        try {
            $query = "UPDATE wiki SET status = 'archived' WHERE id = $id";
            $stmt = $this->pdo->query($query);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error fetching records: " . $e->getMessage();
            return [];
        }
    }

    public function updateWiki($data, $id)
    {
        $tablename = 'wiki';
        $this->update($tablename, $data, $id);
    }

    public function fetchSingleWiki($id)
    {
        $tablename = 'wiki';
        $data = $this->getRecordById($tablename, $id);
        $query = "SELECT user_name FROM user WHERE id = $id";
        $stmt = $this->pdo->query($query);
        $records = $stmt->fetch(PDO::FETCH_ASSOC);
        $data['author_id'] = $records['user_name'];
        return $data;
    }
}
