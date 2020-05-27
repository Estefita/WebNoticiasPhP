<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
<div class="container">
    <h2 class="text-center"> </h2>
	<div class="row justify-content-center">
		<div class="col-12 col-md-8 col-lg-6 pb-5">


                    <!--Form with header-->

                    <form action="editarCategoria" method="post">
                        <div class="card border-success rounded-0">
                            <div class="card-header p-0">
                                <div class="bg-success text-white text-center py-2">
                                    <h3><i class="fa fa-pencil-square-o"></i> Editar Categoría</h3>
                                </div>
                            </div>
                            <div class="card-body p-3">

                                <!--Body-->
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-pencil-square-o"></i>Nombre Categoría</div>
                                        </div>
                                        <input type="text" class="form-control" id="nomcat" name="nomcat" placeholder="Nombre Categoria" required=""  value="<?php echo $cateinst->nomcat; ?>" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-pencil-square-o"></i>Imagen Categoría</div>
                                        </div>
                                        <input type="text" class="form-control" id="imagen" name="imagen" placeholder="Url imagen"  value="<?php echo $cateinst->imagen; ?>" >
                                    </div>
                                </div>
                                <input type="hidden" name="idcat" value="<?php echo $idcat ?>">
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
                    <div class="col-sm-12 col-md-12">
                        <button class="btn btn-lg btn-block btn-success text-uppercase" style="margin-top:100px"><a href="<?php echo URL_BASE."Categorias/listacategoria" ?>" style="text-decoration: none; color:blanchedalmond;">Volver a Categorias</a></button>
                    </div>

                </div>
	</div>
</div>