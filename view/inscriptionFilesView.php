<?php ob_start(); ?>

<h1> page de chargement des fichiers</h1>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-4 bg-dark rounded px-4">
            <h4 class="text-center text-light p-1">Envoyer une fiche d'inscription</h4>
            <form action="index.php?action=addInscriptionFile" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="text" name="fileName" class="form-control p-1" placeholder="Nom du fichier" required>
                </div>
                <div class="form-group">
                    <input type="file" name="pdf_file" class="form-control p-1" required>
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

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>