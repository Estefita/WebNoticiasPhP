
<?php  
    require_once "config/config.php";
    $val = $detal;  
?>    
<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title"><?php echo $val->titulo; ?></h5>
        <img src="<?php echo $val->imagen; ?>"  alt="..." height="250" width="250">
        <!-- class="card-img-top" esto iría dentro del img, pero si lo pongo me pone una altura y ancho por defecto-->
        <p class="card-text"><?php echo $val->descripcion; ?></p>
        <p class="card-text">Nº Visitas: <?php echo $val->numvisit; ?></p>
        <p class="card-text">Valoración Usuarios: <?php echo $val->valoracion; ?></p>
    </div>
</div>


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
<div class="container">
    
	<div class="row justify-content-center">
		<div class="col-12 col-md-8 col-lg-6 pb-5">
                    <!--Form with header-->
                    <form action="<?php echo URL_BASE ?>comentarios/insertComentarios&idnoticia=<?php echo $val->id?>" method="post">
                        <div class="card border-primary rounded-0">
                            
                            <div class="card-body p-3">
                            <!--Body-->
                             <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-comment text-info"></i></div>
                                        </div>
                                        <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Escribe tu Comentario" required></textarea>
                                    </div>
                                </div>                                
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Enviar</button>
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
