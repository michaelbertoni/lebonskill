<?php

require("services/registerService.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // The request is using the POST method
    if (empty($_POST['username'])) {
        $errorUsername = "Le nom d'utilisateur est obligatoire.";
    }
    if (empty($_POST['password'])) {
        $errorPassword = "Le mot de passe est obligatoire.";
    }
    else if (empty($_POST['password2'])) {
        $errorPassword = "Veuillez confirmer votre mot de passe.";
    }
    else if ($_POST['password'] != $_POST['password2']) {
        $errorPassword = "Les mots de passe ne correspondent pas.";
    }

    if (!isset($errorUsername) && !isset($errorPassword)) {
        $errorUsername = register($_POST['username'], $_POST['password']);
        if (!isset($errorUsername)) {
            header('Location: index.php');
        }
    }
}



?>


<style>
    .mdl-card {
        width: 50vh;
        max-height: 50vh;
    }
</style>

<div class="mdl-card mdl-shadow--6dp">
    <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
        <h2 class="mdl-card__title-text">Créez votre compte utilisateur.</h2>
    </div>
    <form action="register.php" method="post">
        <div class="mdl-card__supporting-text">
            <div class="mdl-textfield mdl-js-textfield">
                <input class="mdl-textfield__input" type="text" id="username" name="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : ''; ?>"/>
                <label class="mdl-textfield__label" for="username">Nom d'utilisateur</label>
            </div>
            <div class="error <?php echo isset($errorUsername) ? 'visible' : ''; ?>"><?php echo isset($errorUsername) ? $errorUsername : ''; ?></div>
            <div class="mdl-textfield mdl-js-textfield">
                <input class="mdl-textfield__input" type="password" id="password" name="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>"/>
                <label class="mdl-textfield__label" for="userpass">Mot de passe</label>
            </div>
            <div class="error <?php echo isset($errorPassword) ? 'visible' : ''; ?>"><?php echo isset($errorPassword) ? $errorPassword : ''; ?></div>
            <div class="mdl-textfield mdl-js-textfield">
                <input class="mdl-textfield__input" type="password" id="password2" name="password2" />
                <label class="mdl-textfield__label" for="userpass">Confirmez votre mot de passe</label>
            </div>
        </div>
        <div class="mdl-card__actions mdl-card--border">
            <button type="submit" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">S'inscrire</button>
        </div>
        <div class="mdl-card__actions">
            <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="login.php">Vous avez déjà un compte ? Cliquez ici.</a>
        </div>
    </form>
</div>