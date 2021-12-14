<?php 
    class Productocontroller{
        public function __construct(){
            require_once "models/Usuario.php";
            require_once "models/Cliente.php";
            require_once "models/Domicilio.php";
            require_once "models/Producto.php";
            require_once "models/Parte.php";
            require_once "models/Trabajo.php";
        }

        public function nuevoProducto($id){
            require_once "views/producto/nuevo.php";
        }

        public function insertar($id){
            /* Recojo datos */
            $nombre = $_POST['nombre'];
            $marca = $_POST['marca'];
            $fecha_registro = date('Y-m-d');
            $iddomicilio = $id;

            $domicilio = new Domicilio_model();
            $data['domicilio'] = $domicilio->get_domicilio($iddomicilio);

            /* Inserto datos */
            $producto = new Producto_model();
            $producto->insertarProducto($nombre, $marca, $fecha_registro, $iddomicilio);

            header('Location: index.php?c=Domicilio&a=mostrarDomicilio&id='.$iddomicilio);
        }

        public function modificarProducto($id){
            $producto = new Producto_model();
            $data["producto"] = $producto->get_producto($id);
            require_once "views/producto/modificar.php";
        }

        public function modificar($id){
            $producto = new Producto_model();
            $data["producto"] = $producto->get_producto($id);
            $nombre = $_POST['nombre'];
            $marca = $_POST['marca'];
            echo $id.'---'.$nombre.'---'.$marca;
            $producto->modificarProducto($id, $nombre, $marca);
            header('Location: index.php?c=Producto&a=mostrarProducto&id='.$id);

        }

        public function mostrarProducto($id){
            $producto = new Producto_model();
            $domicilio = new Domicilio_model();
            $cliente = new Cliente_model();
            $data["producto"] = $producto->get_producto($id);
            $data["domicilio"] = $domicilio->get_domicilio($data['producto']['iddomicilio']);
            $data["cliente"] = $cliente->get_cliente_id($data["domicilio"]['idcliente']);
            $idUsuario = $data["cliente"]['idusuario'];
            if($producto->get_producto($id)){
                require_once "views/producto/detalle.php";
            }
            else{
                header('Location: index.php?c=Usuario&a=mostrar');
                /* $this->mostrar(); */
            }
        }

        public function eliminar($id){
            $producto = new Producto_model();
            $data['producto'] = $producto->get_producto($id);

            if($producto->get_producto($id)){

                $trabajo = new Trabajo_model();
                $parte = new Parte_model();
                $data["partes"] = $parte->get_all_partes();

                foreach($data["partes"] as $parteAux){
                    if($data['producto']['idproducto'] == $parteAux['idproducto']){
                        if($trabajoAux = $trabajo->get_trabajo_parte($parteAux['idparte'])){
                            $trabajo->eliminarTrabajo($trabajoAux['idtrabajo']);
                        }
                        $parte->eliminarParte($parteAux['idparte']);
                    }
                }
                $producto->eliminarProducto($id);
                header('Location: index.php?c=Domicilio&a=mostrarDomicilio&id='.$data['producto']['iddomicilio']);
            }
        }
    }