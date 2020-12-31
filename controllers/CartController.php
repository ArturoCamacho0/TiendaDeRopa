<?php 

require_once 'models/Product.php';

class CartController{
    public function index(){
        if(isset($_SESSION["cart"])){
            $cart = $_SESSION["cart"];
            require_once 'views/cart/index.php';
        }else{
            echo "No hay productos agregados al carrito";
        }
    }

    public function add(){
        $counter = 0;

        if(isset($_GET["id"])){
            $id_product = $_GET["id"];

            if(isset($_SESSION["cart"])){
                foreach($_SESSION["cart"] as $index => $element){
                    if($element['id'] == $id_product){
                        $_SESSION["cart"][$index]["units"]++;
                        $counter++;
                    }
                }
            }
            
            if($counter == 0 || !isset($counter) && !isset($_SESSION["cart"])){
                $product = new Product();
                $product->setId($id_product);
                $product = $product->getOne();
                
                if(is_object($product)){
                    $_SESSION["cart"][] = array(
                        "id" => $product->id_product,
                        "price" => $product->price_product,
                        "units" => 1,
                        "product" => $product
                    );
                }
            }
            header("Location: ".base_url."cart/index");
        }else{
            header("Location: ".base_url);
        }
    }

    public function remove(){
        if(isset($_GET["index"])){
            $index = $_GET["index"];
            unset($_SESSION["cart"][$index]);
        }

        header("Location: ".base_url."cart/index");
    }

    public function delete_all(){
        unset($_SESSION["cart"]);
        header("Location: ".base_url."cart/index");
    }

    public function up(){
        if(isset($_GET["index"])){
            $index = $_GET["index"];
            $_SESSION["cart"][$index]['units']++;
        }

        if($_SESSION["cart"][$index]['units'] <= 0){
            unset($_SESSION["cart"][$index]);
        }

        header("Location: ".base_url."cart/index");
    }

    public function down(){
        if(isset($_GET["index"])){
            $index = $_GET["index"];
            $_SESSION["cart"][$index]['units']--;
        }

        if($_SESSION["cart"][$index]['units'] <= 0){
            unset($_SESSION["cart"][$index]);
        }

        header("Location: ".base_url."cart/index");
    }
}

?>