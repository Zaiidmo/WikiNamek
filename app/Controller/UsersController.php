<?php

namespace App\Controller;

class UsersController
{
    public function index()
    {
        Controller::getView("users");
    }
}