<?php 
namespace App\Model;

use PDO;
use PDOException;

// session_start();

class Permissions extends Crud 
{
    public function Check(){
        $redirect = URL_DIR . 'login';
        if(isset($_SESSION['id'])){
            try {
                // Step 1: Query the user_role assossiated with the user
                $stmt = $this->pdo->prepare("SELECT * FROM user WHERE id = :id");
                $stmt->bindParam(':id', $_SESSION['id'], PDO::PARAM_STR);
                $stmt->execute();
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                $role = $user['role'];   
                return $role;                   
            } catch (PDOException $e){
                echo 'Database Error: ' . $e->getMessage();
                exit();
            }
        } else {
            // Redirect if the user is not logged in
            header("Location: $redirect");
        }
    }
}