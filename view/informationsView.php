

<?php ob_start(); ?>

<h1>Fiches d'inscription</h1>

<?php
while($data = $inscriptionFiles->fetch()){?>
     <p> <?=$data['title_file'];?> : <a href ="<?=$data['file_url'];?>">Télécharger</a></p>
 <?php 
 }
 $inscriptionFiles->closeCursor();
?>
<div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-4 bg-dark rounded px-4">
            <h4 class="text-center text-light p-1">Renvoyer la fiche d'inscription signée</h4>
                <form action="sendInscriptionFile" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control p-1" placeholder="Nom de l'inscrit" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="firstname" class="form-control p-1" placeholder="Prénom de l'inscrit" required>
                    </div>
                    <div class="form-group">
                        <label class="text-center text-light p-1">Choisissez le type de fichier à renvoyer :
                            <select name="category" class="form-control p-1" id="category">
                                <?php while ($category=$categories->fetch()) {?>
                                <option
                                value="<?= $category['id']?>"><?= $category['category_name']?></option>
                            <?php } ?>
                            </select>
                        </label>
                    </div>
                    <div class="form-group">
                        <input type="file" name="adherent_file" class="form-control p-1" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="upload" class="btn btn-warning btn-block" 
                        value="Envoyer le fichier">
                    </div>
                    <div class="form-group">
                        <h5 class="text-center text-light"><?= $this->msg; ?></h5>
                    </div>
                </form>
            </div>
        </div>
    </div>


<?php $content = ob_get_clean();?>

<?php require('template.php'); ?>