<?php 
    class Domiciliocontroller{
        public function __construct(){
            require_once "models/Usuario.php";
            require_once "models/Cliente.php";
            require_once "models/Domicilio.php";
            require_once "models/Producto.php";
            require_once "models/Parte.php";
            require_once "models/Trabajo.php";
        }

        public function nuevoDomicilio($id){
            require_once "views/domicilio/nuevo.php";
        }

        public function insertar($id){
            /* Recojo datos */
            $calle = $_POST['calle'];
            $numero = $_POST['numero'];
            $piso = $_POST['piso'];
            $puerta = $_POST['puerta'];
            $idcliente = $id;

            $cliente = new Cliente_model();
            $data['cliente'] = $cliente->get_cliente_id($idcliente);

            /* Inserto datos */
            $domicilio = new Domicilio_model();
            $domicilio->insertarDomicilio($calle, $numero, $piso, $puerta, $idcliente);

            header('Location: index.php?c=Usuario&a=mostrarUsuario&id='.$data['cliente']['idusuario']);
        }

        public function modificarDomicilio($id){
            $domicilio = new Domicilio_model();
            $data["domicilio"] = $domicilio->get_domicilio($id);
            require_once "views/domicilio/modificar.php";
        }

        public function modificar($id){
            $domicilio = new Domicilio_model();
            $data["domicilio"] = $domicilio->get_domicilio($id);
            $calle = $_POST['calle'];
            $numero = $_POST['numero'];
            $piso = $_POST['piso'];
            $puerta = $_POST['puerta'];
            echo $id.'---'.$calle.'---'.$numero.'---'.$piso.'---'.$puerta;
            $domicilio->modificarDomicilio($id, $calle, $numero, $piso, $puerta);
            header('Location: index.php?c=Domicilio&a=mostrarDomicilio&id='.$id);

        }

        public function eliminar($id){
            $domicilio = new Domicilio_model();
            $data["domicilio"] = $domicilio->get_domicilio($id);
            $cliente = new Cliente_model();
            $data['cliente'] = $cliente->get_cliente_id($data["domicilio"]['idcliente']);
            $producto = new Producto_model();
            $data["productos"] = $producto->get_productos($id);
            
            $trabajo = new Trabajo_model();
            $parte = new Parte_model();
            $data["partes"] = $parte->get_all_partes();

            foreach($data["partes"] as $parteAux){
                foreach($data["productos"] as $productoAux){
                    if($productoAux['idproducto'] == $parteAux['idproducto']){
                        if($trabajoAux = $trabajo->get_trabajo_parte($parteAux['idparte'])){
                            $trabajo->eliminarTrabajo($trabajoAux['idtrabajo']);
                        }
                        $parte->eliminarParte($parteAux['idparte']);
                    }
                }
            }
            
            

            /* Elimino los productos asociados al domicilio */
            foreach($data["productos"] as $productoAux){
                $producto->eliminarProducto($productoAux['idproducto']);
            }
            /* Elimino el domicilio */
            $domicilio->eliminarDomicilio($id);

            header('Location: index.php?c=Usuario&a=mostrarUsuario&id='.$data['cliente']['idusuario']);
        }

        public function mostrar(){
            $domicilio = new Domicilio_model();
            $data["domicilios"] = $domicilio->get_all_domicilios();
            require_once "views/domicilio/index.php";
        }

        public function mostrarDomicilio($id){
            $domicilio = new Domicilio_model();
            $producto = new Producto_model();
            $data["domicilio"] = $domicilio->get_domicilio($id);
            $data["productos"] = $producto->get_productos($id);
            if($domicilio->get_domicilio($id)){
                require_once "views/domicilio/detalle.php";
            }
            else{
                header('Location: index.php?c=Usuario&a=mostrar');
                /* $this->mostrar(); */
            }
        }

    }