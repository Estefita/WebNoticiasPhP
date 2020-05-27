<?php
    require_once 'BaseController.php';
    require_once 'NoticiasController.php';

    class HomeController extends BaseController{

        public function index(){
            $Noticiainstancia = new NoticiasController();
            $Noticiainstancia ->masRecientes();
            $Noticiainstancia ->masLeidas();
            $Noticiainstancia ->menosLeidas();
            $Noticiainstancia ->masValoradas();
            
            if(isset($_SESSION["identifica"])){
                print_r($_SESSION["identifica"]);
            }
            require_once 'views/Home/index.php';

        }
        
    }
?>