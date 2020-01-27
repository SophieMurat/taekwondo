


<?php ob_start(); ?>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
  <?php 
  $count =0;
  foreach ($slides as $row):
    $actives ='';
    if($count == 0):
      $actives = 'active';
    endif;
  ?>
    <li data-target="#myCarousel" data-slide-to="<?= $count;?>" class="<?= $actives;?>"></li>
    <?php $count++; 
    endforeach;
    ?>
  </ol>
<!-- Wrapper for slides -->
<div class="carousel-inner">
    <?php 
    $count =0;
    foreach ($slides as $row):
      $actives ='';
      if($count == 0):
        $actives = 'active';
      endif;
    ?>
    <div class="carousel-item <?= $actives ?>">
      <img class="d-block w-100" src="<?= $row['image_path']; ?>" alt="taekwondo">
      <div class="carousel-caption d-none d-md-block">
        <h4><?= $row['image_title'];?></h4>
      </div>
    </div>
    <?php $count++; 
    endforeach;
    ?>
  </div>

  <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>