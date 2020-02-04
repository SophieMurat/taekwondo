


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
    <div class="carousel-item <?php echo $actives ?>">
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
    <h1 class="col-lg-12">Informations sur les cours</h1>
    <nav class="navbar bg-dark navbar-toggler mx-auto">
    <ul class="nav nav-pills col-lg-12">
      <li class="nav-item">
        <a class="nav-link text-light" href="index.php#jeune">3/4ans</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="index.php#enfant5">5/6ans</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="index.php#enfant7">7/8ans</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="index.php#enfant9">9/12ans</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="index.php#enfant13">13/16ans</a>
      </li>
      <li class="nav-item" id="jeune">
        <a class="nav-link text-light" href="index.php#adultes">+ de 16ans</a>
      </li>
    </ul>
    </nav>
  </div>
  <div class="jumbotron row text-center">
    <div class="col-lg-6">
      <h2 class="col-lg-12">Cours Jeune 1 (3ans)</h2>
      <p class="col-lg-12"><i class="fas fa-map-marker-alt"></i><span class="ml-1">Lieu: dojo Les Amonts</span></p>
      <p class="col-lg-12"><i class="far fa-clock"></i><span class="ml-1">Horaires: 9h30 à 10h25 samedi</span></p>
    </div>
    <div class="col-lg-6">
      <h2 class="col-lg-12">Cours Jeune 2 (4ans)</h2>
      <p class="col-lg-12"><i class="fas fa-map-marker-alt"></i><span class="ml-1">Lieu: dojo Les Amonts<span class="ml-1"></p>
      <p class="col-lg-12" id="enfant5"><i class="far fa-clock"></i><span class="ml-1">Horaires: 10h25 à 11h20 samedi</span></p>
    </div>
  </div>
  <div class="jumbotron row text-center">
    <h2 class="col-lg-12">Enfants 5/6ans</h2>
    <p class="col-lg-12"><i class="fas fa-map-marker-alt"></i><span class="ml-1">Lieu: dojo Les Amonts(samedi) et Salle A-Gymnase les Amonts(Mercredi)</span></p>
    <p class="col-lg-12" id="enfant7"><i class="far fa-clock"></i><span class="ml-1">Horaires: 11h20 à 12h15 samedi et 17h à 17h55 mercredi</span></p>
  </div>
  <div class="jumbotron row text-center" id="enfant9">
    <h2 class="col-lg-12">Enfants 7/8ans</h2>
    <p class="col-lg-12"><i class="fas fa-map-marker-alt"></i><span class="ml-1">Lieu: dojo Les Amonts(samedi) et Salle Polyvalente-Gymnase les Amonts(Mercredi)</span></p>
    <p class="col-lg-12"><i class="far fa-clock"></i><span class="ml-1">Horaires: 14h à 15h samedi et 18h à 19h mercredi</span></p>
  </div>
  <div class="jumbotron row text-center" id="enfant13">
    <h2 class="col-lg-12">Enfants 9/12ans</h2>
    <p class="col-lg-12"><i class="fas fa-map-marker-alt"></i><span class="ml-1">Lieu: dojo Les Amonts</span></p>
    <p class="col-lg-12"><i class="far fa-clock"></i><span class="ml-1">Horaires: 15h à 16h samedi et 18h à 19h15 mardi</span></p>
  </div>
  <div class="jumbotron row text-center">
    <h2 class="col-lg-12">Enfants 13/16ans</h2>
    <p class="col-lg-12"><i class="fas fa-map-marker-alt"></i><span class="ml-1">Lieu: dojo Les Amonts(samedi) et Salle Polyvalente-Gymnase les Amonts(Mercredi)</span></p>
    <p class="col-lg-12" id="adultes"><i class="far fa-clock"></i><span class="ml-1">Horaires: 16h à 17h samedi et 19h05 à 20h15 mercredi</span></p>
  </div>
  <div class="jumbotron row text-center">
    <h2 class="col-lg-12">A partir de 16ans</h2>
    <h3 class="col-lg-12"><u>Cours: </u></h3>
    <p class="col-lg-12"><i class="fas fa-map-marker-alt"></i><span class="ml-1">Lieu: dojo Les Amonts(marddi) et Salle A-Gymnase les Amonts(Jeudi)</span></p>
    <p class="col-lg-12"><i class="far fa-clock"></i><span class="ml-1">Horaires: 20h30 à 22h</span></p>
    <h3 class="col-lg-12"><u>Loisirs en 2 groupes G1 et G2: </u></h3>
    <p class="col-lg-12"><i class="fas fa-map-marker-alt"></i><span class="ml-1">Lieu: Salle A-Polyvalente les Amonts(G1-Mercredi et Vendredi) et Les Bathes(G2-Dimanche)</span></p>
    <p class="col-lg-12"><i class="far fa-clock"></i><span class="ml-1">Horaires: 20h30 à 22h(mercredi),20h à 22h(Vendredi) et 14h à 15h30(Dimanche)</span></p>
    <h3 class="col-lg-12"><u>Mise en forme + de 18 ans:</u></h3>
    <p class="col-lg-12"><i class="fas fa-map-marker-alt"></i><span class="ml-1">Lieu: Salle de musculation Gymnase les Amonts</span></p>
    <p class="col-lg-12"><i class="far fa-clock"></i><span class="ml-1">Horaires: 20h30 à 22h(mercredi),14h30 à 16h30(Jeudi),17h à 22h(vendredi) et 9h30-12h30 et 14h-17h(Dimanche)</span></p>
  </div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>