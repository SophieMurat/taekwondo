<?php ob_start(); ?>

<h1> page de chargement des fichiers</h1>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-4 bg-dark rounded px-4">
            <h4 class="text-center text-light p-1">Envoyer une fiche d'inscription</h4>
            <form action="addInscriptionFile" method="post" enctype="multipart/form-data">
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

<h1>Fichiers renvoyés par les adhérents</h1>

<div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-4 bg-dark rounded px-4">
                <h4 class="text-center text-light p-1">Choix du type de fichier</h4>
                <form action="addInscriptionFileChoice" method="post">
                    <div class="form-group">
                        <select name="category" class="form-control p-1" id="category">
                        <?php while ($category=$categories->fetch()):?>
                            <option <?php if(isset($_POST['fileCategory'])):
                                if($category['id'] == $_POST['category']) echo "selected='selected'"; 
                            endif;?>
                            value="<?= $category['id']?>"><?= $category['category_name']?>
                            </option>
                        <?php endwhile;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="fileCategory" class="btn btn-warning btn-block" 
                        value="Choisir cette catégorie">
                    </div>
                </form>
                </div>
            </div>
        </div>

 <?php 
 if(isset($_POST['fileCategory'])):
    foreach($fileCategory as $data):
        echo $data['adherent_name']. ' ' .$data['adherent_firstname']. ', fichier envoyé le '.$data['upload_date'].' : <a href ="'.$data['adherent_fileUrl'].'">Télécharger</a></br>';
    endforeach;
endif;
 ?>
 <a href="createCategory" style="text-decoration:none"><button type="button" class="btn btn-success">Gestion des catégories</button></a>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>