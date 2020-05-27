<?php require_once "config/config.php"; ?>
<?php foreach ($coment as $val) : ?>
    <div> Comentario de : <?php echo $val->nombreUsuario; ?> </div>
    <div> Fecha : <?php echo $val->fechaalta; ?> </div>
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <p class="card-text"><?php echo $val->descripcion; ?></p>
        </div>
    </div>
<?php endforeach ?>

