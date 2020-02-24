

<?php ob_start(); ?>
<div class="container">
    <div class="jumbotron row text-center">
        <h1 class="col-lg-12">Fiches d'inscription à télécharger</h1>
            <ul class="list-unstyled col-lg-12">
            <?php
            while($data = $inscriptionFiles->fetch()):
            ?>
                <li><a href ="<?php echo $data->getFile_url()?>"><?php echo htmlspecialchars($data->getTitle_file())?></a></li>
            <?php 
            endwhile;
            $inscriptionFiles->closeCursor();
            ?>
            </ul>
            <h2 class="col-lg-12">Renvoyez une fiche ou un document via le formulaire ci-dessous</h2>
    </div>
</div>
<div class="container jumbotron">
        <div class="row justify-content-center">
            <div class="col-lg-4 bg-dark rounded px-4">
            <h4 class="text-center text-light p-1">Renvoyer un document</h4>
                <form action="sendInscriptionFile#adherentFile" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control p-1" placeholder="Nom de l'inscrit" pattern="[a-zA-ZÀ-ÿ-]+" title="Lettres et '-' acceptés">
                    </div>
                    <div class="form-group">
                        <input type="text" name="firstname" class="form-control p-1" placeholder="Prénom de l'inscrit" pattern="[a-zA-ZÀ-ÿ-]+" title="Lettres et '-' acceptés">
                    </div>
                    <div class="form-group">
                        <input type="text" name="zipcode" class="form-control" placeholder="Code postal" id="zipcode">
                        <div class="text-danger" id="error-message"></div>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="city" id="city"></select>
                    </div>
                    <div class="form-group">
                        <label class="text-center text-light p-1">Choisissez le type de fichier à renvoyer :
                            <select name="category" class="form-control p-1" id="category">
                                <?php while ($category=$categories->fetch()):?>
                                <option
                                value="<?php echo $category->getId()?>"><?php echo htmlspecialchars($category->getCategory_name())?></option>
                                <?php endwhile; ?>
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
                        <h5 class="text-center text-danger" id="adherentFile"><?php echo $this->msg; ?></h5>
                        <h5 class="text-center text-success" id="adherentFile"><?php echo $this->msgOk; ?></h5>
                    </div>
                </form>
            </div>
        </div>
    </div>


<?php $content = ob_get_clean();?>

<?php require('template.php'); ?>