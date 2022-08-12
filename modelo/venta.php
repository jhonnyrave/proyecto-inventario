<?php

class Venta {

    public $id_producto;
    public $precio;
    public $cantidad;
    public $categoria;
    private $db;

    public function __construct(){
        $this->db=Database::conectar();
    }

    public function guardarVenta(){
        $sql="INSERT INTO venta(id_producto, cantidad, categoria, precio, fecha) 
        VALUES ('$this->id_producto', '$this->cantidad', '$this->categoria', '$this->precio', curdate())";
        $ejecuta_query=$this->db->query($sql);

        $resultado=false;
        if($ejecuta_query){
            $resultado=true;
        }
        return $resultado;
    }

    public function listar(){
        $sql="SELECT * FROM productos order by id";
        $ejecuta_query=$this->db->query($sql);
        return $ejecuta_query;
    }

    public function actualizarStock($id, $nuevo_stock){
        $sql="UPDATE productos SET stock='$nuevo_stock', 
        fecha_creacion=NOW() WHERE id='$id'";
        $ejecuta_query=$this->db->query($sql);
        return $ejecuta_query;

        $resultado=false;
        if($ejecuta_query){
            $resultado=true;
        }
        return $resultado;
    }

}