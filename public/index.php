<!DOCTYPE html>
<html>
    <head>
        <?php require("layout/head.php"); ?>
    </head>
    <body>
        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer
            mdl-layout--fixed-header">
            <?php
                $TITLE = "Accueil";
                $ACTIVE_ITEM = "ACCUEIL";
                require("layout/header.php");
            ?>
            <main class="mdl-layout__content">
                <div class="page-content">
                    <?php require("components/accueil-content.php") ?>
                </div>
            </main>
        </div>
    </body>
</html>
