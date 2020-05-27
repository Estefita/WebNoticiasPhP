<?php require_once "config/config.php"; ?>

<div class="card" style="width: 18rem;">
    <div class="card-body">
        <p class="card-text"><?php echo $val->nomcat; ?></p>
        <a href="<?php echo URL_BASE . "Noticias/notcat&idcategoria=" . $val->id; ?>"><img src="<?php echo $val->imagen; ?>"  alt="..." height="250" width="250"></a>
        <!-- class="card-img-top" le quito la class a imagen, si no me la pone muy grande -->
        <p class="card-text">Nº Visitas: <?php echo $val->numvisit; ?></p>
        <!-- <p class="card-text">Valoración Usuarios: <?php echo $val->valoracion; ?></p> -->
    </div>
</div>
