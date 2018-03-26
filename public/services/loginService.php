<?php

require("dbService.php");

function login($username, $password) {
    $stmt = getConnection()->prepare("SELECT ID, USERNAME, PASSWORD_HASH FROM LOGINS WHERE USERNAME = :username");
    $stmt->bindValue('username', $username, PDO::PARAM_STR);
    $stmt->execute();

    $result = $stmt->fetch();
    if (!$result) {
        $errorUsername = "Ce nom d'utilisateur n'existe pas dans la base.";
    }
    else if (password_verify($password, $result['PASSWORD_HASH'])) {
        session_start();
        $_SESSION['login_id'] = $result['ID'];
        return null;
    }
    else {
        $errorPassword = "Mot de passe incorrect.";
    }

    return array('username' => $errorUsername, 'password'=> $errorPassword);
}