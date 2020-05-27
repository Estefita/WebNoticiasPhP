

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script type="text/javascript">

var expr = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-\.]+$/;
    $(document).ready(function(){
        $("#enviar").click(function(){
            var nombre = $("#nombre").val();
            var apellidos = $("#apellidos").val();
            var email = $("#email").val();
            var password = $("#password").val();

            if(nombre == ""){
                alert("Debe introducir un nombre");
                return false;
            }
            if(apellidos == ""){
                alert("Debe introducir los apellidos");
                return false;
            }
            if(email == "" || expr.test(email)){
                    alert("Debe introducir el correo correctamente");
                    return false;
            }
            if(password = "" || password.value.length<5){
                        alert("EL password debe tener almenos 5 caracteres.");
                        return false;
            }
        });
    }); 
</script>




<div class="container">
    <h2 class="text-center">Formulario de Registro</h2>
	<div class="row justify-content-center">
		<div class="col-12 col-md-8 col-lg-6 pb-5">
 <!--Form with header-->

<form id="registrar" action="registrar" method="post">
                        <div class="card border-primary rounded-0">
                            <div class="card-header p-0">
                                <div class="bg-info text-white text-center py-2">
                                    <h3><i class="fa fa-user"></i> Regístrate</h3>
                                </div>
                            </div>
                            <div class="card-body p-3">

                                <!--Body-->
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-user text-info"></i></div>
                                        </div>
                                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-user text-info"></i></div>
                                        </div>
                                        <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-envelope text-info"></i></div>
                                        </div>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="ejemplo@gmail.com">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-lock text-info"></i></div>
                                        </div>
                                        <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-lock text-info"></i></div>
                                        </div>
                                        <input type="password" name="password2" id="password2" class="form-control" placeholder="Repetir contraseña">
                                    </div>
                                </div>

                                <div class="text-center">
                                    <!-- <button type="submit" id="enviar" class="btn btn-primary" onclick="validar()">Enviar</button> -->
                                    <input type="submit" id="enviar" value="Enviar" class="btn btn-info btn-block rounded-0 py-2" onsubmit="return validar()">
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
