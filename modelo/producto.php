<?php

class Producto
{
    public $id;
    public $nombre;
    public $referencia;
    public $precio;
    public $peso;
    public $categoria;
    public $stock;
    public $fecha;
    private $db;

    public function __construct(){
        $this->db=Database::conectar();
    }

    public function guardar(){
        $sql="INSERT INTO productos VALUES ('','$this->nombre','$this->referencia',
        $this->precio,$this->peso,'$this->categoria',$this->stock,'$this->fecha')";
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

    public function listar_id($id){
        $sql="SELECT * FROM productos WHERE id='$id'";
        $ejecuta_query=$this->db->query($sql);
        return $ejecuta_query;
    }

    public function eliminar($id){
        $sql="DELETE FROM productos WHERE id='$id'";
        $ejecuta_query=$this->db->query($sql);
        return $ejecuta_query;

        $resultado=false;
        if($ejecuta_query){
            $resultado=true;
        }
        return $resultado;
    }

    public function actualizar(){
        $sql="UPDATE productos SET nombre='$this->nombre', referencia='$this->referencia',
        precio=$this->precio, peso=$this->peso, categoria='$this->categoria', 
        stock=$this->stock, fecha_creacion='$this->fecha' WHERE id='$this->id'";
        $ejecuta_query=$this->db->query($sql);
        return $ejecuta_query;

        $resultado=false;
        if($ejecuta_query){
            $resultado=true;
        }
        return $resultado;
    }
}