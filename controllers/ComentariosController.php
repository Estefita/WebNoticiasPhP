<?php
    require_once 'BaseController.php';
    require_once "Datos/Datos.php";
    require_once "Datos/comentarios/ComentariosDatos.php";

    class ComentariosController extends BaseController {
        public function comentarios($idnot){
            $comentariosinst = new ComentariosDatos();
            $coment = $comentariosinst->obtenerComentarios($idnot);
            require_once "views/Comentarios/comentarios.php";
        }
        
        public function insertComentarios(){
            $comentariosinst = new ComentariosDatos();
            $id=0;

            if(!isset($_SESSION["identifica"])){
                $this->CheckLogin();
            }else {
                $user = $_SESSION["identifica"];
                $id=$user->id;

                $idnoticia = 0;
                if (isset($_GET["idnoticia"])) {
                    $idnoticia = $_GET["idnoticia"];                
                }             
                $descripcion = "";
                if (isset($_POST["descripcion"])) {
                    $descripcion = $_POST["descripcion"];                
                }  

                $mensaje = "";
                if(!empty($descripcion)){
                    $comentariosinst = new ComentariosDatos();
                    $coment1 = $comentariosinst->insertComentarios($descripcion,$idnoticia,$id);                
                    $mensaje="Mensaje enviado correctamente.";
                }                
            

                $detalle = new DetalleController();
                $detalle -> detalle($mensaje);
            }
        }
    }
?>