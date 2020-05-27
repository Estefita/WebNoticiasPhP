<?php 
  require_once "controllers/BaseController.php";
  require_once "controllers/UsuarioController.php";
  require_once "models/Usuarios/UsuarioModel.php";
  require_once "Datos/Usuarios/UsuariosDatos.php";
?>
<div class="col-12 col-md-8 col-lg-6 pb-5" style="margin:auto; margin-top:100px;" >
  <button class="btn btn-lg btn-block btn-success text-uppercase"><a href="<?php echo URL_BASE ."Noticias/listanoticia"?>" style="text-decoration: none; color:blanchedalmond;">Noticias</a></button>
  <button class="btn btn-lg btn-block btn-success text-uppercase"><a href="<?php echo URL_BASE ."Categorias/listacategoria"?>" style="text-decoration: none; color:blanchedalmond;">Categorías</a></button>
</div>