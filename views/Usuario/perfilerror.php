<?php 
  require_once "controllers/BaseController.php";
  require_once "controllers/UsuarioController.php";
  require_once "models/Usuarios/UsuarioModel.php";
  require_once "Datos/Usuarios/UsuariosDatos.php";
?>
 
<form class="form-signin" action="modificar" method="POST">

<!-- Form Name -->
<h1 class="h3 mb-3 font-weight-normal">Perfil</h1>

<label class="col-md-4 control-label" for="nombre">Nombre</label> 
<input id="nombre" name="nombre" type="text" placeholder="" class="form-control input-md" required="" value="" >

<!-- <label class="col-md-4 control-label" for="apellido">Apellido</label>  
<input id="apellido" name="apellido" type="text" placeholder="" class="form-control input-md" required=""> -->

<label class="col-md-4 control-label" for="mail1">Email</label>  
<input id="mail1" name="email" type="text" placeholder="" class="form-control input-md" required="" value="">
  
<!-- Text input-->
<!-- <div class="form-group">
  <label class="col-md-4 control-label" for="mail2">Confirme Correo Electronico</label>  
  <div class="col-md-4">
  <input id="mail2" name="mail2" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div> -->

<!-- Password input-->
<label>Error</label>
<label class="col-md-4 control-label" for="contra">Contraseña</label>
<input id="contra" name="contra" type="password" placeholder="" class="form-control input-md" required="" value="">
    
<!-- Password input-->

<label class="col-md-4 control-label" for="contra2">Confirmar_Contraseña</label>
<input id="contra2" name="contra2" type="password" placeholder="" class="form-control input-md" required="">
<!-- <h3>Las claves deben ser iguales.</h3> -->
<!-- Button -->
<label class="col-md-4 control-label" for="registrar"></label>
<button type="submit" class="btn btn-primary">Guardar</button>
</form>