<?php

require_once './autoload.php';
$error_message = "<h1>La página que buscas no existe</h1>";

require_once './views/layout/header.php';
require_once './views/layout/sidebar.php';

$controller_get = $_GET['controller'];
$action_get = $_GET['action'];

if($controller_get != null){
    $controller_name = $controller_get.'Controller';
}else{
    echo $error_message;
    exit();
}

if(class_exists($controller_name)){
    $controller = new $controller_name();

    if($controller_get != null && method_exists($controller, $action_get)){
        $action = $action_get;
        $controller->$action();
    }else{
        echo $error_message;
    }
}else{
    echo $error_message;
}

require_once './views/layout/footer.php';

?>