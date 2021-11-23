<?php
class Parte_model{
    private $db;
    public function __construct(){
        $this->db = Conectar::conexion();
    }

    public function get_all_partes(){
        $sql = "SELECT * FROM parte";
        $resultado = $this->db->query($sql);

        return $resultado;
    }

    public function insertarParte($idproducto, $idcliente, $asunto, $descripcion, $fecha_parte){
        $resultado = $this->db->query("INSERT INTO parte (idproducto, idcliente, asunto, descripcion, fecha_parte, estado)
        VALUES ('$idproducto', '$idcliente', '$asunto', '$descripcion', '$fecha_parte', 'LIBRE')");
        
        return $resultado;
    }

    public function get_parte($id){
        $sql = "SELECT * FROM parte WHERE idparte='$id'";
        $resultado = $this->db->query($sql);
        $row = $resultado->fetch_assoc();

        return $row;
    }

    public function get_parte_producto($idproducto){
        $sql = "SELECT * FROM parte WHERE idproducto='$idproducto'";
        $resultado = $this->db->query($sql);

        return $resultado;
    }

    public function get_partes($idcliente){
        $sql = "SELECT * FROM parte WHERE idcliente='$idcliente'";
        $resultado = $this->db->query($sql);

        return $resultado;
    }

    
    public function eliminarParte($id){
        $resultado = $this->db->query("DELETE FROM parte WHERE idparte='$id'");
    }

    public function modificar_parte_estado($id, $estado){
        $resultado = $this->db->query("UPDATE parte SET estado='$estado' WHERE idparte='$id'");
    }

}