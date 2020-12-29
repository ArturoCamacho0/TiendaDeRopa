<?php 

require_once 'models/Product.php';

class CartController{
    public function index(){
        if(isset($_SESSION["cart"])){
            $cart = $_SESSION["cart"];
            require_once 'views/cart/index.php';
        }else{
            echo "No hay productos";
        }
    }

    public function add(){
        if(isset($_GET["id"])){
            $id_product = $_GET["id"];

            if(isset($_SESSION["cart"])){
                $counter = 0;
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
        // asda
    }

    public function delete_all(){
        unset($_SESSION["cart"]);
        header("Location: ".base_url."cart/index");
    }
}

?>