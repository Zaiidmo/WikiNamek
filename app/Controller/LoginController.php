<?php

namespace App\Controller;

class LoginController {
    public function index()
    {
        Controller::getView("login");
    }
}