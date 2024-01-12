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
            $uploadDirectory = "C:/laragon/www/Wikinamek/public/assets/uploads/";
            $filename = preg_replace("/[^a-zA-Z0-9]/", "_", $_POST['title']);
        
            // Validate file extension
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            $originalExtension = strtolower(pathinfo($picture['name'], PATHINFO_EXTENSION));
        
            if (!in_array($originalExtension, $allowedExtensions)) {
                echo 'Invalid file extension.';
                return;
            }
        
            $targetFileName = $uploadDirectory . $filename . '.' . $originalExtension;
        
            if (move_uploaded_file($picture['tmp_name'], $targetFileName)) {
                $data['picture'] = $filename . '.' . $originalExtension;
            } else {
                echo 'File upload failed. Please try again later.';
                return;
            }
        }
        $tags = explode(",", $_POST["tags"]);
        $data['title'] = $_POST['title'];
        $data['description'] = $_POST['Description'];
        $data['category_id'] = $_POST['category'];
        $data['content'] = $_POST['content'];
        $data['author_id'] = $_SESSION['id'];
        // var_dump($data);die;
        $Wiki->CreateWiki('wiki', $data, $tags);
        header('Location: ../wikis');
    }

}
