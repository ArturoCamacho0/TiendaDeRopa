<?php

class Category{
    private $name_category;

    private $db;

    // Conectar a la base de datos
    public function __construct(){
        $this->db = Database::connect();
    }

    // Getters y Setters
    public function getName_category()
    {
        return $this->name_category;
    }

    public function setName_category($name_category)
    {
        $this->name_category = $this->db->real_escape_string($name_category);

        return $this;
    }

    public function getAll(){
        $categories = $this->db->query("SELECT * FROM category ORDER BY id_category DESC");

        return $categories;
    }

    public function save(){
        $name = $this->getName_category();

        $sql = "INSERT INTO category VALUES(
            NULL, 
            '$name'
        )";

        $save = $this->db->query($sql);

        $result = false;

        if($save){
            $result = true;
        }

        return $result;
    }


}