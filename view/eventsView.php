<?php ob_start(); ?>
<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
      <?php
      foreach($events as $event):
      ?>
        <div class="post-preview">
            <h2 class="post-title">
                <?= htmlspecialchars($event->getTitle()) ?>
            </h2>
            <h3 class="post-subtitle">
                <?= $event->getContent() ?>
                <br/>
            </h3>
          </a>
          <p class="post-meta">Aura lieu le <?= htmlspecialchars($event->getDateEvent()) ?>
        </div>
        <hr>
<?php
endforeach;
?>
<div>
    <?php if ($currentPage >1): ?>
      <a href="index.php?action=events&amp;page=<?= $currentPage -1 ?>"><button class="btn btn-primary">&laquo; Page précédente</button></a>
    <?php endif ?>
    <?php if ($currentPage <$pages): ?>
      <a href="index.php?action=events&amp;page=<?= $currentPage +1 ?>"><button class="btn btn-primary">Page suivante &raquo;</button></a>
    <?php endif ?>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>