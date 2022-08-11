<?php
require_once "modelo/producto.php";

class productosControlador
{
    public function index(){
        echo "controlador de productps";
    }

    public function registro(){
        require_once 'vistas/producto/registro.php';  
    }

    public function guardar(){
       if(isset($_POST)){
        $producto = new Producto();
        $producto->nombre = trim($_POST['nombre']);
        $producto->referencia = trim($_POST['referencia']);
        $producto->precio = intval($_POST['precio']);
        $producto->peso = $_POST['peso'];
        $producto->categoria = $_POST['categoria'];
        $producto->stock = $_POST['stock'];
        $producto->fecha = $_POST['fecha'];
        
        $result = $producto->guardar();
        if($result){
            $_SESSION['register'] = "completado";
            echo "registro completado";
        }else{
            $_SESSION['register'] = "fallido";
        }
        header("Location:" .base_url.'productos/registro');
       }
    }

    public function listar(){
        $producto = new Producto();
        $productos = $producto->listar();
        require_once 'vistas/producto/gestion.php';
    }
}