<?php 
  require_once "controllers/BaseController.php";
  require_once "controllers/UsuarioController.php";
  require_once "models/Usuarios/UsuarioModel.php";
  require_once "Datos/Usuarios/UsuariosDatos.php";

?>
 


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
<div class="container">
    <h2 class="text-center">Formulario Perfil</h2>
	<div class="row justify-content-center">
		<div class="col-12 col-md-8 col-lg-6 pb-5">


                    <!--Form with header-->

                    <form action="modificar" method="post">
                        <div class="card border-primary rounded-0">
                            <div class="card-header p-0">
                                <div class="bg-info text-white text-center py-2">
                                    <h3><i class="fa fa-user"></i> Perfil</h3>
                                </div>
                            </div>
                            <div class="card-body p-3">

                                <!--Body-->
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-user text-info"></i></div>
                                        </div>
                                        <input id="nombre" name="nombre" type="text" placeholder="" class="form-control input-md" required="" value="<?php echo $userinst->nombre; ?>" >
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-envelope text-info"></i></div>
                                        </div>
                                        <input id="mail1" name="email" type="text" placeholder="" class="form-control input-md" required="" value="<?php echo $userinst->email; ?>" readonly onmousedown="return false">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-lock text-info"></i></div>
                                        </div>
                                        <input id="contra" name="contra" type="password" placeholder="" class="form-control input-md" required="" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-lock text-info"></i></div>
                                        </div>
                                        <input id="contra2" name="contra2" type="password" placeholder="" class="form-control input-md" required="">
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                    <!-- <input type="submit" value="Enviar" class="btn btn-info btn-block rounded-0 py-2"> -->
                                    <?php if(isset($mensaje)): ?>
                                        <div style="color:green"><?php echo $mensaje; ?></div>  
                                    <?php endif ?>
                                </div>
                            </div>

                        </div>
                    </form>
                    <!--Form with header-->


                </div>
	</div>
</div>