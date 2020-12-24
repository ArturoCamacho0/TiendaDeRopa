<?php
class Product{
    private $id;
    private $name;
    private $description;
    private $price;
    private $stock;
    private $off;
    private $date;
    private $image;
    private $category;

    private $db;

    // Conectar a la base de datos
    public function __construct(){
        $this->db = Database::connect();
    }

    // Getters y Setters
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $this->db->real_escape_string($id);

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $this->db->real_escape_string($name);

        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $this->db->real_escape_string($description);

        return $this;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $this->db->real_escape_string($price);

        return $this;
    }

    public function getStock()
    {
        return $this->stock;
    }

    public function setStock($stock)
    {
        $this->stock = $this->db->real_escape_string($stock);

        return $this;
    }

    public function getOff()
    {
        return $this->off;
    }

    public function setOff($off)
    {
        $this->off = $this->db->real_escape_string($off);

        return $this;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $this->db->real_escape_string($date);

        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $this->db->real_escape_string($image);

        return $this;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory($category)
    {
        $this->category = $this->db->real_escape_string($category);

        return $this;
    }


    public function getAll(){
        $products = $this->db->query("SELECT * FROM product ORDER BY id_product DESC");

        return $products;
    }

    public function getAllCategory(){
        $sql = "SELECT p.*, c.name_category
                FROM product AS p
                INNER JOIN category AS c ON c.id_category = p.category_id
                WHERE p.category_id = {$this->getId()}
                ORDER BY id_product DESC";

        $products = $this->db->query($sql);

        return $products;
    }

    public function getRandom($limit){
        $products = $this->db->query("SELECT * FROM product ORDER BY RAND() LIMIT $limit");

        return $products;
    }

    public function getOne(){
        $product = $this->db->query("SELECT * FROM product WHERE id_product =".$this->getId());

        return $product->fetch_object();
    }

    public function save(){
        $name = $this->getName();
        $description = $this->getDescription();
        $price = $this->getPrice();
        $stock = $this->getStock();
        $off = $this->getOff();
        $image = $this->getImage();
        $category = $this->getCategory();

        $sql = "INSERT INTO product VALUES(
            NULL, 
            '$name',
            '$description',
            $price,
            $stock,
            '$off',
            CURDATE(),
            '$image',
            $category
        )";
        $save = $this->db->query($sql);

        echo $image;

        $result = false;

        if($save){
            $result = true;
        }

        return $result;
    }

    public function edit(){
        $id = $this->getId();
        $name = $this->getName();
        $description = $this->getDescription();
        $price = $this->getPrice();
        $stock = $this->getStock();
        $off = $this->getOff();
        $image = $this->getImage();
        $category = $this->getCategory();

        $sql = "UPDATE `product`
            SET `name_product`='$name',
            `description_product`='$description',
            `price_product`=$price,
            `stock_product`=$stock,
            `off_product`= '$off',";

        if($image != null){
            $sql .= "`image_product` = '$image', ";
        }

        $sql .= "`category_id`= $category WHERE id_product = $id";

        $update = $this->db->query($sql);

        $result = false;

        if($update){
            $result = true;
        }

        return $result;
    }


    public function delete(){
        $sql = "DELETE FROM product WHERE id_product = $this->id";
        $delete = $this->db->query($sql);

        if($delete){
            return true;
        }else{
            return false;
        }
    }
}