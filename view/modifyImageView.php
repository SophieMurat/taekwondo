<?php ob_start(); ?>
<div class="container-fluid">
  <div class="row jumbotron justify-content-center">
    <div class="col-lg-4 bg-dark rounded px-4">
    <h4 class="text-center text-light p-1">Modifiez l'image sélectionnée</h4>
    <form action="updateImage/<?php echo $_GET['id']?>" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <input type="text" name="title" class="form-control p-1" value="<?php echo $imageModify->getImage_title()?>" required>
      </div>
      <div class="form-group">
        <input type="file" name="image" class="form-control p-1" required>
      </div>
      <div class="form-group">
        <input type="submit" name="upload" class="btn btn-warning btn-block" 
        value="Télécharger l'image">
      </div>
      <div class="form-group">
        <h5 class="text-center text-light"><?php echo $this->msg; ?></h5>
      </div>
    </form>
    </div>
  </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>