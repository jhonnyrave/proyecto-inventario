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
        $productos = $this->ventaModel->listarVenta();
        require_once 'App/Views/Venta/registro.php';
       
    }

    public function registro()
    {
        $productos = $this->ventaModel->listar();
        require_once 'App/Views/Venta/registro.php';
    }

    public function gestion()
    {
        $productos = $this->ventaModel->listar();
        require_once 'App/Views/Venta/gestion.php';
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


}