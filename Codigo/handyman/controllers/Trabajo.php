<?php 
    class Trabajocontroller{
        public function __construct(){
            require_once "models/Usuario.php";
            require_once "models/Cliente.php";
            require_once "models/Domicilio.php";
            require_once "models/Producto.php";
            require_once "models/Parte.php";
            require_once "models/Trabajo.php";
            require_once "models/Tecnico.php";
        }

        public function partes($id){
            require_once "views/trabajo/partes.php";
        }

        public function insertar($id){
            /* Recojo datos */
            $idusuario = $_SESSION['idusuario'];
            $fecha_inicio = date('Y-m-d');
            $idparte = $id;

            $tecnico = new Tecnico_model();
            $parte = new Parte_model();
            $data['tecnico'] = $tecnico->get_tecnico($idusuario);
            $data['parte'] = $parte->get_parte($idparte);

            /* Inserto datos */
            $trabajo = new Trabajo_model();
            $trabajo->insertarTrabajo($fecha_inicio, $data['tecnico']['idtecnico'], $idparte);
            if($trabajo->get_trabajo_parte($idparte)){
                $parte->modificar_parte_estado($idparte, 'OCUPADO');
            }

            header('Location: index.php?c=Tecnico&a=mostrarTrabajos&id='.$idusuario);
        }

        public function mostrarTrabajo($id){
            $parte = new Parte_model();
            $trabajo = new Trabajo_model();
            $producto = new Producto_model();
            $domicilio = new Domicilio_model();
            $cliente = new Cliente_model();
            $usuario = new Usuario_model();
            $data["trabajo"] = $trabajo->get_trabajo($id);
            $data["parte"] = $parte->get_parte($data["trabajo"]["idparte"]);
            $data["producto"] = $producto->get_producto($data['parte']['idproducto']);
            $data["domicilio"] = $domicilio->get_domicilio($data['producto']['iddomicilio']);
            $data["cliente"] = $cliente->get_cliente_id($data["parte"]['idcliente']);
            $data["usuario"] = $usuario->get_usuario($data["cliente"]['idusuario']);
            if($trabajo->get_trabajo($id)){
                require_once "views/trabajo/detalle.php";
            }
            else{
                header('Location: index.php?c=Usuario&a=mostrar');
                /* $this->mostrar(); */
            }
        }

        public function terminarTrabajo($id){
            /* Recojo datos */
            $observaciones = $_POST['observaciones'];
            $fecha_terminado = date('Y-m-d');
            $trabajo = new Trabajo_model();
            $data['trabajo'] = $trabajo->get_trabajo($id);
            $idparte = $data['trabajo']['idparte'];
            $tecnico = new Tecnico_model();
            $parte = new Parte_model();
            $data['parte'] = $parte->get_parte($idparte);

            /* Inserto datos */
            $trabajo->modificarTrabajo($id, $fecha_terminado, $observaciones);
            if($trabajo->get_trabajo_parte($idparte)){
                $parte->modificar_parte_estado($idparte, 'TERMINADO');
            }

            header('Location: index.php?c=Tecnico&a=mostrarTrabajos&id='.$_SESSION['idusuario']);
        }

        public function eliminar($id){
            $trabajo = new Trabajo_model();
            $data['trabajo'] = $trabajo->get_trabajo($id);
            $parte = new Parte_model();
            $data['parte'] = $parte->get_parte($data['trabajo']['idparte']);
            if($data['parte']['estado']=='OCUPADO'){
                $trabajo->eliminarTrabajo($id);
                $parte->modificar_parte_estado($data['parte']['idparte'], 'LIBRE');
                header('Location: index.php?c=Tecnico&a=mostrarTrabajos&id='.$_SESSION['idusuario']);
            }
            else{
                header('Location: index.php?c=Tecnico&a=mostrarTrabajos&id='.$_SESSION['idusuario']);
            }
        }
    }