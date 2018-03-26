<!DOCTYPE html>
<html>
<head>
    <style>
        .page-content {
            display: flex;
            justify-content: center;
        }
    </style>

    <?php require("layout/head.php"); ?>
</head>
<body>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer
            mdl-layout--fixed-header">
    <?php
    $TITLE = "Inscription";
    $ACTIVE_ITEM = "INSCRIPTION";
    require("layout/header.php");
    ?>
    <main class="mdl-layout__content">
        <div class="page-content mdl-typography--text-center">
            <?php require("components/register-content.php"); ?>
        </div>
    </main>
</div>
</body>
</html>
