<?php
    require_once "BaseController.php";
    require_once "Datos/Usuarios/UsuariosDatos.php";
    require_once "config/config.php";

    class UsuarioController extends BaseController{

        #region Login
        public function login(){
            $loginins = new UsuarioDatos;
            
            $email = "";
            if (isset($_POST["email"])) {
                $email = $_POST["email"];
                echo "Email: ". $email ."<br>";
                
            }
            $password = "";
            if (isset($_POST["password"])) {
                $password = $_POST["password"];
                echo "Contraseña: ". $password. "<br>";
            }
            
            $identifica = $loginins->login($email,$password);
           
            if($identifica){
                $_SESSION["identifica"]= $identifica;
                $referer = "http://localhost/ejercicios/WebNoticiasMVC/";
               
                if (isset($_SERVER["HTTP_REFERER"])) {
                    $referer = $_SERVER["HTTP_REFERER"];
                }
                
                
                $url = URL_BASE. "home/index";
                if(isset($_SESSION["controller"]) && isset($_SESSION["action"])){
                    $url = URL_BASE. $_SESSION["controller"]."/".$_SESSION["action"];
                    //header("Location: $url");
                }                

                header("Location: $url");
            }
            else{
                require_once 'views/Usuario/login.php';
            }                                   
        }

        #endregion

         #region Cerrar Sesion
        public function cerrarSesion(){
            $referer = "http://localhost/ejercicios/WebNoticiasMVC/";
            //$referer = URL_BASE;
            if(isset($_SERVER["HTTP_REFERER"])){
                $referer = $_SERVER["HTTP_REFERER"];
            }

            if(isset($_SESSION["identifica"])){
                unset($_SESSION["identifica"]);
                header("Location: ".$referer);
            } 
        }

        #endregion

        #region Perfil
        function perfil(){
            $id=0;
            if (isset($_SESSION["identifica"])) {
                $user = $_SESSION["identifica"];
                $id=$user->id;
            }            
            $perfilinsta = new UsuarioDatos();
            $userinst = $perfilinsta->perfil($id);    
            require_once "./views/Usuario/perfil.php";


        }
        #endregion

        #region Modificar
        function modificar(){
            
            $perfilinsta = new UsuarioDatos();
            $id=0;
            
            $mensaje="La contraseñas no coinciden";            
                //Quito de aqui el if del identifica porque he creado una funcion en el baseController
                // que se llama $this->CheckLogin(); y se pone aquí arriba.
                //si hace falta estar logueado, eso tambien te manda al login.
                             
            if(!isset($_SESSION["identifica"])){
                    $this->CheckLogin();
            }else {
                $user = $_SESSION["identifica"];
                $id=$user->id;   

                $password="";
                if (isset($_POST["contra"])) {
                    $password = $_POST["contra"];                
                }  
                
                $password2="";
                if (isset($_POST["contra2"])) {
                    $password2 = $_POST["contra2"];                
                }  

                if($password == $password2){
                    $perfilinsta = new UsuarioDatos();
                    $userinst = $perfilinsta->modificar($id,$password);                
                    $mensaje="Los cambios se han guardado correctamente.";
                }                

                $perfilinsta = new UsuarioDatos();
                $userinst = $perfilinsta->perfil($id);    

                require_once "./views/Usuario/perfil.php";
            }
        }
        #endregion

        #region Contacto
        public function contacto(){
            $nombre = "";
            $email = "";
            $descripcion = "";
    
            if (isset($_POST["nombre"])) {
                $nombre = $_POST["nombre"];                
            }            

            if (isset($_POST["email"])) {
                $email = $_POST["email"];                
            }  

            if (isset($_POST["descripcion"])) {
                $descripcion = $_POST["descripcion"];                
            }  

            if(!empty($nombre) && !empty($email) && !empty($descripcion)){
                $contactoinsta = new UsuarioDatos();
                $userinst = $contactoinsta->contacto($nombre,$email,$descripcion);                
                $mensaje="Mensaje enviado correctamente.";
            }

            require_once './views/Usuario/contacto.php';
        }
        #endregion

        public function administrar(){
            $contactoinsta = new UsuarioDatos();
            //$contact = $contactoinsta->administrar();
            require_once './views/Usuario/administrar.php';
        }

        public function registrar(){
            //$registrarinsta = new UsuarioDatos();
                 $mensaje = "Las contraseñas deben coincidir";
                $nombre="";
                if (isset($_POST["nombre"])) {
                    $nombre = $_POST["nombre"];                
                }

                $apellidos="";
                if (isset($_POST["apellidos"])) {
                    $apellidos = $_POST["apellidos"];                
                }

                $email="";
                if (isset($_POST["email"])) {
                    $email = $_POST["email"];                
                }

                $password="";
                if (isset($_POST["password"])) {
                    $password = $_POST["password"];                
                }  
                
                $password2="";
                if (isset($_POST["password2"])) {
                    $password2 = $_POST["password2"];                
                }  
                   $mensaje = "";
                    if(!empty($nombre) && !empty($apellidos) && !empty($email) && !empty($password) && ($password == $password2)){
                        
                            $registrarinsta = new UsuarioDatos();
                            $userinst = $registrarinsta->registrar($nombre,$apellidos,$email, $password);          
                            $mensaje="El usuario se ha registrado correctamente.";
                    }
                
                require_once './views/Usuario/registrar.php';
        }

    }
?>