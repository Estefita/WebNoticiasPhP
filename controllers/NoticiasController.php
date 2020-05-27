<?php
    require_once "BaseController.php";
    require_once "Datos/Datos.php";
    require_once "Datos/Noticias/NoticiasDatos.php";

    class NoticiasController extends BaseController{
        #region Noticias Mas Recientes
        public function noticias(){
            $noticiasinsta = new NoticiaDatos();
            $notic = $noticiasinsta->obtenerMasReci();
            require_once './views/Noticias/noticias.php';
        }
        #endregion

        #region Noticias Mas Recientes
        public function masRecientes(){
            $noticiasinsta = new NoticiaDatos();
            $masrec = $noticiasinsta->obtenerMasReci();
            require_once './views/Noticias/masreci.php';
        }
        #endregion

        #region Mas Leidas
        public function masLeidas(){
            $noticiasinsta = new NoticiaDatos();
            $masleida = $noticiasinsta->masLeidas();
            require_once './views/Noticias/masleidas.php';
        }
        #endregion

        #region Menos Leidas
        public function menosLeidas(){
            $noticiasinsta = new NoticiaDatos();
            $menosleida = $noticiasinsta->menosLeidas();
            require_once './views/Noticias/menosleidas.php';
        }
        #endregion
        #region Mas Valoradas
        public function masValoradas(){
            $noticiasinsta = new NoticiaDatos();
            $masvalor = $noticiasinsta->masValoradas();
            require_once './views/Noticias/masvalor.php';
        }
        #endregion

        #region Noticias por categorias
        public function notcat(){
            $idcat=0;
            if (isset($_GET['idcategoria'])) {
                $idcat = $_GET['idcategoria'];
            } 
            $noticiacategoria = new NoticiaDatos();
            $notic = $noticiacategoria->notcat($idcat);
            require_once './views/Noticias/noticias.php';
        }
        #endregion

        #region Mas Visitadas
        public function masVisitadas(){

            $noticiasinsta = new NoticiaDatos();
            
            $pageno = 1;
            if (isset($_GET['pageno'])) {
                $pageno = $_GET['pageno'];
            } 
             
            $regpagina = 2;
            $offset = ($pageno>1) ? (($pageno * $regpagina)- $regpagina):0;
                        
            $masvisit = $noticiasinsta->masVisitadas($offset,$regpagina);
            $registros = $noticiasinsta->paginacion(); 
            $paginas = ceil(intval($registros)/$regpagina);           

            require_once './views/Noticias/masvisitadas.php';
        }
        #endregion

        #region lista noticias
        public function listanoticia(){
            $noticiasinsta = new NoticiaDatos();
            $obtnoti = $noticiasinsta ->obtenerNoticias(); 
            require_once './views/Noticias/mantenimientonoticia.php';
        }
        #endregion

        #region nuevanoticia
        public function nuevaNoticia(){
            $noticiasinsta = new NoticiaDatos();
            $categoinst = new categoriasDatos();
            $obtcateg = $categoinst ->obtenerCategorias(); 
          
            $idusuario = 0;
            if(!isset($_SESSION["identifica"])){
                $this->CheckLogin();
            }else {
                $user = $_SESSION["identifica"];
                $idusuario=$user->id;
                
                $idcategoria = 0;
                if (isset($_POST["idcategoria"])) {
                    $idcategoria = $_POST["idcategoria"];                
                }            

                $titulo = "";
                if (isset($_POST["titulo"])) {
                    $titulo = $_POST["titulo"];                
                }  

                $descripcion = "";
                if (isset($_POST["descripcion"])) {
                    $descripcion = $_POST["descripcion"];                
                }  

                $imagen = "";
                if (isset($_POST["imagen"])) {
                    $imagen = $_POST["imagen"];                
                }
                
                $mensaje = "";
                if(!empty($idcategoria) && !empty($titulo) && !empty($descripcion) && !empty($imagen)){
                    $categoinst = new categoriasDatos(); 
                    $noticiasinsta = new NoticiaDatos();
                    $obtnoti = $noticiasinsta ->addNoticia($idcategoria,$titulo,$descripcion,$imagen,$idusuario);    
                    $mensaje="Insertada correctamente.";
                }
                $categoinst = new categoriasDatos();
                $obtcateg = $categoinst ->obtenerCategorias(); 
                require_once './views/Noticias/nuevaNoticia.php';
            }
        }
        #endregion

        #region perfil
        function perfil(){
            if (isset($_SESSION["identifica"])) {
                $user = $_SESSION["identifica"];
                $id=$user->id;
            }            

            $idnoticia = 0;
                if (isset($_GET["idnoticia"])) {
                    $idnoticia = $_GET["idnoticia"];                
                } 
            $noticiasinsta = new NoticiaDatos();
            $obtnoti = $noticiasinsta->perfil($idnoticia);    
            require_once "./views/Noticias/editarNoticia.php";
        }
        #endregion

        #region editar noticia
        public function editarNoticia(){
            $noticiasinsta = new NoticiaDatos();
            $categoinst = new categoriasDatos();
            $idusuario = 0;

            if(!isset($_SESSION["identifica"])){
                $this->CheckLogin();
            }else {
                $user = $_SESSION["identifica"];
                $idusuario=$user->id;               
                
                $idnoticia = 0;
                if(isset($_GET["idnoticia"])){
                    $idnoticia = $_GET["idnoticia"];
                }
                if(isset($_POST["idnoticia"])){
                    $idnoticia = $_POST["idnoticia"];
                }

                $idcategoria = 0;
                if(isset($_POST["idcategoria"])){
                    $idcategoria = $_POST["idcategoria"];
                }

                $nomcat ="";
                if(isset($_POST["nomcat"])){
                    $nomcat = $_POST["nomcat"];
                }
        
                $titulo = "";
                if (isset($_POST["titulo"])) {
                    $titulo = $_POST["titulo"];                
                } 
                
                $descripcion = "";
                if (isset($_POST["descripcion"])) {
                    $descripcion = $_POST["descripcion"];                
                } 

                $imagen = "";
                if (isset($_POST["imagen"])) {
                    $imagen = $_POST["imagen"];                
                }  
                if(!empty($idcategoria)){
                    $noticiasinsta = new NoticiaDatos();
                    $categoinst = new categoriasDatos();                    
                    $obtnoti = $noticiasinsta ->editarNoticia($idcategoria,$titulo,$descripcion,$imagen,$idusuario,$idnoticia);                
                    $mensaje="Modificada correctamente.";
                }
                $categoinst = new categoriasDatos();
                $obtcateg = $categoinst ->obtenerCategorias(); 
                $noticiasinsta = new NoticiaDatos();
                $noticiainsta = $noticiasinsta->perfil($idnoticia);                     
                require_once './views/Noticias/editarNoticia.php';
            }
        }
        #endregion

        #region eliminar noticia
        public function eliminarNoticia(){
            $noticiasinsta = new NoticiaDatos();

            if(!isset($_SESSION["identifica"])){
                $this->CheckLogin();
            }else {
                $user = $_SESSION["identifica"];
                $idusuario=$user->id;  

                $idnoticia = 0;
                if(isset($_GET["idnoticia"])){
                    $idnoticia = $_GET["idnoticia"];
                }

                $noticiasinsta = new NoticiaDatos();
                $obtnoti = $noticiasinsta ->eliminarNoticia($idnoticia); 
                $obtnoti = $noticiasinsta ->obtenerNoticias(); 
                require_once './views/Noticias/mantenimientonoticia.php';
            }     
        }
        #endregion

        #region Cargar Noticias
        public function CargarNoticias(){
            
            $datos = new datos();
            $datos->CargarNoticiasTotal();
        }
        #endregion
    }
?>