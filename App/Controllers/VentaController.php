<?php
require_once 'App/Models/VentaModel.php';

class VentaController
{
    private $ventaModel;

    public function __construct()
    {
        $this->ventaModel = new VentaModel();
    }

    public function index()
    {
        $productos = $this->ventaModel->listar();
        require_once 'App/Views/Venta/gestion.php';
    }

    public function registro()
    {
        require_once 'App/Views/Product/registro.php';
    }

    public function guardar()
    {
        // Verifica si se envió el formulario con datos válidos
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Recupera los datos enviados desde el formulario
            $id = $_POST['id_producto'];
            //consultar el stock del producto a vender
            $productos_venta = $this->ventaModel->listar_id($id);

            $stock_producto = intval($productos_venta['stock']);
            $precio_producto = intval($productos_venta['precio']);
            $categoria_producto = $productos_venta['categoria'];
            $cantidad_venta = intval($_POST['cantidad']);
            $fechaActual = date("Y-m-d");
      
            if($cantidad_venta>$stock_producto){   
                echo "<script type=\"text/javascript\">window.alert('La cantidad no puede superar el stock del producto');window.location.href = 'index';</script>"; 
                exit;
            }


            // Crea un array con los datos de la venta
            $producto = (object)[
                'id_producto' => $id,
                'cantidad' => $cantidad_venta,
                'categoria' => $categoria_producto,
                'precio' => $precio_producto,
                'fecha'=> $fechaActual,
            ];

            // Llama al método guardar del modelo para guardar el producto en la base de datos
            $guardado = $this->ventaModel->guardar($producto);

            // Verifica si el producto se guardó correctamente
            if ($guardado) {
                // Descontar el stock del inventario
                $nuevo_stock = intval($stock_producto - $cantidad_venta);
                
                $guardado_stock = $this->ventaModel->actualizarStock($id, $nuevo_stock);
                if($guardado_stock){
                    echo "<script type=\"text/javascript\">window.alert('Venta guardada correctamente');window.location.href = 'index';</script>"; 
                }else{
                    $respuesta = 'Ha ocurrido un error al actualizar el stock.';
                }
            } else {
                // Si hubo un error, muestra un mensaje de error en la vista de registro
                $respuesta = 'Ha ocurrido un error al guardar el producto.';
            }
        }

        // Si no se envió el formulario o hubo un error en el guardado, muestra la vista de registro con la variable $respuesta
        require_once 'App/Views/venta/gestion.php';
    }

    public function eliminar()
    {
        if(isset($_GET['id'])) {
            $id=$_GET['id'];
            $eliminar = $this->ventaModel->eliminar($id);
             // Verifica si el producto se guardó correctamente
             if ($eliminar) {
                // Redirecciona a la página de gestión de productos con un mensaje de éxito
                header('Location: ' . base_url . 'Product/index?mensaje=Producto eliminado exitosamente.');
                exit;
            } else {
                // Si hubo un error, muestra un mensaje de error en la vista de registro
                $respuesta = 'Ha ocurrido un error al elimnar el producto.';
            }
        }else{
            $respuesta = 'Ha ocurrido un error al elimnar el producto.';
        }
        require_once 'App/Views/Product/registro.php';
    }

   
    public function actualizar()
    {
        $id = "";
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        // Verifica si se envió el formulario de actualización
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Recupera los datos enviados desde el formulario
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $referencia = $_POST['referencia'];
            $categoria = $_POST['categoria'];
            $precio = (float)$_POST['precio'];
            $peso = (float)$_POST['peso'];
            $stock = (int)$_POST['stock'];
            $fecha = $_POST['fecha'];

            // Crea un objeto con los datos del producto actualizado
            $producto = (object) [
                'id' => $id,
                'nombre' => $nombre,
                'referencia' => $referencia,
                'categoria' => $categoria,
                'precio' => $precio,
                'peso' => $peso,
                'stock' => $stock,
                'fecha' => $fecha
            ];

            // Llama al método actualizar del modelo para actualizar el producto en la base de datos
            $actualizado = $this->ventaModel->actualizar($producto);

            // Verifica si el producto se actualizó correctamente
            if ($actualizado) {
                // Redirecciona a la página de gestión de productos con un mensaje de éxito
                header('Location: ' . base_url . 'Product/index?mensaje=Producto actualizado exitosamente.');
                exit;
            } else {
                // Si hubo un error, muestra un mensaje de error en la vista de registro
                $respuesta = 'Ha ocurrido un error al actualizar el producto.';
            }
        }

        // Obtiene los datos del producto por su ID
        $producto = $this->ventaModel->listar_id($id);

        // Verifica si se encontró el producto
        if (!$producto) {
            // Si no se encontró el producto, redirecciona a la página de gestión con un mensaje de error
            //header('Location: ' . base_url . 'Product/index?mensaje=Producto no encontrado.');
            //exit;
        }
        $pro= (object) $producto;
        // Muestra el formulario de actualización en la vista
        $actual = true;
        require_once 'App/Views/Product/registro.php';
    }

}