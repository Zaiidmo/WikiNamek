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
    public function update_profile($data, $id)
    {
        $tableName = 'user';
        $this->update($tableName, $data, $id);
    }

    public function MyWikis($id)
{
    try {
        // Fetch all wikis for the author
        $queryAll = "SELECT * FROM wiki WHERE author_id = $id";
        $stmtAll = $this->pdo->query($queryAll);
        $allWikis = $stmtAll->fetchAll(PDO::FETCH_ASSOC);

        // Fetch approved wikis
        $queryApproved = "SELECT * FROM wiki WHERE author_id = $id AND status = 'approved'";
        $stmtApproved = $this->pdo->query($queryApproved);
        $approvedWikis = $stmtApproved->fetchAll(PDO::FETCH_ASSOC);

        // Fetch denied wikis
        $queryDenied = "SELECT * FROM wiki WHERE author_id = $id AND status = 'denied'";
        $stmtDenied = $this->pdo->query($queryDenied);
        $deniedWikis = $stmtDenied->fetchAll(PDO::FETCH_ASSOC);

        // Calculate counts
        $counts = [
            'all' => count($allWikis),
            'approved' => count($approvedWikis),
            'denied' => count($deniedWikis),
        ];

        // Return data and counts
        return ['data' => $allWikis, 'counts' => $counts];
    } catch (PDOException $e) {
        echo "Error fetching records: " . $e->getMessage();
        return ['data' => [], 'counts' => []];
    }
}
    public function updateRole($id)
    {
        try {
            $query = "UPDATE user SET role = 'author' WHERE id = $id";
            $stmt = $this->pdo->query($query);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error fetching records: " . $e->getMessage();
            return [];
        }
    }
    public function deleteUser($id)
    {
        $tableName = 'user';
        $this->delete($tableName, $id);
    }
}
