<?php 
    require_once "config/config.php";
    class BaseController{
                     
        public static function connect(){
            /* $dbPwd = "2btlpU6FS0";
            $dbUser = "estefania";
            $dbServer = "54.36.98.69";
            $dbName = "estefania_noticias"; */

            $dbPwd = "";
            $dbUser = "root";
            $dbServer = "localhost";
            $dbName = "estefania_noticias";
            

          
            $connection = new PDO("mysql:host=$dbServer;dbname=$dbName", $dbUser, $dbPwd);     
                        
            return $connection;
        }

        function ExecuteQuery($cadena)
        { //$cadena se puede llamar como sea,antes era $query
            $result = null;

            $cnn = $this->connect();
            $result = $cnn->query($cadena); //se tiene que llamar como el de arriba entre ().

            if (count($cnn->errorInfo()) > 0) {
                foreach ($cnn->errorInfo() as $val) {
                    echo $val . "</br>";
                }
            }

            return $result;
        }

        function CheckLogin(){
            if (!isset($_SESSION["identifica"])) {
                header("Location: ".URL_BASE."Usuario/login");
            }
        }
    }
?>