<?php ob_start(); ?>

<h1>Fiches d'inscription</h1>

<?php
while($data = $inscriptionFiles->fetch()){
     echo $data['title_file']. ' : ' . '<a href ="'.$data['file_url'].'">Télécharger</a></br>';
 }
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>