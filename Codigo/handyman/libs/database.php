<?php
    class Conectar{
        public static function conexion(){
            $conexion = new mysqli("127.0.0.1", "debianDB", "debianDB", "handyman", 3306);
            return $conexion;
        }
    }
?>
