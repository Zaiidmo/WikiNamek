<?php

namespace App\Controller;

use App\Model\UserModel;

class SignupController
{
    public function index()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['id'])) {
            $redirect = URL_DIR . 'profile';
            header("Location: $redirect");
        } else {
            Controller::getView("signup");
        }
    }
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirm_password'];
            $role = $_POST['userType'];

            //Form validation
            $errors = [];

            if (empty($fullname) || empty($email) || empty($password) || empty($confirmPassword)) {
                $errors[] = "All fields are required";
            }

            if ($password !== $confirmPassword) {
                $errors[] = "Password and confirm password do not match";
            }

            if (count($errors) > 0) {
                // Display validation errors to the user
                $_SESSION['errors'] = $errors;

                // Redirect back to the signup page
                exit;
            }

            // If form validation passes, proceed with creating the user
            $userData = [
                'user_name' => $fullname,
                'email' => $email,
                'role' => $role,
                'password' => password_hash($password, PASSWORD_DEFAULT)
            ];

            $user = new UserModel();
            $redirect = URL_DIR . 'login';
            $userCreated = $user->createUser($userData);
            if ($userCreated) {
                $_SESSION['success'] = "User created successfully";
                header("Location: $redirect");
            } else {
                $_SESSION['error'] = "Error creating user";
                header("Location: $redirect");
            }
        }
    }
}
