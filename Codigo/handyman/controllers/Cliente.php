<?php 
    class Clientecontroller{
        public function __construct(){
            require_once "models/Usuario.php";
            require_once "models/Cliente.php";
            require_once "models/Domicilio.php";
            require_once "models/Producto.php";
            require_once "models/Parte.php";
        }

        public function mostrar(){
            $usuario = new Usuario_model();
            $data["usuarios"] = $usuario->get_usuarios();
            require_once "views/usuario/index.php";
        }

        public function nuevoCliente(){
            require_once "views/cliente/nuevo.php";
        }

        public function insertar(){
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $telefono = $_POST['telefono'];
            $dni = $_POST['dni'];
            $rol = 'CLIENTE';
            $fecha_registro = date('Y-m-d');
            //comprobar que no existen mismos users, correos, dni etc. comprobarExistencia()
            if($this->comprobarExistencia($username, $email, $dni)){
                $usuario = new Usuario_model();
                $idUser = $usuario->insertar($nombre, $apellidos, $username, $password, $email, $telefono, $dni, $rol);

                $cliente = new Cliente_model();
                $cliente->insertarCliente($idUser, $fecha_registro);
                /* $this->mostrar(); */ 
                header('Location: index.php?c=Usuario&a=mostrar');
            }else{
                header('Location: index.php?c=Cliente&a=nuevoCliente');
            }
        }

        public function comprobarExistencia($username, $email, $dni){
            $resultado = false;
            $usuario = new Usuario_model();
            $usernameResult = $usuario->get_username($username);
            $emailResult = $usuario->get_email($email);
            $dniResult = $usuario->get_dni($dni);
             if(mysqli_num_rows($usernameResult)==0 && mysqli_num_rows($emailResult)==0 && mysqli_num_rows($dniResult)==0){
                $resultado = true;
            } 
            return $resultado;
        }

        public function mostrarProductos($id){
            $usuario = new Usuario_model();
            $data["usuario"] = $usuario->get_usuario($id);
            $cliente = new Cliente_model();
            $data["cliente"] = $cliente->get_cliente($id);
            $domicilio = new Domicilio_model();
            $data["domicilios"] = $domicilio->get_domicilios($data["cliente"]['idcliente']);
            $producto = new Producto_model();
            $data["productos"] = [];
            $dataAux["productosAux"] = [];
            foreach($data['domicilios'] as $domicilioAux){
                array_push($dataAux["productosAux"], $producto->get_productos($domicilioAux['iddomicilio']));  
            }
            foreach($dataAux["productosAux"] as $productoArrayAux){
                foreach($productoArrayAux as $productoAux){
                    array_push($data["productos"], $productoAux);
                }   
            }
            /* var_dump($data["productos"]); */
            
            require_once "views/cliente/productos.php";
        }

        public function mostrarPartes($idusuario){
            $usuario = new Usuario_model();
            $data["usuario"] = $usuario->get_usuario($idusuario);
            $cliente = new Cliente_model();
            $data["cliente"] = $cliente->get_cliente($idusuario);
            $parte = new Parte_model();
            $data["partes"] = $parte->get_partes($data["cliente"]['idcliente']);
            $producto = new Producto_model();
            $domicilio = new Domicilio_model();
            $data["productos"] = [];
            $data["domicilios"] = [];
            foreach($data["partes"] as $parteAux){
                $productoAux = $producto->get_producto($parteAux['idproducto']);
                $domicilioAux = $domicilio->get_domicilio($productoAux['iddomicilio']);
                array_push($data["productos"], $productoAux);

                //Evitamos repetir datos con la funcion "in_array" y añadimos los domicilios
                if(!in_array($domicilioAux, $data["domicilios"], true)){
                    array_push($data["domicilios"], $domicilioAux);
                }
            }
            
            require_once "views/cliente/reportes.php";
        }

        
    }