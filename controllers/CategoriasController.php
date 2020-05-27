<?php
    require_once 'BaseController.php';
    require_once "Datos/Categorias/categoriasDatos.php";
    class CategoriasController extends BaseController {
        public function categorias(){
            
            $categoinst = new categoriasDatos();
            $obtcateg = $categoinst ->obtenerCategorias(); 
            require_once './views/Categorias/categorias.php';
        }

        public function listacategoria(){
            $categoinst = new categoriasDatos();
            $obtcateg = $categoinst ->obtenerCategorias(); 
            require_once './views/Categorias/mantenimientocategoria.php';
        }

        public function nuevaCategoria(){
            $categoinst = new categoriasDatos();
          
            $idusuario = 0;
            if(!isset($_SESSION["identifica"])){
                $this->CheckLogin();
            }else {
                $user = $_SESSION["identifica"];
                $idusuario=$user->id;
                
                $nomcat="";
                if (isset($_POST["nomcat"])) {
                    $nomcat = $_POST["nomcat"];                
                }            

                $imagen = "";
                if (isset($_POST["imagen"])) {
                    $imagen = $_POST["imagen"];                
                }  

                //print_r($nomcat);
                $mensaje = "";
                if(!empty($nomcat) && !empty($imagen)){
                    $categoinst = new categoriasDatos();
                    $obtcateg = $categoinst ->addCategoria($nomcat,$imagen,$idusuario);                
                    $mensaje="Insertada correctamente.";
                }
                $categoinst = new categoriasDatos();
                $obtcateg = $categoinst ->obtenerCategorias(); 
                require_once './views/Categorias/nuevaCategoria.php';
            }
        }

        function perfil(){
            if (isset($_SESSION["identifica"])) {
                $user = $_SESSION["identifica"];
                $id=$user->id;
            }         
            $idcat = 0;
            if (isset($_GET["idcat"])) {
                $idcat = $_GET["idcat"];                
            }    
            $categoinst = new categoriasDatos();
            $cateinst = $categoinst->perfil($idcat);    
            require_once "./views/Categorias/editarCategoria.php";


        }

        public function editarCategoria(){
            $categoinst = new categoriasDatos();
            $idusuario = 0;

            if(!isset($_SESSION["identifica"])){
                $this->CheckLogin();
            }else {
                $user = $_SESSION["identifica"];
                $idusuario=$user->id;               
                
                $idcat = 0;
                if(isset($_GET["idcat"])){
                    $idcat = $_GET["idcat"];
                }

                if(isset($_POST["idcat"])){
                    $idcat = $_POST["idcat"];
                }
        
                $nomcat = "";
                if (isset($_POST["nomcat"])) {
                    $nomcat = $_POST["nomcat"];                
                }            

                $imagen = "";
                if (isset($_POST["imagen"])) {
                    $imagen = $_POST["imagen"];                
                }  
                if(!empty($nomcat)){
                    $categoinst = new categoriasDatos();
                    $obtcateg = $categoinst ->editarCategoria($nomcat,$imagen,$idcat,$idusuario);                
                    $mensaje="Modificada correctamente.";
                }
                $categoinst = new categoriasDatos();
                $cateinst = $categoinst->perfil($idcat);   
                require_once './views/Categorias/editarCategoria.php';
            }
        }

        public function eliminarCategoria(){
            $categoinst = new categoriasDatos();

            if(!isset($_SESSION["identifica"])){
                $this->CheckLogin();
            }else {
                $user = $_SESSION["identifica"];
                $idusuario=$user->id;  

                $idcat = 0;
                if(isset($_GET["idcat"])){
                    $idcat = $_GET["idcat"];
                }

                $categoinst = new categoriasDatos();
                $obtcateg = $categoinst ->eliminarCategoria($idcat); 
                $obtcateg = $categoinst ->obtenerCategorias(); 
                require_once './views/Categorias/mantenimientocategoria.php';
            }     
        }
    }
?>