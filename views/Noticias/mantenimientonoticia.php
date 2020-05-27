<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<!-- <link rel=StyleSheet href="CSS/style.css" TYPE="text/css"> -->
<div class="container mb-4">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Categoría</th>
                            <th scope="col">Título</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Borrar</th>
                            <th scope="col">Imagen</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($obtnoti as $val) : ?>
                            <tr>
                                <td><?php echo $val->id; ?></td>
                                <td><?php echo $val->nomcat; ?></td>
                                <td><?php echo $val->titulo; ?></td>
                                <td><?php echo $val->descripcion; ?></td>
                                <td><a class="btn btn-sm btn-warning" href="<?php echo URL_BASE."Noticias/editarNoticia&idnoticia=".$val->id ?>"><i class="fa fa-pencil-square-o"></i> </a> </td>
                                <td><a class="btn btn-sm btn-danger" href="<?php echo URL_BASE."Noticias/eliminarNoticia&idnoticia=".$val->id ?>"><i class="fa fa-trash"></i> </a> </td>
                                <td><img src="<?php echo $val->imagen; ?>"  alt="..." height="150" width="150"></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col mb-2">
            <div class="row">
                <!-- <div class="col-sm-12  col-md-6">
                    <button class="btn btn-block btn-light">Añadir categoría</button>
                </div> -->
                <div class="col-sm-12 col-md-6">
                    <button class="btn btn-lg btn-block btn-success text-uppercase"><a href="<?php echo URL_BASE."Noticias/nuevaNoticia" ?>" style="text-decoration: none; color:blanchedalmond;">Añadir Noticia</a></button>
                </div>
                <div class="col-sm-12 col-md-6">
                    <button class="btn btn-lg btn-block btn-success text-uppercase"><a href="<?php echo URL_BASE . "Usuario/administrar" ?>" style="text-decoration: none; color:blanchedalmond;">Volver a Administrar</a></button>
                </div>
            </div>
        </div>
    </div>
</div>