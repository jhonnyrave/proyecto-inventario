<?php
require_once 'Config/Database.php';

class ProductModel
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
            $query = "SELECT * FROM productos";
            $stmt = $this->db->query($query);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Error al obtener la lista de productos: ' . $e->getMessage();
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
            $query = "INSERT INTO productos (nombre_producto, referencia, precio, peso, categoria, stock, fecha_creacion) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->db->prepare($query);
            $stmt->execute([$producto->nombre, $producto->referencia, $producto->precio, $producto->peso, $producto->categoria, $producto->stock, $producto->fecha]);
            return true;
        } catch (PDOException $e) {
            echo 'Error al guardar el producto: ' . $e->getMessage();
            return false;
        }
    }

    public function eliminar($id)
    {
        try {
            // Realiza una consulta para eliminar un producto por su ID
            $query = "DELETE FROM productos WHERE id = ?";
            $stmt = $this->db->prepare($query);
            $stmt->execute([$id]);
            return true;
        } catch (PDOException $e) {
            echo 'Error al eliminar el producto: ' . $e->getMessage();
            return false;
        }
    }

    public function actualizar($producto)
    {
        try {
            // Realiza una consulta para actualizar el producto en la base de datos
            $query = "UPDATE productos SET nombre_producto = ?, referencia = ?, precio = ?, peso = ?, categoria = ?, stock = ?, fecha_creacion = ? WHERE id = ?";
            $stmt = $this->db->prepare($query);
            $stmt->execute([$producto->nombre, $producto->referencia, $producto->precio, $producto->peso, $producto->categoria, $producto->stock, $producto->fecha, $producto->id]);
            return true;
        } catch (PDOException $e) {
            echo 'Error al actualizar el producto: ' . $e->getMessage();
            return false;
        }
    }

    // Resto de métodos para actualizar, obtener un producto por ID, etc.
    // ...
}