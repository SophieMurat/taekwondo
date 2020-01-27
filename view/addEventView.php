<?php ob_start(); ?>
 
<article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <form action="addEvent#createError" name="addEvent" method="post" novalidate>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                    <label>Titre</label>
                    <input type="text" class="form-control" name="title" placeholder="Titre" id="title" required>
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                    <label>Date de l'évènement</label>
                    <input type="text" class="form-control" name="title" placeholder="Titre" id="titleEvent" required>
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls floating-label-form-group-with-value">
                    <label>Chapitre</label>
                    <textarea rows="5" placeholder="Contenu" name="content" id="event_content" required></textarea>
                    </div>
                </div>
                <br>
                <div id="success"></div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" id="sendMessageButton">Ajouter l'évènement</button>
                </div>
            </form>
            <?php if ($this->error): ?>
            <p class="alert alert-danger" id="createError"><?= $this->msg ?></p>
            <?php endif ?>
        </div>
      </div>
    </div>
</article>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>