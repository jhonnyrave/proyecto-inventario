<?php
require_once 'App/Models/ProductModel.php';

class ProductController
{
    private $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function index()
    {
        $productos = $this->productModel->listar();
        require_once 'App/Views/Product/gestion.php';
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
            $nombre = $_POST['nombre'];
            $referencia = $_POST['referencia'];
            $categoria = $_POST['categoria'];
            $precio = (float)$_POST['precio'];
            $peso = (float)$_POST['peso'];
            $stock = (int)$_POST['stock'];
            $fecha = $_POST['fecha'];

            // Crea un array con los datos del producto
            $producto = (object)[
                'nombre' => $nombre,
                'referencia' => $referencia,
                'categoria' => $categoria,
                'precio' => $precio,
                'peso' => $peso,
                'stock' => $stock,
                'fecha' => $fecha
            ];

            // Llama al método guardar del modelo para guardar el producto en la base de datos
            $guardado = $this->productModel->guardar($producto);

            // Verifica si el producto se guardó correctamente
            if ($guardado) {
                // Redirecciona a la página de gestión de productos con un mensaje de éxito
                header('Location: ' . base_url . 'Product/index?mensaje=Producto guardado exitosamente.');
                exit;
            } else {
                // Si hubo un error, muestra un mensaje de error en la vista de registro
                $respuesta = 'Ha ocurrido un error al guardar el producto.';
            }
        }

        // Si no se envió el formulario o hubo un error en el guardado, muestra la vista de registro con la variable $respuesta
        require_once 'App/Views/Product/registro.php';
    }

    public function eliminar()
    {
        if(isset($_GET['id'])) {
            $id=$_GET['id'];
            $eliminar = $this->productModel->eliminar($id);
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
            $actualizado = $this->productModel->actualizar($producto);

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
        $producto = $this->productModel->listar_id($id);

        // Verifica si se encontró el producto
        if (!$producto) {
            // Si no se encontró el producto, redirecciona a la página de gestión con un mensaje de error
            header('Location: ' . base_url . 'Product/index?mensaje=Producto no encontrado.');
            exit;
        }
        $pro= (object) $producto;
        // Muestra el formulario de actualización en la vista
        $actual = true;
        require_once 'App/Views/Product/registro.php';
    }

}