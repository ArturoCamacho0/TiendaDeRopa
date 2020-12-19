<?php
session_start();

require_once 'autoload.php';
require_once 'config/db.php';
require_once 'config/Parameters.php';
require_once 'helpers/Utils.php';

require_once './views/layout/header.php';
require_once './views/layout/sidebar.php';

function show_error(){
    $error = new ErrorController();
    $error->index();
}

if(isset($_GET['controller'])){
    $controller_get = $_GET['controller'];
    $controller_name = $controller_get.'Controller';
}elseif(!isset($_GET['controller'])){
    $controller_name = controller_default;
}else{
    show_error();
    exit();
}

if(class_exists($controller_name)){
    $controller = new $controller_name();

    if(isset($_GET['controller']) && method_exists($controller, $_GET['action'])){
        $action = $_GET['action'];
        $controller->$action();
    }elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
        $action_default = action_default;
        $controller->$action_default();
    }else{
        show_error();
    }
}else{
    show_error();
}

require_once './views/layout/footer.php';

?>