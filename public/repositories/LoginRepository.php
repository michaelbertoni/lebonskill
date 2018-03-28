<?php

require_once "services/DbService.php";

/**
 * @param $username
 * @return PDOStatement
 * @throws Exception
 */
function findLoginByUsername($username)
{
    $stmt = getPDO()->prepare("SELECT ID, USERNAME, PASSWORD_HASH FROM LOGINS WHERE USERNAME = :username");
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
function isLoginExists($username)
{
    $stmt = getPDO()->prepare("SELECT ID FROM LOGINS WHERE USERNAME = :username");
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
function createLogin($username, $password_hash)
{
    $pdo = getPDO();

    $stmt = $pdo->prepare("INSERT INTO LOGINS (USERNAME, PASSWORD_HASH) VALUES (:username, :password_hash)");
    $stmt->bindValue('username', $username, PDO::PARAM_STR);
    $stmt->bindValue('password_hash', $password_hash, PDO::PARAM_STR);
    if (!$stmt->execute()) {
        throw new Exception(DbService::printStatementError($stmt));
    }
    return $pdo->lastInsertId();
}

/**
 * @param $loginId
 * @return string
 * @throws Exception
 */
function findUsernameByLoginId($loginId)
{
    $stmt = getPDO()->prepare("SELECT USERNAME FROM LOGINS WHERE ID = :id");
    $stmt->bindValue(":id", $loginId, PDO::PARAM_INT);
    if (!$stmt->execute()) {
        throw new Exception(DbService::printStatementError($stmt));
    }
    return $stmt->fetch(PDO::FETCH_ASSOC)['USERNAME'];
}
