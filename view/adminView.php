<?php ob_start(); ?>
<div class="container mt-5 pt-5">
    <div class="row justify-content-around">
        <div class="col-xl-4 col-md-6 mb-4 mt-5">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters">
                        <a href="addImage" class="text-decoration-none"><div class="col text-xs font-weight-bold">Gestion des images pour le slider</div></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4 mt-5">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters">
                        <a href="addInscriptionFileChoice" class="text-decoration-none"><div class="col text-xs font-weight-bold">Gestion des fichiers d'inscriptions</div></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4 mt-5">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters">
                        <a href="eventManagement" class="text-decoration-none"><div class="col mr-2 text-xs font-weight-bold mb-1">Gestion des évènements à venir</div></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters">
                        <a href="adminCreate" class="text-decoration-none"><div class="col mr-2 text-xs font-weight-bold mb-1">Ajouter un administrateur</div></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>