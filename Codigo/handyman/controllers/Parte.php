<?php 
    class Partecontroller{
        public function __construct(){
            require_once "models/Usuario.php";
            require_once "models/Cliente.php";
            require_once "models/Domicilio.php";
            require_once "models/Producto.php";
            require_once "models/Parte.php";
            require_once "models/Trabajo.php";
        }

        public function mostrar(){
            $parte = new Parte_model();
            $data["partes"] = $parte->get_all_partes();
            $cliente = new Cliente_model();
            $data["clientes"] = $cliente->get_clientes();
            $usuario = new Usuario_model();
            $data["usuarios"] = $usuario->get_usuarios();
            $producto = new Producto_model();
            $data["productos"] = $producto->get_all_productos();
            $domicilio = new Domicilio_model();
            $data["domicilios"] = $domicilio->get_all_domicilios();
            require_once "views/parte/index.php";
        }

        public function nuevoParte($id){
            $producto = new Producto_model();
            $data['producto'] = $producto->get_producto($id);
            require_once "views/parte/nuevo.php";
        }

        public function insertar($id){
            /* Recojo datos */
            $producto = new Producto_model();
            $parte = new Parte_model();
            $domicilio = new Domicilio_model();
            $cliente = new Cliente_model();
            $idusuario = $_SESSION['idusuario'];
            $asunto = $_POST['asunto'];
            $descripcion = $_POST['descripcion'];
            $fecha_parte = date('Y-m-d');
            $iddomicilio = $id;
            $productoAux = $producto->get_productoResult($id);

            //Comprobamos que el producto exista
            if(mysqli_num_rows($productoAux) != 0){
                $data['producto'] = $producto->get_producto($id);
                $data['domicilio'] = $domicilio->get_domicilio($data['producto']['iddomicilio']);
                $data['cliente'] = $cliente->get_cliente_id($data['domicilio']['idcliente']);
                //Control de url para que solo el cliente adecuado pueda reportar, y no haya ningún parte
                if($data['cliente']['idusuario'] == $idusuario){
                    $parteAux = $parte->get_parte_producto($id);
                    if(mysqli_num_rows($parteAux) == 0){
                        /* Inserto datos */
                        $parte->insertarParte($id, $data['cliente']['idcliente'], $asunto, $descripcion, $fecha_parte);
                        header('Location: index.php?c=Cliente&a=mostrarProductos&id='.$_SESSION['idusuario']);
                    }else{
                        header('Location: index.php?c=Cliente&a=mostrarProductos&id='.$_SESSION['idusuario']);
                    }

                }else{
                    header('Location: index.php?c=Cliente&a=mostrarProductos&id='.$_SESSION['idusuario']);
                }
            }else{
                header('Location: index.php?c=Cliente&a=mostrarProductos&id='.$_SESSION['idusuario']);
            }

            
            

            /* Inserto datos */
            /* $producto = new Producto_model();
            $producto->insertarProducto($nombre, $marca, $fecha_registro, $iddomicilio);

            header('Location: index.php?c=Domicilio&a=mostrarDomicilio&id='.$iddomicilio); */
        }

        public function mostrarParte($id){
            $parte = new Parte_model();
            $producto = new Producto_model();
            $domicilio = new Domicilio_model();
            $cliente = new Cliente_model();
            $usuario = new Usuario_model();
            $data["parte"] = $parte->get_parte($id);
            $data["producto"] = $producto->get_producto($data['parte']['idproducto']);
            $data["domicilio"] = $domicilio->get_domicilio($data['producto']['iddomicilio']);
            $data["cliente"] = $cliente->get_cliente_id($data["parte"]['idcliente']);
            $data["usuario"] = $usuario->get_usuario($data["cliente"]['idusuario']);
            if($parte->get_parte($id)){
                require_once "views/parte/detalle.php";
            }
            else{
                header('Location: index.php?c=Usuario&a=mostrar');
                /* $this->mostrar(); */
            }
        }

        public function eliminar($id){
            $parte = new Parte_model();
            $data['parte'] = $parte->get_parte($id);
            $trabajo = new Trabajo_model();
            $data['trabajo'] = $trabajo->get_trabajo_parte($data['parte']['idparte']);
            $cliente = new Cliente_model();
            $data['cliente'] = $cliente->get_cliente_id($data['parte']['idcliente']);
            if($parte->get_parte($id)){
                if($data['parte']['estado'] != 'TERMINADO'){
                    $trabajo->eliminarTrabajo($data['trabajo']['idtrabajo']);
                    $parte->eliminarParte($id);
                    header('Location: index.php?c=Main');
                }else{
                    header('Location: index.php?c=Main');
                }
            }
            else {
                header('Location: index.php?c=Main');
            }
        }
    }