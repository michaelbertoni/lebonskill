<?php

/**
 * @return PDO
 */
function getPDO() {
    try {
        return new PDO('mysql:host=mysql;dbname=lebonskill', "lebonskill", "pass");
    }
    catch (Exception $e) {
        die("Erreur lors de la connexion à la base de données :<br>" . $e->getMessage());
    }
}

/**
 * @param PDOStatement $statement
 * @return string
 */
function printStatementError(PDOStatement $statement) {
    return "Erreur lors du requêtage de la base de données :<br>" . $statement->errorInfo()[2];
}