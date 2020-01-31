<?php ob_start(); ?>
 
<article>
    <div class="container">
      <div class="row jumbotron text-center font-weight-bold">
        <div class="col-lg-8 col-md-10 mx-auto">
            <form action="updateEvent/<?php echo $event->getId() ?>" name="updateEvent" method="post" novalidate>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                    <label>Titre</label>
                    <input type="text" class="form-control" name="title" value="<?php echo $event->getTitle() ?>" id="title" required>
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                    <label>Date de l'évènement</label>
                    <input type="date" class="form-control" name="event_date" id="dateEvent" value ="<?php echo $event->getEvent_date() ?>" required>
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls floating-label-form-group-with-value">
                    <label>Chapitre</label>
                    <textarea rows="5" placeholder="Contenu" name="content" id="event_content" required><?php echo $event->getContent() ?></textarea>
                    </div>
                </div>
                <br>
                <div id="success"></div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" id="sendMessageButton">Ajouter l'évènement</button>
                </div>
            </form>
            <?php if ($this->error): ?>
            <p class="alert alert-danger"><?php echo $this->msg ?></p>
            <?php endif ?>
        </div>
      </div>
    </div>
</article>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>