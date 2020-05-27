<?php
    require_once "config/config.php";
    require_once "models/Usuarios/UsuarioModel.php";

    if(isset($_SERVER["QUERY_STRING"])){
        parse_str($_SERVER["QUERY_STRING"], $query_array);
       // print_r($query_array);
        $controller="home";
        if(array_key_exists("controller", $query_array)){
            $controller = $query_array["controller"];
        }
        $action = "index";
        if (array_key_exists("action",$query_array)) {
            $action = $query_array["action"];
        }
        if (!(($controller=="Usuario")&&($action=="login"))){
            $_SESSION["controller"] = $controller;
            $_SESSION["action"] = $action;
        }        
    }
?>
<header>
<nav class="navbar navbar-expand-lg navbar-light bg-primary">
  <a class="navbar-brand" href="#">Logo</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URL_BASE . "Home/index"; ?>">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URL_BASE . "Categorias/categorias" ?>">Categorías</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URL_BASE . "Noticias/masVisitadas" ?>">Noticias visitadas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URL_BASE . "Usuario/contacto" ?>">Contacto</a>
      </li>
      <li class="nav-item">
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Buscador noticias" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
        </form>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Idioma
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Español</a>
          <a class="dropdown-item" href="#">English</a>
        </div>
      </li>
    </ul>

    <ul class="navbar-nav d-flex justify-content-end">
        <li class="nav-item">
            <?php if (!isset($_SESSION["identifica"])) : ?>
                        <a class="nav-link" href="<?php echo URL_BASE . "Usuario/registrar" ?>">Registrarse</a>
            <?php endif; ?>
        </li>
    </ul>

    <ul class="navbar-nav d-flex justify-content-end">
        <li class="nav-item">
            <?php if (!isset($_SESSION["identifica"])) : ?>
                        <a class="nav-link" href="<?php echo URL_BASE . "Usuario/login" ?>">Login</a>
                    <?php else : ?>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php $identifica = $_SESSION["identifica"];
                                echo $identifica->nombre;  ?>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="<?php echo URL_BASE . "Usuario/administrar" ?>">Administrar</a>
                                <a class="dropdown-item" href="<?php echo URL_BASE . "Usuario/perfil" ?>">Perfil</a>
                                <a class="dropdown-item" href="<?php echo URL_BASE . "Usuario/cerrarSesion" ?>">Cerrar sesión</a>
                            </div>
                        </div>
                    <?php endif; ?>
        </li>
    </ul>
  </div>
</nav>
</header>
