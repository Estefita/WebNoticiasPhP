<h1>TOP 5  de las Noticias menos leidas</h1>
<div class="card-group">
    <?php
        foreach ($menosleida as $val):
            require 'views/Noticias/fichaNoticias.php';
        endforeach;
    ?> 
</div>