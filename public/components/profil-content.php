<?php

require_once "services/ProfilService.php";
require_once "services/SessionService.php";

if (empty($_SESSION['login_id'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['loginSubmit'])) {
        $resultLogin = updateLoginData($_POST);
    }
    else if (isset($_POST['userSubmit'])) {
        $resultUser = updateUserData($_POST);
    }
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
    .infoLoginUpdate {
        margin-bottom: 10px;
    }
</style>

<div class="mdl-grid">
    <div class="mdl-cell mdl-cell--6-col">
        <div class="mdl-card mdl-shadow--6dp">
            <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
                <h2 class="mdl-card__title-text">Modifiez vos informations d'identification.</h2>
            </div>
            <form id="loginUpdateForm" action="" method="post">
                <div class="mdl-card__supporting-text">
                    <div class="infoLoginUpdate">Pour mettre à jour votre nom d'utilisateur ou votre mot de passe, veuillez renseigner votre mot de passe actuel.</div>
                    <div class="error <?= isset($resultLogin['error']) ? 'visible' : ''; ?>"><?= isset($resultLogin['error']) ? $resultLogin['error'] : ''; ?></div>
                    <div class="success <?= isset($resultLogin['success']) ? 'visible' : ''; ?>"><?= isset($resultLogin['success']) ? $resultLogin['success'] : ''; ?></div>
                    <div class="mdl-textfield mdl-js-textfield">
                        <input class="mdl-textfield__input" type="text" maxlength="45" id="username" name="username" value="<?= htmlspecialchars($username) ?>"/>
                        <label class="mdl-textfield__label" for="username">Nom d'utilisateur</label>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield">
                        <input class="mdl-textfield__input" type="password" id="password" name="password"/>
                        <label class="mdl-textfield__label" for="userpass">Mot de passe actuel</label>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield">
                        <input class="mdl-textfield__input" type="password" id="password2" name="newPassword" />
                        <label class="mdl-textfield__label" for="userpass">Nouveau mot de passe</label>
                    </div>
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <button type="submit" name="loginSubmit" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">Sauvegarder</button>
                </div>
            </form>
        </div>
    </div>


    <div class="mdl-cell mdl-cell--6-col">
        <div class="mdl-card mdl-shadow--6dp">
            <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
                <h2 class="mdl-card__title-text">Modifiez votre profil.</h2>
            </div>
            <form id="userUpdateForm" action="" method="post">
                <div class="mdl-card__supporting-text">
                    <div class="error <?= isset($resultUser['error']) ? 'visible' : ''; ?>"><?= isset($resultUser['error']) ? $resultUser['error'] : ''; ?></div>
                    <div class="success <?= isset($resultUser['success']) ? 'visible' : ''; ?>"><?= isset($resultUser['success']) ? $resultUser['success'] : ''; ?></div>
                    <div class="mdl-textfield mdl-js-textfield">
                        <input class="mdl-textfield__input" maxlength="45" type="text" id="firstName" name="firstName" value="<?= htmlspecialchars($profil['firstName']) ?>"/>
                        <label class="mdl-textfield__label" for="firstName">Prénom</label>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield">
                        <input class="mdl-textfield__input" maxlength="45" type="text" id="familyName" name="familyName" value="<?= htmlspecialchars($profil['familyName']) ?>"/>
                        <label class="mdl-textfield__label" for="familyName">Nom</label>
                    </div>
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <button type="submit" name="userSubmit"  class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">Sauvegarder</button>
                </div>
            </form>
        </div>
    </div>
</div>

