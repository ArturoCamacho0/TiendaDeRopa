<?php 

require 'models/User.php';

class UserController{
    public function index(){
        echo "Controlador usuarios, accion index";
    }

    public function register(){
        require_once 'views/user/register.php';
    }

    public function save(){
        if(isset($_POST)){
            $user = new User();

            $name = isset($_POST['name']) ? $_POST['name'] : false;
            $last_name = isset($_POST['last_name']) ? $_POST['last_name'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;

            if($name && $last_name && $email && $password){
                $user->setName_user($name);
                $user->setLast_name_user($last_name);
                $user->setEmail_user($email);
                $user->setPassword_user($password);

                $save = $user->save();

                if($save){
                    $_SESSION['register'] = "complete";
                }else{
                    $_SESSION['register'] = "failed";
                }
                
            }else{
                $_SESSION['register'] = "failed";
            }
            header("Location: ".base_url."user/register");
        }else{
            $_SESSION['register'] = "failed";
            header("Location: ".base_url."user/register");
        }
    }
}

?>