<?php
    class Conectar{
        public static function conexion(){
            $conexion = new mysqli("localhost", "debianDB", "debianDB", "handyman");
            return $conexion;
        }
    }
?>