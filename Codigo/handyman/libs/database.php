<?php
    class Conectar{
        
        public static function conexion(){
            $conexion = new mysqli("192.168.0.16", "root", "", "handyman");
            return $conexion;
        }
    }
?>