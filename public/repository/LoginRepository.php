<?php

require_once "services/DbService.php";

class LoginRepository {

    /**
     * @param $username
     * @return PDOStatement
     * @throws Exception
     */
    public static function findLoginByUsername($username)
    {
        $stmt = DbService::getPDO()->prepare("SELECT ID, USERNAME, PASSWORD_HASH FROM LOGINS WHERE USERNAME = :username");
        $stmt->bindValue('username', $username, PDO::PARAM_STR);
        if (!$stmt->execute()) {
            throw new Exception(DbService::printStatementError($stmt));
        }
        return $stmt;
    }

    /**
     * @param $username
     * @return bool
     * @throws Exception
     */
    public static function isLoginExists($username)
    {
        $stmt = DbService::getPDO()->prepare("SELECT ID FROM LOGINS WHERE USERNAME = :username");
        $stmt->bindValue('username', $username, PDO::PARAM_STR);
        if (!$stmt->execute()) {
            throw new Exception(DbService::printStatementError($stmt));
        }
        return $stmt->rowCount() > 0;
    }

    /**
     * @param $username
     * @param $password_hash
     * @return string
     * @throws Exception
     */
    public static function createLogin($username, $password_hash)
    {
        $pdo = DbService::getPDO();

        $stmt = $pdo->prepare("INSERT INTO LOGINS (USERNAME, PASSWORD_HASH) VALUES (:username, :password_hash)");
        $stmt->bindValue('username', $username, PDO::PARAM_STR);
        $stmt->bindValue('password_hash', $password_hash, PDO::PARAM_STR);
        if (!$stmt->execute()) {
            throw new Exception(DbService::printStatementError($stmt));
        }
        return $pdo->lastInsertId();
    }
}