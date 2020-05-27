<?php 
    require_once "controllers/BaseController.php";
    require_once "models/Usuarios/UsuarioModel.php";
    require_once "models/Contacto/ContactoModel.php";

    class UsuarioDatos extends BaseController{

        #region Login
        public function login($email,$password) {
            $userinst = false;
            $connect = $this->connect();
            $query = "SELECT * FROM usuarios u WHERE u.email = '$email' AND u.password = '$password';";
            $result = $connect->query($query);
            if($result){
                $rows = $result->fetchAll(PDO::FETCH_ASSOC);
                if (count($rows) > 0) {
                    //foreach ($rows as $val) { //No se usa foreach porque solo es un elemento y no vamos a usar el array solo para uno
                    $val = $rows[0];
                    $userinst = new modeloUsuario;
                    $userinst->id = $val["id"];
                    $userinst->nombre = $val["nombre"];
                    $userinst->apellidos = $val["apellidos"];
                    $userinst->email  = $val["email"];
                    $userinst->fechaalta = $val["fechaalta"];
                    $userinst->password = $val["password"];

                //$array[] = $instdetalle;
                }
                
             }
                $result = null;
                //return $array;
                return $userinst;
            //}
        }
        #endregion


        #region Perfil

        public function perfil($idUsu){         
            $query = "SELECT id, nombre, email, 'password' FROM usuarios WHERE id={$idUsu};";
            $connect = $this->connect();
            $result = $connect->query($query);
            $rows = $result->fetchAll(PDO::FETCH_ASSOC);
            if (count($rows) > 0) {
                foreach ($rows as $val) {
                    $userinst = new modeloUsuario;
                    $userinst->id = $val["id"];
                    $userinst->nombre = $val["nombre"];
                    $userinst->email  = $val["email"];
                    $userinst->password = $val["password"];
                }
            }
            $result = null;            
            return $userinst;
        }
        #endregion

       #region Modificar

        public function modificar($idUsu,$password){         
            $userinst = new modeloUsuario;
            $query = "UPDATE usuarios SET usuarios.password = '{$password}' WHERE id= {$idUsu};";
            $connect = $this->connect();
            $result = $connect->query($query);
            $rows = $result->fetchAll(PDO::FETCH_ASSOC);
            if (count($rows) > 0) {
                foreach ($rows as $val) {                    
                    $userinst->id = $val["id"];
                    $userinst->nombre = $val["nombre"];
                    $userinst->email  = $val["email"];
                    $userinst->password = $val["password"];
                }
            }
            $result = null;            
            return $userinst;
        }
        #endregion

        #region Contacto
        public function contacto($nombre, $email, $descripcion) {
            $connect = $this->connect();
            $query = "INSERT INTO contacto (nombre,email,descripcion) VALUES ('{$nombre}','{$email}','{$descripcion}');";
            $result = $connect->query($query);
            $result = null;
        }
        #endregion

        #region Registrar
        public function registrar($nombre,$apellidos,$email,$password){

            $query = "INSERT INTO usuarios (nombre,apellidos,email,`password`,fechaalta) VALUES ('$nombre','$apellidos','$email','$password',Now())";            
            
            $connect = $this->connect();
            $result = $connect->prepare($query);
            $result->execute(array($query));
            $result = null;
        }
        #endregion  
}
?>