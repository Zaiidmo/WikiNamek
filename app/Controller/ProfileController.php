<?php

namespace App\Controller;

session_start();

use App\Model\UserModel;

class ProfileController
{
    public function index()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['id'])) {
            Controller::getView('profile');
        } else {
            Controller::getView('login');
        }
    }

    public function editprofile()
    {
        $userModel = new UserModel();

        // Initialize the $data array
        $data = [];

        // Check if the 'profile_picture' file input is set and not empty
        if (isset($_FILES['profile_picture']) && !empty($_FILES['profile_picture']['tmp_name'])) {
            $profile_picture = $_FILES['profile_picture'];
            $uploadDirectory = URL_DIR . "public/assets/uploads/";
            $filename = preg_replace("/[^a-zA-Z0-9]/", "_", $_POST['user_name']);
        
            // Validate file extension
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            $originalExtension = strtolower(pathinfo($profile_picture['name'], PATHINFO_EXTENSION));
        
            if (!in_array($originalExtension, $allowedExtensions)) {
                echo 'Invalid file extension.';
                return;
            }
        
            $targetFileName = $uploadDirectory . $filename . '.' . $originalExtension;
        
            if (move_uploaded_file($profile_picture['tmp_name'], $targetFileName)) {
                $data['profile_picture'] = $filename . '.' . $originalExtension;
            } else {
                echo 'File upload failed. Please try again later.';
                return;
            }
        }
        
        // Check if the 'id' input is set and not empty
        $id = $_POST['id'];
        unset($_POST['id']);
        $data['user_name'] = $_POST['user_name'];
        $data['email'] = $_POST['email'];
        // Hash the password if provided
        if (!empty($_POST['password'])) {
            $data['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        }
        // var_dump($data);

        $userModel->update_profile($data, $id);
        $redirect = URL_DIR . 'profile';
        $_SESSION['user_name'] = $data['user_name'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['profile_picture'] = $data['profile_picture'];
        header("Location: $redirect");
    }
}