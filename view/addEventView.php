<?php ob_start(); ?>
<h1 class="mt-3 text-center">Créer un nouvel évènement</h1>
<article>
    <div class="container">
      <div class="row jumbotron text-center font-weight-bold">
        <div class="col-lg-8 col-md-10 mx-auto">
            <form action="addEvent#createError" name="addEvent" method="post" novalidate>
                <div class="form-group">
                    <label>Titre</label>
                    <input type="text" class="form-control" name="title" placeholder="Titre" id="title" required>
                </div>
                <div class="form-group">
                    <label>Date de l'évènement</label>
                    <input type="date" class="form-control" name="event_date" id="dateEvent" required>
                </div>
                <div class="form-group">
                    <label>Description de l'évènement</label>
                    <textarea rows="5" placeholder="Contenu" name="content" id="event_content" required></textarea>
                </div>
                <br>
                <div id="success"></div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" id="sendMessageButton">Ajouter l'évènement</button>
                </div>
            </form>
            <?php if ($this->error): ?>
            <p class="alert alert-danger" id="createError"><?php echo $this->msg ?></p>
            <?php endif ?>
            <?php if ($this->validate): ?>
            <p class="alert alert-success" id="createError"><?php echo $this->msg ?></p>
            <?php endif ?>
        </div>
      </div>
    </div>
</article>
<div class="row justify-content-around">
    <a class="btn btn-success mb-2" href="eventManagement" role="button">Retour à la gestion des évènements</a>
    <a class="btn btn-success mb-2" href="admin" role="button">Retour accueil admin</a>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>