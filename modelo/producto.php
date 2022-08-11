<?php

class Producto
{
    public $nombre;
    public $referencia;
    public $precio;
    public $peso;
    public $categoria;
    public $stock;
    public $fecha;
    private $db;

    public function __construct(){
        $this->db = Database::conectar();
    }

    public function guardar(){
        $sql = "INSERT INTO productos VALUES ('','$this->nombre','$this->referencia',
        $this->precio,$this->peso,'$this->categoria',$this->stock,'$this->fecha')";
        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }

    public function listar(){
        $sql = "SELECT * FROM productos order by id";
        $productos = $this->db->query($sql);
        return $productos;
    }
}