<?php

class Database 
{
    public static function conectar(){
        $db = new mysqli('localhost', 'root','','inventario');
        $db->query("SET NAMES 'utf8'");
        return $db;
    }
}