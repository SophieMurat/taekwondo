<?php ob_start(); ?>
<?php $content = ob_get_clean(); ?>
    <div class="row justify-content-center mt-2">
      <a class="btn btn-success" href="allEvents" role="button">Retour à la liste des évènments</a>
    </div>
    <div class="row jumbotron text-center">
        <h2 class="post-title col-lg-12">
             <?php echo htmlspecialchars($event->getTitle()) ?>
        </h2>
        <p class="post-meta col-lg-12"><i class="far fa-calendar-alt"></i><span class="badge badge-pill badge-info ml-1">Date: <?php echo $event->getDateEvent() ?></span></p>
        <h3 class="post-subtitle col-lg-12">
           <?php echo $event->getContent() ?>
           <br/>
        </h3>
        <div class="col-lg-12">
            <a class="btn btn-danger" href="deleteEvent/<?php echo $event->getId()?>" role="button">Supprimer</a>
            <a class="btn btn-primary" href="modifyEvent/<?php echo $event->getId()?>" role="button">Modifier</a>
        </div>
     </div>

<?php require('template.php'); ?>