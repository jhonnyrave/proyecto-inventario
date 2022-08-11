<?php
require_once "modelo/producto.php";

class productosControlador
{
    public function index(){
        $producto = new Producto();
        $productos = $producto->listar();
        require_once 'vistas/producto/gestion.php';
    }

    public function registro(){
        require_once 'vistas/producto/registro.php';  
    }

    public function guardar(){       
        $post = (isset($_POST['nombre']) && !empty($_POST['nombre'])) &&
        (isset($_POST['referencia']) && !empty($_POST['referencia'])) &&
        (isset($_POST['precio']) && !empty($_POST['precio'])) &&
        (isset($_POST['peso']) && !empty($_POST['peso']));

        if($post){
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
                $respuesta = "registro completado";
            }else{
                $respuesta = "Ha ocurrido un error2";
            }
            header("Location:" .base_url.'productos/index');
        }else {
        // Si en cambio, es false (falso), entonces volverá al formulario desde
        // donde se envió la petición:
        header("Location:" .base_url.'productos/registro');
        echo "registros vacios";
        }
    }

    public function eliminar(){
        if(isset($_GET['id'])) {
            $id=$_GET['id'];
            $producto = new Producto();
            $eliminar=$producto->eliminar($id);
            if($eliminar){
                $_SESSION['eliminar']="completado";
            }else{
                $_SESSION['eliminar']="error";
            }
        }else{
            $_SESSION['eliminar']="error";
        }
        header("Location:".base_url);
    }

    public function actualizar(){
        $id=$_GET['id'];
        $producto = new Producto();
        $productos = $producto->listar_id($id);
        $actual = true;
        require_once 'vistas/producto/registro.php'; 
    }
    
    public function modificar(){
        $id=$_GET['id'];
        $post = (isset($_POST['nombre']) && !empty($_POST['nombre'])) &&
        (isset($_POST['referencia']) && !empty($_POST['referencia'])) &&
        (isset($_POST['precio']) && !empty($_POST['precio'])) &&
        (isset($_POST['peso']) && !empty($_POST['peso']));

        if($post){
            $producto = new Producto();
            $producto->id = $id;
            $producto->nombre = trim($_POST['nombre']);
            $producto->referencia = trim($_POST['referencia']);
            $producto->precio = intval($_POST['precio']);
            $producto->peso = $_POST['peso'];
            $producto->categoria = $_POST['categoria'];
            $producto->stock = $_POST['stock'];
            $producto->fecha = $_POST['fecha'];

            $modificar = $producto->actualizar();
            if($modificar){
                $_SESSION['modificar']="completado";
            }else{
                $_SESSION['modificar']="error";
            }
        }
        header("Location:".base_url);
    }
}