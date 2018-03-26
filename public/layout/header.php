<?php

session_start();
require("services/sessionService.php");

?>

<header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
        <span class="mdl-layout-title"><?php echo $TITLE ?></span>
        <div class="mdl-layout-spacer"></div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable
                  mdl-textfield--floating-label mdl-textfield--align-right">
            <label class="mdl-button mdl-js-button mdl-button--icon"
                   for="fixed-header-drawer-exp">
                <i class="material-icons">search</i>
            </label>
            <div class="mdl-textfield__expandable-holder">
                <input class="mdl-textfield__input" type="text" name="sample"
                       id="fixed-header-drawer-exp">
            </div>
        </div>
    </div>
</header>
<div class="mdl-layout__drawer">
    <span class="mdl-layout-title">Le Bon Skill</span>
    <nav class="mdl-navigation mdl-layout-spacer">
        <a class="mdl-navigation__link <?php echo $ACTIVE_ITEM == 'ACCUEIL' ? 'bold' : '' ?>" href="index.php">Accueil</a>
        <a class="mdl-navigation__link <?php echo $ACTIVE_ITEM == 'PROFIL' ? 'bold' : '' ?>" href="profil.php">Profil</a>
        <a class="mdl-navigation__link <?php echo $ACTIVE_ITEM == 'RECHERCHE' ? 'bold' : '' ?>" href="">Recherche</a>
        <a class="mdl-navigation__link <?php echo $ACTIVE_ITEM == 'RDV' ? 'bold' : '' ?>" href="">Rendez-vous</a>
        <a class="mdl-navigation__link <?php echo $ACTIVE_ITEM == 'MESSAGES' ? 'bold' : '' ?>" href="">Messages</a>
        <div class="mdl-layout-spacer"></div>
        <?php if(!isset($_SESSION['login_id'])) { ?>
        <a class="mdl-navigation__link <?php echo $ACTIVE_ITEM == 'LOGIN' ? 'bold' : '' ?>" href="login.php">Connexion</a>
        <a class="mdl-navigation__link <?php echo $ACTIVE_ITEM == 'INSCRIPTION' ? 'bold' : '' ?>" href="register.php">Inscription</a>
        <?php }
        else { ?>
        <a class="mdl-navigation__link" href="logout.php">Déconnexion</a>
        <?php } ?>
    </nav>
</div>