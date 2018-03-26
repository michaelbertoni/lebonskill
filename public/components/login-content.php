<?php

require("services/loginService.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // The request is using the POST method
    if (empty($_POST['username'])) {
        $errorUsername = "Le nom d'utilisateur est obligatoire.";
    }
    if (empty($_POST['password'])) {
        $errorPassword = "Le mot de passe est obligatoire.";
    }

    if (!isset($errorUsername) && !isset($errorPassword)) {
        $errorArray = login($_POST['username'], $_POST['password']);
        if (isset($errorArray)) {
            $errorUsername = isset($errorArray['username']) ? $errorArray['username'] : '';
            $errorPassword = isset($errorArray['password']) ? $errorArray['password'] : '';
        }
        else {
            header('Location: index.php');
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
        <h2 class="mdl-card__title-text">Connectez-vous.</h2>
    </div>
    <form action="login.php" method="post">
        <div class="mdl-card__supporting-text">
            <div class="mdl-textfield mdl-js-textfield">
                <input class="mdl-textfield__input" type="text" maxlength="45" id="username" name="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : ''; ?>"/>
                <label class="mdl-textfield__label" for="username">Nom d'utilisateur</label>
            </div>
            <div class="error <?php echo isset($errorUsername) ? 'visible' : ''; ?>"><?php echo isset($errorUsername) ? $errorUsername : ''; ?></div>
            <div class="mdl-textfield mdl-js-textfield">
                <input class="mdl-textfield__input" type="password" id="password" name="password" />
                <label class="mdl-textfield__label" for="userpass">Mot de passe</label>
            </div>
            <div class="error <?php echo isset($errorPassword) ? 'visible' : ''; ?>"><?php echo isset($errorPassword) ? $errorPassword : ''; ?></div>
        </div>
        <div class="mdl-card__actions mdl-card--border">
            <button type="submit" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">Se connecter</button>
        </div>
        <div class="mdl-card__actions">
            <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="register.php">Vous n'avez pas de compte ? Cliquez ici.</a>
        </div>
    </form>
</div>