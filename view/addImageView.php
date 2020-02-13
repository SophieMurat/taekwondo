<?php ob_start(); ?>
<h1 class="mt-5 text-center">Gestion des images pour le slider</h1>
<div class="container">
  <div class="row jumbotron justify-content-center">
    <div class="col-lg-4 bg-dark rounded px-4">
    <h4 class="text-center text-light p-1">Envoyer une nouvelle image</h4>
    <form action="addImage" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <input type="text" name="title" class="form-control p-1" placeholder="Veuillez indiquer le titre de l'image" required>
      </div>
      <div class="form-group">
        <input type="file" name="image" class="form-control p-1" required>
      </div>
      <div class="form-group">
        <input type="submit" name="upload" class="btn btn-warning btn-block" 
        value="Télécharger l'image">
      </div>
      <div class="form-group">
        <h5 class="text-center text-danger"><?php echo $this->msg; ?></h5>
      </div>
    </form>
    </div>
  </div>
</div>

<!-- Affichage de toutes les images pour pouvoir les modifier ou les supprimer-->
<div class="container">
  <div class="jumbotron row text-center">
    <h2 class="font-weight-light text-center mb-5 col-lg-12">Actions sur les images du slider</h2>

    <div class="row text-center text-lg-left" id="gallery">
      <?php 
      foreach($slides as $slide):?>
      <div class="col-lg-3 col-md-4 col-6 text-center">
              <h3><?php echo $slide->getImage_title();?></h3>
              <img class="img-fluid img-thumbnail" src="<?php echo $slide->getImage_path();?>" alt="Taekwondo">
              <a class="btn btn-danger justify-content-around mt-1" href="deleteImage/<?php echo $slide->getId()?>" role="button">Supprimer</a>
      </div>
      <?php endforeach?>
    </div>
  </div>
  <div class="col-lg-12 d-flex justify-content-center mb-2">
        <a class="btn btn-success" href="admin" role="button">Retour accueil admin</a>
  </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>