<?php ob_start(); ?>
<div class="container">
    <div class="row errorMsg text-center" >
      <div class="col-lg-8 col-md-10 mx-auto alert alert-danger"><h2><?php echo $this->msg ?></div></h2>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>