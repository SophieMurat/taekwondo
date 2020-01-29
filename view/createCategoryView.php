<?php ob_start(); ?>
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-lg-4 bg-dark rounded px-4">
    <h4 class="text-center text-light p-1">Ajouter une nouvelle catégorie</h4>
    <form action="createCategory" method="post">
      <div class="form-group">
        <input type="text" name="category" class="form-control p-1" placeholder="Ecrire la nouvelle catégorie" required>
      </div>
      <div class="form-group">
        <input type="submit" name="create" class="btn btn-warning btn-block" 
        value="Créer">
      </div>
      <div class="form-group">
        <h5 class="text-center text-light"><?= $this->msg; ?></h5>
      </div>
    </form>
    </div>
  </div>
  <div class="row justify-content-center" id="list" style="margin-top:10%">
    <div class="col-lg-4 bg-dark rounded px-4">
        <h4 class="text-center text-light p-1">Liste des catégories</h4>
        <?php foreach($categories as $category):?>
            <div>
                <p class="text-light text-center"><?= $category->getCategory_name()?></p>
                    <a href="deleteCategory/<?=$category->getId() ?>">
                      <button class="btn btn-warning">Supprimer</button>
                    </a>
            </div>
        <?php endforeach;?>
    </div>
  </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>