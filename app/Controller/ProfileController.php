<?php

namespace App\Controller;

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
            $uploadDirectory = "C:/laragon/www/Wikinamek/public/assets/uploads/";
            $filename = preg_replace("/[^a-zA-Z0-9]/", "_", $_POST['user_name']);
            $targetFileName = $uploadDirectory . $filename . "." . strtolower(pathinfo($profile_picture['name'], PATHINFO_EXTENSION));

            // Validate file extension
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            if (!in_array(strtolower(pathinfo($profile_picture['name'], PATHINFO_EXTENSION)), $allowedExtensions)) {
                echo 'Invalid file extension.';
                return;
            }

            if (move_uploaded_file($profile_picture['tmp_name'], $targetFileName)) {
                $data['profile_picture'] = $filename . "." . "jpeg";
            } else {
                echo 'File upload failed. Please try again later.';
                return;
            }
        }
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
        $_SESSION['user_name'] = $data['user_name'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['profile_picture'] = $data['profile_picture'];
        Controller::getView('profile', ['data' => $_SESSION]);
        
    }
}
