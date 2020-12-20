<?php

class Utils{
    public static function deleteSession($session_name){
        if(isset($_SESSION[$session_name])){
            $_SESSION[$session_name] = null;
        }

        return $session_name;
    }

    public static function isAdmin(){
        if(!isset($_SESSION['admin'])){
            header("Location: ".base_url);
        }else{
            return true;
        }
    }

    public static function showCategories(){
        require_once 'models/Category.php';

        $category = new Category();
        $categories = $category->getAll();

        return $categories;
    }
}

?>