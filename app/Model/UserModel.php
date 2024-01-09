<?php

namespace App\Model;

use PDO;
use PDOException;

class UserModel extends Crud
{
    public function getUsers()
    {
        return $this->read('user');
    }
    public function createUser($userData)
    {
        try {
            //insert data into user table
            $userCreated = $this->create('user', $userData) !== false;
            // if ($userCreated) {
            //retrieve the userID
            // $userID = $this->pdo->lastInsertId();
            // //insert data into user_role table
            // $userRoleData = [
            //     'user_id' => $userID,
            //     'role_id' => 1
            // ];
            // $userRoleCreated = $this->create('user_role', $userRoleData) !== false;
            return $userCreated;
            // } else {
            //     return false;
            // }
        } catch (PDOException $e) {
            echo "PDO Exception: " . $e->getMessage();
            return false;
        }
    }
    public function login($email)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM user WHERE email = :email");
            $stmt->execute([':email' => $email]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Database Error: ' . $e->getMessage();
            exit();
        }
    }
    public function update_profile($data, $id){
        $tableName = 'user';
        $this->update($tableName, $data, $id);
    }

    public function fetchWikis($id){
        $myWikis = $this->getRecordById('wiki', $id);
        return $myWikis;
    }
}
