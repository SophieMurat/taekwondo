<?php ob_start(); ?>
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
            <h3 class="post-subtitle">
                <?php echo $event->getContent() ?>
                <br/>
            </h3>
          </a>
          <p class="post-meta">se déroulera le <?php echo htmlspecialchars($event->getDateEvent()) ?>
        </div>
      </div>
    </div>
<?php
endforeach;
?>
<div>
    <?php if ($currentPage >1): ?>
      <a href="events/<?php echo $currentPage -1 ?>"><button class="btn btn-primary">&laquo; Page précédente</button></a>
    <?php endif ?>
    <?php if ($currentPage <$pages): ?>
      <a href="events/<?php echo $currentPage +1 ?>"><button class="btn btn-primary">Page suivante &raquo;</button></a>
    <?php endif ?>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>