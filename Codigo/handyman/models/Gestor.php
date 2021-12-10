<?php
class Gestor_model extends Usuario_model{
    private $db;
    private $usuarios;
    public function __construct(){
        parent::__construct();
        $this->db = Conectar::conexion();
    }

    public function get_gestor($id){
        $sql = "SELECT * FROM gestor WHERE idusuario='$id' LIMIT 1";
        $resultado = $this->db->query($sql);
        $row = $resultado->fetch_assoc();

        return $row;
    }

    public function get_gestor_id($id){
        $sql = "SELECT * FROM gestor WHERE idgestor='$id' LIMIT 1";
        $resultado = $this->db->query($sql);
        $row = $resultado->fetch_assoc();

        return $row;
    }

    public function insertarGestor($numero_sucursal, $idusuario){
        $resultado = $this->db->query("INSERT INTO gestor (numero_sucursal, idusuario)
        VALUES ('$numero_sucursal', '$idusuario')");
    }

    public function eliminarGestor($id){
        $resultado = $this->db->query("DELETE FROM gestor WHERE idgestor='$id'");
    } 

}