<?php 
    class Gestorcontroller{
        public function __construct(){
            require_once "models/Usuario.php";
            require_once "models/Cliente.php";
            require_once "models/Tecnico.php";
            require_once "models/Gestor.php";
            require_once "models/Domicilio.php";
            require_once "models/Producto.php";
            require_once "models/Parte.php";
            require_once "models/Trabajo.php";
        }

        public function mostrar(){
            $usuario = new Usuario_model();
            $data["usuarios"] = $usuario->get_usuarios();
            require_once "views/usuario/index.php";
        }

        public function nuevoGestor(){
            require_once "views/gestor/nuevo.php";
        }

        public function insertar(){
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $telefono = $_POST['telefono'];
            $dni = $_POST['dni'];
            $rol = 'GESTOR';
            $numero_sucursal = $_POST['numero_sucursal'];
            /* echo $numero_sucursal.'--'.$nombre.'--'.$apellidos.'--'.$username.'--'.$password.'--'.$email.'--'.$telefono.'--'.$dni.'--'.$rol; */
            //comprobar que no existen mismos users, correos, dni etc. comprobarExistencia()
            if($this->comprobarExistencia($username, $email, $dni)){
                $usuario = new Usuario_model();
                $idUser = $usuario->insertar($nombre, $apellidos, $username, $password, $email, $telefono, $dni, $rol);

                $gestor = new Gestor_model();
                $gestor->insertarGestor($numero_sucursal, $idUser);
                header('Location: index.php?c=Usuario&a=mostrar');
            }else{
                header('Location: index.php?c=Gestor&a=nuevoGestor');
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

        

        
    }