<?php
    class Conectar{
        
        public static function conexion(){
            $conexion = new mysqli("192.168.0.113", "root", "root", "handyman", 3306);
            return $conexion;
        }
    }
?>