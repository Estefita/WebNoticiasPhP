<h1>TOP 5  de las Noticias mas recientes</h1>
<div class="card-group">
    <?php
        foreach ($masrec as $val):
            require 'views/Noticias/fichaNoticias.php';
        endforeach;
    ?> 
</div>