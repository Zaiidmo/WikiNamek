<?php

namespace App\Controller;

use App\Model\Crud;
use App\Model\WikiModel;
use PDO;
use PDOException;

class NewWikiController extends Crud
{
    public function index()
    {
        $category = new WikiModel();
        $categories = $category->fetchCategories();
        // var_dump($category);die;
        Controller::getView("NewWiki", ['categories' => $categories]);

    }
    
    public function create_wiki()
    {
        $Wiki = new WikiModel();
        $data = [];
        if (isset($_FILES['picture']) && !empty($_FILES['picture']['tmp_name'])) {
            
            $picture = $_FILES['picture'];
            $uploadDirectory = "C:/laragon/www/StadiumStream/public/assets/uploads/"; // Update this path to your local directory
            $filename = preg_replace("/[^a-zA-Z0-9]/", "_", $_POST['team1']) . "vs" .  preg_replace("/[^a-zA-Z0-9]/", "_", $_POST['team2']);
            $targetFileName = $uploadDirectory . $filename . "." . strtolower(pathinfo($picture['name'], PATHINFO_EXTENSION));

            if (move_uploaded_file($picture['tmp_name'], $targetFileName)) {
                $data['picture'] = $filename . '.jpg';
            } else {
                echo 'File upload failed.';
                return;
            }
        }
        $title = $_POST['title'];
        $description = $_POST['description'];
        $category = $_POST['category'];
        $content = $_POST['content'];
        $picture = $_POST['picture'];
        $user_id = $_SESSION['user_id'];
        
    }
}
