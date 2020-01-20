<?php ob_start(); ?>

<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <form action="index.php?action=login#errorLogin" name="loginForm" id="login" method="post">
            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                    <label>Login</label>
                    <input type="text" class="form-control" name ="login" placeholder="Login" id="login" pattern="[a-zA-ZÀ-ÿ0-9]+" title="Tous caractères alpha-numériques">
                </div>
            </div>
            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                    <label>Mot de passe</label>
                    <input type="password" class="form-control" name="password" placeholder="Mot de passe" id="mot de passe" required data-validation-required-message="Veuillez remplir ce champs.">
                </div>
            </div>
            <br>
            <div id="success"></div>
            <div class="form-group">
                <button type="submit" name ="submit" class="btn btn-primary" id="sendMessageButton">Se connecter</button>
            </div>
        </form>
        <?php if ($this->error): ?>
        <p class="alert alert-danger" id="errorLogin"><?= $this->msg ?></p>
        <?php endif ?>

<?php $content = ob_get_clean(); ?>