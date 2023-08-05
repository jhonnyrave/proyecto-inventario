<?php
require_once 'Config/Database.php';

class VentaModel
{
    private $db;

    public function __construct()
    {
        // Instancia la clase Database y obtiene la conexión
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function listar()
    {
        try {
            // Realiza una consulta para obtener todos los productos
            $query = "SELECT * FROM productos where stock >0";
            $stmt = $this->db->query($query);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Error al obtener la lista de ventas: ' . $e->getMessage();
            exit;
        }
    }

    public function listarVenta()
    {
        try {
            // Realiza una consulta para obtener todas las ventas
            $query = "SELECT v.id, v.fecha, v.cantidad, p.nombre_producto, p.precio,p.stock
            FROM venta v
            JOIN productos p ON v.id_producto = p.id";
            $stmt = $this->db->query($query);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Error al obtener la lista de ventas: ' . $e->getMessage();
            exit;
        }
    }

    public function listar_id($id)
    {
        try {
            // Realiza una consulta para obtener el producto por su ID
            $query = "SELECT * FROM productos WHERE id = ?";
            $stmt = $this->db->prepare($query);
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Error al obtener el producto por su ID: ' . $e->getMessage();
            exit;
        }
    }

    public function guardar($producto)
    {
        try {
            // Realiza una consulta para insertar un nuevo producto en la base de datos
            $query = "INSERT INTO venta (id_producto, cantidad, categoria, precio, fecha) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->db->prepare($query);
            $stmt->execute([$producto->id_producto, $producto->cantidad, $producto->categoria, $producto->precio, $producto->fecha]);
            return true;
        } catch (PDOException $e) {
            echo 'Error al guardar la venta: ' . $e->getMessage();
            return false;
        }
    }


    public function actualizarStock($id, $nuevo_stock)
    {
        try {
            // Preparar la consulta SQL para actualizar el stock del producto con el nuevo valor
            $query = "UPDATE productos SET stock = ? WHERE id = ?";
            $stmt = $this->db->prepare($query);
    
            // Ejecutar la consulta con los valores de parámetros
            $stmt->execute([$nuevo_stock, $id]);
    
            // La actualización fue exitosa, retornar true
            return true;
        } catch (PDOException $e) {
            // En caso de error, mostrar el mensaje de error y retornar false
            echo 'Error al actualizar el producto: ' . $e->getMessage();
            return false;
        }
    }
    
}