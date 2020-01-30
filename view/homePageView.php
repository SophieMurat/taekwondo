


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
    <li data-target="#myCarousel" data-slide-to="<?php echo $count;?>" class="<?php echo $actives;?>"></li>
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
    <div class="carousel-item <?php echo $actives ?>" id="slider" style="max-height: 600px">
      <img class="d-block w-100" src="<?php echo $row->getImage_path(); ?>" alt="taekwondo">
      <div class="carousel-caption d-none d-md-block">
        <h4><?php echo $row->getImage_title()?></h4>
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
<div class="container">
  <div class="jumbotron row text-center">
    <h2 class="col-lg-12">Cours Jeune 1(3ans)</h2>
    <p class="col-lg-12">Lieu: dojo Les Amonts</p>
    <p class="col-lg-12">Horaires: 9h30 à 10h25 samedi</p>
  </div>
  <div class="jumbotron row text-center">
    <h2 class="col-lg-12">Cours Jeune 2(4ans)</h2>
    <p class="col-lg-12">Lieu: dojo Les Amonts</p>
    <p class="col-lg-12">Horaires: 10h25 à 11h20 samedi</p>
  </div>
  <div class="jumbotron row text-center">
    <h2 class="col-lg-12">Enfants 5/6ans</h2>
    <p class="col-lg-12">Lieu: dojo Les Amonts(samedi) et Salle A-Gymnase les Amonts(Mercredi)</p>
    <p class="col-lg-12">Horaires: 11h20 à 12h15 samedi et 17h à 17h55 mercredi</p>
  </div>
  <div class="jumbotron row text-center">
    <h2 class="col-lg-12">Enfants 7/8ans</h2>
    <p class="col-lg-12">Lieu: dojo Les Amonts(samedi) et Salle Polyvalente-Gymnase les Amonts(Mercredi)</p>
    <p class="col-lg-12">Horaires: 14h à 15h samedi et 18h à 19h mercredi</p>
  </div>
  <div class="jumbotron row text-center">
    <h2 class="col-lg-12">Enfants 9/12ans</h2>
    <p class="col-lg-12">Lieu: dojo Les Amonts</p>
    <p class="col-lg-12">Horaires: 15h à 16h samedi et 18h à 19h15 mardi</p>
  </div>
  <div class="jumbotron row text-center">
    <h2 class="col-lg-12">Enfants 13/16ans</h2>
    <p class="col-lg-12">Lieu: dojo Les Amonts(samedi) et Salle Polyvalente-Gymnase les Amonts(Mercredi)</p>
    <p class="col-lg-12">Horaires: 15h à 16h samedi et 19h05 à 20h15 mercredi</p>
  </div>
  <div class="jumbotron row text-center">
    <h2 class="col-lg-12">A partir de 16ans</h2>
    <h3 class="col-lg-12">Cours</h3>
    <p class="col-lg-12">Lieu: dojo Les Amonts(marddi) et Salle A-Gymnase les Amonts(Jeudi)</p>
    <p class="col-lg-12">Horaires: 20h30 à 22h</p>
    <h3 class="col-lg-12">Loisirs en 2 groupes G1 et G2</h3>
    <p class="col-lg-12">Lieu: Salle A-Polyvalente les Amonts(G1-Mercredi et Vendredi) et Les Bathes(G2-Dimanche)</p>
    <p class="col-lg-12">Horaires: 20h30 à 22h(mercredi),20h à 22h(Vendredi) et 14h à 15h30(Dimanche)</p>
    <h3 class="col-lg-12">Mise en forme + de 18 ans</h3>
    <p class="col-lg-12">Lieu: Salle de musculation Gymnase les Amonts</p>
    <p class="col-lg-12">Horaires: 20h30 à 22h(mercredi),14h30 à 16h30(Jeudi),17h à 22h(vendredi) et 9h30-12h30 et 14h-17h(Dimanche)</p>
  </div>
  <div class="jumbotron row text-center">
    <a class="btn btn-info" href="events" role="button">Voir les évènements</a>
  </div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>