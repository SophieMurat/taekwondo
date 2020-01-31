<?php ob_start(); ?>

<div class="container mt-3">
    <div class="row">
      <a class="btn btn-success" href="createEvent" role="button">Créer un nouvel évènement</a>
    </div>
      <?php
      while ($data = $events->fetch()):
      ?>
        <div class="row jumbotron text-center">
          <h2 class="post-title col-lg-12">
              <?php echo htmlspecialchars($data->getTitle()) ?>
          </h2>
          <h3 class="post-subtitle col-lg-12">
            <?php echo $data->getContent() ?>
            <br/>
          </h3>
          <p class="post-meta col-lg-12">se déroulera le  <?php echo $data->getDateEvent() ?> </p>
          <div class="col-lg-12">
            <a class="btn btn-danger" href="deleteEvent/<?php echo $data->getId()?>" role="button">Supprimer</a>
            <a class="btn btn-primary" href="modifyEvent/<?php echo $data->getId()?>" role="button">Modifier</a>
          </div>
        </div>
        <hr>
        <?php
        endwhile;
        $events->closeCursor();
        ?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>