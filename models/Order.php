<?php

class Order{
    private $id;
    private $province;
    private $locality;
    private $direction;
    private $cost;
    private $status;
    private $date;
    private $hour;
    private $user_id;

    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    // Getters and setters
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $this->db->real_escape_string($id);

        return $this;
    }

    public function getProvince()
    {
        return $this->province;
    }


    public function setProvince($province)
    {
        $this->province = $this->db->real_escape_string($province);

        return $this;
    }

    public function getLocality()
    {
        return $this->locality;
    }

    public function setLocality($locality)
    {
        $this->locality = $this->db->real_escape_string($locality);

        return $this;
    }

    public function getDirection()
    {
        return $this->direction;
    }

    public function setDirection($direction)
    {
        $this->direction = $this->db->real_escape_string($direction);

        return $this;
    }

    public function getCost()
    {
        return $this->cost;
    }

    public function setCost($cost)
    {
        $this->cost = $this->db->real_escape_string($cost);

        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $this->db->real_escape_string($status);

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

    public function getHour()
    {
        return $this->hour;
    }

    public function setHour($hour)
    {
        $this->hour = $this->db->real_escape_string($hour);

        return $this;
    }

    public function getUser_id()
    {
        return $this->user_id;
    }

    public function setUser_id($user_id)
    {
        $this->user_id = $this->db->real_escape_string($user_id);

        return $this;
    }

    public function getAll(){
        $orders = $this->db->query("SELECT * FROM orders ORDER BY id_order DESC");

        return $orders;
    }

    public function getOne(){
        $id = $this->getId();

        $sql = "SELECT * FROM orders WHERE id_order = $id";

        $result = $this->db->query($sql);
        
        return $result;
    }

    public function getOneByUser(){
        $id_user = $this->getUser_id();

        $sql = "SELECT id_order, cost_order
            FROM orders
            WHERE user_id = $id_user
            ORDER BY id_order LIMIT 1;";

        $order = $this->db->query($sql);

        return $order->fetch_object();
    }

    public function getAllByUser(){
        $id_user = $this->getUser_id();
        $orders = $this->db->query("SELECT *
            FROM orders WHERE user_id = $id_user
            ORDER BY id_order DESC");

        return $orders;
    }

    public function getProductsByOrder($id_order){
        $sql = "SELECT p.*, l.units FROM product AS p
            INNER JOIN lines_orders AS l ON l.product_id = p.id_product
            WHERE order_id = $id_order";

        $products = $this->db->query($sql);

        return $products;
    }

    public function save(){
        $province = $this->getProvince();
        $locality = $this->getLocality();
        $direction = $this->getDirection();
        $cost = $this->getCost();
        $user = $this->getUser_id();

        $sql = "INSERT INTO orders VALUES(
            NULL,
            '$province',
            '$locality',
            '$direction',
            $cost,
            'confirm',
            CURDATE(),
            CURTIME(),
            $user
        );";

        $save = $this->db->query($sql);
        
        $result = false;
        if ($save){
            $result = true;
        }

        return $result;
    }

    public function save_line(){
        $sql = "SELECT LAST_INSERT_ID() as 'order';";
        $query = $this->db->query($sql);
        $order_id = $query->fetch_object()->order;

        foreach($_SESSION['cart'] as $index => $element){
            $product = $element['product'];

            $id_product = $product->id_product;
            $units = $element['units'];

            $insert = "INSERT INTO lines_orders VALUES (
                NULL,
                $order_id,
                $id_product,
                $units
            )";
            
            $save = $this->db->query($insert);
        }

        $result = false;
        if ($save){
            $result = true;
        }

        return $result;
    }

    public function updateOne(){
        $id = $this->getId();
        $status = $this->getStatus();
        $sql = "UPDATE orders SET status_order = '$status' WHERE id_order = $id";

        $this->db->query($sql);
    }
}