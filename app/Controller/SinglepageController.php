<?php

namespace App\Controller;

use App\Model\WikiModel;

class SinglepageController
{
    public function index()
    {
        $id = $_POST['id'];
        // var_dump($_POST);  // Check if the id is being correctly retrieved

        $wikis = new WikiModel();
        $wiki = $wikis->fetchSingleWiki($id);
        Controller::getView("singlepage", ['wiki' => $wiki]);
    }
}
