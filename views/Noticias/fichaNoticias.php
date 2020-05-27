<div class="card" style="width: 18rem;">
    <img src="<?php echo $val->imagen; ?>"  alt="..." height="250" width="250">
    <!-- class="card-img-top" esto iría dentro del img, pero si lo pongo me pone una altura y ancho por defecto-->
    <div class="card-body">
        <p class="card-text"><?php echo $val->nomcat; ?></p>
        <h5 class="card-title"><?php echo $val->titulo; ?></h5>
        <!-- <img src="<?php echo $val->imagen; ?>" class="card-img-top" alt="..."> -->
        <p class="card-text"><?php echo $val->descripcion; ?></p>
        <p class="card-text">Nº Visitas: <?php echo $val->numvisit; ?></p>
        <p class="card-text">Valoración Usuarios: <?php echo $val->valoracion; ?></p>
        

        <a href="<?php echo URL_BASE . "Detalle/detalle&idnoticia=" . $val->id ?>" class="btn btn-primary">Detalles</a>
    </div>
</div>