<?php
require_once "controllers/BaseController.php";
require_once "Datos/Datos.php";
require_once "models/Comentario/ComentarioModel.php";

class comentariosDatos extends BaseController
{
    public function obtenerComentarios($idnot)
    {
        $array = [];
        $query = "SELECT c.id, u.nombre, c.descripcion, c.idnoticia, c.fechaalta FROM comentarios c INNER JOIN usuarios u ON u.id=c.idusuario WHERE idnoticia=$idnot";
        $connect = $this->connect();
        $result = $connect->query($query);
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
        if (count($rows) > 0) {
            foreach ($rows as $val) {
                $comentariosinst = new modeloComentarios();

                $comentariosinst->id = $val["id"];
                $comentariosinst->nombreUsuario = $val["nombre"];
                $comentariosinst->descripcion = $val["descripcion"];
                $comentariosinst->idnoticia = $val["idnoticia"];
                $comentariosinst->fechaalta = $val["fechaalta"];
                /*$comentariosinst->idusuario = $val["idusuario"]; */

                $array[] = $comentariosinst;
            }
        }
        $result = null;
        return $array;
    }

    public function insertComentarios($descripcion,$idnoticia,$idusuario){        
        //$query = "SELECT c.id, u.nombre, c.descripcion FROM comentarios c INNER JOIN usuarios u ON u.id=c.idusuario WHERE idnoticia=1";
        $query = "INSERT INTO comentarios (descripcion,idnoticia,idusuario,fechaalta) VALUES ('$descripcion',$idnoticia,$idusuario,Now())";
        $connect = $this->connect();
        $result = $connect->prepare($query);
        $result->execute(array($query));
       
        $result = null;
    }
}
?>