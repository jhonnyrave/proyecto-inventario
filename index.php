<?php
require_once 'autoload.php';
require_once 'config/parametros.php';
require_once 'vistas/plantilla/sidebar.php';
require_once 'config/db.php';

if(isset($_GET['controlador'])){
    $nombre_controlador = $_GET['controlador'].'Controlador';
}else if(!isset($_GET['controlador']) && !isset($_GET['action']) ){
    $nombre_controlador = controller_default;
}else{
    $error = new errorControlador();
    $error->index();
    exit();
}

if(class_exists($nombre_controlador)){
    $controlador = new $nombre_controlador();

    if(isset($_GET['action']) && method_exists($controlador, $_GET['action'])){
        $action = $_GET['action'];
        $controlador->$action();
    }else if(!isset($_GET['controlador']) && !isset($_GET['action']) ){
        $action = action_default;
        $controlador->$action();
    }else{
        $error = new errorControlador();
        $error->index();
    }
}else{
    $error = new errorControlador();
    $error->index();
}

require_once 'vistas/plantilla/footer.php';