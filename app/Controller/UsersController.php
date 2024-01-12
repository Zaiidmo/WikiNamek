<?php

namespace App\Controller;


use App\Model\Permissions;
use App\Model\UserModel;

class UsersController
{
    public function index()
    {
        $usersPermission = new Permissions();
        $role = $usersPermission->Check();

        if ($role == 'admin') {
            $userModel = new UserModel();
            $users = $userModel->getUsers();

            Controller::getView("users", ['users' => $users]);
        } else {
            Controller::getView("unautorized");
        }
    }

    public function becomeAuthor()
    {
        $userModel = new UserModel();
        $id = $_SESSION['id'];
        $userModel->updateRole($id);
        $_SESSION['role'] = 'author';
        header('Location: ../home');
    }
    public function delete(){
        $redirect = URL_DIR . 'users';
        $userModel = new UserModel();
        $id = $_GET['id'];
        $userModel->deleteUser($id);
        header("Location: $redirect");
    }
}
