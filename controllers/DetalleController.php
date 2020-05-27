<?php
    require_once "BaseController.php";
    require_once "ComentariosController.php";
    require_once "Datos/Datos.php";
    require_once "Datos/Noticias/NoticiasDatos.php";
    

    class DetalleController extends BaseController {
        public function detalle($mensaje=""){
         
            $detanoticia = $_GET["idnoticia"];
            $detalleinst = new NoticiaDatos();
            $detal = $detalleinst->detallesNoticias($detanoticia);

            require_once "views/Detalle/detalle.php"; 

            $comentario = new ComentariosController();
            $coment = $comentario->comentarios($detanoticia);    
        }
    }
?>