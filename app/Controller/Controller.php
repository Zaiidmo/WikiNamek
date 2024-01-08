<?php

namespace App\Controller;

class Controller
{
    public static function getView($view)
    {
        include "../app/View/$view.php";
    }
}
