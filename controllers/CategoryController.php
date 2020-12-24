<?php 

require_once 'models/Category.php';
require_once 'models/Product.php';

class CategoryController{
    public function index(){
        Utils::isAdmin();
        $category = new Category();
        $categories = $category->getAll();

        require_once 'views/category/index.php';
    }

    public function see(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $category = new Category;
            $category->setId_category($id);
            $category = $category->getOne();

            $product = new Product;
            $product->setId($id);
            $products = $product->getAllCategory();
        }
        require_once 'views/category/see.php';
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