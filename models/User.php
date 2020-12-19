<?php

class User{
    private $id_user;
    private $name_user;
    private $last_name_user;
    private $email_user;
    private $password_user;
    private $image_user;

    private $db;

    // Conectar a la base de datos
    public function __construct(){
        $this->db = Database::connect();
    }

    // Getters y Setters
    public function getId_user()
    {
        return $this->id_user;
    }

    public function setId_user($id_user)
    {
        $this->id_user = $this->db->real_escape_string($id_user);

        return $this;
    }

    public function getName_user()
    {
        return $this->name_user;
    }

    public function setName_user($name_user)
    {
        $this->name_user = $this->db->real_escape_string($name_user);

        return $this;
    }

    public function getLast_name_user()
    {
        return $this->last_name_user;
    }

    public function setLast_name_user($last_name_user)
    {
        $this->last_name_user = $this->db->real_escape_string($last_name_user);

        return $this;
    }

    public function getEmail_user()
    {
        return $this->email_user;
    }

    public function setEmail_user($email_user)
    {
        $this->email_user = $this->db->real_escape_string($email_user);

        return $this;
    }

    public function getPassword_user()
    {
        return $this->db->real_escape_string($this->password_user);
    }

    public function setPassword_user($password_user)
    {
        $this->password_user = password_hash($password_user, PASSWORD_BCRYPT, ['cost' => 4]
        );

        return $this;
    }
    
    public function getImage_user()
    {
        return $this->image_user;
    }

    public function setImage_user($image_user)
    {
        $this->image_user = $this->db->real_escape_string($image_user);

        return $this;
    }

    // Métodos
    public function save(){
        $name = $this->getName_user();
        $last_name = $this->getLast_name_user();
        $email = $this->getEmail_user();
        $password = $this->getPassword_user();

        $sql = "INSERT INTO user VALUES(
            NULL, 
            '$name',
            '$last_name',
            '$email',
            '$password',
            'user',
            NULL
        )";

        $save = $this->db->query($sql);

        $result = false;

        if($save){
            $result = true;
        }

        return $result;
    }
}