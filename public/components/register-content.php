<?php

// The request is using the POST method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $error = null;

    if (empty($_POST['username'])) {
        $error .= "Le nom d'utilisateur est obligatoire.<br>";
    }
    if (empty($_POST['password'])) {
        $error .= "Le mot de passe est obligatoire.<br>";
    }
    else if (empty($_POST['password2'])) {
        $error .= "Veuillez confirmer votre mot de passe.<br>";
    }
    else if ($_POST['password'] != $_POST['password2']) {
        $error .= "Les mots de passe ne correspondent pas.<br>";
    }

    if (empty($error)) {
        require_once "services/LoginService.php";
        $error = LoginService::register($_POST['username'], $_POST['password']);
        if (empty($error)) {
            header('Location: index.php');
            exit;
        }
    }
}

?>


<style>
    .mdl-card {
        width: 50vh;
        max-height: 100vh;
    }
    .mdl-button {
        line-height: 3.8vh;
    }
</style>

<div class="mdl-card mdl-shadow--6dp">
    <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
        <h2 class="mdl-card__title-text">Créez votre compte utilisateur.</h2>
    </div>
    <form action="" method="post">
        <div class="mdl-card__supporting-text">
            <div class="error <?= isset($error) ? 'visible' : ''; ?>"><?= isset($error) ? $error : ''; ?></div>
            <div class="mdl-textfield mdl-js-textfield">
                <input class="mdl-textfield__input" type="text" maxlength="45" id="username" name="username" value="<?= isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>"/>
                <label class="mdl-textfield__label" for="username">Nom d'utilisateur</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield">
                <input class="mdl-textfield__input" type="password" id="password" name="password" value="<?= isset($_POST['password']) ? htmlspecialchars($_POST['password']) : ''; ?>"/>
                <label class="mdl-textfield__label" for="userpass">Mot de passe</label>
            </div>
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