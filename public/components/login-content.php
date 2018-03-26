<?php

require("services/loginService.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // The request is using the POST method
    if (empty($_POST['username'])) {
        $errorUsername = "Le nom d'utilisateur est obligatoire !";
    }
    if (empty($_POST['password'])) {
        $errorPassword = "Le mot de passe est obligatoire !";
    }

    if (isset($_POST['username']) && $_POST['password']) {
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
        max-height: 50vh;
    }
    .error {
        color: crimson;
    }
    .visible {
        display: block;
    }
</style>

<div class="mdl-card mdl-shadow--6dp">
    <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
        <h2 class="mdl-card__title-text">Connexion</h2>
    </div>
    <form action="login.php" method="post">
        <div class="mdl-card__supporting-text">
            <div class="mdl-textfield mdl-js-textfield">
                <input class="mdl-textfield__input" type="text" id="username" name="username" value="<?php echo $_POST['username']?>"/>
                <label class="mdl-textfield__label" for="username">Nom d'utilisateur</label>
            </div>
            <div class="error <?php echo isset($errorUsername) ? 'visible' : ''?>"><?php echo $errorUsername ?></div>
            <div class="mdl-textfield mdl-js-textfield">
                <input class="mdl-textfield__input" type="password" id="password" name="password" />
                <label class="mdl-textfield__label" for="userpass">Mot de passe</label>
            </div>
            <div class="error <?php echo isset($errorPassword) ? 'visible' : ''?>"><?php echo $errorPassword ?></div>
        </div>
        <div class="mdl-card__actions mdl-card--border">
            <button type="submit" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">Se connecter</button>
        </div>
    </form>

</div>