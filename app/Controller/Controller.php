<?php

namespace App\Controller;

class Controller
{
    public static function getView($view, $data = [])
    {
        $viewPath = "../app/View/$view.php";

        extract($data);  // Extract data array into variables
        include $viewPath;
    }
}
