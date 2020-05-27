<h1>TOP 5  de las Noticias mas leidas</h1>
<div class="card-group">
    <?php
        foreach ($masleida as $val):
            require 'views/Noticias/fichaNoticias.php';
        endforeach;
    ?> 
</div>