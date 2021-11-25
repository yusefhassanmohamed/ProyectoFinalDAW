<?php
    class Conectar{
        
        public static function conexion(){
            $conexion = new mysqli("192.168.0.16", "debianDB", "debianDB", "handyman", 3306);
            return $conexion;
        }
    }
?>