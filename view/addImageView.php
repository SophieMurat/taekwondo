<?php ob_start(); ?>
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-lg-4 bg-dark rounded px-4">
    <h4 class="text-center text-light p-1">Choisissez une image à ajouter</h4>
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
        <h5 class="text-center text-light"><?= $this->msg; ?></h5>
      </div>
    </form>
    </div>
  </div>
</div>

<!-- Affichage de toutes les images pour pouvoir les modifier ou les supprimer-->
<div class="container">

  <h1 class="font-weight-light text-center text-lg-left mt-4 mb-0">Actions sur les images du slider</h1>

  <hr class="mt-2 mb-5">

  <div class="row text-center text-lg-left">
    <?php 
    foreach($slides as $slide):?>
    <div class="col-lg-3 col-md-4 col-6">
            <img class="img-fluid img-thumbnail" src="<?= $slide['image_path'];?>" alt="Taekwondo">
            <a href="modifyImage/<?=$slide['id']?>"><button type="button" class="btn btn-primary">Modifier</button></a>
            <a href="deleteImage/<?=$slide['id']?>"><button type="button" class="btn btn-danger">Supprimer</button></a>
    </div>
    <?php endforeach?>
  </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>