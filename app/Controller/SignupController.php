<?php

namespace App\Controller;

class SignupController {
    public function index()
    {
        Controller::getView("sigup");
    }
}