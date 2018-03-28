<?php

class DbService {

    public static function getPDO() {
        try {
            return new PDO('mysql:host=mysql;dbname=lebonskill', "lebonskill", "pass");
        }
        catch (Exception $e)
        {
            die('Erreur - getConnection : ' . $e->getMessage());
        }
    }

    public static function printStatementError(PDOStatement $statement) {
        return "Erreur lors du requêtage de la base de données :<br>" . $statement->errorInfo()[2];
    }

}