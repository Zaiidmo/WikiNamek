<?php 
namespace App\Model;

use PDO;

class HomeModel extends Crud {
    public function popularWikis(){
        $query = "SELECT w.id, w.title, w.description,w.picture, w.creation_date, w.content, w.status, u.user_name AS author, c.name FROM `wiki` w
        INNER JOIN user u ON w.author_id = u.id 
        INNER JOIN category c ON w.category_id = c.id
        WHERE w.status = 'approved'
        ORDER BY w.creation_date DESC
        LIMIT 3";
        $stmt = $this->pdo->query($query);
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $records;
    }
    public function popularAuthors(){
        $query = "SELECT u.profile_picture AS profile, u.email, u.user_name, COUNT(w.author_id) AS wikis FROM `wiki` w
        INNER JOIN user u ON w.author_id = u.id
        -- WHERE w.status = 'approved'
        GROUP BY w.author_id
        ORDER BY wikis DESC
        LIMIT 3";
        $stmt = $this->pdo->query($query);
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $records;
    }
}
