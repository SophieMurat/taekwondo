<?php ob_start(); ?>


<div class="container mt-5 pt-5">
    <div class="row justify-content-around">
        <div class="col-xl-4 col-md-6 mb-4 mt-5">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters">
                        <a href="createEvent" class="text-decoration-none"><div class="col text-xs font-weight-bold">Créer un nouvel évènement</div></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4 mt-5">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters">
                        <a href="allEvents" class="text-decoration-none"><div class="col text-xs font-weight-bold">Liste des évènements</div></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class=" d-flex justify-content-center mt-5">
        <a class="btn btn-success mb-2" href="admin" role="button">Retour accueil admin</a>
    </div>  
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>