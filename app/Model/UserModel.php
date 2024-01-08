<?php

namespace App\Model;

use PDOException;

class UserModel extends Crud
{
    public function displayusers()
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
    public function login(){
        
    }
}
