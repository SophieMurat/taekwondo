<?php ob_start(); ?>

<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
      <a class="btn btn-success" href="createEvent" role="button">Créer un nouvel évènement</a>
      <?php
      while ($data = $events->fetch()):
      ?>
        <div class="post-preview">
            <h2 class="post-title">
                <?php echo htmlspecialchars($data->getTitle()) ?>
            </h2>
            <h3 class="post-subtitle">
                <?php echo $data->getContent() ?>
                <br/>
            </h3>
            <p class="post-meta">se déroulera le  <?php echo $data->getDateEvent() ?> </p>
            <a class="btn btn-danger" href="deleteEvent/<?php echo $data->getId()?>" role="button">Supprimer</a>
            <a class="btn btn-primary" href="modifyEvent/<?php echo $data->getId()?>" role="button">Modifier</a>
          </a>
        </div>
        <hr>
        <?php
        endwhile;
        $events->closeCursor();
        ?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>