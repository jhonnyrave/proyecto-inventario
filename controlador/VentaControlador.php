<?php
require_once "modelo/producto.php";
require_once "modelo/venta.php";

class ventaControlador
{
    public function index(){
        $venta = new Venta();
        $ventas = $venta->listar();
        require_once 'vistas/venta/gestion.php';
    }

    public function guardarVenta(){
        $post = (isset($_POST['id_producto']) && !empty($_POST['cantidad']));
        if($post){
            $id = $_POST['id_producto'];
            //consultar el stock del producto a vender
            $producto_venta = new Producto();
            $productos_venta = $producto_venta->listar_id($id);
            $productos_obj = $productos_venta->fetch_object();
            $stock_producto = intval($productos_obj->stock);
            $precio_producto = intval($productos_obj->precio);
            $categoria_producto = $productos_obj->categoria;
            $cantidad_venta = intval($_POST['cantidad']);
      
            if($cantidad_venta>$stock_producto){   
                echo "<script type=\"text/javascript\">window.alert('La cantidad no puede superar el stock del producto');window.location.href = 'index';</script>"; 
                exit;
            }

            $venta = new Venta();
            $venta->id_producto = $id;
            $venta->precio = $precio_producto;
            $venta->cantidad = $cantidad_venta;
            $venta->categoria = $categoria_producto;
            
            $result = $venta->guardarVenta();
            if($result){
                $nuevo_stock = $stock_producto - $cantidad_venta;
                $result = $venta->actualizarStock($id, $nuevo_stock);
                echo "<script type=\"text/javascript\">window.alert('Venta guardada correctamente');window.location.href = 'index';</script>"; 
            }else{
                echo "<script type=\"text/javascript\">window.alert('Ocurrió un error');window.location.href = 'index';</script>"; 
            }
            header("Location:" .base_url.'venta/index');
        }else {
        header("Location:" .base_url.'venta/index');
        echo "registros vacios";
        }
    }
}