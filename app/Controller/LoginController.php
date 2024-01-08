<?php

namespace App\Controller;

use App\Model\UserModel;

class LoginController
{
    public function index()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['id'])) {
            $redirect = URL_DIR . 'dashboard';
            header("Location: $redirect");
        } else {
            Controller::getView("login");
        }
    }
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $userModel = new UserModel();
            $users = $userModel->signin($email);
            //Stocking DATA
            if ($users > 0) {
                $pwdCheck = password_verify($password, $users['password']);
                if ($pwdCheck) {
                    // Password is correct, set session variables
                    $redirect = URL_DIR . 'home';
                    $_SESSION['id'] = $users['id'];
                    $_SESSION['full_name'] = $users['full_name'];
                    $_SESSION['email'] = $users['email'];
                    $_SESSION['phone_number'] = $users['phone_number'];
                    // var_dump($_SESSION);
                    header("Location: $redirect");
                    // echo 'You have successfully logged in.';
                } else {
                    $password_incorect = 'Incorrect Password!';
                    $_SESSION['password_incorect'] = $password_incorect;
                    $redirect = URL_DIR . 'signin';
                    header("Location: $redirect");
                }
            } else {
                $user_not_found = 'User Not Found !!!';
                $_SESSION['user_not_found'] = $user_not_found;
                $redirect = URL_DIR . 'signin';
                header("Location: $redirect");
            }
        }
    }
}
