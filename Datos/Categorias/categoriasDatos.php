<?php
    require_once "controllers/BaseController.php";
    require_once "Datos/Datos.php";
    require_once "models/Categoria/CategoriaModel.php";

    class categoriasDatos extends BaseController{
        public function obtenerCategorias(){
            $array = [];
            $query = "SELECT * from categorias;";
            $connect = $this->connect();
            $result = $connect->query($query);
            $rows = $result->fetchAll(PDO::FETCH_ASSOC);
            if (count($rows) > 0) {
                foreach ($rows as $val) {
                    $categoriainst = new modeloCategorias();

                    $categoriainst-> id = $val["id"];
                    $categoriainst-> nomcat = $val["nomcat"];
                    $categoriainst-> imagen = $val["imagen"];
                    $categoriainst-> numvisit = $val["numvisit"];
                    //$categoriainst-> valoracion = $val["valoracion"];
                    $array[] = $categoriainst;
                }
            }
            $result = null;
            return $array;
        }

        public function addCategoria($nomcat,$imagen,$idusuario){
            
            $query = "INSERT INTO categorias (nomcat,imagen,idusuario) VALUES ('$nomcat','$imagen',$idusuario)";
            $connect = $this->connect();
            //$result = $connect->query($query);
            $result = $connect->prepare($query);
            $result->execute(array($query));
            $result = null;

            //print_r($query);

        }

        public function perfil($idcat){         
            $query = "SELECT id, nomcat,imagen FROM categorias WHERE id= $idcat;";
            $connect = $this->connect();
            $result = $connect->query($query);
            $rows = $result->fetchAll(PDO::FETCH_ASSOC);
            if (count($rows) > 0) {
                foreach ($rows as $val) {
                    $cateinst = new modeloCategorias;
                    $cateinst->id = $val["id"];
                    $cateinst->nomcat = $val["nomcat"];
                    $cateinst->imagen = $val["imagen"];
                }
            }
            $result = null;            
            return $cateinst;
        }

        public function editarCategoria($nomcat,$imagen,$idcat,$idusuario){
            
            $query = "UPDATE categorias SET nomcat = '$nomcat', imagen = '$imagen', idusuario = $idusuario WHERE id = $idcat;";
            $connect = $this->connect();
            $result = $connect->prepare($query);
            $result->execute(array($query));

            $result = null;
        }

        public function eliminarCategoria($idcat){
            
            $query = "DELETE FROM categorias WHERE id = $idcat";
            $connect = $this->connect();
            $result = $connect->prepare($query);
            $result->execute(array($query));
            $result = null;

        }
    }

    
?>