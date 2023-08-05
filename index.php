<?php
require_once 'Config/parametros.php';
require_once 'autoload.php';
require_once 'App/Views/plantilla/sidebar.php';
require_once 'Config/Database.php';

if (isset($_GET['controller'])) {
    $controllerName = ucwords($_GET['controller']).'Controller';
}else{
    $controllerName = 'ProductController';
}

if (isset($_GET['action'])) {
    $action = $_GET['action'];
}else{
    $action = 'index';
}

// Crear instancia del controlador y ejecutar la acción
$controlador = new $controllerName();

if(class_exists($controllerName)){

    if(isset($_GET['action']) && method_exists($controlador, $_GET['action'])){
        $action = $_GET['action'];
        $controlador->$action();
    }else if(!isset($_GET['controlador']) && !isset($_GET['action']) ){
        $action = action_default;
        $controlador->$action();
    }else{
        $controlador->index();
    }
}else{
    $error = new ErrorController();
    $error->$action();
}

require_once 'App/Views/plantilla/footer.php';