<?php 
require_once 'models/Order.php';

class OrderController{
    public function index(){
        require_once 'views/order/index.php';
    }

    public function add(){
        if(isset($_SESSION['identity'])){
            // Guardar los datos
            $stats = Utils::stats_cart();

            $province = isset($_POST['province']) ? $_POST['province'] : false;
            $locality = isset($_POST['location']) ? $_POST['location'] : false;
            $direction = isset($_POST['direction']) ? $_POST['direction'] : false;
            $cost = $stats['total'];
            $user = $_SESSION['identity']->id_user;

            if($province && $locality && $direction && $cost && $user){
                $order = new Order();
            
                $order->setProvince($province);
                $order->setLocality($locality);
                $order->setDirection($direction);
                $order->setCost($cost);
                $order->setUser_id($user);

                $order_save = $order->save();
                $line_save = $order->save_line();

                if($order_save && $line_save){
                    $_SESSION['order'] = "complete";
                    unset($_SESSION["cart"]);
                    header("Location: ".base_url."order/confirm");
                }else{
                    $_SESSION['order'] = "failed";
                    header("Location: ".base_url."cart/index");
                }
            }else{
                $_SESSION['order'] = "failed";
                header("Location: ".base_url."cart/index");
            }
            
        }else{
            header('Location: '.base_url);
        }
    }

    public function confirm(){
        if(isset($_SESSION['order']) && $_SESSION['order'] == "complete"){
            if($_SESSION['identity']){
                $order = new Order();
                $user = $_SESSION['identity'];
                $order->setUser_id($user->id_user);

                $order_user = $order->getOneByUser();
                $order_products = $order->getProductsByOrder($order_user->id_order);
            }

            require_once 'views/order/confirm.php';
        }else{
            header("Location: ".base_url."cart/index");
        }
    }

    public function my_orders(){
        Utils::isLogged();

        if($_SESSION['identity']){
            $user_id = $_SESSION['identity']->id_user;
            $order = new Order;
            $order->setUser_id($user_id);
            $orders = $order->getAllByUser();
        }
        require_once 'views/order/my_orders.php';
    }

    public function detail(){
        Utils::isLogged();

        if(isset($_GET['id'])){
            $id = $_GET['id'];

            $order = new Order();
            $order->setId($id);
            $order_list = $order->getOne()->fetch_object();

            $order_products = new Order();
            $products = $order_products->getProductsByOrder($id);
        }else{
            header('Location: '.base_url.'order/my_orders');
        }

        require_once 'views/order/detail.php';
    }

    public function manage(){
        Utils::isAdmin();
        $manage = true;
        $order = new Order;
        $orders = $order->getAll();

        require_once 'views/order/my_orders.php';
    }

    public function status(){
        Utils::isAdmin();

        if(isset($_POST['order_id']) && isset($_POST['status'])){
            $id = $_POST['order_id'];
            $status = $_POST['status'];

            $order =  new Order();
            $order->setId($id);
            $order->setStatus($status);
            $order->updateOne();

            header('Location: '.base_url.'order/detail&id='.$_POST['order_id']);
        }else{
            header('Location: '.base_url);
        }
    }
}

?>