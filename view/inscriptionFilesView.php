<?php ob_start(); ?>

<div class="container-fluid">
    <div class="row jumbotron justify-content-center">
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
                    <h5 class="text-center text-light"><?php echo $this->msg; ?></h5>
                </div>
            </form>
        </div>
    </div>


    <div class="row jumbotron justify-content-center text-center">
        <h1 class="col-lg-12 mb-4">Fichiers renvoyés par les adhérents</h1>
        <div class="col-lg-4 bg-dark rounded px-4">
            <h4 class="text-center text-light p-1">Choix du type de fichier</h4>
            <form action="addInscriptionFileChoice" method="post">
                <div class="form-group">
                    <select name="category" class="form-control p-1" id="category">
                        <?php while ($category=$categories->fetch()):?>
                            <option <?php if(isset($_POST['fileCategory'])):
                                if($category->getId() == $_POST['category']) echo "selected='selected'"; 
                            endif;?>
                            value="<?php echo $category->getId()?>"><?php echo $category->getCategory_name()?>
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
            <?php 
    if(isset($_POST['fileCategory'])):?>
        <div id="comment_table" class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Commune de résidence</th>
                <th>Date d'envoi</th>
                <th>Télécharger</th>
            </tr>
            </thead>
            <tbody>
        <?php foreach($fileCategory as $data):?>
            <tr>
                <td class="non_responsive"><?php echo htmlspecialchars($data->getAdherent_name()) ?></td>
                <td class="non_responsive"><?php echo htmlspecialchars($data->getAdherent_firstname()) ?></td>
                <td class="non_responsive"><?php echo htmlspecialchars($data->getAdherent_city()) ?></td>
                <td class="non_responsive"><?php echo htmlspecialchars($data->getSentDate()) ?></td>
                <td class="non_responsive"><a href ="<?php echo $data->getAdherent_fileUrl() ?>">Télécharger</a></td>
                
            </tr>
        <?php
        endforeach;
    endif;
    ?>
        </tbody>
    </table>
    <div class="col-lg-4">
        <a class="btn btn-success" href="createCategory" role="button">Gestion des catégories</a>
    </div>
    </div>
    </div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>