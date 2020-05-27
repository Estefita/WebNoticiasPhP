<?php 
   require_once "controllers/NoticiasController.php";
  require_once "Datos/Noticias/NoticiasDatos.php";
 
?>
<H1>Noticias visitadas</H1>

<div class="card-group">
    <?php
        foreach ($masvisit as $val): 
            require 'views/Noticias/fichaNoticias.php';
        endforeach;
    ?> 
</div>
<nav aria-label="Page navigation example">
  <ul class="pagination">
        

        <?php if($pageno==1): ?>  
        <li class="page-item disabled"><a class="page-link" href="<?php echo "&pageno=1" ?>">Anterior</a></li>
      <?php else: ?>  
        <li class="page-item"><a class="page-link" href="<?php echo "masVisitadas&pageno=" . ($pageno - 1) ?>">Anterior</a></li>
      <?php endif; ?>

      <?php for($i=1; $i<=$paginas;$i++): ?>
        <?php if($pageno==$i):?>
          <li class="page-item active"><a class="page-link" href="<?php echo "masVisitadas&pageno=".$i ?>"><?php echo $i ?></a></li>
        <?php else: ?>
          <li class="page-item"><a class="page-link" href="<?php echo "masVisitadas&pageno=".$i ?>"><?php echo $i ?></a></li>
        <?php endif; ?>
        <?php endfor; ?>  
       
       <?php if($pageno == $paginas): ?>
        <li class="page-item disabled"><a class="page-link" href="#">Siguiente</a></li>
      <?php else : ?> 
        <li class="page-item"><a class="page-link" href="masVisitadas&pageno=<?php echo ($pageno + 1) ?>">Siguiente</a></li>
      <?php endif; ?>
      
  </ul>
</nav>