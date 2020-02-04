<?php ob_start(); ?>
<div class="container text-center">
    <h1 class="mt-3">Ajouter un nouvel administrateur</h1>
    <div class="row jumbotron text-center font-weight-bold">
      <div class="col-lg-8 col-md-10 mx-auto">
        <form action="adminCreate#createAccountError" name="adminAccount" id="contactForm" method="post">
            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                    <label>Nom</label>
                    <input type="text" class="form-control" name="name" placeholder="Nom" id="name" pattern="[a-zA-ZÀ-ÿ-]+" title="Lettres et '-' acceptés">
                </div>
            </div>
            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                    <label>Login</label>
                    <input type="text" class="form-control" name="login" placeholder="Login" id="login" pattern="[a-zA-ZÀ-ÿ0-9]+" title="Tous caractères alpha-numériques">
                </div>
            </div>
            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                    <label>Mot de passe</label>
                    <input type="password" class="form-control" name="password" placeholder="Mot de passe" id="password" required data-validation-required-message="Veuillez remplir ce champs.">
                </div>
            </div>
            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                    <label>Confirmez le mot de passe</label>
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Confirmez le mot de passe" id="password_confirmation" required data-validation-required-message="Veuillez remplir ce champs.">
                </div>
            </div>
            <br>
            <div id="success"></div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary" id="sendMessageButton">Confirmer</button>
            </div>
        </form>
        <?php if ($this->error): ?>
        <p class="alert alert-danger" id="createAccountError"><?php echo $this->msg ?></p>
        <?php endif ?>
      </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>