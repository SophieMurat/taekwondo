<?php ob_start(); ?>
<h1 class="mt-5 text-center">Evènements à venir!</h1>
<div class="container">
      <?php
      foreach($events as $event):
      ?>
      <div class="jumbotron row text-center">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="post-preview">
            <h2 class="post-title">
                <?php echo htmlspecialchars($event->getTitle()) ?>
            </h2>
            <p class="post-subtitle events">
                <?php echo $event->getContent() ?>
                <br/>
            </p>
          </a>
          <p><i class="far fa-calendar-alt"></i><span class="badge badge-pill badge-info ml-1">Date: <?php echo htmlspecialchars($event->getDateEvent()) ?></span>
        </div>
      </div>
    </div>
<?php
endforeach;
?>
<div>
    <?php if ($currentPage >1): 
            if($currentPage === "2"):?>
            <a href="events"><button class="btn btn-primary">&laquo; Page précédente</button></a>
            <?php else: ?>
            <a href="events/<?php echo $currentPage -1 ?>"><button class="btn btn-primary">&laquo; Page précédente</button></a>
            <?php endif ?>
    <?php endif ?>
    <?php if ($currentPage <$pages): ?>
      <a href="events/<?php echo $currentPage +1 ?>"><button class="btn btn-primary">Page suivante &raquo;</button></a>
    <?php endif ?>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>