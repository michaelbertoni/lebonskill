<?php

function getConnection() {
    try {
        return new PDO('mysql:host=mysql;dbname=lebonskill', "lebonskill", "pass");
    }
    catch (Exception $e)
    {
        die('Erreur - getConnection : ' . $e->getMessage());
    }
}