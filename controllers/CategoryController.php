<?php 

require_once 'models/Category.php';

class CategoryController{
    public function index(){
        Utils::isAdmin();
        $category = new Category();
        $categories = $category->getAll();

        require_once 'views/category/index.php';
    }

    public function create(){
        Utils::isAdmin();
        require_once 'views/category/create.php';
    }

    public function save(){
        Utils::isAdmin();

        // Guardar en la BD
        if(isset($_POST) && isset($_POST['name'])){
            $category = new Category();

            $category->setName_category($_POST['name']);

            $save = $category->save();
        }

        header("Location: ".base_url."category/index");
    }
}

?>