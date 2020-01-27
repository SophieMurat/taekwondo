<?php ob_start(); ?>

<a class="btn btn-info" href="createEvent" role="button">Créer un nouvel évènement</a>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>