<?php

require_once "services/ProfilService.php";
require_once "services/SessionService.php";

if (empty($_SESSION['login_id'])) {
    header('Location: login.php');
    exit;
}

$username = findUsernameFromSession();
$profil = findUserData();

?>

<style>
    .mdl-card {
        width: 50vh;
        max-height: 100vh;
        margin: 0 5vh;
    }
    .mdl-button {
        line-height: 3.8vh;
    }
</style>

<div class="mdl-grid">
    <div class="mdl-cell mdl-cell--6-col">
        <div class="mdl-card mdl-shadow--6dp">
            <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
                <h2 class="mdl-card__title-text">Modifiez vos informations d'identification.</h2>
            </div>
            <form action="actions/profilLoginUpdate.php" method="post">
                <div class="mdl-card__supporting-text">
                    <div class="error <?= isset($errorLogin) ? 'visible' : ''; ?>"><?= isset($errorLogin) ? $errorLogin : ''; ?></div>
                    <div class="mdl-textfield mdl-js-textfield">
                        <input class="mdl-textfield__input" type="text" maxlength="45" id="username" name="username" value="<?= $username ?>"/>
                        <label class="mdl-textfield__label" for="username">Nom d'utilisateur</label>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield">
                        <input class="mdl-textfield__input" type="password" id="password" name="password"/>
                        <label class="mdl-textfield__label" for="userpass">Nouveau mot de passe</label>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield">
                        <input class="mdl-textfield__input" type="password" id="password2" name="password2" />
                        <label class="mdl-textfield__label" for="userpass">Confirmez votre mot de passe</label>
                    </div>
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <button type="submit" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">Sauvegarder</button>
                </div>
            </form>
        </div>
    </div>


    <div class="mdl-cell mdl-cell--6-col">
        <div class="mdl-card mdl-shadow--6dp">
            <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
                <h2 class="mdl-card__title-text">Modifiez votre profil.</h2>
            </div>
            <form action="actions/profilUserUpdate.php" method="post">
                <div class="mdl-card__supporting-text">
                    <div class="mdl-textfield mdl-js-textfield">
                        <input class="mdl-textfield__input" maxlength="45" type="text" id="firstName" name="firstName" value="<?= $profil['firstName'] ?>"/>
                        <label class="mdl-textfield__label" for="firstName">Prénom</label>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield">
                        <input class="mdl-textfield__input" maxlength="45" type="text" id="familyName" name="familyName" value="<?= $profil['familyName'] ?>"/>
                        <label class="mdl-textfield__label" for="familyName">Nom</label>
                    </div>
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <button type="submit" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">Sauvegarder</button>
                </div>
            </form>
        </div>
    </div>
</div>

