<?php
    require_once "controllers/BaseController.php";
    require_once "models/Noticia/NoticiaModel.php";
    require_once "models/Detalle/DetalleModel.php";
    require_once "config/config.php";
    class NoticiaDatos extends BaseController{

        public function obtenerNoticias(){
            $array = [];
            $query = "SELECT n.id, c.nomcat, n.idcategoria, n.idusuario, n.titulo, n.descripcion, n.valoracion, n.numvisit, n.imagen FROM noticias n INNER JOIN categorias c on c.id=n.idcategoria";
            $connect = $this->connect();
            $result = $connect->query($query);
            $rows = $result->fetchAll(PDO::FETCH_ASSOC);
            if (count($rows) > 0) {
                foreach ($rows as $val) {
                    $card = new modeloNoticia();

                    $card->id = $val["id"];
                    $card->idcategoria = $val["idcategoria"];
                    $card->idusuario = $val["idusuario"];
                    $card->nomcat = $val["nomcat"];
                    $card->titulo = $val["titulo"];
                    $card->descripcion  = $val["descripcion"];
                    $card->valoracion = $val["valoracion"];
                    $card->numvisit = $val["numvisit"];
                    $card->imagen = $val["imagen"];

                    $array[] = $card;
                }
            }
            $result = null;
            return $array;
        }

        #region obtenerNovedades
        public function obtenerMasReci(){
            $array = [];
            $query = "SELECT n.id, c.nomcat, n.titulo, n.descripcion, n.valoracion, n.numvisit, n.imagen FROM noticias n INNER JOIN categorias c on c.id=n.idcategoria ORDER BY n.fechaalta DESC LIMIT 5";
            $connect = $this->connect();
            $result = $connect->query($query);
            $rows = $result->fetchAll(PDO::FETCH_ASSOC);
            if (count($rows) > 0) {
                foreach ($rows as $val) {
                    $card = new modeloNoticia();

                    $card->id = $val["id"];
                    $card->nomcat = $val["nomcat"];
                    $card->titulo = $val["titulo"];
                    $card->descripcion  = $val["descripcion"];
                    $card->valoracion = $val["valoracion"];
                    $card->numvisit = $val["numvisit"];
                    $card->imagen = $val["imagen"];

                    $array[] = $card;
                }
            }
            $result = null;
            return $array;
        }
        #endregion

        #region masLeidas
        public function masLeidas(){
            $array = [];
            $query = "SELECT n.id, c.nomcat, n.titulo, n.descripcion, n.valoracion, n.numvisit, n.imagen FROM noticias n INNER JOIN categorias c on c.id=n.idcategoria ORDER BY n.numvisit DESC LIMIT 5";
            $connect = $this->connect();
            $result = $connect->query($query);
            $rows = $result->fetchAll(PDO::FETCH_ASSOC);
            if (count($rows) > 0) {
                foreach ($rows as $val) {
                    $card = new modeloNoticia();

                    $card->id = $val["id"];
                    $card->nomcat = $val["nomcat"];
                    $card->titulo = $val["titulo"];
                    $card->descripcion  = $val["descripcion"];
                    $card->valoracion = $val["valoracion"];
                    $card->numvisit = $val["numvisit"];
                    $card->imagen = $val["imagen"];

                    $array[] = $card;
                }
            }
            $result = null;
            return $array;
        }
        #endregion

        #region menosLeidas
        public function menosLeidas(){
            $array = [];
            $query = "SELECT n.id, c.nomcat, n.titulo, n.descripcion, n.valoracion, n.numvisit, n.imagen FROM noticias n INNER JOIN categorias c on c.id=n.idcategoria ORDER BY n.numvisit ASC LIMIT 5";
            $connect = $this->connect();
            $result = $connect->query($query);
            $rows = $result->fetchAll(PDO::FETCH_ASSOC);
            if (count($rows) > 0) {
                foreach ($rows as $val) {
                    $card = new modeloNoticia();

                    $card->id = $val["id"];
                    $card->nomcat = $val["nomcat"];
                    $card->titulo = $val["titulo"];
                    $card->descripcion  = $val["descripcion"];
                    $card->valoracion = $val["valoracion"];
                    $card->numvisit = $val["numvisit"];
                    $card->imagen = $val["imagen"];

                    $array[] = $card;
                }
            }
            $result = null;
            return $array;
        }
        #endregion
        #region masValoradas
        public function masValoradas(){
            $array = [];
            $query = "SELECT n.id, c.nomcat, n.titulo, n.descripcion, n.valoracion, n.numvisit, n.imagen FROM noticias n INNER JOIN categorias c on c.id=n.idcategoria ORDER BY n.valoracion DESC LIMIT 5";
            $connect = $this->connect();
            $result = $connect->query($query);
            $rows = $result->fetchAll(PDO::FETCH_ASSOC);
            if (count($rows) > 0) {
                foreach ($rows as $val) {
                    $card = new modeloNoticia();

                    $card->id = $val["id"];
                    $card->nomcat = $val["nomcat"];
                    $card->titulo = $val["titulo"];
                    $card->descripcion  = $val["descripcion"];
                    $card->valoracion = $val["valoracion"];
                    $card->numvisit = $val["numvisit"];
                    $card->imagen = $val["imagen"];

                    $array[] = $card;
                }
            }
            $result = null;
            return $array;
        }
        #endregion

        #region Ultimas Visitadas
        public function notcat($idcat){
            
            $array = [];
            $query = "SELECT n.id, c.nomcat, n.titulo, n.descripcion, n.valoracion, n.numvisit, n.imagen FROM noticias n INNER JOIN categorias c on c.id=n.idcategoria WHERE n.idcategoria=$idcat;";
            
            $connect = $this->connect();
            $result = $connect->query($query);
            $rows = $result->fetchAll(PDO::FETCH_ASSOC);
            if (count($rows) > 0) {
                foreach ($rows as $val) {
                    $card = new modeloNoticia();

                    $card->id = $val["id"];
                    $card->nomcat = $val["nomcat"];
                    $card->titulo = $val["titulo"];
                    $card->descripcion  = $val["descripcion"];
                    $card->valoracion = $val["valoracion"];
                    $card->numvisit = $val["numvisit"];
                    $card->imagen = $val["imagen"];
                    $array[] = $card;
                }
            }
            $result = null;
            return $array;

        }
        #endregion 




        #region Ultimas Visitadas
        public function masVisitadas($offset,$regpagina){
            
            $array = [];
            $query = "SELECT n.id, c.nomcat, n.titulo, n.descripcion, n.valoracion, n.numvisit, n.imagen FROM noticias n INNER JOIN categorias c on c.id=n.idcategoria ORDER BY numvisit LIMIT $offset,$regpagina";
            
            $connect = $this->connect();
            $result = $connect->query($query);
            $rows = $result->fetchAll(PDO::FETCH_ASSOC);
            if (count($rows) > 0) {
                foreach ($rows as $val) {
                    $card = new modeloNoticia();

                    $card->id = $val["id"];
                    $card->nomcat = $val["nomcat"];
                    $card->titulo = $val["titulo"];
                    $card->descripcion  = $val["descripcion"];
                    $card->valoracion = $val["valoracion"];
                    $card->numvisit = $val["numvisit"];
                    $card->imagen = $val["imagen"];
                    $array[] = $card;
                }
            }
            $result = null;
            return $array;

        }
        #endregion 


        #region Detalles
        public function detallesNoticias($idnot){
            //$array = [];
            $instdetalle = new modeloDetalle();
            $query = <<<EOD
                        SELECT n.id, n.idcategoria, c.nomcat, n.titulo, n.imagen, n.descripcion, n.numvisit, n.valoracion, n.fechaalta, comentarios.descripcion AS 'comentario'
                        FROM noticias n
                        left JOIN comentarios ON comentarios.idnoticia=n.id
                        left JOIN usuarios u ON comentarios.idusuario=u.id
                        INNER JOIN categorias c ON c.id=n.idcategoria
                        WHERE n.id=$idnot;
                EOD;
                $connect = $this->connect();
                $result = $connect->query($query);
                $rows = $result->fetchAll(PDO::FETCH_ASSOC);
                if (count($rows) > 0) {
                    
                    $val = $rows[0];
                    $instdetalle->id = $val["id"];
                    $instdetalle->idcategoria = $val["idcategoria"];
                    $instdetalle->nomcat = $val["nomcat"];
                    $instdetalle->titulo = $val["titulo"];
                    $instdetalle->imagen = $val["imagen"];
                    $instdetalle->descripcion  = $val["descripcion"];
                    $instdetalle->numvisit = $val["numvisit"];
                    $instdetalle->valoracion = $val["valoracion"];
                    $instdetalle->fechaalta = $val["fechaalta"];
                    $instdetalle->comentario = $val["comentario"];
                }

                $query2 = <<<EOD
                        UPDATE noticias SET numvisit=numvisit+1
                        WHERE noticias.id = $idnot;
                        EOD;
                $result2 = $connect->query($query2);  
                     

                $result = null;
                $result2 = null;
                $connect = null;
                return $instdetalle;
            }
    
            #endregion

        #region paginacion
        public function paginacion(){
            $query = "SELECT COUNT(*) as numero FROM noticias";
            $connect = $this->connect();
            $result = $connect->query($query);
            $rows = $result->fetchAll(PDO::FETCH_ASSOC)[0];                                   
            return $rows["numero"];
        }
        #endregion

        #region nueva noticia
        public function addNoticia($idcategoria,$titulo,$descripcion,$imagen,$idusuario){
            
            $query = "INSERT INTO noticias (idcategoria,titulo,descripcion,imagen,idusuario) VALUES ($idcategoria,'$titulo','$descripcion','$imagen',$idusuario)";
            $connect = $this->connect();
            $result = $connect->prepare($query);
            $result->execute(array($query));
            $result = null;
        }
        #endregion

        #region perfil
        public function perfil($idnoticia){         
            $query = "SELECT n.id, n.idcategoria,n.idusuario, c.nomcat, n.titulo, n.descripcion, n.imagen FROM noticias n INNER JOIN categorias c on c.id=n.idcategoria WHERE n.id = $idnoticia";
            $connect = $this->connect();
            $result = $connect->query($query);
            $rows = $result->fetchAll(PDO::FETCH_ASSOC);
            if (count($rows) > 0) {
                foreach ($rows as $val) {
                    $noticiainsta = new modeloNoticia;
                    $noticiainsta->id = $val["id"];
                    $noticiainsta->idusuario = $val["idusuario"];
                    $noticiainsta->idcategoria = $val["idcategoria"];
                    $noticiainsta->nomcat = $val["nomcat"];
                    $noticiainsta->imagen = $val["imagen"];
                    $noticiainsta->titulo = $val["titulo"];
                    $noticiainsta->descripcion  = $val["descripcion"];
                }
                return $noticiainsta;
            }
            $result = null;                       
        }
        #endregion

        #region editar noticia
        public function editarNoticia($idcategoria,$titulo,$descripcion,$imagen,$idusuario,$idnoticia){
            
            $query = "UPDATE noticias SET idcategoria = $idcategoria, titulo = '$titulo', descripcion = '$descripcion', imagen = '$imagen', idusuario = $idusuario WHERE id = $idnoticia;";
            
            $connect = $this->connect();
            $result = $connect->prepare($query);
            $result->execute(array($query));
        
            $result = null;
        }
        #endregion

        #region eliminar noticia
        public function eliminarNoticia($idnoticia){
            
            $query = "DELETE FROM noticias WHERE id = $idnoticia";
            $connect = $this->connect();
            $result = $connect->prepare($query);
            $result->execute(array($query));
            $result = null;

        }
        #endregion
    }
?>