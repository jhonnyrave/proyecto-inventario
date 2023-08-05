<?php

class Database
{
    private $pdo;

    // Configuración de la base de datos
    private $host = 'localhost'; // Cambiar si tu base de datos está en un servidor remoto
    private $db_name = 'cafeteria';
    private $username = 'root';
    private $password = '';
    private $charset = 'utf8mb4'; // Cambiar según la codificación que uses

    public function __construct()
    {
        $dsn = "mysql:host=$this->host;dbname=$this->db_name;charset=$this->charset";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $this->pdo = new PDO($dsn, $this->username, $this->password, $options);
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }

    public function getConnection()
    {
        return $this->pdo;
    }

    // Método para ejecutar una consulta SQL con parámetros y obtener una sola fila de resultados
    public function fetchSingleRow($sql, $params = [])
    {
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetch(); // Usar fetch() para obtener una sola fila de resultados
        } catch (PDOException $e) {
            die("Error al ejecutar la consulta: " . $e->getMessage());
        }
    }

    // Método para ejecutar una consulta SQL con parámetros y obtener múltiples filas de resultados
    public function fetchAllRows($sql, $params = [])
    {
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchAll(); // Usar fetchAll() para obtener múltiples filas de resultados
        } catch (PDOException $e) {
            die("Error al ejecutar la consulta: " . $e->getMessage());
        }
    }

    // Otros métodos útiles para transacciones, etc. se pueden agregar según sea necesario.
}