<?php

namespace App\Controller;

use App\Model\UserModel;

session_start();

class LoginController
{
    public function index()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['id'])) {
            $redirect = URL_DIR . 'home';
            header("Location: $redirect");
        } else {
            Controller::getView("login");
        }
    }
    public function login()
    {
        if (isset($_POST['login'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $userModel = new UserModel();
            $user = $userModel->login($email);

            if ($user && password_verify($password, $user['password'])) {
                // Password is correct, set session variables
                $_SESSION['id'] = $user['id'];
                $_SESSION['user_name'] = $user['user_name'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['role'] = $user['role'];
                $redirect = URL_DIR . 'home';
                header("Location: $redirect");
                exit();
            } else {
                // Invalid login attempt
                $_SESSION['login_error'] = 'Invalid email or password';
                $redirect = URL_DIR . 'login';
                header("Location: $redirect");
                exit();
            }
        }
    }

    public function logout(){
        if (isset($_POST['logout'])) {
            session_start();
            session_unset();
            session_destroy();
            $redirect = URL_DIR . 'home';
            header("Location: $redirect");
            exit();
        }
    }
}
