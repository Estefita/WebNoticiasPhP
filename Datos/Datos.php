<?php
    require_once 'controllers/BaseController.php';
    require_once 'Datos/Noticias/NoticiasDatos.php';

    class datos extends BaseController{ 

        #region Cargar Noticias
        public function CargarNoticiasTotal(){

            $query= "SET GLOBAL foreign_key_checks = 0";
            $this->ExecuteQuery($query);
            $this->cargarCategoria();
            $this->cargarNoticia();     
            $this->cargarMenu();
            $this->cargarUsuario();       
            $query = "SET GLOBAL foreign_key_checks = 1";
            $this->ExecuteQuery($query);
        }

        #endregion

        #region Noticia
        function cargarNoticia(){
            $truncate = "TRUNCATE TABLE noticias";
            $this->ExecuteQuery($truncate);

            $cadena = $this->insertarNoticia("Futbolista se lesiona","https://www.lavanguardia.com/r/GODO/LV/p6/WebSite/2019/10/19/Recortada/1181669209_20191017192520-kwgC-DHLANB1O9E2LN8BK-992x558@LaVanguardia-Web.jpg",9,5,1);
            $this->ExecuteQuery($cadena);

            $cadena = $this->insertarNoticia("Gana al tenis","https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRWgTY0LR1-UEF04S4ypQZcqtuVR-IUgfcvAq8TCKET-pYwugX1",20,5,2);
            $this->ExecuteQuery($cadena);

            /* $cadena = $this->insertarNoticia();
            $this->ExecuteQuery($cadena);

            $cadena = $this->insertarNoticia();
            $this->ExecuteQuery($cadena); */

            
        }
        

        function insertarNoticia($titulo,$imagen, $numvisit,$valoracion,$idcategoria){
            $descripcion = 'Lorem ipsum dolor sit amet consectetur adipiscing elit facilisis nisi aliquet ultrices vitae mattis phasellus inceptos diam sed, nostra dis non netus platea bibendum pharetra cum penatibus natoque augue potenti cursus nec neque.';
            $query = "INSERT INTO noticias (titulo,descripcion,imagen,numvisit,valoracion,idcategoria,fechaalta) VALUES ('{$titulo}','{$descripcion}','{$imagen}',{$numvisit},{$valoracion},{$idcategoria},Now());";
            return $query;

        }


        #endregion

        #region Categoria
        function cargarCategoria(){
            $truncate = "TRUNCATE TABLE categorias";
            $this->ExecuteQuery($truncate);

            $cadena = $this->insertarCategoria("Futbol","https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQHa1rX1dO_d-rxD8kS4v5GxFKWJCrcXJMcXS-vIl-mlHoomqjg");
            $this->ExecuteQuery($cadena);

            $cadena = $this->insertarCategoria("Tenis","https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRgz6uvJDKxJBS6kJjVHtyRrz13BIz-lOhU1RZqlVa4VK4ztQz9");
            $this->ExecuteQuery($cadena);   
        }

        function insertarCategoria($nomcat,$imagen){
            $query = "INSERT INTO categorias (nomcat,imagen,fechaalta) VALUES ('{$nomcat}','{$imagen}',Now());";
            return $query;
        }

        #endregion

        #region Menu
        
        function cargarMenu(){            
            $query = "TRUNCATE TABLE menu";
            $this->ExecuteQuery($query);

            $cadena = $this->insertarMenu(1,"Home","home/index");
            $this->ExecuteQuery($cadena);

            $cadena = $this->insertarMenu(1,"Categorias", "categorias/categorias");
            $this->ExecuteQuery($cadena);

            $cadena = $this->insertarMenu(1,"Noticias visitadas","noticias/index");
            $this->ExecuteQuery($cadena);

            $cadena = $this->insertarMenu(1,"Contacto","Usuario/index");
            $this->ExecuteQuery($cadena);

            //return $cadena;
        }

        function insertarMenu($idMenu,$nombre,$href){
            return "insert into menu (idMenu, nombre, href) values ({$idMenu},'{$nombre}','{$href}')";                        
        }

        #endregion

        #region Usuario
        function cargarUsuario()
        {
            $truncate = "TRUNCATE TABLE usuarios";
            $this->ExecuteQuery($truncate);

            $cadena = $this->insertarUsuario("Maripili","Contreras Pelaez","maripi@hotmail.com","12345");
            $this->ExecuteQuery($cadena);

            $cadena = $this->insertarUsuario("Jose","González Jimenez","Jose@hotmail.com","12345");
            $this->ExecuteQuery($cadena);

            $cadena = $this->insertarUsuario("Maria","Gutierrez Martin","maria@hotmail.com","12345",);
            $this->ExecuteQuery($cadena);
        }


        function insertarUsuario($nombre, $apellidos, $email, $password)
        {
            $query = "INSERT INTO usuarios (nombre, apellidos, email, `password`, fechaalta) VALUES ('{$nombre}', '{$apellidos}','{$email}','{$password}',Now());";
            return $query;
        }


        #endregion
        
        function ExecuteQuery($cadena){ //$cadena se puede llamar como sea,antes era $query
            $result=null;
            
            $cnn = $this->connect();                     
            $result = $cnn->query($cadena);//se tiene que llamar como el de arriba entre ().
            
            if(count($cnn->errorInfo())>0){
                foreach($cnn->errorInfo() as $val){
                    echo $val."</br>";
                }
            }
            
            return $result;
                                         
        }
    }
?>