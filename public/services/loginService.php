<?php

require("dbService.php");

function login($username, $password) {
    $stmt = getConnection()->prepare("SELECT ID, USERNAME, PASSWORD_HASH FROM LOGINS WHERE USERNAME = :username");
    $stmt->bindValue('username', $username, PDO::PARAM_STR);
    if (!$stmt->execute()) {
        $errorUsername = "Impossible de requêter la base de données. Erreur : " . print_r($stmt->errorInfo());
    }

    $result = $stmt->fetch();
    if ($stmt->rowCount() == 0) {
        $errorUsername = "Ce nom d'utilisateur n'existe pas dans la base.";
    }
    else if (!password_verify($password, $result['PASSWORD_HASH'])) {
        $errorPassword = "Mot de passe incorrect.";
    }
    else {
        $_SESSION['login_id'] = $result['ID'];
        return null;
    }

    return array('username' => $errorUsername, 'password'=> $errorPassword);
}